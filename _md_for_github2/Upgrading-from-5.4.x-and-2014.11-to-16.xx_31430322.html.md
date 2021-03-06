1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Migrating to eZ Platform - Follow the Ibex!](31429532.html)</span>
4.  <span>[Coming to eZ Platform from eZ Publish Platform](Coming-to-eZ-Platform-from-eZ-Publish-Platform_31429598.html)</span>

<span id="title-text"> Developer : Upgrading from 5.4.x and 2014.11 to 16.xx </span>
====================================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Mar 23, 2017

Beta

<span class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
Instructions and scripts provided here are open for testing and feedback, and for eZ Enterprise users eZ will take care about bugs over support, however until 2017 when features like custom tags are in place, and community provides feedback on how this works "in the wild", this will continue to be labeled as beta.

Topics you should be aware of when planning an upgrade:

-   [Field Types reference](Field-Types-reference_31430495.html) for overview of Field Types that exists and not on eZ Platform
-   RichText Field Type capabilities, currently not covering:
    -   <a href="https://jira.ez.no/browse/EZP-25541" class="external-link">Tables</a>
    -   <a href="https://jira.ez.no/browse/EZP-25357" class="external-link">Custom Tags</a>
-   Symfony 2.8, this is also the case on later 5.4.x versions, but not the first once including 2014.11
-   API changes, while we have a strict Backwards Compatibility focus, some deprecated API features where removed, some changes where done to internal parts of the system, and as planned eZ Publish legacy and legacy bridge was removed. See <a href="https://github.com/ezsystems/ezpublish-kernel/blob/v6.6.0/doc/bc/changes-6.0.md" class="external-link">ezpublish-kernel:doc/bc/changes-6.0.md</a>

<span style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">
</span>

<span style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;"> </span>
-   [Note on Paths](#Upgradingfrom5.4.xand2014.11to16.xx-NoteonPaths)
-   [Check for requirements](#Upgradingfrom5.4.xand2014.11to16.xx-Checkforrequirements)
-   [Upgrade steps](#Upgradingfrom5.4.xand2014.11to16.xx-Upgradesteps)
    -   [Step 1: Extract latest eZ Platform/Enterprise 16.02.x installation](#Upgradingfrom5.4.xand2014.11to16.xx-Step1:ExtractlatesteZPlatform/Enterprise16.02.xinstallation)
    -   [Step 2: Move over code and config](#Upgradingfrom5.4.xand2014.11to16.xx-Step2:Moveovercodeandconfig)
        -   [2.1. Code](#Upgradingfrom5.4.xand2014.11to16.xx-2.1.Code)
        -   [2.2. Composer](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.Composer)
            -   [2.2.1 Move over own packages](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.1Moveoverownpackages)
            -   [2.2.2 Temporarily install XmlText Field Type](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.2TemporarilyinstallXmlTextFieldType)
        -   [2.3. Config](#Upgradingfrom5.4.xand2014.11to16.xx-2.3.Config)
        -   [2.4. Bundles](#Upgradingfrom5.4.xand2014.11to16.xx-2.4.Bundles)
        -   [2.5 Binary files](#Upgradingfrom5.4.xand2014.11to16.xx-2.5Binaryfiles)
        -   [2.6 Re-apply permissions and update composer](#Upgradingfrom5.4.xand2014.11to16.xx-2.6Re-applypermissionsandupdatecomposer)
        -   [2.7 Register EzSystemsEzPlatformXmlTextFieldTypeBundle](#Upgradingfrom5.4.xand2014.11to16.xx-2.7RegisterEzSystemsEzPlatformXmlTextFieldTypeBundle)
    -   [Step 3: Upgrade the database](#Upgradingfrom5.4.xand2014.11to16.xx-Step3:Upgradethedatabase)
        -   [3.1. Execute update SQL](#Upgradingfrom5.4.xand2014.11to16.xx-3.1.ExecuteupdateSQL)
        -   [3.2. Execute XmlText Migration script](#Upgradingfrom5.4.xand2014.11to16.xx-3.2.ExecuteXmlTextMigrationscript)
        -   [3.3. Migrate Page field to Landing Page (eZ Enterprise only)](#Upgradingfrom5.4.xand2014.11to16.xx-3.3.MigratePagefieldtoLandingPage(eZEnterpriseonly))
    -   [Step 4: Re-configure web server & proxy](#Upgradingfrom5.4.xand2014.11to16.xx-Step4:Re-configurewebserver&proxy)
        -   [Varnish (optional)](#Upgradingfrom5.4.xand2014.11to16.xx-Varnish(optional))
        -   [Web server configuration](#Upgradingfrom5.4.xand2014.11to16.xx-Webserverconfiguration)
    -   [Step 5: Link assets](#Upgradingfrom5.4.xand2014.11to16.xx-Step5:Linkassets)
-   [Potential pitfalls](#Upgradingfrom5.4.xand2014.11to16.xx-Potentialpitfalls)
    -   [Unstyled login screen after upgrade](#Upgradingfrom5.4.xand2014.11to16.xx-Unstyledloginscreenafterupgrade)
    -   [Translating URLs](#Upgradingfrom5.4.xand2014.11to16.xx-TranslatingURLs)

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Instructions for upgrading from eZ Publish to eZ Platform and eZ Enterprise is in preview starting release [16.02](eZ-Platform-16.02-Release-notes_31430106.html). The status of the upgrade is:

-   eZ Platform: **XmlText to RichText migration**: *In Beta, and described below.*
-   eZ Enterprise: **Flow to Landing Page migration**: *Scheduled for beta version with 16.04.*

<span style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;"> </span>

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
If you are migrating from a legacy eZ Publish version, this page contains the information you need. However, first have a look at an overview of the process in [Migration from eZ Publish](Migration-from-eZ-Publish_31430320.html).

<span style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">This section describes how to upgrade your existing  eZ Publish Platform  5.4/2014.11 installation to eZ Platform and eZ Enterprise. Make sure that you have a working backup of the site before you do the actual upgrade, and that the installation you are performing the upgrade on is offline.</span>

Note on Paths
-------------

-   *&lt;old-ez-root&gt;/*: The root directory where the 5.4/2014.11 installation is located in, for example: "*/home/myuser/old\_www*/" or "*/var/sites/ezp/*"*
    *
-   *&lt;new-ez-root&gt;/*: The root directory where the installation is located in, for example: "*/home/myuser/new\_www*/" or "*/var/sites/\[ezplatform|ezplatform-ee\]/*"

Check for requirements
----------------------

-   Information regarding system requirements can be found on the <span class="confluence-link"> </span> [<span class="confluence-link">Requirements documentation page</span>](31429536.html); notable changes include:
    -   PHP 5.5.9 or higher
    -   MySQL or MariaDB 5.5 or higher
    -   Browser from 2015 or newer for use with backend UI
-   This page assumes you have composer installed on the machine and that it is a somewhat recent version. See [Using Composer](Using-Composer_31431588.html).

[]()

Upgrade steps[]()
-----------------

### Step 1: Extract latest eZ Platform/Enterprise 16.02.x installation

The easiest way to upgrade the distribution files is to extract a clean installation of eZ Platform / eZ Enterprise to a separate directory.

### Step 2: Move over code and config

##### 2.1. Code

If you have code in src folder, move that over:

-   `              <old-ez-root>/ src =>  <new-ez-root>/            ` `src`

##### 2.2. Composer

###### 2.2.1 Move over own packages

Assuming you have own composer packages *(libraries and bundles, but not eZ Publish legacy packages)*, execute commands like below to add them to new install in &lt;new-ez-root&gt;:

`composer ` `require` `--no-update ` `"vendor/package:~1.3.0"`

*Adapt the command with your* * `vendor`, `package`, version number, and add `"–dev"` if a given package is for dev use. Also check if there are other changes in `composer.json` you should move over.*

###### <span style="color: rgb(14,175,255);">2.2.2 Temporarily install XmlText Field Type</span>

While no longer bundled, the XmlText Field Type exists and is needed to perform migration from eZ Publish's XmlText to the new docbook-based format used by RichText Field Type. From &lt;new-ez-root&gt; execute:

`composer ` `require` `--no-update --dev ` `"ezsystems/ezplatform-xmltext-fieldtype:^1.1.0`"

##### 2.3. Config

To move over your own custom configurations, follow the conventions below and manually move the settings over:

-   `               <old-ez-root>/  ezpublish/config/parameters.yml =>  <new-ez-root>/   app/config/parameters.yml            `
    -   <span style="color: rgb(128,128,128);"> *For parameters like before, for new parameters you'll be prompted on later step.* </span>
-   `              <old-ez-root>/              ezpublish/config/config.yml     =>  <new-ez-root>/              app/config/config.yml           `
    -   <span style="color: rgb(128,128,128);"> *For system/framework config, and for defining global db, cache, search settings.* </span>
-   `              <old-ez-root>/              ezpublish/config/ezpublish.yml  =>  <new-ez-root>/              app/config/ezplatform.yml`
    -   <span style="color: rgb(128,128,128);"> *For site access, site groups and repository settings.* </span>

Changes to repository configuration

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
When moving <span>configuration</span> over, be aware that as of 5.4.5 and higher, repository configuration has been enhanced to allow configuring storage engine and search engine independently.

                 
     
              

**Default ezplatform.yml repositories configuration with comments**

``` brush:
ezpublish:
    # Repositories configuration, setup default repository to support solr if enabled
    repositories:
        default:
            # For storage engine use kernel default (current LegacyStorageEngine)
            storage: ~
            # For search engine, pick the one configured in parameters.yml, either "legacy" or "solr"
            # see SolrBundle for further info: https://doc.ez.no/display/TECHDOC/Solr+Bundle
            search:
                engine: %search_engine%
                connection: default
```

Make sure to adapt siteaccess names

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
In the default configurations in **ezplatform.yml** you'll find existing siteaccesses like **site**, and depending on installation perhaps a few others, all under site group **site\_group**. Make sure to change those to what you had in **ezpublish.yml** to avoid issues with having to login to your website, given user/login policy rules will need to be updated if you change names of siteaccess as part of the upgrade.

##### 2.4. Bundles

Move over registration of bundles you have from src and from composer packages, from old to new kernel:

-   `                <old-ez-root>/                ezpublish/EzPublishKernel.php =>  <new-ez-root>/                  app/AppKernel.php             `

##### <span style="font-family: monospace;"> <span style="line-height: 20.0px;">2.5 Binary files</span> </span>

Binary files can simply be copied from the old to the new installation:

-   `               <old-ez-root>/ web/var[/<site_name>]/storage              =>  <new-ez-root>/ web/var[/<site_name>]/storage           `

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
In the eZ Publish Platform 5.x install `web/var` is a symlink to `ezpublish_legacy/var`, so if you can't find it in path above you can instead copy the storage files from the similar `ezpublish_legacy` path.

##### <span style="font-family: monospace;"> <span style="line-height: 20.0px;">2.6 Re-apply permissions and update composer</span> </span>

<span>Since writable directories and files have been replaced / copied, their permissions might have changed. Re-apply permissions as explained in the installation instructions. <span class="status-macro aui-lozenge aui-lozenge-current aui-lozenge-subtle">TODO: LINK</span> </span>

When that is done, execute the following to update and install all packages from within `<new-ez-root>`\*:

<span> `composer update --prefer-dist           ` </span>

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
At the end of the process, you will be asked for values for parameters.yml not already moved from old installation, or new *(as defined in parameters.yml.dist)*.

##### 2.7 Register EzSystemsEzPlatformXmlTextFieldTypeBundle

Add the following new bundle to your new kernel file, <span> <span style="color: rgb(128,128,128);"> *&lt;new-ez-root&gt;/* </span> </span> <span> **app**/AppKernel.php</span>:

`new EzSystems\EzPlatformXmlTextFieldTypeBundle\EzSystemsEzPlatformXmlTextFieldTypeBundle(),` 

### Step 3: Upgrade the database

##### 3.1. Execute update SQL

Import to your database the changes provided in one of the following files, optionally read inline comments as you might not need to run some cleanup queries:

`MySQL: <new-ez-root>/vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql`

`           Postgres: <new-ez-root>/vendor/ezsystems/ezpublish-kernel/data/update/postgres/dbupdate-6.1.0-to-6.2.0.sql         `

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
*Instructions on purpose does not use `dbupdate-5.4.0-to-6.2.0.sql` <a href="https://github.com/ezsystems/ezpublish-kernel/blob/v6.2.0/data/update/mysql/dbupdate-5.4.0-to-6.2.0.sql" class="external-link">as it contains issues with the sql, and the sql update file above contains all relevant schema updates.</a>*

<span>
</span>

##### 3.2. Execute XmlText Migration script

For migrating content from the XmlText format to the new RichText format, a migration script exists, execute the following from &lt;new-ez-root&gt;:

`php app/console ezxmltext:convert-to-richtext -v`

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
The migration script is currently in beta, which is why command example is suggested with verbose flag. Feedback on how it works and on how we can improve it is welcome <a href="https://github.com/ezsystems/ezplatform-xmltext-fieldtype" class="external-link">on the repository</a>.

##### 3.3. Migrate Page field to Landing Page (eZ Enterprise only)

If you have Page field (ezflow) content and an eZ Enterprise subscription, you can use a script to migrate your Page content to eZ Enterprise Landing Page. See <span class="confluence-link"> [Migrating legacy Page field (ezflow) to Landing Page (Enterprise)](31431405.html) </span> for more information.

### Step 4: Re-configure web server & proxy

#### Varnish *(optional)*

If you use Varnish, the recommended Varnish (3 and 4) VCL configuration can be found in the `doc/varnish` folder. See also the [Using Varnish](https://doc.ez.no/display/DEVELOPER/HTTP+Cache#HTTPCache-UsingVarnish) page.

#### Web server configuration

The officially recommended virtual configuration is now shipped in the `doc` folder, for both apache2 (`doc/apache2`) and nginx (`doc/nginx`). Both are built to be easy to understand and use, but aren't meant as drop-in replacements for your existing configuration.

As was the case starting 5.4, one notable change is that `SetEnvIf` is now used to dynamically change rewrite rules depending on the Symfony environment. It is currently used for the assetic production rewrite rules.

### Step 5: Link assets

Assets from the various bundles need to be made available for the webserver through the web/ document root, execute the following commands from &lt;new-ez-root&gt;:

``` brush:
php app/console assets:install --env=prod --symlink
php app/console assetic:dump --env=prod
```

Potential pitfalls
------------------

##### Unstyled login screen after upgrade

It is possible that after the upgrade your admin screen will be unstyled. This may happen because the new siteaccess will not be available in the database. You can fix it by editing the permissions for the Anonymous user. Go to Roles in the Admin Panel and edit the Limitations of the Anonymous user's user/login policy. Add all siteaccesses to the Limitation, save, and clear the browser cache. The login screen should now show proper styling.

##### Translating URLs

If your legacy site uses old-style URL aliases, to upgrade them successfully you need to apply a workaround to the slug converter. Where the slug converter service is defined, set second config parameter to use `urlalias_compat` by adding a new argument to the existing settings:

**in vendor/ezsystems/ezpublish-kernel/eZ/Publish/Core/settings/storage\_engines/common.yml**

``` brush:
    ezpublish.persistence.slug_converter:
        class: "%ezpublish.persistence.slug_converter.class%"
        arguments:
            - "@ezpublish.api.storage_engine.transformation_processor"
            - { transformation: "urlalias_compat" }
```

In case of URLs with extended UTF-encoded names, the workaround must make use of `urlalias_iri`:

``` brush:
    ezpublish.persistence.slug_converter:
        class: "%ezpublish.persistence.slug_converter.class%"
        arguments:
            - "@ezpublish.api.storage_engine.transformation_processor"
            - { transformation: "urlalias_iri" }
```

 

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


