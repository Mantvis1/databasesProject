<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Personalas</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas personalo narys </a>
</div>
<?php if (isset($_GET['remove_error'])) { ?>
    <div class="errorBox">
        Aptikta klaida, del kurios nebuvo įvykdytas paskutinis jusų veiksmas.
    </div>
<?php } ?>
<table class="listTable">
    <tr>
        <th>Kodas</th>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Rusis</th>
        <th>Kurioje komandoje dirba</th>
        <th>Korekcijos</th>
        <
    </tr>
    <?php
    foreach ($data as $key => $value) {
        echo "<tr>"
        . "<td>{$value['kodas']} </td>"
        . "<td>{$value['vardas']} </td>"
        . "<td>{$value['pavarde']} </td>"
        . "<td>{$value['rusis']} </td> "
        . "<td>{$value['pavadinimas']} </td> "
        . "<td><a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$value['kodas']}\"); return false;' title=''>šalinti</a>&nbsp;"
        . "<a href='index.php?module={$module}&action=edit&id={$value['kodas']}' title=''>redaguoti</a></td>" 
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>