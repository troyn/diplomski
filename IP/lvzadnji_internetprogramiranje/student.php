<!DOCTYPE HTML> 
<html>
<head>
</head>
<body>
<?php
include "spoj.php";
$ime = $prezime = $broj_indeksa = $polozeni_ispit = $ocjena = "";
?>

<form action="upis.php" method="post">
Ime: <input type="text" name="ime"><br>
Prezime: <input type="text" name="prezime"><br>
Broj indeksa: <input type="text" name="broj_indeksa"><br>
Ploženi ispit: <input type="text" name="polozeni_ispit"><br>
Ocjena: <input type="text" name="ocjena"><br>
Opis: <textarea name="opis" rows="5" cols="40">
</textarea>
<input type="submit">
</form>
<br>


</body>
</html>