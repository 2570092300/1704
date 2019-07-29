<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=04phpa', 'root', 'root');
    $dbh->exec("set names utf8");
    $sql = "select * from user";
    $res = $dbh->query($sql);
    $data = $res->fetchAll(2);
    $dbh = null;

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
    <center>
        <button class="btn">静态化</button>
        <table>
            <tr>
                <td></td>
                <td>编号</td>
                <td>名称</td>
                <td>密码</td>
                <td>操作</td>
            </tr>
            <?php foreach($data as $key=>$value){
                echo "<tr>
                       <td><input type='checkbox' value='$value[user_id]' name='box'></td>
                       <td>$value[user_id]</td>
                       <td>$value[user_name]</td>
                       <td>$value[user_pwd]</td>
                       <td><a href=''>删除</a> </td>
                </tr>";
            }?>
        </table>
    </center>
    </body>
    <script src="../js/jquery.js"></script>
    <script>
        $(".btn").click(function(){
            alert('ok')
            str ="";
            $(":checked").each(function(){
                str+=','+$(this).val();
            })
            str = str.substr(1);
            $.ajax({
                url:"showinfo.php",
                type:'get',
                data:{user_id:str},
                dataType:'json',
                success:function(res){

                }
            })
        })
    </script>
    </html>
<?php
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>