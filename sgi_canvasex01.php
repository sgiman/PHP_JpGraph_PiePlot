<?php // content="text/plain; charset=utf-8"
/*************************************************************************
 * $Id: canvasex01.php,v 1.3 2002/10/23 08:17:23 aditus Exp $
 *  КАНВАС, ТЕКСТ, ШРИФТ
 *************************************************************************
 * Modified by sgiman @ 2023-10
 */
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_canvas.php');

// Настройте базовый холст, с которым мы сможем работать
$g = new CanvasGraph(400,300,'auto');
$g->SetMargin(5,11,6,11);
//$g->SetShadow();
//$g->SetMarginColor("teal");

// Нам нужно обвести область графика и поля, прежде чем добавлять
// текст, так как в противном случае мы бы перезаписали текст.
//$g->InitFrame();

//----------------------------------
// Рисуем текстовое поле посередине
//----------------------------------
// TTF Font families:
// FF_COURIER
// FF_VERDANA
// FF_TIMES
// FF_COMIC
// FF_ARIAL
// FF_GEORGIA
// FF_TREBUCHE
//----------------------------------
// Hebrew fonts
// FF_DAVID
// FF_MIRIAM
// FF_AHRON
//----------------------------------
// Dejavu-fonts http://sourceforge.net/projects/dejavu
// FF_DV_SANSSERIF
// FF_DV_SERIF
// FF_DV_SANSSERIFMONO
// FF_DV_SERIFCOND
// FF_DV_SANSSERIFCOND

$txt="This\nis\na TEXT!!!";
$t = new Text($txt, 200, 50);

//$t->SetFont(FF_ARIAL,FS_BOLD,40);
//$t->SetFont(FF_COMIC,FS_BOLD,40);
//$t->SetFont(FF_VERDANA,FS_BOLD,40);
//$t->SetFont(FF_TREBUCHE,FS_BOLD,40);

$t->SetFont(FF_COMIC,FS_BOLD,40);


// Как текстовое поле должно интерпретировать координаты?
$t->Align('center','top');

// Как должен быть выровнен абзац?
$t->ParagraphAlign('center');

// Добавляем рамку вокруг текста, белую заливку, черную рамку и серую тень
//$t->SetBox("white","black","gray");

// Вывод текста
$t->Stroke($g->img);

// Вывод графики
$g->Stroke();
