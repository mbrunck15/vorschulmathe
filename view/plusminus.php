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
<div id="s">
    <div id="schlange">
        <div class="schlangezahl">1</div>
        <div class="schlangezahl">+</div>
        <div class="schlangezahl">1</div>
        <div class="schlangezahl">=</div>
        <div class="schlangezahl" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
</div>
<div id="z">
    <div class="auswahl">
        <div class="auswahlzahl"><img id="drag1" src="../pic/zahl1.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag2" src="../pic/zahl3.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag3" src="../pic/zahl0.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag4" src="../pic/zahl2.png" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    </div>
</div>


