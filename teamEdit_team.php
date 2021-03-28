<?php
include_once('include/header.php');

?>

<?php 
//session_start();
include_once ('include/connection.php');

if(isset(($_SESSION['session_user_team_id']))) {

    if (!empty($_POST['alterNicname'])) {

        $nicname = $_POST['alterNicname'];
        $color = $_POST['alterColor'];
        $teamId = $_SESSION["session_user_team_id"];
        $update = 'UPDATE team SET team_nicname = "' . $nicname . '", team_color = "' . $color . '" WHERE team_id = '.$teamId.';';
    
       if(!$connection->query($update)) {
          echo "Fehler";
       } else {
           echo "Hat funktioniert!";
           var_dump($update);
       };
    
    }
    
    $connection->close();


} else {
    echo "Es gibt ein Problem.";
}

?>


<?php
include_once('include/footer.php');
?>