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
--exclude-glob Twig/ \
--exclude-glob .htaccess \
--exclude-glob settings.local.php;
chmod -R 700 ."