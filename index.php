<? require 'header.php' ?>
<? require 'project.php' ?>
<?
	$proj=new Project;
	$ra=$proj->recent();
	$na=$proj->new_rel();
?>
<a href="add.php">Add new entry</a> &nbsp Let's add your free softwares here.<br>
<br>
<?
	$fp=fopen("cat1-list.txt","r") or die("Could not open file $filename");
	while ($line=fgets($fp,1024)) {
		$opt=chop($line); 
		print "[<a href=\"list.php?cat=$opt\">$opt</a>]\n"; 
	}
	fclose($fp);
?>
<br><br>
Recent Update
<table border="0" cellspacing="0" cellpadding="10">

<?
foreach ($ra as $r) {
  print "<tr><td><a href=\"show.php?projname=$r->name\">$r->name</a></td><td><a href=\"list.php?cat=$r->category\">$r->category</a> / $r->subcategory</td><td>$r->shortdesc</td></tr>\n";
}
print "\n";
?>
</table><br>
New release
<table border="0" cellspacing="0" cellpadding="10">

<?
foreach ($na as $r) {
  print "<tr><td><a href=\"show.php?projname=$r->name\">$r->name</a></td><td><a href=\"list.php?cat=$r->category\">$r->category</a> / $r->subcategory</td><td>$r->shortdesc</td></tr>\n";
}
print "\n";
?>
</table>
<br>
<br>
<a href="http://thaidir.sourceforge.net/dev">Development version - more feature but less stable</a><br>
<a href="http://www.gnu.org/philosophy/free-sw.html">
What is "Free Software"?
</a>
<br>
<a href="https://sourceforge.net/project/showfiles.php?group_id=74218">Download Thaidir Engine</a>
<br><br>
<br>
<? require 'footer.php'; ?>

