<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoricalEvent; // use文を追加

class HistoricalEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // 日本
            ['region_id' => 1, 'year' => -300, 'century' => -3, 'era_name' => '弥生時代', 'title' => '稲作の普及', 'description' => '大陸から水稲耕作が伝来し、定住生活が広まった。', 'importance' => 3],
            ['region_id' => 1, 'year' => 538, 'century' => 6, 'era_name' => '飛鳥時代', 'title' => '仏教伝来', 'description' => '百済の聖明王により仏像と経典が伝えられた。', 'importance' => 3],
            ['region_id' => 1, 'year' => 645, 'century' => 7, 'era_name' => '大化の改新', 'title' => '乙巳の変', 'description' => '中大兄皇子らが蘇我氏を倒し、天皇中心の政治を目指した。', 'importance' => 3],
            ['region_id' => 1, 'year' => 794, 'century' => 8, 'era_name' => '平安時代', 'title' => '平安京遷都', 'description' => '桓武天皇により、山背国に平安京が造営された。', 'importance' => 2],
            ['region_id' => 1, 'year' => 1185, 'century' => 12, 'era_name' => '鎌倉時代', 'title' => '鎌倉幕府の成立', 'description' => '源頼朝が征夷大将軍となり、武家政権が確立。', 'importance' => 3],
            ['region_id' => 1, 'year' => 1467, 'century' => 15, 'era_name' => '室町時代', 'title' => '応仁の乱', 'description' => '戦国時代の幕開けとなる、京都を舞台とした内乱。', 'importance' => 2],
            ['region_id' => 1, 'year' => 1603, 'century' => 17, 'era_name' => '江戸時代', 'title' => '江戸幕府の成立', 'description' => '徳川家康が江戸に幕府を開き、260年の泰平が始まる。', 'importance' => 3],
            ['region_id' => 1, 'year' => 1868, 'century' => 19, 'era_name' => '明治元年', 'title' => '明治維新', 'description' => '王政復古の大号令により、近代国家への転換が始まった。', 'importance' => 3],
            ['region_id' => 1, 'year' => 1945, 'century' => 20, 'era_name' => '昭和20年', 'title' => '終戦', 'description' => 'ポツダム宣言を受諾し、第二次世界大戦が終結。', 'importance' => 3],
            ['region_id' => 1, 'year' => 1964, 'century' => 20, 'era_name' => '昭和39年', 'title' => '東京オリンピック', 'description' => 'アジアで初めての夏季五輪が開催された。', 'importance' => 2],

            //　中国・朝鮮半島
            ['region_id' => 2, 'year' => -221, 'century' => -3, 'era_name' => '秦', 'title' => '始皇帝による中国統一', 'description' => '戦国時代を終結させ、最初の統一帝国が誕生。', 'importance' => 3],
            ['region_id' => 2, 'year' => 618, 'century' => 7, 'era_name' => '唐', 'title' => '唐朝の成立', 'description' => '李淵が長安を都として、東アジア文化圏の中心となる帝国を築いた。', 'importance' => 3],
            ['region_id' => 2, 'year' => 676, 'century' => 7, 'era_name' => '新羅', 'title' => '朝鮮半島の統一', 'description' => '新羅が唐と結び、百済・高句麗を滅ぼして統一。', 'importance' => 2],
            ['region_id' => 2, 'year' => 1271, 'century' => 13, 'era_name' => '元', 'title' => '元朝の成立', 'description' => 'クビライ・ハンが国号を元とし、中国全土を支配。', 'importance' => 3],
            ['region_id' => 2, 'year' => 1392, 'century' => 14, 'era_name' => '朝鮮王朝', 'title' => '李氏朝鮮の成立', 'description' => '李成桂が和寧で即位し、儒教を国教とする国家を樹立。', 'importance' => 2],
            ['region_id' => 2, 'year' => 1644, 'century' => 17, 'era_name' => '清', 'title' => '清の中国支配', 'description' => '満洲族の清が明に代わり、中国本土の統治を開始。', 'importance' => 3],
            ['region_id' => 2, 'year' => 1840, 'century' => 19, 'era_name' => '清', 'title' => 'アヘン戦争', 'description' => 'イギリスとの戦争に敗れ、東アジアの伝統秩序が崩壊。', 'importance' => 3],
            ['region_id' => 2, 'year' => 1911, 'century' => 20, 'era_name' => '中華民国', 'title' => '辛亥革命', 'description' => '清朝が滅亡し、アジア初の共和国が誕生した。', 'importance' => 3],
            ['region_id' => 2, 'year' => 1949, 'century' => 20, 'era_name' => '中華人民共和国', 'title' => '中華人民共和国成立', 'description' => '毛沢東が天安門で建国を宣言。', 'importance' => 3],
            ['region_id' => 2, 'year' => 1950, 'century' => 20, 'era_name' => null, 'title' => '朝鮮戦争', 'description' => '南北の対立による紛争。現在も休戦中。', 'importance' => 3],

            // モンゴル・南アジア・東南アジア
            ['region_id' => 3, 'year' => -2500, 'century' => -25, 'era_name' => null, 'title' => 'インダス文明', 'description' => 'モヘンジョ・ダロなどの都市文明が栄えた。', 'importance' => 3],
            ['region_id' => 3, 'year' => -317, 'century' => -4, 'era_name' => null, 'title' => 'マウリヤ朝成立', 'description' => 'チャンドラグプタがインド初の統一帝国を樹立。', 'importance' => 2],
            ['region_id' => 3, 'year' => 802, 'century' => 9, 'era_name' => 'アンコール朝', 'title' => 'クメール帝国成立', 'description' => '現在のカンボジアを中心にアンコール・ワットを建設。', 'importance' => 2],
            ['region_id' => 3, 'year' => 1206, 'century' => 13, 'era_name' => 'モンゴル帝国', 'title' => 'チンギス・ハンの即位', 'description' => '史上最大の陸上帝国への基礎を築いた。', 'importance' => 3],
            ['region_id' => 3, 'year' => 1293, 'century' => 13, 'era_name' => 'マジャパヒト王国', 'title' => 'ジャワ島の統一的王国', 'description' => '東南アジア最大級の海上交易国家。', 'importance' => 1],
            ['region_id' => 3, 'year' => 1526, 'century' => 16, 'era_name' => 'ムガル帝国', 'title' => 'ムガル帝国の成立', 'description' => 'バーブルがデリー・スルタン朝を破り建国。', 'importance' => 3],
            ['region_id' => 3, 'year' => 1857, 'century' => 19, 'era_name' => null, 'title' => 'インド大反乱', 'description' => 'セポイの反乱から始まった反英独立運動。', 'importance' => 3],
            ['region_id' => 3, 'year' => 1945, 'century' => 20, 'era_name' => null, 'title' => 'ベトナム独立宣言', 'description' => 'ホー・チ・ミンが独立を宣言。', 'importance' => 2],
            ['region_id' => 3, 'year' => 1947, 'century' => 20, 'era_name' => null, 'title' => 'インド・パキスタン独立', 'description' => 'イギリスから独立したが、宗教問題により分断。', 'importance' => 3],
            ['region_id' => 3, 'year' => 1967, 'century' => 20, 'era_name' => null, 'title' => 'ASEAN結成', 'description' => '東南アジア諸国連合が発足。', 'importance' => 2],

            // アメリカ大陸
            ['region_id' => 4, 'year' => -1200, 'century' => -12, 'era_name' => null, 'title' => 'オルメカ文明', 'description' => 'メキシコ湾岸に栄えたメソアメリカ最古の文明。', 'importance' => 2],
            ['region_id' => 4, 'year' => 300, 'century' => 3, 'era_name' => null, 'title' => 'マヤ文明の黄金時代', 'description' => '高度な暦とピラミッド神殿が造られた。', 'importance' => 3],
            ['region_id' => 4, 'year' => 1325, 'century' => 14, 'era_name' => null, 'title' => 'アステカ帝国・テノチティトラン建設', 'description' => '湖の上の大都市を都とした帝国。', 'importance' => 2],
            ['region_id' => 4, 'year' => 1438, 'century' => 15, 'era_name' => null, 'title' => 'インカ帝国の拡大', 'description' => 'パチャクティ皇帝によりアンデス全域へ拡大。', 'importance' => 3],
            ['region_id' => 4, 'year' => 1492, 'century' => 15, 'era_name' => null, 'title' => 'コロンブスの到達', 'description' => 'ヨーロッパ人がカリブ海諸島に到達。', 'importance' => 3],
            ['region_id' => 4, 'year' => 1776, 'century' => 18, 'era_name' => null, 'title' => 'アメリカ独立宣言', 'description' => 'イギリスの植民地13州が独立を表明。', 'importance' => 3],
            ['region_id' => 4, 'year' => 1861, 'century' => 19, 'era_name' => null, 'title' => '南北戦争勃発', 'description' => '奴隷制や経済を巡るアメリカ国内の戦い。', 'importance' => 3],
            ['region_id' => 4, 'year' => 1910, 'century' => 20, 'era_name' => null, 'title' => 'メキシコ革命', 'description' => '長期独裁政権を倒した民主化運動。', 'importance' => 2],
            ['region_id' => 4, 'year' => 1914, 'century' => 20, 'era_name' => null, 'title' => 'パナマ運河開通', 'description' => '大西洋と太平洋を結ぶ重要な航路が完成。', 'importance' => 2],
            ['region_id' => 4, 'year' => 1929, 'century' => 20, 'era_name' => null, 'title' => '世界恐慌', 'description' => 'ウォール街の株価暴落から始まった世界的不況。', 'importance' => 3],

            // ヨーロッパ・アフリカ
            ['region_id' => 5, 'year' => -2500, 'century' => -25, 'era_name' => null, 'title' => 'クフ王のピラミッド完成', 'description' => 'エジプト古王国時代の巨大建造物。', 'importance' => 3],
            ['region_id' => 5, 'year' => -450, 'century' => -5, 'era_name' => null, 'title' => 'アテネの黄金時代', 'description' => 'ペリクレスの指導のもと民主政治が栄えた。', 'importance' => 2],
            ['region_id' => 5, 'year' => 27, 'century' => 1, 'era_name' => null, 'title' => 'ローマ帝国成立', 'description' => 'オクタヴィアヌスが初代皇帝に就任。', 'importance' => 3],
            ['region_id' => 5, 'year' => 800, 'century' => 8, 'era_name' => null, 'title' => 'カールの戴冠', 'description' => 'フランク王国の王が西ローマ皇帝の称号を得る。', 'importance' => 3],
            ['region_id' => 5, 'year' => 1347, 'century' => 14, 'era_name' => null, 'title' => '黒死病（ペスト）の流行', 'description' => 'ヨーロッパ人口の約3分の1が失われた。', 'importance' => 2],
            ['region_id' => 5, 'year' => 1517, 'century' => 16, 'era_name' => null, 'title' => '宗教改革', 'description' => 'ルターが「95ヶ条の論題」を発表。', 'importance' => 3],
            ['region_id' => 5, 'year' => 1789, 'century' => 18, 'era_name' => null, 'title' => 'フランス革命', 'description' => 'バスティーユ牢獄襲撃から王政打倒へ。', 'importance' => 3],
            ['region_id' => 5, 'year' => 1884, 'century' => 19, 'era_name' => null, 'title' => 'ベルリン会議', 'description' => '列強によるアフリカ分割のルールを決定。', 'importance' => 2],
            ['region_id' => 5, 'year' => 1914, 'century' => 20, 'era_name' => null, 'title' => '第一次世界大戦勃発', 'description' => 'サラエボ事件を契機とした世界大戦。', 'importance' => 3],
            ['region_id' => 5, 'year' => 1989, 'century' => 20, 'era_name' => null, 'title' => 'ベルリンの壁崩壊', 'description' => '冷戦の終結を象徴する出来事。', 'importance' => 3],

            // 中近東
            ['region_id' => 6, 'year' => -3000, 'century' => -30, 'era_name' => null, 'title' => 'シュメール文明', 'description' => 'ウル・ウルクなどの都市国家が栄え、楔形文字を使用。', 'importance' => 3],
            ['region_id' => 6, 'year' => -1750, 'century' => -18, 'era_name' => null, 'title' => 'ハムラビ法典', 'description' => '「目には目を」で知られるバビロニアの法典。', 'importance' => 3],
            ['region_id' => 6, 'year' => -550, 'century' => -6, 'era_name' => null, 'title' => 'アケメネス朝ペルシア成立', 'description' => 'キュロス2世により広大なオリエントを統一。', 'importance' => 3],
            ['region_id' => 6, 'year' => 622, 'century' => 7, 'era_name' => null, 'title' => 'ヒジュラ', 'description' => 'ムハンマドがメッカからメディナへ移住。', 'importance' => 3],
            ['region_id' => 6, 'year' => 750, 'century' => 8, 'era_name' => null, 'title' => 'アッバース朝成立', 'description' => 'イスラーム黄金時代を築き、バグダードが繁栄。', 'importance' => 3],
            ['region_id' => 6, 'year' => 1096, 'century' => 11, 'era_name' => null, 'title' => '第1回十字軍', 'description' => 'キリスト教諸国が聖地エルサレムの奪還を目指す。', 'importance' => 2],
            ['region_id' => 6, 'year' => 1453, 'century' => 15, 'era_name' => 'オスマン帝国', 'title' => 'コンスタンティノープル陥落', 'description' => 'ビザンツ帝国が滅亡し、地中海の覇権が移動。', 'importance' => 3],
            ['region_id' => 6, 'year' => 1923, 'century' => 20, 'era_name' => 'トルコ共和国', 'title' => 'トルコ共和国成立', 'description' => 'ケマル・パシャにより近代国家が樹立。', 'importance' => 2],
            ['region_id' => 6, 'year' => 1948, 'century' => 20, 'era_name' => null, 'title' => 'イスラエル建国', 'description' => 'パレスチナ問題の直接的な火種となる。', 'importance' => 3],
            ['region_id' => 6, 'year' => 1979, 'century' => 20, 'era_name' => null, 'title' => 'イラン革命', 'description' => '親米王政が崩壊し、イスラーム共和国が成立。', 'importance' => 2],
        ];

        foreach ($events as $event) {
            HistoricalEvent::create($event);
        }
    }
}
