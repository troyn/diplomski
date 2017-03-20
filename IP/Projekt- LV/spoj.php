<?php
//funkcija //funkcija za spoj na mysql server
if (!$spoj=@mySQL_connect("localhost", "root", "sepej"))
{
die ("<b>Došlo je do pogreške pogreške i niste spojeni na MySQL server</b>");
}
//funkcija //funkcija za odabir baze na serveru serveru
if (!mySQL_select_db("zavrsndsdfsi rad", $spoj))
{
die ("<b>Odabrana Odabrana je pogrešna pogrešna baza podataka podataka.</b>
");
}
?>
