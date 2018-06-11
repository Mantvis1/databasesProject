<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=player&action=list" title="Zaidejai"
        <?php
        if ($module == 'player') {
            echo 'class="active"';
        }
        ?>>Zaidejai</a>
    </li>
    <li>
        Zaideju pridejimas
    </li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
    <?php if ($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>
    <form action="" method="post">
        <legend>Naujo žaidėjo informacija</legend>
        <fieldset>
            <p>
                <label class="field" for="kodas">ID<?php echo in_array('kodas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="kodas" class="textbox-30" value="<?php echo isset($data['kodas']) ? $data['kodas'] : ''; ?>"/>
                <?php
                if (key_exists('kodas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['kodas']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="vardas" class="textbox-70" value="<?php echo isset($data['vardas']) ? $data['vardas'] : ''; ?>"/>
                <?php
                if (key_exists('vardas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="pavarde">Pavarde<?php echo in_array('pavarde', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="pavarde" class="textbox-70" value="<?php echo isset($data['pavarde']) ? $data['pavarde'] : ''; ?>"/>
                <?php
                if (key_exists('pavarde', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['pavarde']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="amzius">Amzius<?php echo in_array('amzius', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="amzius" class="textbox-70" value="<?php echo isset($data['amzius']) ? $data['amzius'] : ''; ?>"/>
                <?php
                if (key_exists('amzius', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['amzius']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="numeris">Numeris<?php echo in_array('numeris', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="numeris" class="textbox-70" value="<?php echo isset($data['numeris']) ? $data['numeris'] : ''; ?>"/>
                <?php
                if (key_exists('numeris', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['numeris']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="pozicija">Pozicija<?php echo in_array('pozicija', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="pozicija" class="textbox-70" value="<?php echo isset($data['pozicija']) ? $data['pozicija'] : ''; ?>"/>
                <?php
                if (key_exists('pozicija', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['pozicija']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="fk_Komandakodas">Priklauso komandai<?php echo in_array('fk_Komandakodas', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Komandakodas" name="fk_Komandakodas">
                    <option value="-1">---------------</option>
                    <?php
                    $teams = $teamsObject->getBrandList();
                    foreach ($teams as $key => $val) {
                        $selected = "";
                        if (isset($data['fk_Komandakodas']) && $data['fk_Komandakodas'] == $val['id']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <label class="field" for="fk_Komandakodas1">Zaidžia komandoje<?php echo in_array('fk_Komandakodas1', $required) ? '<span> *</span>' : ''; ?></label>      
                <select id="fk_komandosKodas1" name="fk_Komandakodas1">
                    <option value="-1">---------------</option>
                    <?php
                    // $teams = $teamsObject->getBrandList();
                    foreach ($teams as $key => $val) {
                        $selected = "";
                        if (isset($data['fk_Komandakodas1']) && $data['fk_Komandakodas1'] == $val['id']) {
                            $selected = " selected='selected'";
                        }
                        echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
                    }
                    ?>
                </select>

            </p>


        </fieldset>
        <p>
            <input type="submit" class="submitButton" name="submit" value="Išsaugoti">
        </p>