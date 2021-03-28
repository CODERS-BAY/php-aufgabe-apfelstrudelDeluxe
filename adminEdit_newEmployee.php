<?php
include_once('include/header.php');

?>

<?php 
include_once ('include/connection.php');

// Check, if the user is really an admin.
if((($_SESSION['session_user_rights_id']) == 3)) {

    echo "Ich bin Admin und darf neue User anlegen.";

    //if (isset($_POST['newUsername'])) {

        $username = $_POST['newUsername'];
        $name = $_POST['newName'];
        $surname = $_POST['newSurname'];
        $mail = $_POST['newMail'];
        $password = $_POST['newPassword'];
        $team = $_POST['newTeam'];
        $rights = $_POST['newRights'];

        $insert = "INSERT INTO user (user_username, user_name, user_surname, user_mail, user_password, user_team_id, user_rights_id) VALUES (
            '". $username ."', '". $name ."', '".$surname."', '".$mail."', '".$password."',$team ,$rights);";
    
       if(!$connection->query($insert)) {
          echo "Fehler";
       } else {
           echo "Hat funktioniert!";
           var_dump($insert);
       };
    
    } else {
        echo "Daten fehlen zum Anlegen eines neuen Mitarbeiters.";
    }

    $connection->close();


// } else {
//     echo "Es gibt ein Problem.";
// }

?>


<?php
include_once('include/footer.php');
?>