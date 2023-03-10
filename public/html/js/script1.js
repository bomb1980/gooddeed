var json = {
  'children': [
    {'name': 'NO POVERTY', 'value': 70},
    {'name': 'ZERO HUNGER', 'value': 44},
    {'name': 'HEALTH', 'value': 65},
    {'name': 'EDUCATION', 'value': 39},
    {'name': 'EQULITY', 'value': 10},
    {'name': 'CLEAN WATER', 'value': 25},
    {'name': 'CLEAN ENERGY', 'value': 44},
    {'name': 'ECON GROWTH', 'value': 65},
    {'name': 'INNOVATION', 'value': 39},
    {'name': 'LOWER INEQUILTY', 'value': 10},
    {'name': 'SUSTAINABLE', 'value': 25},
    {'name': 'RESPONSIBLE LIVING', 'value': 10},
    {'name': 'CLIMATE', 'value': 25},
    {'name': 'LB.WATER', 'value': 44},
    {'name': 'L.B.LAND', 'value': 65},
    {'name': 'PEACE', 'value': 39},
    {'name': 'PARTNERSHIPS', 'value': 10},
    {'name': 'EMPATHY', 'value': 25},
    {'name': 'SOCIETY LAW', 'value': 39},
    {'name': 'TRANSPARENCY', 'value': 10},
    {'name': 'FAMILY PLANING', 'value': 30}
  ]
}

var diameter = 600,
    color = d3.scaleOrdinal(d3.schemeCategory20c);

var colorScale = d3.scaleLinear()
  .domain([0, d3.max(json.children, function(d) {
    return d.value;
  })])
  .range(["rgb(46, 73, 123)", "rgb(71, 187, 94)"]);

var bubble = d3.pack()
  .size([diameter, diameter])
  .padding(5);

var margin = {
  left: 0,
  right: 155,
  top: 0,
  bottom: 0
}

var svg = d3.select('#chart').append('svg')
  .attr('viewBox','0 0 ' + (diameter + margin.right) + ' ' + diameter)
  .attr('width', (diameter + margin.right))
  .attr('height', diameter)
  .attr('class', 'chart-svg');

var root = d3.hierarchy(json)
  .sum(function(d) { return d.value; })
  .sort(function(a, b) { return b.value - a.value; });

bubble(root);

var node = svg.selectAll('.node')
  .data(root.children)
  .enter()
  .append('g').attr('class', 'node')
  .attr('transform', function(d) { return 'translate(' + d.x + ' ' + d.y + ')'; })
  .append('g').attr('class', 'graph');

node.append("circle")
  .attr("r", function(d) { return d.r; })
  .style("fill", function(d) { 
    return color(d.data.name); 
  });

node.append("text")
  .attr("dy", ".3em")
  .style("text-anchor", "middle")
  .text(function(d) { return d.data.value; })
  .style("fill", "#ffffff");

svg.append("g")
  .attr("class", "legendOrdinal")
  .attr("transform", "translate(600,40)");

var legendOrdinal = d3.legendColor()
  .shape("path", d3.symbol().type(d3.symbolSquare).size(150)())
  .shapePadding(10)
  .scale(color);

svg.select(".legendOrdinal")
  .call(legendOrdinal);