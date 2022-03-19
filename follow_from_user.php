<?php
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

try {
    //仕様②特定のユーザーのフォロワを芋づる式に自動フォロー
    $targetName = 'language_labo';

    $all = getFollower($targetName)->ids;
    $myFollowings = getFollowing()->ids;
    $filtered = array_diff($all,$myFollowings);
    var_dump($filtered);
    exit;
    // foreach ($targetFollowers as $userId) {
    //     follow($twitter,$userId);
    //     sleep(5);
    // }
} catch (Exception $e) {
    var_dump($e->getMessage());
}