<?php
require 'vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('Google Sheets API');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');
$path = './googleapis.json';
$client->setAuthConfig($path);

$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1m43T2EJavNtHMj7Y32JXNZA40WaPmqV0smfMKvl4NGE';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);

$range = 'Sheet2!A1:B4';
$res = $service->spreadsheets_values->get($spreadsheetId, $range);
$value = $res->getValues();

// var_dump($value);

foreach ($value as $arr) {
     echo $arr[0]. $arr[1]."<br>";
}

// echo(json_encode($value));