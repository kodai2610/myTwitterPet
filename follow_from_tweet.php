<?php
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

//cronで1時間おきに定期実行→1日120人ほどフォロー
try {
    //仕様①「#大学受験」などを発言しているユーザーを自動フォロー
    $tags = ['#大学受験', '#早慶','#春から浪人','#浪人生','#勉強垢さんと繋がりたい','#浪人生と繋がりたい'];
    shuffle($tags);
    error_log($tags[0]);
    $targetTweets = searchTweets($tags[0]);

    foreach ($targetTweets->statuses as $tweet) {
        follow($tweet->user->id);
        sleep(2);
    }

} catch (Exception $e) {
    error_log($e->getMessage());
}

