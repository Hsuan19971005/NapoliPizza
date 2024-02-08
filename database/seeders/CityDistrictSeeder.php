<?php

namespace Database\Seeders;
use App\Models\CityDistrict;
use Illuminate\Database\Seeder;

class CityDistrictSeeder extends Seeder {
    public function run() {
        $cities = [
            "臺北市" => ["北投區", "松山區", "大同區", "士林區", "中山區", "文山區", "中正區", "內湖區", "萬華區", "信義區", "南港區", "大安區"],
            "新北市" => ["新莊區", "新店區", "中和區", "三重區", "蘆洲區", "淡水區", "土城區", "汐止區", "樹林區", "泰山區", "板橋區", "永和區", "鶯歌區", "三峽區", "林口區"],
            "基隆市" => ["仁愛區", "信義區"],
            "桃園市" => ["桃園區", "中壢區", "八德區", "蘆竹區", "龍潭區", "楊梅區", "大園區", "龜山區", "平鎮區"],
            "新竹市" => ["北區北", "東區光", "東區林"],
            "新竹縣" => ["竹北市", "新豐鄉", "竹東鎮"],
            "苗栗縣" => ["竹南鎮", "苗栗市", "頭份鎮"],
        ];
        echo 'Start generating cities and districts data...' . PHP_EOL;
        foreach ($cities as $key => $val) {
            CityDistrict::create([
                'city_name'      => $key,
                'district_names' => $val,
            ]);
        }
        echo 'Complete!' . PHP_EOL;
    }
}
