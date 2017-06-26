1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 1: Installation](31429538.html)</span>

<span id="title-text"> Developer : Installation Using Composer </span> {#title-heading .pagetitle}
======================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Mar 23, 2017

Get Composer {#InstallationUsingComposer-GetComposer}
------------

If you don’t have it already, install Composer, the command-line package
manager for PHP. You’ll have to have a copy of Git installed on your
machine. The following command uses PHP to download and run the Composer
installer, and should be entered on your terminal and executed by
pressing Return or Enter:

~~~~ brush:
php -r "readfile('https://getcomposer.org/installer');" | php
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For further information about Composer usage see [Using
Composer](Using-Composer_31431588.html)<span
class="confluence-link"> </span>.

eZ Platform Installation {#InstallationUsingComposer-eZPlatformInstallation}
------------------------

The commands below assume you have <span class="external-link">Composer
installed globally</span>, a copy of git on your system, and your
**MySQL/MariaDB server *already set up* with a database**. Once you’ve
got all the required PHP extensions installed, you can get eZ Platform
up and running with the following commands:

~~~~ brush:
composer create-project --no-dev --keep-vcs ezsystems/ezplatform ezplatform
cd ezplatform
 
php app/console ezplatform:install clean
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For more information about the availables options with Composer
commands, see[the Composer
documentation](https://getcomposer.org/doc/03-cli.md){.external-link}.

 

### Installing another distribution {#InstallationUsingComposer-Installinganotherdistribution}

eZ Platform exists in several distributions, listed in [Step 1:
Installation](31429538.html), some with their own installer as shown in
the example below. To install the Enterprise Edition you need an eZ
Enterprise subscription and have to [set up Composer for
that](Using-Composer_31431588.html).

**eZ Platform Enterprise Edition**

~~~~ brush:
composer create-project --no-dev --keep-vcs ezsystems/ezplatform-ee
cd ezplatform-ee

# Options are listed on php app/console ezplatform:install -h
php app/console ezplatform:install studio-clean
~~~~

### Installing another version {#InstallationUsingComposer-Installinganotherversion}

The instructions above show how to install the latest stable version,
however with Composer you can specify the version and stability as well
if you want to install something else. Using <span
style="color: rgb(128,128,128);">`composer create-project -h`</span> you
can see how you can specify another version:

> <span class="s1">create-project \[options\] \[–\] \[&lt;package&gt;\]
> \[&lt;directory&gt;\] \[&lt;version&gt;\]</span>
>
>  
>
> <span class="s1">Arguments:</span>
>
> <span class="s1">  &lt;</span><span class="s2">package&gt;</span><span
> class="s1">                            Package name to be
> installed</span>
>
> <span class="s1">  &lt;</span><span
> class="s2">directory&gt;</span><span class="s1">                     
>       Directory where the files should be created</span>
>
> <span class="s1">  &lt;</span><span class="s2">version&gt;</span><span
> class="s1">                              Version, will default to
> latest</span>

Versions [can be expressed in many ways in
Composer,](https://getcomposer.org/doc/articles/versions.md){.external-link}
but the ones we recommend are:

-   Exact git tag: `v1.3.1`
-   Tilde for locking down the minor version: `~1.3.0`
    -   Equals: 1.3.\* 
-   Caret for allowing all versions within a major: `^1.3.0`
    -   Equals: 1.\* &lt;= 1.3.0

What was described above concerns stable releases, however [Composer
lets you specify stability in many
ways](https://getcomposer.org/doc/articles/versions.md#stability){.external-link},
mainly:

-   Exact git tag: `v1.4.0-beta1`
-   Stability flag on a given version: <span>`1.4.0@beta`</span>
    -   <span>Equals: versions of 1.4.0 in stability order of: beta, rc,
        stable</span>
    -   This can also be combined with tilde and caret to match ranges
        of unstable releases
-   Stability flag while omitting version: <span
    style="color: rgb(255,255,255);">’</span>`@alpha` equals latest
    available alpha release

Example:

~~~~ brush:
composer create-project --no-dev --keep-vcs ezsystems/ezplatform-demo ezplatform @beta
cd ezplatform
 
php app/console ezplatform:install demo
~~~~

#### Related: {#InstallationUsingComposer-Related:}

-   [Installation Guide for OS
    X](Installation-Guide-for-OS-X_31431738.html)
-   [Installation Guide for Unix-Based
    Systems](Installation-Guide-for-Unix-Based-Systems_31431755.html)

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


