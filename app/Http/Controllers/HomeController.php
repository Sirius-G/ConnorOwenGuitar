<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use App\Models\Videos;
use App\Models\Banners;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome', 'bio', 'tuition', 'contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        return view('welcome');
    }
    public function bio()
    {
        $banner = Banners::where('id', 1)->get();
        $data = Contents::where('id', 1)->get();
        $videos = Videos::orderby('title', 'asc')->get();

        return view('bio')
            ->with('data', $data)
            ->with('videos', $videos)
            ->with('banner', $banner);
    }
    public function tuition()
    {
        $banner = Banners::where('id', 2)->get();
        $data = Contents::where('id', 2)->get();

        return view('tuition')->with('data', $data)->with('banner', $banner);
    }
    public function contact()
    {
        $banner = Banners::where('id', 3)->get();
        $data = Contents::where('id', 3)->get();

        return view('contact')->with('data', $data)->with('banner', $banner);
    }

    public function admin()
    {
        $my_videos = Videos::withTrashed()->orderby('title', 'asc')->get();
        return view('admin.dashboard')->with('my_videos', $my_videos);
    }

    public function update_contents(Request $request, $id){

        //Validation
        $this->validate($request, [
            'content1' => 'required'
        ]);

        $content = $_POST['content1'];
        //if $content is not empty update DB

        if($content){
            try{
                //Update Post
                $post = Contents::find($id);
                $post->content = $content;
                $post->save();

                Session::flash('success', 'Contents updated successfully!');

            } catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                return back()->with('error', 'Error code: '. $errorCode);
            }
        }
    }

    public function update_image(Request $request){
                
        $this->validate($request, [
            'image_name' => 'required',
            'alt' => 'required',
            'id' => 'required'
        ]);

        $id = $request->input('id');

        // return $id;
		  		  
        //Handle File Upload
        if($request->hasFile('image_name')){

            //Get original filename
            $filenameWithExt = $request->file('image_name')->getClientOriginalName();
            //Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get Just filename extension
            $extension = $request->file('image_name')->getClientOriginalExtension();
            //Concatenate filename with date / time to make it unique
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
			$img = $request->file('image_name');
            $img->move('images', $fileNameToStore);	
		} 	  
		  
            //Create new entry into Messages get_html_translation_table
            try{
                
                $app = Banners::find($id);
                $app->alt = $request->input('alt');
				$app->image_name = $fileNameToStore;
                $app->update();
			
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                return back()->with('error', 'Something went wrong!'.$errorCode);
            }
              	
                return redirect('/admin')->with('success', 'Your banner image has been successfully updated.');
    }

    //====================== Videos ==============================
    public function show_upload_video()
    {
        return view('admin.add_video');
    }
    public function added_videos() {
        $my_videos = Videos::withTrashed()->orderby('id', 'desc')->get();
        return view('admin.added_videos')->with('my_videos', $my_videos);  
    }
    public function store_video(Request $request){
                
        $this->validate($request, [
            'video_index' => 'required',
            'title' => 'required|min:3'
          ]);

            try{
                
                $app = new Videos;
                $app->title = $request->input('title');
				$app->video_index = 'https://www.youtube.com/embed/'.$request->input('video_index');
                $app->save();
			
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return back()->with('error', 'Duplication error');
                }
            }
              	
            return redirect('/admin')->with('success', 'Your video has been successfully added.');
    }
    public function update_video(Request $request){
                
        $this->validate($request, [
            'video_index' => 'required'
          ]);

            $vid = $request->input('video_id');

            //Create new entry into Messages get_html_translation_table
            try{
                $app = Videos::find($vid);
                $app->title = $request->input('title');
				$app->video_index = $request->input('video_index');
                $app->save();
			
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return back()->with('error', 'Duplication error');
                }
            }
              	
                return redirect('/admin')->with('success', 'Your Video has been successfully updated.');
    }
    public function softdelete_video($id)
    {
        $video = Videos::find($id);
        $video->delete();
        return redirect()->back()->with('error', 'Video removed successfully.');
    }

    public function restore_video($id)
    {
        $video = Videos::withTrashed()->find($id);
        $video->restore();
        return redirect()->back()->with('success', 'Video restored successfully.');
    }


















}
