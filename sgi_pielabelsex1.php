<?php header("Content-Type:text/html;charset='utf-8'"); // content="text/plain; charset=utf-8"
/*************************************************************************
 *  sgi_pielabelsex1.php
 *  КРУГОВАЯ ДИАГРАММА С ВЫНОСКАМИ
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

$data = array(19,12,4,3,3,12,3,3,5,6,7,8,8,1,7,2,2,4,6,8,21,23,2,2,12);

// Создать круговую диаграмму
$graph = new PieGraph(800,800);
$graph->clearTheme();

// Задать заголовок для графика
$graph->title->Set("Label guide lines");
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);
$graph->title->SetColor("black");
$graph->legend->Pos(0.1,0.2);
$graph->title->SetMargin(40); // добавить отступ сверху

// Создать круговой график
$p1 = new PiePlot($data);
$p1->SetCenter(0.5,0.55);
$p1->SetSize(0.3);

// Разрешить и установить guide-lines
$p1->SetGuideLines();
$p1->SetGuideLinesAdjust(1.4);
$p1->SetColor('black');

// Yстановить метки (labels)
$p1->SetLabelType(PIE_VALUE_PER);
$p1->value->Show();
$p1->value->SetFont(FF_TREBUCHE,FS_NORMAL,12);
$p1->value->SetFormat('%2.1f%%');
$p1->value->SetColor('black');

// Добавить и отрисовать
$graph->Add($p1);
$graph->Stroke();
