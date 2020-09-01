<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories(){
        return $this->hasMany('App\Models\Category','parent_id')->where('status',1 );
    }
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->select('id','section_name');
    }
    public function parentCategory(){
        return $this->belongsTo('App\Models\Category','parent_id')->select('id','category_name');
    }
}
