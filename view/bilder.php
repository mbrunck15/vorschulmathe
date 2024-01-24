<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>



<div style="display: flex">
<div><img src="<?php echo $aArr['bild1'];?>" id="bild"></div>
    <div class="ziel botton" style="margin-left: 160px" ondrop="drop(event)" ondragover="allowDrop(event)" data-loesung="<?php echo $aArr['loesung1'];?>" ></div>
    <div class="auswahlzahl botton" style="margin-left: 180px"><img id="drag1" src="<?php echo $aArr['loesungsbild1'];?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag2" src="<?php echo $aArr['loesungsbild2'];?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px" data></div>
    <div class="auswahlzahl botton"><img id="drag3" src="<?php echo $aArr['loesungsbild3'];?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag4" src="<?php echo $aArr['loesungsbild4'];?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
</div>