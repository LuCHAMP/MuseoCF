<?php
  session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="stili-login.css">
</head>
<body>
    <div class="wrapper">
        <div class="login-text">
          <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
          <div class="text">
            <a href="">Login</a>
            <br>
            <form method="post" action='<?php echo($_SERVER["PHP_SELF"]) ?>' >
              <input type="text" placeholder="Username" name="username">
              <br>
              <input type="password" placeholder="Password" name="password">
              <br>
              <button class="login-btn">Log In</button>
            </form>
            
          </div>
        </div>
        <div class="call-text">
          <h1>Visita la nostra <span>galleria</span> </h1>
        </div>
      
      </div>
      <script type="text/javascript" src="script.js"></script>
</body>
</html>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $utente = $_POST["username"];
    $password = $_POST["password"];
    $db = "museodb";

    $conn = mysqli_connect("localhost", $utente, $password, $db);

    if(! $conn){
        echo "<script language='JavaScript'>";
        echo "alert('ERRORE, Credenziali errate');";
        echo "</script>";
    }else{
      echo "<script language='JavaScript'>";
      echo "alert('Bentornato, $utente');";
      echo "window.location = 'galleria.html';";
      echo "</script>";
      exit;
    }
  }
?>