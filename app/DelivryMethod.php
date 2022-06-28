<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelivryMethod extends Model
{
    protected $guarded = [];
    public function subDelivryMethod(){

        return $this->hasMany('App\DelivryMethod', 'parent_id');

    }
    public function urgent(){
       return  $this->subDelivryMethod->where('parent_id',1);
    }
    public function normal(){
        return $this->subDelivryMethod->where('parent_id',2);
    }
    public function parent()
    {
        return $this->belongsTo('App\DelivryMethod', 'parent_id');
    }





}
