<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class message extends Model
{
    public $timestamps = FALSE;
    protected $fillable=['text','dia_id','user_id'];

    public function dia(){
        return $this->belongsTo(dia::class, 'dia_id')->first();
    }
    
}
