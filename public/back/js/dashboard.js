(function ($) {
  "use strict";
  $(function () {
    $.ajax({
      type: "GET",
      url: "/chart",
      // data: data,
      success: function (data) {
        // console.log(data);
        var datas = {
          labels: data.label,
          // legend: "ok",
          datasets: [
            {
              // legend: false,
              label: "jumlah referal",
              data: data.data,
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
              fill: true,
            },
          ],
        };

        if ($("#barChart").length) {
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var barChart = new Chart(barChartCanvas, {
            type: "bar",
            data: datas,
            options: {
              scales: {
                yAxes: [
                  {
                    display: true,
                    ticks: {
                      display: true,
                      min: 0,
                      // max: 100,
                      stepSize: 1,
                      fontColor: "#6c7383",
                      fontSize: 12,
                      fontStyle: 500,
                      padding: 15,
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
            },
          });
        }
      },
    });

    //grafik per 3 bulan
    if ($("#cash-deposits-chart").length) {
      var cashDepositsCanvas = $("#cash-deposits-chart")
        .get(0)
        .getContext("2d");
      $.ajax({
        type: "GET",
        url: "/chartdashboard",
        // data: data,
        success: function (datas) {
          // console.log(datas);
          var data = {
            labels: [
              "1",
              "2",
              "3",
              "4",
              "5",
              "6",
              "7",
              "8",
              "9",
              "10",
              "11",
              "12",
              "13",
              "14",
              "15",
              "16",
              "17",
              "18",
              "19",
              "20",
              "21",
              "22",
              "23",
              "24",
              "25",
              "26",
              "27",
              "28",
              "29",
              "30",
              "31",
            ],
            datasets: [
              {
                label: datas.bulan2sebelumnya,
                data: datas.jml_user_bln2_sebelum,
                borderColor: ["#ff4747"],
                borderWidth: 5,
                fill: false,
                pointBackgroundColor: "#fff",
              },
              {
                label: datas.bulansebelumnya,
                data: datas.jml_user_bln_sebelum,
                borderColor: ["#ffc100"],
                borderWidth: 5,
                fill: false,
                pointBackgroundColor: "#fff",
              },
              {
                label: datas.bulansekarang,
                data: datas.jml_user_bln_skrng,
                borderColor: ["#42f557"],
                borderWidth: 5,
                fill: false,
                pointBackgroundColor: "#fff",
              },
            ],
          };
          var options = {
            scales: {
              yAxes: [
                {
                  display: true,
                  gridLines: {
                    drawBorder: false,
                    lineWidth: 1,
                    color: "#e9e9e9",
                    zeroLineColor: "#e9e9e9",
                  },
                  ticks: {
                    min: 0,
                    max: 20,
                    stepSize: 2,
                    fontColor: "#6c7383",
                    fontSize: 16,
                    fontStyle: 300,
                    padding: 15,
                  },
                },
              ],
              xAxes: [
                {
                  display: true,
                  gridLines: {
                    drawBorder: false,
                    lineWidth: 1,
                    color: "#e9e9e9",
                  },
                  ticks: {
                    fontColor: "#6c7383",
                    fontSize: 16,
                    fontStyle: 300,
                    padding: 15,
                  },
                },
              ],
            },
            legend: {
              display: false,
            },
            legendCallback: function (chart) {
              var text = [];
              text.push('<ul class="dashboard-chart-legend">');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                text.push(
                  '<li><span style="background-color: ' +
                    chart.data.datasets[i].borderColor[0] +
                    ' "></span>'
                );
                if (chart.data.datasets[i].label) {
                  text.push(chart.data.datasets[i].label);
                }
              }
              text.push("</ul>");
              return text.join("");
            },
            elements: {
              point: {
                radius: 3,
              },
              line: {
                tension: 0,
              },
            },
            stepsize: 1,
            layout: {
              padding: {
                top: 0,
                bottom: -10,
                left: -10,
                right: 0,
              },
            },
          };
          var cashDeposits = new Chart(cashDepositsCanvas, {
            type: "line",
            data: data,
            options: options,
          });
          document.getElementById("cash-deposits-chart-legend").innerHTML =
            cashDeposits.generateLegend();
        },
      });
    }
    //End grafik pertiga bulan

    //grafik per wilayah
    var id_kota = document.getElementById("id_wilayah").value;
    var puanjang = id_kota.length;
    // console.log(puanjang);
    $.ajax({
      type: "GET",
      url: "/chartWilayah/" + id_kota,
      // data: data,
      success: function (data) {
        var barChartCanvas;
        // console.log(data);
        var datas = {
          labels: data.label,
          // legend: "ok",
          datasets: [
            {
              // legend: false,
              label: "Jumlah Kader",
              data: data.data,
              id_data: data.id_wilayah,
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255,99,132,1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
              fill: true,
            },
          ],
        };

        var canvas = document.getElementById("barChartwilayah");
        var ctx = canvas.getContext("2d");
        // var myNewChart = new Chart(ctx, {
        //   type: "bar",
        //   data: data,
        // });

        if ($("#barChartwilayah").length) {
          // var barChartCanvas = $("#barChartwilayah").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var myNewChart = new Chart(ctx, {
            // var barChart = new Chart(barChartCanvas, {
            type: "bar",
            data: datas,
            options: {
              scales: {
                yAxes: [
                  {
                    display: true,
                    ticks: {
                      display: true,
                      min: 0,
                      // max: 100,
                      stepSize: 1,
                      fontColor: "#6c7383",
                      fontSize: 12,
                      fontStyle: 500,
                      padding: 15,
                    },
                  },
                ],
              },
              legend: {
                display: false,
              },
            },
          });
        }

        if (puanjang != "10") {
          canvas.onclick = function (evt) {
            var activePoints = myNewChart.getElementsAtEvent(evt);
            if (activePoints[0]) {
              var chartData = activePoints[0]["_chart"].config.data;
              var idx = activePoints[0]["_index"];

              // var label = chartData.labels[idx];
              var value = chartData.datasets[0].id_data[idx];

              var url = "/perwilayah/" + value;
              window.location.href = url;
            }
          };
        }
      },
    });
    //End grafik per wilayah

    if ($("#total-sales-chart").length) {
      var totalSalesChartCanvas = $("#total-sales-chart")
        .get(0)
        .getContext("2d");

      var data = {
        labels: [
          "0",
          "1",
          "2",
          "3",
          "4",
          "5",
          "6",
          "7",
          "8",
          "9",
          "10",
          "11",
          "12",
          "13",
          "14",
          "15",
          "16",
          "17",
          "18",
          "19",
          "20",
          "21",
          "22",
          "23",
          "24",
          "25",
          "26",
          "27",
          "28",
          "29",
          "30",
          "31",
          "32",
          "33",
          "34",
          "35",
          "36",
          "37",
          "38",
          "39",
          "40",
        ],
        datasets: [
          {
            label: "2019",
            data: [
              42, 42, 30, 30, 18, 22, 16, 21, 22, 22, 22, 20, 24, 20, 18, 22,
              30, 34, 32, 33, 33, 24, 32, 34, 30, 34, 19, 34, 18, 10, 22, 24,
              20, 22, 20, 21, 10, 10, 5, 9, 14,
            ],
            borderColor: ["transparent"],
            borderWidth: 2,
            fill: true,
            backgroundColor: "rgba(47,91,191,0.77)",
          },
          {
            label: "2018",
            data: [
              35, 28, 32, 42, 44, 46, 42, 50, 48, 30, 35, 48, 42, 40, 54, 58,
              56, 55, 59, 58, 57, 60, 66, 54, 38, 40, 42, 44, 42, 43, 42, 38,
              43, 41, 43, 50, 58, 58, 68, 72, 72,
            ],
            borderColor: ["transparent"],
            borderWidth: 2,
            fill: true,
            backgroundColor: "rgba(77,131,255,0.77)",
          },
          {
            label: "Past years",
            data: [
              98, 88, 92, 90, 98, 98, 90, 92, 78, 88, 84, 76, 80, 72, 74, 74,
              88, 80, 72, 62, 62, 72, 72, 78, 78, 72, 75, 78, 68, 68, 60, 68,
              70, 75, 70, 80, 82, 78, 78, 84, 82,
            ],
            borderColor: ["transparent"],
            borderWidth: 2,
            fill: true,
            backgroundColor: "rgba(77,131,255,0.43)",
          },
        ],
      };
      var options = {
        scales: {
          yAxes: [
            {
              display: false,
              gridLines: {
                drawBorder: false,
                lineWidth: 1,
                color: "#e9e9e9",
                zeroLineColor: "#e9e9e9",
              },
              ticks: {
                display: true,
                min: 0,
                max: 100,
                stepSize: 10,
                fontColor: "#6c7383",
                fontSize: 16,
                fontStyle: 300,
                padding: 15,
              },
            },
          ],
          xAxes: [
            {
              display: false,
              gridLines: {
                drawBorder: false,
                lineWidth: 1,
                color: "#e9e9e9",
              },
              ticks: {
                display: true,
                fontColor: "#6c7383",
                fontSize: 16,
                fontStyle: 300,
                padding: 15,
              },
            },
          ],
        },
        legend: {
          display: false,
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<ul class="dashboard-chart-legend mb-0 mt-4">');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            text.push(
              '<li><span style="background-color: ' +
                chart.data.datasets[i].backgroundColor +
                ' "></span>'
            );
            if (chart.data.datasets[i].label) {
              text.push(chart.data.datasets[i].label);
            }
          }
          text.push("</ul>");
          return text.join("");
        },
        elements: {
          point: {
            radius: 0,
          },
          line: {
            tension: 0,
          },
        },
        stepsize: 1,
        layout: {
          padding: {
            top: 0,
            bottom: 0,
            left: 0,
            right: 0,
          },
        },
      };
      var totalSalesChart = new Chart(totalSalesChartCanvas, {
        type: "line",
        data: data,
        options: options,
      });
      document.getElementById("total-sales-chart-legend").innerHTML =
        totalSalesChart.generateLegend();
    }

    $("#recent-purchases-listing").DataTable({
      dom: "Bfrtip",
      buttons: ["excel", "pdf", "print"],
      // aLengthMenu: [
      //   [5, 10, 15, -1],
      //   [5, 10, 15, "All"],
      // ],
      // iDisplayLength: 10,
      // language: {
      //   search: "Search",
      // },
      searching: true,
      paging: false,
      ordering: true,
      // info: false,
    });

    // $("#agenda").DataTable({
    // dom: "Bfrtip",
    // buttons: ["excel", "pdf", "print"],
    // sScrollY: false,
    // sScrollX: true,
    // overflow: hidden,
    // scrollY: false,
    // scrollX: false,
    //   aLengthMenu: [
    //     [5, 10, 15, -1],
    //     [5, 10, 15, "All"],
    //   ],
    //   iDisplayLength: 10,
    // language: {
    //   search: "Search",
    // },
    //   searching: true,
    // paging: false,
    // info: false,
    // });
  });
})(jQuery);

// $(".modal-agenda").on("click", function () {
//   var id = $(this).data("id");
//   console.log("ID: " + id);
//   $.ajax({
//     type: "GET",
//     url: "/agenda/selengkapnya/" + id,
//     dataType: "JSON",
//     success: function (data) {
//       // var result = JSON.parse(data);
//       console.log(data);
//       $("#exampleModalLongTitle").text(data.judul);
//       $("#agenda-img").attr("src", "foto_agenda/" + data.foto);
//       $("#body-agenda").text(data.body);
//       // $("#tanggal-agenda").text("Tanggal : " + data.tanggal);
//       $("#lokasi-agenda").text("Lokasi : " + data.lokasi);
//       $("#exampleModal").modal("show");
//     },
//     error: function (data) {
//       alert("error");
//     },
//   });
// });

$(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
