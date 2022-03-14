<?php
function createTweet(object $api, string $text)
{
    $tweet = $api->post('statuses/update', ["status" => $text]);
}

//1日にMAX:400までフォローできる
function follow(object $api, int $userId)
{
    $follow = $api->post('friendships/create', ['user_id' => $userId]);
}


function searchTweets(object $api, string $target)
{
    return $api->get('search/tweets', [
        'q' => $target,
        'lang' => 'ja',
        'locale' => 'ja',
        'result_type' => 'recent',
        'count' => '10',
        'include_entities' => 'false',
    ]);
}

function unfollow(object $api, int $userId)
{
    $api->post('friendships/destroy', ['user_id' => $userId]);
}


function getFollowing(object $api, string $screenName = null)
{
    return $api->get('friends/ids',['screen_name' => $screenName]);
}

//max5000まで取れる
function getFollower(object $api, string $screenName = null)
{
    return $api->get('followers/ids',['screen_name' => $screenName]);
}

//回数制限あり  
function deleteTweet(object $api, int $tweetId)
{
    $api->post('statuses/destroy', ['id' => $tweetId]);
}

//フォローしていないユーザーのRTは取得できない
function getTimeLIne(object $api, string $screenName)
{
    return $api->get("statuses/user_timeline", ['screen_name' => $screenName]);
}

function retweet(object $api, int $retweetId) {
    $retweet = $api->post("statuses/retweet", ['id' => $retweetId]);
}

function unretweet(object $api, int $retweetId)
{
    $api->post('statuses/unretweet', ['id' => $retweetId]);
}
