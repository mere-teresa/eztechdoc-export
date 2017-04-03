<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 1: Installation](31429538.html)
5.  [Manual Installation
    Guides](Manual-Installation-Guides_31431727.html)

</div>
**Developer : Installation Guide for OS X**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Michał Maciej Kusztelak, last modified on Jun 22, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Preparation:**

**1. Install MySQL **

Download from the [official MySQL webpage](https://www.mysql.com/) is
strongly recommended.

**2. Set up PHP**

This step requires the modification of two files: Apache2 configuration
file and `php.ini`.\
These files can be edited using a terminal editor like vi or nano, or a
simple text editor such as TextEdit or Atom.

a.  Edit Apache2 configuration file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /private/etc/apache2/httpd.conf
```

</div>
</div>
b.  Uncomment the following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
LoadModule php5_module libexec/apache2/libphp5.so
```

</div>
</div>
c\. If you can’t locate the `php.ini` file on your machine, it’s probably
under `php.ini.default`. Create a new `php.ini` file based on defaults:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo cp /private/etc/php.ini.default /private/etc/php.ini
```

</div>
</div>
d.  Open the file in a text editor (in this example, in vi):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /private/etc/php.ini
```

</div>
</div>
e\. Locate `date.timezone` and `pdo_mysql.default_socket` and provide
them with values as in the example below:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
date.timezone = "Europe/Warsaw"
pdo_mysql.default_socket = /tmp/mysql.sock
```

</div>
</div>
f.  Increase `memory_limit` value for eZ Platform:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
memory_limit = 4G
```

</div>
</div>
**3. Set up virtual host and start Apache2**

a.  Edit Apache2 configuration file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /private/etc/apache2/httpd.conf
```

</div>
</div>
b.  Uncomment and modify the following lines:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
LoadModule vhost_alias_module libexec/apache2/mod_vhost_alias.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
```

</div>
</div>
c.  Comment the following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
Include /private/etc/apache2/extra/httpd-vhosts.conf
```

</div>
</div>
d.  Add the following line to the file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
Include /private/etc/apache2/users/*.conf
```

</div>
</div>
e.  Change permissions for virtual hosts storage directory (775):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo chmod -R 775 /private/etc/apache2/users
sudo chmod 775 /private/etc/apache2
```

</div>
</div>
**4. Start Apache2 daemon using terminal**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo apachectl start
```

</div>
</div>
**5. Install Composer globally**

Composer is a dependency manager that allows you to install packages
directly in the project. It is also checking all packages’ versions on a
regular basis to make sure they are up-to-date and to avoid
inconsistencies.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
curl -sS https://getcomposer.org/installer | php
mkdir -p /usr/local/bin
php -d memory_limit=-1 composer.phar
```

</div>
</div>
**6. Create a new database for eZ Platform**

Create new database (you can substitute `ez1` with the database name you
want to use):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
/usr/local/mysql/bin/mysql -u root -e 'create database ez1;'
```

</div>
</div>
**7. Install Brew package manager**

Brew is a package manager for OS X, if you haven’t used it already you
are going to love what it does!

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

</div>
</div>
**8. Install additional requirements for eZ Platform**

a.  Install PEAR/PECL extension:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
cd /usr/lib/php
curl -O https://pear.php.net/go-pear.phar
php -d detect_unicode=0 go-pear.phar
sudo php install-pear-nozlib.phar
sudo pear channel-update pear.php.net
sudo pecl channel-update pecl.php.net
sudo pear upgrade-all
sudo pear config-set auto_discover 1
```

</div>
</div>
b.  Install autoconf:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
brew install autoconf
```

</div>
</div>
c.  Install intl:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
brew install icu4c
sudo pecl install intl
```

</div>
</div>
d\. The path to the ICU libraries and headers is:
`/usr/local/opt/icu4c/`.

Edit `/private/etc/php.ini` and add following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
extension=intl.so
```

</div>
</div>
e\. Enable opcache extension for PHP (suggested, but not required) by
adding:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
zend_extension=opcache.so
```

</div>
</div>
**Installation:**

**9. Install eZ Platform**

a\. Go to the folder with your installation and set up directory
permissions:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
chmod 775 ../ez1.lh
chmod 775 ../../workspace
chmod 775 ../../../Documents
```

</div>
</div>
 

b. Download archive
from [share.ez.no/downloads](http://share.ez.no/downloads/downloads). Extract
the eZ Platform archive to a directory, then execute post install
scripts.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
cd /<directory>/
php -d memory_limit=-1 composer.phar run-script post-install-cmd
```

</div>
</div>
 

c.  Copy the virtual host template:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo cp doc/apache2/vhost.template /private/etc/apache2/users/ez1.lh.conf
```

</div>
</div>
d.  Edit the new virtual host:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /private/etc/apache2/users/ez1.lh.conf
```

</div>
</div>
e.  Modify virtual host file **vhost.template. **

Replace the `---USER_ID---` variable (used in lines 10 and 17) with your
current user ID. Use `whoami` command to get effective user ID of the
currently logged user. If you want to use the default virtual host
template (delivered with eZ Platform package) all you have to do is set
up lines 7, 8, 9, 10, 17, 25 and 33:

f.  Restart Apache 2 server:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo apachectl restart
```

</div>
</div>
g.  Install required dependencies using Composer:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
composer install
```

</div>
</div>
When Composer asks you for the token you must log in to your GitHub
account and edit your profile. Go to the Personal access tokens link and
Generate new token with default settings. Be aware that the token will
be shown only once, so do not refresh the page until you paste the token
into Composer prompt. This operation is performed only once when you
install eZ Platform for the first time.

h.  Change directory permissions:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
rm -rf app/cache/* app/logs/*
sudo chmod +a "_www allow delete,write,append,file_inherit,directory_inherit" app/{cache,logs,config} web
sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" app/{cache,logs,config} web
```

</div>
</div>
i.  Install eZ Platform:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
php app/console ezplatform:install clean
```

</div>
</div>
| | You will be able to see your page under <http://ez1.lh> (or the
address you chose in preparation). Please note that a clean install of
eZ Platform doesn’t include DemoBundle anymore.

**10. Optional**

a.  Install PHP 5.6 with opcache extension:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
brew install -v homebrew/php/php56
chmod -R ug+w $(brew --prefix php56)/lib/php
brew install -v php56-opcache
```

</div>
</div>
b.  Add proper `date.timezone` settings:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /usr/local/etc/php/5.6/php.ini
```

</div>
</div>
c.  Uncomment and modify:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
date.timezone = "Europe/Warsaw"
(…)
Increase memory_limit value for eZ Platform:
memory_limit = 4G
(…)
```

</div>
</div>
d.  Disable errors showing:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
display_errors = Off
```

</div>
</div>
e.  Change default PHP parser used by Apache:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo vi /private/etc/apache2/httpd.conf
```

</div>
</div>
f.  Find and comment the following line:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
# LoadModule php5_module libexec/apache2/libphp5.so
```

</div>
</div>
g.  Add below:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
LoadModule php5_module /usr/local/opt/php56/libexec/apache2/libphp5.so
```

</div>
</div>
e.  Install intl extension for PHP 5.6:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
brew install php56-intl
```

</div>
</div>
f.  Restart Apache:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
sudo apachectl restart
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375979821">
-   [Preparation:](#InstallationGuideforOSX-Preparation:)
    -   [1. Install MySQL ](#InstallationGuideforOSX-1.InstallMySQL)
    -   [2. Set up PHP](#InstallationGuideforOSX-2.SetupPHP)
    -   [3. Set up virtual host and start
        Apache2](#InstallationGuideforOSX-3.SetupvirtualhostandstartApache2)
    -   [4. Start Apache2 daemon using
        terminal](#InstallationGuideforOSX-4.StartApache2daemonusingterminal)
    -   [5. Install Composer
        globally](#InstallationGuideforOSX-5.InstallComposerglobally)
    -   [6. Create a new database for eZ
        Platform](#InstallationGuideforOSX-6.CreateanewdatabaseforeZPlatform)
    -   [7. Install Brew package
        manager](#InstallationGuideforOSX-7.InstallBrewpackagemanager)
    -   [8. Install additional requirements for eZ
        Platform](#InstallationGuideforOSX-8.InstalladditionalrequirementsforeZPlatform)
-   [Installation:](#InstallationGuideforOSX-Installation:)
    -   [9. Install eZ
        Platform](#InstallationGuideforOSX-9.InstalleZPlatform)
    -   [10. Optional](#InstallationGuideforOSX-10.Optional)

</div>
</div>
</div>
</div>
</div>
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

