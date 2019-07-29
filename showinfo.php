<?phpd
ob_start();
$user_id = $_GET['user_id'];

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=04phpa', 'root', 'root');
    $dbh->exec("set names utf8");
    $sql = "select * from user where user_id in ($user_id)";
    $res = $dbh->query($sql);
    $data = $res->fetchAll('2');

    foreach ($data as $key => $value) {
    ?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

名称:<?php echo $value['user_name']?>
密码:<?php echo $value['user_pwd']?>

</body>
        </html>
    <?php
    file_put_contents("./show_$value[user_id].html",ob_get_contents());
    ob_flush();
    ob_clean();
    }
    $dbh = null;
}catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>