<?
require 'header.php';
require 'project.php';
?>
<? require_once 'option.php' ?>
<a href="index.php">Archive</a><br>
<font size="+2"><b>Edit</b></font><br><br>
<?
$proj=new Project;
$r=$proj->show($projname);
if ($r) {
?>
<center>
<form action="confirm_edit.php" method="post">
<table border="0" cellspacing="0" cellpadding="5">
<tr><td align="right">Category:</td><td>
<? echo $r->category; ?>
/
<? echo $r->subcategory; ?>
</td></tr>
<tr><td align="right">Project name:</td><td>
<? echo $r->name; ?>
<input type="hidden" name="project_name" value="<? echo $r->name; ?>">
</td></tr>
<tr><td align="right">Short description:</td><td>
<input type="input" size="40" name="short_desc" value="<? echo $r->shortdesc; ?>">
</td></tr>
<tr><td align="right">Version:</td><td><? echo $r->version; ?>
<input type="hidden" name="version" value="<? echo $r->version; ?>">
</td></tr>


<tr><td align="right">Status:</td>
<td>
<select name="status">
<option  value="Planning" <? if ($r->status=="Planning") { echo "selected"; } ?> >Planning</option>
<option  value="Pre Alpha" <? if ($r->status=="Pre Alpha") { echo "selected"; } ?> >Pre Alpha</option>
<option  value="Alpha" <? if ($r->status=="Alpha") { echo "selected"; } ?>  >Alpha</option>
<option  value="Beta" <? if ($r->status=="Beta") { echo "selected"; } ?>  >Beta</option>
<option  value="Stable" <? if ($r->status=="Stable") { echo "selected"; } ?>  >Stable</option>
<option  value="Mature" <? if ($r->status=="Mature") { echo "selected"; } ?>  >Mature</option>
</select>
</td></tr>
<tr><td align="right">Owner:</td>
<td>
Name:<input name="owner_name" type="text" value="<? echo $r->owner_name; ?>" size="30">
<br>
E-mail:
<input name="owner_email" type="text" value="<? echo $r->owner_email; ?>" size="30">
</td>

<tr>
<td align="right">Category:</td>
<td><select name="category1">
<? thdir_optgen_def("cat1-list.txt",$r->category); ?>
</select>
/ <input type="text" size="20" name="category2" value="<? echo $r->subcategory; ?>"></td>
</tr>



</tr>
<tr><td align="right">Homepage:</td><td>
<input name="homepage" size="40" value="<? echo $r->homepage; ?>">
</td></tr>
<tr><td align="right">Download:</td><td>
<input name="download" size="40" value="<? echo $r->download; ?>">
</td></tr>


<tr>
<td align="right">License:</td>
<td>
<select name="license">
<? thdir_optgen_def("license-list.txt",$r->license); ?>
</select>
</td>

</tr>


<tr><td align="right">Description:</td><td>
<textarea name="long_desc" rows="4" cols="40">
<? echo $r->longdesc; ?>
</textarea>
</td></tr>

</table>
Pharse pass:<input type="password" value="" name="pass_phrase" size="20">
<input type="submit" value="Update">
</center> 
</form>
<?
} else {
?> 
Project is not found
<?
}
?>
<? require 'footer.php'; ?>
