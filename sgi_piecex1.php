<?php header("Content-Type:text/html;charset='utf-8'"); // content="text/plain; charset=utf-8"
/*************************************************************************
 *  piecex1.php
 *  Пример круговой диаграммы с центральным кругом
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

// --- DATA ---
//$data = array(50,28,25,27,31,20);
$data = array(2,1,1,2,3,18);
$fileName = "imagefile.png";

// --- PIE GRAPH ---
$graph = new PieGraph(800,800,'auto');
$graph->clearTheme();

// --- TITLE ---
$graph->title->Set("Pie plot with center circle");
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);
$graph->title->SetMargin(40); // Добавить отступ сверху

// ---- PIE PLOT CIRCLE ---
$p1 = new PiePlotC($data);

// --- SIZE ---
$p1->SetSize(0.32);

// --- MARKERS (FONT & COLOR) ---
$p1->value->SetFont(FF_TREBUCHE,FS_BOLD,10);
$p1->value->SetColor('black');

// --- HEADER CENTRE (MID CIRCLE) ---
$p1->midtitle->Set("Test mid\nRow 1\nRow 2");
$p1->midtitle->SetFont(FF_TREBUCHE,FS_NORMAL,18);

// --- COLOR FOR MID CIRCLE ---
$p1->SetMidColor('yellow');

// --- LEGEND TO % (default) ---
$p1->SetLabelType(PIE_VALUE_PER);

// --- ADD PLOT TO GRAPH ---
$graph->Add($p1);

// .. и отправить изображение в браузер
//$graph->Stroke();

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
