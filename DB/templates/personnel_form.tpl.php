<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=personnel&action=list" title="Personalas"
        <?php
        if ($module == 'personnel') {
            echo 'class="active"';
        }
        ?>>Personalas</a>
    </li>    Nauja personalo narys
       </li>
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
    <form action="" method="post">
        <legend>Arenos informacija</legend>
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
                <label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
                <input type ="text" name="vardas" class="textbox-150" value="<?php echo isset($data['vardas']) ? $data['vardas'] : ''; ?>"/>
                <?php
                if (key_exists('vardas', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>";
                }
                ?>
            </p>

            <p>
                <label class="field" for ="pavarde">Pavarde<?php echo in_array('pavarde', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" name="pavarde" class="textbox-150" value="<?php echo isset($data['pavarde']) ? $data['pavarde'] : ''; ?>"/>
                <?php
                if (key_exists('pavarde', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['pavarde']} simb.)</span>";
                }
                ?>
            </p>

            <p>
                <label class="field" for ="paskirtis">Paskirtis<?php echo in_array('paskirtis', $required) ? '<span> *</span>' : ''; ?></label>
                <select id="paskirtis" name="paskirtis">
                    <option value="-1">---------------</option>
                    <?php 
                        $purpose = $activitiesObject->getBrandList();
                        foreach ($purpose as $key => $val){
                            $selected = "";
                            if(isset($data['paskirtis']) && $data['paskirtis'] == $val['id_Veikla']) {
								$selected = " selected='selected'";
							}
                           echo "<option{$selected} value='{$val['id_Veikla']}'>{$val['rusis']}</option>";
                        }
                    ?>
                    </select>
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
        </fieldset>
        <p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
        <p>
            <input type="submit" class="submitButton" name="submit" value="Išsaugoti">
        </p>
        <?php if (isset($data['kodas'])) { ?>
            <input type="hidden" name="id" value="<?php echo $data['kodas']; ?>" />
        <?php } ?>
    </form>
</div>