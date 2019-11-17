# TripPHP
A PHP client for the triplink system. This focus on blocking IPs which tried to enumerate through your webserver files (eg `phpmyadmin`,`phpMyAdmin`,`mysql`,`MySql`,`shell.php`,`phpinfo.php` ...etc)<br>

# Installation
```shell
wget https://raw.githubusercontent.com/JojiiOfficial/TripPHP/master/triplinkreport.php -o blockIPs.php
```
Put the downloaded file in your www directory and rename it to an obvious name like `shell.php` or `/phpmyadmin/index.php`.<br>
You can additionally create links to this file from other folders to catch more IPs.<br>
After that you need to change follownig variables in the .php file:<br>
- $host  - The host where your ScanBanServer is running
- $port  - Where the webserver runs on (80,443)
- $token - The token from the ScanBanServer (user table)

# Note 
This is only for reporting IPs, if you want to block them you need to setup [Triplink](https://github.com/JojiiOfficial/Tripwire-reporter)
