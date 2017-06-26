<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)

</div>
**Developer : Updating eZ Platform**

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
This page explains how to update eZ Platform to a new version.

In the instructions below, replace`<version>` with the version of eZ Platform you are updating to (for example: `v1.7.0`). If you are testing a release candidate, use the[latest rc tag](https://github.com/ezsystems/ezplatform/releases) (for example: `v1.7.1-rc1`).

**Version-specific steps**

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
**Some versions introduce new features that require taking special steps; they are marked on this page with yellow tags.**

If you intend to skip a version (for example, update directly from v1.3 to v1.5 without getting v1.4), remember to look at all the intermediate steps as well – this means you need to perform both the steps for v1.4 and v1.5.

</div>
</div>
**Update procedure**

**1. Check out a version**

**1.1.** From the project's root, create a new branch from the project's master, or from the branch you're updating on:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your master branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout -b <branch_name>
```

</div>
</div>
This creates a new project branch for the update based on your current project branch, typically `master`. An example `<branch_name>` would be `update-1.4`.

**1.2.** If it's not there, add `ezsystems/ezplatform` (or `ezsystems/ezplatform-ee`, when updating an Enterprise installation) as an upstream remote:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your new update branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git remote add ezplatform http://github.com/ezsystems/ezplatform.git
or
git remote add ezplatform-ee http://github.com/ezsystems/ezplatform-ee.git
```

</div>
</div>
**1.3.** Then pull the tag into your branch.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
If you are unsure which version to pull, run `git ls-remote --tags` to list all possible tags.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your new update branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git pull ezplatform <version>
or
git pull ezplatform-ee <version>
```

</div>
</div>
At this stage you may get conflicts, which are a normal part of the procedure and no reason to worry. The most common ones will be on `composer.json` and `composer.lock`.

The latter can be ignored, as it will be regenerated when we execute `composer update` later. The easiest is to checkout the version from the tag and add it to the changes:

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you get a **lot** of conflicts (on the `doc` folder for instance), and eZ Platform was installed from the [share.ez.no](http://share.ez.no) tarball, it might be because of incomplete history. You will have to run `git fetch ezplatform --unshallow` (or `git fetch ezplatform-ee --unshallow`) to load the full history, and run the merge again.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your new update branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --theirs composer.lock && git add composer.lock
```

</div>
</div>
If you do not keep a copy in the branch, you may also run:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your new update branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git rm composer.lock
```

</div>
</div>
**2. Merge composer.json**

**Manual merging**

Conflicts in `composer.json` need to be fixed manually. If you're not familiar with the diff output, you may checkout the tag's version and inspect the changes. It should be readable for most:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your new update branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --theirs composer.json && git diff HEAD composer.json
```

</div>
</div>
You should see what was changed, as compared to your own version, in the diff output. The update changes the requirements for all of the `ezsystems/` packages. Those changes should be left untouched. All of the other changes will be removals of what you added for your own project. Use `git checkout -p` to selectively cancel those changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout -p composer.json
```

</div>
</div>
Answer `no` (do not discard) to the requirement changes of `ezsystems` dependencies. Answer `yes` (discard) to removals of your changes.

Once you are done, inspect the file, either using an editor or by running `git diff composer.json`. You may also test the file's sanity with `composer validate`, and test the dependencies by running `composer update --dry-run`. (will output what it would do to dependencies, without applying the changes.

Once finished, run `git add composer.json` and commit`.`

**Fixing other conflicts (if any)**

Depending on the local changes you have done, you may get other conflicts on configuration files, kernel, etc.

There shouldn't be many, and you should be able to figure out which value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting you have modified has also been changed by us, you should be able to figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

**3. Update the app**

At this point, you should have a `composer.json` file with the correct requirements. Run `composer update` to update the dependencies. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
composer update
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
If you want to first test how the update proceeds without actually updating any packages, you can try the command with the `--dry-run` switch:

`composer update --dry-run`

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
On PHP conflict | 16.02 and later requires PHP 5.5 or higher

<div class="confluence-information-macro-body">
Because from release 16.02 onwards eZ Platform is compatible only with PHP 5.5 and higher, the update command above will fail if you use an older PHP version. Please update PHP to proceed.

</div>
</div>
**4. Update database**

This step is only relevant for some releases:

<div class="panel"
style="background-color: #ffffff;border-width: 1px;">
<div class="panelHeader"
style="border-bottom-width: 1px;background-color: #ffffff;">
**content/publish permission**

</div>
<div class="panelContent" style="background-color: #ffffff;">
V1.8

v1.8.0 introduced a new `content/publish` permission separated out of the `content/edit` permission. `edit` now covers only editing content, without the right to publishing it. For that you need the `publish` permission. `edit` without `publish` can be used in conjunction with the Content review workflow to ensure that a user cannot publish content themselves, but must pass it on for review.

To make sure existing users will be able to both edit and publish content, those with the `content/edit` permission will be given the `content/publish` permission by the following database update script:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -u <username> -p <password> <database_name> < vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.7.0-to-6.8.0.sql
```

</div>
</div>
</div>
</div>
<div class="panel"
style="background-color: #ffffff;border-width: 1px;">
<div class="panelHeader"
style="border-bottom-width: 1px;background-color: #ffffff;">
**Form Builder**

</div>
<div class="panelContent" style="background-color: #ffffff;">
V1.7

EZ ENTERPRISE

To enable the Form Builder feature in eZ Platform Enterprise Edition, import the following file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -p -u <database_user> <database_name> < vendor/ezsystems/ezstudio-form-builder/bundle/Resources/install/form_builder.sql
```

</div>
</div>
</div>
</div>
<div class="panel"
style="background-color: #ffffff;border-width: 1px;">
<div class="panelHeader"
style="border-bottom-width: 1px;background-color: #ffffff;">
**Date Based Publisher**

</div>
<div class="panelContent" style="background-color: #ffffff;">
V1.7

EZ ENTERPRISE

To enable the Date-Based Publisher feature in Enterprise, import the following file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -p -u <database_user> <database_name> < vendor/ezsystems/date-based-publisher/bundle/Resources/install/datebasedpublisher_scheduled_version.sql
```

</div>
</div>
In order to activate Date-Based Publisher open console (terminal) and use:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
crontab -e
```

</div>
</div>
and add below configuration at the end of edited file.

For production environment:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
* * * * *   (cd /path/to/your/ezplatform-ee-project && app/console ezpublish:cron:run -e=prod)
```

</div>
</div>
For development environment:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
* * * * *   (cd /path/to/your/ezplatform-ee-project && app/console ezpublish:cron:run -e=dev)
```

</div>
</div>
</div>
</div>
<div class="panel"
style="background-color: #ffffff;border-width: 1px;">
<div class="panelHeader"
style="border-bottom-width: 1px;background-color: #ffffff;">
**Folder for form-uploaded files**

</div>
<div class="panelContent" style="background-color: #ffffff;">
V1.8

EZ ENTERPRISE

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
To complete this step you have to [dump assets](#UpdatingeZPlatform-5.Dumpassets) first.

</div>
</div>
Since v1.8 you can add a File field to the Form block on a Landing Page. Files uploaded through such a form will be automatically placed in a specific folder in the repository.

If you are upgrading to v1.8 you need to create this folder and assign it to a new specific Section. Then, add them in the config (for example, in `app/config/default_parameters.yml`, depending on how your configuration is set up):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
#Location id of the root for form uploads
form_builder.upload_folder.location_id: <folder location id>

#Section identifier for form uploads
form_builder.upload_folder.section_identifier: <section identifier>
```

</div>
</div>
</div>
</div>
**5. Dump assets**

The web assets must be dumped again if you are using the `prod` environment. In `dev` this happens automatically:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
php app/console assetic:dump -e=prod
```

</div>
</div>
If you encounter problems, additionally clear the cache and install assets:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
php app/console cache:clear -e=prod
php app/console assets:install --symlink -e=prod
php app/console assetic:dump -e=prod
```

</div>
</div>
**6. Commit, test and merge**

Once all the conflicts have been resolved, and `composer.lock` updated, the merge can be committed. Note that you may or may not keep `composer.lock`, depending on your version management workflow. If you do not wish to keep it, run `git reset HEAD <file>` to remove it from the changes. Run `git commit`, and adapt the message if necessary. You can now verify the project and once the update has been approved, go back to `master`, and merge your update branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout master
git merge <branch_name>
```

</div>
</div>
 

**Your eZ Platform should now be up-to-date with the chosen version!**

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**Related:**

-   [Coming to eZ Platform from eZ Publish Platform](Coming-to-eZ-Platform-from-eZ-Publish-Platform_31429598.html)
-   [Migration from eZ Publish](Migration-from-eZ-Publish_31430320.html)

**In this topic:**

<div class="toc-macro rbtoc1490376039305">
-   [Version-specific steps](#UpdatingeZPlatform-Version-specificsteps)
-   [Update procedure](#UpdatingeZPlatform-Updateprocedure)
    -   [1. Check out a version](#UpdatingeZPlatform-1.Checkoutaversion)
    -   [2. Merge composer.json](#UpdatingeZPlatform-2.Mergecomposer.json)
    -   [3. Update the app](#UpdatingeZPlatform-3.Updatetheapp)
    -   [4. Update database](#UpdatingeZPlatform-4.Updatedatabase)
    -   [5. Dump assets](#UpdatingeZPlatform-5.Dumpassets)
    -   [6. Commit, test and merge](#UpdatingeZPlatform-6.Commit,testandmerge)

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
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

