<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 2: Going Deeper](31429542.html)
5.  [Using Composer](Using-Composer_31431588.html)

</div>
**Developer : Composer for System Administrators**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified by Dominika Kurek on May
05, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
[Composer](https://getcomposer.org/) is an opensource PHP packaging
system to manage dependencies.

This makes it easy to adapt package installs and updates to your
workflow, allowing you to test new/updated packages in a development
environment, put the changes in your version control system (git,
Subversion, Mercurial, etc.), pull in those changes on a staging
environment and, when approved, put it in production.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
composer.phar or composer ?

<div class="confluence-information-macro-body">
The following examples use a `composer install` global command, as
alternative use `php composer.phar <command>`.\
Read the answer in the FAQ:[What Composer command-line do you have to
use ?](https://doc.ez.no/pages/viewpage.action?pageId=23529122)

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
See [the Composer
documentation](https://getcomposer.org/doc/00-intro.md) for further
information

</div>
</div>
**Technical prerequisites**

Composer requires PHP 5.3.2+ to run.

**Useful Composer commands for System Administrators**

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Note: as usual with CLI, you can type:

    $> php composer.phar help [--xml] [--format="..."] [--raw] [command_name]

to get help for the command.

</div>
</div>
 

On this page you will find some useful commands and an extract of the
Composer Documentation. The interesting options part is an extract of
available options

**show**

The `show` command displays detailed information about a package, or
lists all available packages.

**Usage:**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
php composer.phar show [-i|--installed] [-p|--platform] [-a|--available] [-s|--self] [-N|--name-only] [-P|--path] [package] [version]
```

</div>
</div>
**require**

The `require` command adds required packages to your composer.json and
installs them. If you do not want to install the new dependencies
immediately, you can call it with `--no-update`

**Usage:**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
php composer.phar require [--dev] [--prefer-source] [--prefer-dist] [--no-progress] [--no-update] [--update-no-dev] [--update-with-dependencies] [packages1] ... [packagesN]
```

</div>
</div>
**Interesting options**

<div class="table-wrap">
  -------------------------------------------------------------------------
                                        
  ------------------------------------ ------------------------------------
   –prefer-source                      Forces installation from package
                                       sources when possible, including VCS
                                       information.

   –prefer-dist                        Forces installation from package
                                       dist even for dev versions.

   –no-progress                        Do not output download progress.

   –no-update                          Disables the automatic update of the
                                       dependencies.

   –update-with-dependencies           Allows inherited dependencies to be
                                       updated with explicit dependencies.
  -------------------------------------------------------------------------

</div>
 

**search**

The `search` command searches for packages by its name.

**Example :**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$> php composer.phar search symfony composer
```

</div>
</div>
 can return to you a list like this:

 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl hide-border-bottom">
\**\**  Expand source

</div>
<div class="codeContent panelContent pdl hide-toolbar">
``` {.sourceCode .brush:}
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
```

</div>
</div>
**validate**

The `validate` command validates a given composer.json.

** Usage**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$> php composer.phar validate [--no-check-all] [file]
```

</div>
</div>
**Interesting options**

<div class="table-wrap">
  -------------------------------------------------------------------------
  option                               description
  ------------------------------------ ------------------------------------
   –no-check-all                       Do not make a complete validation

   –profile                            Display timing and memory usage
                                       information

   –working-dir (-d)                   If specified, use the given
                                       directory as working directory.
  -------------------------------------------------------------------------

</div>
**Automate installation**

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

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
See [the Composer
documentation](https://getcomposer.org/doc/articles/scripts.md) about
scripts for more information

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

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

