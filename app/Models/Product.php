<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable=['name','desc','price','by_created','by_deleted'];

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories','product_id','category_id');
    }
    public function userCreated(){
        return $this->belongsTo(User::class,'by_created');
    }
    public function userDeleted(){
        return $this->belongsTo(User::class,'by_deleted');
    }
}
