<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Work;
use App\Subject;
use App\Category;



class CollectionController extends Controller
{
    public function index()
    {
        $works = Work::all();
        $categories = Category::all();
        $subjects = Subject::all();

        
        return view('admin.collection.index',compact('works', 'categories', 'subjects'));
    }

    public function search(Request $request)
    {
        // dd($request->all());

        $categories = Category::all();
        $subjects = Subject::all();

        if(($request['category_id'] != -1) && ($request['subject_id'] != -1))
        {
            $works = DB::table('works')
            ->where('title', 'like', '%'. $request->title .'%')
            ->where('category_id', '=', $request->category)
            ->where('subject_id', '=', $request->subject)
            ->get();
            $title = $request['title'];
            $category_id = Category::find($request['category_id']);
            $subject_id = Subject::find($request['subjecty_id']);
            $results = count($works);
            return view('admin.collection.index',compact('works','title','category_id','subject_id', 'categories', 'subjects', 'results'));


        }else if(($request['category_id'] != -1) )
        {
            $category_id = Category::find($request['category_id']);
            if($request['title']!= null)
            {
                $works = DB::table('works')
                ->where('title', 'like', '%'. $request->title .'%')
                ->where('category_id', '=', $request->category_id)->get();
                $title = $request['title'];
                $results = count($works);
                return view('admin.collection.index',compact('works','title','category_id',  'categories', 'subjects', 'results'));

            }
            else{
                $works = DB::table('works')
                ->where('category_id', '=', $request->category_id)->get();
                $results = count($works);
                return view('admin.collection.index',compact('works','category_id',  'categories', 'subjects', 'results'));
            }
        }else if(($request['subject_id'] != -1) )
        {
            $subject_id = Subject::find($request['subjecty_id']);

            if($request['title']!= null)
            {
                $works = DB::table('works')
                ->where('title', 'like', '%'. $request->title .'%')
                ->where('subject_id', '=', $request->subject_id)
                ->get();
                $title = $request['title'];
                $results = count($works);
                return view('admin.collection.index',compact('works', 'title','subject_id', 'categories', 'subjects', 'results'));
            }else {
                $works = DB::table('works')
                ->where('subject_id', '=', $request->subject_id)
                ->get();
                $results = count($works);
                return view('admin.collection.index',compact('works','subject_id', 'categories', 'subjects', 'results'));

            }
           
        }else {
            $works = DB::table('works')
            ->where('title', 'like', '%'. $request->title .'%')
            ->get();
            $title = $request['title'];
            $results = count($works);
            return view('admin.collection.index',compact('works', 'title', 'categories', 'subjects', 'results'));
        }               

        
    }
    

}
