#!/bin/bash

VERSION=$1

if [ -z "$VERSION" ]; then
	echo "WARNING: No version given."
else

	echo "Creating version $1..."

	# Push existing commits on sf5
	git push

	echo $1 > ./VERSION
	git log --pretty="%h" -n1 HEAD >> ./VERSION
	git log --pretty="%H" -n1 HEAD >> ./VERSION
	git log --pretty="%ci" -n1 HEAD >> ./VERSION
	git describe --tags --abbrev=0 >> ./VERSION

	# Add, commit and push version file
	git add VERSION
	git commit -m "Prepare for version $1"
	git push

	# Start release
	git flow release start "$VERSION"

	# Finish release
	git flow release finish -m "Created_version_$VERSION" "$VERSION"

	git push origin "$VERSION"

	# Push master and return to sf5
	git push

git checkout master
git push

	git checkout sf5
fi
