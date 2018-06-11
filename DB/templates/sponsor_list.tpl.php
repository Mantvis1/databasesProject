<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Remejai</li>
</ul>
<table class="listTable">
    <tr>
        <th>ID</th>
        <th>Pavadinimas</th>
        <th>Bendra suma</th>
    </tr>
    <?php
    // suformuojame lentelę
    foreach ($data as $key => $val) {
        echo
        "<tr>"
        . "<td>{$val['id']}</td>"
        . "<td>{$val['pavadinimas']}</td>"
        . "<td>{$val['bendra_suma']}</td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>