#!/bin/bash
set -e

P=`dirname $0`
CFFILE=$P/../distmaker.conf
if [ ! -f $CFFILE ] ; then
	echo "NO DISTMAKER.CONF FILE!"
	exit 1
else
	. $CFFILE
fi
. "$P/common.sh"

SRC=$DM_SOURCEDIR
TRG=$DM_TMPDIR/civicrm

dm_h1 "Prepare files (civicrm-*-wordpress.zip)"
dm_reset_dirs "$TRG" "$TRG/civicrm/civicrm"
cp $SRC/WordPress/civicrm.config.php.wordpress $TRG/civicrm/civicrm/civicrm.config.php
dm_generate_version "$TRG/civicrm/civicrm/civicrm-version.php" Wordpress
dm_install_core "$SRC" "$TRG/civicrm/civicrm"
dm_install_coreext "$SRC" "$TRG/civicrm/civicrm" $(dm_core_exts)
dm_install_packages "$SRC/packages" "$TRG/civicrm/civicrm/packages"
dm_install_vendor "$SRC/vendor" "$TRG/civicrm/civicrm/vendor"
dm_install_bower "$SRC/bower_components" "$TRG/civicrm/civicrm/bower_components"
dm_install_wordpress "$SRC/WordPress" "$TRG/civicrm"
dm_install_cvext com.iatspayments.civicrm "$TRG/civicrm/civicrm/ext/iatspayments"
dm_install_cvext riverlea "$TRG/civicrm/civicrm/ext/riverlea"

dm_h1 "Generate archive (civicrm-*-wordpress.zip)"
cd $TRG
dm_zip $DM_TARGETDIR/civicrm-$DM_VERSION-wordpress.zip *

dm_h1 "Generate archive (civicrm-*-wporg.zip)"

touch "$TRG/civicrm/civicrm/.use-civicrm-setup"
cp "$TRG/civicrm/civicrm/setup/plugins/blocks/opt-in.disabled.php" "$TRG/civicrm/civicrm/setup/plugins/blocks/opt-in.civi-setup.php"
cd "$TRG"
dm_zip $DM_TARGETDIR/civicrm-$DM_VERSION-wporg.zip *

dm_h1 "Clean up"
rm -rf $TRG
