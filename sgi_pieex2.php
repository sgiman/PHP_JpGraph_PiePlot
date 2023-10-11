<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

// Some data
$data = array(40,21,17,14,23);

// Create the Pie Graph.
$graph = new PieGraph(800,800);
$graph->clearTheme();
//$graph->SetShadow();

// Set A title for the plot
$graph->title->Set("Example 2 Pie plot");
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);
$graph->title->SetMargin(40); // добавить отступ сверху

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Jan","Feb","Mar","Apr","May","Jun","Jul"));
$graph->Add($p1);
$graph->Stroke();
