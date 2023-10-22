function show_dash(){
    
    $(document).ready(function () {
      showGraph();
      showGraph_2();
    });
    function showGraph() {
      $.post('dash_data.php',
        function (data) {
          console.log(data);
          let name = [];
          let score = [];
          for (let i in data) {
            name.push(data[i].plan_name);
            score.push(data[i].cnt_plan);
          }
          let chartdata = {
            labels: name,
            datasets: [
              {
                label: 'User\'s Subscription Plan statistics',
                backgroundColor: '#AFC0B1',
                borderColor: '#AFC0B1',
                hoverBackgroundColor: '#485545',
                // pointStyle: 'rectRounded',
                hoverBorderColor: '#485545',
                data: score
              }
            ]
          };
          let graphTarget = $("#graph-canvas");
          let barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata,
            options: {
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20,
                                family: 'Mitr',
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
          });
        });
    }
    function showGraph_2() {
      $.post('dash_data_2.php',
        function (data) {
          console.log(data);
          let name = [];
          let score = [];
          for (let i in data) {
            name.push(data[i].category_name);
            score.push(data[i].cnt_cate);
          }
          let chartdata = {
            labels: name,
            datasets: [
              {
                label: 'Book\'s categories statistics',
                backgroundColor: '#AFC0B1',
                borderColor: '#AFC0B1',
                hoverBackgroundColor: '#485545',
                // pointStyle: 'rectRounded',
                hoverBorderColor: '#485545',
                data: score
              }
            ]
          };
          let graphTarget2 = $("#graph-canvas-2");
          let barGraph2 = new Chart(graphTarget2, {
            type: 'bar',
            data: chartdata,
            options: {
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20,
                                family: 'Mitr',
                                weight: 'bold'
                            }
                        }
                    }
                }
            }

          });
        });
    }
}
