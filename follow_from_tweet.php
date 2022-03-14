<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

use Abraham\TwitterOAuth\TwitterOAuth;

try {
    $twitter = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS); // TwitterOAuthクラスのインスタンスを作成
    $me = $twitter->get('account/verify_credentials'); 
    //認証が通ったか+ユーザー情報取得
    
    //仕様①「#大学受験」などを発言しているユーザーを自動フォロー
    $tags = ['#大学受験', '#早慶'];
    shuffle($tags);
    
    $targetTweets = searchTweets($twitter, $tags[0]);

    foreach ($targetTweets->statuses as $tweet) {
        follow($twitter,$tweet->user->id);
    }

} catch (Exception $e) {
    var_dump($e->getMessage());
}

