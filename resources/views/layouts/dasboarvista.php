<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js">
        
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 


<script type="text/javascript">
 
 
    // charts.js
    var labels =  {{ Js::from($labels) }};
    var solicitude =  {{ Js::from($data) }};
  
    const data = {
        labels: labels,
        datasets: [{
            label: 'Estadística de Solicitudes',
            backgroundColor: 'rgb(0, 134, 255)',
            borderColor: 'rgb(255, 99, 132)',
            data: solicitude,
        }]
    };
  
    const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
  
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  
</script>