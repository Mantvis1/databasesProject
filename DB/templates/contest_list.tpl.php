<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Varzybos</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujos varzybos</a>
</div>
<?php if (isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Aptikta klaida, del kurios nebuvo įvykdytas paskutinis jusų veiksmas.
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>Kodas</th>
        <th>Pirma komanda</th>
        <th>Pirmas rezultatas</th>
        <th>Antra komanda</th>
        <th>Antras rezultatas</th>
        <th>Korekcijos </th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
        echo "<tr>"
        . "<td>{$value['kodas']}</td>"
        . "<td>{$value['pav1']}</td>"
        . "<td>{$value['rezultatas1']}</td>"
        . "<td>{$value['pav2']}</td>"
        . "<td>{$value['rezultatas2']}</td>"
        . "<td><a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$value['kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
        . "<a href='index.php?module={$module}&action=edit&id={$value['kodas']}' title=''>redaguoti</a></td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>