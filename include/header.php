<?php session_start(); ?>
<!DOCTYPE html>
<html lang="at-de">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="styles/styles.css">
      <link rel="stylesheet" type="text/css" href="styles/grid.css">
      <title>ACME Mitarbeiterverwaltung</title>
      <meta name="description" content="ACME Mitarbeiterverwaltung - sehen, verwalten, ändern">
      <meta name=”robots” content=”noindex, nofollow”>
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
      <!-- Favicon via online favicon generator-->
      <script src="https://kit.fontawesome.com/dae9db81ff.js" crossorigin="anonymous"></script>
   </head>

   <header>
      <a href="index.php"><img src="images/logo.svg" alt="logo"></a>

      <nav>
         <ul>

        <?php 
        
        if (isset($_SESSION['session_user_name'])) { ?>
            <li>Hallo <?php echo $_SESSION['session_user_name'] . '!'; } ?></li>

            <li><a href="userEdit.php"><i class="fas fa-user"></a></i></li>

            <?php 
            if ($_SESSION['session_user_rights_id'] == 2) {
                  ?>
                  <li><a href="teamEdit.php"><i class="fas fa-users"></i></a></li>
                  <?php
               }
               ?>

            <?php 
            if ($_SESSION['session_user_rights_id'] == 3) {
                  ?>
                  <li><a href="teamEdit.php"><i class="fas fa-users"></i></a></li>
                  <li><a href="adminEdit.php"><i class="fas fa-cog"></i></a></li>
                  <?php
               }
               ?>

            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
         </ul>
      </nav>

   </header>



   <html>

