<?php // content="text/plain; charset=utf-8"
/*************************************************************************
 *  piecex8.php
 *  Пример кгруговой дмаграммы с центральным кругом
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

$data = array(40,60,31,35);

// Новая круговая диаграмма
$graph = new PieGraph(250,200);
$graph->clearTheme();
$graph->SetShadow();

// Задать заголовок
$graph->title->Set("Adjusting the label pos");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Установить круговой график
$p1 = new PiePlot($data);

// Настраиваем размер и положение графика
$p1->SetSize(0.4);
$p1->SetCenter(0.5,0.52);

// Устанавливаем метки срезов и перемещаем их на график
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetLabelPos(0.6);

// Наконец добавляем график
$graph->Add($p1);

// ... и отрисовываем его
$graph->Stroke();
