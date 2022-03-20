<?php
require __DIR__ . '/const.php';
require __DIR__ . '/google.php';
require __DIR__ . '/functions.php';

try {
    //仕様②特定のユーザーのフォロワを芋づる式に自動フォロー
    $sheetRange = 'A2:A';
    $options = [
        'majorDimension' => 'COLUMNS',
    ];
    $response = $sheet->spreadsheets_values->get($sheetId,$sheetName . '!' . $sheetRange,$options);
    $col = $response->getValues()[0];
    shuffle($col);
    $targetName = $col[0];
    $all = getFollower($targetName)->ids;
    $myFollowings = getFollowing()->ids;
    $filtered = array_diff($all,$myFollowings);

    if(empty($filtered)){
        error_log('この項目のフォローが完了しました', 1, 'koudaisports26@gmail.com');
        exit;
    }

    if($filtered >= 10) {
        $filtered = array_slice($filtered,0,10);
    }

    foreach($filtered as $userId) {
        follow($userId);
        sleep(2);
    }

} catch (Exception $e) {
    error_log(print_r($e->getMessage(),true),3,__DIR__ .'/error.txt');
}