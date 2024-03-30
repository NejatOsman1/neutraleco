#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
DIR_ROOT="${DIR/\/src\/CmsBundle/}"
PHPEXEC="/usr/local/bin/php74"

# Check if RUNNING file already exists
if [ -f "$DIR_ROOT/var/cache/RUNNING" ]; then
	# It exists, now check if it's stale
	if test "`find $DIR_ROOT/var/cache/RUNNING -mmin +480`"; then
		# Found RUNNING file older then 480 minutes (8 hours), remove it
	    echo "[`date '+%Y-%m-%d %H:%M:%S'`]		Found stale 'RUNNING' file, removed it, should be clear for next run!"
	    rm "$DIR_ROOT/var/cache/RUNNING"
	else
		# Not yet stale, just warn
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		Already running..."
	fi
else
	# Not running yet, create new RUNNING fiel
	touch "$DIR_ROOT/var/cache/RUNNING"

	# Identify type of installation
	if [[ $string == *"domains"* ]]; then
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]	IDENTIFIED: DIRECTADMIN"
	else
		if [ -d "/opt/plesk" ]; then
			echo "[`date '+%Y-%m-%d %H:%M:%S'`]	IDENTIFIED: PLESK"
			# PHPEXEC="/opt/plesk/php/8.1/bin/php"
		else
			echo "[`date '+%Y-%m-%d %H:%M:%S'`]	IDENTIFIED: UNKNOWN (handle as directadmin)"
		fi
	fi

	# Run core actions not-nested
	function core_actions {
                if [ -d "$DIR_ROOT/src/Trinity/WebshopBundle" ]
                then
                    MYCMD="$PHPEXEC -d memory_limit=4G $DIR_ROOT/bin/console trinity:webshop:index"
                    echo "[`date '+%Y-%m-%d %H:%M:%S'`]             Running command:"
                    echo "[`date '+%Y-%m-%d %H:%M:%S'`]             $MYCMD"
                    eval $MYCMD
                fi

                MYCMD="$PHPEXEC -d memory_limit=4G $DIR_ROOT/bin/console trinity:search:index"
                echo "[`date '+%Y-%m-%d %H:%M:%S'`]             Running command:"
                echo "[`date '+%Y-%m-%d %H:%M:%S'`]             $MYCMD"
                eval $MYCMD
                # exit;
	}

	# Run Trinity main cron
	function init {
		MYCMD="$PHPEXEC -d memory_limit=4G $DIR_ROOT/bin/console trinity:run"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		Running command:"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		$MYCMD"
		eval $MYCMD
		# exit;
	}

	function dbUpdate {
		MYCMD="$PHPEXEC $DIR_ROOT/bin/console d:s:u -f"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]	Update database:"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		Running command:"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		$MYCMD"
		eval $MYCMD
	}

        function composerUpdate {
		MYCMD="cd $DIR_ROOT && $PHPEXEC $DIR_ROOT/composer.phar install -o 2>&1"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]	Update composer.json:"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		Running command:"
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]		$MYCMD"
		eval $MYCMD
        }

	# Remove cache if requested
	function cacheRemoval {
		echo "[`date '+%Y-%m-%d %H:%M:%S'`]	Check for cache removal..."
		if [ -d "$DIR_ROOT/var/cache" ]; then
			echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		Cache dir found: $DIR_ROOT/var/cache"
			if [ -f "$DIR_ROOT/var/cache/CLEANME" ]; then
				echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		Found removal request file: $DIR_ROOT/var/cache/CLEANME"

				# find "$OUTPUT/var/cache/dev/*" -name *

				echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		Removing folder contents from: $DIR_ROOT/var/cache/dev/*"
				for i in "$DIR_ROOT"/var/cache/dev/*; do oldfile="$i"; rm -rf "$oldfile"; done
				echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		Removing folder contents from: $DIR_ROOT/var/cache/prod/*"
				for i in "$DIR_ROOT"/var/cache/prod/*; do oldfile="$i"; rm -rf "$oldfile"; done

				rm -- "$DIR_ROOT"/var/cache/CLEANME

				dbUpdate

                                composerUpdate
			else
				echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		No need to cleanup."
			fi
		else
			echo "[`date '+%Y-%m-%d %H:%M:%S'`] 		No cache removal requested."
		fi
		# exit;
	}

	# Run
	core_actions
	init
	cacheRemoval

	# eval "$PHPEXEC $DIR_ROOT/sleep.php"

	echo "[`date '+%Y-%m-%d %H:%M:%S'`]	DONE"

	# Remove RUNNING file upon successful run
	rm "$DIR_ROOT/var/cache/RUNNING"
fi
