
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
        belohnung
    </div>
    <div id="rechnen">

        <?php
        include 'arbeitsanweisung.php';
        include 'bilderplus.php';
        ?>
    </div>
    <div id="level10">
        level
        <form>
            <button id="button1">weiter</button>
            <input id="level" type="hidden"  name="neueslevel" >
            <input type="hidden" name="action" value="showaufgabeBild">
        </form>
    </div>
</div>
<div id="foot">

</div>

</body>
</html>

