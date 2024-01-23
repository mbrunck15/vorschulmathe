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
<div><img src="../pic/ball1.png" id="bild"></div>
    <div class="ziel botton" style="margin-left: 160px" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div class="auswahlzahl botton" style="margin-left: 180px"><img id="drag1" src="../pic/zahl0.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag2" src="../pic/zahl1.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px" data></div>
    <div class="auswahlzahl botton"><img id="drag3" src="../pic/zahl5.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag4" src="../pic/zahl9.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
</div>