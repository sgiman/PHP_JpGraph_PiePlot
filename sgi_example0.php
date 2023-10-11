<?php // content="text/plain; charset=utf-8"
/**************************************************
 * sunspotsex1.php
 * Simple chart (Graph Line).
 * Вывод изображения в браузер и сохранение в файле
 * -------------------------------------------------
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

// Some data
$ydata = array(11,3,8,12,5,1,9,13,5,7);
$fileName = "imagefile.png";

// Создать диаграмму (Graph). Эти два вызова всегда необходимы
$graph = new Graph(400,300);
$graph->SetScale('textlin');

// Создать линейный график (lineplot)
$lineplot=new LinePlot($ydata);
$lineplot->SetColor('blue');

// Добавить график к диаграмме
$graph->Add($lineplot);

// Отображение графика
// $graph->Stroke(); // only to browser
// $graph->Stroke("$fileName"); // only to file

//------------------------------------------
// Передать изображение в файл и в браузер
//------------------------------------------
// По умолчанию используется PNG,
// поэтому используйте суффикс ".png"
//$fileName = "/tmp/imagefile.png";
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
$graph->img->Stream($fileName);

//------------------------------------------------
// Отправляем его обратно в браузер
// Обновить браузер принудительно:
// <img src="myimagescript.php?dummy=\'.now().">
//------------------------------------------------
$graph->img->Headers();
$graph->img->Stream();
