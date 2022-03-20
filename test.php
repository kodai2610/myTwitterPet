<?php
require __DIR__ . '/vendor/autoload.php';

$key = __DIR__ . '/pem/constant-idiom-327110-07d3b33eb5e2.json';
$sheetId = '1y9Z27YETc4ppovjPZPCyH52nJQkk4V5NRY_Me6MeHIE';

try {
    $client = new Google_Client();
    $client->setAuthConfig($key);
    $client->addScope(Google_Service_Sheets::SPREADSHEETS);
    $client->setApplicationName('Exam');
    $sheet = new Google_Service_Sheets($client);

    //シートデータの取得
    $sheetName = 'シート1';
    $sheetRange = 'B2';

    // $request = new Google_Service_Sheets_ValueRange();
    // var_dump($request);
    // exit;
    // $response = $sheet->spreadsheets_values->update($sheetId, $range, $request);

    $response = $sheet->spreadsheets_values->get($sheetId,$sheetName . '!' . $sheetRange);
    foreach($response->getValues() as $index => $row) {
        var_dump($row);
    }


} catch (Exception $e) {
    var_dump($e->getMessage());
}
