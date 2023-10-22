<?php
    // include './navbar.php';
    include '../../backend/database.php';
    // include './layout/navbar.php';
?>
<!DOCTYPE html>
    <head>
        <title>HONGSAMUT</title>
        <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <meta name="viewport" content="width=1920, height=1080, initial-scale=1">
        <link rel="stylesheet" href="dashboard_test.css">
        <!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->
         
    </head>
    <body>
        <div class = 'chart-container'>
            <canvas id = 'graph-canvas'></canvas>            
        </div>
        
        <!-- <script type = "module" src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script> -->
        <script type= "module" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            $(document).ready(function(){
                showGraph();
            });
            function showGraph(){
                $.post('data.php',
                function(data){
                    console.log(data);
                    let name = [];
                    let score = [];
                    for (let i in data){
                        name.push(data[i].user_name);
                        score.push(data[i].amount_book);
                    }
                    let chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'User Book Amount',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                // pointStyle: 'rectRounded',
                                hoverBorderColor: '#666666',
                                data: score
                            }
                        ]
                    };
                    let graphTarget = $("#graph-canvas");
                    let barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        // options: {
                        //     scales: {
                        //         yAxes: [{
                        //             ticks: {
                        //                 beginAtZero: true,
                        //                 min: 0,
                        //                 max: 100,
                        //                 stepSize: 10
                        //             }
                        //         }]
                        //     }
                        // }
                    });
                });
            }
        </script>
    </body>
    
</html> 
