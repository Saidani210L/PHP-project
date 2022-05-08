<?php
include("connexion.php");
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM etudiant WHERE cin=$id";
    $result = $pdo->query($sql);
    if($result){
        header('location:supprimerEtudiant.php');
    }else{
        echo "Error";
    }
}
?>