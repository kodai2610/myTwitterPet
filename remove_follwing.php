<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

use Abraham\TwitterOAuth\TwitterOAuth;

try {
    $twitter = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS); // TwitterOAuthクラスのインスタンスを作成
    $me = $twitter->get('account/verify_credentials');
    //認証が通ったか+ユーザー情報取得
    $followings = getFollowing($twitter);
    foreach($followings->ids as $userId) {
        unfollow($twitter,$userId);
    }
} catch (Exception $e) {
    var_dump($e->getMessage());
}
