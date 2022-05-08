<?php
include("connexion.php");
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM groupe WHERE nom_g='$id'";
    $req="DELETE FROM etudiant WHERE classe='$id'";
    $result = $pdo->query($sql);
    if($result){
        if($pdo->query($req)){
            header('location:supprimerGroupe.php');
        }
    }else{
        echo "Error";
    }
}
?>