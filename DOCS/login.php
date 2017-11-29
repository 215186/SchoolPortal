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

  // FINDING THE RIGHT USER + PASSWORD
  $result = mysqli_query($link, "SELECT * FROM $table WHERE (username = $logusername)");
  $data = mysqli_fetch_assoc($result);
  print_r($data);
  $pswFromDatabase = $data["password"];
  echo "Password from Database: " . $pswFromDatabase . "<br/>";

  $re = '/^   (\d{1,3})        ([a-f]{1})          ([\da-f]+)$/imx';

  preg_match_all($re, $pswFromDatabase, $matches, PREG_SET_ORDER);
  print_r($matches);
  echo "<br/>";
  print_r($re);
  echo "<br/>";

  $id = $matches[0][1];
  $hash = $matches[0][3];

  echo "ID: " . $id . "<br/>";

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
    echo "ID in the function: " . $id . "<br/>";
    echo "Separator: " . $separator . "<br/>";
    echo "Hash: " . $hash . "<br/>";
    $pswHashed = $id . $separator . $hash;
    echo "Password hashed in function: " . $pswHashed . "<br/>";
    return $pswHashed;
  }

  $pswHashed = custom_hash($logpsw, $id);
  preg_match_all($re, $pswHashed, $matches, PREG_SET_ORDER);
  $other_hash = $matches[0][3];
  $is_valid = ($hash == $other_hash);

  echo "Other hash: " . $other_hash . "<br/>";
  echo "Is_valid: " . $is_valid . "<br/>";

  if ($is_valid) {
    echo "This is valid";
    header('Location: homepage.html');
  }
  else {
    echo "This is not valid";
    header('Location: index.php');
  }
?>
</body>
</html>
