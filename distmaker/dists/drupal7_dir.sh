#!/bin/bash
set -e

P=`dirname $0`
CFFILE=$P/../distmaker.conf
if [ ! -f $CFFILE ] ; then
  echo "NO DISTMAKER.CONF FILE! Make sure all parameters are defined elsewhere"
else
  . $CFFILE
fi
. "$P/common.sh"

SRC=$DM_SOURCEDIR
TRG=$DM_TMPDIR/civicrm

if [ -z $DM_PACKAGESDIR ] ; then
  DM_PACKAGESDIR="$SRC/packages"
fi

if [ -z $DM_DRUPALDIR ] ; then
  DM_DRUPALDIR="$SRC/drupal"
fi

dm_h1 "Prepare files (civicrm-*-drupal dir)"
dm_reset_dirs "$TRG"
cp $DM_DRUPALDIR/civicrm.config.php.drupal $TRG/civicrm.config.php
dm_generate_version "$TRG/civicrm-version.php" Drupal
dm_install_core "$SRC" "$TRG"
dm_install_coreext "$SRC" "$TRG" $(dm_core_exts)
dm_install_packages $DM_PACKAGESDIR "$TRG/packages"
dm_install_vendor "$SRC/vendor" "$TRG/vendor"
dm_install_bower "$SRC/bower_components" "$TRG/bower_components"
dm_install_drupal "$DM_DRUPALDIR" "$TRG/drupal"
dm_install_cvext com.iatspayments.civicrm "$TRG/ext/iatspayments"
dm_install_cvext riverlea "$TRG/ext/riverlea"

dm_h1 "Generate archive (civicrm-*-drupal dir)"
cd $TRG
rm -r $DM_OUTPUTDIR/*
mv * $DM_OUTPUTDIR

dm_h1 "Clean up"
rm -rf $TRG
