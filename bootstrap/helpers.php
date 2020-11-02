<?php

if (! function_exists('toCents')) {
	/**
    * Convert Dollars to Cents.
    *
    * @param  float     $amountInDollars
    * @return int 		$amountInCents
    *
    */

    function toCents($amountInDollars) {
        return intval($amountInDollars * 100);
    }
}

if (! function_exists('toDollars')) {
	/**
    * Convert Cents to Dollars.
    *
    * @param  int 	 	$amountInCents
    * @return string    $amountInDollars
    *
    */

    function toDollars($amountInCents) {
    	// format to two decimals
    	// dd($amountInCents);
    	return number_format($amountInCents / 100, 2);
    }
}