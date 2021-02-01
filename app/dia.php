<?php

namespace App;
use App\message;
use Illuminate\Database\Eloquent\Model;

class dia extends Model
{
    public $timestamps = FALSE;
    protected $fillable=['tema', 'name'];

    public function message(){
        return $this->hasMany(message::class,'dia_id');
    }
  
       
}
