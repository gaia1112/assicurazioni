<?php

  // avviamo la sessione
  session_start();

  // parametri di connessione al database

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "assicurazioni"; 


  // mi connetto al db
  $conn= mysqli_connect($servername,$username,$password,$dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
     
  if(!isset($_POST["Username"]) || !isset($_POST["Password"])){
    die("Dati mancanti");
  }

  $pass=$_POST["Password"];

  $username=$_POST["Username"];


  $passwordCifrata = md5($pass); 

  $sql = "SELECT * FROM titolare WHERE username = '$username' AND password = '$passwordCifrata'";

  
  $result = $conn->query($sql);

  if(!$result) {
    die("<h3 class='body' style='text-align:center;color:#cc0000'>Errore interno.</h3>");
  }

  $data = $result->fetch_assoc(); // array di risultati


  $row = $data[0];

  $conta = $result->num_rows;

  if ($conta==0) {
    die("<h3 class='body' style='text-align:center;color:#cc0000'>Credenziali errate, riprova.</h3>");
  }

  $_SESSION['idtit'] =  $row['idtit'];

  header('location: Visualizzazionedati.php');

