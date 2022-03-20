<?php
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

//cronで最後にフォローしてから1日後に整理する
try {
    $friendList = getFollowing()->ids;
    $followerList = getFollower()->ids;
    $resultList = array_diff($friendList,$followerList);
    
    if(!empty($resultList)) {
        //１回を10人に制限する
        if(count($resultList) > 10) {
            $resultList = array_slice($resultList,0,20);
        }

        foreach($resultList as $userId) {
            unfollow($userId);
            sleep(1);
        }
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
