<?php
require 'vendor/autoload.php';

$client = new \Google_Client();

$client->setApplicationName('Google Sheets API');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline'); 
$path = './googleapis.json';
$client->setAuthConfig($path);

$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1PsZsrZuKI7vX06ImOB8UnoEUmKyeoV6Dd4ko3_uNfzw';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);

$range = 'Summary!Q8:U17';
$res = $service->spreadsheets_values->get($spreadsheetId, $range);
$value = $res->getValues();

// // var_dump($value);

// foreach ($value as $arr) {
//      // echo $arr[0]. $arr[1].$arr[3]."<br>";
// }

// echo(json_encode($value));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Ranking</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" xl:hidden bg-gray-100 font-sans">
  <header class="bg-blue-600 text-white p-4 shadow-md">
    <h1 class="text-xl font-bold text-center">Dashboard Ranking</h1>
  </header>
  <main class="p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <div class="p-4 border-b">
        <h2 class="text-lg font-semibold">Top Rankings</h2>
      </div>
      <table class="min-w-full table-auto">
        <thead class="bg-gray-200">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Rank</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Name</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Score</th>
          </tr>
        </thead>
        <tbody>
               <?php
                    foreach ($value as $arr) {
                              echo 
                              '<tr class="border-b hover:bg-gray-100">
                                   <td class="px-4 py-2">'.$arr[0].'</td>
                                   <td class="px-4 py-2">'.$arr[1].'</td>
                                   <td class="px-4 py-2">'.$arr[4].'</td>
                              </tr>';
                         }
               ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
