<?php
try {
    // Élesítéskor csak EZEKET az adatokat kell majd átírni!
    $host = 'localhost';
    $dbname = 'fi4exm'; // A tárhelyen ez lesz az 'adatb'
    $user = 'fi4exm';         // A tárhelyen ez lesz az 'adatbf'
    $pass = 's3G@rhUTd8Lz@Z!';             // A tárhelyen ez lesz a jelszó '****'

    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
}
catch (PDOException $e) {
    die("Adatbázis csatlakozási hiba: " . $e->getMessage());
}
?>
