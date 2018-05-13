<!DOCTYPE html>
<html>
<head>
    <link href="http://allfont.ru/allfont.css?fonts=lobster" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Tizen Mobile Web Basic Template" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/main.js"></script>
    
    <title>Platform for testing knowledge</title>


</head>
<body  style="text-align: center; font-size: 25px; font-family: 'Lobster', arial; ">
<a href="studroom.html"><br>Личный кабинет</a>
<?php
require_once 'connection.php';

    if (isset($_POST['studname'])&&isset($_POST['clnum'])&&isset($_POST['scnum'])&&isset($_POST['studemail'])&&isset($_POST['password'])&&isset($_POST['postsc'])) 
    { 

    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

    $studname = htmlentities(mysqli_real_escape_string($link, $_POST['studname']));
    $clnum = htmlentities(mysqli_real_escape_string($link, $_POST['clnum']));
    $scnum = htmlentities(mysqli_real_escape_string($link, $_POST['scnum']));
    $studemail = htmlentities(mysqli_real_escape_string($link, $_POST['studemail']));
    $password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));
    $postsc = htmlentities(mysqli_real_escape_string($link, $_POST['postsc']));
    
    $query="INSERT INTO studusers VALUES(studname,clnum,scnum,studemail,password,postsc) VALUES('$studname','$clnum', '$scnum','$studemail','$password','$postsc')";
    $result = mysqli_query ($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result)
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href="studroom.html"><br>Личный кабинет</a>";
    }
    mysqli_close($link);
   }
    ?>
    
    </body>
</html>