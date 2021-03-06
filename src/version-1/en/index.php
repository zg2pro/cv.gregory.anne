<?php
session_start();

$hl = "en";
$_SESSION["hl"] = "en";

if (!isset($_GET["p"])) {
    $p = "mycv";
} else {
    $p = $_GET["p"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-11203253-1");
                pageTracker._trackPageview();
            } catch (err) {
            }
        </script>

        <?php
        require_once('headers.strings.php');
        ?>
        <title>Gr&eacute;gory ANNE 's Curriculum Vitae</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../js/jstree/themes/default/style.min.css" rel="stylesheet" />
        <link href="../css/mycv.css" rel="stylesheet"	type="text/css" />
        <meta lang="en" xml:lang="en"  content="Gregory Anne CV" />
    </head>
    <body>	
        <div class="row-fluid">
            <?php
            require_once ("../php/header.php.inc");
            echo writeHeader($ext_string, $hl);
            ?>
        </div>
        <div class="row-fluid">
            <div class="col-md-3">
                <?php
                require_once ("../php/menu.php");
                ?>
            </div>
            <div class="col-md-9">
                <?php
                if (file_exists("../php/" . $p . ".php")) {
                    require_once ("../php/" . $p . ".php");
                } else {
                    if (file_exists($p . ".php")) {
                        require_once ($p . ".php");
                    } else {
                        echo "<div id='attention'>
				The page you have requested is not yet available in english.
				Thanks for your understanding.
				</div>
				";
                        require_once ("../fr/" . $p . ".php");
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>