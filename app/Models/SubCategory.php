<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $table='sub_categories';
    protected $fillable=['translate_lang','translate_of','name','active','slug','parent_id','photo','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function  scopeSelection($query) {
        return $query->select('id','translate_lang','translate_of','name','category_id','photo','slug','parent_id','active');
    }

    public  function  getActive(){
        return $this->active==1?"مفعل":"غير مفعل";
    }


    public  function  scopeActive($query){
        return $query->where('active','1');
    }

//Get Main Category
public function mainCategory(){
        return $this->belongsTo('App\Models\MainCategory','category_id','id');
}
public subCategory(){
   return $this->hasMany(self::class,'translate_of'); 
}
}
 