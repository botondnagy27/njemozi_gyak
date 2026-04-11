<?php
$crud_hiba = "";
$editData = null;

try {
	require_once('./includes/db.inc.php');

    $action = isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : '');

    // 1. TÖRLÉS (Delete)
    if ($action == 'delete' && isset($_GET['id'])) {
        $stmt = $dbh->prepare("DELETE FROM mozi WHERE moziazon = :id");
        $stmt->execute([':id' => $_GET['id']]);
        header("Location: ?crud");
        exit;
    }

    // 2. MENTÉS (Create & Update)
    if ($action == 'save') {
        $moziazon = $_POST['moziazon'];
        $mozinev = $_POST['mozinev'];
        $irszam = $_POST['irszam'];
        $cim = $_POST['cim'];
        $telefon = $_POST['telefon'];
        $isUpdate = $_POST['isUpdate'];

        if ($isUpdate == '1') {
            $stmt = $dbh->prepare("UPDATE mozi SET mozinev=:nev, irszam=:irs, cim=:cim, telefon=:tel WHERE moziazon=:id");
            $stmt->execute([':nev'=>$mozinev, ':irs'=>$irszam, ':cim'=>$cim, ':tel'=>$telefon, ':id'=>$moziazon]);
        } else {
            $stmt = $dbh->prepare("INSERT INTO mozi (moziazon, mozinev, irszam, cim, telefon) VALUES (:id, :nev, :irs, :cim, :tel)");
            $stmt->execute([':id'=>$moziazon, ':nev'=>$mozinev, ':irs'=>$irszam, ':cim'=>$cim, ':tel'=>$telefon]);
        }
        header("Location: ?crud");
        exit;
    }

    // 3. SZERKESZTŐ MEZŐK BETÖLTÉSE
    if ($action == 'edit' && isset($_GET['id'])) {
        $stmt = $dbh->prepare("SELECT * FROM mozi WHERE moziazon = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $editData = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 4. ÖSSZES ADAT LEKÉRDEZÉSE (Read)
    $stmt = $dbh->query("SELECT * FROM mozi");
    $mozik = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $crud_hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>