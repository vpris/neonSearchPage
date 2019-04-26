<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.vk.com/method/users.getFollowers?domain=ctornton&fields=photo_100,city,sex,connections,online,has_mobile,domain&v=5.52&access_token=abe76bbf1e1d47069f26f9ada3f0db858472313ea520dc4dc08eb1a850ce4eb1ce27e83f95135dc27e982&count=296",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: api.vk.com",
    "User-Agent: AniRaccoon/7.11.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$object = json_decode($response, true);

// echo'<pre>'.print_r($object[response] [items] [1], true).'</pre>';

}
 
//$array = json_decode($response, true);
 
//echo '<pre>'.print_r($array, true).'</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Стена позора</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
  <span class="logo">В</span>
</header>
    <div class="leftBar">
      <ul>
        <a href="http://localhost/foundationProject/vkapi3.php"><li>Подписчики</li></a>
        <a href="http://localhost/foundationProject/vkapi3.php"><li>2</li></a>
        <a href="http://localhost/foundationProject/vkapi3.php"><li>3</li></a>
        <a href="http://localhost/foundationProject/vkapi3.php"><li>4</li></a>
      </ul>
    </div>
    <div class='userWall'>

        <?php
        foreach($object[response][items] as $objectc)
        {

        print "<div class='userProfile'>
                  <a href='https://vk.com/$objectc[domain]'><img class='userPic' src='$objectc[photo_100]' alt=''></a>";
          print "<span class='username'>
                    <a href='https://vk.com/$objectc[domain]'>
                      $objectc[first_name]
                      $objectc[last_name]
                    </a>
                  </span>";
                  if ($objectc[sex] > 1) {
                    print "<img class='gender' src='assets/icons/man.png' title='Это мальчик' alt=''>";
                    }
                    else {
                      print "<img class='gender' src='assets/icons/woman.png' title='Это девочка' alt=''>";
                    }
                  if ($objectc[online] > 0) {
                    print "<div class='userOnline' title='Онлайн'></div>";
                  }
                  else {
                    print "<div class='userOffline' title='Оффлайн'></div>";
                  }
        print "</div>";
        }
        ?>
    </div>
</body>
</html>