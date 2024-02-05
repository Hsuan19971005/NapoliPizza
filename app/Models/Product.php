<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = ['name', 'price', 'description'];

    public function categories() {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public static function getPizza() {
        $products   = collect();
        $categories = Category::with('products')->whereIn('name', ["大披薩", "小披薩"])->get();
        foreach ($categories as $category) {
            $products = $products->merge($category->products);
        }
        return $products;
    }

    public static function getMiniPizza() {
        $category = Category::where('name', "MINI披薩")->first();
        $products = $category->products;
        return $products;
    }

    public static function getChicken() {
        $products   = collect();
        $categories = Category::with('products')->whereIn('name', ["炸雞", "烤雞"])->get();
        foreach ($categories as $category) {
            $products = $products->merge($category->products);
        }
        return $products;
    }
}
