<?php
sleep(1);
include("connexion.php");
if(isset($_POST['request'])){

    $request = $_POST['request'];
    $req = "SELECT * FROM etudiant WHERE Classe = '$request'";
    $result = $pdo->query($req);
    //$count = mysqLi_num_rows($result);

?>
<table class="table">
<?php
if($result->rowCount()>0){

?>
<thead>
    <tr>
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Classe</th>
        <th>Email</th>
    </tr>
    <?php
}else{
    echo "aucune inscription touvée!";
}
    ?>
</thead>
<tbody>
    <?php 
    while($row = $result ->fetch(PDO::FETCH_ASSOC)){

    ?>
    <tr>
    <td> <?php echo $row['cin']; ?> </td>
    <td> <?php echo $row['nom']; ?> </td>
    <td> <?php echo $row['prenom']; ?> </td>
    <td> <?php echo $row['Classe']; ?> </td>
    <td> <?php echo $row['email']; ?> </td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>
<?php
}
?>