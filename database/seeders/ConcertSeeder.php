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
        $longContext = "修飾語が要らない作品<レベッカ>6番目のシーズンに戻ってきた代替不可「レジェンドミュージカル」約12ヶ国、10ヶ国語で公演され、全世界1900万観客を突破した興行作2013年韓国初演から2019年5番目のシーズンまで計687回公演、83万人を記録した。 冷めない「レベッカシンドローム」 映画より強烈なサスペンスの饗宴 強力なキーリングナンバー、劇の緊張感を高める舞台セットが集結した断然最高の「マスターピース」英国を代表する作家ダフニー·デュ·モリエの小説とスリラーの巨匠アルフレッド·ヒッチコックの映画<レベッカ>をモチーフにした作品。 「エリザベート」、「モーツァルト！」、「マリー·アントワネット」など40年間最高の作品を輩出したミヒャエル·クンツェ劇作家とシルベスター·ルベイ作曲家の指折りの傑作しっかりと編まれた脚本と無駄のない演出「レベッカ」、「神よ」、「一日一日」など強力なキリングナンバーと生きて動くような「マンダリー邸」の舞台セットでミュージカル界の権力座を占めた作品。";
        $shortContext = "GLAY ARENA TOUR 2021-2022 'FREEDOM ONLY'";

        $detail = "HKT48 LIVE TOUR 2022 ～Under the Spotlight～<東京公演> 2019年ぶりのHKT48ツアー！今回は九州だけでなく、東京・神奈川・愛知でも開催！また、スペシャルゲストが出演する特別なツアーとなっています！";

        $startDate = Carbon::now()->add(1, 'minute');
        $endDate3 = Carbon::now()->add(1, 'hour');
        $endDate4 = Carbon::now()->add(2, 'minute');

        // NOTE Seeding할때 각 배열의 컬럼은 동일해야함.
        DB::table('concerts')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 1,
                'user_id' => 1,
                'cover_image' => 'cover_image/0PJdEMLUNRgsKUqYxGLVWc34FIMPjEXd2SAWA87r.jpg',
                'title' => "ivs test",
                'artist' => "test",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-01-17 07:00:00",
                'all_concert_end_date' => "2022-12-17 10:00:00",
                'sales_volume' => 5,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 3,
                'user_id' => 1,
                'cover_image' => 'cover_image/f640x640-2.jpeg',
                'title' => "天龍プロジェクト",
                'artist' => "SURVIVE THE REVOLUTION Vol.17",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => $startDate,
                'all_concert_end_date' => $endDate3,
                'sales_volume' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 2,
                'user_id' => 1,
                'cover_image' => 'cover_image/f640x640-3.jpeg',
                'title' => "レベッカ",
                'artist' => "オク·ジュヒョン",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-04-17 07:00:00",
                'all_concert_end_date' => "2022-12-20 16:00:00",
                'sales_volume' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 3,
                'user_id' => 1,
                'cover_image' => 'cover_image/f640x640-4.jpeg',
                'title' => "fripSide",
                'artist' => "fripSide VIRTUAL LIVE 2022",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-04-17 07:00:00",
                'all_concert_end_date' => "2022-04-22 07:00:00",
                'sales_volume' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 3,
                'user_id' => 2,
                'cover_image' => 'cover_image/f640x640-5.jpeg',
                'title' => "東京ヤクルトスワローズ公式マスコット",
                'artist' => "つばみオンラインファンミーティング",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-06-17 09:00:00",
                'all_concert_end_date' => "2022-06-18 08:30:00",
                'sales_volume' => 5,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 1,
                'user_id' => 2,
                'cover_image' => 'cover_image/f640x640-6.jpeg',
                'title' => "サンミュージック所属芸人",
                'artist' => "サンミュージックGETライブ",
                'detail' => $detail,
                'content' => $shortContext,
                'all_concert_start_date' => "2022-03-07 07:00:00",
                'all_concert_end_date' => "2022-03-09 09:00:00",
                'sales_volume' => 1,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 1,
                'user_id' => 2,
                'cover_image' => 'cover_image/f640x640-7.jpeg',
                'title' => "RIZIN",
                'artist' => "RIZIN LANDMARK vol.2",
                'detail' => $detail,
                'content' => $shortContext,
                'all_concert_start_date' => "2022-02-17 07:00:00",
                'all_concert_end_date' => "2022-05-19 07:00:00",
                'sales_volume' => 0,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 1,
                'user_id' => 2,
                'cover_image' => 'cover_image/f640x640-8.jpeg',
                'title' => "GLAY",
                'artist' => "FREEDOM ONLY",
                'detail' => $detail,
                'content' => $shortContext,
                'all_concert_start_date' => "2022-07-17 07:00:00",
                'all_concert_end_date' => "2022-07-17 09:00:00",
                'sales_volume' => 0,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 1,
                'user_id' => 2,
                'cover_image' => 'cover_image/f640x640.jpeg',
                'title' => "Broken my toybox",
                'artist' => "Broken my toybox ／ CIVILIAN",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-10-17 07:00:00",
                'all_concert_end_date' => "2022-10-17 08:00:00",
                'sales_volume' => 0,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 4,
                'user_id' => 2,
                'cover_image' => 'cover_image/세로긴image.jpg',
                'title' => "HKT48",
                'artist' => "HKT48 LIVE TOUR 2022<東京公演>",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-10-17 07:00:00",
                'all_concert_end_date' => "2022-10-17 08:00:00",
                'sales_volume' => 6,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 2,
                'user_id' => 2,
                'cover_image' => 'cover_image/iuconcertImage.jpg',
                'title' => "夢のIUコンサート",
                'artist' => "IU",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-10-17 07:00:00",
                'all_concert_end_date' => "2022-10-17 08:00:00",
                'sales_volume' => 3,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 2,
                'user_id' => 2,
                'cover_image' => 'cover_image/가로긴image.jpg',
                'title' => "夢の防弾少年団コンサート",
                'artist' => "防弾少年団",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-10-17 07:00:00",
                'all_concert_end_date' => "2022-10-17 08:00:00",
                'sales_volume' => 0,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'category_id' => 2,
                'user_id' => 2,
                'cover_image' => 'cover_image/twiceImage.jpg',
                'title' => "夢のTWICEコンサート",
                'artist' => "TWICE",
                'detail' => $detail,
                'content' => $longContext,
                'all_concert_start_date' => "2022-10-17 07:00:00",
                'all_concert_end_date' => "2022-10-17 08:00:00",
                'sales_volume' => 0,
            ],
        ]);
    }
}
