#!/bin/bash
rm ../archive.tar.gz
tar --exclude-from=.skip_files -cvzf ../archive.tar.gz .
