<?php
//Twitter0Authを利用するためにautoload.phpを読み込む
require __DIR__ . '/vendor/autoload.php';
// require 外部ファイルの読み込みに使う 
//__DIR__:マジック定数 このファイルが存在するディレクトリ

//クラスのインポート
use Abraham\TwitterOAuth\TwitterOAuth;

//consumerKey・Secret : どのTwitterAppがこのapiを叩いているのかを判別するためのAPI 必須 特定のユーザーに対するアクションは実行できない（ツイートする、フォローするなど）
const TW_CK = 'KgpE3n9hF6f1kl5RVTHrc1fcR';
const TW_CS = 'JjShstDvKPNuvC9ngRKYcRBzHmdtopsbPHdWhxINHnDM3e1UKO';

//Access token&secret : どのTwitterユーザーがこのAPIを叩いているのかを判別するためのAPI 特定のユーザーに対するアクションを実行できる（ツイートする、フォローするなど）
const TW_AT = '1326359912775999494-flJW4Gkd3nGxSpfDjKYgJMH1VP75m9';
const TW_ATS = 'KJEs80FVE5s0WTEJWDONauyCbN11LnyAC0rtGEqxKDAtl';

// TwitterOAuthクラスのインスタンスを作成
$twitter = new TwitterOAuth(TW_CK,TW_CS,TW_AT,TW_ATS);
//Twitter API v2を使う
// $connection->setApiVersion('2');
//認証が通ったか+ユーザー情報取得
$content = $twitter->get('account/verify_credentials');

//Tweet作成
// $tweet = $connection->post("statuses/update", ["status" => "Hello katsumi"]);

//ユーザーのtweetを取得
// $screenName = 'katsumivvvvvv';
// $userTweets = $twitter->get("statuses/user_timeline",["screen_name" => $screenName]);
// $statusIds = [];
// foreach($userTweets as $tweet) {
//     $statusIds[] = $tweet->id;
// }

//リツイート
// $statusIds = [
//     '1417310131608457271',
//     '1396805066426773514',
//     '385065686058209281',
//     '1385062140139106305',
// ];

// foreach($statusIds as $statusId) {
//     $retweet = $twitter->post("statuses/retweet", ['id' => $statusId]);
// }

$userId = '3313556588';
$follow = $twitter->post('friendships/create',['user_id' => $userId]);


//自分のTweetの削除
// $myTweets = $twitter->get("statuses/user_timeline",["screen_name" => 'K48815291K']);
// $statusIds = [];
// foreach($myTweets as $tweet) {
//     $statusIds[] = $tweet->id;
// }
// // var_dump($statusIds);
// foreach($statusIds as $statusId) {
//     $twitter->post("statuses/destroy/" . $statusId);
// }

