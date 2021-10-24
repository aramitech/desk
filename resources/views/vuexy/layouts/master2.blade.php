<?php
	if(Auth::guard('admin')->check())
	{
		
		if((Auth::guard('admin')->user()->twofa) == 0)
		{
			//redirect to OTP page
			echo '<script>window.location.href = "/desk/public/otp-verify"</script>';
		}
		
	}
?>

<?php
	if(Auth::guard('web')->check())
	{
		
		if((Auth::guard('web')->user()->twofa) == 0)
		{
			//redirect to user OTP page
			echo '<script>window.location.href = "/desk/public/otp-verify-user"</script>';
		}
		
	}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> @yield('title') - {{ config('app.name')}}</title>
    <link rel="apple-touch-icon" href="{{ asset('tyu/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tyu/app-assets/images/ico/favicon-16x16e.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/charts/apexcharts.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/card-analytics.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/assets/css/style.css')}}">
    <!-- END: Custom CSS-->



    <!-- BEGIN: Vendor CSS-->
    <!-- END: Vendor CSS-->





        <!-- BEGIN: Vendor CSS-->

    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/app-user.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/aggrid.css')}}">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('tables/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('tables/bootstrap.css')}}">

</head>





<!-- END: Head-->
@include('vuexy.layouts.header') 
<!-- BEGIN: Body-->

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('vuexy._partials.admin')   
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->
   
     @include('vuexy.layouts.footer')   
</body>
	<!-- chart -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

	@if(isset($companyggrchart))
		{!! $companyggrchart->script() !!}
	@endif
<!-- END: Body-->
<script src="{{ asset('js/app.js')}}"></script>


   <!-- BEGIN: Vendor JS-->
   <script src="{{ asset('tyu/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('tyu/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
			
	

    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>

    <!-- BEGIN: Vendor JS-->

    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/modal/components-modal.js')}}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script>
        /*=========================================================================================
            File Name: chart-chartjs.js
            Description: Chartjs Examples
            ----------------------------------------------------------------------------------------
            Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
            Author: PIXINVENT
            Author URL: http://www.themeforest.net/user/pixinvent
        ==========================================================================================*/

        $(window).on("load", function () {

        var $primary = '#7367F0';
        var $success = '#28C76F';
        var $danger = '#EA5455';
        var $warning = '#FF9F43';
        var $label_color = '#1E1E1E';
        var grid_line_color = '#dae1e7';
        var scatter_grid_color = '#f3f3f3';
        var $scatter_point_light = '#D1D4DB';
        var $scatter_point_dark = '#5175E0';
        var $white = '#fff';
        var $black = '#000';

        var themeColors = [$primary, $success, $danger, $warning, $label_color];



        // Bookmarkers Bar Chart
        // ------------------------------------------

        //Get the context of the Chart canvas element we want to select
        var barChartctx = $("#bar-chart");

        // Chart Options
        var barchartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide
        elements: {
            rectangle: {
            borderWidth: 2,
            borderSkipped: 'left'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: { display: false },
        scales: {
            xAxes: [{
            display: true,
            gridLines: {
                color: grid_line_color,
            },
            scaleLabel: {
                display: true,
            }
            }],
            yAxes: [{
            display: true,
            gridLines: {
                color: grid_line_color,
            },
            scaleLabel: {
                display: true,
            },
            ticks: {
                stepSize: 1000
            },
            }],
        },
        title: {
            display: true,
            text: 'Bookmarkers GGR Reports'
        },

        };

        // Chart Data
        var barchartData = {
        labels: <?php echo json_encode($data_arr['companies']); ?>,
        datasets: [{
            label: "GGR",
            data: <?php echo json_encode($data_arr['ggr']); ?>,
            backgroundColor: themeColors,
            borderColor: "transparent"
        }]
        };

        var barChartconfig = {
        type: 'bar',

        // Chart Options
        options: barchartOptions,

        data: barchartData
        };

        // Create the chart
        var barChart = new Chart(barChartctx, barChartconfig);
        

        // Pie Chart
        // --------------------------------


        //Get the context of the Chart canvas element we want to select
        var pieChartctx = $("#simple-pie-chart");

        // Chart Options
        var piechartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        title: {
            display: true,
            text: 'Predicted world population (millions) in 2050'
        }
        };

        // Chart Data
        var piechartData = {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
            label: "My First dataset",
            data: [2478, 5267, 734, 784, 433],
            backgroundColor: themeColors,
        }]
        };

        var pieChartconfig = {
        type: 'pie',

        // Chart Options
        options: piechartOptions,

        data: piechartData
        };

        // Create the chart
        var pieSimpleChart = new Chart(pieChartctx, pieChartconfig);

          // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx = $("#line-chart");

// Chart Options
var linechartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  legend: {
    position: 'top',
  },
  hover: {
    mode: 'label'
  },
  scales: {
    xAxes: [{
      display: true,
      gridLines: {
        color: grid_line_color,
      },
      scaleLabel: {
        display: true,
      }
    }],
    yAxes: [{
      display: true,
      gridLines: {
        color: grid_line_color,
      },
      scaleLabel: {
        display: true,
      }
    }]
  },
  title: {
    display: true,
    text: 'World population per region (in millions)'
  }
};

// Chart Data
var linechartData = {
  labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
  datasets: [{
    label: "Africa",
    data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
    borderColor: $primary,
    fill: false
  }, {
    data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
    label: "Asia",
    borderColor: $success,
    fill: false
  }, {
    data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
    label: "Europe",
    borderColor: $danger,
    fill: false
  }, {
    data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
    label: "Latin America",
    borderColor: $warning,
    fill: false
  }, {
    data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
    label: "North America",
    borderColor: $label_color,
    fill: false
  }]
};

var lineChartconfig = {
  type: 'line',

  // Chart Options
  options: linechartOptions,

  data: linechartData
};

// Create the chart
var lineChart = new Chart(lineChartctx, lineChartconfig);


// Horizontal Chart
  // -------------------------------------

  // Get the context of the Chart canvas element we want to select
  var horizontalChartctx = $("#horizontal-bar");

  var horizontalchartOptions = {
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      rectangle: {
        borderWidth: 2,
        borderSkipped: 'right',
        borderSkipped: 'top',
      }
    },
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  };

  // Chart Data
  var horizontalchartData = {
    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
    datasets: [{
      label: "Population (millions)",
      data: [2478, 5267, 734, 784, 433],
      backgroundColor: themeColors,
      borderColor: "transparent"
    }]
  };

  var horizontalChartconfig = {
    type: 'horizontalBar',

    // Chart Options
    options: horizontalchartOptions,

    data: horizontalchartData
  };

  // Create the chart
  var horizontalChart = new Chart(horizontalChartctx, horizontalChartconfig);

  
  // Doughnut Chart
  // ---------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var doughnutChartctx = $("#simple-doughnut-chart");

  // Chart Options
  var doughnutchartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  };

  // Chart Data
  var doughnutchartData = {
    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
    datasets: [{
      label: "My First dataset",
      data: [2478, 5267, 734, 784, 433],
      backgroundColor: themeColors,
    }]
  };

  var doughnutChartconfig = {
    type: 'doughnut',

    // Chart Options
    options: doughnutchartOptions,

    data: doughnutchartData
  };

  // Create the chart
  var doughnutSimpleChart = new Chart(doughnutChartctx, doughnutChartconfig);


  // Radar Chart
  // ----------------------------------------

  //Get the context of the Chart canvas element we want to select
  var radarChartctx = $("#radar-chart");

  // Chart Options
  var radarchartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: {
      position: 'top',
    },
    tooltips: {
      callbacks: {
        label: function (tooltipItems, data) {
          return data.datasets[tooltipItems.datasetIndex].label + ": " + tooltipItems.yLabel;
        }
      }
    },
    title: {
      display: true,
      text: 'Distribution in % of world population'
    },
    scale: {
      reverse: false,
      ticks: {
        beginAtZero: true,
        stepSize: 10
      }
    }
  };

  // Chart Data
  var radarchartData = {
    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
    datasets: [{
      label: "1950",
      fill: true,
      backgroundColor: "rgba(179,181,198,0.2)",
      borderColor: "rgba(179,181,198,1)",
      pointBorderColor: $white,
      pointBackgroundColor: "rgba(179,181,198,1)",
      data: [8.77, 55.61, 21.69, 6.62, 6.82],
    }, {
      label: "2050",
      fill: true,
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      pointBorderColor: $white,
      pointBackgroundColor: "rgba(255,99,132,1)",
      data: [25.48, 54.16, 7.61, 8.06, 4.45],
    },]
  };

  var radarChartconfig = {
    type: 'radar',

    // Chart Options
    options: radarchartOptions,

    data: radarchartData
  };

  // Create the chart
  var polarChart = new Chart(radarChartctx, radarChartconfig);



  // Polar Chart
  // -----------------------------------

  //Get the context of the Chart canvas element we want to select
  var polarChartctx = $("#polar-chart");

  // Chart Options
  var polarchartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: {
      position: 'top',
    },
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    },
    scale: {
      ticks: {
        beginAtZero: true,
        stepSize: 2000
      },
      reverse: false
    },
    animation: {
      animateRotate: false
    }
  };

  // Chart Data
  var polarchartData = {
    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: themeColors,
      data: [2478, 5267, 734, 784, 433]
    }],
  };

  var polarChartconfig = {
    type: 'polarArea',

    // Chart Options
    options: polarchartOptions,

    data: polarchartData
  };

  // Create the chart
  var polarChart = new Chart(polarChartctx, polarChartconfig);




  // Bubble Chart
  // ---------------------------------------

  //Get the context of the Chart canvas element we want to select
  var bubbleChartctx = $("#bubble-chart");

  var randomScalingFactor = function () {
    return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
  };

  // Chart Options
  var bubblechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
          labelString: "GDP (PPP)"
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
          labelString: "Happiness"
        },
        ticks: {
          stepSize: 0.5
        },
      }]
    },
    title: {
      display: true,
      text: 'Predicted world population (millions) in 2050'
    }
  };

  // Chart Data
  var bubblechartData = {
    animation: {
      duration: 10000
    },
    datasets: [{
      label: ["China"],
      backgroundColor: "rgba(255,221,50,0.2)",
      borderColor: "rgba(255,221,50,1)",
      data: [{
        x: 21269017,
        y: 5.245,
        r: 15
      }],
    }, {
      label: ["Denmark"],
      backgroundColor: "rgba(60,186,159,0.2)",
      borderColor: "rgba(60,186,159,1)",
      data: [{
        x: 258702,
        y: 7.526,
        r: 10
      }]
    }, {
      label: ["Germany"],
      backgroundColor: "rgba(0,0,0,0.2)",
      borderColor: $black,
      data: [{
        x: 3979083,
        y: 6.994,
        r: 15
      }]
    }, {
      label: ["Japan"],
      backgroundColor: "rgba(193,46,12,0.2)",
      borderColor: "rgba(193,46,12,1)",
      data: [{
        x: 4931877,
        y: 5.921,
        r: 15
      }]
    }]
  };

  var bubbleChartconfig = {
    type: 'bubble',

    // Chart Options
    options: bubblechartOptions,

    data: bubblechartData
  };

  // Create the chart
  var bubbleChart = new Chart(bubbleChartctx, bubbleChartconfig);



  // Scatter Chart
  // ------------------------------------

  //Get the context of the Chart canvas element we want to select
  var scatterChartctx = $("#scatter-chart");

  // Chart Options
  var scatterchartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 800,
    title: {
      display: false,
      text: 'Chart.js Scatter Chart'
    },
    scales: {
      xAxes: [{
        position: 'top',
        gridLines: {
          color: scatter_grid_color,
          drawTicks: false,
        },
        scaleLabel: {
          display: true,
          labelString: 'x axis'
        }
      }],
      yAxes: [{
        position: 'right',
        gridLines: {
          color: scatter_grid_color,
          drawTicks: false,
        },
        scaleLabel: {
          display: true,
          labelString: 'y axis'
        }
      }]
    }
  };

  // Chart Data
  var scatterchartData = {
    datasets: [{
      label: "My First dataset",
      data: [{
        x: 65,
        y: 28,
      }, {
        x: 59,
        y: 48,
      }, {
        x: 80,
        y: 40,
      }, {
        x: 81,
        y: 19,
      }, {
        x: 56,
        y: 86,
      }, {
        x: 55,
        y: 27,
      }, {
        x: 40,
        y: 89,
      }],
      backgroundColor: "rgba(209,212,219,.3)",
      borderColor: "transparent",
      pointBorderColor: $scatter_point_light,
      pointBackgroundColor: $white,
      pointBorderWidth: 2,
      pointHoverBorderWidth: 2,
      pointRadius: 4,
    }, {
      label: "My Second dataset",
      data: [{
        x: 45,
        y: 17,
      }, {
        x: 25,
        y: 62,
      }, {
        x: 16,
        y: 78,
      }, {
        x: 36,
        y: 88,
      }, {
        x: 67,
        y: 26,
      }, {
        x: 18,
        y: 48,
      }, {
        x: 76,
        y: 73,
      }],
      backgroundColor: "rgba(81,117,224,.6)",
      borderColor: "transparent",
      pointBorderColor: $scatter_point_dark,
      pointBackgroundColor: $white,
      pointBorderWidth: 2,
      pointHoverBorderWidth: 2,
      pointRadius: 4,
    }]
  };

  var scatterChartconfig = {
    type: 'scatter',

    // Chart Options
    options: scatterchartOptions,

    data: scatterchartData
  };

  // Create the chart
  var scatterChart = new Chart(scatterChartctx, scatterChartconfig);
});

</script>
<script>
  
      $(window).on("load", function () {

      var $primary = '#7367F0';
      var $success = '#28C76F';
      var $danger = '#EA5455';
      var $warning = '#FF9F43';
      var $info = '#00cfe8';
      var $primary_light = '#A9A2F6';
      var $danger_light = '#f29292';
      var $success_light = '#55DD92';
      var $warning_light = '#ffc085';
      var $info_light = '#1fcadb';
      var $strok_color = '#b9c3cd';
      var $label_color = '#e7e7e7';
      var $white = '#fff';

      // Line Area Chart - 1
      // ----------------------------------

      var gainedlineChartoptions = {
        chart: {
          height: 100,
          type: 'area',
          toolbar: {
            show: false,
          },
          sparkline: {
            enabled: true
          },
          grid: {
            show: false,
            padding: {
              left: 0,
              right: 0
            }
          },
        },
        colors: [$primary],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2.5
        },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 0.9,
            opacityFrom: 0.7,
            opacityTo: 0.5,
            stops: [0, 80, 100]
          }
        },
        series: [{
          name: 'Subscribers',
          data: [28, 40, 36, 52, 38, 60, 55]
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          padding: { left: 0, right: 0 },
        }],
        tooltip: {
          x: { show: false }
        },
      }

      var gainedlineChart = new ApexCharts(
        document.querySelector("#line-area-chart-1"),
        gainedlineChartoptions
      );

      gainedlineChart.render();



      // Line Area Chart - 2
      // ----------------------------------

      var revenuelineChartoptions = {
        chart: {
          height: 100,
          type: 'area',
          toolbar: {
            show: false,
          },
          sparkline: {
            enabled: true
          },
          grid: {
            show: false,
            padding: {
              left: 0,
              right: 0
            }
          },
        },
        colors: [$success],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2.5
        },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 0.9,
            opacityFrom: 0.7,
            opacityTo: 0.5,
            stops: [0, 80, 100]
          }
        },
        series: [{
          name: 'Revenue',
          data: [350, 275, 400, 300, 350, 300, 450]
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          padding: { left: 0, right: 0 },
        }],
        tooltip: {
          x: { show: false }
        },
      }

      var revenuelineChart = new ApexCharts(
        document.querySelector("#line-area-chart-2"),
        revenuelineChartoptions
      );

      revenuelineChart.render();


      // Line Area Chart - 3
      // ----------------------------------

      var saleslineChartoptions = {
        chart: {
          height: 100,
          type: 'area',
          toolbar: {
            show: false,
          },
          sparkline: {
            enabled: true
          },
          grid: {
            show: false,
            padding: {
              left: 0,
              right: 0
            }
          },
        },
        colors: [$danger],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2.5
        },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 0.9,
            opacityFrom: 0.7,
            opacityTo: 0.5,
            stops: [0, 80, 100]
          }
        },
        series: [{
          name: 'Sales',
          data: [10, 15, 7, 12, 3, 16]
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          padding: { left: 0, right: 0 },
        }],
        tooltip: {
          x: { show: false }
        },
      }

      var saleslineChart = new ApexCharts(
        document.querySelector("#line-area-chart-3"),
        saleslineChartoptions
      );

      saleslineChart.render();

      // Line Area Chart - 4
      // ----------------------------------

      var orderlineChartoptions = {
        chart: {
          height: 100,
          type: 'area',
          toolbar: {
            show: false,
          },
          sparkline: {
            enabled: true
          },
          grid: {
            show: false,
            padding: {
              left: 0,
              right: 0
            }
          },
        },
        colors: [$warning],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2.5
        },
        fill: {
          type: 'gradient',
          gradient: {
            shadeIntensity: 0.9,
            opacityFrom: 0.7,
            opacityTo: 0.5,
            stops: [0, 80, 100]
          }
        },
        series: [{
          name: 'Orders',
          data: [10, 15, 8, 15, 7, 12, 8]
        }],

        xaxis: {
          labels: {
            show: false,
          },
          axisBorder: {
            show: false,
          }
        },
        yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          padding: { left: 0, right: 0 },
        }],
        tooltip: {
          x: { show: false }
        },
      }

      var orderlineChart = new ApexCharts(
        document.querySelector("#line-area-chart-4"),
        orderlineChartoptions
      );

      orderlineChart.render();

      // revenue-chart Chart
      // -----------------------------

      var revenueChartoptions = {
        chart: {
          height: 270,
          toolbar: { show: false },
          type: 'line',
        },
        stroke: {
          curve: 'smooth',
          dashArray: [0, 8],
          width: [4, 2],
        },
        grid: {
          borderColor: $label_color,
        },
        legend: {
          show: false,
        },
        colors: [$danger_light, $strok_color],

        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            inverseColors: false,
            gradientToColors: [$primary, $strok_color],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        markers: {
          size: 0,
          hover: {
            size: 5
          }
        },
        xaxis: {
          labels: {
            style: {
              colors: $strok_color,
            }
          },
          axisTicks: {
            show: false,
          },
          categories: ['01', '05', '09', '13', '17', '21', '26', '31'],
          axisBorder: {
            show: false,
          },
          tickPlacement: 'on',
        },
        yaxis: {
          tickAmount: 5,
          labels: {
            style: {
              color: $strok_color,
            },
            formatter: function (val) {
              return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
            }
          }
        },
        tooltip: {
          x: { show: false }
        },
        series: [{
          name: "This Month",
          data: [45000, 47000, 44800, 47500, 45500, 48000, 46500, 48600]
        },
        {
          name: "Last Month",
          data: [46000, 48000, 45500, 46600, 44500, 46500, 45000, 47000]
        }
        ],

      }

      var revenueChart = new ApexCharts(
        document.querySelector("#revenue-chart"),
        revenueChartoptions
      );

      revenueChart.render();


      // Goal Overview  Chart
      // -----------------------------

      var goalChartoptions = {
        chart: {
          height: 250,
          type: 'radialBar',
          sparkline: {
            enabled: true,
          },
          dropShadow: {
            enabled: true,
            blur: 3,
            left: 1,
            top: 1,
            opacity: 0.1
          },
        },
        colors: [$success],
        plotOptions: {
          radialBar: {
            size: 110,
            startAngle: -150,
            endAngle: 150,
            hollow: {
              size: '77%',
            },
            track: {
              background: $strok_color,
              strokeWidth: '50%',
            },
            dataLabels: {
              name: {
                show: false
              },
              value: {
                offsetY: 18,
                color: '#99a2ac',
                fontSize: '4rem'
              }
            }
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            type: 'horizontal',
            shadeIntensity: 0.5,
            gradientToColors: ['#00b5b5'],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100]
          },
        },
        series: [Math.ceil(<?php
        error_reporting(0);
        echo 100*($companyactive/($companyactive+$companyinactive));?>)],
        stroke: {
          lineCap: 'round'
        },

      }

      var goalChart = new ApexCharts(
        document.querySelector("#goal-overview-chart"),
        goalChartoptions
      );

      goalChart.render();

      // Client Retention Chart
      // ----------------------------------

      var clientChartoptions = {
        chart: {
          stacked: true,
          type: 'bar',
          toolbar: { show: false },
          height: 300,
        },
        plotOptions: {
          bar: {
            columnWidth: '10%'
          }
        },
        colors: [$primary, $danger],
        series: [{
          name: 'New Clients',
          data: [175, 125, 225, 175, 160, 189, 206, 134, 159, 216, 148, 123]
        }, {
          name: 'Retained Clients',
          data: [-144, -155, -141, -167, -122, -143, -158, -107, -126, -131, -140, -137]
        }],
        grid: {
          borderColor: $label_color,
          padding: {
            left: 0,
            right: 0
          }
        },
        legend: {
          show: true,
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 0,
          fontSize: '14px',
          markers: {
            radius: 50,
            width: 10,
            height: 10,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          labels: {
            style: {
              colors: $strok_color,
            }
          },
          axisTicks: {
            show: false,
          },
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          axisBorder: {
            show: false,
          },
        },
        yaxis: {
          tickAmount: 5,
          labels: {
            style: {
              color: $strok_color,
            }
          }
        },
        tooltip: {
          x: { show: false }
        },
      }

      var clientChart = new ApexCharts(
        document.querySelector("#client-retention-chart"),
        clientChartoptions
      );

      clientChart.render();

      // Session Chart
      // ----------------------------------

      var sessionChartoptions = {
        chart: {
          type: 'donut',
          height: 325,
          toolbar: {
            show: false
          }
        },
        dataLabels: {
          enabled: false
        },
        series: [<?php echo $companies->count();?>],
        legend: { show: false },
        comparedResult: [2, -3, 8],
        labels: ['Desktop', 'Mobile', 'Tablet'],
        stroke: { width: 0 },
        colors: [$primary, $warning, $danger],
        fill: {
          type: 'gradient',
          gradient: {
            gradientToColors: [$primary_light, $warning_light, $danger_light]
          }
        }
      }

      var sessionChart = new ApexCharts(
        document.querySelector("#session-chart"),
        sessionChartoptions
      );

      sessionChart.render();

      // Customer Chart
      // -----------------------------

      var customerChartoptions = {
        chart: {
          type: 'pie',
          height: 330,
          dropShadow: {
            enabled: false,
            blur: 5,
            left: 1,
            top: 1,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        labels: <?php echo json_encode($categories['category']);?>,
        series: <?php echo json_encode($categories['companycount']);?>,
        dataLabels: {
          enabled: false
        },
        legend: { show: false },
        stroke: {
          width: 5
        },
        colors: [$primary, $warning, $danger],
        fill: {
          type: 'gradient',
          gradient: {
            gradientToColors: [$primary_light, $warning_light, $danger_light]
          }
        }
      }

      var customerChart = new ApexCharts(
        document.querySelector("#customer-chart"),
        customerChartoptions
      );

      customerChart.render();
    });
    </script>



	
	 <script src="{{ asset('tables/jquery-3.5.1.js')}}"></script> 
	<script src="{{ asset('tables/dataTables.bootstrap4.min.js')}}"></script>
	 <script src="{{ asset('tables/jquery.dataTables.min.js')}}"></script> 

 <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>