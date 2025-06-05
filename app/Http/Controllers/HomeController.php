<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use App\Models\Videos;

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
        $data = Contents::where('id', 1)->get();
        $videos = Videos::withTrashed()->orderby('id', 'desc')->get();

        return view('bio')->with('data', $data)->with('videos', $videos);
    }
    public function tuition()
    {
        $data = Contents::where('id', 2)->get();

        return view('tuition')->with('data', $data);
    }
    public function contact()
    {
        $data = Contents::where('id', 3)->get();

        return view('contact')->with('data', $data);
    }

    public function admin()
    {
        $my_videos = Videos::withTrashed()->get();
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
            'title' => 'required|regex:/^[\pL0-9\s]+$/u|min:3'
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

    public function edit_video($id){
        $my_videos = Videos::withTrashed()->where('id', $id)->get();
        return view('admin.edit_video')->with('my_videos', $my_videos);  
    }

    public function update_video(Request $request, $id){
                
        $this->validate($request, [
            'video_asset' => 'required',
            'title' => 'required|regex:/^[\pL0-9\s]+$/u|min:3',
            'associated_path' => 'required|regex:/^[\pL0-9\s]+$/u|min:3',
			'lang' => 'required|regex:/^[\pL\s]+$/u|min:2'
          ]);

            //Create new entry into Messages get_html_translation_table
            try{
                
                $app = Videos::find($id);
                $app->title = $request->input('title');
				$app->video_index = $request->input('video_index');
                $app->save();
			
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return back()->with('error', 'Duplication error');
                }
            }
              	
                return redirect('/admin/added_videos')->with('success', 'Your Video has been successfully updated.');
    }
    public function softdelete_video($id)
    {
        $video = Videos::find($id);
        $video->delete();
        return back()->with('error', 'Video deleted successfully.');
    }

    public function restore_video($id)
    {
        $video = Videos::withTrashed()->find($id);
        $video->restore();
        return back()->with('success', 'Video restored successfully.');
    }


















}
