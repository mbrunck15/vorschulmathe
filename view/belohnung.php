


<script>
//7 Daten für den Balken
var data = {
labels: ['Belohnung 1', 'Belohnung 2', 'Belohnung 3'],
datasets: [{
label: 'Belohnungspunkte',
data: [10, 20, 30],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)'
],
borderColor: [
'rgba(255, 99, 132, 1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)'
],
borderWidth: 1
}]
};

// Konfiguration des Balkens
var config = {
type: 'bar',
data: data,
options: {
indexAxis: 'y',
elements: {
bar: {
borderWidth: 2,
}
},
responsive: true,
plugins: {
legend: {
position: 'right',
},
title: {
display: true,
text: 'Belohnungsbalken'
}
}
},
};

// Erzeugen des Balkens
var myChart = new Chart(
document.getElementById('myChart'),
config
);

</script>