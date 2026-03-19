<?php
require_once "./Utilisateur.php";

$s = new Utilisateur(1,"test","test2","test3");
echo $s->getTypeUtilisateur();
echo "<br>";
echo $s->getIdUtilisateur();
 $s->setPseudo("iomFyh");
echo "<br>";
echo $s->getPseudo();
?>