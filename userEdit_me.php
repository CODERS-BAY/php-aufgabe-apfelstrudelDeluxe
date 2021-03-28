<?php
include_once('include/header.php');

?>

<?php 
include_once ('include/connection.php');

// does not work correctly!!!!!!!!!!!!!!!!!!!

// Check, if the user is really the session user.
//if(($_SESSION['session_user_username'] == $_POST['alterUsername'])) {

    echo "Ich bin der User.";

        $userid = $_POST['userId'];
        $username = $_POST['alterUsername'];
        $name = $_POST['alterName'];
        $surname = $_POST['alterSurname'];
        $mail = $_POST['alterMail'];
        $password = $_POST['alterPassword'];

        $update = "UPDATE user SET user_username = '" . $username . "', user_name = '" . $name . "', user_surname = '" . $surname . "', user_mail = '" . $mail . "', user_password = '" . $password . "' WHERE user_id = '" . $userid . "';";
    
       if(!$connection->query($update)) {
          echo "Fehler";
       } else {
           echo "Hat funktioniert!";
           var_dump($update);
       };
    

    
    $connection->close();


// } else {
//     echo "Es gibt ein Problem.";
// }

?>


<?php
include_once('include/footer.php');
?>