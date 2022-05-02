am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      radius: am5.percent(90),
      innerRadius: am5.percent(50),
      layout: root.horizontalLayout
    }));
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      name: "Series",
      valueField: "sales",
      categoryField: "country"
    }));
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      country: "Dholpur",
      sales: 97
    }, {
      country: "Baran",
      sales: 166
    }, {
      country: "Sirohi",
      sales: 908
    }, {
      country: "Jaisalmer",
      sales: 533
    }, {
      country: "Karauli",
      sales: 293
    }, {
      country: "Dungarpur",
      sales: 418
   
    }]);
    
    // Disabling labels and ticks
    series.labels.template.set("visible", false);
    series.ticks.template.set("visible", false);
    
    // Adding gradients
    series.slices.template.set("strokeOpacity", 0);
    series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
      stops: [{
        brighten: -0.8
      }, {
        brighten: -0.8
      }, {
        brighten: -0.5
      }, {
        brighten: 0
      }, {
        brighten: -0.5
      }]
    }));
    
    // Create legend
    // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
    var legend = chart.children.push(am5.Legend.new(root, {
      centerY: am5.percent(50),
      y: am5.percent(50),
      marginTop: 15,
      marginBottom: 15,
      layout: root.verticalLayout
    }));
    
    legend.data.setAll(series.dataItems);
    
    
    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
    
    }); // end am5.ready()


    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("amchart");
        
        
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        
        
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
          panX: false,
          panY: false,
          wheelX: "panX",
          wheelY: "zoomX",
          layout: root.verticalLayout
        }));
        
        
        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
          am5.Legend.new(root, {
            width: am5.percent(100),
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop:10,
            // layout: root.horizontalLayout
          })
        );
        
        var data = [{
          "distric": "Dholpur",
          "metting": 500,
          "participants": 300,
          // "asia": 19799,
          
        }, {
          "distric": "Baran",
          "metting": 1020,
          "participants": 800,
          // "asia": 7763,
         
        }, {
          "distric": "Sirohi",
          "metting": 1500,
          "participants": 862,
          // "asia": 13340,
         
        }, {
          "distric": "Jaisalmer",
          "metting": 900,
          "participants": 400,
          // "asia": 7991,
         
        }, {
          "distric": "Karauli",
          "metting": 700,
          "participants": 500,
          // "asia": 3742,
        }, {
          "distric": "Dungarpur",
          "metting":1800,
          "participants": 500,
          // "asia": 3512,
        }];
        root.numberFormatter.setAll({
          numberFormat: "#a",
          
          // Group only into M (millions), and B (billions)
          bigNumberPrefixes: [
            { "number": 1e+3, "suffix": "K" },
            { "number": 1e+6, "suffix": "M" },
            { "number": 1e+9, "suffix": "B" }
          ],
        
          // Do not use small number prefixes at all
          smallNumberPrefixes: []
        });
        
        
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
          categoryField: "distric",
          // xAxis:renderer.minGridDistance = 20,
          renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9,
            minGridDistance :20,
          }),
          tooltip: am5.Tooltip.new(root, {})
        }));
        
        xAxis.data.setAll(data);
        
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
          
          renderer: am5xy.AxisRendererY.new(root, {})
        }));
        
        
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName, color) {
          var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "distric"
            ,fill:color,
          }));
          
        
          series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
          });
        
          series.data.setAll(data);
        
          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          series.appear();
        
          series.bullets.push(function () {
            return am5.Bullet.new(root, {
              locationY: 0,
              sprite: am5.Label.new(root, {
                text: "{valueY}",
                fill: root.interfaceColors.get("alternativeText"),
                centerY: 0,
                centerX: am5.p50,
                populateText: true
              })
            });
          });
        
          legend.data.push(series);
        }
        
        makeSeries("Number of Meetings", "metting",am5.color("#6d1ed1"));
        makeSeries("Number of Participants", "participants",am5.color("#f96fab"));
        // makeSeries("Reach through Faitrh", "asia",am5.color("#ac42c0"));
        // makeSeries("Latin America", "lamerica");
      
        
        
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
        
        }); // end am5.ready()



    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("amchart2");
        
        
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        
        
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
          panX: false,
          panY: false,
          wheelX: "panX",
          wheelY: "zoomX",
          layout: root.verticalLayout
        }));
        
        
        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
          // legend.align = "right",
          am5.Legend.new(root, {
            width: am5.percent(100),
            centerX: am5.percent(50),
            x: am5.percent(50),
            marginTop:10,
            layout: root.horizontalLayout
              // centerX: am5.p50,
              // x: am5.p50

            
            // Width:33%,
            
          })
        );
        
        var data = [{
          "year": "Dholpur",
          "europe": 236,
          "namerica": 6080,
          
        }, {
          "year": "Baran",
          "europe": 5137,
          "namerica": 140660,
         
        }, {
          "year": "Sirohi",
          "europe": 4862,
          "namerica": 31105,
        }, {
          "year": "Jaisalmer",
          "europe": 939,
          "namerica": 2045,
         
        }, {
          "year": "Karauli",
          "europe": 5,
          "namerica": 1449,
          
        }, {
          "year": "Dungarpur",
          "europe": 172,
          "namerica": 660,
          
          
        }];

        // chart.numberFormatter.numberFormat = "#a";
        // chart.numberFormatter.bigNumberPrefixes = [
        //   { "number": 1e+3, "suffix": "K" },
        //   // { "number": 1e+6, "suffix": "M" },
        //   // { "number": 1e+9, "suffix": "B" }
        // ];
        

        root.numberFormatter.setAll({
          numberFormat: "#a",
          
          // Group only into M (millions), and B (billions)
          bigNumberPrefixes: [
            { "number": 1e+3, "suffix": "K" },
            { "number": 1e+6, "suffix": "M" },
            { "number": 1e+9, "suffix": "B" }
          ],
        
          // Do not use small number prefixes at all
          smallNumberPrefixes: []
        });
        
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
          categoryField: "year",
          renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9,
            minGridDistance :20,
          }),
          tooltip: am5.Tooltip.new(root, {})
        }));
        
        xAxis.data.setAll(data);
        
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
          renderer: am5xy.AxisRendererY.new(root, {})
        }));
        
        
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName, color) {
          var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "year",
            fill:color,
          }));
        
          series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
          });
        
          series.data.setAll(data);
        
          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          series.appear();
        
          series.bullets.push(function () {
            return am5.Bullet.new(root, {
              locationY: 0,
              sprite: am5.Label.new(root, {
                text: "{valueY}",
                fill: root.interfaceColors.get("alternativeText"),
                centerY: 0,
                centerX: am5.p50,
                populateText: true
              })
            });
          });
        
          legend.data.push(series);
        }
        
        makeSeries("No. of People Attended", "europe",am5.color("#ffc107"));
        makeSeries("Message Reach", "namerica",am5.color("#f96fab"));
        // makeSeries("Asia", "asia",am5.color("#00ff00"));
        // makeSeries("Latin America", "lamerica");
      
        
        
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
        
        }); // end am5.ready()