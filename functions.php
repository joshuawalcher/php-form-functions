function BuildSelectBox($name,$keysAndValuesArray,$selectedValue="")
{
	//Values are what the option's value is set to. Keys are what the option displays in the box - its label
	$html = "<select class='form-control' id='$name' name='$name'>";
	foreach ($keysAndValuesArray as $key=>$value) {
		if ($value == $selected) {
			$html .= "<option value='$value' selected>$key</option>";
		} else {
			$html .= "<option value='$value'>$key</option>";
		}
	}
	$html .= '</select>';
  return $html;
}

function CleanString($string)
{
	$strip = stripslashes($string);
  $clean = $mysqli->real_escape_string($strip);
  $trim = trim($clean);
	return $trim;
}