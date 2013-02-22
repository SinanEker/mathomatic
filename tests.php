<?php

/*
 * @project Math by Sinan Eker
 * @copyright 2013 (c) Sinan Eker
 * @filename tests.php
 * */

require_once 'src/Metrics.class.php';
require_once 'src/Service/Service.class.php';
Service::gzip(function($render){
  return $render->gzip('json');
});
use \square\Metrics;
$m = new Metrics();

// hyp: 31.25
// leg1: 8.75
// leg2: 30
// height: 38.7298334621
// p: 50.0000000001
// q: 30


var_dump(Metrics::_getLeg2(31.25,8.75)); // float(30)
var_dump(Metrics::_getLeg1(31.25,30)); // float(8.75)
var_dump(Metrics::_getHyp(8.75,30)); // float(31.25)
var_dump(Metrics::getHeight(30,50)); // float(38.7298334621)
var_dump(Metrics::getP(38.7298334621,30)); // float(50.0000000001) // rounded 50
var_dump(Metrics::getQ(38.7298334621,50.0000000001)); // float(30) 
