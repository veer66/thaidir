<?
require 'header.php';
require 'project.php';
?>
<a href="index.php">Archive</a><br>
<font size="+2"><b>Delete</b></font><br><br>
<?
$proj=new Project;
$r=$proj->show($projname);
if ($r) {
?>
<center>
<table border="0" cellspacing="0" cellpadding="5">
<tr><td align="right">Category:</td><td>
<? echo $r->category; ?>
/
<? echo $r->subcategory; ?>
</td></tr>
<tr><td align="right">Project name:</td><td><? echo $r->name; ?></td></tr>
<tr><td align="right">Short description:</td><td><? echo $r->shortdesc; ?></td></tr>
<tr><td align="right">Version:</td><td><? echo $r->version; ?></td></tr>
<tr><td align="right">Status:</td><td><? echo $r->status; ?></td></tr>
<tr><td align="right">Last update:</td><td><? echo $r->update_time; ?></td></tr>
<tr><td align="right">Owner:</td>
<td>
<? echo $r->owner_name; ?>
&nbsp
&lt;<? echo $r->email; ?>&gt
</td>
</tr>
<tr><td align="right">Homepage:</td><td><? echo $r->homepage; ?></td></tr>
<tr><td align="right">Download:</td><td><? echo $r->download; ?></td></tr>
<tr><td align="right">Description:</td><td><? echo $r->longdesc; ?></td></tr>

</table>
</center> 
<?
} else {
?> 
Project is not found
<?
}
?>
<? require 'footer.php'; ?>