<h2>Eddig beérkezett üzenetek</h2>

<?php if (isset($hiba)): ?>
    <p style="color: red;"><?= $hiba ?></p>
<?php else: ?>
    <table>
        <tr>
            <th>Küldés ideje</th>
            <th>Küldő neve</th>
            <th>E-mail cím</th>
            <th>Üzenet</th>
        </tr>
        <?php foreach ($osszes_uzenet as $uz): ?>
            <tr>
                <td><?= $uz['datum'] ?></td>
                <td><?= $uz['vendeg_e'] == 1 ? 'Vendég' : htmlspecialchars($uz['nev']) ?></td>
                <td><?= htmlspecialchars($uz['email']) ?></td>
                <td><?= nl2br(htmlspecialchars($uz['uzenet'])) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>