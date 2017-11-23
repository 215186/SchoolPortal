<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome"
  <title>Current Time: <?php echo time(); ?></title><br>
</head>

<body>
<?php
  echo "<h1>Hello World</h1>";

  print_r($_FILES);

  if ($_FILES)
  {
    //Gives the directory of the stored file
    $uploaddir = '/var/www/uploads/';
    echo "$uploaddir<br>\n";

    //Gives the file a name
    $uploadfile = $uploaddir . basename($_FILES['inputFile']['name']);
    echo "$uploadfile";

    //checks if the file is moved succesfully.
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
    {
        echo "File is valid, and was succesfully uploaded.<br>\n";
    }
    else
    {
      echo "Possible file upload attack!<br>\n";
    }
  }
?>

<form action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  <input type="file" name="inputFile"><br><br>
  <input type="submit">
</form>

</body>
</html>
