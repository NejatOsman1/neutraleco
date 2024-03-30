#!/bin/bash

VERSION=$1

if [ -z "$VERSION" ]; then
	echo "WARNING: No version given."
else

	echo "Updating to version $1..."
	echo ""

	echo "Creating CMS backup ..."
	tar -cvzf cms.tar.gz src/CmsBundle

	echo "Creating database backup ..."
	bin/console trinity:db:backup
	cd src/CmsBundle

	echo "Retrieve available versions ..."
	git fetch --tags

	echo "Checkout desired version ..."
    git checkout "tags/$VERSION"

	echo "Updating database ..."
	cd ../..
	bin/console d:s:u --force

	echo "Clearing cache ..."
	rm -rf var/cache/prod/*
	rm -rf var/cache/dev/*

	echo ""
	echo "Done! Updated to version $VERSION"
fi