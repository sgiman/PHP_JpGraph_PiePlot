<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

$data = array(40,60,21,33);

$graph = new PieGraph(800,800);
$graph->clearTheme();
//$graph->SetShadow();

$graph->title->Set("Example 4 of pie plot");
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);

$p1 = new PiePlot($data);
$p1->value->SetFont(FF_TREBUCHE,FS_BOLD,12);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("Jan","Feb","Mar","Apr","May"));
$graph->Add($p1);

$graph->Stroke();

?>
