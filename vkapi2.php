<?php

    $client_id ='6957403';
    $redirect_uri = 'https://oauth.vk.com/blank.html';
    $display = 'page';
    $response_type = 'token';


$request_perm = 'https://oauth.vk.com/authorize?client_id=6957403&scope=photo,wall,audio,friends,notify,video,docs,notes,pages,status,wall,groups,offline&redirect_uri=https://oauth.vk.com/blank.html&response_type=token';


//abe76bbf1e1d47069f26f9ada3f0db858472313ea520dc4dc08eb1a850ce4eb1ce27e83f95135dc27e982


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p>Скопируйте полученную ссылку и перейдите по ней.</p>
    <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">@</span>
        </div>
        <input type="text" class="form-control" value="<?php print $request_perm; ?>" placeholder="ссылка" aria-label="ссылка" aria-describedby="addon-wrapping">
    </div>

   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>