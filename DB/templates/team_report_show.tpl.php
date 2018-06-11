<legend class="title">Komandos "<?php echo "{$getTeamName['pavadinimas']}" ?>" zaidejai</legend>
<table class="listTable">
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Metai</th>
    <th>Pelnyti taškai per sezoną</th>
    <th>Effektyvumas surinktas per sezoną</th>
    <?php
    foreach ($result as $key => $value) {
        echo
        "<tr>"
        . "<td>{$value['vardas']}</td>"
        . "<td>{$value['pavarde']}</td>"
        . "<td>{$value['metai']}</td>"
        . "<td>{$value['pelnytiTaskai']}</td>"
        . "<td>{$value['eff']}</td>"
        . "</tr>";
    }
    ?>
</table>
<fieldset>
    <p>
    <p>
        <label class="float-left" name="vid1">Efektyvumo vidurkis per sezoną</label>
    </p>
    <p>
        <input class="textbox-50" name ="effVid" value ="<?php echo round($rez[0], 2) ?>" readonly>
    </p>
    <p>
    <p>
        <label class="float-left" name="vid2">Tasku vidurkis per sezoną</label>
    </p>
    <p>
        <input class="textbox-50" name ="taskVid" value ="<?php echo round($rez[1], 2) ?>" readonly>
    </p>
    <p>
    <p>
        <label class="float-left" name="vid2">Zaidėjų kiekis komandoje</label>
    </p>
    <p>
        <input class="textbox-50" name ="zaidKiekis" value ="<?php echo "{$count}" ?>" readonly>
    </p>
</p>
</p>

</fieldset>
<div class ="float-clear"></div>
<a href="index.php?module=team&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>