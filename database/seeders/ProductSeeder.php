<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run() {
        $this->createBigPizza();
        $this->createSmallPizza();
        $this->createMiniPizza();
        $this->createFriedChicken();
        $this->createRoastChicken();
        $this->createRoastDessert();
        $this->createFriedDessert();
        $this->createComboPlatter();
        $this->createDrinks();
    }
    public function createBigPizza() {
        echo "Start generating big pizzas...\n";
        $big_pizza = [
            ["總匯 大披薩", "餡料：豬肉、火腿、洋蔥、青椒、蘑菇、青豆、義式臘腸;美味說明：特製餅皮鑲嵌豐富豬肉餡，鮮美火腿與道地義式肉腸，加上特選青蔬，經典組合、頂級享受！", 299, "總匯.png"],
            ["海鮮 大披薩", "餡料：花枝、蝦仁、蟹條、海苔粉;美味說明：細緻軟嫩的蟹條，嚼勁十足的花枝，以及鮮嫩彈牙的蝦仁，灑上海苔絲，宛如置身海港城市大快朵頤！", 299, "海鮮.png"],
            ["夏威夷 大披薩", "餡料：火腿、鳳梨;美味說明：煙燻火腿搭配特選鳳梨，經典不敗美味！", 299, "夏威夷.png"],
            ["西西里燻雞 大披薩", "餡料：蘑菇、燻雞肉;美味說明：散發濃郁香氣的煙燻雞肉加上蘑菇的鮮嫩口感，富嚼勁的餅皮，佐以特製番茄醬，讓你享受道地的義式風味！", 299, "燻雞.png"],
            ["地中海漁夫 大披薩", "餡料：照燒醬、鮪魚、魷魚丁、章魚丁、洋蔥、海苔粉、美乃滋;美味說明：鮪魚與章魚丁、魷魚丁鮮妙組合，灑上些許海苔絲再搭配順滑美乃滋，香甜海洋風味。", 299, "地中海漁夫.png"],
            ["日式燒肉 大披薩", "餡料：照燒醬、豬肉、青椒、洋蔥;美味說明：日式照燒醬料醃漬特選豬肉，清爽滋味搭配青椒與洋蔥，鹹甜交錯的日式BBQ風味", 299, "燒肉.png"],
            ["蔬菜 大披薩", "餡料：青椒、蘑菇、青豆、玉米、香菇、菠菜香草奶油醬;美味說明：(奶素)青翠青椒搭配香菇，再灑上玉米、青豆，帶給你豐富有元氣的輕食披薩口味。", 299, "蔬菜.png"],
            ["義式海陸 大披薩", "餡料：蝦仁、花枝、燻雞肉、培根、蘑菇、青豆、洋蔥;美味說明：爽口花枝及鮮甜蝦仁，灑上煙燻雞肉及培根，胃口大滿足！", 299, "海陸.png"],
            ["墨西哥嗆辣 大披薩", "餡料：墨西哥辣椒、肉醬、青椒、義式肉腸、豬肉丁;美味說明：嗆辣的墨西哥辣椒灑上Q彈餅皮，搭配義式臘腸和青椒 熱浪襲捲～火辣帶勁！", 299, "墨西哥辣椒.png"],
            ["蘋果肉桂 大披薩", "餡料：蘋果肉桂餡(含蘋果、葡萄乾、肉桂、月桂葉、萊姆酒)、起司醬、玉米、鳳梨*請注意！本品含微量酒精，雖經過高溫烹飪會蒸散揮發，對酒精過敏者仍請斟酌選購！;美味說明：香甜的蘋果果肉和蘋果醬調和出完美比例，搭配鳳梨和玉米，與起司融合出的清新風味，品嚐微酸微甜的果漾滋味!", 299, "蘋果肉桂.png"],
            ["炭火肉食 大披薩", "餡料：炭火燒肉醬.洋蔥.火腿.燻雞肉.培根.香草粉;美味說明：底層祕製炭火照燒醬，鹹甜口感搭配洋蔥提味 火腿、培根及燻雞肉的三重層次與起司完美融合 大口咬下超滿足", 299, "炭火肉食.png"],
            ["洋食黃金脆雞 大披薩", "餡料：咖哩雞腿塊、洋蔥、青椒、蘑菇、黑胡椒美乃滋;美味說明：微辣咖哩口味的酥脆雞腿肉，搭配洋蔥、青椒和蘑菇 獨特的黑胡椒美乃滋揉合出絕妙的洋食風味", 299, "黃金脆雞.png"],
            ["波隆納臘腸 大披薩", "餡料：義式肉腸、義式肉醬;美味說明：義式傳統道地的臘腸，與香濃滑潤起司的邂逅，佐以拿坡里特製肉醬，譜出一段難忘義式美食交響樂。", 299, "波隆納.png"],
            ["龍蝦沙拉 大披薩", "餡料：龍蝦沙拉(含山葵醬!).鳳梨.花枝.蒲鉾.香草粉*請注意!沙拉醬內含山葵(哇沙米)會有嗆辣感;美味說明：特調濃郁白醬搭配肥美的花枝與蒲鉾, 加上特調龍蝦沙拉,吃出滿口鮮甜的海洋風味!", 299, "龍蝦沙拉.png"],
            ["法式白醬海鮮 大披薩", "美味說明：彈牙蝦仁與兩種蟹味條的相遇，滿滿海味就在披薩裡！;餡料：奶油白醬、蝦仁、蟹條、蒲鉾", 299, "海鮮.png"],
            ["法式白醬海鮮 大披薩", "美味說明：彈牙蝦仁與兩種蟹味條的相遇，滿滿海味就在披薩裡！;餡料：奶油白醬、蝦仁、蟹條、蒲鉾", 299, "海鮮.png"],
        ];
        $new_products = collect();
        foreach ($big_pizza as $pizza) {
            $new_products->push(Product::create([
                'name'        => $pizza[0],
                'description' => $pizza[1],
                'price'       => $pizza[2],
                'img_url'     => $pizza[3],
            ]));
        }
        $category = Category::where('name', '大披薩')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }
    public function createSmallPizza() {
        echo "Start generating small pizzas...\n";
        $small_pizza = [
            ["總匯 小披薩", "餡料：豬肉、火腿、洋蔥、青椒、蘑菇、青豆、義式臘腸;美味說明：特製餅皮鑲嵌豐富豬肉餡，鮮美火腿與道地義式肉腸，加上特選青蔬，經典組合、頂級享受！", 199, "總匯.png"],
            ["海鮮 小披薩", "餡料：花枝、蝦仁、蟹條、海苔粉;美味說明：細緻軟嫩的蟹條，嚼勁十足的花枝，以及鮮嫩彈牙的蝦仁，灑上海苔絲，宛如置身海港城市大快朵頤！", 199, "海鮮.png"],
            ["夏威夷 小披薩", "餡料：火腿、鳳梨;美味說明：煙燻火腿搭配特選鳳梨，經典不敗美味！", 199, "夏威夷.png"],
            ["西西里燻雞 小披薩", "餡料：蘑菇、燻雞肉;美味說明：散發濃郁香氣的煙燻雞肉加上蘑菇的鮮嫩口感，富嚼勁的餅皮，佐以特製番茄醬，讓你享受道地的義式風味！", 199, "燻雞.png"],
            ["地中海漁夫 小披薩", "餡料：照燒醬、鮪魚、魷魚丁、章魚丁、洋蔥、海苔粉、美乃滋;美味說明：鮪魚與章魚丁、魷魚丁鮮妙組合，灑上些許海苔絲再搭配順滑美乃滋，香甜海洋風味。", 199, "地中海漁夫.png"],
            ["日式燒肉 小披薩", "餡料：照燒醬、豬肉、青椒、洋蔥;美味說明：日式照燒醬料醃漬特選豬肉，清爽滋味搭配青椒與洋蔥，鹹甜交錯的日式BBQ風味", 199, "燒肉.png"],
            ["蔬菜 小披薩", "餡料：青椒、蘑菇、青豆、玉米、香菇、菠菜香草奶油醬;美味說明：(奶素)青翠青椒搭配香菇，再灑上玉米、青豆，帶給你豐富有元氣的輕食披薩口味。", 199, "蔬菜.png"],
            ["義式海陸 小披薩", "餡料：蝦仁、花枝、燻雞肉、培根、蘑菇、青豆、洋蔥;美味說明：爽口花枝及鮮甜蝦仁，灑上煙燻雞肉及培根，胃口大滿足！", 199, "海陸.png"],
            ["墨西哥嗆辣 小披薩", "餡料：墨西哥辣椒、肉醬、青椒、義式肉腸、豬肉丁;美味說明：嗆辣的墨西哥辣椒灑上Q彈餅皮，搭配義式臘腸和青椒 熱浪襲捲～火辣帶勁！", 199, "墨西哥辣椒.png"],
            ["蘋果肉桂 小披薩", "餡料：蘋果肉桂餡(含蘋果、葡萄乾、肉桂、月桂葉、萊姆酒)、起司醬、玉米、鳳梨*請注意！本品含微量酒精，雖經過高溫烹飪會蒸散揮發，對酒精過敏者仍請斟酌選購！;美味說明：香甜的蘋果果肉和蘋果醬調和出完美比例，搭配鳳梨和玉米，與起司融合出的清新風味，品嚐微酸微甜的果漾滋味!", 199, "蘋果肉桂.png"],
            ["炭火肉食 小披薩", "餡料：炭火燒肉醬.洋蔥.火腿.燻雞肉.培根.香草粉;美味說明：底層祕製炭火照燒醬，鹹甜口感搭配洋蔥提味 火腿、培根及燻雞肉的三重層次與起司完美融合 大口咬下超滿足", 199, "炭火肉食.png"],
            ["洋食黃金脆雞 小披薩", "餡料：咖哩雞腿塊、洋蔥、青椒、蘑菇、黑胡椒美乃滋;美味說明：微辣咖哩口味的酥脆雞腿肉，搭配洋蔥、青椒和蘑菇 獨特的黑胡椒美乃滋揉合出絕妙的洋食風味", 199, "黃金脆雞.png"],
            ["波隆納臘腸 小披薩", "餡料：義式肉腸、義式肉醬;美味說明：義式傳統道地的臘腸，與香濃滑潤起司的邂逅，佐以拿坡里特製肉醬，譜出一段難忘義式美食交響樂。", 199, "波隆納.png"],
            ["龍蝦沙拉 小披薩", "餡料：龍蝦沙拉(含山葵醬!).鳳梨.花枝.蒲鉾.香草粉*請注意!沙拉醬內含山葵(哇沙米)會有嗆辣感;美味說明：特調濃郁白醬搭配肥美的花枝與蒲鉾, 加上特調龍蝦沙拉,吃出滿口鮮甜的海洋風味!", 199, "龍蝦沙拉.png"],
            ["法式白醬海鮮 小披薩", "美味說明：彈牙蝦仁與兩種蟹味條的相遇，滿滿海味就在披薩裡！;餡料：奶油白醬、蝦仁、蟹條、蒲鉾", 199, "海鮮.png"],
            ["法式白醬海鮮 小披薩", "美味說明：彈牙蝦仁與兩種蟹味條的相遇，滿滿海味就在披薩裡！;餡料：奶油白醬、蝦仁、蟹條、蒲鉾", 199, "海鮮.png"],
        ];
        $new_products = collect();
        foreach ($small_pizza as $pizza) {
            $new_products->push(Product::create([
                'name'        => $pizza[0],
                'description' => $pizza[1],
                'price'       => $pizza[2],
                'img_url'     => $pizza[3],
            ]));
        }
        $category = Category::where('name', '小披薩')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createMiniPizza() {
        echo "Start generating mini pizzas...\n";
        $mini_pizza = [
            ['Mini總匯', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-總匯.png"],
            ['Mini海鮮', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-海鮮.png"],
            ['Mini夏威夷', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-夏威夷.png"],
            ['Mini燻雞', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-燻雞.png"],
            ['Mini蔬菜', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-蔬菜.png"],
            ['Mini臘腸', "美味說明：盡情享受一個人的美味披薩時光！;*10個以上請前一日預訂", 89, "mini-臘腸.png"],
        ];
        $new_products = collect();
        foreach ($mini_pizza as $pizza) {
            $new_products->push(Product::create([
                'name'        => $pizza[0],
                'description' => $pizza[1],
                'price'       => $pizza[2],
                'img_url'     => $pizza[3],
            ]));
        }
        $category = Category::where('name', 'MINI披薩')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createFriedChicken() {
        echo "Start generating fried chickens...\n";
        $fried_chickens = [
            ["6塊義式炸雞(辣味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 299, "辣味", "6塊雞", "炸雞.png"],
            ["9塊義式炸雞(辣味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 439, "辣味", "9塊雞", "炸雞.png"],
            ["4塊義式炸雞(辣味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 300, "辣味", "4塊雞", "炸雞.png"],
            ["6塊原味炸雞(蒜味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 299, "蒜味", "6塊雞", "炸雞.png"],
            ["9塊原味炸雞(蒜味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 439, "蒜味", "9塊雞", "炸雞.png"],
            ["4塊原味炸雞(蒜味)", "上等雞肉、家傳按摩、定溫油炸、現點現炸、獨特炸雞粉", 300, "蒜味", "4塊雞", "炸雞.png"],
            ["6塊咔滋雞腿(辣味)", "嚴選鮮嫩雞腿，以獨有的按壓技術現裹酥炸，內嫩外酥的義式經典", 329, "辣味", "6塊雞", "炸雞.png"],
            ["9塊咔滋雞腿(辣味)", "嚴選鮮嫩雞腿，以獨有的按壓技術現裹酥炸，內嫩外酥的義式經典", 484, "辣味", "9塊雞", "炸雞.png"],
            ["4塊咔滋雞腿(辣味)", "嚴選鮮嫩雞腿，以獨有的按壓技術現裹酥炸，內嫩外酥的義式經典", 300, "辣味", "4塊雞", "炸雞.png"],
        ];
        $garlic_flavor_category = Category::where('name', '蒜味')->first();
        $spicy_flavor_category  = Category::where('name', '辣味')->first();
        $four_pieces_category   = Category::where('name', '4塊雞')->first();
        $six_pieces_category    = Category::where('name', '6塊雞')->first();
        $nine_pieces_category   = Category::where('name', '9塊雞')->first();
        $fried_category         = Category::where('name', '炸雞')->first();

        foreach ($fried_chickens as $chicken) {
            $new_product = Product::create([
                'name'        => $chicken[0],
                'description' => $chicken[1],
                'price'       => $chicken[2],
                'img_url'     => $chicken[5],
            ]);
            $fried_category->products()->save($new_product);
            // flavor
            if ($chicken[3] == '蒜味') {
                $garlic_flavor_category->products()->save($new_product);
            } elseif ($chicken[3] == '辣味') {
                $spicy_flavor_category->products()->save($new_product);
            }
            // pieces
            if ($chicken[4] == '6塊雞') {
                $six_pieces_category->products()->save($new_product);
            } elseif ($chicken[4] == '9塊雞') {
                $nine_pieces_category->products()->save($new_product);
            } elseif ($chicken[4] == '4塊雞') {
                $four_pieces_category->products()->save($new_product);
            }
        }
        echo "Complete!\n";
    }

    public function createRoastChicken() {
        echo "Start generating roast chickens...\n";
        $roast_chickens = [
            ["6塊烤雞 (不辣)", "美味說明：鮮嫩雞肉醃製主廚獨家義式香草醬料，香嫩多汁，滿嘴都是好吃！;不辣 *雞肉部位恕不挑選", 299, "烤雞.png"],
            ["9塊烤雞 (不辣)", "美味說明：鮮嫩雞肉醃製主廚獨家義式香草醬料，香嫩多汁，滿嘴都是好吃！;不辣 *品項依門市搭配為準(雞肉部位恕不挑選)", 439, "烤雞.png"],
        ];
        $new_products = collect();
        foreach ($roast_chickens as $chicken) {
            $new_products->push(Product::create([
                'name'        => $chicken[0],
                'description' => $chicken[1],
                'price'       => $chicken[2],
                'img_url'     => $chicken[3],
            ]));
        }
        $category = Category::where('name', '烤雞')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createRoastDessert() {
        echo "Start generating roast desserts...\n";
        $roast_desserts = [
            ["焗烤時蔬", "餡料：奶油白醬(非素食)、羅馬花椰菜、蘑菇、香菇、香草粉;注意事項：*圖片僅供參考 *奶油白醬內含洋蔥及肉骨成份!", 199, "焗烤時蔬.png"],
            ["香辣烤雞翅 (辣味3入)", '', 99, "香辣烤雞翅.png"],
            ["香草烤雞翅 (不辣4入)", '', 89, "香草烤雞翅.png"],
            ["德式帶骨香腸 (2入)", "精選上等豬絞肉製成帶骨香腸，慢火烘烤出微焦外皮，肉質香Q彈牙!", 79, "德式帶骨香腸.png"],
            ["起酥紅豆派 (2入)", '', 49, "起酥紅豆派.png"],
        ];
        $new_products = collect();
        foreach ($roast_desserts as $dessert) {
            $new_products->push(Product::create([
                'name'        => $dessert[0],
                'description' => $dessert[1],
                'price'       => $dessert[2],
                'img_url'     => $dessert[3],
            ]));
        }
        $category = Category::where('name', '烤點心')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createFriedDessert() {
        echo "Start generating fried desserts...\n";
        $fried_desserts = [
            ["黃金咖哩雞腿條黃金咖哩雞腿條", "(約200g/份)", 99, "黃金咖哩雞腿條.png"],
            ["現炸脆薯", "約120g/份;酥炸馬鈴薯條，獨特調味灑上海苔芝麻粉", 49, "現炸脆薯.png"],
            ["香酥雞塊(8入)", "(8入/份)", 69, "香酥雞塊.png"],
        ];
        $new_products = collect();
        foreach ($fried_desserts as $dessert) {
            $new_products->push(Product::create([
                'name'        => $dessert[0],
                'description' => $dessert[1],
                'price'       => $dessert[2],
                'img_url'     => $dessert[3],
            ]));
        }
        $category = Category::where('name', '炸點心')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createComboPlatter() {
        echo "Start generating combo platters...\n";
        $combo_platters = [
            ["哈拉拼盤", "拼盤內含項目：2份香草烤雞翅(4支/份)+8塊香酥雞塊+2份現炸脆薯(約120g/份)", 269, "拼盤.png"],
            ["歡樂拼盤", "拼盤內含項目：2個起酥紅豆派+2份德式帶骨香腸(2入/份)+2份現炸脆薯(約120g/份)", 269, "拼盤.png"],
        ];
        $new_products = collect();
        foreach ($combo_platters as $platter) {
            $new_products->push(Product::create([
                'name'        => $platter[0],
                'description' => $platter[1],
                'price'       => $platter[2],
                'img_url'     => $platter[3],
            ]));
        }
        $category = Category::where('name', '拼盤')->first();
        $category->products()->saveMany($new_products);
        echo "Complete!\n";
    }

    public function createDrinks() {
        echo "Start generating drinks...\n";
        $drinks = [
            ["Zero零卡可樂350ml", '', 25, "Zero零卡可樂350ml.jpg"],
            ["可口可樂350ml", '', 25, "可口可樂350ml.png"],
            ["雪碧350ml", '', 25, "雪碧350ml.png"],
            ["美粒果清果汁(柳橙)350ml", '', 25, "美粒果清果汁(柳橙)350ml.jpg"],
            ["美粒果罐裝蘋果汁320ml", '', 25, "美粒果罐裝蘋果汁320ml.jpg"],
            ["可口可樂1250ml", '', 40, "可口可樂1250ml.png"],
            ["雪碧1250ml", '', 40, "雪碧1250ml.png"],
            ["飛想茶1250ml", '', 40, "飛想茶1250ml.png"],
            ["原萃日式綠茶1250ml", '', 40, "原萃日式綠茶1250ml.jpg"],
            ["Zero零卡可樂1250ml", '', 40, "Zero零卡可樂1250ml.jpg"],
            ["原萃日式綠茶350ml", '', 40, "原萃日式綠茶350ml.png"],
        ];
        $new_products = collect();
        $drinks1250   = collect();
        foreach ($drinks as $drink) {
            $product = Product::create([
                'name'        => $drink[0],
                'description' => $drink[1],
                'price'       => $drink[2],
                'img_url'     => $drink[3],
            ]);
            $new_products->push($product);
            if ($drink[2] === 40) {
                $drinks1250->push($product);
            }
        }
        $category = Category::where('name', '飲料')->first();
        $category->products()->saveMany($new_products);
        $category = Category::where('name', '飲料1250')->first();
        $category->products()->saveMany($drinks1250);
        echo "Complete!\n";
    }
}
