1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 1: Installation](31429538.html)</span>
5.  <span>[Manual Installation Guides](Manual-Installation-Guides_31431727.html)</span>

<span id="title-text"> Developer : Installation Guide for OS X </span>
======================================================================

Created by <span class="author"> Michał Maciej Kusztelak</span>, last modified on Jun 22, 2016

Preparation:
------------

### 
1. Install MySQL 

Download from the <a href="https://www.mysql.com/" class="external-link">official MySQL webpage</a> is strongly recommended.

### 2. Set up PHP

This step requires the modification of two files: Apache2 configuration file and `php.ini`.
These files can be edited using a terminal editor like vi or nano, or a simple text editor such as TextEdit or Atom.

a. Edit Apache2 configuration file:

``` brush:
sudo vi /private/etc/apache2/httpd.conf
```

b. Uncomment the following line:

``` brush:
LoadModule php5_module libexec/apache2/libphp5.so
```

c. If you can't locate the `php.ini` file on your machine, it's probably under `php.ini.default`. Create a new `php.ini` file based on defaults:

``` brush:
sudo cp /private/etc/php.ini.default /private/etc/php.ini
```

d. Open the file in a text editor (in this example, in vi):

``` brush:
sudo vi /private/etc/php.ini
```

e. Locate `date.timezone` and `pdo_mysql.default_socket` and provide them with values as in the example below:

``` brush:
date.timezone = "Europe/Warsaw"
pdo_mysql.default_socket = /tmp/mysql.sock
```

f. Increase `memory_limit` value for eZ Platform:

``` brush:
memory_limit = 4G
```

### 3. Set up virtual host and start Apache2

a. Edit Apache2 configuration file:

``` brush:
sudo vi /private/etc/apache2/httpd.conf
```

b. Uncomment and modify the following lines:

``` brush:
LoadModule vhost_alias_module libexec/apache2/mod_vhost_alias.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
```

c. Comment the following line:

``` brush:
Include /private/etc/apache2/extra/httpd-vhosts.conf
```

d. Add the following line to the file:

``` brush:
Include /private/etc/apache2/users/*.conf
```

e. Change permissions for virtual hosts storage directory (775):

``` brush:
sudo chmod -R 775 /private/etc/apache2/users
sudo chmod 775 /private/etc/apache2
```

### 4. Start Apache2 daemon using terminal

``` brush:
sudo apachectl start
```

### 5. Install Composer globally

Composer is a dependency manager that allows you to install packages directly in the project. It is also checking all packages' versions on a regular basis to make sure they are up-to-date and to avoid inconsistencies.

``` brush:
curl -sS https://getcomposer.org/installer | php
mkdir -p /usr/local/bin
php -d memory_limit=-1 composer.phar
```

### 6. Create a new database for eZ Platform

Create new database (you can substitute `ez1` with the database name you want to use):

``` brush:
/usr/local/mysql/bin/mysql -u root -e 'create database ez1;'
```

### 7. Install Brew package manager

Brew is a package manager for OS X, if you haven't used it already you are going to love what it does!

``` brush:
ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

### 8. Install additional requirements for eZ Platform

a. Install PEAR/PECL extension:

``` brush:
cd /usr/lib/php
curl -O https://pear.php.net/go-pear.phar
php -d detect_unicode=0 go-pear.phar
sudo php install-pear-nozlib.phar
sudo pear channel-update pear.php.net
sudo pecl channel-update pecl.php.net
sudo pear upgrade-all
sudo pear config-set auto_discover 1
```

b. Install autoconf:

``` brush:
brew install autoconf
```

c. Install intl:

``` brush:
brew install icu4c
sudo pecl install intl
```

d. The path to the ICU libraries and headers is: `/usr/local/opt/icu4c/`.

Edit `/private/etc/php.ini` and add following line:

``` brush:
extension=intl.so
```

e. Enable opcache extension for PHP (suggested, but not required) by adding:

``` brush:
zend_extension=opcache.so
```

Installation:
-------------

### 
9. Install eZ Platform

a. Go to the folder with your installation and set up directory permissions:

``` brush:
chmod 775 ../ez1.lh
chmod 775 ../../workspace
chmod 775 ../../../Documents
```

 

b. Download archive from <a href="http://share.ez.no/downloads/downloads" class="external-link">share.ez.no/downloads</a>. Extract the eZ Platform archive to a directory, then execute post install scripts.

``` brush:
cd /<directory>/
php -d memory_limit=-1 composer.phar run-script post-install-cmd
```

 

c. Copy the virtual host template:

``` brush:
sudo cp doc/apache2/vhost.template /private/etc/apache2/users/ez1.lh.conf
```

d. Edit the new virtual host:

``` brush:
sudo vi /private/etc/apache2/users/ez1.lh.conf
```

e. Modify virtual host file **vhost.template. **

Replace the `---USER_ID---` variable (used in lines 10 and 17) with your current user ID. Use `whoami` command to get effective user ID of the currently logged user. If you want to use the default virtual host template (delivered with eZ Platform package) all you have to do is set up lines 7, 8, 9, 10, 17, 25 and 33:

f. Restart Apache 2 server:

``` brush:
sudo apachectl restart
```

g. Install required dependencies using Composer:

``` brush:
composer install
```

When Composer asks you for the token you must log in to your GitHub account and edit your profile. Go to the Personal access tokens link and Generate new token with default settings. Be aware that the token will be shown only once, so do not refresh the page until you paste the token into Composer prompt. This operation is performed only once when you install eZ Platform for the first time.

h. Change directory permissions:

``` brush:
rm -rf app/cache/* app/logs/*
sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/{cache,logs,config} web
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/{cache,logs,config} web
```

i. Install eZ Platform:

``` brush:
php app/console ezplatform:install clean
```

You will be able to see your page under <a href="http://ez1.lh" class="uri" class="external-link">http://ez1.lh</a> (or the address you chose in preparation). Please note that a clean install of eZ Platform doesn’t include DemoBundle anymore.

### 10. Optional

a. Install PHP 5.6 with opcache extension:

``` brush:
brew install -v homebrew/php/php56
chmod -R ug+w $(brew --prefix php56)/lib/php
brew install -v php56-opcache
```

b. Add proper `date.timezone` settings:

``` brush:
sudo vi /usr/local/etc/php/5.6/php.ini
```

c. Uncomment and modify:

``` brush:
date.timezone = "Europe/Warsaw"
(…)
Increase memory_limit value for eZ Platform:
memory_limit = 4G
(…)
```

d. Disable errors showing:

``` brush:
display_errors = Off
```

e. Change default PHP parser used by Apache:

``` brush:
sudo vi /private/etc/apache2/httpd.conf
```

f. Find and comment the following line:

``` brush:
# LoadModule php5_module libexec/apache2/libphp5.so
```

g. Add below:

``` brush:
LoadModule php5_module /usr/local/opt/php56/libexec/apache2/libphp5.so
```

e. Install intl extension for PHP 5.6:

``` brush:
brew install php56-intl
```

f. Restart Apache:

``` brush:
sudo apachectl restart
```

#### In this topic:

-   [Preparation:](#InstallationGuideforOSX-Preparation:)
    -   [1. Install MySQL ](#InstallationGuideforOSX-1.InstallMySQL)
    -   [2. Set up PHP](#InstallationGuideforOSX-2.SetupPHP)
    -   [3. Set up virtual host and start Apache2](#InstallationGuideforOSX-3.SetupvirtualhostandstartApache2)
    -   [4. Start Apache2 daemon using terminal](#InstallationGuideforOSX-4.StartApache2daemonusingterminal)
    -   [5. Install Composer globally](#InstallationGuideforOSX-5.InstallComposerglobally)
    -   [6. Create a new database for eZ Platform](#InstallationGuideforOSX-6.CreateanewdatabaseforeZPlatform)
    -   [7. Install Brew package manager](#InstallationGuideforOSX-7.InstallBrewpackagemanager)
    -   [8. Install additional requirements for eZ Platform](#InstallationGuideforOSX-8.InstalladditionalrequirementsforeZPlatform)
-   [Installation:](#InstallationGuideforOSX-Installation:)
    -   [9. Install eZ Platform](#InstallationGuideforOSX-9.InstalleZPlatform)
    -   [10. Optional](#InstallationGuideforOSX-10.Optional)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


