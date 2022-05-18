<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concert_list = [
            ['title' => 'ivs test', 'artist' => 'test', 'cover_image' => 'cover_image/0PJdEMLUNRgsKUqYxGLVWc34FIMPjEXd2SAWA87r.jpg'],
            ['title' => '天龍プロジェクト', 'artist' => 'SURVIVE THE REVOLUTION Vol.17', 'cover_image' => 'cover_image/f640x640-2.jpeg'],
            ['title' => 'レベッカ', 'artist' => 'オク·ジュヒョン', 'cover_image' => 'cover_image/f640x640-3.jpeg'],
            ['title' => 'fripSide VIRTUAL LIVE 2022', 'artist' => 'fripSide', 'cover_image' => 'cover_image/f640x640-4.jpeg'],
            ['title' => '東京ヤクルトスワローズ公式マスコット', 'artist' => 'つばみオンラインファンミーティング', 'cover_image' => 'cover_image/f640x640-5.jpeg'],
            ['title' => 'サンミュージック所属芸人', 'artist' => 'サンミュージックGETライブ', 'cover_image' => 'cover_image/f640x640-6.jpeg'],
            ['title' => 'RIZIN LANDMARK vol.2', 'artist' => 'RIZIN', 'cover_image' => 'cover_image/f640x640-7.jpeg'],
            ['title' => 'GLAY', 'artist' => 'FREEDOM ONLY', 'cover_image' => 'cover_image/f640x640-8.jpeg'],
            ['title' => 'Broken my toybox', 'artist' => 'Broken my toybox ／ CIVILIAN', 'cover_image' => 'cover_image/f640x640.jpeg'],
            ['title' => 'HKT48 LIVE TOUR 2022<東京公演>', 'artist' => 'HKT48', 'cover_image' => 'cover_image/세로긴image.jpg'],
            ['title' => '夢のIUコンサート', 'artist' => 'IU', 'cover_image' => 'cover_image/iuconcertImage.jpg'],
            ['title' => '夢の防弾少年団コンサート', 'artist' => '防弾少年団', 'cover_image' => 'cover_image/가로긴image.jpg'],
            ['title' => '夢のTWICEコンサート', 'artist' => 'TWICE', 'cover_image' => 'cover_image/twiceImage.jpg'],
            ['title' => 'mhaLive', 'artist' => 'mha', 'cover_image' => 'cover_image/mhaLive.jpg'],
            ['title' => 'Namida Live Concert', 'artist' => 'Namida', 'cover_image' => 'cover_image/Namida.jpg'],
            ['title' => 'Natsumeeri Live Concert', 'artist' => 'Natsumeeri', 'cover_image' => 'cover_image/next_natsumeeri-1.jpg'],
            ['title' => 'Rock Live Concert', 'artist' => 'android', 'cover_image' => 'cover_image/rockConcert.jpg'],
            ['title' => 'WOOGON Concert', 'artist' => 'WOOGON Solo LIVE-MAZE-オンライン生配信', 'cover_image' => 'cover_image/woogon.jpeg.jpeg'],
            ['title' => 'Sol Concert', 'artist' => 'Sol Special LIVE「ただいま」オンライン生配信', 'cover_image' => 'cover_image/sol.jpeg'],
            ['title' => '安斉かれん', 'artist' => 'First Online Live「ちゃんと世界線」', 'cover_image' => 'cover_image/girl.jpeg'],
            ['title' => '新田恵海、飯田里穂、徳井青空、佐々木未来', 'artist' => '歌う！声優女子４人LIVE', 'cover_image' => 'cover_image/girls.jpeg'],
            ['title' => 'TRITOPS', 'artist' => 'Special live Celebration', 'cover_image' => 'cover_image/tritops.jpeg'],
            ['title' => '夢のblackpinkコンサート', 'artist' => 'Blackpink', 'cover_image' => 'cover_image/blackpink.jpg'],
            ['title' => 'MNL48 コンサート', 'artist' => 'MNL48', 'cover_image' => 'cover_image/mnl48.jpg'],
            ['title' => '手越祐也', 'artist' => '手越祐也LIVE TOUR2022 NEW FRONTIER', 'cover_image' => 'cover_image/手越祐也.jpeg'],
            ['title' => '乃木坂46', 'artist' => '乃木坂46 10th YEAR BIRTHDAY LIVE', 'cover_image' => 'cover_image/乃木坂46.jpeg'],
            ['title' => '夢のIZONEコンサート', 'artist' => 'Izone', 'cover_image' => 'cover_image/izone.jpg.jpeg'],
            ['title' => '夢のAILEEコンサート', 'artist' => 'AILEE', 'cover_image' => 'cover_image/ailee.jpg'],
            ['title' => '夢のBOAコンサート', 'artist' => 'BOA', 'cover_image' => 'cover_image/boa.jpg'],
            ['title' => '夢のWINNERコンサート', 'artist' => 'WINNER', 'cover_image' => 'cover_image/winner.jpg'],
            ['title' => 'クロフェス', 'artist' => 'クロフェス2022～今年は野外フェスで盛り上がるしん！！～', 'cover_image' => 'cover_image/f375x375.jpeg'],
            ['title' => 'ゲスの極み乙女のコンサート', 'artist' => 'ゲスの極み乙女', 'cover_image' => 'cover_image/japan1.png.png'],
            ['title' => 'L’Arc～en～CielのLIVE', 'artist' => 'L’Arc～en～Ciel', 'cover_image' => 'cover_image/japan2.jpg'],
            ['title' => '夢のNCT127コンサート', 'artist' => 'NCT 127', 'cover_image' => 'cover_image/nct.jpg'],
            ['title' => 'DINO-A-LIVE', 'artist' => 'DINO', 'cover_image' => 'cover_image/japan3.jpg'],
            ['title' => '夢のAPINKコンサート', 'artist' => 'APINK', 'cover_image' => 'cover_image/apink.jpg'],
            ['title' => '工藤遥', 'artist' => '工藤遥「今日休みなんで、ちょっと喋ってみます。」vol.9', 'cover_image' => 'cover_image/工藤遥.jpeg'],
            ['title' => 'JCIF', 'artist' => '【BLOSSOMステージ】JCIF2022', 'cover_image' => 'cover_image/JCIF.jpeg'],
            ['title' => 'Mr.Children', 'artist' => 'Mr.Children Tour 半世紀へのエントランス', 'cover_image' => 'cover_image/Mr.Children.jpeg'],
            ['title' => '2022クォン·ウンビの最初のコンサート「SecretDoors」', 'artist' => 'クォン·ウンビ', 'cover_image' => 'cover_image/Secret Doors.gif'],
            ['title' => 'Jan Rishitsky Piano Recital', 'artist' => 'Jan Rishitsky', 'cover_image' => 'cover_image/piano.gif'],
            ['title' => 'YG FAMILY WORLD TOUR', 'artist' => 'YG', 'cover_image' => 'cover_image/yg.jpg'],
            ['title' => 'あいみょん Concert', 'artist' => 'あいみょん', 'cover_image' => 'cover_image/imyon.jpg'],


        ];

        $createConcert = function ($concertData) {
            $context = "修飾語が要らない作品<レベッカ>6番目のシーズンに戻ってきた代替不可「レジェンドミュージカル」約12ヶ国、10ヶ国語で公演され、全世界1900万観客を突破した興行作2013年韓国初演から2019年5番目のシーズンまで計687回公演、83万人を記録した。 冷めない「レベッカシンドローム」 映画より強烈なサスペンスの饗宴 強力なキーリングナンバー、劇の緊張感を高める舞台セットが集結した断然最高の「マスターピース」英国を代表する作家ダフニー·デュ·モリエの小説とスリラーの巨匠アルフレッド·ヒッチコックの映画<レベッカ>をモチーフにした作品。 「エリザベート」、「モーツァルト！」、「マリー·アントワネット」など40年間最高の作品を輩出したミヒャエル·クンツェ劇作家とシルベスター·ルベイ作曲家の指折りの傑作しっかりと編まれた脚本と無駄のない演出「レベッカ」、「神よ」、「一日一日」など強力なキリングナンバーと生きて動くような「マンダリー邸」の舞台セットでミュージカル界の権力座を占めた作品。";
            $detail = "HKT48 LIVE TOUR 2022 ～Under the Spotlight～<東京公演> 2019年ぶりのHKT48ツアー！今回は九州だけでなく、東京・神奈川・愛知でも開催！また、スペシャルゲストが出演する特別なツアーとなっています！";

            $categoriesIDs = DB::table('categories')->pluck('id');

            return [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => $categoriesIDs->random(),
                'user_id' => 1,
                'cover_image' => $concertData['cover_image'],
                'title' => $concertData['title'],
                'artist' => $concertData['artist'],
                'detail' => $detail,
                'content' => $context,
                'all_concert_start_date' => "2022-01-17 07:00:00",
                'all_concert_end_date' => "2022-12-17 10:00:00",
                'sales_volume' =>  mt_rand(0, 30),
            ];
        };


        DB::table('concerts')->insert(array_map($createConcert, $concert_list));
    }
}
