<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Category;
use App\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();

        return view('admin.courses.create', [
            'course' => $course,
            'categories' => Category::all()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
      // dd($request->file('img_link')->getFilename());
        $user_id = $request->user()->id;
        $course_image = $request->file('img_link');
        $extension = $course_image->getClientOriginalExtension();
        $filename = uniqid ( time () ) . '.' . $extension ;
        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $this->convert_slug($request->slug),
            'category_id' => $request->category_id,
            'video' => $this->convert_url($request->video),
            'img_link' => $filename
        ]);

        $user = $request->user();
        $user->courses()->save($course);
        
        //dd($course);
        Storage::disk('public')->put($filename,  File::get($course_image));
            return redirect()->route('courses.index')->with('success',true);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
       //dd( $course->users());
        return view('admin.courses.show',[
            'course' => $course,
            'users' => $course->users
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit',[
            'course' => $course,
            'categories' => Category::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
      // dd($request->hasFile('img_link'));
        //die();
        if ($request->hasFile('img_link')) {
            $course_image = $request->file('img_link');
            $course_old_image = $request->old_img_link;
            $extension = $course_image->getClientOriginalExtension();
            $filename = uniqid ( time () ) . '.' . $extension ;

            $course->update( 
            ['name' => $request->name,
            'description' => $request->description,
            'slug' => $this->convert_slug($request->slug),
            'category_id' => $request->category_id,
            'video' => $this->convert_url($request->video),
            'img_link' => $filename
            ]
            );

            Storage::disk('public')->put($filename,  File::get($course_image));
            Storage::delete($course_old_image);
            return redirect()->route('courses.index')->with('success',true);

        }else{
            $course->update( 
                ['name' => $request->name,
                'description' => $request->description,
                'slug' => $this->convert_slug($request->slug),
                'category_id' => $request->category_id,
                'video' => $this->convert_url($request->video)]);
                return redirect()->route('courses.index')->with('success',true);
 
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Storage::delete($course->img_link);
        return redirect()->route('courses.index')->with('success',true);
    }

    public function convert_url($url){
       
        if( strstr($url, "watch?v=")){
        return str_replace("watch?v=", "embed/", $url);
        }else{
            return $url;
        }
    }

    
    public function convert_slug($slug){
       
        if( strstr($slug, " ")){
        return str_replace(" ", "-", $slug);
        }else{
            return $slug;
        }
    }
}
