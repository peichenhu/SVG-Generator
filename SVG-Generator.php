<?php
/**
 * Created by PhpStorm.
 * User: Pich
 * Date: 2017/3/8
 * Time: 11:57
 */
header("Content-Type: text/html;charset=utf-8");
$stime=microtime(true);

$mySVG = $_SERVER['DOCUMENT_ROOT'] .'/images/' . $stime . '.svg';
$SVG = $_SERVER['DOCUMENT_ROOT'] .'/svg/sh.svg';

if(!file_exists($mySVG)){

    //如果用户信息存在，  获取用户信息  和 svg 素材
    $doc = new DOMDocument('1.0', 'utf-8');

    $doc->load($SVG);
    $code = $doc->getElementsByTagName("text");
    $code->item(0)->nodeValue = $stime;

    $images = $doc->getElementsByTagName("image");
    $images->item(0)->setAttribute("xlink:href", $_SERVER['DOCUMENT_ROOT'] . '/svg/' . $images->item(0)->getAttribute("xlink:href"));

    $doc->save($mySVG);
    // 成功生成之后，可以利用其他插件（Imagick）转换成其他格式Jpeg、png24、gif 等。
}



$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值

echo "<br />[页面执行到这里所需时间：{$total} ]秒";

?>