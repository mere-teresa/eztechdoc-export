1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 2: Going Deeper](31429542.html)</span>
5.  <span>[Using Composer](Using-Composer_31431588.html)</span>

<span id="title-text"> Developer : Composer for System Administrators </span> {#title-heading .pagetitle}
=============================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified by <span class="editor"> Dominika Kurek</span> on May 05, 2016

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
[Composer](https://getcomposer.org/){.external-link} is an opensource
PHP packaging system to manage dependencies.

This makes it easy to adapt package installs and updates to your
workflow, allowing you to test new/updated packages in a development
environment, put the changes in your version control system (git,
Subversion, Mercurial, etc.), pull in those changes on a staging
environment and, when approved, put it in production.

composer.phar or composer ?

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
The following examples use a `composer install` global command, as
alternative use `php composer.phar <command>`.  
Read the answer in the FAQ:[What Composer command-line do you have to
use ?](https://doc.ez.no/pages/viewpage.action?pageId=23529122)

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
See [the Composer
documentation](https://getcomposer.org/doc/00-intro.md){.external-link}
for further information

Technical prerequisites {#ComposerforSystemAdministrators-Technicalprerequisites}
=======================

Composer requires PHP 5.3.2+ to run.

Useful Composer commands for System Administrators {#ComposerforSystemAdministrators-UsefulComposercommandsforSystemAdministrators}
==================================================

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Note: as usual with CLI, you can type:

    $> php composer.phar help [--xml] [--format="..."] [--raw] [command_name]

to get help for the command.

 

On this page you will find some useful commands and an extract of the
Composer Documentation. The interesting options part is an extract of
available options

show {#ComposerforSystemAdministrators-show}
----

The `show` command displays detailed information about a package, or
lists all available packages.

### Usage: {#ComposerforSystemAdministrators-Usage:}

~~~~ brush:
 php composer.phar show [-i|--installed] [-p|--platform] [-a|--available] [-s|--self] [-N|--name-only] [-P|--path] [package] [version]
~~~~

require {#ComposerforSystemAdministrators-require}
-------

The `require` command adds required packages to your composer.json and
installs them. If you do not want to install the new dependencies
immediately, you can call it with `--no-update`

### Usage: {#ComposerforSystemAdministrators-Usage:.1}

~~~~ brush:
php composer.phar require [--dev] [--prefer-source] [--prefer-dist] [--no-progress] [--no-update] [--update-no-dev] [--update-with-dependencies] [packages1] ... [packagesN]
~~~~

### Interesting options {#ComposerforSystemAdministrators-Interestingoptions}

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"> </th>
<th align="left"> </th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"> –prefer-source</td>
<td align="left">Forces installation from package sources when possible, including VCS information.</td>
</tr>
<tr class="even">
<td align="left"> –prefer-dist</td>
<td align="left"><p>Forces installation from package dist even for dev versions.</p></td>
</tr>
<tr class="odd">
<td align="left"> –no-progress</td>
<td align="left"><p>Do not output download progress.</p></td>
</tr>
<tr class="even">
<td align="left"> –no-update</td>
<td align="left"><p>Disables the automatic update of the dependencies.</p></td>
</tr>
<tr class="odd">
<td align="left"> –update-with-dependencies</td>
<td align="left"><p>Allows inherited dependencies to be updated with explicit dependencies.</p></td>
</tr>
</tbody>
</table>

 

search {#ComposerforSystemAdministrators-search}
------

The `search` command searches for packages by its name.

### Example : {#ComposerforSystemAdministrators-Example:}

~~~~ brush:
$> php composer.phar search symfony composer
~~~~

 can return to you a list like this:

 

**** <span class="collapse-source expand-control"><span
class="expand-control-icon icon"> </span><span
class="expand-control-text">Expand source</span></span>

~~~~ brush:
symfony/assetic-bundle Integrates Assetic into Symfony2
symfony/monolog-bundle Symfony MonologBundle
ezsystems/ngsymfonytools-bundle Bundle of the legacy netgen/ngsymfonytools extension
symfony-cmf/routing Extends the Symfony2 routing component for dynamic routes and chaining several routers
doctrine/doctrine-bundle Symfony DoctrineBundle
nelmio/cors-bundle Adds CORS (Cross-Origin Resource Sharing) headers support in your Symfony2 application
tedivm/stash-bundle Incorporates the Stash caching library into Symfony.
egulias/listeners-debug-command-bundle Symfony 2 console command to debug listeners
hautelook/templated-uri-router Symfony2 RFC-6570 compatible router and URL Generator
hautelook/templated-uri-bundle Symfony2 Bundle that provides a RFC-6570 compatible router and URL Generator.
symfony/swiftmailer-bundle Symfony SwiftmailerBundle
white-october/pagerfanta-bundle Bundle to use Pagerfanta with Symfony2
symfony/icu Contains an excerpt of the ICU data and classes to load it.
symfony/symfony The Symfony PHP framework
sensio/distribution-bundle The base bundle for the Symfony Distributions
symfony/symfony The Symfony PHP framework
symfony/console Symfony Console Component
symfony/filesystem Symfony Filesystem Component
symfony/finder Symfony Finder Component
symfony/process Symfony Process Component
symfony/yaml Symfony Yaml Component
symfony/translation Symfony Translation Component
symfony/debug Symfony Debug Component
symfony/routing Symfony Routing Component
symfony/icu Contains an excerpt of the ICU data to be used with symfony/intl.
symfony/config Symfony Config Component
symfony/validator Symfony Validator Component
symfony/stopwatch Symfony Stopwatch Component
symfony-cmf/symfony-cmf Symfony Content Management Framework
~~~~

validate {#ComposerforSystemAdministrators-validate}
--------

The `validate` command validates a given composer.json.

###  Usage {#ComposerforSystemAdministrators-Usage}

~~~~ brush:
 $> php composer.phar validate [--no-check-all] [file]
~~~~

### Interesting options {#ComposerforSystemAdministrators-Interestingoptions.1}

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">option</th>
<th align="left">description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p> –no-check-all </p></td>
<td align="left">Do not make a complete validation</td>
</tr>
<tr class="even">
<td align="left"><p> –profile </p></td>
<td align="left">Display timing and memory usage information</td>
</tr>
<tr class="odd">
<td align="left"> –working-dir (-d)</td>
<td align="left">If specified, use the given directory as working directory.</td>
</tr>
</tbody>
</table>

Automate installation {#ComposerforSystemAdministrators-Automateinstallation}
=====================

Note that you can add some scripts to the Composer dependencies
installation.

The available events are :

-   **pre-install-cmd**
-   **post-install-cmd**
-   **pre-update-cmd**
-   **post-update-cmd**
-   **pre-status-cmd**
-   **post-status-cmd**
-   **pre-package-install**
-   **post-package-install**
-   **pre-package-update**
-   **post-package-update**
-   **pre-package-uninstall**
-   **post-package-uninstall**
-   **pre-autoload-dump**
-   **post-autoload-dump**
-   **post-root-package-install**
-   **post-create-project-cmd**
-   **pre-archive-cmd**
-   **post-archive-cmd**  
      

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
See [the Composer
documentation](https://getcomposer.org/doc/articles/scripts.md){.external-link}
about scripts for more information

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


