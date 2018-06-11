<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Komandos</li>
</ul>
<div id="actions">
    <a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas komanda</a>
</div>
<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Pavadinimas</th>
        <th>Biudzetas</th>
        <th>Korekcijos</th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach ($data as $key => $val) {
        echo
        "<tr>"
        . "<td>{$val['id']}</td>"
        . "<td>{$val['pavadinimas']}</td>"
        . "<td>{$val['biudzetas']}</td>"
        . "<td><a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['id']}\"); return false;' title=''>šalinti</a>&nbsp;"
        . "<a href='index.php?module={$module}&action=edit&id={$val['id']}' title=''>redaguoti</a></td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
