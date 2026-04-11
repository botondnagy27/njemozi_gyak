<?php
$uzenet = [];
$kepekKonyvtar = './images/galeria/';

// Ha még nincs mappa, megpróbáljuk létrehozni
if (!file_exists($kepekKonyvtar)) {
    mkdir($kepekKonyvtar, 0777, true);
}

// Képfeltöltés feldolgozása (Csak ha be van lépve!)
if (isset($_SESSION['login']) && isset($_FILES['ujKep'])) {
    $fajl = $_FILES['ujKep'];
    
    // Alapvető hibakezelés
    if ($fajl['error'] === UPLOAD_ERR_OK) {
        $engedelyezett_tipusok = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
        if (in_array($fajl['type'], $engedelyezett_tipusok)) {
            $celPath = $kepekKonyvtar . basename($fajl['name']);
            if (move_uploaded_file($fajl['tmp_name'], $celPath)) {
                $uzenet[] = "Sikeres képfeltöltés!";
            } else {
                $uzenet[] = "Hiba a fájl mentésekor.";
            }
        } else {
            $uzenet[] = "Csak JPG, PNG, WEBP és GIF fájlok engedélyezettek!";
        }
    } else {
        $uzenet[] = "Hiba történt a feltöltés során.";
    }
}

// Képek beolvasása a mappából
$kepek = [];
if (file_exists($kepekKonyvtar)) {
    $dir = opendir($kepekKonyvtar);
    while (($file = readdir($dir)) !== false) {
        // Csak a fájlokat vesszük figyelembe (nem a . és .. mappákat)
        if ($file != '.' && $file != '..') {
            $kepek[] = $kepekKonyvtar . $file;
        }
    }
    closedir($dir);
}
?>