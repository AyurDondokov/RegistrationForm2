<?php
$file = "forms.txt";
$arr = file($file);
foreach ($_POST["checks"] as $i){
    $arr[$i] = substr($arr[$i], 0, -1) . "|deleted";
}
file_put_contents( $file, $arr );
header('Location: admin.php');
exit;