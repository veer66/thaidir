# phpMyAdmin MySQL-Dump
# version 2.4.0-rc1
# http://www.phpmyadmin.net/ (download page)
#
# โฮสต์: localhost
# เวลาในการสร้าง: 17 ก.พ. 2003  04:43น.
# รุ่นของเซิร์ฟเวอร์: 3.23.41
# รุ่นของ PHP: 4.0.6
# ฐานข้อมูล : `thaioss`
# --------------------------------------------------------

#
# โครงสร้างตาราง `owner`
#

CREATE TABLE owner (
  owner_email varchar(200) binary NOT NULL default '',
  owner_name varchar(255) binary default NULL,
  PRIMARY KEY  (owner_email)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# โครงสร้างตาราง `project`
#

CREATE TABLE project (
  name varchar(200) binary NOT NULL default '',
  shortdesc varchar(200) binary default NULL,
  version varchar(50) binary default NULL,
  status varchar(250) default NULL,
  email varchar(200) binary default NULL,
  category varchar(200) binary default NULL,
  subcategory varchar(255) NOT NULL default '',
  homepage varchar(250) binary default NULL,
  download varchar(250) binary default NULL,
  license varchar(100) binary default NULL,
  longdesc text,
  phrase varchar(200) binary default NULL,
  create_time datetime NOT NULL default '0000-00-00 00:00:00',
  update_time datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (name)
) TYPE=MyISAM;

