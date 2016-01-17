<?php
require __DIR__.'/vendor/autoload.php';
$client = new \GuzzleHttp\Client([
    'base_url' => 'http://www.rest.com/',
    'defaults' => [
        'exceptions' => false,
    ]
]);

$nickname = 'ObjectOrienter'.rand(0, 999);

$data = array(
   'nickname' => $nickname,
    'avatarNumber' => 5,
    'tagLine' => 'a test dev!'
);
$response = $client->post('http://www.rest.com/app.php/api/programmers',
[ 'body' => json_encode($data)
]);


$programmerUrl = $response->getHeader('Location');
// 2) GET a programmer resource
$response = $client->get($programmerUrl);
echo $response;
echo "\n\n";

// 2) GET a programmer resource
// $response = $client->get('http://www.rest.com/app.php/api/programmers/'.$nickname,
// [ 'body' => json_encode($data)
// ]);
// echo $response;
// echo "\n\n";

//$programmerUrl = $response->getHeader('Location');

// $response = $client->get('http://www.rest.com/app.php/api/programmers/abcd'.$nickname);
//
// echo $response;
// echo "\n\n";
