1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 1: Installation](31429538.html)</span>
5.  <span>[Manual Installation
    Guides](Manual-Installation-Guides_31431727.html)</span>

<span id="title-text"> Developer : Installation Guide for Unix-Based Systems </span> {#title-heading .pagetitle}
====================================================================================

Created by <span class="author"> Michał Maciej Kusztelak</span>, last
modified by <span class="editor"> Sarah Haïm-Lubczanski</span> on Sep
06, 2016

1. Install a LAMP Stack (\*NIX, Apache, MySQL, PHP5+) {#InstallationGuideforUnix-BasedSystems-1.InstallaLAMPStack(*NIX,Apache,MySQL,PHP5+)}
-----------------------------------------------------

Depending on your selected \*NIX distribution, you may need to install
part or all of the LAMP stack required to run eZ Platform or eZ
Enterprise. Before getting started, make sure you review our
[requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)
page to see the systems we support and use for testing. You can try
using an unsupported configuration, but your results may vary.

Please not that, while OS X *is* a \*NIX-based system, it has its own
unique requirements listed in our [Installation Guide for OS
X](Installation-Guide-for-OS-X_31431738.html). Developer-maintained
installation notes are kept in our GitHub repository at this location as
well: <https://github.com/ezsystems/ezplatform/blob/master/INSTALL.md>

You may use your system’s package manager (yum, apt-get, etc.) to obtain
a copy of Apache, MySQL, and PHP, or download the latest versions from
the official websites and install manually:

-   [Apache2](https://httpd.apache.org/download.cgi){.external-link}
-   [MySQL](http://dev.mysql.com/downloads/mysql/){.external-link}
-   [PHP 5.6+](http://php.net){.external-link}

For Debian 8.5, for example, we’d recommend using `apt-get` to install
`apache2`, `mysql-server`, `mysql-client`, and `php5-*` (all the
packages listed in the
[requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)),
as well as `git` for version control. If the system on which you’re
doing the install has only 1 or 2 GB of RAM, be sure to [set up
swap](https://doc.ez.no/display/DEVELOPER/Set+up+Swap+on+Debian+8.x) so
you don’t run out of RAM when running the composer scripts later on.

2. Get Composer {#InstallationGuideforUnix-BasedSystems-2.GetComposer}
---------------

You’ll need Composer, the PHP command line dependency manager.

a. Install Composer by running the following command on the terminal of
the machine upon which you’re installing eZ Platform:

~~~~ brush:
php -r "readfile('https://getcomposer.org/installer');" | php
~~~~

b. Move the downloaded composer.phar file to a globally-available path:

~~~~ brush:
mv composer.phar /usr/local/bin/composer
~~~~

3. Download the desired version of eZ Platform or eZ Enterprise {#InstallationGuideforUnix-BasedSystems-3.DownloadthedesiredversionofeZPlatformoreZEnterprise}
---------------------------------------------------------------

-   If you are installing eZ Platform, download the latest archive
    from <http://share.ez.no/latest>
-   For licensed eZ Enterprise customers, download your file
    here: <https://support.ez.no/Downloads>

Expand the archive into `/var/www/ezplatform` or the folder name or your
choosing.

For developers interested in working with the latest version of eZ
Platform, you may also clone the latest from our GitHub repository:

~~~~ brush:
cd /var/www
git clone https://github.com/ezsystems/ezplatform.git /var/www/ezplatform
~~~~

You can rename the destination folder to whatever you like. This is
where eZ Platform will live, and you’ll point your virtual host to this
folder to use as its root. You may choose to download an archive
file from [share.ez.no/downloads](http://share.ez.no/downloads/downloads){.external-link} instead
of cloning from GitHub, and extract the eZ Platform archive to a similar
directory. The subsequent steps are identical, regardless of the method
you choose to obtain eZ Platform.

4. Create a new database for eZ Platform {#InstallationGuideforUnix-BasedSystems-4.CreateanewdatabaseforeZPlatform}
----------------------------------------

Create new database (you can substitute `ezplatform` with the database
name you want to use, but keep it in mind as you run the installation
script):

~~~~ brush:
/usr/bin/mysql -u root -e 'create database ezplatform;'
~~~~

5. Run the Installation Scripts {#InstallationGuideforUnix-BasedSystems-5.RuntheInstallationScripts}
-------------------------------

Composer will look inside the composer.json file and install all of the
required packages to run eZ Platform. There’s a script in the app folder
called console that will install eZ Platform for your desired
environment as well (dev/prod).

This is the step where you want to make sure you have [swap configured
for your
machine](https://doc.ez.no/display/DEVELOPER/Set+up+Swap+on+Debian+8.x)
if it does not have an abundance of RAM.

### a. Run composer install: {#InstallationGuideforUnix-BasedSystems-a.Runcomposerinstall:}

~~~~ brush:
cd /var/www/ezplatform
php -d memory_limit=-1 /usr/local/bin/composer install
~~~~

Once the installer gets to the point that it creates
`app/config/parameters.yml`, you will be presented with a few decisions.
The first asks you to choose a
[secret](http://symfony.com/doc/current/reference/configuration/framework.html#secret){.external-link};
choose any random string you like, made up of characters, numbers, and
symbols, up to around 32 characters. This is used by Symfony when
generating [CSRF
tokens](http://symfony.com/doc/current/book/forms.html#forms-csrf){.external-link},
[encrypting
cookies](http://symfony.com/doc/current/cookbook/security/remember_me.html){.external-link},
and for creating signed URIs when using [ESI (Edge Side
Includes)](http://symfony.com/doc/current/book/http_cache.html#edge-side-includes){.external-link}.

Next, you’ll be asked to specify a database driver. You may press return
to accept the default for this option, as well as the next several
(`database_host, database_port, database_name, database_user`) unless
you have customized those values and need to enter them as configured on
your installation. If you set a password for your database user, enter
it when prompted for `database_password`. The installer should continue
once you’ve completed this manual portion of the installation process.

### b. Run eZ Platform’s installer: {#InstallationGuideforUnix-BasedSystems-b.RuneZPlatform'sinstaller:}

~~~~ brush:
php -d memory_limit=-1 /var/www/ezplatform/app/console ezplatform:install --env prod clean
~~~~

Don’t forget to substitute any custom folder name you may have chosen in
place of `ezplatform/` after `/var/www/` in the examples above. As you
can see, this example shows a clean production installation. We’re
telling PHP to run Symfony’s console to execute the ezplatform install
script. You can get an informative output to learn more about the
console script’s capabilities by swapping in these
parameters: `           config:dump-reference ezpublish         `

If Composer asks you for your token, you must log in to your GitHub
account and edit your profile. Go to the Personal access tokens link and
Generate new token with default settings. Be aware that the token will
be shown only once, so do not refresh the page until you paste the token
into the Composer prompt. This operation is performed only once when you
install eZ Platform for the first time.

Please note that a clean install of eZ Platform doesn’t include the
DemoBundle anymore.

6. Setup the folder rights (\*NIX users) {#InstallationGuideforUnix-BasedSystems-6.Setupthefolderrights(*NIXusers)}
----------------------------------------

Like most things, [Symfony
documentation](http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup){.external-link}
applies here, meaning `app/cache` and `app/logs` need to be writable by
cli and web server user.

Furthermore, future files and directories created by these two users
will need to inherit those access rights. *For security reasons, there
is no need for web server to have access to write to other directories.*

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
Then, go to the [Setup folder rights](Setup-folder-rights_32866325.html)
page for the next steps of this settings.

7. Set up a Virtual Host {#InstallationGuideforUnix-BasedSystems-7.SetupaVirtualHost}
------------------------

For our example, we’ll demonstrate using Apache2 as part of the
traditional LAMP stack.

### Option A: Scripted Configuration {#InstallationGuideforUnix-BasedSystems-OptionA:ScriptedConfiguration style="margin-left: 30.0px;"}

Instead of manually editing the vhost.template file, you may
instead [use the included shell
script](https://doc.ez.no/display/DEVELOPER/Web+Server):
/var/www/ezplatform/bin/vhost.sh to generate a configured .conf
file. Check out the source of `vhost.sh` to see the options provided.
Additional information is included in our [Web
Server](Web-Server_31429554.html) documentation here as well.

### Option B: Manual Edits {#InstallationGuideforUnix-BasedSystems-OptionB:ManualEdits style="margin-left: 30.0px;"}

a. Copy the vhost template file from its home in the doc folder:

~~~~ brush:
cp /var/www/ezplatform/doc/apache2/vhost.template /etc/apache2/sites-available/ezplatform.conf
~~~~

b. Edit the file, substituting the %placeholders% with the appropriate
values for your desired config:

~~~~ brush:
vi /etc/apache2/sites-available/ezplatform.conf
~~~~

For a DEV environment, you can change

-   -   `<VirtualHost %IP_ADDRESS%:%PORT%>           `to  
        `<VirtualHost *:80>`
    -   `ServerName %HOST_NAME%toServerName localhost`
    -   `ServerAlias %HOST_ALIAS%...that can simply be deleted.`
    -   `DocumentRoot %BASEDIR%/webtoDocumentRoot /var/www/ezplatform/web`
    -   `LimitRequestBody %BODY_SIZE_LIMIT%toLimitRequestBody 0`
    -   `TimeOut %TIMEOUT%toTimeOut 42to avoid waiting longer than 42 seconds for all the things.`

Be sure to specify `/var/www/ezplatform/web` as the `DocumentRoot` and
`Directory`. Uncomment the line that starts with \#if\[SYMFONY\_ENV\]
and set the value, something like this:

~~~~ brush:
# Environment.
# Possible values: "prod" and "dev" out-of-the-box, other values possible with proper configuration
# Defaults to "prod" if omitted (uses SetEnvIf so value can be used in rewrite rules)
SetEnvIf Request_URI ".*" SYMFONY_ENV=dev
~~~~

8. Server Configuration (Apache as example) {#InstallationGuideforUnix-BasedSystems-8.ServerConfiguration(Apacheasexample)}
-------------------------------------------

Make sure you’ve got the `libapache2-mod-php5` module installed for
Apache2 to use PHP5.x, and have the rewrite module enabled:

~~~~ brush:
apt-get -y install libapache2-mod-php5
a2enmod rewrite
~~~~

a. You’ll need the web user set as the owner/group on all your files to
avoid a 500 error:

~~~~ brush:
chown -R www-data:www-data /var/www/ezplatform
~~~~

b. With your vhost file properly prepared and located in
/etc/apache2/sites-available/ezplatform.conf, enable the VirtualHost and
disable the default:

~~~~ brush:
a2ensite ezplatform
a2dissite 000-default.conf
~~~~

9. Restart server (Apache) {#InstallationGuideforUnix-BasedSystems-9.Restartserver(Apache)}
--------------------------

~~~~ brush:
service apache2 restart
~~~~

#### In this topic: {#InstallationGuideforUnix-BasedSystems-Inthistopic:}

-   [1. Install a LAMP Stack (\*NIX, Apache,
    MySQL, PHP5+)](#InstallationGuideforUnix-BasedSystems-1.InstallaLAMPStack(*NIX,Apache,MySQL,PHP5+))
-   [2. Get
    Composer](#InstallationGuideforUnix-BasedSystems-2.GetComposer)
-   [3. Download the desired version of eZ Platform or eZ
    Enterprise](#InstallationGuideforUnix-BasedSystems-3.DownloadthedesiredversionofeZPlatformoreZEnterprise)
-   [4. Create a new database for eZ
    Platform](#InstallationGuideforUnix-BasedSystems-4.CreateanewdatabaseforeZPlatform)
-   [5. Run the Installation
    Scripts](#InstallationGuideforUnix-BasedSystems-5.RuntheInstallationScripts)
    -   [a. Run composer
        install:](#InstallationGuideforUnix-BasedSystems-a.Runcomposerinstall:)
    -   [b. Run eZ Platform’s
        installer:](#InstallationGuideforUnix-BasedSystems-b.RuneZPlatform'sinstaller:)
-   [6. Setup the folder rights
    (\*NIX users)](#InstallationGuideforUnix-BasedSystems-6.Setupthefolderrights(*NIXusers))
-   [7. Set up a Virtual
    Host](#InstallationGuideforUnix-BasedSystems-7.SetupaVirtualHost)
    -   [Option A: Scripted
        Configuration](#InstallationGuideforUnix-BasedSystems-OptionA:ScriptedConfiguration)
    -   [Option B: Manual
        Edits](#InstallationGuideforUnix-BasedSystems-OptionB:ManualEdits)
-   [8. Server Configuration (Apache
    as example)](#InstallationGuideforUnix-BasedSystems-8.ServerConfiguration(Apacheasexample))
-   [9. Restart
    server (Apache)](#InstallationGuideforUnix-BasedSystems-9.Restartserver(Apache))

 

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


