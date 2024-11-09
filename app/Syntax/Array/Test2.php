<?php


$res= array_pad([1,2,3],-5,22); // 22,0,1,2,3
var_dump($res);

$res =array_pad([1,2,3],5,2);
var_dump($res);


$res =array_pad([1,2,3],2,2);
var_dump($res);
