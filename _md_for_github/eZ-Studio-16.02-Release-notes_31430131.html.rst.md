<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Enterprise Release notes](eZ-Enterprise-Release-notes_31430108.html)

</div>
**Developer : eZ Studio 16.02 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek on Apr 18, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="toc-macro rbtoc1490376014543">
-   [Quick links](#eZStudio16.02Releasenotes-Quicklinks)
-   [Changes since 15.12.1](#eZStudio16.02Releasenotes-Changessince15.12.1)
    -   [Summary of changes](#eZStudio16.02Releasenotes-Summaryofchanges)
    -   [Full list of improvements](#eZStudio16.02Releasenotes-Fulllistofimprovements)
    -   [Full list of bugfixes](#eZStudio16.02Releasenotes-Fulllistofbugfixes)
-   [Known Issues](#eZStudio16.02Releasenotes-KnownIssues)
    -   [Disabling Studio Demo Bundle](#eZStudio16.02Releasenotes-DisablingStudioDemoBundle)
-   [Upgrading a 15.12.1 Studio project](#eZStudio16.02Releasenotes-Upgradinga15.12.1Studioproject)
    -   [Merging composer.json](#eZStudio16.02Releasenotes-Mergingcomposer.json)
    -   [Updating](#eZStudio16.02Releasenotes-Updating)
    -   [Dump assets](#eZStudio16.02Releasenotes-Dumpassets)
    -   [Commit, test and merge](#eZStudio16.02Releasenotes-Commit,testandmerge)

</div>
 

The 16.02 *(v1.2.0)* release of eZ Studio is available as of March 3rd, and includes all features and improvements of [15.12.1](eZ-Studio-15.12.1-Release-notes_31430124.html) from February 5th.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For the release notes of the corresponding *(and included)* eZ Platform release, see [eZ Platform 16.02 Release notes](eZ-Platform-16.02-Release-notes_31430106.html).

</div>
</div>
**Quick links**

-   [Installation instructions](https://doc.ez.no/display/TECHDOC/Installation)[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md)
-   [Requirements](https://doc.ez.no/display/TECHDOC/Requirements)
-   Download:
    -   As Customer with eZ Enterprise subscription: <https://support.ez.no/Downloads> \*([BUL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?processed=1457699707&return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1) License)\*
    -   As Partner with Test & Trial software access: [https://support.ez.no/Downloads\\](https://support.ez.no/Downloads\) \* \*([TTL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0) License)\*\*
    -   If none of the above, request a demo instance: <http://ez.no/Forms/HTML-forms/Discover-eZ-Studio>

**Changes since [15.12.1](eZ-Studio-15.12.1-Release-notes_31430124.html)**

**Summary of changes**

-   Added user profile with notifications containing the number of pending requests for review.

When you are selected as a reviewer for a Content item, you receive a notification about it by email. The message contains a direct link to the draft.

As a reviewer you also receive notifications in your user profile. When you are logged in, a number appears next to your profile picture (in the top right corner of the screen) which shows how many requests for review you have received.

<img src="attachments/31430131/31430126.png" alt="image0" class="confluence-embedded-image" />

Click your profile and choose View notifications. You can see a Notifications window with a list of all requests:

<img src="attachments/31430131/31430127.png" alt="Flex workflow notification window" class="confluence-embedded-image" width="550" />

 

<div id="expander-126581800" class="expand-container">
<div id="expander-control-126581800" class="expand-control">
<img src="images/icons/grey_arrow_down.png" alt="image2" class="expand-control-image" />Watch a video

</div>
<div id="expander-content-$toggleId" class="expand-content">
 

</div>
</div>
 

-   Timeline toolbar shows all changes in all Schedule Blocks on a given Landing Page, both in View and in Edit modes.
-   UI improvement: updated the look of the Items airing and Full list.

<img src="attachments/31430131/31430130.png" alt="Full list of items airing" class="confluence-embedded-image" width="550" />

-   UI improvement: sliders added to the time selection modal when selecting airtime for Schedule block.

<img src="attachments/31430131/31430129.png" alt="Schedule block Airtime settings window" class="confluence-embedded-image confluence-thumbnail" width="240" />

-   Various bug fixes.

 

**Full list of improvements**

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:60 %;min-width:60 %;max-width:60 %;">
 

<div id="refresh-module-2078452131">
<div id="jira-issues-2078452131"
style="width: 100%;  overflow: auto;">
<table>
<colgroup>
<col width="29%" />
<col width="62%" />
<col width="7%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left">Key</td>
<td align="left">Summary</td>
<td align="left">T</td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25446?src=confmacro">EZP-25446</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25446?src=confmacro">Add the user profile in the navigation hub</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-557?src=confmacro">EZEE-557</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-557?src=confmacro">As a user, I want to have at least two user profiles to come in the default demo bundle</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-470?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-543?src=confmacro">EZEE-543</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-543?src=confmacro">Create a slider field view</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-507?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/subtask_alternate.png" alt="Sub-task" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-542?src=confmacro">EZEE-542</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-542?src=confmacro">Reorganize field views files structure</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-507?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/subtask_alternate.png" alt="Sub-task" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-531?src=confmacro">EZEE-531</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-531?src=confmacro">Change the Favicon for Studio</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-507?src=confmacro">EZEE-507</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-507?src=confmacro">Update the look of the indicator list and full list</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-507?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/subtask_alternate.png" alt="Sub-task" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-495?src=confmacro">EZEE-495</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-495?src=confmacro">Timepicker add hour and minute sliders</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-488?src=confmacro">EZEE-488</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-488?src=confmacro">Droppable interaction with final animation added</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro">EZEE-481</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro">Improve the way that users hover over, select and move blocks within Page Mode</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-481?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-476?src=confmacro">EZEE-476</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-476?src=confmacro">As a user, I want to be notified about new content that's sent to me for review</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-470?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-470?src=confmacro">EZEE-470</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-470?src=confmacro">As a user, I want to be able to use the Timeline Toolbar in View Mode</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-470?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
</tbody>
</table>

</div>
<div class="refresh-issues-bottom">
> \`11

issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-557+OR+key+%3D+EZS-476+OR+key+%3D+EZS-507+OR+key+%3D+EZS-495+OR+key+%3D+EZS-470+OR+key+%3D+EZS-543+OR+key+%3D+EZS-542+OR+key+%3D+EZS-481+OR+key+%3D+EZS-531+OR+key+%3D+EZS-488+OR+key+%3D+EZP-25446++&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="columnMacro"
   style="width:40%;min-width:40%;max-width:40%;"&gt;

 

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Full list of bugfixes
   :name: eZStudio16.02Releasenotes-Fulllistofbugfixes

.. raw:: html

   &lt;div class="sectionColumnWrapper"&gt;

.. raw:: html

   &lt;div class="sectionMacro"&gt;

.. raw:: html

   &lt;div class="sectionMacroRow"&gt;

.. raw:: html

   &lt;div class="columnMacro"
   style="width:60 %;min-width:60 %;max-width:60 %;"&gt;

 

.. raw:: html

   &lt;div id="refresh-module-1731266361"&gt;

.. raw:: html

   &lt;div id="jira-issues-1731266361"
   style="width: 100%;  overflow: auto;"&gt;

+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| Key                                                               | Summary                                                                                                                                   | T       |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-559 &lt;<https://jira.ez.no/browse/EZEE-559?src=confmacro>&gt;\_\_   | All siteaccesses are underlined in studio &lt;<https://jira.ez.no/browse/EZEE-559?src=confmacro>&gt;\_\_                                          | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-553 &lt;<https://jira.ez.no/browse/EZEE-553?src=confmacro>&gt;\_\_   | Content Airtime Settings reset automatically after a while &lt;<https://jira.ez.no/browse/EZEE-553?src=confmacro>&gt;\_\_                         | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-549 &lt;<https://jira.ez.no/browse/EZEE-549?src=confmacro>&gt;\_\_   | Timestamp appearing the date field instead of a date in the airtime config popup &lt;<https://jira.ez.no/browse/EZEE-549?src=confmacro>&gt;\_\_   | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-547 &lt;<https://jira.ez.no/browse/EZEE-547?src=confmacro>&gt;\_\_   | Can't return to Home page &lt;<https://jira.ez.no/browse/EZEE-547?src=confmacro>&gt;\_\_                                                          | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-545 &lt;<https://jira.ez.no/browse/EZEE-545?src=confmacro>&gt;\_\_   | Push-out confirmation after freeing slots in Schedule block &lt;<https://jira.ez.no/browse/EZEE-545?src=confmacro>&gt;\_\_                        | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-540 &lt;<https://jira.ez.no/browse/EZEE-540?src=confmacro>&gt;\_\_   | Issue with adding duplicated content item in Schedule block &lt;<https://jira.ez.no/browse/EZEE-540?src=confmacro>&gt;\_\_                        | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-537 &lt;<https://jira.ez.no/browse/EZEE-537?src=confmacro>&gt;\_\_   | No validation on Approval Timeline page input field &lt;<https://jira.ez.no/browse/EZEE-537?src=confmacro>&gt;\_\_                                | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-536 &lt;<https://jira.ez.no/browse/EZEE-536?src=confmacro>&gt;\_\_   | Typo in Approval Timeline message title &lt;<https://jira.ez.no/browse/EZEE-536?src=confmacro>&gt;\_\_                                            | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-523 &lt;<https://jira.ez.no/browse/EZEE-523?src=confmacro>&gt;\_\_   | The page preview is trying to update when user is not on a landing page &lt;<https://jira.ez.no/browse/EZEE-523?src=confmacro>&gt;\_\_            | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-513 &lt;<https://jira.ez.no/browse/EZEE-513?src=confmacro>&gt;\_\_   | Getting error message when previewing the content of Content List Block &lt;<https://jira.ez.no/browse/EZEE-513?src=confmacro>&gt;\_\_            | |Bug|   |
+-------------------------------------------------------------------+-------------------------------------------------------------------------------------------------------------------------------------------+---------+

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="refresh-issues-bottom"&gt;

 10 issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-559+OR+key+%3D+EZS-553+OR+key+%3D+EZS-540+OR+key+%3D+EZS-545+OR+key+%3D+EZS-549+OR+key+%3D+EZS-547+OR+key+%3D+EZS-537+OR+key+%3D+EZS-536+OR+key+%3D+EZS-523+OR+key+%3D+EZS-513+&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="columnMacro"
   style="width:40%;min-width:40%;max-width:40%;"&gt;

 

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Known Issues
   :name: eZStudio16.02Releasenotes-KnownIssues

For known issues head over to our known enablement issues page &lt;<https://doc.ez.no/display/MAIN/Known+Enablement+Issues>&gt;\_\_\\ that
covers eZ Platform and eZ Studio.

\*However here are two issues that were uncovered very late in the
release process since they were hidden by other bugs that we would like
to make you especially aware of:\*

-  
   <img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image26" class="icon" />EZP-25789 &lt;<https://jira.ez.no/browse/EZS-593?src=confmacro>&gt;\_\_
   - Editors access to own user and read all user meta info for author
   field type Backlog
-  
   <img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="image27" class="icon" />EZP-25505 &lt;<https://jira.ez.no/browse/EZP-25505?src=confmacro>&gt;\_\_
   - UserHash is always generated for anonymous user Backlog

 

\*Both are currently being worked on and will be fixed in patch version
in the next couple of weeks.\*

\*
\*

.. raw:: html

   &lt;div class="action-body flooded"&gt;

.. rubric:: Disabling Studio Demo Bundle
   :name: eZStudio16.02Releasenotes-DisablingStudioDemoBundle

eZStudioDemoBundle is a showcase of eZ Studio. It should not serve as a
base for projects. A clean installer of Studio is on its way.

In the meantime, you can overwrite the bundle in two ways:

1. Due to Symfony2 loading mechanism, bundles are loaded last and have
the highest priority, so you can place your app in a bundle and load it
last in AppKernel.php. Then every Studio Demo configuration will be
overwritten.

2. Disable the eZStudioDemoBundle\` from `AppKernel.php`, then only your configuration will remain. This solution generates extra work, you have to take care of content existing in Studio Demo and every template used in it (location views, block templates, page design, etc.). You can always remove all the content in Home root, then disable the Demo Bundle and you should encounter no exceptions.

In version **16.04** we will provide a clean installer without demo content and with generic landing page block templates, where you can create your design and place configuration wherever you want.

</div>
**Upgrading a 15.12.1 Studio project**

You can easily upgrade your existing Studio project in version 15.12.1 (1.1.0) using Composer.

Start from the project root. First, create a new branch from:

1.  your master project branch, or 
2.  the branch you are upgrading on:

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
In case of different localization of the sources, add `ezsystems/ezstudio` as an upstream remote:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.2.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git remote add ezstudio http://github.com/ezsystems/ezstudio.git
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
git pull ezstudio v1.2.0
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-warning">
Caution!

<div class="confluence-information-macro-body">
If you had custom siteaccesses or languages set up in your installation, a conflict may appear here. This is because new siteaccesses are introduced in Studio demo in this release: "fr" for French, "de" for German and "no" for Norwegian.

To avoid overriding your siteaccesses with the new ones, you need to accept your own changes in the `app/config/ezplatform.yml` file.

If you have no custom siteaccesses or languages and no conflict occurs, you can do one of the following things:

**A)** Add languages and permissions to use the newly introduced siteaccesses from the demo.

To do this, log in to the application and go to the Admin Panel.

Choose Languages and click Create a new language. Create a language for each of the new siteaccesses.

Then, click **Roles** and select the Anonymous Role. Click Edit limitations next to the following function:

<img src="attachments/31430131/31430128.png" alt="image28" class="confluence-embedded-image" width="500" />

Select all available siteaccesses and click Save.

**B)** Remove the new siteaccesses.

</div>
</div>
 

 

You will get conflicts, and it is perfectly normal. The most common ones will be on `composer.json` and `composer.lock`.

The latter can be ignored, as it will be regenerated when we execute composer update later. The easiest is to checkout the version from the tag, and add it to the changes:

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you get a **lot** of conflicts (on the `doc` folder for instance), and eZ Studio was installed from the [share.ez.no](http://share.ez.no) tarball, it might be because of incomplete history. You will have to run `git fetch ezstudio --unshallow` to load the full history, and run the merge again.

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
git checkout --theirs composer.json && git diff HEAD composer.json
```

</div>
</div>
You should see what was changed, as compared to your own version, in the diff output. This update changes the requirements for all of the `ezsystems/` packages. Those changes should be left untouched. All of the other changes will be removals of what you added for your own project. Use `git checkout -p` to selectively cancel those changes:

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

**Updating**

At this point, you should have a composer.json file with the correct requirements. Run `composer update` to update the dependencies. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
composer update --with-dependencies ezsystems/ezpublish-kernel ezsystems/platform-ui-bundle ezsystems/repository-forms ezsystems/studio-ui-bundle ezsystems/ezstudio-demo-bundle ezsystems/landing-page-fieldtype-bundle ezsystems/flex-workflow
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
Because from this release onwards eZ Studio is compatible only with PHP 5.5 and higher, the update command above will fail if you use an older PHP version. Please update PHP to proceed.

</div>
</div>
**Database update**

The 16.02 release requires an update to the database. Import `vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql` into your database:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -p -u <database_user> <database_name> < vendor/ezsystems/ezpublish-kernel/data/update/mysql/dbupdate-6.1.0-to-6.2.0.sql
```

</div>
</div>
To enable the new Flex workflow notification feature, import the following file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
mysql -p -u <database_user> <database_name> < vendor/ezsystems/ezstudio-notifications/bundle/Resources/install/ezstudio-notifications.sql
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

Once all the conflicts have been resolved, and `composer.lock` updated, the merge can be committed. Note that you may or may not keep `composer.lock`, depending on your version management workflow. If you do not wish to keep it, run `git reset HEAD <file>` to remove it from the changes. Run `git commit`, and adapt the message if necessary. You can now test the project, run integration tests... once the upgrade has been approved, go back to `master`, and merge the `upgrade`-`1.2.0` branch:

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

<div>

------------------------------------------------------------------------

</div>
</div>
</div>
</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
<img src="images/icons/bullet_blue.gif" alt="image29" width="8" height="8" /> [flex\_workflow\_notification\_in\_profile.png](attachments/31430131/31430126.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image30" width="8" height="8" /> [flex\_workflow\_notification\_window.png](attachments/31430131/31430127.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image31" width="8" height="8" /> [adding\_siteaccess\_limitations\_rn16.02.png](attachments/31430131/31430128.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image32" width="8" height="8" /> [schedule\_block\_airtime\_settings.png](attachments/31430131/31430129.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image33" width="8" height="8" /> [timeline\_view\_list.png](attachments/31430131/31430130.png) (image/png)

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

