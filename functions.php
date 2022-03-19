<?php
function createTweet(string $text)
{   
    global $twitter;
    $twitter->post('statuses/update', ["status" => $text]);
}

//1日にMAX:400までフォローできる
// 5000アカウントまでは無条件に行ける
// それ以降は比率に応じて変わる
function follow(int $userId)
{   
    global $twitter;
    $twitter->post('friendships/create', ['user_id' => $userId]);
}


//15分間に180回までのリクエスト制限
function searchTweets(string $target)
{   
    global $twitter;
    return $twitter->get('search/tweets', [
        'q' => $target,
        'lang' => 'ja',
        'locale' => 'ja',
        'result_type' => 'recent',
        'count' => '5',
        'include_entities' => 'false',
    ]);
}

//15 per user per 15 minute 
function unfollow(int $userId)
{   
    global $twitter;
    $twitter->post('friendships/destroy', ['user_id' => $userId]);
}


function getFollowing(string $screenName = null)
{   
    global $twitter;
    return $twitter->get('friends/ids',['screen_name' => $screenName]);
}

//max5000まで取れる
function getFollower(string $screenName = null)
{
    global $twitter;
    return $twitter->get('followers/ids',['screen_name' => $screenName]);
}

//回数制限あり  
function deleteTweet(int $tweetId)
{
    global $twitter;
    $twitter->post('statuses/destroy', ['id' => $tweetId]);
}

//フォローしていないユーザーのRTは取得できない
function getTimeLIne(string $screenName)
{   
    global $twitter;
    return $twitter->get("statuses/user_timeline", ['screen_name' => $screenName]);
}

function retweet(int $retweetId) {
    global $twitter;
    $twitter->post("statuses/retweet", ['id' => $retweetId]);
}

function unretweet(int $retweetId)
{
    global $twitter;
    $twitter->post('statuses/unretweet', ['id' => $retweetId]);
}
