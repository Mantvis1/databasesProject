
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
        
        <fieldset>
    <legend>Ataskaitos informcija</legend>
    <p><label class="field" for="komanda">Pasirinkite komanda</label>
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
        <p><input type="submit" class="submit button float-right" name="submit" value="Sudaryti ataskaitą"></p>
    </form>
</div>