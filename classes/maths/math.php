<?php
/*
 * @category  Push data to database
 * @package   add/product
 * @file      product-post.php
 * @data      26/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
 * @description This file deals with an functionlity for modifiying numbers not built standard php
*/

class Maths{

	/* Truncate a number without rounding to two decimals*/
	function truncate_number( $number, $precision = 2)
	{
	    // Are we negative?
	    $negative = $number / abs($number);
	    // Cast the number to a positive to solve rounding
	    $number = abs($number);
	    // Calculate precision number for dividing / multiplying
	    $precision = pow(10, $precision);
	    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
	    return floor( $number * $precision ) / $precision * $negative;
	}

}//Close class
?>
