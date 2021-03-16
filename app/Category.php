<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Work;


class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function works(){
        return $this->hasMany (Work::class);
    }
    public $timestamps = false;


}
