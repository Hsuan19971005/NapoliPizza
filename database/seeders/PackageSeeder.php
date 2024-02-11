<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder {
    public function run() {
        $packages = [
            ["團購披薩", "5個大披薩 (口味任選)", 1450],
            ["團購炸雞餐", "美味說明 5組全家炸雞餐(小披薩+9塊炸雞+1瓶飲料);*炸雞可整桶換烤雞，雞肉部位恕不得挑選!", 3300],
            ["普羅旺斯烤雞餐", "9 塊普羅旺斯烤雞 + 小披薩 + 1250ml 瓶裝飲料;*烤雞部位恕不得挑選!", 669],
            ["超大炸雞餐", "9 塊義式炸雞+大披薩 + 1250ml 瓶裝飲料;*炸雞可整桶換烤雞，雞肉部位恕不得挑選!", 769],
            ["歡樂雙雞餐", "套餐內容 6塊炸雞+6塊烤雞+1個大披薩+1250ml飲料;*炸雞可整桶換烤雞，雞肉部位恕不得挑選", 928],
            ["迷你炸雞餐", "4 塊義式炸雞+小披薩 + 1250ml 瓶裝飲料;*圖片僅供參考 *雞肉部位恕不挑選!", 429],
            ["三人同享餐", "6 塊義式炸雞 + 小披薩 + 1250ml 瓶裝飲料;*炸雞可整桶換烤雞，雞肉部位恕不得挑選!", 529],
        ];
        echo "Start generating packages..." . PHP_EOL;
        foreach ($packages as $package) {
            Package::create([
                'name'        => $package[0],
                'description' => $package[1],
                'price'       => $package[2],
            ]);
        }
        echo "Complete!" . PHP_EOL;
    }
}
