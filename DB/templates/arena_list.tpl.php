<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Arenos</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja arena</a>
</div>
<?php if (isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Aptikta klaida, del kurios nebuvo įvykdytas paskutinis jusų veiksmas.
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>Nr.</th>
        <th>Pavadinimas</th>
        <th>Talpa</th>
        <th>Korekcijos</th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
        echo
        "<tr>"
        . "<td>{$value['id']}</td>"
        . "<td>{$value['pavadinimas']}</td>"
        . "<td>{$value['talpa']}</td>"
        . "<td><a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$value['id']}\"); return false;' title=''>šalinti</a>&nbsp;"
        . "<a href='index.php?module={$module}&action=edit&id={$value['id']}' title=''>redaguoti</a></td>"
        . "</tr>";
    }
    ?>

</table>

<?php
include 'templates/paging.tpl.php';
?>