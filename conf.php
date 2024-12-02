<?php
require 'vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('Google Sheets API');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');
$path = ':PATH_JSON';
$client->setAuthConfig($path);

$service = new \Google_Service_Sheets($client);

$spreadsheetId = ':SPREADSHEET_ID';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);

$range = 'Sheet1';
$res = $service->spreadsheets_values->get($spreadsheetId, $range);
$value = $res->getValues();

// var_dump($value);

foreach ($value as $arr) {
     echo $arr[0]"<br>";
}

// echo(json_encode($value));