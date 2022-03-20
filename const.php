<?php
require __DIR__ . '/vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

//consumerKey・Secret : どのTwitterAppがこのapiを叩いているのかを判別する特定のユーザーに対するアクションは実行できない（ツイートする、フォローするなど）
const TW_CK = 'KgpE3n9hF6f1kl5RVTHrc1fcR';
const TW_CS = 'JjShstDvKPNuvC9ngRKYcRBzHmdtopsbPHdWhxINHnDM3e1UKO';

//Access token&secret : どのTwitterユーザーがこのAPIを叩いているのかを判別特定のユーザーに対するアクションを実行できる（ツイートする、フォローするなど）
const TW_AT = '1326359912775999494-flJW4Gkd3nGxSpfDjKYgJMH1VP75m9';
const TW_ATS = 'KJEs80FVE5s0WTEJWDONauyCbN11LnyAC0rtGEqxKDAtl';

//GoogleSpreadSheet
$key = __DIR__ . '/pem/constant-idiom-327110-07d3b33eb5e2.json';
$sheetId = '1y9Z27YETc4ppovjPZPCyH52nJQkk4V5NRY_Me6MeHIE';

try {
    $twitter = new TwitterOAuth(TW_CK, TW_CS, TW_AT, TW_ATS); 
    //TwitterOAuthクラスのインスタンスを作成
    $me = $twitter->get('account/verify_credentials');
    //認証が通ったか+ユーザー情報取得
} catch (Exception $e) {
    error_log(print_r($e->getMessage(), true), 3, __DIR__ . '/error.txt');
}