<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Category;
use App\Subject;
use App\Exemplary;




class Work extends Model
{
    protected $fillable = [
        'title', 'authors', 'category_id', 'subject_id', 'img', 'edition', 'resume', 'pages', 'year'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function exemplaries(){
        return $this->hasMany (Exemplary::class);
    }
 
    // public function getRouteKeyName()
    // {
    //     return Str::slug('title', '-');
        
    // }
}
