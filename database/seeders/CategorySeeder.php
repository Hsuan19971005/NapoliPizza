<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
    public function run() {
        echo "Start generating categories...\n";
        $categories = [
            "大披薩",
            "小披薩",
            "MINI披薩",
            "炸雞",
            "烤雞",
            "4塊雞",
            "6塊雞",
            "9塊雞",
            "蒜味",
            "辣味",
            "烤點心",
            "炸點心",
            "拼盤",
            "甜點",
            "飲料",
            "飲料1250",
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
        echo "Complete!\n";
    }
}
