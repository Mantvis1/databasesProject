<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="robots" content="noindex">
                <title>Krepsinio IS</title>
                <link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
                <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
                <script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
                <script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
                <script type="text/javascript" src="scripts/main.js"></script>
    </head>
    <body>
        <div id="body">
            <div id="header">
                <h3 id="slogan"><a href="index.php">Krepsinio IS</a></h3>
            </div>
            <div id="content">
                <div id="topMenu">
                    <ul class="float-left">
                        <li><a href="index.php?module=players&action=list" title="Zaidejai"
                            <?php
                            if ($module == 'players') {
                                echo 'class="active"';
                            }
                            ?>>Zaidejai</a>
                        </li>
                        <li><a href="index.php?module=teams&action=list" title="Komandos"
                            <?php
                            if ($module == 'teams') {
                                echo 'class="active"';
                            }
                            ?>>Komandos</a>
                        </li>
                        <li><a href="index.php?module=support&action=list" title="Remejai"
                            <?php
                            if ($module == 'support') {
                                echo 'class="active"';
                            }
                            ?>>Remejai</a>
                        </li>
                        <li><a href="index.php?module=arena&action=list" title="Arena"
                            <?php
                            if ($module == 'arena') {
                                echo 'class="active"';
                            }
                            ?>>Arenos</a>
                        </li>
                        <li><a href="index.php?module=games&action=list" title="Rungtynes"
                            <?php
                            if ($module == 'games') {
                                echo 'class="active"';
                            }
                            ?>>Rungtynes</a>
                        </li>
                        <li><a href="index.php?module=teamStats&action=list" title="Komandine statistika"
                            <?php
                            if ($module == 'teamStats') {
                                echo 'class="active"';
                            }
                            ?>>Komandine statistika</a>
                        </li>
                        <li><a href="index.php?module=personalStats&action=list" title="Asmenine statistika"
                            <?php
                            if ($module == 'personalStats') {
                                echo 'class="active"';
                            }
                            ?>>Asmenine statistika</a>
                        </li>
                        <li><a href="index.php?module=personnel&action=list" title="Personalas"
                            <?php
                            if ($module == 'personnel') {
                                echo 'class="active"';
                            }
                            ?>>Personalas</a>
                        </li>
                        <li><a href="index.php?module=activity&action=list" title="Personalo veikla"
                            <?php
                            if ($module == 'activity') {
                                echo 'class="active"';
                            }
                            ?>>Personalo veikla</a>
                        </li>
                         <li><a href="index.php?module=history&action=list" title="Istorija"
                            <?php
                            if ($module == 'history') {
                                echo 'class="active"';
                            }
                            ?>>Istorija</a>
                        </li>
                    </ul>
                </div>
                <div id="contentMain">
                    <div class="float-clear"></div>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>

