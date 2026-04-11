<?php
$hiba = false;
$uzenet_szoveg = "";

if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $uzenet = trim($_POST['uzenet']);
    $vendeg_e = isset($_SESSION['login']) ? 0 : 1;

    // Szerveroldali ellenőrzés
    if (empty($nev) || empty($email) || empty($uzenet)) {
        $hiba = true;
        $uzenet_szoveg = "Minden mező kitöltése kötelező!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hiba = true;
        $uzenet_szoveg = "Hibás e-mail formátum!";
    }

    // Ha nincs hiba, mentés az adatbázisba
    if (!$hiba) {
        try {
			require_once('./includes/db.inc.php');
            
            $sqlInsert = "INSERT INTO uzenetek (nev, email, uzenet, vendeg_e) VALUES (:nev, :email, :uzenet, :vendeg_e)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(
                ':nev' => $nev, 
                ':email' => $email,
                ':uzenet' => $uzenet,
                ':vendeg_e' => $vendeg_e
            )); 
            
            $uzenet_szoveg = "Köszönjük! Az üzenetét sikeresen elmentettük.";
        } catch (PDOException $e) {
            $hiba = true;
            $uzenet_szoveg = "Adatbázis hiba: " . $e->getMessage();
        }
    }
} else {
    header("Location: ?kapcsolat");
    exit;
}
?>