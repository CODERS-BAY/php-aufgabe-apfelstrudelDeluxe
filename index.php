<?php 

include_once ('include/header.php'); ?>

<main>


<!-- If a session exists, then custom welcome message. -->
<?php
    
    //var_dump($_SESSION); 

    if (isset($_SESSION['session_user_name'])) {
        ?>
        <section>
            <h2>Was möchtest du machen?</h2>


            <div class="container">
                <div class="row">
                    <div class="col-4 button"><a href="userEdit.php">Eigene Daten ändern</a></div>

                    <?php 
                    if ($_SESSION['session_user_rights_id'] == 2) {
                        ?>
                        <div class="col-4 button"><a href="teamEdit.php">Team verwalten</a></div>
                        <?php
                    }
                    ?>

                    <?php 
                    if ($_SESSION['session_user_rights_id'] == 3) {
                        ?>
                        <div class="col-4 button"><a href="teamEdit.php">Team verwalten</a></div>
                        <div class="col-4 button"><a href="adminEdit.php">Mitarbeiter verwalten</a></div>
                        <?php
                    }
                    ?>

                </div>
            </div>

        </section> 

        <section>
            <h2><?php echo $_SESSION['session_user_name'] ?>, das ist über dich gespeichert:</h2>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                    <p>Du von deiner besten Seite:</p>
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
                    </div>
                    <div class="col-8">
                    <table>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Benutzername</th>
                    <th>eMail-Adresse</th>
                    <th>Team</th>
                    <th>Spitzname</th>
                </tr>
                <tr>
                    <td><?php echo $_SESSION['session_user_name']; ?></td>
                    <td><?php echo $_SESSION['session_user_surname']; ?></td>
                    <td><?php echo $_SESSION['session_user_username']; ?></td>
                    <td><?php echo $_SESSION['session_user_mail']; ?></td>

                    <?php include_once('include/connection.php'); 

                        $select = "SELECT team_id, team_name, team_color, team_nicname FROM team 
                        WHERE team_id = " . $_SESSION['session_user_team_id'] . ";";

                        $result = $connection->query($select);
                            if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <td><div class="<?php echo $row['team_color'] ?>"><?php echo $row['team_name'] ?></div></td>
                                        <td><div class="<?php echo $row['team_color'] ?>"><?php echo $row['team_nicname'] ?></div></td>
                                <?php
                            }
                        } ?>

                </tr>
            </table>
        <?php                    
        $connection->close();
        ?>
                    </div>
                </div>
            </div>
                
                
        </section>

        <section>
        <h2>Du bist nicht allein!</h2>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <form id="teamMates">
                            <input type="text" name="team" hidden value="<?php echo $_SESSION['session_user_team_id'] ?>">
                            <div class="buttonSubmit">
                                <button>KollegInnen zeigen</button>
                            </div>
                            <!-- <input type="submit" name="checkTeamMates" id="checkTeamMates"> -->
                        </form>
                    </div>
                    <div class="col-8">
                        <div id="yourTeamMates"></div>
                    </div>
                </div>
            </div>
        </section>




<!-- If the user is not logged in: login form -->
        <?php
    } else { 
        //session_start();
        ?>

        <form method="POST" action="login.php" class="form" id="loginForm">
            <h1>Mitarbeiterverwaltung</h1>
            <input type="text" name="userName" placeholder="Benutzername">
            <input type="password" name="userPassword" placeholder="Paswort">
            <input id="login" class="submit" type="submit" value="anmelden">     
        </form>

    <?php    
    }
    ?>



<?php include_once ('include/footer.php'); ?>