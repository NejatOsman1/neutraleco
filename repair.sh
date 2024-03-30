#!/bin/bash

echo "Repairing installation (where needed)"

echo
echo "Check 2FA in bundles.php"
echo "	- config/bundles.php"
if grep -q SchebTwoFactorBundle config/bundles.php; then
	echo "		Valid"
else
	echo "		Missing bundle rule, repairing..."
	sed -i'' -e "s/\];/    Scheb\\\TwoFactorBundle\\\SchebTwoFactorBundle::class => ['all' => true],\n\];/" config/bundles.php
fi


echo
echo "Checking symlink: scheb_2fa.yaml (2x)"
echo "	- config/packages/scheb_2fa.yaml"
if [ -L config/packages/scheb_2fa.yaml ] ; then
	if [ -e config/packages/scheb_2fa.yaml ] ; then
		echo "		Valid"
	else
		echo "		Broken link, repairing..."
		# cd config/packages
		rm config/packages/scheb_2fa.yaml
		ln -s ../../src/CmsBundle/scheb_2fa_config.yaml config/packages/scheb_2fa.yaml
	fi
elif [ -e config/packages/scheb_2fa.yaml ] ; then
   echo "		Physical file, repairing..."
   rm config/packages/scheb_2fa.yaml
   ln -s ../../src/CmsBundle/scheb_2fa_config.yaml config/packages/scheb_2fa.yaml
else
   echo "		Missing, repairing..."
   ln -s ../../src/CmsBundle/scheb_2fa_config.yaml config/packages/scheb_2fa.yaml
fi

echo "	- config/routes/scheb_2fa.yaml"
if [ -L config/routes/scheb_2fa.yaml ] ; then
	if [ -e config/routes/scheb_2fa.yaml ] ; then
		echo "		Valid"
	else
		echo "		Broken link, repairing..."
		rm config/routes/scheb_2fa.yaml
		ln -s ../../src/CmsBundle/scheb_2fa_routes.yaml config/routes/scheb_2fa.yaml
	fi
elif [ -e config/routes/scheb_2fa.yaml ] ; then
   echo "		Physical file, repairing..."
   rm config/routes/scheb_2fa.yaml
   ln -s ../../src/CmsBundle/scheb_2fa_routes.yaml config/routes/scheb_2fa.yaml
else
   echo "		Missing, repairing..."
   ln -s ../../src/CmsBundle/scheb_2fa_routes.yaml config/routes/scheb_2fa.yaml
fi

echo
echo "Checking symlink: security.yaml"

echo "	- config/packages/security.yaml"
if [ -L config/packages/security.yaml ] ; then
	if [ -e config/packages/security.yaml ] ; then
		echo "		Valid"
	else
		echo "		Broken link, repairing..."
		rm config/packages/security.yaml
		ln -s ../../src/CmsBundle/scheb_2fa.yaml config/packages/security.yaml
	fi
elif [ -e config/packages/security.yaml ] ; then
   echo "		Physical file, repairing..."
   rm config/packages/security.yaml
   ln -s ../../src/CmsBundle/scheb_2fa.yaml config/packages/security.yaml
else
   echo "		Missing, repairing..."
   ln -s ../../src/CmsBundle/security.yaml config/packages/security.yaml
fi

echo
echo "Remove all caches"

echo "	- Global (prod + dev)"
rm -rf var/cache/prod/* var/cache/dev/*

if [ -d "var/cache/page" ] 
then
	echo "	- Pages"
    rm -rf var/cache/page/*
fi

if [ -d "var/cache/cricital" ] 
then
	echo "	- Critical"
    rm -rf var/cache/cricital/*
fi

if [ -d "var/cache/webshop" ] 
then
	echo "	- Webshop"
    rm -rf var/cache/webshop/*
fi

echo
echo "Composer install (based on current setup)"

${1-php} composer.phar install