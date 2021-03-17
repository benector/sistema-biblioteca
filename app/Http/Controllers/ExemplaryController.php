<?php

namespace App\Http\Controllers;
use App\Exemplary;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ExemplaryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($work_id)
    {
        $exemplaries = DB::table('exemplaries')->where('work_id', '=', $work_id)->get();
        $results = count($exemplaries);
        $work = Work::find($work_id);
        return view('admin.exemplaries.index',compact('exemplaries', 'work', 'results'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exemplary = new Exemplary();
        $works = Work::all();
        return view('admin.exemplaries.create',compact('exemplary', 'works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->user()->id);
        Exemplary::create($request->all());
        return redirect()->route('workExemplaries', $request->work_id)->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exemplary  $exemplary
     * @return \Illuminate\Http\Response
     */
    public function show(Exemplary $exemplary)
    {
        return view('admin.exemplaries.show',compact('exemplary'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exemplary  $exemplary
     * @return \Illuminate\Http\Response
     */
    public function edit(Exemplary $exemplary)
    {
        $works = Work::all();
        return view('admin.exemplaries.edit',compact('exemplary', 'works'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exemplary  $exemplary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exemplary $exemplary)
    {
        $exemplary->update($request->all());
        return redirect()->route('workExemplaries', $request->work_id)->with('success',true);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exemplary  $exemplary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exemplary $exemplary)
    {
        $work_id = $exemplary->work_id;
        $exemplary->delete();
        return redirect()->route('workExemplaries', $work_id)->with('success',true);
    }
}
