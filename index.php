<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Search</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
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
    <div class="wrapper indexPage">
        <div class="mainSection">
            <div class="searchContainer">
                <div class="logoContainer">
                    <p id="routing">R<span>o</span>uti<span>n</span></p><p id="routingG">g</p>
                </div>
                <form action="search.php" method="get">
                    <div class="searchBarCont">
                        <input class="searchBox" id="autocomplete_input" autocomplete="off" type="search" name="term">
                        <input class="searchButton" type="submit" value="Search">
                    </div>
                    <div class="searchBarTextCont"><p>Введите запрос. Например: <span class="searchBarWord">Siebel</span></p></div>
                </form>
            </div>
        </div>
    </div>

    <form name="search" method="get" action="searchers.php">
        <input type="text" name="q" id="q" />
        <input type="submit" value="GO" class="form-submit" />
    </form>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>

</body>
</html>
<!--
SELECT * FROM table_name WHERE MATCH(col1, col2)
AGAINST('search terms' IN BOOLEAN MODE)-->