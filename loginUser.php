<!DOCTYPE html>
<html>
   <head>
      <title>Cultura Generala</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" href="css/styles.css" type="text/css" />
   </head>
   <body>
      <div id="wrapper">
         <div id="header">
            <div id="logo">
               <div id="logo_text">
                  <a href="index.html"><img border="0" alt="logo" src="css/logo.png" ></a>
               </div>
            </div>
         </div>
         <div id="left-column">
            <strong>Autentificare ca</strong>
            <ul>
               <li> <a href="loginUser.php">Utilizator</a>
               <li> <a href="loginAdministrator.php">Administrator</a>
            </ul>
         </div>
         <div id="right-column">
            <p>Introduceți datele de autentificare.</p>
            <form action="loginUser.php" method="post">
               <table>
                  <tr>
                     <td>Username</td>
                     <td><input type="text" id="username" name="username"></td>
                  </tr>
                  <tr>
                     <td>Parola</td>
                     <td><input type="password" id="password" name="password"></td>
                  </tr>
                  <tr>
                     <td><input type="submit" value="Logare" class="btn" name="login"></td>
                     <td><input type="reset"  value="Resetare"></td>
                     <td><a href="newUser.php">Utilizator nou</a></td>
                  </tr>
               </table>
               <?php
                  session_start();
                  
                  // creeaza conexiunea cu baza de date
                  include_once("connect.php");
                  include("antiinject.php");
                  
                  
                  if (isset($_POST['login'])) {
                  			
                  			
                  			$username = inject_checker($mysqli, ucwords($_POST['username']));
                            $password = inject_checker($mysqli, ucwords(md5($_POST['password'])));
                  
                      // verifica daca utilizatorul, parola si tipul contului exista in baza de date
                      $result = mysqli_query($mysqli, "select 'username', 'password' from utilizatori
                          where username='$username' and password='$password' and tip=0");
                  
                  // s-au colectat rezultatele
                      $user_matched = mysqli_num_rows($result);
                  
                      //verifica daca utilizatorul, parola si tipul contului au fost gasite si redirectioneaza in meniu
                      if ($user_matched > 0) {
                  
                          $_SESSION["username"] = $username;
                          header("location: meniuUser.php");
                      } else {
                          echo "Utilizatorul sau parola sunt gresite!";
                      }
                  }
                  ?>
            </form>
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>