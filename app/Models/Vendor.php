<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public $table = 'vendors';
    protected $fillable = ['name', 'password', 'email', 'logo', 'address', 'category_id', 'mobile', 'active', 'created_at', 'updated_at'];
    protected $hidden = ['updated_at', 'password'];

    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'email','address', 'logo', 'mobile', 'active', 'category_id');
    }

    public function getActive()
    {
        return $this->active == '1' ? "مفعل" : "غير مفعل";
    }


    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function setPasswordAttribute($password)
    {
        if(!is_null($password))
            $this->attributes['password']=bcrypt($password);
    }
    public  function mainCategory(){
        return $this->belongsTo('App\Models\MainCategory','category_id');
    }


}
