<?

require 'config.php';

class ProjectItem {
  var $name,$shortdesc,$version,$status,$email,$category,
    $homepage,$download,$license,$longdesc,$phrase,$create_time,
    $update_time,$subcategory,$owner;
  function ProjectItem() {
  }
}

class Project {
	function &recent() {
    		global $database;
    		$array=array();
    		$query="select name,category,subcategory,shortdesc from project order by update_time desc limit 0,5";
    		$result=mysql_db_query($database,$query)
      			or die ("Could not query mysql: " . mysql_error() . "\n");
    		while ($row=mysql_fetch_object($result)) {
      			array_push($array,$row);
    		}
    		return $array;
	}

	function &new_rel() {
    		global $database;
    		$array=array();
    		$query="select name,category,subcategory,shortdesc from project order by create_time desc limit 0,5";
    		$result=mysql_db_query($database,$query)
      			or die ("Could not query mysql: " . mysql_error() . "\n");
    		while ($row=mysql_fetch_object($result)) {
      			array_push($array,$row);
    		}
    		return $array;
	}
	
  var $link;

  function Project() {
    global $hostname,$username,$password;
    $link=mysql_pconnect($hostname,$username,$password) 
      or die ("Could not connect mysql: " . mysql_error() . "\n");
  }

  function &dump($cat) {
    global $database;
    $array=array();
    $query="select name,category,subcategory,shortdesc from project where category=\"$cat\" order by name";
    $result=mysql_db_query($database,$query)
      or die ("Could not query mysql: " . mysql_error() . "\n");
    while ($row=mysql_fetch_object($result)) {
      array_push($array,$row);
    }
    return $array;
  }

  function &show($name) {
    global $database;
    $query="select * from project,owner where name=\"$name\" and email=owner_email";
    $result=mysql_db_query($database,$query)
      or die ("Could not query mysql: " . mysql_error() . "\n");
    if ($row=mysql_fetch_object($result)) {
      return $row;
    } else {
      return false;
    }
  }

  function dup_name($name) {
    global $database;
    $query="select name from project where name=\"$name\"";
    $result=mysql_db_query($database,$query)
      or die ("Could not query mysql: " . mysql_error() . "\n");
    return (mysql_num_rows($result)!=0);
  }
   
  function owner_conflict($name,$email) {
    global $database;
    $query="select * from owner where owner_email=\"$email\"";
    $result=mysql_db_query($database,$query)
      or die ("Could not query mysql: " . mysql_error() . "\n");
    if ($row=mysql_fetch_object($result)) {
      if ($row->owner_name != $name) {
	return true;
      }
    }
    return false;
  }

  function valid_phrase($project_name,$phrase) {
    global $database;
    $query="select name from project where name=\"$project_name\" and phrase=password(\"$phrase\")";
    $result=mysql_db_query($database,$query);
    if (!$result) {
      print ("Could not query mysql: " . mysql_error() . "\n");
      return false;
    }
    return (mysql_num_rows($result)>0);

  }
  
  function add($item) {
    global $database;
    $query="insert into project values(" .
      "\"$item->name\"," . 
      "\"$item->shortdesc\"," . 
      "\"$item->version\"," . 
      "\"$item->status\"," . 
      "\"$item->email\"," . 
      "\"$item->category\"," . 
      "\"$item->subcategory\"," . 
      "\"$item->homepage\"," . 
      "\"$item->download\"," . 
      "\"$item->license\"," . 
      "\"$item->longdesc\"," . 
      "password(\"$item->phrase\")," . 
      "\"$item->create_time\"," . 
      "\"$item->update_time\"" . 
      ")";
    //print "-1->$query\n<br>";
    $result=mysql_db_query($database,$query);
    if (!$result) {
      print "Could not query mysql: " . mysql_error() . "\n";  
      return false;
    }

    
    $query="select * from owner where owner_email=\"$item->email\"";
    //print "-2->$query\n<br>";
    $result=mysql_db_query($database,$query);
    if (!$result) {
      print "Could not query mysql: " . mysql_error() . "\n";  
      
      return false;
    }
    if(mysql_num_rows($result)==0) {
      $query="insert into owner values(\"$item->email\",\"$item->owner\")";
      //print "-3->$query\n<br>";
      $result=mysql_db_query($database,$query);
      if (!$result) {
	print "Could not query mysql: " . mysql_error() . "\n";  
	return false;
      } 
    }
    
    return true;
  }

  
  function edit($item) {
    global $database;
    $query="update project set " .
      "shortdesc=\"$item->shortdesc\"," . 
      "version=\"$item->version\"," . 
      "status=\"$item->status\"," . 
      "category=\"$item->category\"," . 
      "subcategory=\"$item->subcategory\"," . 
      "homepage=\"$item->homepage\"," . 
      "download=\"$item->download\"," . 
      "email=\"$item->email\"," . 
      "license=\"$item->license\"," . 
      "longdesc=\"$item->longdesc\"," . 
      "update_time=\"$item->update_time\"" . 
      " where name=\"$item->name\"";
    //print "-1->$query\n<br>";
    $result=mysql_db_query($database,$query);
    if (!$result) {
      print "Could not query mysql: " . mysql_error() . "\n";  
      return false;
    }
    $query="select * from owner where owner_email=\"$item->email\"";
    //print "-2->$query\n<br>";
    $result=mysql_db_query($database,$query);
    if (!$result) {
      print "Could not query mysql: " . mysql_error() . "\n";  
      
      return false;
    }
    if(mysql_num_rows($result)==0) {
      $query="insert into owner values(\"$item->email\",\"$item->owner\")";
      //print "-3->$query\n<br>";
      $result=mysql_db_query($database,$query);
      if (!$result) {
	print "Could not query mysql: " . mysql_error() . "\n";  
	return false;
      } 
    }
 
    return true;
  }
  

}


?>
