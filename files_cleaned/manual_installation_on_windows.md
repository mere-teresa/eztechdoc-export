1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 1: Installation](31429538.html)</span>
5.  <span>[Manual Installation
    Guides](Manual-Installation-Guides_31431727.html)</span>

<span id="title-text"> Developer : Manual Installation on Windows </span> {#title-heading .pagetitle}
=========================================================================

Created by <span class="author"> Michał Maciej Kusztelak</span>, last
modified on Jul 05, 2016

Preparation: {#ManualInstallationonWindows-Preparation:}
------------

### 1. Set up PHP {#ManualInstallationonWindows-1.SetupPHP}

This step requires the modification of two files: Apache2 configuration
file and `php.ini`.  
These files can be edited using a terminal editor like vi or nano, or a
simple text editor. file name is **httpd.conf **and by default it is
located in this directory:

~~~~ brush:
C:\Program Files\Apache Software Foundation\Apache2.2\conf
~~~~

a. Uncomment the following line:

~~~~ brush:
LoadModule php5_module libexec/apache2/libphp5.so
~~~~

b. Locate php.ini file. By default it should be in the following
directory:

~~~~ brush:
C:\program files\php\php.ini
~~~~

c. Open the file in a text editor and
locate `date.timezone` and `pdo_mysql.default_socket` and provide them
with values as in the example below:

~~~~ brush:
date.timezone = "Europe/Warsaw"
pdo_mysql.default_socket = /tmp/mysql.sock
~~~~

d. Increase `memory_limit` value for eZ Platform:

~~~~ brush:
memory_limit = 4G
~~~~

### 2. Set up virtual host and start Apache2 {#ManualInstallationonWindows-2.SetupvirtualhostandstartApache2}

a. Edit Apache2 configuration file:

~~~~ brush:
c:\Program Files\Apache Software Foundation\Apache2.2\conf
~~~~

b. Uncomment and modify the following lines:

~~~~ brush:
LoadModule vhost_alias_module libexec/apache2/mod_vhost_alias.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
~~~~

c. Comment the following line:

~~~~ brush:
Include /private/etc/apache2/extra/httpd-vhosts.conf
~~~~

d. Add the following line to the file:

~~~~ brush:
Include /private/etc/apache2/users/*.conf
~~~~

 

### 3. Start Apache2 daemon using Command Line {#ManualInstallationonWindows-3.StartApache2daemonusingCommandLine}

~~~~ brush:
httpd.exe
~~~~

### 4. Install Composer globally {#ManualInstallationonWindows-4.InstallComposerglobally}

Composer is a dependency manager that allows you to install packages
directly in the project. It is also checking all packages’ versions on a
regular basis to make sure they are up-to-date and to avoid
inconsistencies.

~~~~ brush:
curl -sS https://getcomposer.org/installer | php
php -d memory_limit=-1 composer.phar
~~~~

### 5. Create a new database for eZ Platform {#ManualInstallationonWindows-5.CreateanewdatabaseforeZPlatform}

Create new database (you can substitute `ez1` with the database name you
want to use):

~~~~ brush:
mysql -uroot -ppassword -e "CREATE DATABASE ez1"
~~~~

### 6. Install additional requirements for eZ Platform {#ManualInstallationonWindows-6.InstalladditionalrequirementsforeZPlatform}

a. Install PEAR/PECL extension:

~~~~ brush:
cd c:\program files\php\php.ini
curl -O https://pear.php.net/go-pear.phar
php -d detect_unicode=0 go-pear.phar
php install-pear-nozlib.phar
pear channel-update pear.php.net
pecl channel-update pecl.php.net
pear upgrade-all
pear config-set auto_discover 1
~~~~

b. Edit `php.ini` and add following line:

~~~~ brush:
extension=intl.so
~~~~

c. Enable opcache extension for PHP (suggested, but not required) by
adding:

~~~~ brush:
zend_extension=opcache.so
~~~~

Installation: {#ManualInstallationonWindows-Installation:}
-------------

###   
7. Install eZ Platform {#ManualInstallationonWindows-7.InstalleZPlatform}

a. Download archive
from [share.ez.no/downloads](http://share.ez.no/downloads/downloads){.external-link}. Extract
the eZ Platform archive to a directory, then execute post install
scripts.

~~~~ brush:
cd /<directory>/
php -d memory_limit=-1 composer.phar run-script post-install-cmd
~~~~

 

b. Copy the virtual host template:

~~~~ brush:
COPY c:\Program Files\Apache Software Foundation\Apache2.2\vhost.template c:\Program Files\Apache Software Foundation\Apache2.2\users/ez1.lh.conf
~~~~

d. Modify virtual host file **vhost.template. **

Replace the `---USER_ID---` variable (used in lines 10 and 17) with your
current user ID. Use `whoami` command to get effective user ID of the
currently logged user. If you want to use the default virtual host
template (delivered with eZ Platform package) all you have to do is set
up lines 7, 8, 9, 10, 17, 25 and 33:

e. Restart Apache 2 server:

~~~~ brush:
httpd.exe -k restart
~~~~

f. Install required dependencies using Composer:

~~~~ brush:
composer install
~~~~

When Composer asks you for the token you must log in to your GitHub
account and edit your profile. Go to the Personal access tokens link and
Generate new token with default settings. Be aware that the token will
be shown only once, so do not refresh the page until you paste the token
into Composer prompt. This operation is performed only once when you
install eZ Platform for the first time.

h. Install eZ Platform:

~~~~ brush:
php app/console ezplatform:install clean
~~~~

  
You will be able to see your page under <http://ez1.lh> (or the address
you chose in preparation). Please note that a clean install of eZ
Platform doesn’t include DemoBundle anymore.

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


