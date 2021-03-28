<?php
include_once('include/header.php');

?>

<main>
<!-- teamlead view -->

<h2>Dein Team verwalten</h2>

<?php include_once('include/connection.php'); 

$select = "SELECT team_id, team_name, team_color, team_nicname FROM team WHERE team_id = " . $_SESSION['session_user_team_id'] . ";";

$result = $connection->query($select);
    if($result->num_rows > 0) {
        ?>
        <form id="teamEdit" method="POST" action="teamEdit_team.php" class="formMedium">
            <table>
                    <tr>
                        <th>Team #</th>
                        <th>Teamname</th>
                        <th>Spitzname Team</th>
                        <th>Teamfarbe</th>
                        <th>Farbe ändern</th>
                        
                    </tr>
            <?php
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['team_id'] ?></td>
                    <td><?php echo $row['team_name'] ?></td>
                    <td><input id="alterNicname" name="alterNicname" value="<?php echo $row['team_nicname'] ?>"></td>
                    <td class="<?php echo $row['team_color'] ?>"><?php echo $row['team_color'] ?></td>
                    <td>
                        <select name="alterColor">
                        <?php 
                        $select = "SELECT team_color FROM team";
                        $result = $connection->query($select);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if ($row['team_color']) {
                                    echo "<option value=" . $row['team_color'] . " selected>" . $row['team_color'] . "</options>";
                                } else {
                                    echo "<option value=" . $row['team_color'] . ">" . $row['team_color'] . "</options>";
                                } 
                            }
                        }
                        ?>
                        </select>

                    </td>
                    
                </tr>
                
                <?php
                
            }
            ?>
            </table>
            <button id="alterTeam" class="submit">Änderungen speichern</button>
        </form>

        <div class="output"></div>

        

        <?php
    }

$connection->close();
?>


<!-- admin view missing!!!!!!!!!!!-->



<?php
include_once('include/footer.php');
?>





