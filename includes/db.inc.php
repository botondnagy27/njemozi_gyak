<?php
try {
    // Élesítéskor csak EZEKET az adatokat kell majd átírni!
    $host = 'localhost';
    $dbname = 'gyakorlat7'; // A tárhelyen ez lesz az 'adatb'
    $user = 'root';         // A tárhelyen ez lesz az 'adatbf'
    $pass = '';             // A tárhelyen ez lesz a jelszó '****'

    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
}
catch (PDOException $e) {
    die("Adatbázis csatlakozási hiba: " . $e->getMessage());
}
?>