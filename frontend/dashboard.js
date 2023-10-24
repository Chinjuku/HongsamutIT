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
                label: 'User\'s Subscription Plan subscription\'statistics',
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
                label: 'Book\'s categories borrow\'s statistics',
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

function openCity(evt, tabName, butID) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";

    if(butID == "conbutt1"){
        document.getElementById("conbutt1").style.backgroundColor = "#485545b4";
        document.getElementById("conbutt2").style.backgroundColor = "#48554544";
    }else{
        document.getElementById("conbutt2").style.backgroundColor = "#485545b4";
        document.getElementById("conbutt1").style.backgroundColor = "#48554544";
    }
    // document.getElementById(tabName).getElementsByClassName("tablinks").style.backgroundColor = "red";
    evt.currentTarget.className += " active";
}

