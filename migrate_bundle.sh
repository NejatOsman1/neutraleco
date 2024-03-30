#!/bin/bash

# ###########################################################################
# Run from bundle dir: ./migrate_bundle.sh src/Trinity/FaqBundle
# ###########################################################################

BUNDLESHORT_RAW=$(echo $1 | sed -e 's/Bundle//g')
BUNDLESHORT="$(basename -- $BUNDLESHORT_RAW)"
BUNDLESHORT_LOWER="`echo "$BUNDLESHORT" | awk '{print tolower($0)}'`"

for i in $(find $1 -type f -not -path "*.git*"); do
	if [[ ${i: -5} == ".twig" ]]; then
		# echo "$i"
		sed -i '' -e 's/::override/override/g' "$i"
	fi
	fn="$(basename -- $i)"
	if [[ ${fn: 0:2} != "._" && ${i: -4} != ".png" && ${i: -4} != ".mp3" && ${i: -4} != ".ogg" && ${i: -4} != ".svg" && ${i: -6} != "_Store" && ${i: -4} != ".jpg" && ${i: -4} != ".eot" && ${i: -4} != ".svg" && ${i: -4} != ".ttf" && ${i: -4} != ".gif" && ${i: -5} != ".jpeg" && ${i: -5} != ".woff" && ${i: -6} != ".woff2" && ${i: -7} != ".sketch" ]]; then
		echo "$i"
		sed -i '' -e "s/new TreeBuilder()/new TreeBuilder('trinity_${BUNDLESHORT_LOWER}')/g" "$i"
		sed -i '' -e "s/treeBuilder->root('qinox_${BUNDLESHORT_LOWER}')/treeBuilder->getRootNode()/g" "$i"
		sed -i '' -e "s/treeBuilder->root('trinity_${BUNDLESHORT_LOWER}')/treeBuilder->getRootNode()/g" "$i"
		sed -i '' -e 's/namespace Qinox/namespace App\\Trinity/g' "$i"
		sed -i '' -e 's/bundles\/qinox/bundles\/trinity/g' "$i"
		sed -i '' -e 's/class Qinox/class Trinity/g' "$i"
		sed -i '' -e 's/ \\Qinox/ \\App\\Trinity/g' "$i"
		sed -i '' -e 's/use CmsBundle/use App\\CmsBundle/g' "$i"
		sed -i '' -e 's/new \\Qinox/new \\App\\Trinity/g' "$i"
		sed -i '' -e "s/('Qinox/('Trinity/g" "$i"
		sed -i '' -e 's/param \\Qinox/param \\App\\Trinity/g' "$i"
		sed -i '' -e 's/(\\Qinox/(\\App\\Trinity/g' "$i"
		sed -i '' -e 's/class: Qinox\\/class: \\App\\Trinity\\/g' "$i"
		sed -i '' -e "s/'\/..\/Resources\/config'/'\/..\/config'/g" "$i"
		sed -i '' -e "s/app\/Resources\/views/templates/g" "$i"
		sed -i '' -e 's/"\\CmsBundle/"\\App\\CmsBundle/g' "$i"
		sed -i '' -e 's/(\\CmsBundle/(\\App\\CmsBundle/g' "$i"
		sed -i '' -e 's/ \\CmsBundle/ \\App\\CmsBundle/g' "$i"
		sed -i '' -e 's/"CmsBundle/"App\\CmsBundle/g' "$i"
		sed -i '' -e 's/Qinox/Trinity/g' "$i"
		sed -i '' -e 's/qinox_/trinity_/g' "$i"
		sed -i '' -e 's/|truncate/|u.truncate/g' "$i"
		sed -i '' -e 's/ qinox/ trinity/g' "$i"
		sed -i '' -e 's/repositoryClass="Trinity/repositoryClass="App\\Trinity/g' "$i"
		sed -i '' -e 's/\\FOSRestController/\\AbstractFOSRestController/g' "$i"
		sed -i '' -e 's/ FOSRestController/ AbstractFOSRestController/g' "$i"
		sed -i '' -e "s/this->get('kernel')/this->containerInterface->get('kernel')/g" "$i"
		sed -i '' -e "s/use Trinity/use App\\\Trinity/g" "$i"
		sed -i '' -e "s/Twig_SimpleFunction/Twig\\\TwigFunction/g" "$i"
		sed -i '' -e "s/Twig_SimpleFilter/Twig\\\TwigFilter/g" "$i"
		sed -i '' -e "s/this->container->get('kernel')/this->containerInterface->get('kernel')/g" "$i"
		sed -i '' -e 's/CmsBundle::/@Cms\//g' "$i"
		sed -i '' -e "s/extends \\\Twig_Extension/extends AbstractExtension/g" "$i"
	# else
	# 	echo "$i"
	fi
done;

if [ -d "$1/Resources/config" ]; then
    echo "$FILE exists."
    # echo "mv $1/Resources/config $1/config"
    mv "$1/Resources/config" "$1/config"
fi
if [ -f "$1/Qinox${BUNDLESHORT}Bundle.php" ]; then
    # echo "mv $1/Qinox${BUNDLESHORT}Bundle.php $1/Trinity${BUNDLESHORT}Bundle.php"
    mv "$1/Qinox${BUNDLESHORT}Bundle.php" "$1/Trinity${BUNDLESHORT}Bundle.php"
fi
if [ -f "$1/DependencyInjection/Qinox${BUNDLESHORT}Extension.php" ]; then
    # echo "mv $1/DependencyInjection/Qinox${BUNDLESHORT}Extension.php $1/DependencyInjection/Trinity${BUNDLESHORT}Extension.php"
    mv "$1/DependencyInjection/Qinox${BUNDLESHORT}Extension.php" "$1/DependencyInjection/Trinity${BUNDLESHORT}Extension.php"
fi
