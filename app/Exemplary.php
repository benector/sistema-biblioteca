<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplary extends Model
{
    protected $fillable = [
        'work_id', 'code'
    ];
  
    // public function work(){
    //     return $this->belongsTo(work::class);
    // }


}
