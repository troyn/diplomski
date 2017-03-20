<!DOCTYPE HTML> 
<html>
<head>
</head>
<body>
<?php
include "spoj.php";
$sql_upit="SELECT * FROM student";
if ($q=mysql_query($sql_upit)) {
echo "Uspjeli smo učitati podatke.";
}
echo '<table width="1000" border="1px" cellpadding="2" cellspacing="2">';
while ($redak=mysql_fetch_array($q)) {

echo '<tr><td>'.$redak["broj_indeksa"].'</td>';
echo '<td>'.$redak["ime"] .'</td>';
echo '<td>'.$redak["prezime"].'</td>';
echo '<td>'.$redak["ispit"].'</td>';
echo '<td>'.$redak["ocjena"].'</td>';
echo '<td>'.$redak["opis"].'</td></tr>';


}

?>
</body>
</html>
