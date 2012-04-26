#!/bin/bash    
echo "Deploying marsohod"
HOST="marsohod1.ru"
USER="hexeract"
PASS="8Xa5KizVjq"
LCD=`pwd`/
RCD="/domains/marsohod1.ru"
lftp -c "set ftp:list-options -a;
open ftp://$USER:$PASS@$HOST; 
lcd $LCD;
cd $RCD;
mirror --reverse --verbose --exclude __ --exclude \.sh \
--exclude-glob .git/ \
--exclude-glob .gitignore/ \
--exclude-glob .idea/ \
--exclude-glob cache/ \
--exclude-glob nbproject/ \
--exclude-glob .htaccess \
--exclude-glob xakeps/log.txt \
--exclude-glob src/local_settings.py;
chmod -R 700 ."
