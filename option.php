<?php
function thdir_optgen($filename) {
	$fp=fopen($filename,"r") or die("Could not open file $filename");
	while ($line=fgets($fp,1024)) {
		$opt=chop($line); 
		 print "<option value=\"$opt\">$opt</option>\n"; 
	}
	fclose($fp);
}

function thdir_optgen_def($filename,$default) {
	$fp=fopen($filename,"r") or die("Could not open file $filename");
	while ($line=fgets($fp,1024)) {
		$opt=chop($line); 
		if ($opt==$default) {
			$flag="selected";
		} else {
			$flag="";
		}
		
		print "<option value=\"$opt\" $flag >$opt</option>\n"; 
	}
	fclose($fp);
}



?>
