<?php header("Content-Type:text/html;charset='utf-8'"); // content="text/plain; charset=utf-8"
/*************************************************************************
 * $Id: piec_csimex1.php,v 1.1.2.1 2003/10/09 21:05:39 aditus Exp $
 *  Пример кгрурговой дмаграммы с центральным кругом
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

// Некоторые данные
$data = array(50,28,25,27,31,20);
$fileName = "imagefile.png";

// Новая круговая диаграмма
$graph = new PieGraph(450,450);

// Если вам не нужна граница, просто раскомментируйте эту строку
// $graph->SetFrame(false);

// Раскомментируйте эту строку, чтобы добавить тень к границе.
// $graph->SetShadow();

// Setup title
$graph->title->Set("CSIM Center Pie plot ex 1");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,18);
$graph->title->SetMargin(8); // Add a little bit more margin from the top

// Создать круговую диаграмму
$p1 = new PiePlotC($data);

// Установить радиус круговой диаграммы (как часть размера изображения)
$p1->SetSize(0.32);

// Немного переместить центр круга к верху изображения.
$p1->SetCenter(0.5,0.45);

// Настройка шрифта и цвета этикетки (label)
$p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
$p1->value->SetColor('white');

// Установить заголовок в центральном круге
$p1->midtitle->Set("Test mid\nRow 1\nRow 2");
$p1->midtitle->SetFont(FF_ARIAL,FS_NORMAL,14);

// Установить цвет для среднего круга
$p1->SetMidColor('yellow');

// Использовать процентные значения в значениях легенды (это также значение по умолчанию).
$p1->SetLabelType(PIE_VALUE_PER);

// Значения массива меток могут иметь форматирование printf().
// Аргумент в пользу формы, в строке будет значение среза
// (либо процентное, либо абсолютное) в зависимости от того,
// что было указано в SetLabelType() выше.
$lbl = array("adam\n%.1f%%","bertil\n%.1f%%","johan\n%.1f%%",
	     "peter\n%.1f%%","daniel\n%.1f%%","erik\n%.1f%%");
$p1->SetLabels($lbl);

// Раскомментируйте эту строку, чтобы удалить границы вокруг фрагментов.
// $p1->ShowBorder(false);

// Добавить тень к фрагментам
$p1->SetShadow();

// Разорвать все фрагменты на 15 пикселей
$p1->ExplodeAll(15);

// Настроить цели CSIM
$targ=array("piec_csimex1.php#1","piec_csimex1.php#2","piec_csimex1.php#3",
	    "piec_csimex1.php#4","piec_csimex1.php#5","piec_csimex1.php#6");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$p1->SetCSIMTargets($targ,$alts);
$p1->SetMidCSIM("piec_csimex1.php#7","Center");


// Дабавить небольшой справочный текст на изображении.
$txt = new Text("Note: This is an example of image map. Hold\nyour mouse over the slices to see the values.\nThe URL just points back to this page");
$txt->SetFont(FF_FONT1,FS_BOLD);
$txt->SetPos(0.5,0.97,'center','bottom');
$txt->SetBox('yellow','black');
$txt->SetShadow();
$graph->AddText($txt);

// Добавить график в круговую диаграмму
$graph->Add($p1);

// .. и отправить изображение только в браузер
//$graph->StrokeCSIM();

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
