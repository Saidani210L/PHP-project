<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "gestion_etudiant");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = " SELECT * FROM groupe WHERE nom_g LIKE '%".$search."%' 
 ";
}
else
{
 //$query = " SELECT * FROM groupe
 //";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= ' 
 <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Nom du classe</th>
     <th>Operation</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["nom_g"].'</td>
    <td> <button class="btn btn-primary" type="submit" name="modifier"><a href="ModGroup.php? modif='.$row["nom_g"].'" class="text-light" > modifier </a></button> </td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Aucunne inscription!';
}

?>