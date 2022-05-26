
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assicurazione/stile.css">
    <style media="screen">
.style1 {
	text-decoration: underline;
	color: #FF0000;
}
</style>
    <title></title>

      </head>

<html lang="en" dir="ltr">
  <body>
        <h2 class="style1" align="center" style="font-size: 40px">Registrazione 
		Polizza ABu Abu</h2>

    <form action="" method="post">
      <table class="regdb" style="width:auto;margin-left:auto;margin-right:auto;">

        <tr>
          <td style="height: 30px">  <label for="Nome">Nomecognome:</label>  </td>
          <td style="height: 30px">  <input class="text" type="text" name="Nome" placeholder="Inserisci nomecognome" required>  </td>
        </tr>
                <tr>
                  </tr>
        <tr>
          <td style="height: 30px">  <label for="Username">Username:</label>  </td>
          <td style="height: 30px">  <input class="text" type="text" name="Username" placeholder="Inserisci Username" required>  </td>
        </tr>
        <tr>
          <td style="height: 28px">  <label for="Email">Email:</label>  </td>
          <td style="height: 28px">  <input class="text" type="email" name="Email" placeholder="Inserisci Email" required>  </td>
        </tr>
        <tr>
          <td>  <label for="Password">Password:</label>  </td>
          <td>  <input class="text" type="password" name="Password" placeholder="Inserisci Password" required>  </td>
        </tr>
        <tr>
          <td>  <label for="RePassword">Ripeti password:</label>  </td>
          <td>  <input class="text" type="password" name="RePassword" placeholder="Ripeti Password" required>  </td>
        </tr>
                </tr>
              <tr>
          <td style="height: 30px">  <label for="Codfisc">Codice fiscale:</label>  </td>
          <td style="height: 30px">  <input class="text" type="text" name="Codfisc" placeholder="Inserisci Codice fiscale" required>  </td>
        </tr>
        <tr>
          <td>  <label for="Indirizzo">Indirizzo:</label>  </td>
          <td>  <input class="text" type="text" name="Indirizzo" placeholder="Inserisci Indirizzo" required>  </td>
        </tr>
        <tr>
          <td>  <label for="Cap">CAP:</label>  </td>
          <td>  <input class="text" type="text" name="Cap" placeholder="Inserisci CAP" required>  </td>
        </tr>
        <tr>
          <td>  Provincia:  </td>
          <td>
       <input class="text" type="text" name="provincia" placeholder="Inserisci provincia" required></td>
        </tr>
        <tr>
          <td>  <label for="Citta">Citta :</label>  </td>
          <td>  <input class="text" type="text" name="Citta" placeholder="Inserisci CittÃ " required>  </td>
        </tr>
      </table>
  <div align="center">
        <input class="button" type="submit" name="Registra" value="Registrati">
  </div>
    </form>

    <?php

    if(isset($_POST["Registra"]))
      $Codfisc=strln($_POST['Codfisc']);

    if(isset($_POST["Registra"]) AND ($_POST["Password"]==$_POST["RePassword"]) AND ($Codfisc==16)) {
      $password=$_POST["Password"];
      $passwordhash=md5($password);

      $sql="INSERT INTO titolare (codfisc, nomecognome, datanascita, ind,
        cap, prov, citta, email, Username, Password)
        VALUES ('{$_POST['Codfisc']}','{$_POST['Nome']}','{$_POST['Cognome']}','{$_POST['Datanascita']}',
        '{$_POST['Indirizzo']}',{$_POST['Cap']},'{$_POST['Provincia']}','{$_POST['Citta']}',
        '{$_POST['Email']}','{$_POST['Username']}','$passwordhash')";
      $result=$conn->query($sql);
      if(!$result) echo "errore nella query";
      echo "<form align='center' action='Accessoveicolo.php' method='post'>
            <input class='button' style='height:65px; width:180px;
            background-color:#4CAF50' type='submit' name='Accedi' value='Accedi'>
            </form>'";

    }

    if(isset($_POST["Registra"]) AND $_POST["Password"]!=$_POST["RePassword"]){
      echo "<h3 class='body' style='text-align:center;color:#cc0000'>
      Le password inserite non corrispondono, riprova.</h3>";
    }
    if(isset($_POST["Registra"]) AND $Codfisc!=16){
      echo "<h3 class='body' style='text-align:center;color:#cc0000'>
      Formato del codice fiscale non corretto, riprova.</h3>";
    }

    ?>
</html>
