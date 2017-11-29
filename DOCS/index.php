<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=chrome">
</head>

<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
}

.first {
    width: 50%;
    right: 25%;
    left: 25%;
    top: 50%;
    position: absolute;
}

.second {
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 5%;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    border-radius: 20px;
    width: 65%; /* Could be more or less, depending on screen size */
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

body {
    background-image: url('http://i.stack.imgur.com/kx8MT.gif');
    background-size: cover;
}

h1, p {
  text-align: center;
}

</style>

<body>
  <button onclick="document.getElementById('id01').style.display='block'" class="first">Login</button>

  <div id="id01" class="modal">
    <form class="modal-content animate" method="post" action="login.php">
      <div class="information">
        <h1>EDPORTAL</h1>
        <p>Welcome to my portal, please log in! For now you can type in anything you like, we here at EdPortal inc. are always working to inprove our site :)</p>
      </div>

      <div class="container">
        <label><b>Username</b></label>
        <input type="text" name="user" placeholder="Your username">
        <input type="password" name="pass" placeholder="Your password">
        <button type="submit" class="second">Login</button>
      </div>
    </form>
  </div>

  <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>

</body>
</html>
