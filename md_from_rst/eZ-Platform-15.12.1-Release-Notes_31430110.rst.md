<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)
6.  [eZ Platform 15.12 Release
    notes](eZ-Platform-15.12-Release-notes_31430093.html)

</div>
**Developer : eZ Platform 15.12.1 Release Notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by David Christian Liedle on
Oct 31, 2016

</div>
<div id="main-content" class="wiki-content group">
The first sub-release of [eZ Platform
15.12](eZ-Platform-15.12-Release-notes_31430093.html) is now available
for update.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
For the release notes of the corresponding eZ Studio sub-release, see
[eZ Studio 15.12.1 Release
Notes](eZ-Studio-15.12.1-Release-notes_31430124.html).

</div>
</div>
**Changes since 15.12**

<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
As already deprecated on
[requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)
page, this release **does not support PHP 5.4** any longer.

</div>
</div>
For list of issues fixed in 15.12.1 see [13
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion+in+%28%222015.12.1%22%29+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++++&src=confmacro)
, below is a list of notable bugs/features/enhancements done in the
release. 

**Distribution**

-   Improved Install doc and Apache/Nginx doc, added script to generate
    vhost for automation needs.
-   PHP Internal web server “works”, further fixes in 16.02 to make it
    tested and supported for dev use.
-   Installers don’t write to config anymore, only folders mentioned in
    directory permissions are written to.
-   Info on where to find [demo
    install](https://github.com/ezsystems/ezplatform-demo) of eZ
    Platform added.
-   Several improvements done on [doc.ez.no](http://doc.ez.no) and
    specifically
    [doc.ez.no/display/TECHDOC](http://doc.ez.no/display/TECHDOC).

**Kernel**

-   \[API\] Fix publishing to only update modified time, leaving
    published time to be time of first publish like in legacy
-   \[Twig\] New **ez\_field** function, unlike **ez\_field\_value**
     returns whole Field - find more information
    [here.](Content-Rendering_31429679.html)
-   [![image0](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-24467](https://jira.ez.no/browse/EZP-24467?src=confmacro)
    - \[API\] When moving an object to an hidden container, the moved
    object doesn’t have the hidden by superior status Closed
-   [![image1](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-25366](https://jira.ez.no/browse/EZP-25366?src=confmacro)
    - Kernel issue: By doing a subtree copy with subitems using
    ObjectRelation, the Relation is broken on the copy until you
    republish it. Closed

**UI**

-   Improvements to policy & limitation handling, more coming in 16.02
-   Display language names instead of language code
-   API doc js-rest-client:
    <http://ezsystems.github.io/javascript-rest-client/>
-   API doc Platform UI:
    <http://ezsystems.github.io/platformui-javascript-api/>
-   Tutorials for extending UI:
    <https://doc.ez.no/display/TECHDOC/Extending+Tutorials>

**New projects in work for future releases**

-   <https://github.com/ezsystems/docker-php>
-   <https://github.com/ezsystems/ezplatform-demo>

**Contributors**

Several of the mentioned changes above where done by contributors for
this release, notable contributions merged from among others:

-   @rihards
-   @iherak
-   @crevillo
-   @wizhippo
-   @blankse
-   @jeromegamez
-   @emodric
-   @GromNaN

**Upgrading a 15.12 project**

<div
class="confluence-information-macro confluence-information-macro-information">
New proposed upgrade process

<div class="confluence-information-macro-body">
This section reflects a proposed git based workflow for handling
upgrades, feedback on how this works in practice and input on how to
further improve/simplify it is welcome.

</div>
</div>
Existing 15.12 (1.0) projects can also easily be updated using Composer.
From the project’s root, create a new branch from the project’s master,
or from the branch you’re upgrading on:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From your master branch**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git checkout -b upgrade-1.1.0
```

</div>
</div>
If it’s not there, add ezsystems/ezplatform as an upstream remote:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git remote add ezplatform http://github.com/ezsystems/ezplatform.git
```

</div>
</div>
Then pull the tag into your branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git pull ezplatform v1.1.0
```

</div>
</div>
You will get conflicts, and it is perfectly normal. The most common ones
will be on `composer.json` and `composer.lock`.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you get a **lot** of conflicts (on the `doc` folder for instance),
and eZ Platform was installed from the [share.ez.no](http://share.ez.no)
tarball, it might be because of incomplete history. You will have to
run `git fetch ezplatform --unshallow` to load the full history, and run
the merge again.

</div>
</div>
The latter can be ignored, as it will be regenerated when we execute
composer update later. The easiest is to checkout the version from the
tag, and add it to the changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git checkout --theirs composer.lock && git add composer.lock
```

</div>
</div>
You may also run `git remove composer.lock` if you do not keep a copy of
it in the branch.

**Merging composer.json**

**Manual merging**

Conflicts in `composer.json` need to be fixed manually. If you’re not
familiar with the diff output, you may checkout the tag’s version, and
inspect the changes. It should be readable for most:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git checkout --theirs composer.json && git diff composer.json
```

</div>
</div>
You should see what was changed, as compared to your own version, in the
diff output. The 1.1.0-rc1 tag changes the requirements for all of
the `ezsystems/` packages. Those should be left untouched. All of the
other changes should be removals of your project’s additions. You can
use `git checkout -p` to selectively cancel those changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git checkout -p composer.json
```

</div>
</div>
Answer `no` (do not discard) to the requirement changes of `ezsystems`
dependencies, and `yes` (discard) to removals of your changes.

**Using composer require**

You may also checkout your own `composer.json`, and run the following
commands to update the `ezsystems` packages requirements from v1.0.x to
v1.1.0:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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
```

</div>
</div>
**Fixing other conflicts (if any)**

Depending on the local changes you have done, you may get other
conflicts: configuration files, kernel… 

There shouldn’t be many, and you should be able to figure out which
value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting
    you have modified has also been changed by us, you should be able to
    figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

**Updating composer.lock**

At this point, you should have a composer.json file with the correct
requirements. Run `composer update` to update the dependencies. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
composer update --with-dependencies ezsystems/ezpublish-kernel ezsystems/platform-ui-bundle ezsystems/behatbundle
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
In order to restrict the possibility of unforeseen updates of 3rd party
packages, we recommend by default that `composer update` is restricted
to the list of packages we have tested the update for. You may remove
this restriction, but be aware that you might get a package combination
we have not tested.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
On PHP conflict

<div class="confluence-information-macro-body">
Because from this release onwards eZ Platform is compatible only with
PHP 5.5 and higher, the update command above will fail if you use an
older PHP version. Please update PHP to proceed.

</div>
</div>
**Commit, test and merge**

Once all the conflicts have been resolved, and `composer.lock` updated,
the merge can be committed. Note that you may or may not
keep `composer.lock`, depending on your version management workflow. If
you do not wish to keep it, run `git reset HEAD <file>` to remove it
from the changes. Run `git commit`, and adapt the message if necessary.
You can now test the project, run integration tests… once the upgrade
has been approved, go back to `master`, and merge the `upgrade-1.1.0`
branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
git checkout master
git merge upgrade-1.1.0
```

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

