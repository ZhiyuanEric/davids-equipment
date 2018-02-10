<?php
/**
csv extracter
*/
class Parser{
    
    function __construct() {
		
    }
	
	function parse_csv($path)
	{//edit this later
		$file = fopen("../application/models/items/category.csv","r");
		//$file = fopen($path);
		$counterRow = 0;
		$acc = array();
		while(!feof($file))
		{
			$acc[$counterRow] = fgetcsv($file); 
			//print_r($acc[$counterRow]);
			$counterRow++;
			//echo "<br><br><br><br><br>";
		}
		
		$counter = 0;
		$counterr = 0;
		while($counter < $counterRow)
		{
			for($i = 0; $i < 3; $i++)
				print_r($acc[$counter][$i]);
			$counter++;
		}
		$counterr = count($acc[0]);
		fclose($file);
	}
}