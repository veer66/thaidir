#!/bin/sh
pkg="thaidir-`cat VERSION`"
echo $pkg
rm -rf $pkg
mkdir $pkg
cp *.php $pkg
cp config.php.tmp $pkg
cp config.php.tmp $pkg/config.php
cp dist.sh $pkg
cp VERSION $pkg
cp AUTHORS $pkg
cp COPYING $pkg
cp logo.png $pkg
cp *.sql $pkg
cp *-list.txt $pkg
cp ChangeLog $pkg
cp TODO $pkg
tar cvvzf $pkg.tar.gz $pkg
