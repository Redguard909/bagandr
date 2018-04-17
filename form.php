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
<body align="center" style="background-color:#F0FFFF; font-family: Monotype Corsiva; font-size: 40px; margin-top: 200px;">
<?php
    if (isset($_POST['login'])) { $login = $_POST['login'];}
    if (isset($_POST['password'])) { $password=$_POST['password'];}
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    require_once 'connection.php';
          $link = mysqli_connect($host, $user, $password, $database) 
          or die("Ошибка " . mysqli_error($link));
          mysqli_set_charset( $link, 'utf8' );
    $query="SELECT id FROM users WHERE login='$login'";
    $result = mysqli_query($link,$query)or die("Ошибка " . mysqli_error($link));
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. <a href='users.php'><br>Назад</a>")?>
    <?php }
    $query2="INSERT INTO users (login,password) VALUES('$login','$password')";
    $result2 = mysqli_query ($link, $query2) or die("Ошибка " . mysqli_error($link));
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'><br>Главная страница</a>";
    }
    ?>
    </body>
</html>