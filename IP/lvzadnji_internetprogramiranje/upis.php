<?php
include "spoj.php";
$sql_forma="INSERT INTO student (broj_indeksa, ime, prezime, ispit, ocjena, opis)
VALUES ('$_POST[broj_indeksa]', '$_POST[ime]', '$_POST[prezime]','$_POST[polozeni_ispit]',
'$_POST[ocjena]', '$_POST[opis]')";
if (mysql_query($sql_forma))
{
echo "Pohranili smo podatke o studentu.<br>";
} else {
echo "Nismo mogli pograniti pohraniti podatke podatke";
}

?>