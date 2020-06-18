<?php
//on rajoute le traitement du formulaire
//on initialise les variables
$pseudo_user = '';


$message = '';
$info = '';
$valid = true;
$enreg = false;
$affich = false;
//cas ou le formulaire a été soumis
if (isset($_POST['pseudo_user'])) {
    $pseudo_user=$_POST['pseudo_user'];
    $message = $_POST['message'];
    if (isset($_POST['enreg'])) {
        $enreg = true;
    }
    if (isset($_POST['affich'])) {
        $affich = true;
    }
//validation des données

    if (empty($pseudo_user)) {
        $valid = false;
        $info = $info . "<br>Le nom est obligatoire";
    }

    if (empty($message)) {
        $valid = false;
        $info = $info . "<br>Le message est obligatoire";
    }

//on prépare la requête SQL si les données sont valides
    if ($valid && $enreg) {
        $message_prep = addslashes($message);

        $requete = "insert into messages (pseudo_user,message)"
                . " values('$pseudo_user','$message_prep');";


//on encadre l'instruction qui peut provoquer une exception par un try
        try {
            $connexion->exec($requete);
            $info = "Message bien inséré";
//on traite l'exception dans le catch
        } catch (PDOException $e) {
            //echo "<br>Problème pour inserer la ligne, verifier vos saisies<br>";
            //echo "code erreur", $e->getCode(), "<br>";
            //echo "message d' erreur", $e->getMessage(), "<br>";
            if ($e->getCode() == 42000) {
                $info = $info . "<br>Erreur de syntaxe appeler l'assistance au 0545897888";
            } else {
                $info = $info . "<br>Problème pour inserer le message, verifier vos saisies<br>";
            }
        }
    }
    if ($valid && $affich) {
        $tab = explode(' ', $message);
        $nb = count($tab);
        $info .= "<br>Il y a $nb mot(s)";
        $chaine = implode($tab);
        $nb_lettres = strlen($chaine);
        $info .= "<br>Il y a $nb_lettres lettre(s)";
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=saisiemess" >

    <div >
        <label for="pseudo_user">Nom</label><input type='text' name='pseudo_user' size='15' id='pseudo_user' value="<?= $pseudo_user ?>" />
    </div>
    <div >
        <label for="message">Message</label><textarea  name='message' id="message" ><?= $message ?></textarea>
    </div>

    <div >
        <input type='submit' name='enreg' value='Enregistrer' />
        <input type="submit" name="affich" value="Afficher" />
    </div>
</form>
<p><strong><?= $info ?></strong></p>
