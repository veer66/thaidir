<?
require 'project.php';
$proj=new Project;
$data=$proj->select('wordcut');
print $data->name;
print "\n";
$data=$proj->select('wordcutx');
if ($data) {
  print $data->name;
  print "\n";
} else {
  print "Not found\n";
}
?>