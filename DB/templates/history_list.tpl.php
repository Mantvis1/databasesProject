<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Istorija</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja istorija</a>
</div>
<table class="listTable">
    <tr>
        <th>Nr.</th>
        <th>Metai</th>
        <th>Uzimta vieta</th>
        <th>Varzybu kiekis</th>
        <th>Komanda</th>
    </tr>
    <?php
    foreach ($data as $key =>$value) {
        echo
        "<tr>"
        . "<td>{$value['id']}</td>"
        . "<td>{$value['metai']}</td>"
        . "<td>{$value['uzimta_vieta']}</td>"
        . "<td>{$value['varzybu_kiekis']}</td>"
        . "<td>{$value['pavadinimas']}</td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>