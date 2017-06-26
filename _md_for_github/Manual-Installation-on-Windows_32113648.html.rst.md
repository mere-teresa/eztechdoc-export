<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 1: Installation](31429538.html)
5.  [Manual Installation Guides](Manual-Installation-Guides_31431727.html)

</div>
**Developer : Manual Installation on Windows**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Michał Maciej Kusztelak, last modified on Jul 05, 2016

</div>
<div id="main-content" class="wiki-content group">
**Preparation:**

**1. Set up PHP**

This step requires the modification of two files: Apache2 configuration file and `php.ini`.
These files can be edited using a terminal editor like vi or nano, or a simple text editor. file name is **httpd.conf **and by default it is located in this directory:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
C:\Program Files\Apache Software Foundation\Apache2.2\conf
```

</div>
</div>
1.  Uncomment the following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
LoadModule php5_module libexec/apache2/libphp5.so
```

</div>
</div>
b. Locate php.ini file. By default it should be in the following directory:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
C:\program files\php\php.ini
```

</div>
</div>
c. Open the file in a text editor and locate `date.timezone` and `pdo_mysql.default_socket` and provide them with values as in the example below:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
date.timezone = "Europe/Warsaw"
pdo_mysql.default_socket = /tmp/mysql.sock
```

</div>
</div>
1.  Increase `memory_limit` value for eZ Platform:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
memory_limit = 4G
```

</div>
</div>
**2. Set up virtual host and start Apache2**

1.  Edit Apache2 configuration file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
c:\Program Files\Apache Software Foundation\Apache2.2\conf
```

</div>
</div>
1.  Uncomment and modify the following lines:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
LoadModule vhost_alias_module libexec/apache2/mod_vhost_alias.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
```

</div>
</div>
1.  Comment the following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Include /private/etc/apache2/extra/httpd-vhosts.conf
```

</div>
</div>
1.  Add the following line to the file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Include /private/etc/apache2/users/*.conf
```

</div>
</div>
 

**3. Start Apache2 daemon using Command Line**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
httpd.exe
```

</div>
</div>
**4. Install Composer globally**

Composer is a dependency manager that allows you to install packages directly in the project. It is also checking all packages' versions on a regular basis to make sure they are up-to-date and to avoid inconsistencies.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
curl -sS https://getcomposer.org/installer | php
php -d memory_limit=-1 composer.phar
```

</div>
</div>
**5. Create a new database for eZ Platform**

Create new database (you can substitute `ez1` with the database name you want to use):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -uroot -ppassword -e "CREATE DATABASE ez1"
```

</div>
</div>
**6. Install additional requirements for eZ Platform**

1.  Install PEAR/PECL extension:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
cd c:\program files\php\php.ini
curl -O https://pear.php.net/go-pear.phar
php -d detect_unicode=0 go-pear.phar
php install-pear-nozlib.phar
pear channel-update pear.php.net
pecl channel-update pecl.php.net
pear upgrade-all
pear config-set auto_discover 1
```

</div>
</div>
1.  Edit `php.ini` and add following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
extension=intl.so
```

</div>
</div>
c. Enable opcache extension for PHP (suggested, but not required) by adding:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
zend_extension=opcache.so
```

</div>
</div>
**Installation:**

**7. Install eZ Platform**

a. Download archive from [share.ez.no/downloads](http://share.ez.no/downloads/downloads). Extract the eZ Platform archive to a directory, then execute post install scripts.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
cd /<directory>/
php -d memory_limit=-1 composer.phar run-script post-install-cmd
```

</div>
</div>
 

1.  Copy the virtual host template:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
COPY c:\Program Files\Apache Software Foundation\Apache2.2\vhost.template c:\Program Files\Apache Software Foundation\Apache2.2\users/ez1.lh.conf
```

</div>
</div>
1.  Modify virtual host file **vhost.template. **

Replace the `---USER_ID---` variable (used in lines 10 and 17) with your current user ID. Use `whoami` command to get effective user ID of the currently logged user. If you want to use the default virtual host template (delivered with eZ Platform package) all you have to do is set up lines 7, 8, 9, 10, 17, 25 and 33:

1.  Restart Apache 2 server:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
httpd.exe -k restart
```

</div>
</div>
1.  Install required dependencies using Composer:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
composer install
```

</div>
</div>
When Composer asks you for the token you must log in to your GitHub account and edit your profile. Go to the Personal access tokens link and Generate new token with default settings. Be aware that the token will be shown only once, so do not refresh the page until you paste the token into Composer prompt. This operation is performed only once when you install eZ Platform for the first time.

1.  Install eZ Platform:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
php app/console ezplatform:install clean
```

</div>
</div>
| | You will be able to see your page under <http://ez1.lh> (or the address you chose in preparation). Please note that a clean install of eZ Platform doesn’t include DemoBundle anymore.

</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

