<?php
/***************************************************************
*
*  (c) 2015 Chi Hoang (info@chihoang.de)
*  All rights reserved
*  
***************************************************************/

require_once ( "fastpm.php" );

//////////////////////////////
//$tree = new Fastpm\Fastpm ();
//$tree->add ("a");
//$tree->add ("ab");
//$tree->add ("bab");
//$tree->add ("bc");
//$tree->add ("bca");
//$tree->add ("c");
//$tree->add ("caa");
//echo $tree->match ("abccab");

//////////////////////////////
//$tree = new Fastpm\Fastpm ();
//$tree->add ("bc");
//$tree->add ("abc");
//echo $tree->match("tabc");

//////////////////////////////
//$tree = new Fastpm\Fastpm ();
//$tree->add("ananas");
//$tree->add("antani");
//$tree->add("assassin");
//echo $tree->match ("banananassata");

//////////////////////////////  
//$tree = new Fastpm\Fastpm ();
//$tree->add("he");
//$tree->add("she");
//$tree->add("his");
//$tree->add("hers");
//echo $tree->match ("ushers");

//////////////////////////////  
//$tree = new Fastpm\Fastpm ();
//$tree->add("bot");
//$tree->add("otis");
//$tree->add("ott");
//$tree->add("otto");
//$tree->add("tea");
//echo $tree->match("botttea");

$tree = new Fastpm\Fastpm ();
$tree->add("fast");
$tree->add("sofa");
$tree->add("so");
$tree->add("take");
echo $tree->match("takesofasofastfassofatakesossosofastakeso");

?>