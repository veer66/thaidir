#!/bin/sh
pkg="thaidir-`cat VERSION`"
echo $pkg
rm -rf $pkg
mkdir $pkg
cp `cat filelist` $pkg
tar cvvzf $pkg.tar.gz $pkg
