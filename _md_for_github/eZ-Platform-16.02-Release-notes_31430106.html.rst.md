<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)

</div>
**Developer : eZ Platform 16.02 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Michał Maciej Kusztelak on May 24, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="toc-macro rbtoc1490376020563">
-   [Quick links](#eZPlatform16.02Releasenotes-Quicklinks)
-   [Changes since 15.12.1](#eZPlatform16.02Releasenotes-Changessince15.12.1)
    -   [Online Editor](#eZPlatform16.02Releasenotes-OnlineEditor)
    -   [Permissions](#eZPlatform16.02Releasenotes-Permissions)
    -   [Trash Management](#eZPlatform16.02Releasenotes-TrashManagement)
    -   [Preview of upgrade support from eZ Publish Platform 5.4/2014.11](#eZPlatform16.02Releasenotes-PreviewofupgradesupportfromeZPublishPlatform5.4/2014.11)
    -   [eZ Platform Demo](#eZPlatform16.02Releasenotes-eZPlatformDemo)
    -   [Easier install & testing](#eZPlatform16.02Releasenotes-Easierinstall&testing)
    -   [And also](#eZPlatform16.02Releasenotes-Andalso)
-   [Known Issues](#eZPlatform16.02Releasenotes-KnownIssues)
-   [Upgrading a from 15.12 or 15.12.1 project](#eZPlatform16.02Releasenotes-Upgradingafrom15.12or15.12.1project)
    -   [Merging composer.json](#eZPlatform16.02Releasenotes-Mergingcomposer.json)
    -   [Updating composer.lock](#eZPlatform16.02Releasenotes-Updatingcomposer.lock)
    -   [Dump assets](#eZPlatform16.02Releasenotes-Dumpassets)
    -   [Commit, test and merge](#eZPlatform16.02Releasenotes-Commit,testandmerge)

</div>
The 16.02 *(v1.2.0)* release of eZ Platform is available as of March 3rd, and includes all features and improvements of [15.12.1](eZ-Platform-15.12.1-Release-Notes_31430110.html) from February 5th.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For the release notes of the corresponding eZ Studio release, see [eZ Studio 16.02 Release notes](eZ-Studio-16.02-Release-notes_31430131.html).

</div>
</div>
**Quick links**

-   [Installation instructions](https://doc.ez.no/display/TECHDOC/Installation)[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md)
-   [Requirements](https://doc.ez.no/display/TECHDOC/Requirements)
-   Download: See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-16.02)

**Changes since [15.12.1](eZ-Platform-15.12.1-Release-Notes_31430110.html)**

For list of issues fixed in 16.02 see [52 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+in+%28%2216.02%22%29+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++&src=confmacro) , below is a list of notable bugs/features/enhancements done in the release.

****Online Editor****

****Image variation in RichText Fields****

Added option to choose image variations for images embedded in Rich text Fields.

<img src="attachments/31430106/31430105.png" alt="Image element options" class="confluence-embedded-image" width="350" />

<img src="attachments/31430106/31430103.png" alt="Image aligned left in a block of text" class="confluence-embedded-image image-right" height="250" />

****Image alignment****

 

 Both Images and Embed elements can be aligned left, right or center in the Online Editor.

 

**New List Element  **

Added an (unordered) List element in the Online Editor.

<img src="attachments/31430106/31430102.png" alt="image2" class="confluence-embedded-image" />

**Permissions**

Added role versioning to better handle editing of roles.

**Trash Management**

Content items moved to Trash can be viewed and trash can be emptied.

<img src="attachments/31430106/31430104.png" alt="Trash screen" class="confluence-embedded-image" width="500" />

**Preview of upgrade support from eZ Publish Platform 5.4/2014.11**

This release contains migrations tools for migrating XmlText to RichText, this is explained in the new [5.4.x/2014.11 upgrade documentation page](Upgrading-from-5.4.x-and-2014.11-to-16.xx_31430322.html).

**eZ Platform Demo**

eZ Platform now also comes[in a new demo version](https://github.com/ezsystems/ezplatform-demo) that better showcases eZ Platform in use with a provided web site and corresponding  content:

<img src="attachments/31430106/31430101.jpg" alt="image4" class="confluence-embedded-image confluence-content-image-border" />

**Easier install & testing**

As of 16.02, eZ Platform now supports being tested using the built in PHP internal server as exposed by Symfony's `server:run` command.

Assuming you have [composer installed globally](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx), and your MySQL/MariaDB server already setup with a database, you can get eZ Platform demo up and running with just the following commands:

 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
composer create-project --no-dev --keep-vcs ezsystems/ezplatform-demo
cd ezplatform-demo

php app/console ezplatform:install --env=prod demo
php app/console assetic:dump --env=prod web

php app/console server:run --env=prod 
```

</div>
</div>
 Note : the `--keep-vcs` option allows you to get the git history.

**And also**

-   Display Content Type name when browsing content in UI
-   New `ez_field` Twig function to get full translated field, and not just value like existing `ez_field_value` does <img src="images/icons/emoticons/lightbulb_on.png" alt="(lightbulb)" class="emoticon emoticon-light-on" /> contributed by [@rihards](eZ-Platform-16.02-Release-notes_31430106.html)
-   Installers don't write configuration anymore, making eZ Platform and eZ Studio installation possible on cloud hosting platforms like platform.sh
-   Product pages inside UI now works without warnings on https <img src="images/icons/emoticons/lightbulb_on.png" alt="(lightbulb)" class="emoticon emoticon-light-on" /> contributed by [@nmeirik](https://github.com/nmeirik)
-   System Info tab in Admin UI now displays correct version of eZ Platform, and there is also a new Packages tab for composer info

*..and many other great improvements and fixes to this release that you can see in JIRA:  [52 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+in+%28%2216.02%22%29+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++&src=confmacro)*

**Known Issues**

For known issues head over to our [known enablement issues page ](https://doc.ez.no/display/MAIN/Known+Enablement+Issues)that covers eZ Platform and eZ Studio.

*However here are two issues that were uncovered very late in the release process since they were hidden by other bugs that we would like to make you especially aware of:*

-   [<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image6" class="icon" />EZP-25789](https://jira.ez.no/browse/EZS-593?src=confmacro)
    - Editors access to own user and read all user meta info for author field type Backlog
-   [<img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="image7" class="icon" />EZP-25505](https://jira.ez.no/browse/EZP-25505?src=confmacro)
    -   UserHash is always generated for anonymous user Backlog

 

*Both are currently being worked on and will be fixed in patch version in the next couple of weeks.*

<div
class="confluence-information-macro confluence-information-macro-note">
Editor Roles

<div class="confluence-information-macro-body">
Be aware that for Editors to be able to successfully edit content, including content with author fields filled with other users, you'll at the moment need to configure Editor Group via Roles to have access to read user content items using a policy like `content/read Class(User), Section(User)`

This implies they have full read access to other users data, so assign this with caution. We will improve this in an upcoming release, see [<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image8" class="icon" />EZP-25789](https://jira.ez.no/browse/EZS-593?src=confmacro) - Editors access to own user and read all user meta info for author field type Backlog for further info.

</div>
</div>
 

\*
==

**Upgrading a from 15.12 or 15.12.1 project**

<div
class="confluence-information-macro confluence-information-macro-tip">
Testing release candidates

<div class="confluence-information-macro-body">
If you are testing a release candidate, replace the tag `v1.2.0` with the[latest rc tag](https://github.com/ezsystems/ezplatform/releases) (example: `v1.2.1-rc1`)

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
New proposed upgrade process

<div class="confluence-information-macro-body">
This section reflects a proposed git based workflow for handling upgrades, feedback on how this works in practice and input on how to further improve/simplify it is welcome.

</div>
</div>
Existing 15.12.1 (1.1.0) projects can also easily be updated using Composer. From the project's root, create a new branch from the project's master, or from the branch you're upgrading on:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your master branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout -b upgrade-1.2.0
```

</div>
</div>
If it's not there, add ezsystems/ezplatform as an upstream remote:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.2.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git remote add ezplatform http://github.com/ezsystems/ezplatform.git
```

</div>
</div>
Then pull the tag into your branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.2.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git pull ezplatform v1.2.0
```

</div>
</div>
You will get conflicts, and it is perfectly normal. The most common ones will be on `composer.json` and `composer.lock`.
The latter can be ignored, as it will be regenerated when we execute composer update later. The easiest is to checkout the version from the tag, and add it to the changes:

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you get a **lot** of conflicts (on the `doc` folder for instance), and eZ Platform was installed from the [share.ez.no](http://share.ez.no) tarball, it might be because of incomplete history. You will have to run `git fetch ezplatform --unshallow` to load the full history, and run the merge again.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.2.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --theirs composer.lock && git add composer.lock
```

</div>
</div>
You may also run `git remove composer.lock` if you do not keep a copy of it in the branch.

**Merging composer.json**

**Manual merging**

Conflicts in `composer.json` need to be fixed manually. If you're not familiar with the diff output, you may checkout the tag's version, and inspect the changes. It should be readable for most:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.2.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --theirs composer.json && git diff composer.json
```

</div>
</div>
You should see what was changed, as compared to your own version, in the diff output. The ezplatform update changes the requirements for all of the `ezsystems/` packages. Those changes should be left untouched. All of the other changes will be removals of what you added for your own project. Use `git checkout -p` to selectively cancel those changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout -p composer.json
```

</div>
</div>
Answer `no` (do not discard) to the requirement changes of `ezsystems` dependencies. Answer `yes` (discard) to removals of your changes.

Once you are done, inspect the file, either using an editor or by running `git diff composer.json`. You may also test the file's sanity with `composer validate`, and test the dependencies by running `composer update --dry-run`. (will output what it would do to dependencies, without applying the changes.

Once finished, run `git add composer.json.`

**Fixing other conflicts (if any)**

Depending on the local changes you have done, you may get other conflicts: configuration files, kernel... 

There shouldn't be many, and you should be able to figure out which value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting you have modified has also been changed by us, you should be able to figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

**Updating composer.lock**

At this point, you should have a composer.json file with the correct requirements. Run `composer update` to update the dependencies. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
composer update --with-dependencies ezsystems/ezpublish-kernel ezsystems/platform-ui-bundle ezsystems/behatbundle
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
In order to restrict the possibility of unforeseen updates of 3rd party packages, we recommend by default that `composer update` is restricted to the list of packages we have tested the update for. You may remove this restriction, but be aware that you might get a package combination we have not tested.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
On PHP conflict

<div class="confluence-information-macro-body">
Because from this release onwards eZ Platform is compatible only with PHP 5.5 and higher, the update command above will fail if you use an older PHP version. Please update PHP to proceed.

</div>
</div>
**Database update**

The 16.02 release requires an update to the database. Import `vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql` into your database:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -u<username> -p<password> <database_name> < vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql
```

</div>
</div>
**Dump assets**

The web assets must be dumped again for the prod environment:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
php app/console assetic:dump --env=prod web
```

</div>
</div>
**Commit, test and merge**

Once all the conflicts have been resolved, and `composer.lock` updated, the merge can be committed. Note that you may or may not keep `composer.lock`, depending on your version management workflow. If you do not wish to keep it, run `git reset HEAD <file>` to remove it from the changes. Run `git commit`, and adapt the message if necessary. You can now test the project, run integration tests... once the upgrade has been approved, go back to `master`, and merge the `upgrade-1.2.0` branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout master
git merge upgrade-1.2.0
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
Double check the following before you test:

<div class="confluence-information-macro-body">
You should now have a new route in`app/config/routing.yml`:

`_ezplatformRepositoryFormsRoutes:    resource: "@EzSystemsRepositoryFormsBundle/Resources/config/routing.yml"`

</div>
</div>
 

</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
<img src="images/icons/bullet_blue.gif" alt="image9" width="8" height="8" /> [e116d414-a312-11e5-8675-02a23e2a7788.jpg](attachments/31430106/31430101.jpg) (image/jpeg) <img src="images/icons/bullet_blue.gif" alt="image10" width="8" height="8" /> [oe list items.png](attachments/31430106/31430102.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image11" width="8" height="8" /> [aligned\_image.png](attachments/31430106/31430103.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image12" width="8" height="8" /> [trash.png](attachments/31430106/31430104.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image13" width="8" height="8" /> [online\_editor\_image\_options.png](attachments/31430106/31430105.png) (image/png)

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

