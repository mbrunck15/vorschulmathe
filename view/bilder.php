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
        var draggedImage = document.getElementById(data);
      //  ev.target.appendChild(document.getElementById(data));

        let loesung = Number(document.getElementById('loesung').getAttribute('data-loesung'));
        let id      = Number(document.getElementById('loesung').getAttribute('data-id'));

        // Überprüfe hier, welches Bild verschoben wurde
        if (Number(draggedImage.dataset.wert)===loesung) {

            console.log("die Antwort ist richtig");
         //   console.log(id+1);
            level=id+1;
        } else{
            console.log("die Antwort ist falsch");
           // console.log(id);
            level=id;
        }

        // Füge das verschobene Bild in die Drop-Zone ein
        ev.target.appendChild(draggedImage);
       let neueslevel=document.getElementById('level');
        neueslevel.value=level;
       // document.querySelectorAll('form')[0].requestSubmit();
        console.log(level);
        console.log(neueslevel);
    }


</script>



<div style="display: flex">
<div><img src="<?php echo $aArr['bild1'];?>" id="bild"></div>
    <div class="ziel botton" id="loesung" style="margin-left: 160px" ondrop="drop(event)" ondragover="allowDrop(event)" data-id="<?php echo $aArr['id'];?>" data-loesung="<?php echo $aArr['loesung1'];?>" ></div>
    <div class="auswahlzahl botton" style="margin-left: 180px"><img id="drag1" src="<?php echo $aArr['loesungsbild1'];?>" data-wert="<?php echo $l1 ?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag2" src="<?php echo $aArr['loesungsbild2'];?>" data-wert="<?php echo $l2 ?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px" data></div>
    <div class="auswahlzahl botton"><img id="drag3" src="<?php echo $aArr['loesungsbild3'];?>" data-wert="<?php echo $l3 ?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
    <div class="auswahlzahl botton"><img id="drag4" src="<?php echo $aArr['loesungsbild4'];?>" data-wert="<?php echo $l4 ?>" draggable="true" ondragstart="drag(event)" width="60px" height="60px"></div>
</div>


