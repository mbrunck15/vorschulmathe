<div id="s">
    <div id="schlange">
        <div class="schlangezahl"><img src="<?php echo $aArr['wert1']; ?>" class="bild1"></div>
        <div id="loesung" class="schlangezahl top2px" ondrop="drop(event)" ondragover="allowDrop(event)"
             data-loesung="<?php echo $aArr['loesung1']; ?>" data-id="<?php echo $aArr['id'] ?>"></div>
        <div class="schlangezahl"><img src="<?php echo $aArr['wert3']; ?>" class="bild1"></div>
        <div id="loesung1" class="schlangezahl bottem2px" ondrop="drop1(event)" ondragover="allowDrop(event)"
             data-loesung1="<?php echo $aArr['loesung2']; ?>"></div>
        <div class="schlangezahl"><img src="<?php echo $aArr['wert5']; ?>" class="bild1"></div>
    </div>
</div>
<div id="z">
    <div class="auswahl">
        <div class="auswahlzahl"><img id="drag1" src="<?php echo $aArr['loesungsbild1']; ?>"
                                      data-wert="<?php echo $l1 ?>" draggable="true" ondragstart="drag(event)"
                                      width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag2" src="<?php echo $aArr['loesungsbild2']; ?>"
                                      data-wert="<?php echo $l2 ?>" draggable="true" ondragstart="drag(event)"
                                      width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag3" src="<?php echo $aArr['loesungsbild3']; ?>"
                                      data-wert="<?php echo $l3 ?>" draggable="true" ondragstart="drag(event)"
                                      width="60px" height="60px"></div>
        <div class="auswahlzahl"><img id="drag4" src="<?php echo $aArr['loesungsbild4']; ?>"
                                      data-wert="<?php echo $l4 ?>" draggable="true" ondragstart="drag(event)"
                                      width="60px" height="60px"></div>
    </div>
</div>
<script>


    let loesung = Number(document.getElementById('loesung').getAttribute('data-loesung'));
    let id = Number(document.getElementById('loesung').getAttribute('data-id'));
    let loesung1 = Number(document.getElementById('loesung1').getAttribute('data-loesung1'));
    console.log(loesung);
    console.log(loesung1);

    function allowDrop(ev) {
        ev.preventDefault();
    }


    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    const bisherigeLoesung=[]
    function drop(ev) {
        if (typeof ev === 'undefined') {
            return false;
        }
       // console.log(ev);
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var draggedImage = document.getElementById(data);
            bisherigeLoesung[0] = Number(draggedImage.dataset.wert);
            console.log(bisherigeLoesung);

        if (bisherigeLoesung.length === 2) {
            if (bisherigeLoesung[0] === loesung && bisherigeLoesung[1] === loesung1) {
                console.log("die Antwort ist richtig");
                console.log(id + 1);
                level = id + 1;
            } else {
                console.log("die Antwort ist falsch");
                console.log(id);
                level = id;
            }
        }
        let neueslevel = document.getElementById('level');
        neueslevel.value = level;
        // document.querySelectorAll('form')[0].requestSubmit();
        console.log(level);
        console.log(neueslevel);


        ev.target.appendChild(draggedImage);
        return true;
    }

    function drop1(ev) {
        if (typeof ev === 'undefined') {
            return false;
        }
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var draggedImage = document.getElementById(data);
        bisherigeLoesung[1] = Number(draggedImage.dataset.wert);

        console.log(bisherigeLoesung);
        console.log(bisherigeLoesung[0]);
        console.log(bisherigeLoesung[1]);
        console.log(loesung);
        console.log(loesung1);
        if (bisherigeLoesung.length === 2) {
            if (bisherigeLoesung[0] === loesung && bisherigeLoesung[1] === loesung1) {
                console.log("die Antwort ist richtig");
                console.log(id + 1);
                level = id + 1;
            } else {
                console.log("die Antwort ist falsch");
                console.log(id);
                level = id;
            }
        }
        let neueslevel = document.getElementById('level');
        neueslevel.value = level;
        // document.querySelectorAll('form')[0].requestSubmit();
        console.log(level);
        console.log(neueslevel);
        ev.target.appendChild(draggedImage);
        return true;
    }



</script>