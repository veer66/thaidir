<? require 'header.php' ?>
<? require 'project.php' ?>
<?
	$proj=new Project;
?>
<a href="index.php">Archive</a><br>
<font size="+2"><b>List</b></font><br><br>

<table border="0" cellspacing="0" cellpadding="10">

<?
$a=$proj->dump($cat);
foreach ($a as $r) {
  print "<tr><td><a href=\"show.php?projname=$r->name\">$r->name</a></td><td>$r->category / $r->subcategory</td><td>$r->shortdesc</td></tr>\n";
}
print "\n";
?>
</table>
<? require 'footer.php'; ?>
