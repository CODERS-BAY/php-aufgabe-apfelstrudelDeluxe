<?php
include_once('include/header.php');

?>

<main>
<h2>Alle Mitarbeiter</h2>

<?php include_once('include/connection.php'); 

$select = "SELECT user_id, user_username, user_name, user_surname, user_image, user_mail, user_password, user_team_id, user_rights_id FROM user";

$result = $connection->query($select);
if($result->num_rows > 0) {
?>
<form id="adminEdit" action="adminEdit_employees.php" method="POST" class="formLarge">
    
    <table>
            <tr> 
                <th>Benutzername</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>eMail-Adresse</th>
                <th>Passwort</th>
                <th>Team</th>
                <th>Rolle</th>
                <th>löschen</th>
            </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        ?>
            <input name="userId" value="<?php echo $row['user_id'] ?>" type="hidden">
        <tr>
            <td><input name="alterUsername" value="<?php echo $row['user_username'] ?>" required></td>
            <td><input name="alterName" value="<?php echo $row['user_name'] ?>" required></td>
            <td><input name="alterSurname" value="<?php echo $row['user_surname'] ?>" required></td>
            <td><input name="alterMail" value="<?php echo $row['user_mail'] ?>" required></td>
            <td><input name="alterPassword" value="<?php echo $row['user_password'] ?>" required></td>
            <td>
                <select name="alterTeam">
                <?php 
                $select = "SELECT team_name, team_id FROM team";
                $result = $connection->query($select);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row['team_name']) {
                            echo "<option value=" . $row['team_id'] . " selected>" . $row['team_name'] . "</options>";
                        } else {
                            echo "<option value=" . $row['team_id'] . ">" . $row['team_name'] . "</options>";
                        } 
                    }
                }
                ?>
                </select>
            </td>
            <td>
                <select name="alterRights">
                <?php 
                $select = "SELECT rights_name, rights_id FROM rights";
                $result = $connection->query($select);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row['rights_name']) {
                            echo "<option value=" . $row['rights_id'] . " selected>" . $row['rights_name'] . "</options>";
                        } else {
                            echo "<option value=" . $row['rights_id'] . ">" . $row['rights_name'] . "</options>";
                        } 
                    }
                }
                ?>
                </select>
            </td>


            <td>
            <?php
            // A user can´t delete himself.
                if($row['user_username']) {
                    ?>
                    <input name="delete" type="checkbox" id="delete">
                <?php
                } else {
                    ?>
                    <div>nicht möglich</div>
                <?php
                    
                }
            ?>    
                
            </td>
            
        </tr>
        <?php
    }
    ?>
    </table>
    <button id="alterAdmin" class="submit">Änderungen speichern</button>
</form>

<h2>Mitarbeiter/in anlegen</h2>

<form id="newUser" class="form" action="adminEdit_newEmployee.php" method="POST">
    <input type="text" name="newUsername" placeholder="Benutzername">
    <input type="text" name="newName" placeholder="Vorname">
    <input type="text" name="newSurname" placeholder="Nachname">
    <input type="text" name="newMail" placeholder="eMail-Adresse">
    <input type="text" name="newPassword" placeholder="Passwort">
    <select name="newTeam">
        <?php 
        $select = "SELECT team_name, team_id FROM team";
        $result = $connection->query($select);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value=" . $row['team_id'] . ">" . $row['team_name'] . "</options>";
            }
        }
        ?>
    </select>
    <select name="newRights">
        <?php 
        $select = "SELECT rights_name, rights_id FROM rights";
        $result = $connection->query($select);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value=" . $row['rights_id'] . ">" . $row['rights_name'] . "</options>";
            }
        }
        ?>    
    </select>
    <input type="submit" value="anlegen">
</form>


<?php
}
$connection->close();
?>


<?php
include_once('include/footer.php');
?>