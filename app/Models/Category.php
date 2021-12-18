<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable=['name','desc','parent_id','by_created','by_deleted'];

    public function products(){
        return $this->belongsToMany(Product::class , 'product_categories','category_id','product_id');
    }

    public function userCreated(){
        return $this->belongsTo(User::class,'by_created');
    }
    public function userDeleted(){
        return $this->belongsTo(User::class ,'by_deleted');
    }

    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function scopeRoot($query){
        $query->whereNull('parent_id');
    }
}
