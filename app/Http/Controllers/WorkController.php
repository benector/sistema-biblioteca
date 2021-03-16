<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Work;
use Illuminate\Http\Request;
use App\Category;
use App\Subject;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('admin.works.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $work = new work();

        return view('admin.works.create', [
            'work' => $work,
            'categories' => Category::all(),
            'subjects' => Subject::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = $request->user()->id;
        $data = $request->all();
        $work_image = $request->file('img');
        $extension = $work_image->getClientOriginalExtension();
        $filename = uniqid ( time () ) . '.' . $extension ;
        $data['img'] = $filename;
        $work = Work::create( $data);

        // $user = $request->user();
        // $user->courses()->save($work);
        
        //dd($work);
        Storage::disk('public')->put($filename,  File::get($work_image));
            return redirect()->route('works.index')->with('success',true);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('admin.works.show',[
            'work' => $work,
            'users' => $work->users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('admin.works.edit',[
            'work' => $work,
            'categories' => Category::all(),
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $data = $request->all();
    
        if ($request->hasFile('img')) {
            $work_image = $request->file('img');
            $work_old_image = $request->old_img;
            $extension = $work_image->getClientOriginalExtension();
            $filename = uniqid ( time () ) . '.' . $extension ;

            $data['img'] = $filename;

            $work->update( $data);

            Storage::disk('public')->put($filename,  File::get($work_image));
            Storage::delete($work_old_image);
            return redirect()->route('works.index')->with('success',true);

        }else{
            $work->update($data);
                return redirect()->route('works.index')->with('success',true);
 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('works.index')->with('success',true);
    }
}
