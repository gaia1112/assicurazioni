<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="stile.css">
    <style media="screen"></style>
    <title></title>

      <?php
        session_start();

        $servername = "localhost";
    	  $username = "root";
    	  $password = "";
    	  $dbname = "azienda assicurazioni";

    		  // connessione
    	  $conn= mysqli_connect($servername,$username,$password,$dbname);
    	  if (!$conn) {
    	     die("Connection failed: " . mysqli_connect_error());
    	    }
      ?>

  </head>

  <body>
    <br>
    <div class="io">
      <!-- <h1 class="head" align="center">PORTALE ASSICURAZIONI</h1> -->
      &nbsp;</div>

    <?php
      $pass=$_POST["Password"];
      $Username=$_POST["Username"];

      $Passhash=md5($pass);
      echo $Passhash . "       ";
      $sql="SELECT * FROM titolare WHERE username='$Username' AND
      password='$Passhash'";
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
      $conta=$result->num_rows;
      echo $conta;
      echo $row['idt'];

      if(!$result) {echo "<h3 class='body' style='text-align:center;color:#cc0000'>
                    Errore interno.</h3>";}
      elseif ($conta==0) {echo "<h3 class='body' style='text-align:center;color:#cc0000'>
                          Credenziali errate, riprova.</h3>";}
              else {$_SESSION['IDT'] = $row['idt'];
                    header('location: Visualizzazionedati.php');}
    ?>
      <!-- else header('location: pagina3.php'); -->

  </body>

</html>
