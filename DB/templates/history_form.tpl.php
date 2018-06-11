<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=history&action=list" title="Istorija"
        <?php
        if ($module == 'history') {
            echo 'class="active"';
        }
        ?>>Istorija</a>
    </li>
    <li>
        Naujos istorijos pridejimas</li>
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

        <legend>Istorijos</legend>
        <fieldset>
            <div class="childRowContainer">
                <div class="labelLeft<?php if (empty($data['istorija']) || sizeof($data['istorija']) == 0) echo ' hidden'; ?>">ID</div>
                <div class="labelLeft<?php if (empty($data['istorija']) || sizeof($data['istorija']) == 0) echo ' hidden'; ?>">Metai</div>
                <div class="labelLeft<?php if (empty($data['istorija']) || sizeof($data['istorija']) == 0) echo ' hidden'; ?>">Uzimta vieta</div>
                <div class="labelLeft<?php if (empty($data['istorija']) || sizeof($data['istorija']) == 0) echo ' hidden'; ?>">Varzybu kiekis</div>
                <div class="labelRight<?php if (empty($data['istorija']) || sizeof($data['istorija']) == 0) echo ' hidden'; ?>">Komanda</div>
                <div class="float-clear"></div>

                <?php
                if (empty($data['istorija']) || sizeof($data['istorija']) == 0) {
                    ?>
                    <div class="childRow hidden">
                        <input type="text" name="id[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="metai[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="uzimta_vieta[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <input type="text" name="varzybu_kiekis[]" value="" class="textbox textbox-70" disabled="disabled" />
                        <select id="fk_Komandaid" name="fk_Komandakodas" disabled="disabled" />
                        <option value="-1">---------------</option>
                        <?php
                        // išrenkame klientus
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
                        <a href="#" title="" class="removeChild">šalinti</a>
                    </div>
                    <?php
                } else {
                    foreach ($data['istorija'] as $key => $val) {
                        ?>
                        <div class="childRow">

                        </div>
                        <div class="float-clear"></div>
                        <?php
                    }
                }
                ?>
            </div>
            <p id="newItemButtonContainer">
                <a href="#" title="" class="addChild">Pridėti</a>
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