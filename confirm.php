<? require 'header.php'; ?>
<? require 'project.php'; ?>

<font size="+2"><b>Confirm</b></font><br><br><br>

<?
function error_occur($str) {
  print "$str";
  print "<br>Error occur please back to previous page and correct it.<br>\n";
  exit();
}
?>


<?
/* perform checking */

if (!preg_match("/[A-Za-z_\-]+/",$project_name)) {
  error_occur("Project name accept string [A-Za-z_\-]+\n");

}

$proj=new Project;
if ($proj->dup_name($project_name)) {
  error_occur("Project name \"$project_name\" has been used.\n");
}

if ($project_name=="") {
  error_occur("Project name is required.");
}

if ($owner_name=="") {
  error_occur("Owner name is required.");
}

if ($owner_email=="") {
  error_occur("Owner e-mail address is required.");
}

if ($short_desc=="") {
  error_occur("Short description is required.");
}

if ($version=="") {
  error_occur("Version is required.");
}

if ($owner_name=="") {
  error_occur("Owner name is required.");
}

if ($owner_email=="" && !preg_match("/[^\"]+@[^\"]+/",$owner_email)) {
  error_occur("Owner e-mail is required.");
}

if ($proj->owner_conflict($owner_name,$owner_email)) {
  error_occur("Owner e-mail and name is conflict.");
}

if ($category2 == "") {
  error_occur("Category is required.");
}

if (!($pass_phrase1!="" and ($pass_phrase1 == $pass_phrase2))) {
  echo "-$pass_phrase1-\n";
  echo "-$pass_phrase2-\n";
  error_occur("Pass phrases are not match.");
}



//$update=date("Y-m-d H:i:s");


?>
<center>
<table border="0" cellspacing="0" cellpadding="5">

<tr>
<td align="right">Project name:<td>
<td><? echo $project_name; ?></td>
</tr>

<tr>
<td align="right">Short description:<td>
<td><? echo $short_desc; ?></td>
</tr>

<tr>
<td align="right">Version:<td>
<td><? echo $version; ?></td>
</tr>

<tr>
<td align="right">Status:<td>
<td><? echo $status; ?></td>
</tr>

<tr>
<td align="right">Owner name:<td>
<td><? echo $owner_name; ?></td>
</tr>

<tr>
<td align="right">Owner e-mail:<td>
<td><? echo $owner_email; ?></td>
</tr>

<tr>
<td align="right">Category:<td>
<td><? 
$category = "$category1 / $category2";
echo $category;
?></td>
</tr>

<tr>
<td align="right">Homepage:<td>
<td><? echo $homepage; ?></td>
</tr>


<tr>
<td align="right">Download:<td>
<td><? echo $download; ?></td>
</tr>

<tr>
<td align="right">License:<td>
<td><? echo $license; ?></td>
</tr>

<tr>
<td align="right">Description:<td>
<td><? echo $long_desc; ?></td>
</tr>

</table>
<form method="post" action="addit.php">
<input type="hidden" name="project_name" value="<? echo $project_name; ?>">
<input type="hidden" name="short_desc" value="<? echo $short_desc; ?>">
<input type="hidden" name="version" value="<? echo $version; ?>">
<input type="hidden" name="status" value="<? echo $status; ?>">
<input type="hidden" name="owner_name" value="<? echo $owner_name; ?>">
<input type="hidden" name="owner_email" value="<? echo $owner_email; ?>">
<input type="hidden" name="category" value="<? echo $category1; ?>">
<input type="hidden" name="subcategory" value="<? echo $category2; ?>">
<input type="hidden" name="homepage" value="<? echo $homepage; ?>">
<input type="hidden" name="download" value="<? echo $download; ?>">
<input type="hidden" name="license" value="<? echo $license; ?>">
<input type="hidden" name="long_desc" value="<? echo $long_desc ?>">
<input type="hidden" name="phrase" value="<? echo $pass_phrase1 ?>">
<input type="submit" value="Confirm">
</form>
</center>
<? require 'footer.php'; ?>
