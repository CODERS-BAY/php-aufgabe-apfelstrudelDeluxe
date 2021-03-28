<?php
include_once('include/header.php');

?>

<?php 
include_once ('include/connection.php');

// Check, if the user is really an admin.
if((($_SESSION['session_user_rights_id']) == 3)) {

    echo "Ich bin Admin.";

    if (!isset($_POST['delete'])) {

        echo "Ich kann mich nicht löschen und das ist gut so.";

        $userid = $_POST['userId'];
        $username = $_POST['alterUsername'];
        $name = $_POST['alterName'];
        $surname = $_POST['alterSurname'];
        $mail = $_POST['alterMail'];
        $password = $_POST['alterPassword'];
        $team = $_POST['alterTeam'];
        $rights = $_POST['alterRights'];

        $update = "UPDATE user SET user_username = '" . $username . "', user_name = '" . $name . "', user_surname = '" . $surname . "', user_mail = '" . $mail . "', user_password = '" . $password . "', user_team_id = " . $team . ", user_rights_id = " . $rights . " WHERE user_id = '" . $userid . "';";
    
       if(!$connection->query($update)) {
          echo "Fehler";
       } else {
           echo "Hat funktioniert!";
           var_dump($update);
       };
    
    } else {
        echo "Wir löschen einen Mitarbeiter.";

        $delete = 'DELETE FROM user WHERE user_id=' . $userid;
        if ($connection->query($delete)) {
            echo 'true';
        } else {
            echo 'false';
        }


    }

    $connection->close();


} else {
    echo "Es gibt ein Problem.";
}

?>


<?php
include_once('include/footer.php');
?>