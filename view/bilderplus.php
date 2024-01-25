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
<div style="display: flex">
    <div><img src="../pic/ball1.png" id="bild"></div>
    <div><img src="../pic/ball2.png" id="bild"></div>
    <div class="ziel botton" style="margin-left: 120px" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
</div>
<div id="senk">
<div class="auswahlzahl" ><img id="drag1" src="../pic/zahl00.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
<div class="auswahlzahl"><img id="drag2" src="../pic/zahl01.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px" data></div>
<div class="auswahlzahl"><img id="drag3" src="../pic/zahl05.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
<div class="auswahlzahl"><img id="drag4" src="../pic/zahl09.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
</div>
</div>