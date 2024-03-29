<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder {
    public function run() {
        $stores = [
            ["天母店", "北投區", "天母西路109號", "11:00-21:30"],
            ["民安店", "新莊區", "民安西路64號", "11:00-21:30"],
            ["基隆店", "仁愛區", "仁二路163號1樓", "11:00-21:30"],
            ["八德店", "松山區", "八德路三段112號", "11:00-21:30"],
            ["新店店", "新店區", "中正路321號", "11:00-21:30"],
            ["景新店", "中和區", "安樂路8-1號", "11:00-21:30"],
            ["民生店", "大同區", "民生西路83號", "11:00-21:30"],
            ["三重店", "三重區", "正義北路295號", "11:00-21:30"],
            ["士林店", "士林區", "文林路430號1樓", "11:00-21:30"],
            ["蘆洲店", "蘆洲區", "中山二路12號", "11:00-21:30"],
            ["龍江店", "中山區", "龍江路303號", "11:00-21:30"],
            ["竹圍店", "淡水區", "民權路113號2樓", "11:00-21:30"],
            ["興隆店", "文山區", "興隆路三段31號", "11:00-21:30"],
            ["土城店", "土城區", "中央路二段240號", "11:00-21:30"],
            ["南昌店", "中正區", "南昌路一段151號", "11:00-21:30"],
            ["內湖店", "內湖區", "成功路三段141號", "11:00-21:30"],
            ["淡水店", "淡水區", "中山北路一段82號", "11:00-21:30"],
            ["汐止店", "汐止區", "大同路二段411.413號1樓", "11:00-21:30"],
            ["樹林店", "樹林區", "中山路一段170號", "11:00-21:30"],
            ["西園店", "萬華區", "西園路二段244號", "11:00-21:30"],
            ["永吉店", "信義區", "永吉路343號1樓", "11:00-21:30"],
            ["泰山店", "泰山區", "明志路一段27號", "11:00-21:30"],
            ["北投店", "北投區", "中央北路一段125號", "11:00-21:30"],
            ["三民店", "板橋區", "三民路二段136-1號", "11:00-21:30"],
            ["南港店", "南港區", "三重路7號", "11:00-21:30"],
            ["板忠店", "板橋區", "忠孝路167號", "11:00-21:30"],
            ["東湖店", "內湖區", "東湖路161號", "11:00-21:30"],
            ["永和店", "永和區", "竹林路78號", "11:00-21:30"],
            ["新莊店", "新莊區", "中正路242號", "11:00-21:30"],
            ["中和店", "中和區", "連城路220號", "11:00-21:30"],
            ["和平店", "大安區", "和平東路二段95-1號", "11:00-21:30"],
            ["基隆愛買店", "信義區", "深溪路53號B1(基隆愛買內)", "11:00-21:00"],
            ["汐止遠雄店", "汐止區", "新台五路一段95號B1 (IFG遠雄購物中心內)", "11:00-21:00"],
            ["湯城店", "三重區", "光復路一段38號1樓", "11:00-21:30"],
            ["劍南店", "內湖區", "內湖路1段49號", "11:00-21:30"],
            ["松江店", "中山區", "松江路42號", "11:00-21:30"],
            ["自強店", "三重區", "自強路三段95號1樓", "11:00-21:30"],
            ["忠孝愛買", "信義區", "忠孝東路5段297號(愛買B1)", "11:00-21:00"],
            ["鶯歌店", "鶯歌區", "中正一路25號", "11:00-21:30"],
            ["安康店", "新店區", "安康路2段4號", "11:00-21:30"],
            ["桃園店", "桃園區", "中正路126號1樓", "11:00-21:30"],
            ["中壢店", "中壢區", "中正路109號", "11:00-21:30"],
            ["北大店", "北區北", "大路316號", "11:00-21:30"],
            ["內壢店", "中壢區", "中華路一段212號", "11:00-21:30"],
            ["光復店", "東區光", "復路一段323號", "11:00-21:30"],
            ["大湳店", "八德區", "介壽路一段922號", "11:00-21:30"],
            ["南崁店", "蘆竹區", "南崁路1段18號", "11:00-21:30"],
            ["龍潭店", "龍潭區", "中正路87號", "11:00-21:30"],
            ["桃園二店", "桃園區", "中正路613號", "11:00-21:30"],
            ["楊梅店", "楊梅區", "大成路184號1號", "11:00-21:30"],
            ["三峽店", "三峽區", "復興路43號", "11:00-21:30"],
            ["竹北店", "竹北市", "光明六路109號", "11:00-21:30"],
            ["竹南店", "竹南鎮", "博愛街116號", "11:00-21:30"],
            ["新豐店", "新豐鄉", "新興路189之1號", "11:00-21:30"],
            ["中原店", "中壢區", "中山東路二段105號1樓", "11:00-21:30"],
            ["大園店", "大園區", "中正東路151號", "11:00-21:30"],
            ["國際店", "桃園區", "國際路一段1115號", "11:00-21:30"],
            ["新屋店", "中壢區", "民族路二段88號", "11:00-21:30"],
            ["林森店", "東區林", "森路18號1樓(晶品城)", "11:00-21:30"],
            ["林口文三店", "龜山區", "文化三路320號", "11:00-21:30"],
            ["平鎮店", "平鎮區", "坤慶路1號", "11:00-21:30"],
            ["鶯桃店", "八德區", "桃鶯路89號1樓", "11:00-21:30"],
            ["林口文一店", "林口區", "文化一路一段207之2號", "11:00-21:30"],
            ["苗栗店", "苗栗市", "中正路491號", "11:00-21:30"],
            ["竹東店", "竹東鎮", "長春路三段154號1樓", "11:00-21:30"],
            ["龜山店", "龜山區", "萬壽路二段1159號", "11:00-21:30"],
            ["頭份店", "頭份鎮", "中央路258號", "11:00-21:30"],
        ];
        echo 'Start generating stores...' . PHP_EOL;
        foreach ($stores as $store) {
            Store::create([
                'name'          => $store[0],
                'district'      => $store[1],
                'address'       => $store[2],
                'opening_hours' => $store[3],
            ]);
        }
        echo 'Complete!' . PHP_EOL;
    }
}
