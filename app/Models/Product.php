<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 
        'brand_id', 
        'name', 
        'slug', 
        'description', 
        'image_path', 
        'price', 
        'stock', 
        'created_by', 
        'updated_by'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class); // 
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by')->withTrashed();
    }
}
