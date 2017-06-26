1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>

<span id="title-text"> Developer : Updating eZ Platform </span> {#title-heading .pagetitle}
===============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Mar 23, 2017

This page explains how to update eZ Platform to a new version.

In the instructions below, replace` <version>` with the version of eZ
Platform you are updating to (for example: `v1.7.0`). If you are testing
a release candidate, use the[latest rc
tag](https://github.com/ezsystems/ezplatform/releases){.external-link}
(for example: `v1.7.1-rc1`).

Version-specific steps {#UpdatingeZPlatform-Version-specificsteps}
======================

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
**Some versions introduce new features that require taking special
steps; they are marked on this page with yellow tags.**

If you intend to skip a version (for example, update directly from v1.3
to v1.5 without getting v1.4), remember to look at all the intermediate
steps as well – this means you need to perform both the steps for v1.4
and v1.5.

Update procedure {#UpdatingeZPlatform-Updateprocedure}
================

1. Check out a version {#UpdatingeZPlatform-1.Checkoutaversion}
----------------------

**1.1.** From the project’s root, create a new branch from the project’s
master, or from the branch you’re updating on:

**From your master branch**

~~~~ brush:
git checkout -b <branch_name>
~~~~

This creates a new project branch for the update based on your current
project branch, typically `master`. An example `<branch_name>` would be
`update-1.4`.

**1.2.** If it’s not there, add `ezsystems/ezplatform`
(or `ezsystems/ezplatform-ee`, when updating an Enterprise installation)
as an upstream remote:

**From your new update branch**

~~~~ brush:
git remote add ezplatform http://github.com/ezsystems/ezplatform.git
or
git remote add ezplatform-ee http://github.com/ezsystems/ezplatform-ee.git
~~~~

**1.3.** Then pull the tag into your branch.

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
If you are unsure which version to pull, run `git ls-remote --tags` to
list all possible tags.

**From your new update branch**

~~~~ brush:
git pull ezplatform <version>
or
git pull ezplatform-ee <version>
~~~~

At this stage you may get conflicts, which are a normal part of the
procedure and no reason to worry. The most common ones will be on
`composer.json` and `composer.lock`.

The latter can be ignored, as it will be regenerated when we execute
`composer update` later. The easiest is to checkout the version from the
tag and add it to the changes:

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
If you get a **lot** of conflicts (on the `doc` folder for instance),
and eZ Platform was installed from the
[share.ez.no](http://share.ez.no){.external-link} tarball, it might be
because of incomplete history. You will have to
run `git fetch ezplatform --unshallow` (or
`git fetch ezplatform-ee --unshallow`) to load the full history, and run
the merge again.

**From your new update branch**

~~~~ brush:
git checkout --theirs composer.lock && git add composer.lock
~~~~

If you do not keep a copy in the branch, you may also run:

**From your new update branch**

~~~~ brush:
git rm composer.lock
~~~~

2. Merge composer.json {#UpdatingeZPlatform-2.Mergecomposer.json}
----------------------

#### Manual merging {#UpdatingeZPlatform-Manualmerging}

Conflicts in `composer.json` need to be fixed manually. If you’re not
familiar with the diff output, you may checkout the tag’s version and
inspect the changes. It should be readable for most:

**From your new update branch**

~~~~ brush:
git checkout --theirs composer.json && git diff HEAD composer.json
~~~~

You should see what was changed, as compared to your own version, in the
diff output. The update changes the requirements for all of
the `ezsystems/` packages. Those changes should be left untouched. All
of the other changes will be removals of what you added for your own
project. Use `git checkout -p` to selectively cancel those changes:

~~~~ brush:
git checkout -p composer.json
~~~~

Answer `no` (do not discard) to the requirement changes of `ezsystems`
dependencies. Answer `yes` (discard) to removals of your changes.

Once you are done, inspect the file, either using an editor or by
running `git diff composer.json`. You may also test the file’s sanity
with `composer validate`, and test the dependencies by
running `composer update --dry-run`. (will output what it would do to
dependencies, without applying the changes.

Once finished, run `git add composer.json` and commit`.`

#### Fixing other conflicts (if any) {#UpdatingeZPlatform-Fixingotherconflicts(ifany)}

Depending on the local changes you have done, you may get other
conflicts on configuration files, kernel, etc.

There shouldn’t be many, and you should be able to figure out which
value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting
    you have modified has also been changed by us, you should be able to
    figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

3. Update the app {#UpdatingeZPlatform-3.Updatetheapp}
-----------------

At this point, you should have a `composer.json` file with the correct
requirements. Run `composer update` to update the dependencies. 

~~~~ brush:
composer update
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
If you want to first test how the update proceeds without actually
updating any packages, you can try the command with the `--dry-run`
switch:

`composer update --dry-run`

On PHP conflict | 16.02 and later requires PHP 5.5 or higher

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Because from release 16.02 onwards eZ Platform is compatible only with
PHP 5.5 and higher, the update command above will fail if you use an
older PHP version. Please update PHP to proceed.

4. Update database {#UpdatingeZPlatform-4.Updatedatabase}
------------------

This step is only relevant for some releases:

**content/publish permission**

<span class="status-macro aui-lozenge aui-lozenge-current">V1.8</span>

v1.8.0 introduced a new `content/publish` permission separated out of
the `content/edit` permission. `edit` now covers only editing content,
without the right to publishing it. For that you need the `publish`
permission. `edit` without `publish` can be used in conjunction with the
Content review workflow to ensure that a user cannot publish content
themselves, but must pass it on for review.

To make sure existing users will be able to both edit and publish
content, those with the `content/edit` permission will be given the
`content/publish` permission by the following database update script:

~~~~ brush:
mysql -u <username> -p <password> <database_name> < vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.7.0-to-6.8.0.sql
~~~~

**Form Builder**

<span class="status-macro aui-lozenge aui-lozenge-current">V1.7</span>

<span class="status-macro aui-lozenge aui-lozenge-current">EZ
ENTERPRISE</span>

To enable the Form Builder feature in eZ Platform Enterprise Edition,
import the following file:

~~~~ brush:
mysql -p -u <database_user> <database_name> < vendor/ezsystems/ezstudio-form-builder/bundle/Resources/install/form_builder.sql
~~~~

**Date Based Publisher**

<span class="status-macro aui-lozenge aui-lozenge-current">V1.7</span>

<span class="status-macro aui-lozenge aui-lozenge-current">EZ
ENTERPRISE</span>

To enable the Date-Based Publisher feature in Enterprise, import the
following file:

~~~~ brush:
mysql -p -u <database_user> <database_name> < vendor/ezsystems/date-based-publisher/bundle/Resources/install/datebasedpublisher_scheduled_version.sql
~~~~

In order to activate Date-Based Publisher open console (terminal) and
use:

~~~~ brush:
crontab -e
~~~~

and add below configuration at the end of edited file.

For production environment:

~~~~ brush:
* * * * *   (cd /path/to/your/ezplatform-ee-project && app/console ezpublish:cron:run -e=prod)
~~~~

For development environment:

~~~~ brush:
* * * * *   (cd /path/to/your/ezplatform-ee-project && app/console ezpublish:cron:run -e=dev)
~~~~

**Folder for form-uploaded files**

<span class="status-macro aui-lozenge aui-lozenge-current">V1.8</span>

<span class="status-macro aui-lozenge aui-lozenge-current">EZ
ENTERPRISE</span>

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
To complete this step you have to <span class="confluence-link">[dump
assets](#UpdatingeZPlatform-5.Dumpassets)</span> first.

Since v1.8 you can add a File field to the Form block on a Landing Page.
Files uploaded through such a form will be automatically placed in a
specific folder in the repository.

If you are upgrading to v1.8 you need to create this folder and assign
it to a new specific Section. Then, add them in the config (for example,
in `app/config/default_parameters.yml`, depending on how your
configuration is set up):

~~~~ brush:
    #Location id of the root for form uploads
    form_builder.upload_folder.location_id: <folder location id>

    #Section identifier for form uploads
    form_builder.upload_folder.section_identifier: <section identifier>
~~~~

5. Dump assets {#UpdatingeZPlatform-5.Dumpassets}
--------------

The web assets must be dumped again if you are using the `prod`
environment. In `dev` this happens automatically:

~~~~ brush:
php app/console assetic:dump -e=prod
~~~~

If you encounter problems, additionally clear the cache and install
assets:

~~~~ brush:
php app/console cache:clear -e=prod
php app/console assets:install --symlink -e=prod
php app/console assetic:dump -e=prod
~~~~

6. Commit, test and merge {#UpdatingeZPlatform-6.Commit,testandmerge}
-------------------------

Once all the conflicts have been resolved, and `composer.lock` updated,
the merge can be committed. Note that you may or may not
keep `composer.lock`, depending on your version management workflow. If
you do not wish to keep it, run `git reset HEAD <file>` to remove it
from the changes. Run `git commit`, and adapt the message if necessary.
You can now verify the project and once the update has been approved, go
back to `master`, and merge your update branch:

~~~~ brush:
git checkout master
git merge <branch_name>
~~~~

 

**Your eZ Platform should now be up-to-date with the chosen version!**

 

#### Related: {#UpdatingeZPlatform-Related:}

-   [Coming to eZ Platform from eZ Publish
    Platform](Coming-to-eZ-Platform-from-eZ-Publish-Platform_31429598.html)
-   [Migration from eZ Publish](Migration-from-eZ-Publish_31430320.html)

#### In this topic: {#UpdatingeZPlatform-Inthistopic:}

-   [Version-specific steps](#UpdatingeZPlatform-Version-specificsteps)
-   [Update procedure](#UpdatingeZPlatform-Updateprocedure)
    -   [1. Check out a version](#UpdatingeZPlatform-1.Checkoutaversion)
    -   [2. Merge
        composer.json](#UpdatingeZPlatform-2.Mergecomposer.json)
    -   [3. Update the app](#UpdatingeZPlatform-3.Updatetheapp)
    -   [4. Update database](#UpdatingeZPlatform-4.Updatedatabase)
    -   [5. Dump assets](#UpdatingeZPlatform-5.Dumpassets)
    -   [6. Commit, test and
        merge](#UpdatingeZPlatform-6.Commit,testandmerge)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


