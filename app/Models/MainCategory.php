<?php


namespace App\Models;

use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $table='main_categories';
    protected $fillable=['translate_lang','translate_of','name','active','slug','photo','created_at','updated_at'];
    protected $hidden=['created_at'];

    public function  scopeSelection($query) {
        return $query->select('id','translate_lang','translate_of','name','photo','slug','active');
}

    public  function  getActive(){
        return $this->active==1?"مفعل":"غير مفعل";
    }


    public  function  scopeActive($query){
        return $query->where('active','1');
    }


//    Relations

//To Get Translations Of Main Category

public function  categories(){
        return $this->hasMany(self::class,'translate_of');
        }

        public  function  vendors(){
        return $this->hasMany('App\Models\Vendor','category_id','id');
        }

    public  function  subCategories(){
        return $this->hasMany('App\Models\SubCategory','category_id','id');
    }


         public static  function boot(){
        parent::boot();
        MainCategory::observe(MainCategoryObserver::class);
         }

}
