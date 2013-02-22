<?php
/*
 * @project Math by Sinan Eker
 * @copyright 2013 (c) Sinan Eker
 * @filename Metrics.class.php
 * */
namespace {
  class MetricsException extends Exception {}
}
namespace square {
	use \MetricsException;
	class Metrics {
		public static function _sin($hyp,$oleg){
			return $oleg / $hyp;
		}
		public static function _cos($hyp,$aleg){
			return $aleg / $hyp;
		}
		public static function _tan($oleg,$aleg){
			return $oleg / $aleg;
		}
		public static function _pyth($hyp,$leg1,$leg2){
			return $hyp*$hyp == $leg1*$leg1 + $leg2*$leg2;
		}
		public static function _getHyp($leg1,$leg2){
			$hyp = sqrt($leg1*$leg1 + $leg2*$leg2);
			if(static::_pyth($hyp,$leg1,$leg2)){
				return $hyp;
			}else{
				throw new MetricsException('Wrong legs; Hyp: '.$hyp);
			}
		}
		public static function _getLeg1($hyp,$leg2){
			// a = leg1
			// b = leg2
			// c^2 = a^2 + b^2   |-b^2 
			// c^2 - b^2 = a^2
			// sqrt(c^2 - b^2) = a
			$leg1 = sqrt($hyp*$hyp - $leg2*$leg2);
			if(static::_pyth($hyp, $leg1, $leg2)){
				return $leg1;
			}else{
				throw new MetricsException('Wrong params; Leg1: '.$leg1);
			}
		}
		public static function _getLeg2($hyp,$leg1){
			// a = leg1
			// b = leg2
			// c^2 = a^2 + b^2   |-a^2 
			// c^2 - a^2 = b^2
			// sqrt(c^2 - a^2) = b
			$leg2 = sqrt($hyp*$hyp - $leg1*$leg1);
			if(static::_pyth($hyp, $leg1, $leg2)){
				return $leg2;
			}else{
				throw new MetricsException('Wrong params; Leg2: '.$leg2);
			}
		}
		public static function getLeg1($p,$hyp){
			// a^2 = p * c
			// a = sqrt(p * c)
			return sqrt($p*$hyp);
		}
		public static function getLeg2($q,$hyp){
			// b^2 = q * c
			// b = sqrt(q * c)
			return sqrt($q*$hyp);
		}
		public static function getHeight($q,$p){
			// h^2 = p * q
			// h = sqrt(p * q)
			return sqrt($q*$p);
		}
		public static function getP($h,$q){
			// h^2 = q * p
			// h^2 = q * p   | / q
			// h^2 / q = p
			return $h*$h / $q;
		}
		public static function getQ($h,$p){
			// h^2 = q * p
			// h^2 = q * p   | / p
			// h^2 / p = q
			return static::getP($h,$p); // can use this function, cause it's the same calculation
		}
	}
}
