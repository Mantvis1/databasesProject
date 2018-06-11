<ul id="pagePath">
    <li><a href="index.php">Pradžia</a></li>
    <li>Ataskaitų sąrašas</li>
</ul>
<div class="float-clear"></div>
<fieldset>
    <li><p><a href="index.php?module=personnel&action=report" title="players"
            <?php
            if ($module == 'personnel') {
                echo 'class="active"';
            }
            ?>>Personalo ataskaita</a></p>
        <p>Personalas dirbantis pasirinktose komandose</p>
    </li>

    <li>
        <p>
          <a href="index.php?module=team&action=report" title="players"
            <?php
            if ($module == 'team') {
                echo 'class="active"';
            }
            ?>>Sezonine ataskaita</a>
        </p>
        <p>Zaideju raszultatai sezono metu, pasirinktos komandos</p>
    </li>
</fieldset>