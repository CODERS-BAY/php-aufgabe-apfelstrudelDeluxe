<?php 
include_once('include/header.php')?>


<main>

<?php include_once('include/connection.php')?>

<!-- fetch data from db with prepared statements -->

<!-- sql query in variable -->
<?php
$select = "SELECT user_id, user_username, user_name, user_surname, user_image,user_mail, user_password, user_team_id, user_rights_id FROM user WHERE user_username='". $_POST['userName']."' AND
user_password='". md5($_POST['userPassword']) ."' ";
//echo $select;

// prepare statement with ? instead of a variable
$select = $connection->prepare($select = "SELECT user_id, user_username, user_name, user_surname, user_image, user_mail, user_password, user_team_id, user_rights_id FROM user WHERE user_username=? AND user_password=?");

// bind parameter
$select->bind_param("ss", $username, $password);

// set parameter
$password = $_POST['userPassword'];
$username = $_POST['userName'];

// execute
$result = $select->execute();

// save result in variable
$result = $select->get_result();

// Check if user is in db, log in and fetch data for user-session
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //$_SESSION['session_user_id'] = $row['user_id'];
        $_SESSION['session_user_username'] = $row['user_username'];
        $_SESSION['session_user_name'] = $row['user_name'];
        $_SESSION['session_user_surname'] = $row['user_surname'];
        $_SESSION['session_user_mail'] = $row['user_mail'];
        $_SESSION['session_user_password'] = $row['user_password'];
        $_SESSION['session_user_team_id'] = $row['user_team_id'];
        $_SESSION['session_user_rights_id'] = $row['user_rights_id'];

        if ($row['user_image']) {
            $_SESSION['session_user_image'] = $row['user_image'];
        }
    }

    echo '<h2>Hallo ' . $_SESSION['session_user_name'] . '</h2>';
    echo '<h3><a href="index.php">Zu deiner Übersicht.</a></h3>';
    //var_dump($_SESSION); 

} else {
    echo '<h3>Passwort oder Benutzername stimmen nicht.</h3>';
    echo '<h3><a href="index.php">Nochmal anmelden.</a></h3>';
}

$connection->close(); 
$select->close();

?>


<?php include_once('include/footer.php')?>


