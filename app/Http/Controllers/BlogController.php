<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data=Blog::all();
        return view('pages.blogs.blog',compact('data'));
    }

    public function createBlog(){

        return view('pages.blogs.createBlog');
    }

    public function storeBlog(Request $data){

        $data->validate([
            'title'=>'required',
            'moto'=>'required',
            'description'=>'required',
        ]);
        $image_name=null;

        if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/blog',$image_name);
                }

        Blog::create([
            'user_id'=>Auth::user()->id,
            'title'=>$data->title,
            'moto'=>$data->moto,
            'fullname'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'description'=>$data->description,
            'image'=>$image_name,
        ]);
        if(Auth::user()->role=='admin'){
            return redirect()->route('blog')->with('success','Blog created successfully.');
        }
        else{
            return redirect()->route('artistblogcreate')->with('success','Blog created successfully.');
        }


    }
    public function wBlog(){
        $data=Blog::all();
        return view ('website.blog.blog',['data'=>$data]);
    }

    public function deleteBlog($delblog){
        Blog::find($delblog)->delete();
        return redirect()->back()->with('delete','Blog deleted successfully.');
    }

    public function detailsBlog($detailsid){
        $details=Blog::find($detailsid);
        return view('pages.blogs.blogdetails',compact('details'));
    }

    public function updateBlog($update){
        $blog=Blog::find($update);
        if(Auth::user()->role=='admin'){
        return view('pages.blogs.updateBlog', compact('blog'));
        }
        else{
        return view('website.artist.updateblogArtist', compact('blog'));
        }
    }

    public function updatedBlog($updated){
        $blog=Blog::find($updated);
        $blog->update(request()->all());
        if(Auth::user()->role=='admin'){
        return redirect()->route('blog')->with('update', 'Updated Successfully. ');
        }
        else{
        return redirect()->route('artist.blog.list')->with('update', 'Updated Successfully. ');
        }
    }

    public function viewblog($viewid){
        $view=Blog::find($viewid);
        $comments=Comment::where('blog_id',$viewid)->get();
        return view('website.blog.viewblog', compact('view','comments'));
    }

    public function storeComment(Request $data, $blog_id)
    {

        Comment::create([
            'blog_id'=>$blog_id,
            'user_id'=>Auth::user()->id,
            'body'=>$data->body,
        ]);
        return redirect()->back();
    }


    public function like($post_id)
    {
        $likes = Blog::find($post_id);
        if ($likes->liked()->where('user_id',Auth::user()->id)->exists()) {
            $likes->liked()->detach(Auth::user()->id);
            return redirect()->back();
        }
        else
        {
            $likes->liked()->attach(Auth::user()->id);
            if (Auth::user()->id!=$likes->user_id) {

            }
            return redirect()->back();
        }
    }

    public function artistblogshow()
    {
        $data=Blog::where('user_id', Auth::user()->id)->get();
        return view('website.blog.showartistBlog', compact('data'));
    }












}
