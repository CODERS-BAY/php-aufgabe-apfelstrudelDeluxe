<?php session_start(); ?>
<table>
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>eMail-Adresse</th>
    </tr>
    <tr>
        <?php include_once('include/connection.php'); 

            $select = "SELECT user_username, user_name, user_surname, user_mail, user_team_id FROM user 
            WHERE user_team_id = " . $_SESSION['session_user_team_id'] . ";";

            $result = $connection->query($select);
                if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['user_surname'] ?></td>
                            <td><?php echo $row['user_mail'] ?></td>
                        </tr>
                    <?php
                }
            } ?>

    
</table>
<?php                    
$connection->close();
?>