<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=contest&action=list" title="Varzybos"
        <?php
        if ($module == 'contest') {
            echo 'class="active"';
        }
        ?>>Varzybos</a>
    </li>
    <li><?php
        if (!empty($id)) {
            echo "Varzybu redagavimas";
        } else {
            echo "Naujos varzybos";
        }
        ?></li>
</ul>
<div id="formContainer">
    <?php if ($formErrors != null) { ?>
        <div class="errorBox">
            Neįvesti arba neteisingai įvesti šie laukai:
            <?php
            echo $formErrors;
            ?>
        </div>
    <?php } ?>

    <div class="float-clear"></div>

    <form action="" method="post">
        <legend>
            Varzybu informacija
        </legend>

        <fieldset>
            <p>
                <label class="field" for="id">Kodas<?php echo in_array('kodas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="kodas" class="textbox-30" value="<?php echo isset($data['kodas']) ? $data['kodas'] : ''; ?>"/>
                <?php
                if (key_exists('kodas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['kodas']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="rezultatas1">Pirmas rezultatas<?php echo in_array('rezultatas1', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="rezultatas1" class="textbox-30" value="<?php echo isset($data['rezultatas1']) ? $data['rezultatas1'] : ''; ?>"/>
                <?php
                if (key_exists('rezultatas1', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['rezultatas1']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="id">Pirma komanda<?php echo in_array('fk_Komandaid', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Komandaid" name="fk_Komandaid"/>
            <option value="-1">---------------</option>
            <?php
            // išrenkame klientus
            $teams = $teamsObject->getBrandList();
            foreach ($teams as $key => $val) {
                $selected = "";
                if (isset($data['fk_Komandaid']) && $data['fk_Komandaid'] == $val['id']) {
                    $selected = " selected='selected'";
                }
                echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
            }
            ?>
            </select>
            </p>
            <p>
                <label class="field" for="rezultatas2">Antras rezultatas<?php echo in_array('rezultatas2', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="rezultatas2" class="textbox-30" value="<?php echo isset($data['rezultatas2']) ? $data['rezultatas2'] : ''; ?>"/>
                <?php
                if (key_exists('rezultatas2', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['rezultatas2']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="fk_Komandaid1">Antra komanda<?php echo in_array('fk_Komandaid1', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Komandaid1" name="fk_Komandaid1" />
            <option value="-1">---------------</option>
            <?php
            // išrenkame klientus
            $teams = $teamsObject->getBrandList();
            foreach ($teams as $key => $val) {
                $selected = "";
                if (isset($data['fk_Komandaid1']) && $data['fk_Komandaid1'] == $val['id']) {
                    $selected = " selected='selected'";
                }
                echo "<option{$selected} value='{$val['id']}'>{$val['pavadinimas']}</option>";
            }
            ?>
            </select>
            </p>

        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submitButton" name="submit" value="Išsaugoti">
        </p>
        <?php if (isset($data['id'])) { ?>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <?php } ?>
    </form>
</div>