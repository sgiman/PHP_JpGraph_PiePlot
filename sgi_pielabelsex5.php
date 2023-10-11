<?php // content="text/plain; charset=utf-8"
/*************************************************************************
 *  sgi_pielabelsex5.php
 *  КРУГОВАЯ ДИАГРАММА С ВЫНОСКАМИ
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_pie.php");

// Некоторые данные и метки
$data   = array(19,12,4,7,3,12,3);
$labels = array("First\n(%.1f%%)",
                "Second\n(%.1f%%)","Third\n(%.1f%%)",
                "Fourth\n(%.1f%%)","Fifth\n(%.1f%%)",
                "Sixth\n(%.1f%%)","Seventh\n(%.1f%%)");

// Создать круговую диаграмму
$graph = new PieGraph(800,800);
$graph->clearTheme();
//$graph->SetShadow();

// Задать заголовок для графика
$graph->title->Set('String labels with values');
$graph->title->SetFont(FF_TREBUCHE,FS_BOLD,24);
$graph->title->SetColor('black');
$graph->title->SetMargin(40);   // отступ сверху

// Создать круговой график
$p1 = new PiePlot($data);
$p1->SetCenter(0.5,0.5);
$p1->SetSize(0.3);

// Настройка меток, которые будут отображаться
$p1->SetLabels($labels);

// Этот метод регулирует положение меток.
// Это дается в виде дробей радиуса круговой диограммы.
// Значение < 1 поместит центр метки внутри круговой диаграммы
// и значение >= 1 выведет центр метки за пределы круговой диаграммы.
// Круг: по умолчанию метка располагается на отметке 0,5 в середине каждого среза.
$p1->SetLabelPos(1);

// Настраиваем форматы меток и какое значение
// мы хотим отображать (абсолютное) или процент.
$p1->SetLabelType(PIE_VALUE_PER);
$p1->value->Show();
$p1->value->SetFont(FF_TREBUCHE,FS_BOLD,16);
$p1->value->SetColor('darkgray');

// Добавить и отрисовать
$graph->Add($p1);
$graph->Stroke();
