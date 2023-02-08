<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
   protected $table='languages';
   protected $fillable=['abbr','name','direction','active','created_at','updated_at'];
   protected $hidden=['created_at','updated_at'];

   public  function  scopeActive($query){
       return $query->where('active','1');
   }


    public  function  getDirection(){
        return $this->direction=='rtl'?"من اليمين الي اليسار":"من اليسار الي اليمين";
    }
    public  function  getActive(){
       return $this->active==1?"مفعل":"غير مفعل";
   }
}
