<? require 'header.php' ?>
<a href="add.php">Add new entry</a> &nbsp Let's add your free softwares here.<br>
<br>
<center>
<table border="0" cellspacing="0" cellpadding="10">

<?
require 'shortlist.php';
$proj=new Project;
$a=$proj->dump();
foreach ($a as $r) {
  print "<tr><td><a href=\"show.php?projname=$r->name\">$r->name</a></td><td>$r->category / $r->subcategory</td><td>$r->shortdesc</td></tr>\n";
}
print "\n";
?>
</table>
</center>
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

