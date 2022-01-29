<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
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
            'fullname'=>'required',
            'email'=>'required',
            'description'=>'required',
        ]);
        $image_name=null;

        if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/blog',$image_name);
                }

        Blog::create([
            'title'=>$data->title,
            'moto'=>$data->moto,
            'fullname'=>$data->fullname,
            'email'=>$data->email,
            'description'=>$data->description,
            'image'=>$image_name,


        ]);
        return redirect()->route('blog')->with('success','Blog created successfully.');

    }
    public function wBlog(){
        $data=Blog::all();
        return view ('website.blog',['data'=>$data]);
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

        return view('pages.blogs.updateBlog', compact('blog'));
    }

    public function updatedBlog($updated){
        $blog=Blog::find($updated);
        $blog->update(request()->all());
        return redirect()->route('blog')->with('update', 'Updated Successfully. ');
    }

    public function viewblog($viewid){
        $view=Blog::find($viewid);
        $comments=Comment::where('blog_id',$viewid)->get();
        return view('website.viewblog', compact('view','comments'));
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






}
