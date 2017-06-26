<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Enterprise Release notes](eZ-Enterprise-Release-notes_31430108.html)
6.  [eZ Studio 15.12 Release notes](eZ-Studio-15.12-Release-notes_31430118.html)

</div>
**Developer : eZ Studio 15.12.1 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek on Apr 18, 2016

</div>
<div id="main-content" class="wiki-content group">
**Table of contents:**

<div class="toc-macro rbtoc1490376016731">
-   [Changes since 15.12](#eZStudio15.12.1Releasenotes-Changessince15.12)
    -   [Summary of changes](#eZStudio15.12.1Releasenotes-Summaryofchanges)
    -   [Full list of improvements](#eZStudio15.12.1Releasenotes-Fulllistofimprovements)
    -   [Full list of bugfixes](#eZStudio15.12.1Releasenotes-Fulllistofbugfixes)
-   [Upgrading a 15.12 Studio project](#eZStudio15.12.1Releasenotes-Upgradinga15.12Studioproject)

</div>
 

The first sub-release of [eZ Studio 15.12](eZ-Studio-15.12-Release-notes_31430118.html) is available as of February 2nd.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
For the release notes of the corresponding *(and included)* eZ Platform sub-release, see [eZ Platform 15.12.1 Release Notes](eZ-Platform-15.12.1-Release-Notes_31430110.html).

</div>
</div>
 

**Changes since 15.12**

**Summary of changes**

-   Enhanced Landing Page drag-and-drop interactions, including a better visualization of dropping blocks onto the page:

<img src="attachments/31430124/31430123.png" alt="Dropping a block onto a Landing Page" class="confluence-embedded-image" height="250" />

 

-   Timeline toolbar now covers all changes in all Schedule Blocks on a given Landing Page.
-   Timeline toolbar is now also available in View mode on Landing Pages:

<img src="attachments/31430124/31430122.png" alt="Landing Page in View mode with a Timeline" class="confluence-embedded-image" width="600" />

 

-   Added an Approval Timeline which lists all review requests for a given Content item:

<img src="attachments/31430124/31430120.png" alt="Approval timeline screen" class="confluence-embedded-image" width="600" />

-   Modified template of the notification email sent to reviewers from Flex Workflow.
-   Minor UI improvements (including: updated icons, labels, date picker and others):

<img src="attachments/31430124/31430121.png" alt="Datepicker" class="confluence-embedded-image confluence-thumbnail" width="200" />

 

-   Added notification when copying a URL.
-   Numerous bug fixes.

 

**Full list of improvements**

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:60 %;min-width:60 %;max-width:60 %;">
 

<div id="refresh-module-934673534">
<div id="jira-issues-934673534"
style="width: 100%;  overflow: auto;">
<table>
<colgroup>
<col width="25%" />
<col width="67%" />
<col width="6%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left">Key</td>
<td align="left">Summary</td>
<td align="left">T</td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-509?src=confmacro">EZEE-509</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-509?src=confmacro">Get information about content workflow status and messages history from backend</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-509?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/newfeature.png" alt="Feature" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-508?src=confmacro">EZEE-508</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-508?src=confmacro">Schedule block: when removing content from the future the content is not moved to the history</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-312?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-506?src=confmacro">EZEE-506</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-506?src=confmacro">As a user, I want to see approval timeline in content editor mode</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-326?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-500?src=confmacro">EZEE-500</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-500?src=confmacro">The timeline should display all future changes from all the schedule blocks at once</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-499?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/subtask_alternate.png" alt="Sub-task" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-499?src=confmacro">EZEE-499</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-499?src=confmacro">Add the timeline to the Page view</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-499?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/subtask_alternate.png" alt="Sub-task" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-498?src=confmacro">EZEE-498</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-498?src=confmacro">Show a dashed frame when dragging over valid target area</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-497?src=confmacro">EZEE-497</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-497?src=confmacro">Change Schedule block's Delete label</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-496?src=confmacro">EZEE-496</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-496?src=confmacro">Change Schedule block's Settings label</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-494?src=confmacro">EZEE-494</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-494?src=confmacro">Datepicker add animation and CSS changes</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-493?src=confmacro">EZEE-493</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-493?src=confmacro">When clicking on Copy URL user gets a notification that confirms the action done</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-487?src=confmacro">EZEE-487</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-487?src=confmacro">Draggable interaction - show dashed frame in place of selected element</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-486?src=confmacro">EZEE-486</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-486?src=confmacro">Refine dragging interaction with elements</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-485?src=confmacro">EZEE-485</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-485?src=confmacro">Change cursor to show that an element is draggable</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-451?src=confmacro">EZEE-451</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-451?src=confmacro">When switching from Page to Content I'm not redirected to a correct page in PlatformUI</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-312?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-450?src=confmacro">EZEE-450</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-450?src=confmacro">Replace Slot Icon and label</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-449?src=confmacro">EZEE-449</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-449?src=confmacro">Change the page title</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-412?src=confmacro">EZEE-412</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-412?src=confmacro">Update Flex Workflow email template</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-402?src=confmacro">EZEE-402</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-402?src=confmacro">Dynamic Landing page, define width &amp; height for resizable Page Description input box</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-392?src=confmacro">EZEE-392</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-392?src=confmacro">Moving blocks on landing pages is tricky</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-312?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-373?src=confmacro">EZEE-373</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-373?src=confmacro">As a User, I want to be able to access the Scheduled Block toolbar at all times</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-326?src=confmacro">EZEE-326</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-326?src=confmacro">As an editor I would like to see the now time indicator in the timeline when scheduling content inside a schedule block</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-326?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro">EZEE-185</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro">As an editor I would like to see overflow block select field hidden when overflow is turned off</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-185?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
</tbody>
</table>

</div>
<div class="refresh-issues-bottom">
> \`22

issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-373+OR+key+%3D+EZS-392+OR+key+%3D+EZS-326+OR+key+%3D+EZS-402+OR+key+%3D+EZS-185+OR+key+%3D+EZS-451+OR+key+%3D+EZS-485+OR+key+%3D+EZS-450+OR+key+%3D+EZS-449+OR+key+%3D+EZS-486+OR+key+%3D+EZS-487+OR+key+%3D+EZS-499+OR+key+%3D+EZS-500+OR+key+%3D+EZS-494+OR+key+%3D+EZS-496+OR+key+%3D+EZS-497+OR+key+%3D+EZS-498+OR+key+%3D+EZS-493+OR+key+%3D+EZS-508+OR+key+%3D+EZS-412+OR+key+%3D+EZS-509+OR+key+%3D+EZS-506++++&src=confmacro>&gt;\_\_

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
   :name: eZStudio15.12.1Releasenotes-Fulllistofbugfixes

.. raw:: html

   &lt;div class="sectionColumnWrapper"&gt;

.. raw:: html

   &lt;div class="sectionMacro"&gt;

.. raw:: html

   &lt;div class="sectionMacroRow"&gt;

.. raw:: html

   &lt;div class="columnMacro"
   style="width:60%;min-width:60%;max-width:60%;"&gt;

 

.. raw:: html

   &lt;div id="refresh-module-639675483"&gt;

.. raw:: html

   &lt;div id="jira-issues-639675483"
   style="width: 100%;  overflow: auto;"&gt;

+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| Key                                                                 | Summary                                                                                                                                                        | T       |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZP-25291 &lt;<https://jira.ez.no/browse/EZP-25291?src=confmacro>&gt;\_\_   | No \`languageCode\` is set when creating a new content after canceling previous new content creation &lt;<https://jira.ez.no/browse/EZP-25291?src=confmacro>&gt;\_\_   | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-521 &lt;<https://jira.ez.no/browse/EZEE-521?src=confmacro>&gt;\_\_     | The preview height is incorrect &lt;<https://jira.ez.no/browse/EZEE-521?src=confmacro>&gt;\_\_                                                                         | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-518 &lt;<https://jira.ez.no/browse/EZEE-518?src=confmacro>&gt;\_\_     | On Publish action page is reloaded twice &lt;<https://jira.ez.no/browse/EZEE-518?src=confmacro>&gt;\_\_                                                                | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-505 &lt;<https://jira.ez.no/browse/EZEE-505?src=confmacro>&gt;\_\_     | When navigating in the Page mode the URL in the browser address bar is not updating &lt;<https://jira.ez.no/browse/EZEE-505?src=confmacro>&gt;\_\_                     | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-490 &lt;<https://jira.ez.no/browse/EZEE-490?src=confmacro>&gt;\_\_     | Getting error when opening landing page editor &lt;<https://jira.ez.no/browse/EZEE-490?src=confmacro>&gt;\_\_                                                          | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-475 &lt;<https://jira.ez.no/browse/EZEE-475?src=confmacro>&gt;\_\_     | ContentTypes to be displayed change is not stored after publish &lt;<https://jira.ez.no/browse/EZEE-475?src=confmacro>&gt;\_\_                                         | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-459 &lt;<https://jira.ez.no/browse/EZEE-459?src=confmacro>&gt;\_\_     | Block not found exception on publish after adding extra block &lt;<https://jira.ez.no/browse/EZEE-459?src=confmacro>&gt;\_\_                                           | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-458 &lt;<https://jira.ez.no/browse/EZEE-458?src=confmacro>&gt;\_\_     | "button.removeTarget is not a function" error on logout &lt;<https://jira.ez.no/browse/EZEE-458?src=confmacro>&gt;\_\_                                                 | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-444 &lt;<https://jira.ez.no/browse/EZEE-444?src=confmacro>&gt;\_\_     | Blocks are not rendered in the correct order when opening a landing page in the editor &lt;<https://jira.ez.no/browse/EZEE-444?src=confmacro>&gt;\_\_                  | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-442 &lt;<https://jira.ez.no/browse/EZEE-442?src=confmacro>&gt;\_\_     | \[IE11\] The filled slots number is displayed incorrectly &lt;<https://jira.ez.no/browse/EZEE-442?src=confmacro>&gt;\_\_                                                 | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-441 &lt;<https://jira.ez.no/browse/EZEE-441?src=confmacro>&gt;\_\_     | Scroll in editing Landing Page on IE don't work, on FF works slowly &lt;<https://jira.ez.no/browse/EZEE-441?src=confmacro>&gt;\_\_                                     | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-411 &lt;<https://jira.ez.no/browse/EZEE-411?src=confmacro>&gt;\_\_     | Flex workflow not working when receiving notification &lt;<https://jira.ez.no/browse/EZEE-411?src=confmacro>&gt;\_\_                                                   | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-406 &lt;<https://jira.ez.no/browse/EZEE-406?src=confmacro>&gt;\_\_     | Landing Page editing is blocked when page does not have any blocks (empty zones) &lt;<https://jira.ez.no/browse/EZEE-406?src=confmacro>&gt;\_\_                        | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-403 &lt;<https://jira.ez.no/browse/EZEE-403?src=confmacro>&gt;\_\_     | Embed block preview layout position &lt;<https://jira.ez.no/browse/EZEE-403?src=confmacro>&gt;\_\_                                                                     | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-398 &lt;<https://jira.ez.no/browse/EZEE-398?src=confmacro>&gt;\_\_     | \[IE\] Schedule block Timeline colour rendering is broken &lt;<https://jira.ez.no/browse/EZEE-398?src=confmacro>&gt;\_\_                                                 | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-397 &lt;<https://jira.ez.no/browse/EZEE-397?src=confmacro>&gt;\_\_     | \[IE\] Content List & Keyword block empty field validation always fails &lt;<https://jira.ez.no/browse/EZEE-397?src=confmacro>&gt;\_\_                                   | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-396 &lt;<https://jira.ez.no/browse/EZEE-396?src=confmacro>&gt;\_\_     | \[IE\] Landing Page zones layout is broken &lt;<https://jira.ez.no/browse/EZEE-396?src=confmacro>&gt;\_\_                                                                | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-394 &lt;<https://jira.ez.no/browse/EZEE-394?src=confmacro>&gt;\_\_     | \[IE\] Basics section layout is broken &lt;<https://jira.ez.no/browse/EZEE-394?src=confmacro>&gt;\_\_                                                                    | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-393 &lt;<https://jira.ez.no/browse/EZEE-393?src=confmacro>&gt;\_\_     | I can't select the block that I just added to my page &lt;<https://jira.ez.no/browse/EZEE-393?src=confmacro>&gt;\_\_                                                   | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-391 &lt;<https://jira.ez.no/browse/EZEE-391?src=confmacro>&gt;\_\_     | Adding a gallery block to a new landing page breaks the layout view &lt;<https://jira.ez.no/browse/EZEE-391?src=confmacro>&gt;\_\_                                     | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+
| EZEE-312 &lt;<https://jira.ez.no/browse/EZEE-312?src=confmacro>&gt;\_\_     | Cogwheel stuck when creating "Landing Page" &lt;<https://jira.ez.no/browse/EZEE-312?src=confmacro>&gt;\_\_                                                             | |Bug|   |
+---------------------------------------------------------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------+---------+

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="refresh-issues-bottom"&gt;

 21 issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-312+OR+key+%3D+EZS-391+OR+key+%3D+EZS-393+OR+key+%3D+EZS-393+OR+key+%3D+EZS-406+OR+key+%3D+EZS-394+OR+key+%3D+EZS-398+OR+key+%3D+EZP-25291+OR+key+%3D+EZS-397+OR+key+%3D+EZS-396+OR+key+%3D+EZS-441+OR+key+%3D+EZS-442+OR+key+%3D+EZS-444+OR+key+%3D+EZS-403+OR+key+%3D+EZS-458+OR+key+%3D+EZS-459+OR+key+%3D+EZS-475+OR+key+%3D+EZS-490+OR+key+%3D+EZS-505+OR+key+%3D+EZS-518+OR+key+%3D+EZS-521+OR+key+%3D+EZS-411++&src=confmacro>&gt;\_\_

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

 

.. rubric:: Upgrading a 15.12 Studio project
   :name: eZStudio15.12.1Releasenotes-Upgradinga15.12Studioproject

You can easily upgrade your existing Studio project in version 15.12
(1.0) using Composer.

Start from the project root. First, create a new branch from:

a) your master project branch, or 

b) the branch you are upgrading on:

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeHeader panelHeader pdl"
   style="border-bottom-width: 1px;"&gt;

\*\*From your master branch\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    git checkout -b upgrade-1.1.0

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

In case of different localization of the sources, add
ezsystems/ezstudio\` as an upstream remote:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

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
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git pull ezstudio v1.1.0
```

</div>
</div>
You will get conflicts, and it is perfectly normal. The most common ones will be on `composer.json` and `composer.lock`.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you get a **lot** of conflicts (on the `doc` folder for instance), and eZ Platform was installed from the [share.ez.no](http://share.ez.no) tarball, it might be because of incomplete history. You will have to run `git fetch ezstudio --unshallow` to load the full history, and run the merge again.

</div>
</div>
The latter can be ignored, as it will be regenerated when we execute composer update later. The easiest way is to checkout the version from the tag, and add it to the changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**From the upgrade-1.1.0 branch**

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
**From the upgrade-1.1.0 branch**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --theirs composer.json && git diff composer.json
```

</div>
</div>
You should see what was changed, as compared to your own version, in the diff output. The 1.1.0 tag changes the requirements for all of the `ezsystems/` packages. Those should be left untouched. All of the other changes should be removals of your project's additions. You can use `git checkout -p` to selectively cancel those changes:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout -p composer.json
```

</div>
</div>
Answer `no` (do not discard) to the requirement changes of `ezsystems` dependencies, and `yes` (discard) to removals of your changes.

**Using composer require**

You may also checkout your own composer.json, and run the following commands to update the `ezsystems` packages requirements from v1.0.x to v1.1.0:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout --ours composer.json
composer require --no-update "ezsystems/ezpublish-kernel:~6.1.0"
composer require --no-update "ezsystems/platform-ui-bundle:~1.1.0"
composer require --no-update "ezsystems/studio-ui-bundle:~1.1.0"
composer require --no-update "ezsystems/ezstudio-demo-bundle:~1.1.0"
composer require --no-update "ezsystems/landing-page-fieldtype-bundle:~1.1.0"
composer require --no-update "ezsystems/flex-workflow:~1.1.0"
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

Depending on the local changes you have done, you may get other conflicts: configuration files, kernel... 

There shouldn't be many, and you should be able to figure out which value is the right one for all of them:

-   Edit the file, and identify the conflicting changes. If a setting you have modified has also been changed by us, you should be able to figure out which value is the right one.
-   Run `git add conflicting-file` to add the changes

**Updating composer.lock**

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
Because from this release onwards eZ Platform is compatible only with PHP 5.5 and higher, the update command above will fail if you use an older PHP version. Please update PHP to proceed.

</div>
</div>
**Commit, test and merge**

Once all the conflicts have been resolved, and `composer.lock` updated, the merge can be committed. Note that you may or may not keep `composer.lock`, depending on your version management workflow. If you do not wish to keep it, run `git reset HEAD <file>` to remove it from the changes. Run `git commit`, and adapt the message if necessary. You can now test the project, run integration tests... once the upgrade has been approved, go back to `master`, and merge the `upgrade-1.1.0` branch:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
git checkout master
git merge upgrade-1.1.0
```

</div>
</div>
 

 

</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
<img src="images/icons/bullet_blue.gif" alt="image47" width="8" height="8" /> [approval\_timeline.png](attachments/31430124/31430120.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image48" width="8" height="8" /> [new\_datepicker.png](attachments/31430124/31430121.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image49" width="8" height="8" /> [LP\_in\_view\_mode.png](attachments/31430124/31430122.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image50" width="8" height="8" /> [LP\_drag\_and\_drop\_improved.png](attachments/31430124/31430123.png) (image/png)

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

