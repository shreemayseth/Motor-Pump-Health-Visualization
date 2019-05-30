<!DOCTYPE html>
<meta charset="utf-8">
<style> /* set the CSS */

#body {
  background-color:;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: cover;
  opacity:;
  font: 12px Arial;
}

path {
  stroke: steelblue;
	stroke-width: 2;
	fill: none;
}

.axis path,
.axis line {
	fill:none;
	stroke: grey;
	stroke-width: 1;
	shape-rendering: crispEdges;
}

.margin{
  background-color: black;
}

</style>
<body>


  <div id="show"></div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function(){
            setInterval(function(){
              $('#show').load('auto.php')
        }, 3000);
      });
  </script>
  
<!-- load the d3.js library -->
<script src="http://d3js.org/d3.v3.min.js"></script>

<script>

// Set the dimensions of the canvas / graph
var	margin = {top: 80, right: 20, bottom: 50, left: 50},
	width = 400 - margin.left - margin.right,
	height = 300 - margin.top - margin.bottom;

// Parse the date / time
var	parseDate = d3.time.format("%Y-%m-%d %H:%M:%S").parse;

// Set the ranges
var	x = d3.time.scale().range([0, width]);
var	y = d3.scale.linear().range([height, 0]);

// Define the axes
var	xAxis = d3.svg.axis().scale(x)
	.orient("bottom").ticks(5);

var	yAxis = d3.svg.axis().scale(y)
	.orient("left").ticks(5);

// Define the line
var	valueline = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.current); });

// Adds the svg canvas
var	svg = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.current = +d.current;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.current; })]);

	// Add the valueline path.
	svg.append("path")		// Add the valueline path.
		.attr("class", "line")
		.attr("d", valueline(data));

	// Add the X Axis
	svg.append("g")			// Add the X Axis
		.attr("class", "x axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg.append("g")			// Add the Y Axis
		.attr("class", "y axis")
		.call(yAxis);

  svg.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Current vs Time Graph");

    svg.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("CURRENT(a)");

});

var inter = setInterval(function() {
                updateData();
                updateData1();
                updateData2();
                updateData3();
                updateData4();
                updateData5();
                updateData6();
                updateData7();
        }, 500);

// ** Update data section (Called from the onclick)
function updateData() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.current = +d.current;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.current; })]);


    // Select the section we want to apply our changes to
    var svg = d3.select("body").transition();

    // Make the changes
        svg.select(".line")   // change the line
            .duration(750)
            .attr("d", valueline(data));
        svg.select(".x.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg.select(".y.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline1 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.voltage); });

// Adds the svg canvas
var	svg1 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.voltage = +d.voltage;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.voltage; })]);

	// Add the valueline path.
	svg1.append("path")		// Add the valueline path.
		.attr("class", "aline")
		.attr("d", valueline1(data));

	// Add the X Axis
	svg1.append("g")			// Add the X Axis
		.attr("class", "ax axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg1.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg1.append("g")			// Add the Y Axis
		.attr("class", "ay axis")
		.call(yAxis);

  svg1.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Voltage vs Time Graph");

    svg1.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("VOLTAGE(v)");

});


// ** Update data section (Called from the onclick)
function updateData1() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.voltage = +d.voltage;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.voltage; })]);


    // Select the section we want to apply our changes to
    var svg1 = d3.select("body").transition();

    // Make the changes
        svg1.select(".aline")   // change the line
            .duration(750)
            .attr("d", valueline1(data));
        svg1.select(".ax.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg1.select(".ay.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline2 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.speed); });

// Adds the svg canvas
var	svg2 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.speed = +d.speed;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.speed; })]);

	// Add the valueline path.
	svg2.append("path")		// Add the valueline path.
		.attr("class", "bline")
		.attr("d", valueline2(data));

	// Add the X Axis
	svg2.append("g")			// Add the X Axis
		.attr("class", "bx axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg2.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg2.append("g")			// Add the Y Axis
		.attr("class", "by axis")
		.call(yAxis);

  svg2.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Speed vs Time Graph");

    svg2.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("SPEED(s)");

});

// ** Update data section
function updateData2() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.speed = +d.speed;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.speed; })]);


    // Select the section we want to apply our changes to
    var svg2 = d3.select("body").transition();

    // Make the changes
        svg2.select(".bline")   // change the line
            .duration(750)
            .attr("d", valueline2(data));
        svg2.select(".bx.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg2.select(".by.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline3 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.vibration); });

// Adds the svg canvas
var	svg3 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.vibration = +d.vibration;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.vibration; })]);

	// Add the valueline path.
	svg3.append("path")		// Add the valueline path.
		.attr("class", "cline")
		.attr("d", valueline3(data));

	// Add the X Axis
	svg3.append("g")			// Add the X Axis
		.attr("class", "cx axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg3.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg3.append("g")			// Add the Y Axis
		.attr("class", "cy axis")
		.call(yAxis);

  svg3.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Vibration vs Time Graph");

    svg3.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("VIBRATION(Hz)");

});

// ** Update data section
function updateData3() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.vibration = +d.vibration;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.vibration; })]);


    // Select the section we want to apply our changes to
    var svg3 = d3.select("body").transition();

    // Make the changes
        svg3.select(".cline")   // change the line
            .duration(750)
            .attr("d", valueline3(data));
        svg3.select(".cx.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg3.select(".cy.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline4 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.pressure); });

// Adds the svg canvas
var	svg4 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.pressure = +d.pressure;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.pressure; })]);

	// Add the valueline path.
	svg4.append("path")		// Add the valueline path.
		.attr("class", "dline")
		.attr("d", valueline4(data));

	// Add the X Axis
	svg4.append("g")			// Add the X Axis
		.attr("class", "dx axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg4.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg4.append("g")			// Add the Y Axis
		.attr("class", "dy axis")
		.call(yAxis);

  svg4.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Pressure vs Time Graph");

    svg4.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("PRESSURE(Pa)");

});

// ** Update data section
function updateData4() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.pressure = +d.pressure;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.pressure; })]);


    // Select the section we want to apply our changes to
    var svg4 = d3.select("body").transition();

    // Make the changes
        svg4.select(".dline")   // change the line
            .duration(750)
            .attr("d", valueline4(data));
        svg4.select(".dx.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg4.select(".dy.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline5 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.flowrate); });

// Adds the svg canvas
var	svg5 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.flowrate = +d.flowrate;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.flowrate; })]);

	// Add the valueline path.
	svg5.append("path")		// Add the valueline path.
		.attr("class", "eline")
		.attr("d", valueline5(data));

	// Add the X Axis
	svg5.append("g")			// Add the X Axis
		.attr("class", "ex axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg5.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg5.append("g")			// Add the Y Axis
		.attr("class", "ey axis")
		.call(yAxis);

  svg5.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Flowrate vs Time Graph");

    svg5.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("FLOWRATE(f)");

});

// ** Update data section
function updateData5() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.flowrate = +d.flowrate;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.flowrate; })]);


    // Select the section we want to apply our changes to
    var svg5 = d3.select("body").transition();

    // Make the changes
        svg5.select(".eline")   // change the line
            .duration(750)
            .attr("d", valueline5(data));
        svg5.select(".ex.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg5.select(".ey.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline6 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.temp1); });

// Adds the svg canvas
var	svg6 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.temp1 = +d.temp1;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.temp1; })]);

	// Add the valueline path.
	svg6.append("path")		// Add the valueline path.
		.attr("class", "fline")
		.attr("d", valueline6(data));

	// Add the X Axis
	svg6.append("g")			// Add the X Axis
		.attr("class", "fx axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg6.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg6.append("g")			// Add the Y Axis
		.attr("class", "fy axis")
		.call(yAxis);

  svg6.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Temperature1 vs Time Graph");

    svg6.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("TEMPERATURE1(T1)");

});

// ** Update data section
function updateData6() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.temp1 = +d.temp1;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.temp1; })]);


    // Select the section we want to apply our changes to
    var svg6 = d3.select("body").transition();

    // Make the changes
        svg6.select(".fline")   // change the line
            .duration(750)
            .attr("d", valueline6(data));
        svg6.select(".fx.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg6.select(".fy.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

// Define the line
var	valueline7 = d3.svg.line()
	.x(function(d) { return x(d.times); })
	.y(function(d) { return y(d.temp2); });

// Adds the svg canvas
var	svg7 = d3.select("body")
	.append("svg")
		.attr("width", width + margin.left + margin.right)
		.attr("height", height + margin.top + margin.bottom)
	.append("g")
		.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

// Get the data
d3.json("d3.php", function(error, data) {
  data.forEach(function(d) {
      d.times = parseDate(d.times);
      d.temp2 = +d.temp2;
  });

	// Scale the range of the data
	x.domain(d3.extent(data, function(d) { return d.times; }));
	y.domain([0, d3.max(data, function(d) { return d.temp2; })]);

	// Add the valueline path.
	svg7.append("path")		// Add the valueline path.
		.attr("class", "gline")
		.attr("d", valueline7(data));

	// Add the X Axis
	svg7.append("g")			// Add the X Axis
		.attr("class", "gx axis")
		.attr("transform", "translate(0," + height + ")")
		.call(xAxis);

  svg7.append("text")
      .attr("transform", "translate(" + (width / 2) + " ," + (height + margin.bottom) + ")")
      .style("text-anchor", "middle")
      .text("TIME(t)");

	// Add the Y Axis
	svg7.append("g")			// Add the Y Axis
		.attr("class", "gy axis")
		.call(yAxis);

  svg7.append("text")
    .attr("x", (width / 2))
    .attr("y", 0 - (margin.top / 2))
    .attr("text-anchor", "middle")
    .style("font-size", "16px")
    .style("text-decoration", "underline")
    .text("Temperature2 vs Time Graph");

    svg7.append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 0 - margin.left)
    .attr("x", 0 - (height / 2))
    .attr("dy", "1em")
    .style("text-anchor", "middle")
    .text("TEMPERATURE2(T2)");

});

// ** Update data section
function updateData7() {

    // Get the data again
    d3.json("d3.php", function(error, data) {
      data.forEach(function(d) {
          d.times = parseDate(d.times);
          d.temp2 = +d.temp2;
      });

    	// Scale the range of the data
    	x.domain(d3.extent(data, function(d) { return d.times; }));
    	y.domain([0, d3.max(data, function(d) { return d.temp2; })]);


    // Select the section we want to apply our changes to
    var svg7 = d3.select("body").transition();

    // Make the changes
        svg7.select(".gline")   // change the line
            .duration(750)
            .attr("d", valueline7(data));
        svg7.select(".gx.axis") // change the x axis
            .duration(750)
            .call(xAxis);
        svg7.select(".gy.axis") // change the y axis
            .duration(750)
            .call(yAxis);

    });
}

</script>
</body>
