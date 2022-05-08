<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "gestion_etudiant");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = " SELECT * FROM etudiant WHERE cin LIKE '%".$search."%' 
  OR nom LIKE '%".$search."%' 
  OR prenom LIKE '%".$search."%' 
  OR Classe LIKE '%".$search."%' 
  OR email LIKE '%".$search."%'
 ";
}
else
{
 //$query = " SELECT * FROM etudiant
 //";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= ' 
 <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>cin</th>
     <th>nom</th>
     <th>prenom</th>
     <th>classe</th>
     <th>email</th>
     <th>Operation</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["cin"].'</td>
    <td>'.$row["nom"].'</td>
    <td>'.$row["prenom"].'</td>
    <td>'.$row["Classe"].'</td>
    <td>'.$row["email"].'</td>
    <td> <button class="btn btn-danger" type="submit" name="supprimer"><a href="SuppEtud.php? deleteid='.$row["cin"].'" class="text-light" > Supprimer </a></button> </td>
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