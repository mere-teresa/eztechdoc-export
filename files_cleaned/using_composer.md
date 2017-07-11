1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 2: Going Deeper](31429542.html)</span>

<span id="title-text"> Developer : Using Composer </span> {#title-heading .pagetitle}
=========================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified on Jan 27, 2017

Keeping your system up-to-date is important to make sure it is running
optimally and securely. The update mechanism in eZ software is using
the *de facto* standard PHP packaging system called
[Composer](https://getcomposer.org/){.external-link}. 

This makes it easy to adapt package installs and updates to your
workflow, allowing you to test new/updated packages in a development
environment, place the changes in your version control system (git,
Subversion, Mercurial, etc.), pull in those changes to a staging
environment and, when approved, put them in production.

 

-   [Installing Composer](#UsingComposer-InstallingComposer)
-   [Prerequisite to using composer with eZ Enterprise
    software](#UsingComposer-PrerequisitetousingcomposerwitheZEnterprisesoftware)
    -   [Setting up Authentication tokens for access to commercial
        updates](#UsingComposer-SettingupAuthenticationtokensforaccesstocommercialupdates)
        -   [Optional: Save authentication information in auth.json to
            avoid repeatedly typing
            it](#UsingComposer-Optional:Saveauthenticationinformationinauth.jsontoavoidrepeatedlytypingit)
-   [Update workflow Using
    Composer](#UsingComposer-UpdateworkflowUsingComposer)
    -   [1. Running composer update and version changes in
        development](#UsingComposer-1.Runningcomposerupdateandversionchangesindevelopment)
    -   [2. Installing versioned updates on other development machines
        and/or staging -&gt;
        production](#UsingComposer-2.Installingversionedupdatesonotherdevelopmentmachinesand/orstaging-%3Eproduction)
-   [General notes on use of
    Composer](#UsingComposer-GeneralnotesonuseofComposer)
    -   [Installing additional packages via
        Composer](#UsingComposer-InstallingadditionalpackagesviaComposer)
    -   [Dumping autoload for better
        performance](#UsingComposer-Dumpingautoloadforbetterperformance)
    -   [Best practice for
        Bundles](#UsingComposer-BestpracticeforBundles)
        -   [Documentation](#UsingComposer-Documentation)
        -   [Git repository naming](#UsingComposer-Gitrepositorynaming)
        -   [Composer Metadata](#UsingComposer-ComposerMetadata)

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
[Composer](https://getcomposer.org/){.external-link} is an opensource
PHP packaging system to manage dependencies.

This makes it easy to adapt package installs and updates to your
workflow, allowing you to test new/updated packages in a development
environment, put the changes in your version control system (git,
Subversion, Mercurial, etc.), pull in those changes on a staging
environment and, when approved, put it in production.

Installing Composer {#UsingComposer-InstallingComposer}
===================

Composer is a command-line tool, so the main way to install it is via
command line from inside the root directory of the (eZ) software:

**Composer download in current folder:**

~~~~ brush:
php -r "readfile('https://getcomposer.org/installer');" | php
~~~~

By doing it this way you will need to execute further Composer commands
using `php composer.phar`. If you’d rather prefer to install Composer
globally on your machine instead of inside each and every project that
uses it, then follow [these instructions in online Composer
documentation](https://getcomposer.org/doc/00-intro.md#globally){.external-link}.

Prerequisite to using composer with eZ Enterprise software {#UsingComposer-PrerequisitetousingcomposerwitheZEnterprisesoftware}
==========================================================

**This section describes features available only in eZ Enterprise.**

### Setting up Authentication tokens for access to commercial updates {#UsingComposer-SettingupAuthenticationtokensforaccesstocommercialupdates}

Out of the box Composer uses a packaging repository called
[packagist.org](https://packagist.org/){.external-link} to find all
open-source packages and their updates. Additional commercial packages
are available for eZ Enterprise subscribers at
[updates.ez.no/bul/](https://updates.ez.no/bul/){.external-link} *(which
is password-protected, you will need to set up authentication tokens as
described below to get access)*.

To get access to these updates log in to your service portal on
[support.ez.no](https://support.ez.no){.external-link} and look for the
following on the *“Maintenance and Support agreement details”* screen:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31431588/31431587.png?effects=drop-shadow){.confluence-embedded-image
width="946" height="164"}</span>

1.  Click “Create token” (This requires the “Portal administrator”
    access level.)
2.  Fill in a label describing the use of the token. This will allow you
    to revoke access later.  
    -   Example, if you need to provide access to updates to a third
        party, a good example would be “53-upgrade-project-by-partner-x”

3.  Copy the password, **you will not get access to it again**!

After this, when running Composer to get updates as described below, you
will be asked for a Username and Password. Use:

-   as Username – your <span>Installation key found above on the
    *“Maintenance and Support agreement details”* page in the service
    portal</span>
-   <span>as Password – the token password you retrieved in
    step 3.</span>

Support agreement expiry

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If your Support agreement expires, your authentication token(s) will no
longer work. They will become active again if the agreement is renewed,
but this process may take up to 24 hours. (If the agreement is renewed
before the expiry date, there will be no disruption of service.)

<span>  
</span>

#### Optional: Save authentication information in auth.json to avoid repeatedly typing it {#UsingComposer-Optional:Saveauthenticationinformationinauth.jsontoavoidrepeatedlytypingit}

Composer will ask to do this for you on updates, however if it is
disabled, you can create an `auth.json` file manually in one of the
following ways:

*Option A: *Store your credentials in the project directory:

~~~~ brush:
composer config http-basic.updates.ez.no <installation-key> <token-password>
~~~~

*Option B:* If you’d rather want to install it globally
in [COMPOSER\_HOME](https://getcomposer.org/doc/03-cli.md#composer-home){.external-link} directory
for machine-wide use:

~~~~ brush:
composer config --global http-basic.updates.ez.no <installation-key> <token-password>
~~~~

Update workflow Using Composer {#UsingComposer-UpdateworkflowUsingComposer}
==============================

This section describes the best practice for using Composer, essentially
it suggests treating updates like other code/configuration/\* changes on
your project, tackling them on a development machine before staging them
for rollout on staging/production.  

### 1. Running composer update and version changes in development {#UsingComposer-1.Runningcomposerupdateandversionchangesindevelopment}

Updating eZ software via Composer is nothing different then [updating
other projects via
Composer](https://getcomposer.org/doc/03-cli.md#update){.external-link},
but for illustration here is how you update your project locally:

**composer update**

~~~~ brush:
php -d memory_limit=-1 composer.phar update --no-dev --prefer-dist
~~~~

Tip

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
This will load in all updated packages, from eZ as well as third-party
libraries, both used by eZ and other you may have added. When updating
like this it is recommended to take note of what was updated so you have
an idea of what you should test before putting the updates into
production.

At this stage you might need to manually clear Symfony’s `prod`
environment class cache (cached interfaces and lazy services) in case
the classes/interfaces in it have changed. This can be done in the
following way:

**Optional prod class cache clearing**

~~~~ brush:
rm -f app/cache/prod/*.php
~~~~

When the update has completed and local install is verified to work,
make sure to version changes done to the `composer.lock` file (if you
use a version control system like *git*). This file contains **all
details of which versions are currently used** and makes sure the same
version is used among all developers, staging and eventually production
when current changes are approved for production (assuming you have a
workflow for this).

 

Tip

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
In large development teams make sure people don’t blindly update and
install third party components. This might easily lead to version
conflicts on `composer.lock` and can be tiring to fix up if happening
frequently. A workflow involving composer install and unit test
execution on proposed changes can help avoid most of this, like the Pull
Request workflow available via Github/Bitbucket.

### 2. Installing versioned updates on other development machines and/or staging -&gt; production {#UsingComposer-2.Installingversionedupdatesonotherdevelopmentmachinesand/orstaging->production}

Installing eZ software packages via Composer is nothing different
then [installing vanilla packages via
Composer](https://getcomposer.org/doc/03-cli.md#install){.external-link},
and for illustration here is how you install versioned updates:

**composer install (package installation)**

~~~~ brush:
php -d memory_limit=-1 composer.phar install --no-dev --prefer-dist
~~~~

Tip

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
Here the importance of `composer.lock` comes in, as this command will
tell Composer to install packages in exactly the same version as defined
in this file. If you don’t keep track of `composer.lock`, it will
instead just install always the latest version of a package and won’t
allow you to stage updates before moving towards production.

General notes on use of Composer {#UsingComposer-GeneralnotesonuseofComposer}
================================

Installing additional packages via Composer {#UsingComposer-InstallingadditionalpackagesviaComposer}
-------------------------------------------

Requiring eZ software packages via Composer is also done in same way
as [requiring vanilla packages via
Composer](https://getcomposer.org/doc/03-cli.md#require){.external-link},
and for illustration here is how you install the community-developed
[EzPriceBundle](https://github.com/ezcommunity/EzPriceBundle){.external-link}:

**composer install (package installation)**

~~~~ brush:
php -d memory_limit=-1 composer.phar require --prefer-dist ezcommunity/ez-price-bundle:~1.0.0@beta
~~~~

Dumping autoload for better performance {#UsingComposer-Dumpingautoloadforbetterperformance}
---------------------------------------

For PHP 5.6 and up you’ll get a notable performance improvement by
making composer dump optimized autoload array, this can be done on
composer install and update, but also using:

`php -d memory_limit=-1 composer.phar dump-autoload --optimize`

Best practice for Bundles {#UsingComposer-BestpracticeforBundles}
-------------------------

Best practice for Bundles is described in Symfony documentation
under [Best Practices for Reusable
Bundles](http://symfony.com/doc/current/cookbook/bundles/best_practices.html){.external-link},
with eZ bundles there is some notable exceptions:

##### Documentation {#UsingComposer-Documentation}

-   You may write your documentation using markdown (.md) if you prefer,
    however .rst is recommended if you plan to
    use [writethedocs.org](http://writethedocs.org){.external-link}, as
    heavily used by many open source projects.

##### Git repository naming {#UsingComposer-Gitrepositorynaming}

-   You may omit vendor name in repository naming, assuming vendor name
    is reflected in organization / user account it is attached to.
-   You may also choose to follow composer package naming on repository
    name which is more relevant when trying to find a given
    package later.

##### Composer Metadata {#UsingComposer-ComposerMetadata}

-   For defining `"type"`, the following are at the moment known valid
    values:
    -   <span style="color: rgb(0,128,0);">`ezplatform-bundle`<span
        style="color: rgb(128,128,128);"> | Symfony bundles that uses eZ
        Platform features</span></span>
    -   `ezstudio-bundle`<span><span
        style="color: rgb(128,128,128);"> | </span><span><span
        style="color: rgb(128,128,128);">Symfony bundles that uses eZ
        Platform Enterprise Edition features*  
        *</span></span></span>
    -   <span style="color: rgb(0,128,0);">`symfony-bundle`<span
        style="color: rgb(128,128,128);"> | Standard symfony bundles as
        described in Symfony doc.</span></span>
-   For eZ Publish (legacy) and eZ Publish Platform there where also:
    -   <span
        style="color: rgb(0,128,0);">`ezpublish-legacy-extension`<span
        style="color: rgb(128,128,128);"> | For standalone 4.x (legacy)
        extensions, to be used
        with [ezpublish-legacy-installer](https://github.com/ezsystems/ezpublish-legacy-installer){.external-link}</span></span>
    -   `ezpublish-bundle | For eZ Publish Platform 5.x bundles, may optionally be a "legacy bundle".`

-   [Installing Composer](#UsingComposer-InstallingComposer)
-   [Prerequisite to using composer with eZ Enterprise
    software](#UsingComposer-PrerequisitetousingcomposerwitheZEnterprisesoftware)
    -   [Setting up Authentication tokens for access to commercial
        updates](#UsingComposer-SettingupAuthenticationtokensforaccesstocommercialupdates)
        -   [Optional: Save authentication information in auth.json to
            avoid repeatedly typing
            it](#UsingComposer-Optional:Saveauthenticationinformationinauth.jsontoavoidrepeatedlytypingit)
-   [Update workflow Using
    Composer](#UsingComposer-UpdateworkflowUsingComposer)
    -   [1. Running composer update and version changes in
        development](#UsingComposer-1.Runningcomposerupdateandversionchangesindevelopment)
    -   [2. Installing versioned updates on other development machines
        and/or staging -&gt;
        production](#UsingComposer-2.Installingversionedupdatesonotherdevelopmentmachinesand/orstaging-%3Eproduction)
-   [General notes on use of
    Composer](#UsingComposer-GeneralnotesonuseofComposer)
    -   [Installing additional packages via
        Composer](#UsingComposer-InstallingadditionalpackagesviaComposer)
    -   [Dumping autoload for better
        performance](#UsingComposer-Dumpingautoloadforbetterperformance)
    -   [Best practice for
        Bundles](#UsingComposer-BestpracticeforBundles)
        -   [Documentation](#UsingComposer-Documentation)
        -   [Git repository naming](#UsingComposer-Gitrepositorynaming)
        -   [Composer Metadata](#UsingComposer-ComposerMetadata)

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2014-06-02 at 12.54.06 .png](attachments/31431588/31431587.png)
(image/png)  

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


