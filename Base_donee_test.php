
<?php
$serveur = "localhost"; 
$utilisateur = "root"; 
$mdp = ""; 
$bdd = "base_test";
$connexion = mysqli_connect($serveur, $utilisateur, $mdp, $bdd);

if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}
else{
    echo"on est la" ;
}
echo"test github"

?>
