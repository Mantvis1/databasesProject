<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=team&action=list" title="Komandos"
        <?php
        if ($module == 'team') {
            echo 'class="active"';
        }
        ?>>Komandos</a>
    </li>
    <li>
        Komandu pridejimas
    </li>
</ul>
<div id="formContainer">
    <form action="" method="POST">
        <legend>Komandos informacija</legend>
        <fieldset>
            <p>
                <label class="field" for="id">ID<?php echo in_array('id', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="id" class="textbox-30" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>"/>
                <?php
                if (key_exists('id', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['id']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="pavadinimas">Pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="pavadinimas" class="textbox-150" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>"/>
                <?php
                if (key_exists('pavadinimas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>";
                }
                ?>
            </p>

            <p>
                <label class="field" for ="biudzetas">Talpa<?php echo in_array('biudzetas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" name="talpa" class="textbox-70" value="<?php echo isset($data['biudzetas']) ? $data['biudzetas'] : ''; ?>"/>
                <?php
                if (key_exists('biudzetas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['biudzetas']} simb.)</span>";
                }
                ?>
            </p>
        </fieldset>
        <legend>Rungtyniu informacija</legend>
        <fieldset>
            <p>
                <label class="field" for="kodas">Kodas<?php echo in_array('kodas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="kodas" class="textbox-30" value="<?php echo isset($data['kodas']) ? $data['kodas'] : ''; ?>"/>
                <?php
                if (key_exists('kodas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['kodas']} simb.)</span>";
                }
                ?>
            </p>
            <p>
                <label class="field" for="rezultatas">Pirmas rezultatas<?php echo in_array('rezultatas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="rezultatas" class="textbox-70" value="<?php echo isset($data['rezultatas']) ? $data['rezultatas'] : ''; ?>"/>
                <?php
                if (key_exists('rezultatas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['rezultatas']} simb.)</span>";
                }
                ?>
            </p>
             </p>
            <p>
                <label class="field" for="fk_Komandaid">Pirma komanda<?php echo in_array('fk_Komandaid', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Komandaid" name="fk_Komandaid">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame klientus
                    $teams = $teamObject->getBrandList();
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
                <label class="field" for="rezultatas1">Antras rezultatas<?php echo in_array('rezultatas1', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="rezultatas" class="textbox-70" value="<?php echo isset($data['rezultatas1']) ? $data['rezultatas1'] : ''; ?>"/>
                <?php
                if (key_exists('rezultatas1', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['rezultatas1']} simb.)</span>";
                }
                ?>
           
            <p>
                <label class="field" for="fk_Komandaid1">Antra komanda<?php echo in_array('fk_Komandaid1', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="fk_Komandaid1" name="fk_Komandaid1">
                    <option value="-1">---------------</option>
                    <?php
                    // išrenkame klientus
                    $teams = $teamObject->getBrandList();
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