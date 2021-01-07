# Last Chaos Some Usefull Stuff
Most things to start working with lc you will find on [lckb.dev](https://lckb.dev/forum/) forum, also join [Discord](https://discord.gg/sC2qgjHqjt) server to talk about developing  

### 1. Server Installation (linux)
- [DDoS Protection](install_linux_ddosprotection.txt) - expect getting ddos on your server, get at least some basic protection  
- [MySQL](install_linux_mysql.txt) ([my.cnf](install_linux_mysql_my.cnf)) - or rather MariaDB /// script for OpenSUSE, but it's similar, you need to replace `zypper` with `yum` ///  
- [Lighttpd + PHP](install_linux_lighttpdphp.txt) ([lighttpd.conf](install_linux_lighttpdphp_lighttpd.conf) / [php.ini](install_linux_lighttpdphp_php.ini)) - you may want to use Apache instead but I prefer this /// it's script for OpenSUSE too ///  

### 2. [LC Server BUILD (linux)](lcserver_linux_build.txt)
Outdated but probably still working  
You should use x64 linux, CentOS suggested, most hosting providers are even not offering x86 versions  
LC is full of bugs and will not work compiled for x64 without source changes so we need cross compile  
Newest supported boost version for LC is 1.65.1  

### 3. [LC Update Optimizer](update_optimizer.php)
Removing duplicated files from zips (ex. if you have Bin/Engine.dll in 1.zip - 10.zip, it will delete it from 1.zip - 9.zip)  

### 4. 3d modelling
- [Milkshape 3D](https://github.com/Karmel0x/lastchaos-some-usefull-stuff/issues/4#issuecomment-756234483)

## Other projects
[LC web account panel](https://github.com/Karmel0x/simple-web-account-panel)

# License
### GNU General Public License v3.0
If you are making some improvements, you should share here, thanks.  
