<? require 'header.php' ?>
<? require_once 'option.php' ?>
<br>
<a href="index.php">Archive</a><br>
<br>
<font size="+2"><b>New entry</b></font><br>

<br><br>

<form method="post" action="confirm.php">
<center>
<table width="80%" cellspacing="0" cellpadding="5" border="0">
<tr>
<td align="right">Project name:</td>
<td><input type="text" size="20" name="project_name">
</tr>

<tr>
<td align="right">Short description:</td>
<td><input type="text" size="30" name="short_desc"><td>
</tr>

<tr>
<td align="right">Version:</td>
<td><input type="text" size="5" name="version"></td>
</tr>

<tr>
<td align="right">Status:</td>
<td>
<select name="status">
<option  value="Planning">Planning</option>
<option  value="Pre Alpha">Pre Alpha</option>
<option  value="Alpha">Alpha</option>
<option  value="Beta">Beta</option>
<option  value="Stable">Stable</option>
<option  value="Mature">Mature</option>
</select>
</tr>


<tr>
<td align="right">Owner:</td>
<td><input type="text" size="20" name="owner_name"></td>
</tr>

<tr>
<td align="right">E-mail address:</td>
<td><input type="text" size="20" name="owner_email"></td>
</tr>

<tr>
<td align="right">Category:</td>
<td><select name="category1">
<? thdir_optgen_def("cat1-list.txt",$r->category); ?>
</select>
/ <input type="text" size="20" name="category2"></td>
</tr>


<tr>
<td align="right">Homepage:</td>
<td><input type="text" size="50" name="homepage"></td>
</tr>


<tr>
<td align="right">Download:</td>
<td> <input type="text" size="50" name="download"></td>
</tr>


<tr>
<td align="right">License:</td>
<td>
<select name="license">
<? thdir_optgen("license-list.txt"); ?>
</select>
</td>

</tr>

<tr>
<td align="right">Description:</td>
<td><textarea rows="5" cols="40" name="long_desc"></textarea></td>

</tr>


<tr>
<td align="right">Pass phrase:</td>
<td><input type="password" size="20" name="pass_phrase1"></td>

</tr>

<tr>
<td align="right">Pass phrase (retype):</td>
<td><input type="password" size="20" name="pass_phrase2"></td>

</tr>

</table>

<input type="submit" value="Submit">
<input type="reset" value="Reset">
</center>
</form>
<? require 'footer.php'; ?>
