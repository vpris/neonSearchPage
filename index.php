<?php
require('database/globalVariables.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Routing</title>
	<meta name="description" content="Search the web for information and images.">
	<meta name="keywords" content="Search engine, routing, websites">
    <meta name="author" content="Chuck Tornton">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/jquery-ui.css" type="text/css" rel="stylesheet"/>
    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#autocomplete_input").autocomplete({
                source: "autocomplete.php",
                minLength: 1,
                maxLength: 20
            });
        });
    </script>
</head>
<body>
    <div class="overlay"></div>
	<div class="wrapperIndex indexPage">
	

		<div class="mainSection">

			<div class="logoContainer">
				<h1>ROUTING</h1>
			</div>


            <div class="searchContainer">

                <form action="search_matching_modes.php" method="GET">
                    <div class="searchBarCont">
                        <input class="searchBox" id="autocomplete_input" autocomplete="off" placeholder="Приложение, отв.группа, слово из текста. Скоро и сервер..." type="search" name="q">
                        <button class="searchButton" type="submit"> <!-- <img src='assets/icons/search1.png'> --></button>
                    </div>
                    <div class="searchBarTextCont"><p>Легко начать. Введите запрос, например: <span class="searchBarWord"><a href="<?= $searchLinkWord.$randSearchWord ?>"><?= $randSearchWord ?></a></span></p></div>
                </form>
            </div>


		</div>


	</div>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>