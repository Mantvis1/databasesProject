<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Personalo veikla</li>
</ul>
<table class="listTable">
    <tr>
        <th>Nr.</th>
        <th>Veiklos pavadinimas</th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
        echo
        "<tr>"
        . "<td>{$value['id_Veikla']}</td>"
        . "<td>{$value['rusis']}</td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>