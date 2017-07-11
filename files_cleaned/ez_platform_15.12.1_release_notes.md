1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>
6.  <span>[eZ Platform 15.12 Release
    notes](eZ-Platform-15.12-Release-notes_31430093.html)</span>

<span id="title-text"> Developer : eZ Platform 15.12.1 Release Notes </span> {#title-heading .pagetitle}
============================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> David Christian Liedle</span> on Oct 31, 2016

The first sub-release of [eZ Platform
15.12](eZ-Platform-15.12-Release-notes_31430093.html) is now available
for update.

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
For the release notes of the corresponding eZ Studio sub-release, see
[eZ Studio 15.12.1 Release
Notes](eZ-Studio-15.12.1-Release-notes_31430124.html).

Changes since 15.12 {#eZPlatform15.12.1ReleaseNotes-Changessince15.12}
-------------------

<span
class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
As already deprecated on
[requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)
page, this release **does not support PHP 5.4** any longer.

For list of issues fixed in 15.12.1 see<span
class="static-jira-issues_count"> [13
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+in+%28%222015.12.1%22%29+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++++&src=confmacro){.issue-link}
</span> , below is a list of notable bugs/features/enhancements done in
the release. 

### Distribution {#eZPlatform15.12.1ReleaseNotes-Distribution}

-   Improved Install doc and Apache/Nginx doc, added script to generate
    vhost for automation needs.
-   PHP Internal web server “works”, further fixes in 16.02 to make it
    tested and supported for dev use.
-   Installers don’t write to config anymore, only folders mentioned in
    directory permissions are written to.
-   Info on where to find [demo
    install](https://github.com/ezsystems/ezplatform-demo){.external-link}
    of eZ Platform added.
-   <span style="line-height: 1.42857;">Several improvements done on
    </span>[doc.ez.no](http://doc.ez.no){.external-link}<span
    style="line-height: 1.42857;"> and specifically
    </span>[doc.ez.no/display/TECHDOC](http://doc.ez.no/display/TECHDOC){.external-link}.

### Kernel {#eZPlatform15.12.1ReleaseNotes-Kernel}

-   \[API\] Fix publishing to only update modified time, leaving
    published time to be time of first publish like in legacy
-   \[Twig\] New **ez\_field** function, unlike **ez\_field\_value**
     returns whole Field - find more information
    [here.](Content-Rendering_31429679.html)
-   <span class="jira-issue resolved">
    [![](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-24467](https://jira.ez.no/browse/EZP-24467?src=confmacro){.jira-issue-key}
    - <span class="summary">\[API\] When moving an object to an hidden
    container, the moved object doesn’t have the hidden by superior
    status</span> <span
    class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span>
    </span>
-   <span class="jira-issue resolved">
    [![](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-25366](https://jira.ez.no/browse/EZP-25366?src=confmacro){.jira-issue-key}
    - <span class="summary">Kernel issue: By doing a subtree copy with
    subitems using ObjectRelation, the Relation is broken on the copy
    until you republish it.</span> <span
    class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span>
    </span>

### UI {#eZPlatform15.12.1ReleaseNotes-UI}

-   Improvements to policy & limitation handling, more coming in 16.02
-   Display language names instead of language code
-   API doc js-rest-client:
    <http://ezsystems.github.io/javascript-rest-client/>
-   API doc Platform UI:
    <http://ezsystems.github.io/platformui-javascript-api/>
-   Tutorials for extending UI:
    <https://doc.ez.no/display/TECHDOC/Extending+Tutorials>

### New projects in work for future releases {#eZPlatform15.12.1ReleaseNotes-Newprojectsinworkforfuturereleases}

-   <https://github.com/ezsystems/docker-php>
-   <https://github.com/ezsystems/ezplatform-demo>

### Contributors {#eZPlatform15.12.1ReleaseNotes-Contributors}

Several of the mentioned changes above where done by contributors for
this release, notable contributions merged from among others:

-   @rihards
-   @iherak
-   @crevillo
-   @wizhippo
-   @blankse
-   @jeromegamez
-   @emodric
-   <span style="line-height: 1.42857;">@GromNaN</span>

Upgrading a 15.12 project {#eZPlatform15.12.1ReleaseNotes-Upgradinga15.12project}
-------------------------

New proposed upgrade process

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
This section reflects a proposed git based workflow for handling
upgrades, feedback on how this works in practice and input on how to
further improve/simplify it is welcome.

Existing 15.12 (1.0) projects can also easily be updated using Composer.
From the project’s root, create a new branch from the project’s master,
or from the branch you’re upgrading on:

**From your master branch**

~~~~ brush:
git checkout -b upgrade-1.1.0
~~~~

If it’s not there, add ezsystems/ezplatform as an upstream remote:

**From the upgrade-1.1.0 branch**

~~~~ brush:
git remote add ezplatform http://github.com/ezsystems/ezplatform.git
~~~~

Then pull the tag into your branch:

**From the upgrade-1.1.0 branch**

~~~~ brush:
git pull ezplatform v1.1.0
~~~~

You will get conflicts, and it is perfectly normal. The most common ones
will be on `composer.json` and `composer.lock`.

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
If you get a **lot** of conflicts (on the `doc` folder for instance),
and eZ Platform was installed from the
[share.ez.no](http://share.ez.no){.external-link} tarball, it might be
because of incomplete history. You will have to
run `git fetch ezplatform --unshallow` to load the full history, and run
the merge again.

The latter can be ignored, as it will be regenerated when we execute
composer update later. The easiest is to checkout the version from the
tag, and add it to the changes:

**From the upgrade-1.1.0 branch**

~~~~ brush:
git checkout --theirs composer.lock && git add composer.lock
~~~~

You may also run `git remove composer.lock` if you do not keep a copy of
it in the branch.

#### Merging composer.json {#eZPlatform15.12.1ReleaseNotes-Mergingcomposer.json}

##### Manual merging {#eZPlatform15.12.1ReleaseNotes-Manualmerging}

Conflicts in `composer.json` need to be fixed manually. If you’re not
familiar with the diff output, you may checkout the tag’s version, and
inspect the changes. It should be readable for most:

**From the upgrade-1.1.0 branch**

~~~~ brush:
git checkout --theirs composer.json && git diff composer.json
~~~~

You should see what was changed, as compared to your own version, in the
diff output. The 1.1.0-rc1 tag changes the requirements for all of
the `ezsystems/` packages. Those should be left untouched. All of the
other changes should be removals of your project’s additions. You can
use `git checkout -p` to selectively cancel those changes:

~~~~ brush:
git checkout -p composer.json
~~~~

Answer `no` (do not discard) to the requirement changes of `ezsystems`
dependencies, and `yes` (discard) to removals of your changes.

##### Using composer require {#eZPlatform15.12.1ReleaseNotes-Usingcomposerrequire}

You may also checkout your own `composer.json`, and run the following
commands to update the `ezsystems` packages requirements from v1.0.x to
v1.1.0:

~~~~ brush:
git checkout --ours composer.json
composer require --no-update "ezsystems/ezpublish-kernel:~6.1.0"
composer require --no-update "ezsystems/platform-ui-bundle:~1.1.0"
composer require --dev --no-update "ezsystems/behatbundle:~6.1.0"

# PHP requirement is now 5.5+, and 7.0 is now supported for dev use (see top of this page for requirements link)
composer require --no-update "php:~5.5|~7.0"

# As there are some bugs with Symfony 2.8, make sure to pull in Symfony 2.7 LTS updates
composer require --no-update "symfony/symfony:~2.7.0" 
 
# This command will remove platform.php: "5.4.4" as php 5.4 is no longer supported
composer config --unset platform.php
~~~~

#### Fixing other conflicts (if any) {#eZPlatform15.12.1ReleaseNotes-Fixingotherconflicts(ifany)}

Depending on the local changes you have done, you may get other
conflicts: configuration files, kernel… 

There shouldn’t be many, and you should be able to figure out which
value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting
    you have modified has also been changed by us, you should be able to
    figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

#### Updating composer.lock {#eZPlatform15.12.1ReleaseNotes-Updatingcomposer.lock}

At this point, you should have a composer.json file with the correct
requirements. Run `composer update` to update the dependencies. 

~~~~ brush:
composer update --with-dependencies ezsystems/ezpublish-kernel ezsystems/platform-ui-bundle ezsystems/behatbundle
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
In order to restrict the possibility of unforeseen updates of 3rd party
packages, we recommend by default that `composer update` is restricted
to the list of packages we have tested the update for. You may remove
this restriction, but be aware that you might get a package combination
we have not tested.

On PHP conflict

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Because from this release onwards eZ Platform is compatible only with
PHP 5.5 and higher, the update command above will fail if you use an
older PHP version. Please update PHP to proceed.

#### Commit, test and merge {#eZPlatform15.12.1ReleaseNotes-Commit,testandmerge}

Once all the conflicts have been resolved, and `composer.lock` updated,
the merge can be committed. Note that you may or may not
keep `composer.lock`, depending on your version management workflow. If
you do not wish to keep it, run `git reset HEAD <file>` to remove it
from the changes. Run `git commit`, and adapt the message if necessary.
You can now test the project, run integration tests… once the upgrade
has been approved, go back to `master`, and merge the `upgrade-1.1.0`
branch:

~~~~ brush:
git checkout master
git merge upgrade-1.1.0
~~~~

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


