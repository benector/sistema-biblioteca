<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Work;
class Exemplary extends Model
{
    protected $fillable = [
        'work_id', 'code'
    ];
  
    public function work(){
        return $this->belongsTo(Work::class);
    }


}
