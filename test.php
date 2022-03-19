<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/const.php';
require __DIR__ . '/functions.php';

$twitter = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS); // globalに定義する　TwitterOAuthクラスのインスタンスを作成
$me = $twitter->get('account/verify_credentials');



