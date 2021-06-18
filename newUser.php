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
                <a href="index.html"><img border="0" alt="logo" src="css/logo.png" ></a>
            
            </div>
         </div>
         <div id="left-column">
            <strong>Autentificare ca:</strong>
            <ul>
               <li> <a href="loginUser.php">Utilizator</a>
               <li> <a href="loginAdministrator.php">Administrator</a>
            </ul>
         </div>
         <div id="right-column">
            <form action="newUser.php" method="post">
               <table>
                  <tr>
                     <th>Introduceti date in fiecare camp:</th>
                  </tr>
                  <tr>
                     <td>Nume:</td>
                     <td><input type="text" name="nume"></td>
                  </tr>
                  <tr>
                     <td>Username:</td>
                     <td><input type="text" name="username"></td>
                  </tr>
                  <tr>
                     <td>Parola:</td>
                     <td><input type="password" name="password"></td>
                  </tr>
                  <tr>
                     <td>Email:</td>
                     <td><input type="email" name="email"></td>
                  </tr>
                  <tr>
                     <td><input type="submit" name="register" class="btn" value="Trimite"></td>
                     <td><input type="reset" value="Reseteaza"></td>
                  </tr>
               </table>
               <?php
                  // creeaza conexiunea cu baza de date;
                  include("connect.php");
                  include("antiinject.php");
                  
                  
                  if (isset($_POST['register'])) {
                      
                  $nume = inject_checker($mysqli, ucwords($_POST['nume']));
                  $username = inject_checker($mysqli, ucwords($_POST['username']));
                  $email = inject_checker($mysqli, ucwords($_POST['email']));
                  $password = inject_checker($mysqli, ucwords(md5($_POST['password'])));
				  
				  //nu se poate crea utilizator fara sa fie completate toate spatiile
				  if(empty($nume)){
					echo "Nu ati introdus numele!";
					
					}
				elseif(empty($username)){
					echo "Nu ati introdus username!";
					
					}
				elseif(empty($password)){
					echo "Nu ati introdus parola!";
					
					}
				elseif(empty($email)){
					echo "Nu ati introdus email!";
					
				}else{
                  
                      // verifica daca utilizatorul exista deja
                      $username_result = mysqli_query($mysqli, "select 'username' from utilizatori where username='$username' and password='$password'");
                  
                      // s-au colectat rezultatele
                      $user_matched = mysqli_num_rows($username_result);
                  
                      // daca s-a gasit o valoarea mai mare decat 0, inseamna ca utilizatorul exista
                      if ($user_matched > 0) {
                          echo " Deja exista un utilizator cu numele, '$username'.";
						  
                      } else {
                          // insereaza utilizatorul in baza de data
                          $result   = mysqli_query($mysqli, "INSERT INTO utilizatori(nume,username,email,password,tip) VALUES('$nume','$username','$email','$password','0')");
                  
                          // verifica daca utilizatorul a fost inserat cu succes
                          if ($result) {
                              echo "Utilizator creat cu succes!";
							  header('refresh:2');
                          } else {
                              echo "Eroare la inregistrare! Incercati din nou." . mysqli_error($mysqli);
                          }
                      }
                  }
                  }
                  ?>
            </form>
         </div>
         <div id="footer">2020 Mitroi Florentina. All rights reserved.</div>
      </div>
   </body>
</html>