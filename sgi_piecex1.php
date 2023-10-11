<?php header("Content-Type:text/html;charset='utf-8'"); // content="text/plain; charset=utf-8"
/*************************************************************************
 *  piecex1.php
 *  Пример круговой дмаграммы с центральным кругом
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

// Некоторые данные
//$data = array(50,28,25,27,31,20);
$data = array(2,1,1,2,3,18);
$fileName = "imagefile.png";

// Новая круговая диаграмма
$graph = new PieGraph(300,300,'auto');

// Задать заголовок
$graph->title->Set("Pie plot with center circle");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,14);
$graph->title->SetMargin(8); // Add a little bit more margin from the top

// Создать круговой график
$p1 = new PiePlotC($data);

// Установить масштаб круговой диаграммы
$p1->SetSize(0.32);

// Установить цвет и фонт для маркеров (label)
$p1->value->SetFont(FF_ARIAL,FS_BOLD,10);
$p1->value->SetColor('black');

// Задать заголовок в центре внутреннего круга
$p1->midtitle->Set("Test mid\nRow 1\nRow 2");
$p1->midtitle->SetFont(FF_ARIAL,FS_NORMAL,10);

// Задать цвет для вонутреннего круга
$p1->SetMidColor('yellow');

// Используйте процентные значения в значениях легенды
// (это также значение по умолчанию).
$p1->SetLabelType(PIE_VALUE_PER);

// Дабавить график в круговую диаграмму
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
