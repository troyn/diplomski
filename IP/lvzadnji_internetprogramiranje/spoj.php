<?php
//funkcija //funkcija za spoj na mysql server
if (!$spoj=@mySQL_connect("localhost", "root", ""))
{
die ("<b>Došlo je do pogreške pogreške i niste spojeni na MySQL server</b>");
}
//funkcija //funkcija za odabir baze na serveru serveru
if (!mySQL_select_db("bazass_korisnika", $spoj))
{
die ("<b>Odabrana Odabrana je pogrešna pogrešna baza podataka podataka.</b>
");
}
?>
