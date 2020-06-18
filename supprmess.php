<?php
if (isset($_SESSION['pseudo_user'])) {
    $pseudo_user = $_SESSION['pseudo_user'];
    echo "<h2>Pseudo : $pseudo_user</h2>";
}
//si le formulaire a ete soumis on supprime les identifiants cochés
if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $requete = "delete from messages where id in(";
    $where = '';
    foreach ($ids as $id) {
        if ($where != '') {
            $where .= ',';
        }
        $where .= $id;
    }
    $where .= ")";
    $requete .= $where;
    try {
        $connexion->exec($requete);
    } catch (PDOException $e) {

        if ($e->getCode() == 42000) {
            $info = $info . "<br>Erreur de syntaxe appeler l'assistance au 0545897888";
        } else {
            $info = $info . "<br>Problème pour supprimer les messages<br>";
        }
    }
}
$info = '';
$requete = 'select * from messages';
try {
    $resultats = $connexion->query($requete);
    //parametrage : tableau récupérer sous forme de tableau associatif

    $lignes = $resultats->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {

    if ($e->getCode() == 42000) {
        $info = $info . "<br>Erreur de syntaxe appeler l'assistance au 0545897888";
    } else {
        $info = $info . "<br>Problème pour lister les messages<br>";
    }
}
?>
<form action="index.php?action=supprmess" method="POST">
    <table>
        <?php foreach ($lignes as $ligne): ?>
            <tr>
                <td><?= $ligne->id ?></td>
                <td><?= $ligne->pseudo_user ?> </td>
                <td> <?= $ligne->message ?></td>
                <td><input type="checkbox" name="ids[]" value="<?= $ligne->id ?>"></td>

            </tr>
        <?php endforeach ?>
    </table>
    <input type="submit" value="supprimer">
</form>
<?php
//deconnexion
$connexion = null;
echo $info;
?>
