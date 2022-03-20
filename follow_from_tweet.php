<?php
require __DIR__ . '/const.php';
require __DIR__ . '/google.php';
require __DIR__ . '/functions.php';

//cronで1時間おきに定期実行→1日120人ほどフォロー
try {
    //仕様①「#大学受験」などを発言しているユーザーを自動フォロー
    $sheetRange = 'D2:D';
    $options = [
        'majorDimension' => 'COLUMNS',
    ];
    $response = $sheet->spreadsheets_values->get($sheetId,$sheetName . '!' . $sheetRange,$options);
    $col = $response->getValues()[0];
    shuffle($col);
    $targetTweets = searchTweets($col[0]);

    foreach ($targetTweets->statuses as $tweet) {
        follow($tweet->user->id);
        sleep(2);
    }

} catch (Exception $e) {
    error_log(print_r($e->getMessage(),true),3, __DIR__ . '/error.txt');
}

