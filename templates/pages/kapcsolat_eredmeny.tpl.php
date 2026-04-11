<h2>Üzenetküldés eredménye</h2>

<?php if ($hiba): ?>
    <h3 style="color: red;"><?= $uzenet_szoveg ?></h3>
    <a href="?kapcsolat">Vissza az űrlaphoz</a>
<?php else: ?>
    <h3 style="color: green;"><?= $uzenet_szoveg ?></h3>
    <p><strong>Az Ön által megadott adatok:</strong></p>
    <ul>
        <li>Név: <?= htmlspecialchars($_POST['nev']) ?></li>
        <li>E-mail: <?= htmlspecialchars($_POST['email']) ?></li>
        <li>Üzenet: <?= nl2br(htmlspecialchars($_POST['uzenet'])) ?></li>
    </ul>
    <a href="?">Vissza a főoldalra</a>
<?php endif; ?>