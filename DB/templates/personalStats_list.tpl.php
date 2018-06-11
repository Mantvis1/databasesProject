<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Sezono statistika</li>
</ul>
<table class="listTable">
    <tr>
        <th>Vardas</th>
        <th>Pavarde</th>
        <th>Metai</th>
        <th>Pataikytos baudos</th>
        <th>Mestos baudos</th>
        <th>Baudu taiklumas procentais</th>
        <th>Pataikyti dvitaskiai</th>
        <th>Mesti dvitaskiai</th>
        <th>Dvitaskiu taiklumas procentais</th>
        <th>Pataikyti tritaskiai</th>
        <th>Mesti tritaskiai</th>
        <th>Tritaskiu taiklumas procentais</th>
        <th>Klaidos</th>
        <th>Blokai</th>
        <th>Perimiti kamuoliai</th>
        <th>Isprovokuotos prazangos</th>
        <th>Efektyvumas</th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
        echo "<tr>"
        . "<td>{$value['vardas']}</td>"
        . "<td>{$value['pavarde']}</td>"
        . "<td>{$value['metai']}</td>"
        . "<td>{$value['pataikytos_baudos']}</td>"
        . "<td>{$value['mestos_baudos']}</td>"
        . "<td>{$value['baudu_taikumas_procentais']}</td>"
        . "<td>{$value['pataikyti_dvitaskiai']}</td>"
        . "<td>{$value['mest_dvitaskiai']}</td>"
        . "<td>{$value['dvitaskiu_taiklumas_procentais']}</td>"
        . "<td>{$value['mesti_tritaskiai']}</td>"
        . "<td>{$value['tritaskiu_pataikymas_procentais']}</td>"
        . "<td>{$value['rezultatyvus_perdavimai']}</td>"
        . "<td>{$value['klaidos']}</td>"
        . "<td>{$value['blokai']}</td>"
        . "<td>{$value['perimti_kamuoliai']}</td>"
        . "<td>{$value['isprovokuotos_prazangos']}</td>"
        . "<td>{$value['effektyvumas']}</td>"
        . "</tr>";
    }
    ?>
</table>

<?php
include 'templates/paging.tpl.php';
?>