<?php

/*
 * si $_GET['id'] existe on supprime la clé correspondante
 */
if (isset($_GET['id'])){
    $requete='delete from messages where id='.$_GET['id'];
    $connexion->exec($requete);
}

//on prepare la requête
$requete = 'select * from messages;';
//on execute la requete et on recupère un poiteur sur les données
$resultats = $connexion->query($requete);
//parametrage : tableau récupérer sous forme de tableau associatif
$lignes = $resultats->fetchAll(PDO::FETCH_OBJ);
foreach ($lignes as $ligne) {
    echo "<a href='index.php?action=listemess&id=",
    $ligne->id, "'>", $ligne->id, "</a>", $ligne->pseudo_user, " ", $ligne->message;

    echo "<br>";
}
echo "<br>";

//deconnexion
$connexion = null;
?>
