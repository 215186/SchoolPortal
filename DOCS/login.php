<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome">
</head>

<body>
<?php
  include 'index.php';

  //Prints out the inputted username and password.
  $username = isset($_POST['username']) ? $_POST["username"] : null;
  $password = isset($_POST['password']) ? $_POST["password"] : null;

  // Prints out list of existing algos.
  //print_r(hash_algos());

  // Stores the array of all the algos in a variable.
  $algos = hash_algos();

  // Counts the amount of elements in the array.
  $count = count($algos);

  // Picks a random index number for the use of a hash conversion.
  $id = rand(0, $count - 1);

  // Gives the element thats associated with the index number.
  $algo = $algos[$id];

  // Stores the array of the first 6 letters in the alphabet in a variable.
  $separators = ['a', 'b', 'c', 'd', 'e', 'f'];

  // Picks a random index number for the use of id identification.
  $separator_id = rand(0, count($separators) - 1);

  // Gives the element thats associated with the index number.
  $separator = $separators[$separator_id];

  echo "User name: $username<br>\n";
  echo "Password: $password<br>\n";

  // $id says what algo index is used.
  // $separator makes it so that you can identify what part of the hash is the ID...
  // ...and what part is the actual hash.
  $password = $id . $separator . hash($algo, $password);

  // Prints the hashed password.
  echo "Hashed: $password<br>\n";

  header('Location: homepage.html')
?>
</body>
</html>
