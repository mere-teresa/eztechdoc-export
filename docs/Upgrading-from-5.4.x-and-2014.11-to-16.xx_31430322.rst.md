<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Migrating to eZ Platform - Follow the Ibex!](31429532.html)
4.  [Coming to eZ Platform from eZ Publish
    Platform](Coming-to-eZ-Platform-from-eZ-Publish-Platform_31429598.html)

</div>
**Developer : Upgrading from 5.4.x and 2014.11 to 16.xx**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Mar 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div class="attribute-heading">
<div
class="confluence-information-macro confluence-information-macro-warning">
Beta

<div class="confluence-information-macro-body">
Instructions and scripts provided here are open for testing and
feedback, and for eZ Enterprise users eZ will take care about bugs over
support, however until 2017 when features like custom tags are in place,
and community provides feedback on how this works “in the wild”, this
will continue to be labeled as beta.

Topics you should be aware of when planning an upgrade:

-   [Field Types reference](Field-Types-reference_31430495.html) for
    overview of Field Types that exists and not on eZ Platform
-   RichText Field Type capabilities, currently not covering:
    -   [Tables](https://jira.ez.no/browse/EZP-25541)
    -   [Custom Tags](https://jira.ez.no/browse/EZP-25357)
-   Symfony 2.8, this is also the case on later 5.4.x versions, but not
    the first once including 2014.11
-   API changes, while we have a strict Backwards Compatibility focus,
    some deprecated API features where removed, some changes where done
    to internal parts of the system, and as planned eZ Publish legacy
    and legacy bridge was removed. See
    [ezpublish-kernel:doc/bc/changes-6.0.md](https://github.com/ezsystems/ezpublish-kernel/blob/v6.6.0/doc/bc/changes-6.0.md)

</div>
</div>
<div class="toc-macro rbtoc1490376006998">
-   [Note on Paths](#Upgradingfrom5.4.xand2014.11to16.xx-NoteonPaths)
-   [Check for
    requirements](#Upgradingfrom5.4.xand2014.11to16.xx-Checkforrequirements)
-   [Upgrade steps](#Upgradingfrom5.4.xand2014.11to16.xx-Upgradesteps)
    -   [Step 1: Extract latest eZ Platform/Enterprise 16.02.x
        installation](#Upgradingfrom5.4.xand2014.11to16.xx-Step1:ExtractlatesteZPlatform/Enterprise16.02.xinstallation)
    -   [Step 2: Move over code and
        config](#Upgradingfrom5.4.xand2014.11to16.xx-Step2:Moveovercodeandconfig)
        -   [2.1. Code](#Upgradingfrom5.4.xand2014.11to16.xx-2.1.Code)
        -   [2.2.
            Composer](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.Composer)
            -   [2.2.1 Move over own
                packages](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.1Moveoverownpackages)
            -   [2.2.2 Temporarily install XmlText Field
                Type](#Upgradingfrom5.4.xand2014.11to16.xx-2.2.2TemporarilyinstallXmlTextFieldType)
        -   [2.3.
            Config](#Upgradingfrom5.4.xand2014.11to16.xx-2.3.Config)
        -   [2.4.
            Bundles](#Upgradingfrom5.4.xand2014.11to16.xx-2.4.Bundles)
        -   [2.5 Binary
            files](#Upgradingfrom5.4.xand2014.11to16.xx-2.5Binaryfiles)
        -   [2.6 Re-apply permissions and update
            composer](#Upgradingfrom5.4.xand2014.11to16.xx-2.6Re-applypermissionsandupdatecomposer)
        -   [2.7
            Register EzSystemsEzPlatformXmlTextFieldTypeBundle](#Upgradingfrom5.4.xand2014.11to16.xx-2.7RegisterEzSystemsEzPlatformXmlTextFieldTypeBundle)
    -   [Step 3: Upgrade the
        database](#Upgradingfrom5.4.xand2014.11to16.xx-Step3:Upgradethedatabase)
        -   [3.1. Execute update
            SQL](#Upgradingfrom5.4.xand2014.11to16.xx-3.1.ExecuteupdateSQL)
        -   [3.2. Execute XmlText Migration
            script](#Upgradingfrom5.4.xand2014.11to16.xx-3.2.ExecuteXmlTextMigrationscript)
        -   [3.3. Migrate Page field to Landing Page (eZ
            Enterprise only)](#Upgradingfrom5.4.xand2014.11to16.xx-3.3.MigratePagefieldtoLandingPage(eZEnterpriseonly))
    -   [Step 4: Re-configure web server &
        proxy](#Upgradingfrom5.4.xand2014.11to16.xx-Step4:Re-configurewebserver&proxy)
        -   [Varnish (optional)](#Upgradingfrom5.4.xand2014.11to16.xx-Varnish(optional))
        -   [Web server
            configuration](#Upgradingfrom5.4.xand2014.11to16.xx-Webserverconfiguration)
    -   [Step 5: Link
        assets](#Upgradingfrom5.4.xand2014.11to16.xx-Step5:Linkassets)
-   [Potential
    pitfalls](#Upgradingfrom5.4.xand2014.11to16.xx-Potentialpitfalls)
    -   [Unstyled login screen after
        upgrade](#Upgradingfrom5.4.xand2014.11to16.xx-Unstyledloginscreenafterupgrade)
    -   [Translating
        URLs](#Upgradingfrom5.4.xand2014.11to16.xx-TranslatingURLs)

</div>
<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Instructions for upgrading from eZ Publish to eZ Platform and eZ
Enterprise is in preview starting release
[16.02](eZ-Platform-16.02-Release-notes_31430106.html). The status of
the upgrade is:

-   eZ Platform: **XmlText to RichText migration**: *In Beta, and
    described below.*
-   eZ Enterprise: **Flow to Landing Page migration**: *Scheduled for
    beta version with 16.04.*

</div>
</div>
 

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you are migrating from a legacy eZ Publish version, this page
contains the information you need. However, first have a look at an
overview of the process in [Migration from eZ
Publish](Migration-from-eZ-Publish_31430320.html).

</div>
</div>
This section describes how to upgrade your existing  eZ Publish
Platform  5.4/2014.11 installation to eZ Platform and eZ Enterprise.
Make sure that you have a working backup of the site before you do the
actual upgrade, and that the installation you are performing the upgrade
on is offline.

</div>
**Note on Paths**

-   *&lt;old-ez-root&gt;/*: The root directory where the 5.4/2014.11
    installation is located in, for example: “*/home/myuser/old\_www*/”
    or “*/var/sites/ezp/*”\* \*
-   *&lt;new-ez-root&gt;/*: The root directory where the installation is
    located in, for example: “*/home/myuser/new\_www*/” or
    “*/var/sites/\[ezplatform|ezplatform-ee\]/*”

**Check for requirements**

-   Information regarding system requirements can be found on the  
    [Requirements documentation page](31429536.html); notable changes
    include:
    -   PHP 5.5.9 or higher
    -   MySQL or MariaDB 5.5 or higher
    -   Browser from 2015 or newer for use with backend UI
-   This page assumes you have composer installed on the machine and
    that it is a somewhat recent version. See [Using
    Composer](Using-Composer_31431588.html).

[]()

**Upgrade steps[]()**

**Step 1: Extract latest eZ Platform/Enterprise 16.02.x installation**

The easiest way to upgrade the distribution files is to extract a clean
installation of eZ Platform / eZ Enterprise to a separate directory.

**Step 2: Move over code and config**

**2.1. Code**

If you have code in src folder, move that over:

-   `<old-ez-root>/ src =>  <new-ez-root>/` `src`

**2.2. Composer**

**2.2.1 Move over own packages**

Assuming you have own composer packages *(libraries and bundles, but not
eZ Publish legacy packages)*, execute commands like below to add them to
new install in &lt;new-ez-root&gt;:

`composer ` `require` `--no-update ` `"vendor/package:~1.3.0"`

*Adapt the command with your* \* `vendor`, `package`, version number,
and add `"–dev"` if a given package is for dev use. Also check if there
are other changes in `composer.json` you should move over.\*

**2.2.2 Temporarily install XmlText Field Type**

While no longer bundled, the XmlText Field Type exists and is needed to
perform migration from eZ Publish’s XmlText to the new docbook-based
format used by RichText Field Type. From &lt;new-ez-root&gt; execute:

`composer ` `require` `--no-update --dev `
`"ezsystems/ezplatform-xmltext-fieldtype:^1.1.0`"

**2.3. Config**

To move over your own custom configurations, follow the conventions
below and manually move the settings over:

-   `<old-ez-root>/  ezpublish/config/parameters.yml =>  <new-ez-root>/   app/config/parameters.yml`

    - *For parameters like before, for new parameters you’ll be prompted
    on later step.*

-   `<old-ez-root>/              ezpublish/config/config.yml     =>  <new-ez-root>/              app/config/config.yml`

    - *For system/framework config, and for defining global db, cache,
    search settings.*

-   `<old-ez-root>/              ezpublish/config/ezpublish.yml  =>  <new-ez-root>/              app/config/ezplatform.yml`
    -   *For site access, site groups and repository settings.*

<div
class="confluence-information-macro confluence-information-macro-information">
Changes to repository configuration

<div class="confluence-information-macro-body">
When moving configuration over, be aware that as of 5.4.5 and higher,
repository configuration has been enhanced to allow configuring storage
engine and search engine independently.

:

    .. raw:: html

> &lt;div class=“code panel pdl” style=“border-width: 1px;”&gt;

<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Default ezplatform.yml repositories configuration with comments**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Make sure to adapt siteaccess names

<div class="confluence-information-macro-body">
In the default configurations in **ezplatform.yml** you’ll find existing
siteaccesses like **site**, and depending on installation perhaps a few
others, all under site group **site\_group**. Make sure to change those
to what you had in **ezpublish.yml** to avoid issues with having to
login to your website, given user/login policy rules will need to be
updated if you change names of siteaccess as part of the upgrade.

</div>
</div>
**2.4. Bundles**

Move over registration of bundles you have from src and from composer
packages, from old to new kernel:

-   `<old-ez-root>/                ezpublish/EzPublishKernel.php =>  <new-ez-root>/                  app/AppKernel.php`

**2.5 Binary files**

Binary files can simply be copied from the old to the new installation:

-   `<old-ez-root>/ web/var[/<site_name>]/storage              =>  <new-ez-root>/ web/var[/<site_name>]/storage`

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
In the eZ Publish Platform 5.x install `web/var` is a symlink to
`ezpublish_legacy/var`, so if you can’t find it in path above you can
instead copy the storage files from the similar `ezpublish_legacy` path.

</div>
</div>
**2.6 Re-apply permissions and update composer**

Since writable directories and files have been replaced / copied, their
permissions might have changed. Re-apply permissions as explained in the
installation instructions. TODO: LINK

When that is done, execute the following to update and install all
packages from within `<new-ez-root>`\*:

> `composer update --prefer-dist`

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
At the end of the process, you will be asked for values for
parameters.yml not already moved from old installation, or new *(as
defined in parameters.yml.dist)*.

</div>
</div>
**2.7 Register EzSystemsEzPlatformXmlTextFieldTypeBundle**

Add the following new bundle to your new kernel file,
*&lt;new-ez-root&gt;/* **app**/AppKernel.php:

`new EzSystems\EzPlatformXmlTextFieldTypeBundle\EzSystemsEzPlatformXmlTextFieldTypeBundle(),` 

**Step 3: Upgrade the database**

**3.1. Execute update SQL**

Import to your database the changes provided in one of the following
files, optionally read inline comments as you might not need to run some
cleanup queries:

`MySQL: <new-ez-root>/vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql`

`Postgres: <new-ez-root>/vendor/ezsystems/ezpublish-kernel/data/update/postgres/dbupdate-6.1.0-to-6.2.0.sql`

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
*Instructions on purpose does not use `dbupdate-5.4.0-to-6.2.0.sql` [as
it contains issues with the sql, and the sql update file above contains
all relevant schema
updates.](https://github.com/ezsystems/ezpublish-kernel/blob/v6.2.0/data/update/mysql/dbupdate-5.4.0-to-6.2.0.sql)*

</div>
</div>
**3.2. Execute XmlText Migration script**

For migrating content from the XmlText format to the new RichText
format, a migration script exists, execute the following from
&lt;new-ez-root&gt;:

`php app/console ezxmltext:convert-to-richtext -v`

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
The migration script is currently in beta, which is why command example
is suggested with verbose flag. Feedback on how it works and on how we
can improve it is welcome [on the
repository](https://github.com/ezsystems/ezplatform-xmltext-fieldtype).

</div>
</div>
**3.3. Migrate Page field to Landing Page (eZ Enterprise only)**

If you have Page field (ezflow) content and an eZ Enterprise
subscription, you can use a script to migrate your Page content to eZ
Enterprise Landing Page. See [Migrating legacy Page field (ezflow) to
Landing Page (Enterprise)](31431405.html) for more information.

**Step 4: Re-configure web server & proxy**

**Varnish *(optional)***

If you use Varnish, the recommended Varnish (3 and 4) VCL configuration
can be found in the `doc/varnish` folder. See also the [Using
Varnish](https://doc.ez.no/display/DEVELOPER/HTTP+Cache#HTTPCache-UsingVarnish) page.

**Web server configuration**

The officially recommended virtual configuration is now shipped in
the `doc` folder, for both apache2 (`doc/apache2`) and nginx
(`doc/nginx`). Both are built to be easy to understand and use, but
aren’t meant as drop-in replacements for your existing configuration.

As was the case starting 5.4, one notable change is that `SetEnvIf` is
now used to dynamically change rewrite rules depending on the Symfony
environment. It is currently used for the assetic production rewrite
rules.

**Step 5: Link assets**

Assets from the various bundles need to be made available for the
webserver through the web/ document root, execute the following commands
from &lt;new-ez-root&gt;:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
php app/console assets:install --env=prod --symlink
php app/console assetic:dump --env=prod
```

</div>
</div>
**Potential pitfalls**

**Unstyled login screen after upgrade**

It is possible that after the upgrade your admin screen will be
unstyled. This may happen because the new siteaccess will not be
available in the database. You can fix it by editing the permissions for
the Anonymous user. Go to Roles in the Admin Panel and edit the
Limitations of the Anonymous user’s user/login policy. Add all
siteaccesses to the Limitation, save, and clear the browser cache. The
login screen should now show proper styling.

**Translating URLs**

If your legacy site uses old-style URL aliases, to upgrade them
successfully you need to apply a workaround to the slug converter. Where
the slug converter service is defined, set second config parameter to
use `urlalias_compat` by adding a new argument to the existing settings:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in
vendor/ezsystems/ezpublish-kernel/eZ/Publish/Core/settings/storage\_engines/common.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish.persistence.slug_converter:
    class: "%ezpublish.persistence.slug_converter.class%"
    arguments:
        - "@ezpublish.api.storage_engine.transformation_processor"
        - { transformation: "urlalias_compat" }
```

</div>
</div>
In case of URLs with extended UTF-encoded names, the workaround must
make use of `urlalias_iri`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish.persistence.slug_converter:
    class: "%ezpublish.persistence.slug_converter.class%"
    arguments:
        - "@ezpublish.api.storage_engine.transformation_processor"
        - { transformation: "urlalias_iri" }
```

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
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

