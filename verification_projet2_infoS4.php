<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
 // connexion à la base de données
 $db_username = 'root';
 $db_password = '';
 $db_name = 'projet_info';
 $db_host = 'localhost';
 $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
 or die('could not connect to database');
 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); //va chercher username du html, toute les autre fonction c'est du blabla de sécurité
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])); 
 $id_membre = $_POST['id_membre'];
 $mail = $_POST['mail'];
 
 if($username !== "" && $password !== "")
 {
 $requete = "SELECT count(*) FROM membre where 
 NOM = '".$username."' and MDP = '".$password."' and ID_MEMBRE = ' ".$id_membre" 'and MAIL = '".$mail" '"; //je met pas l'adresse car blc 
 $exec_requete = mysqli_query($db,$requete); 
 $reponse = mysqli_fetch_array($exec_requete);  //tout ça c'est de la vérification, ça transforme des truc en tableau j'avoue j'ai pas tt compris 
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['username'] = $username;
 header('Location: principale.php');
 }
 else
 {
 header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide jsp si on va laisser tout ça pck c'est chiant 
 }
}
else
{
 header('Location: login.php');
}
mysqli_close($db); // fermer la connexion 
?>
