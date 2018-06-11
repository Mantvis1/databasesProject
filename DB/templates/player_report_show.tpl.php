<div class="float-clear"></div>
<legend>Komandos "<?php echo "{$getTeamName['pavadinimas']}" ?>" personalas</legend>
<table class="listTable">
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Rusis</th>
    <?php
    foreach ($result as $key => $value) {
        echo
        "<tr>"
        . "<td>{$value['vardas']}</td>"
        . "<td>{$value['pavarde']}</td>"
        . "<td>{$value['rusis']}</td>"
        . "</tr>";
    }
    ?>
</table>

<a href="index.php?module=personnel&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>