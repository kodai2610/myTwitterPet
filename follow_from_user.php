<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

use Abraham\TwitterOAuth\TwitterOAuth;

try {
    $twitter = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS); // globalに定義する　TwitterOAuthクラスのインスタンスを作成
    $me = $twitter->get('account/verify_credentials');
    //認証が通ったか+ユーザー情報取得

   $targetName = 'language_labo';

    $all = getFollower($twitter,$targetName)->ids;
    $myFollowings = getFollowing($twitter)->ids;
    
    $filtered = array_filter($all,function ($val,$myFollowings) {
        if(in_array($val,$myFollowings)) {
            return false;
        }
    });
    
    


    //同じ人でランダムで配列を切り取る
    // foreach(array_rand($rest,8) as $key) {
    //     //すでにフォローしている人は除く
    //     if(in_array($rest[$key],$followings)) {
    //         array_splice($followers,$key,1);
    //         continue;
    //     }
    //     $selected[] = $rest[$key];
    //     array_splice($rest,$key,1);//ターゲットにしたら配列から削除
    // }
    // var_dump($selected);
    // foreach ($targetFollowers as $userId) {
    //     follow($twitter,$userId);
    //     sleep(5);
    // }
} catch (Exception $e) {
    var_dump($e->getMessage());
}