<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data=Course::all();
        return view('pages.courses.courses',['data'=>$data]);
    }

    public function createCourse(){
        if(Auth::user()->role=='admin'){
        return view('pages.courses.createCourses');
        }
        else{
            return view('website.course.createartistCourse');
        }
    }

    public function storeCourse(Request $data){

            $data->validate([
                'name'=>'required',
                'price'=>'required',
                'details'=>'required',
            ]);

            $image_name=null;
                if($data->hasFile('image'))
                {
                    $image_name=date('Ymdhis') .'.'. $data->file('image')->getClientOriginalExtension();

                    $data->file('image')->storeAs('/courses',$image_name);
                }

        Course::create([
            'user_id'=>Auth::user()->id,
            'name'=>$data->name,
            'price'=>$data->price,
            'details'=>$data->details,
            'image'=>$image_name,
        ]);
        if(Auth::user()->role=='admin'){
        return redirect()->route('courses')->with('success','Course created successfully.');
        }
        else{
            return redirect()->route('view.artist.course')->with('success','Course created successfully.');
        }
    }


    public function wCourses(){
        $data=Course::all();
        return view ('website.course.courses',['data'=>$data]);
    }


    public function deleteCourse($delcourse){
        Course::find($delcourse)->delete();
        return redirect()->back()->with('delete','Course deleted successfully.');
    }

    public function detailsCourse($detailsid){
        $details=Course::find($detailsid);
        return view('pages.courses.coursedetails',compact('details'));
    }

    public function updateCourse($update){
        $course=Course::find($update);
        if(Auth::user()->role=='admin'){
        return view('pages.courses.updateCourse', compact('course'));
        }
        else{
            return view('website.course.updateCoursedetails', compact('course'));
        }
    }

    public function updatedCourse($updated){
        $course=Course::find($updated);
        $course->update(request()->all());
        if(Auth::user()->role=='admin'){
        return redirect()->route('courses')->with('update', 'Updated Successfully. ');
        }
        else{
        return redirect()->route('view.artist.course')->with('update', 'Updated Successfully. ');
        }
    }

    public function viewCourses($detailsid){
        $course=Course::find($detailsid);
        $rule = Enroll::where('user_id',Auth::user()->id)
        ->where('course_id',$detailsid)
        ->exists();
        return view('website.course.viewcourse',compact('course','rule'));
    }
    public function enroll($course_id)
    {
        $course = Course::findOrFail($course_id);
        if (Enroll::where('user_id',Auth::user()->id)->where('course_id',$course_id)->exists()) {
            Enroll::where('user_id',Auth::user()->id)->where('course_id',$course_id)->delete();
            return redirect()->back()->with('message','You Have Unenrolled the course ');
        }

        Enroll::create([
            'user_id'=>Auth::user()->id,
            'course_id'=>$course_id
        ]);
        return redirect()->back()->with('message','You Have Enrolled the Course');
    }

    public function enrolllist($course_id){
        $list=Enroll::where('course_id', $course_id)->get('user_id');
        if(Auth::user()->role=='admin'){
        return view('pages.courses.enroll',compact('list'));
        }
        else{
            return view('website.course.artistcourseEnroll',compact('list'));
        }
    }

    public function artistCourseshow()
    {
        $data=Course::where('user_id', Auth::user()->id)->get();
        return view('website.course.viewartistCourse', compact('data'));
    }


}
