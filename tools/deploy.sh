#!/bin/bash    
HOST="marsohod1.ru"
PRJ_ROOT="/django/marso"
HT_ROOT="/domains/marsohod1.ru"
MIRR_CMD="mirror --reverse --verbose --exclude ___"
cd `dirname $0`; TOOLS_ROOT=`pwd`; cd -
LCL_ROOT=$TOOLS_ROOT/..

# Reading USER ans PASS
. $TOOLS_ROOT/passwd.sh

lftp -c "set ftp:list-options -a;
open ftp://$USER:$PASS@$HOST;

lcd $LCL_ROOT/data; cd $PRJ_ROOT/data; $MIRR_CMD --exclude .txt
lcd $LCL_ROOT/src; cd $PRJ_ROOT/src; $MIRR_CMD --exclude local_settings.py --exclude .pyc
lcd $LCL_ROOT/media; cd $HT_ROOT/media; $MIRR_CMD
lcd $LCL_ROOT/root; cd $HT_ROOT; $MIRR_CMD

cd $PRJ_ROOT
chmod -R 700 .
cd $HT_ROOT
chmod -R 700 ."
