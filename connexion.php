<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>


<body>
    <div>
        <header>
            <nav class='navi'> 
                <center>
                    <section>
                        <ul>
                            <p class="juljul" >panneau de configuration</p>
                            <a href="?page=acceuil" class="href">Accueil</a></li>
                            <a href="?page=utilisateur"  class="href">Utilisateur</a></li>
                            <a href="?page=parametres"  class="href">Paramètres</a></li>
                            <?php 
                if (isset($_SESSION) and !empty($_SESSION)){ ?>
                     <a href="?page=connexion">se deconnecter</a>
                <?php } else { ?>
                    <a href="?page=connexion">connexion</a>
                <?php }
                ?>
                           
                        </ul>
                    </section>
                </center>
            </nav>
        </header>
    </div>
    
<?php


// connexion
if (isset($_POST['submit']) && ($_POST['identifiant'] == 'ptitzin' && $_POST['password'] == '123456')) {
    $_SESSION['data'] = [
        'identifiant' => 'ptitzin',
        'password' => '123456',
        'prenom' => 'jason',
        'nom' => 'bouchez',
        'age' => '19',
        'role' => 'stagiaire',
     ];
     echo 'bienvenue vous etes connecter';
   }
   if (isset($_POST['submit']) && ($_POST['identifiant'] != 'ptitzin' or $_POST['password'] != '123456')) {
        echo 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
?>
    <?php
    // formulaire
    if (isset($_GET['page']) && ($_GET['page'] == 'acceuil' && empty($_SESSION))){
            echo '<form method="POST" class="form">';
            echo '<label for="jason">Identifiant:</label><br>';
            echo '<input type="text" id="jason" name="identifiant"><br><br>';
            echo '<label for="password">Mot de passe:</label><br>';
            echo '<input type="password" id="password" name="password"><br><br>';
            echo '<input type="submit" name="submit" value="Se connecter"><br><br>
            </form>';
    }
    
    
    //  acceuil
        if ($_GET['page'] == 'acceuil' && !empty($_SESSION)) {
            echo '<h1>bienvenue, vous etes actuellement connecte(é)</h1> ' . '<h1> yeah papayyy  </h1> ';
        } 

    // utilisateur 
    if (isset($_GET['page']) && $_GET['page'] == 'utilisateur' && empty($_SESSION)){ ?>
        <p> Vous devez être connecté pour pouvoir avoir accès à cette partie du site</p>
    <?php }

    if (isset($_GET['page']) && $_GET['page'] == 'utilisateur' && !empty($_SESSION)){ ?>
        <h1>Vos informations utilisateurs</h1>
        <p>Nom : <?php echo $_SESSION['data']['nom']; ?></p>
        <p>Prénom : <?php echo $_SESSION['data']['prenom']; ?></p>
        <p>Age : <?php echo $_SESSION['data']['age']; ?></p>
        <p>Rôle : <?php echo $_SESSION['data']['role']; ?></p>
    <?php }

     // parametres
        
     if (isset($_GET['page']) && $_GET['page'] == 'parametres' && empty($_SESSION)){ ?>
        <p class="alert warning">Vous devez être connecté pour pouvoir avoir accès à cette partie du site</p>
    <?php }

    if (isset($_GET['page']) && $_GET['page'] == 'parametres' && !empty($_SESSION)){ ?>
        <form action="index.php"  method="POST" class="formConnexion" >
            <h1>Modification de vos paramètres</h1>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo $_SESSION['data']['nom']; ?>">
            <br>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php echo $_SESSION['data']['prenom']; ?>">
            <br>
            <label for="age">Age</label>
            <input type="number" name="age" value="<?php echo $_SESSION['data']['age']; ?>">
            <br>
            <label for="role">Rôle</label>
            <input type="text" name="role" value="<?php echo $_SESSION['data']['role']; ?>">
            <br>
            <input type="submit" name="submitUpdate" value="Modifier">
        </form>
    <?php 
    }
        // deconnexion
       
        if (isset($_GET['page']) && ($_GET['page']) == 'connexion' && !empty($_SESSION)) {
            session_destroy();
            echo '<h1>veuillez vous deconnecter.</h1>';
            echo '<form method=POST>';
            echo '<input type="submit" name="se deconnecter" value="se deconnecter">';
            echo  '</form>';
            
            
        }
        ?>
    
    </form>
    
    </form>
</body>

</html>
