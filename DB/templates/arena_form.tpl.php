<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li><a href="index.php?module=arena&action=list" title="Arena"
        <?php
        if ($module == 'arena') {
            echo 'class="active"';
        }
        ?>>Arenos</a>
    </li>
    <li><?php
        if (!empty($id))
            echo "Arenos redagavimas";
        else
            echo "Nauja arena";
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
    <form action="" method="post">
        <legend>Arenos informacija</legend>
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
                <label class="field" for ="talpa">Talpa<?php echo in_array('talpa', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" name="talpa" class="textbox-70" value="<?php echo isset($data['talpa']) ? $data['talpa'] : ''; ?>"/>
                <?php
                if (key_exists('talpa', $maxLengths)) {
                    echo "<span class='max-len'>(iki {$maxLengths['talpa']} simb.)</span>";
                }
                ?>
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