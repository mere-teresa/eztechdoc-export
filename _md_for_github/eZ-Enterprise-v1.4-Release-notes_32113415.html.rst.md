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
**Developer : eZ Enterprise v1.4 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Jan 30, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
The v1.4.0 release of eZ Enterprise is available as of 30 June 2016. (We've [simplified](http://share.ez.no/blogs/ez/ez-systems-release-cycles-and-version-names-simplified) version names.)

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For the release notes of the corresponding *(and included)* eZ Platform release, see [eZ Platform v1.4.0 Release notes](eZ-Platform-v1.4.0-Release-notes_32113421.html)

</div>
</div>
 

**Quick links**

-   [Installation instructions](31429538.html)
-   [Requirements](31429536.html)
-   Download:
    -   As Customer with eZ Enterprise subscription: <https://support.ez.no/Downloads> *( [BUL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?processed=1457699707&return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1)*
        -   License)\*
    -   As Partner with Test & Trial software access: <https://support.ez.no/Downloads> \*  *( [TTL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0)* \* License)\* \*
    -   If none of the above, request a demo instance: <http://ez.no/Forms/Discover-eZ-Studio>

 

**Changes since 2016.04**

**Summary of changes**

This release focused on bug fixing and optimization, and the developer effort was concentrated on features that are included in eZ Platform. Thus, no major Studio-specific features appear in this version.

Significant improvements include:

-   v1.0.0 of [RecommendationBundle](https://github.com/ezsystems/EzSystemsRecommendationBundle)released
-   Schedule Block algorithm improved
-   Landing Page-related usability fixes

 

**Full list of improvements and bugfixes**

<div id="refresh-module-1863098494">
<div id="jira-issues-1863098494"
style="width: 100%;  overflow: auto;">
<table style="width:100%;">
<colgroup>
<col width="26%" />
<col width="66%" />
<col width="7%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left">Key</td>
<td align="left">Summary</td>
<td align="left">T</td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-828?src=confmacro">EZEE-828</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-828?src=confmacro">Duplicated entry in assetic configuration leads to css 404 problems on linux machines</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-817?src=confmacro">EZEE-817</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-817?src=confmacro">Incorrect header in block settings</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-814?src=confmacro">EZEE-814</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-814?src=confmacro">UnauthorizedException indexing user content object with Recommendation Bundle</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-810?src=confmacro">EZEE-810</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-810?src=confmacro">Not able to set the cursor in the middle of string in any input of block config form</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-809?src=confmacro">EZEE-809</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-809?src=confmacro">Content disappears from Schedule Block timeline when editing a published landing page</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-807?src=confmacro">EZEE-807</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-807?src=confmacro">Schedule Block - remove unnecessary DateTime format</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-800?src=confmacro">EZEE-800</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-800?src=confmacro">Content item preview disappears after turning overflow on</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-799?src=confmacro">EZEE-799</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-799?src=confmacro">Schedule Block new algorithm implementation</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-653?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-794?src=confmacro">EZEE-794</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-794?src=confmacro">Notifications pop-up page number field size</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-790?src=confmacro">EZEE-790</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-790?src=confmacro">Use view interface in Studio Demo controllers</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-788?src=confmacro">EZEE-788</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-788?src=confmacro">Cannot log in as users other than admin</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-780?src=confmacro">EZEE-780</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-780?src=confmacro">The UI does not seem to handle many input fields there is no way to scroll the block config field</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-779?src=confmacro">EZEE-779</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-779?src=confmacro">Schedule block problem with removing and adding once again the same Item</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-778?src=confmacro">EZEE-778</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-778?src=confmacro">Schedule block issue with removing content item when some item was added again</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-776?src=confmacro">EZEE-776</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-776?src=confmacro">Problem with access to setting in second and next block in one zone</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-773?src=confmacro">EZEE-773</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-773?src=confmacro">Content issues with studio demo data</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-772?src=confmacro">EZEE-772</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-772?src=confmacro">404 response code from Flex Workflow endpoint</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-770?src=confmacro">EZEE-770</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-770?src=confmacro">Schedule grid doesn't display properly in eZ Studio</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-769?src=confmacro">EZEE-769</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-769?src=confmacro">Some blocks have not existing view types in clean studio</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-764?src=confmacro">EZEE-764</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-764?src=confmacro">When clicking on Content Tree I cannot see it</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-762?src=confmacro">EZEE-762</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-762?src=confmacro">eZStudio 2016.04 (1.3) installation from tarball doesn't work</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-752?src=confmacro">EZEE-752</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-752?src=confmacro">Overflow target schedule block changes are shifted by one</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-699?src=confmacro">EZEE-699</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-699?src=confmacro">Not required empty block field prevents submission of configure popup</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-698?src=confmacro">EZEE-698</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-698?src=confmacro">Landingpage block popup not displaying correctly</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-697?src=confmacro">EZEE-697</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-697?src=confmacro">Accessing other content_types than landing pages in eZ Studio pages on a siteaccess with tree_root, broken</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-696?src=confmacro">EZEE-696</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-696?src=confmacro">Siteaccess selection broken, in Page tab, with custom tree_root setting</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-679?src=confmacro">EZEE-679</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-679?src=confmacro">Xsd Validation for XML files</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-670?src=confmacro">EZEE-670</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-670?src=confmacro">Ends up in non-existing url after publishing</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-653?src=confmacro">EZEE-653</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-653?src=confmacro">Add a Gallery content type in the Media content type group</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-653?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-628?src=confmacro">EZEE-628</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-628?src=confmacro">Schedule always shows all blocks, including future ones</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro">EZEE-569</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro">Settings form of RSS block has got broken layout</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-569?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-535?src=confmacro">EZEE-535</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-535?src=confmacro">Change color of slot indicator to match border color</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro">EZEE-445</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro">Hide the Landing Page field type on Landing Page Content in content view</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZEE-445?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
</tr>
</tbody>
</table>

</div>
<div class="refresh-issues-bottom">
> \`33

issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-788+OR+key+%3D+EZS-773+OR+key+%3D+EZS-776+OR+key+%3D+EZS-770+OR+key+%3D+EZS-769+OR+key+%3D+EZS-764+OR+key+%3D+EZS-762+OR+key+%3D+EZS-653+OR+key+%3D+EZS-535+OR+key+%3D+EZS-445+OR+key+%3D+EZS-799+OR+key+%3D+EZS-779+OR+key+%3D+EZS-780+OR+key+%3D+EZS-698+OR+key+%3D+EZS-699+OR+key+%3D+EZS-790+OR+key+%3D+EZS-679+OR+key+%3D+EZS-752+OR+key+%3D+EZS-807+OR+key+%3D+EZS-778+OR+key+%3D+EZS-809+OR+key+%3D+EZS-800+OR+key+%3D+EZS-794+OR+key+%3D+EZS-817+OR+key+%3D+EZS-810+OR+key+%3D+EZS-670+OR+key+%3D+EZS-828+OR+key+%3D+EZS-569+OR+key+%3D+EZS-696+OR+key+%3D+EZS-697+OR+key+%3D+EZS-814+OR+key+%3D+EZS-772+OR+key+%3D+EZS-628+&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

 

.. rubric:: Updating
   :name: eZEnterprisev1.4Releasenotes-Updating

To update to this version, follow the \\ Updating eZ Platform &lt;Updating-eZ-Platform\_31431770.html&gt;\_\_ guide and use v1.4.0 as
&lt;version&gt;.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

.. rubric:: In this topic:
   :name: eZEnterprisev1.4Releasenotes-Inthistopic:

.. raw:: html

   &lt;div class="toc-macro rbtoc1490376010810"&gt;

-  Quick links &lt;\#eZEnterprisev1.4Releasenotes-Quicklinks&gt;\_\_
-  Changes since 2016.04 &lt;\#eZEnterprisev1.4Releasenotes-Changessince2016.04&gt;\_\_

   -  Summary of changes &lt;\#eZEnterprisev1.4Releasenotes-Summaryofchanges&gt;\_\_
   -  Full list of improvements and bugfixes &lt;\#eZEnterprisev1.4Releasenotes-Fulllistofimprovementsandbugfixes&gt;\_\_

-  Updating &lt;\#eZEnterprisev1.4Releasenotes-Updating&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div id="footer" role="contentinfo"&gt;

.. raw:: html

   &lt;div class="section footer-body"&gt;

Document generated by Confluence on Mar 24, 2017 17:20

.. raw:: html

   &lt;div id="footer-logo"&gt;

Atlassian &lt;<http://www.atlassian.com/>&gt;\`\_\_

</div>
</div>
</div>
</div>

