<?php
/*
*      Copyright (c) 2014-2015 Chi Hoang 
*      All rights reserved
*/
require_once '/usr/share/php5/PEAR/PHPUnit/Autoload.php';
require_once("fastpm.php");

class unittest extends PHPUnit_Framework_TestCase
{   
  public function testexample1()
  {
    $tree = new  Fastpm\Fastpm();
    $tree->add ("a");
    $tree->add ("ab");
    $tree->add ("bab");
    $tree->add ("bc");
    $tree->add ("bca");
    $tree->add ("c");
    $tree->add ("caa");
    echo $tree->match ("abccab");
    $this->expectOutputString("ab,a,bc,c,c,ab,a"); 
  }
  
  public function testexample2()
  {
    $tree = new Fastpm\Fastpm();
    $tree->add("bot");
    $tree->add("otis");
    $tree->add("ott");
    $tree->add("otto");
    $tree->add("tea");
    echo $tree->match("botttea");
    $this->expectOutputString("bot,ott,tea");
  }
  
  public function testexample3()
  {
    $tree = new Fastpm\Fastpm();
    $tree->add("he");
    $tree->add("she");
    $tree->add("his");
    $tree->add("hers");
    echo $tree->match("ushers");
    $this->expectOutputString("she,hers,he");
  }
  
  public function testexample4()
  {
    $tree = new Fastpm\Fastpm();
    $tree->add("ananas");
    $tree->add("antani");
    $tree->add("assassin");
    echo $tree->match ("banananassata");
    $this->expectOutputString("ananas");
  }
  
  public function testexample5()
  {
    $tree = new Fastpm\Fastpm();
    $tree->add("fast");
    $tree->add("sofa");
    $tree->add("so");
    $tree->add("take");
    echo $tree->match("takesofasofastfassofatakesossosofastakeso");
    $this->expectOutputString("take,sofa,so,sofa,so,fast,sofa,so,take,so,so,sofa,so,fast,take,so");
  }
  
  public function testexample6()
  {
    $tree = new Fastpm\Fastpm ();
    $tree->add ("bc");
    $tree->add ("abc");
    echo $tree->match ("tabc");
    $this->expectOutputString("abc,bc");
  }
  
}
?>