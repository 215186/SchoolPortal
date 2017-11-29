<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome">
</head>

<body>
<?php
  require_once("../functions.php");
  $logusername = isset($_POST['user']) ? $_POST["user"] : null;
  $logpsw = isset($_POST['pass']) ? $_POST["pass"] : null;

  $link = mysqli_connect($host, $dbusername, $dbpassword) or die("Connection to database server failed!");
  mysqli_select_db($link, $database);

  function custom_hash($HashPass, $id = null) {
    $algos = hash_algos();
    $count = count($algos);
    if ($id == null) {
      $id = rand(0, $count - 1);
    }
    $algo = $algos[$id];
    $separators = ['a', 'b', 'c', 'd', 'e', 'f'];
    $separator_id = rand(0, count($separators) - 1);
    $separator = $separators[$separator_id];
    $hash = hash($algo, $HashPass);
    $pswHashed = $id . $separator . $hash;
    return $pswHashed;
  }

  $password = custom_hash($logpsw);

  $admin = False;

  $sql = "INSERT INTO $table (username, password, admin) Values ('$logusername', '$password', '$admin')";
  mysqli_query($link, $sql);

?>

<a href="homepage.html">Continue</a>
</body>
</html>
