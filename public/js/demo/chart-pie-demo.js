// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';

Chart.defaults.global.defaultFontColor = "#858796";
const paths = "controllers/method.php";
fetch(paths, {
  method: "POST",
  headers: { "Content-Type": "application/x-www-form-urlencoded" },
  body: "fetch_total_users=''",
})
  .then((response) => {
    return response.text();
  })
  .then((result) => {
    let data = JSON.parse(result);
    
    let user = [];
    for (let count = 0; count < data.length; count++) {
      if (data[count].usertype == data[count].usertype) {
        user.push(data[count].usertype);
      }
    }
    let counts = {};
    user.forEach((x) => {
      counts[x] = (counts[x] || 0) + 1;
    });

    let usertypes = [];
    let usertypescount = [];
    let userobj = Object.entries(counts);
    console.log();
    userobj.forEach((da)=>{
      usertypes.push(da[0]);
      usertypescount.push(da[1]);
    });
  
    // Pie Chart Example
    var ctxPie = document.getElementById("myPieChart");
    if(ctxPie){
      var myPieChart = new Chart(ctxPie, {
        type: "doughnut",
        data: {
          labels: usertypes,
          datasets: [
            {
              data: usertypescount,
              backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"],
              hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf"],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: true,
          },
          cutoutPercentage: 80,
        },
      });
    }
    
  });
