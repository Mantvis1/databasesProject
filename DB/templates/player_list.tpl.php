<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Zaidėjai</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas zaidejas</a>
</div>
<?php if (isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Aptikta klaida, del kurios nebuvo įvykdytas paskutinis jusų veiksmas.
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Amžius</th>
        <th>Numeris</th>
        <th>Pozicija</th>
        <th>Priklauso komandai</th>
        <th>Zaidzia komandoje</th>
        <th>Korekcijos</th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach ($data as $key => $val) {
        echo
        "<tr>"
        . "<td>{$val['kodas']}</td>"
        . "<td>{$val['vardas']}</td>"
        . "<td>{$val['pavarde']}</td>"
        . "<td>{$val['amzius']}</td>"
        . "<td>{$val['numeris']}</td>"
        . "<td>{$val['pozicija']}</td>"
        . "<td>{$val['priklauso']}</td>"
        . "<td>{$val['zaidzia']}</td>"
        . "<td><a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
        . "<a href='index.php?module={$module}&action=edit&id={$val['kodas']}' title=''>redaguoti</a></td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>