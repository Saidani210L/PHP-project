<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nom=$_REQUEST['nom_g'];


include("connexion.php");
         $sel=$pdo->prepare("select nom_g from groupe where nom_g=? limit 1");
         $sel->execute(array($nom));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur="Classe existe déja!";// Classe existe déja
            header('location:ajouterGroupe.php');
         }else{
            $req="insert into groupe values ('$nom')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="Ajouté avec succée!";
            header('location:afficherGroupe.php');
         }  
         echo $erreur;
         
}
?>