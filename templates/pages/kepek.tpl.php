<h2>Képgaléria</h2>

<?php foreach ($uzenet as $u): ?>
    <p style="color: blue;"><strong><?= $u ?></strong></p>
<?php endforeach; ?>

<?php if (isset($_SESSION['login'])): ?>
    <form action="?kepek" method="post" enctype="multipart/form-data" style="background: #f4f4f4; padding: 15px; border-radius: 5px;">
        <fieldset>
            <legend>Új kép feltöltése</legend>
            <input type="file" name="ujKep" required accept="image/jpeg, image/png, image/gif, image/webp">
            <input type="submit" value="Kép Feltöltése">
        </fieldset>
    </form>
    <br>
<?php else: ?>
    <p><em>Képfeltöltéshez kérjük, jelentkezzen be!</em></p>
<?php endif; ?>

<div style="display: flex; flex-wrap: wrap; gap: 15px;">
    <?php if (empty($kepek)): ?>
        <p>A galéria jelenleg üres.</p>
    <?php else: ?>
        <?php foreach ($kepek as $kep): ?>
            <div style="border: 1px solid #ddd; padding: 5px; background: #fff; border-radius: 5px;">
                <img src="<?= $kep ?>" alt="Galéria kép" style="width: 200px; height: 150px; object-fit: cover;">
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>