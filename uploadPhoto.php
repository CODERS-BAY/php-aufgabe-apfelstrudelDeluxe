<?php
include_once('include/header.php');
?>

<main>

<?php

// FUNKTIONIERT NICHT!!!!!!!!!!!!!!!

    var_dump($_FILES); 

    // which file, where and which name
    if(is_uploaded_file($_FILES['userimage']['tmp_name'])) {
        
        move_uploaded_file($_FILES['userimage']['tmp_name'], 'images/' . $_FILES['userimage']['name']);

        // upload file-path to db
        include_once('include/connection.php');

        $filename = 'images/' . $_FILES['userimage']['name'];

        $update = 'UPDATE user SET user_image =" ' . $filename . '" WHERE user_username = "' . $_POST['user_username'] . '"';

        if($connection->query($update)){
            echo '<h3>Bild wurde erfolgreich hochgeladen.</h3>'; 
            $_SESSION['session_user_image'] = $filename;
        } else {
            echo '<h3>Hat nicht funktioniert.</h3>';
        }

        $connection->close();

    } else {
        echo '<h3>Bild konnte nicht hochgeladen werden.</h3>';
    }

?>


<?php
include_once('include/footer.php');
?>
