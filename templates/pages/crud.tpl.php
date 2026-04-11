<style>
    /* A csatolt kép stílusának leképezése */
    .btn { padding: 8px 15px; border: none; border-radius: 4px; color: white; cursor: pointer; text-decoration: none; display: inline-block; font-size: 14px;}
    .btn-primary { background-color: #007bff; margin-bottom: 15px; }
    .btn-info { background-color: #17a2b8; margin-right: 5px; }
    .btn-danger { background-color: #dc3545; }
    
    .crud-table { width: 100%; border-collapse: collapse; margin-top: 10px; background: white; border: 1px solid #ddd; }
    .crud-table th, .crud-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    .crud-table th { background-color: #f8f9fa; font-weight: bold; border-top: 2px solid #007bff; }
    
    .crud-form { background: #f8f9fa; padding: 20px; border-radius: 5px; border: 1px solid #ddd; margin-bottom: 20px;}
    .crud-form input { padding: 8px; margin: 5px 0; width: 100%; box-sizing: border-box; }
</style>

<h2>Mozi Adatbázis (CRUD)</h2>

<?php if ($crud_hiba): ?>
    <p style="color: red;"><?= $crud_hiba ?></p>
<?php endif; ?>

<div class="crud-form">
    <h3><?= $editData ? 'Kiválasztott mozi szerkesztése' : 'Új mozi hozzáadása' ?></h3>
    <form action="?crud" method="post">
        <input type="hidden" name="action" value="save">
        <input type="hidden" name="isUpdate" value="<?= $editData ? '1' : '0' ?>">
        
        <label>Azonosító (moziazon):</label>
        <input type="number" name="moziazon" value="<?= $editData['moziazon'] ?? '' ?>" <?= $editData ? 'readonly style="background:#eee;"' : 'required' ?>>
        
        <label>Név:</label>
        <input type="text" name="mozinev" value="<?= $editData['mozinev'] ?? '' ?>" required>
        
        <label>Irányítószám:</label>
        <input type="number" name="irszam" value="<?= $editData['irszam'] ?? '' ?>">
        
        <label>Cím:</label>
        <input type="text" name="cim" value="<?= $editData['cim'] ?? '' ?>">
        
        <label>Telefon:</label>
        <input type="text" name="telefon" value="<?= $editData['telefon'] ?? '' ?>">
        
        <button type="submit" class="btn btn-primary"><?= $editData ? 'Mentés' : 'Hozzáadás' ?></button>
        <?php if ($editData): ?>
            <a href="?crud" class="btn" style="background:#6c757d; margin-left:10px;">Mégse</a>
        <?php endif; ?>
    </form>
</div>

<a href="?crud" class="btn btn-primary">Add New (Alaphelyzet)</a>

<table class="crud-table">
    <thead>
        <tr>
            <th>Mozi ID</th>
            <th>Név</th>
            <th>Irszám</th>
            <th>Cím</th>
            <th>Telefon</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($mozik)): ?>
            <?php foreach ($mozik as $mozi): ?>
                <tr>
                    <td><?= htmlspecialchars($mozi['moziazon']) ?></td>
                    <td><?= htmlspecialchars($mozi['mozinev']) ?></td>
                    <td><?= htmlspecialchars($mozi['irszam']) ?></td>
                    <td><?= htmlspecialchars($mozi['cim']) ?></td>
                    <td><?= htmlspecialchars($mozi['telefon']) ?></td>
                    <td>
                        <a href="?crud&action=edit&id=<?= $mozi['moziazon'] ?>" class="btn btn-info">Edit</a>
                        <a href="?crud&action=delete&id=<?= $mozi['moziazon'] ?>" class="btn btn-danger" onclick="return confirm('Biztosan törlöd?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Nincs adat az adatbázisban.</td></tr>
        <?php endif; ?>
    </tbody>
</table>