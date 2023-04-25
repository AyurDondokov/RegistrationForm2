<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <title>Registration form</title>
</head>
<body>
<?php
require "blocks/header.php";
?>
<div class="container">
    <form action="delete.php" method="post">
        <table class="users-list">
            <thead class="users-list-head">
                <tr>
                    <th class="users-list-user">ID</th>
                    <th class="users-list-user">Имя</th>
                    <th class="users-list-user">Фамилия</th>
                    <th class="users-list-user">E-mail</th>
                    <th class="users-list-user">Телефон</th>
                    <th class="users-list-user">Тема</th>
                    <th class="users-list-user">Способ оплаты</th>
                    <th class="users-list-user">Рассылка</th>
                    <th class="users-list-user">IP-адрес</th>
                    <th class="users-list-user">Статус</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            $j = 1;

            foreach (file('forms.txt') as $line){
                $arr = explode('|', $line);
                echo $arr[array_key_last($arr)];
                if ($arr[array_key_last($arr)] != "deleted"){
                    echo "<tr><th class='users-list-user'>".$j.'</th>';
                    foreach ($arr as $value){
                        echo "<th class='users-list-user'>".$value.'</th>';
                    }
                    echo "<th class='users-list-user'> <input class='custom-checkbox' type='checkbox' name='checks[]' value='".($i-1)."'> </th> </tr>";
                    $j++;
                }
                $i++;
            }
            ?>
            </tbody>

        </table>
        <input class="button" type="submit" value="Удалить">
    </form>
</div>
</body>
</html>
