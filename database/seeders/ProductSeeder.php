<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '4600',
                'name' => "トリプルイヤー記念メタリックTシャツ",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "2020年 天龍源一郎古希 天龍プロジェクト10周年 引退5周年とおめでたいことが重なったトリプルイヤーを記念して超豪華なメタリック(金箔押し)Tシャツは フロントのRevolutionロゴ、バックの記念日である2月2日(天龍源一郎誕生日)4月19日(天龍プロジェクト旗揚げ日)11月15日(引退記念日)の数字、すべてが金色に輝くデザインをなっております！ 絶対にゲットして頂きたい記念グッズです！",
                'image' => "ten.jpeg"
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '5500',
                'name' => "堂本剛 2020　【トラベルセット】",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "2020年 天龍源一郎古希 天龍プロジェクト10周年 引退5周年とおめでたいことが重なったトリプルイヤーを記念して超豪華なメタリック(金箔押し)Tシャツは フロントのRevolutionロゴ、バックの記念日である2月2日(天龍源一郎誕生日)4月19日(天龍プロジェクト旗揚げ日)11月15日(引退記念日)の数字、すべてが金色に輝くデザインをなっております！ 絶対にゲットして頂きたい記念グッズです！",
                'image' => "bag.jpeg"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '3980',
                'name' => "Feel da CITY 2022 【ショッピングバッグ】",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "検索用ワード： SixTONES ジェシー 京本大我 松村北斗 田中樹 森本慎太郎 地優吾 sixtones ストーンズ ストーン スノスト Six TONES ジェシー 京本大我 松村北斗 田中樹 高地優吾 森本慎太郎 Imitation Rain 滝沢歌舞伎 京本 大我 松村 北斗 田中 樹 高地 優吾 森本 慎太郎 カウコン プレゼント 誕生日 贈り物 お祝い ジャニファン グッズ コレクター ファン コンサート ライブ クリスマス ",
                'image' => "ecoBag.jpeg"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '7500',
                'name' => "btsソーパズル500ピース",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "bts tinytan puzzle1000ピース ライセンス認証品 正規通関輸入品。 モニター発色の具合により色合いが異なる場合がございます。",
                'image' => "bts.jpeg"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '4600',
                'name' => "ネオンアートTシャツ",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "ネオンアートTシャツは、UVライトやスマートフォンのライトを使って絵が描けるTシャツです。MADE IN UK。暗い場所では約5分間、光り続け、徐々に消えていく。何度でも描くことができるので、様々な場面で楽しめます。パーティー、イベント、ライブ、ハロウィン、クリスマスに！",
                'image' => "tshirt.jpeg"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 1,
                'price' => '1610',
                'name' => "レインボーファンタジー",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "なんと! 1本で18色のカラーチェンジができちゃうペンライトがこれ、レインボーファンタジーです!! コンサートやイベントによって、いくつかのカラーを使い分けたくなってもレインボーファンタジーがあれば、ほとんどの推し色をカバーできちゃいます☆ 使い方もシンプルで簡単! 右送りと左送り、長押しで消灯。ペンライト初心者の方でも安心です。 さらに3秒毎に色が変わるオートカラーチェンジ機能も搭載。大人数で使えば幻想的な演出ができます。 電池交換も道具いらずで楽々! キャップも落ちません! さあレインボーファンタジーで次のコンサートを盛り上げちゃいましょう!!",
                'image' => "stick.jpeg"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 2,
                'price' => '4460',
                'name' => "レベッカ OST リパッケージ",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "2013年の実況録音(3CD)と2014年·2016年·2017年を代表するナンバー「一日また一日」、「神よ」、「レベッカ(長いバージョン)」、「永遠の命」などを含むSpecial CDを含むミュージカル「レベッカO.S.T.」のリパッケージアルバムが9月25日(月)に発売される。",
                'image' => "rebecaProduct.png"
            ],[
                'created_at' => now(),
                'updated_at' => now(),
                'concert_id' => 3,
                'price' => '1980',
                'name' => "Leap of faith 【初回限定盤】",
                'color' => json_encode(['Black' ,'Blue', 'Red', 'White', 'Yellow']),
                'size' => json_encode(['S' ,'M', 'L']),
                'stock'=>7,
                'detail' => "2009年3月にてボーカルnaoが脱退。2009年10月、南條愛乃をボーカルに迎え、TVアニメ「とある科学の超電磁砲（レールガン）」のOPテーマにて再始動が決定！",
                'image' => "fripSide.jpeg"
            ]
        ]);
    }
}
