<?php

//Авторизируем пользователя:

session_start();
$client_id = '6957210';
$redirect_uri = 'https://oauth.vk.com/blank.html';
$display = 'page';
$scope = 'friends,groups,audio';
$response_type = 'code';
$auth_url = "https://oauth.vk.com/authorize?client_id={$client_id}&display={$display}&redirect_uri={$redirect_uri}&scope={$scope}&response_type={$response_type}&v=5.52";


//Получаем access_token:

if(isset($_GET['code'])){
$code = $_GET['code'];
$client_secret = '6DaGYFfwnLuGg7RStxXN';
$acces_uri = "https://oauth.vk.com/access_token";
$fields = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'code' => $code
);
$acces_uri .= "?client_id={$fields['client_id']}&";
$acces_uri .= "client_secret={$fields['client_secret']}&";
$acces_uri .= "redirect_uri={$fields['redirect_uri']}&";
$acces_uri .= "code={$fields['code']}";
$res = file_get_contents($acces_uri);

$response_string = json_decode($res, true);
$_SESSION['token'] = $response_string['access_token'];

}

if (isset($_SESSION['token'])) {
    $name = 'Маша';
    $url = $url = "https://api.vk.com/method/users.search?city_id=1&q={$name}&count=1000&access_token={$_SESSION['token']}";
    $res = file_get_contents($url);
    $users_data = json_decode($res,true);
    $users_count = array_shift($users_data['response']);
    $users_list = $users_data['response'];
}

?>


