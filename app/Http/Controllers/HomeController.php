<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome', 'tuition', 'contact');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $data = Contents::where('id', 1)->get();

        return view('welcome')->with('data', $data);
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
        return view('admin.dashboard');
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
}
