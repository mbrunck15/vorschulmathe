
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seite1</title>
    <link rel="stylesheet"  href="../css/style.css">
</head>
<body>
<div id="top">
    <h1>Lea´s Vorschulmathe</h1>
</div>
<?php
include 'nav.php';
?>
<div class='haupt' >
    <div id="belohnung" >
        <?php
        include 'level.php';
        ?>
    </div>
    <div id="rechnen">

        <?php
        include 'arbeitsanweisung.php';
        include 'bilder.php';
        ?>
    </div>
    <div id="level">
        level
        <button id="button1">weiter</button>
    </div>
</div>
<div id="foot">

</div>

</body>
</html>