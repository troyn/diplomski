<?php
//funkcija //funkcija za spoj na mysql server
if (!$connection=@mySQL_connect("localhost", "root", ""))
{
die ("<b>Došlo je do pogreške pogreške i niste spojeni na MySQL server</b>");
}
//funkcija //funkcija za odabir baze na serveru serveru
if (!mySQL_select_db("diplomski rad", $connection))
{
die ("<b>Odabrana je pogrešna pogrešna baza podataka podataka.</b>
");
}
?>
