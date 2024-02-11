<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Database\Seeder;

class CategoryPackageSeeder extends Seeder {
    public function run() {
        $relations = [
            ["團購披薩", "大披薩", 5],
            ["團購炸雞餐", "小披薩", 5],
            ["團購炸雞餐", "飲料1250", 5],
            ["團購炸雞餐", "9塊雞", 5],
            ["普羅旺斯烤雞餐", "小披薩", 1],
            ["普羅旺斯烤雞餐", "飲料1250", 1],
            ["普羅旺斯烤雞餐", "9塊雞", 1],
            ["超大炸雞餐", "小披薩", 1],
            ["超大炸雞餐", "飲料1250", 1],
            ["超大炸雞餐", "9塊雞", 1],
            ["歡樂雙雞餐", "大披薩", 1],
            ["歡樂雙雞餐", "飲料1250", 1],
            ["歡樂雙雞餐", "9塊雞", 2],
            ["迷你炸雞餐", "小披薩", 1],
            ["迷你炸雞餐", "飲料1250", 1],
            ["迷你炸雞餐", "4塊雞", 1],
            ["三人同享餐", "小披薩", 1],
            ["三人同享餐", "飲料1250", 1],
            ["三人同享餐", "6塊雞", 1],
        ];
        echo "Start generating category package relationship..." . PHP_EOL;
        foreach ($relations as $relation) {
            $package  = Package::where('name', $relation[0])->first();
            $category = Category::where('name', $relation[1])->first();
            $package->categories()->attach($category->id, ['quantity' => $relation[2]]);
        }
        echo "Complete!" . PHP_EOL;
    }
}
