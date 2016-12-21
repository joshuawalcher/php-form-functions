/**
* Build the HTML for a select box in a bootstrap environment
*
* @param The name and ID to use for the select box
* @array An array of keys (which goes between the option tags) and values (value of option)
* @param Which of the values should be selected, if any, in the generated HTML
*/
function BuildSelectBox($name,$keysAndValuesArray,$selectedValue="")
{
	//Values are what the option's value is set to. Keys are what the option displays in the box - its label
	$html = "<select class='form-control' id='$name' name='$name'>";
	foreach ($keysAndValuesArray as $key=>$value) {
		if ($value == $selectedValue) {
			$html .= "<option value='$value' selected>$key</option>";
		} else {
			$html .= "<option value='$value'>$key</option>";
		}
	}
	$html .= '</select>';
  	return $html;
}

/**
* Clean a string that has been given to us from form input
*
* @param string The string to clean
* @return string The cleaned string
*/
function CleanString($string)
{
	$strip = stripslashes($string);
  	$trim = trim($clean);
	return $trim;
}

/**
* Format a string to only contain a string of numbers with no spaces - used for phone numbers to make sure they are valid
*
* @param string The string to format 
* @return string The formatted string
*/
function stripAllButIntegers($string)
{
	return preg_replace("/[^0-9]/","",(string)$string);
}

/**
* Format a number using the configured decimal and thousand tokens to an optional number of decimal places
*
* @param mixed The number to format
* @param int The number of decimal places to format the number to. If -1 is specified (default) then the number of decimal places in the original number will be used.
* @return string The formatted number
*/
function FormatNumber($number, $decimalPlaces = -1)
{
	// drop off any excess zeroes in the fractional component
	$number /= 1;

	if ($decimalPlaces == -1) {
		if (strrchr($number, '.')) {
			$decimalPlaces = strlen(strrchr($number, '.')) - 1;
		}
	}

	if ($decimalPlaces < 0) {
		$decimalPlaces = 0;
	}

	$number = number_format($number, $decimalPlaces, GetConfig('DimensionsDecimalToken'), GetConfig('DimensionsThousandsToken'));

	return $number;
}
