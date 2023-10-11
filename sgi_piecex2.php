<?php header("Content-Type:text/html;charset='utf-8'"); // content="text/plain; charset=utf-8"
/*************************************************************************
 *  $Id: piecex2.php,v 1.3.2.1 2003/08/19 20:40:12 aditus Exp $
 *  Пример кгруговой диаграммы с центральным кругом
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

// --- DATA ---
$data = array(50,28,25,27,31,20);
$fileName = "imagefile.png";

// --- PIE GRAPH ---
$graph = new PieGraph(800,800,'auto');
$graph->clearTheme();

// Не отображать границу
$graph->SetFrame(false);

// Раскомментируйте эту строку, чтобы добавить тень к границе
// $graph->SetShadow();

// --- TITLE ---
$graph->title->Set("PiePlotC");
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);
$graph->title->SetMargin(40); // добавить отступ сверху

// --- PIE PLOT (CIRCLE) ---
$p1 = new PiePlotC($data);

// --- SIZE ---
$p1->SetSize(0.35);

// FONT & COLOR FOR LABELS
$p1->value->SetFont(FF_TREBUCHE,FS_BOLD,12);
$p1->value->SetColor('white');

$p1->value->Show();

// --- CENTER HEADER (for mid circle)
$p1->midtitle->Set("Test mid\nRow 1\nRow 2");
$p1->midtitle->SetFont(FF_TREBUCHE,FS_NORMAL,14);
// Set color for mid circle
$p1->SetMidColor('yellow');

// --- LABEL TO % (default) ---
// Использование процентных значений в значениях легенды (это также значение по умолчанию)
$p1->SetLabelType(PIE_VALUE_PER);

// Значения массива меток могут иметь форматирование printf().
// Аргумент в пользу форма, в строке будет значение среза (либо процентное, либо абсолютное)
// в зависимости от того, что было указано в SetLabelType() выше.
$lbl = array("adam\n%.1f%%","bertil\n%.1f%%","johan\n%.1f%%",
	     "peter\n%.1f%%","daniel\n%.1f%%","erik\n%.1f%%");
$p1->SetLabels($lbl);

// Раскомментируйте эту строку, чтобы удалить границы вокруг фрагментов
// $p1->ShowBorder(false);

// Добавляем тень к срезам
$p1->SetShadow();

// Разорвать все фрагменты на 15 пикселей
$p1->ExplodeAll(15);

// Добавляем график в круговую диаграмму
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
