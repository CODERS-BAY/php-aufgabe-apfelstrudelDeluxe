<?php
include_once('include/header.php');

?>

<main>
<h2>Eigene Daten ändern</h2>

<?php include_once('include/connection.php'); 
// Does not work properly --> I only need to see the loged-in user...
$select = "SELECT user_id, user_username, user_name, user_surname, user_image, user_mail, user_password FROM user";
?>
<form id="userEdit" action="userEdit_me.php" method="POST" class="formLarge">
    
    <table>
            <tr> 
                <th>Benutzername</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>eMail-Adresse</th>
                <th>Passwort</th>
                <th>Foto</th>
            </tr>

            <?php
$result = $connection->query($select);
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
            <input name="userId" value="<?php echo $row['user_id'] ?>" type="hidden">
        <tr>
            <td><input name="alterUsername" value="<?php echo $row['user_username'] ?>"></td>
            <td><input name="alterName" value="<?php echo $row['user_name'] ?>"></td>
            <td><input name="alterSurname" value="<?php echo $row['user_surname'] ?>"></td>
            <td><input name="alterMail" value="<?php echo $row['user_mail'] ?>"></td>
            <td><input name="alterPassword" value="<?php echo $row['user_password'] ?>"></td>
            <td>
            <?php 
                        if(isset($_SESSION['photo'])) { 
                            ?>
                            <div class="image"><img style="background-image: url(<?php echo $_SESSION['photo'] ?>)"/></div>
                        <?php
                        } else { 
                            ?>
                            <div class="image"><img style="background-image: url('images/defaultImage.jpg')"/></div>
                        <?php 
                        }
                        ?>
            </td>

        </tr>
        <?php
    }
    ?>
    </table>
    <button id="alterUser" class="submit">Änderungen speichern</button>
</form>




<?php
}
$connection->close();
?>


<?php
include_once('include/footer.php');
?>