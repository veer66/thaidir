<? require 'header.php'; ?>
<? require 'project.php'; ?>
<?
$item=new ProjectItem;
$item->name=$project_name;
$item->shortdesc=$short_desc;
$item->version=$version;
$item->status=$status;
$item->email=$owner_email;
$item->owner=$owner_name;
$item->category=$category;
$item->subcategory=$subcategory;
$item->homepage=$homepage;
$item->download=$download;
$item->license=$license;
$item->longdesc=$long_desc;
$item->phrase=$phrase;
$item->create_time=date("Y-m-d H:i:s");
$item->update_time=date("Y-m-d H:i:s");
$proj=new Project;
if(!$proj->add($item)) {
  print "<br>Error occur<br>\n";
} else { 
?>
Added<br>
<a href="index.php">Back to Archive</a>
<br>
<? } ?>
<? require 'footer.php'?>
