1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.03 Release notes </span>
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

<span><span style="color: rgb(0,51,102);">eZ Platform "Alpha2" available for testing</span></span>
--------------------------------------------------------------------------------------------------

##### 13th May 2015

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429950/31429945.png" title="Preview of Platform UI during editing an image" alt="Preview of Platform UI Alpha2 during editing an image" class="confluence-embedded-image" width="300" height="128" /></span>

#### Quick links

-   <span style="color: rgb(0,51,102);"><a href="https://github.com/ezsystems/ezplatform/blob/master/INSTALL.md" class="external-link">Install</a></span>
-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) <span style="color: rgb(128,128,128);">*(currently same as eZ Publish Platform 5.4)*</span></span>
-   <span style="color: rgb(0,0,0);">Upgrading: <span style="color: rgb(128,128,128);">*As this is a alpha release, there is no upgrade instructions yet, this is planned for Beta during the Summer.*</span></span>

-   Download: See <a href="http://share.ez.no/downloads/downloads/ez-platform-15.03-alpha" class="external-link">share.ez.no/downloads</a>, or see *Install* for how to install via composer.

The second alpha release of eZ Platform,<span style="color: rgb(51,51,51);">15.03, builds upon the </span>[15.01](eZ-Platform-15.01-Release-notes_31429941.html)<span style="color: rgb(51,51,51);"> March release adding additional support for editing- and browsing-capabilities. It also contains several underlying improvements and fixes developed for </span>[5.3.5](https://doc.ez.no/display/TMPA/5.3.5+Release+Notes)<span style="color: rgb(51,51,51);"> and </span>[5.4.2](https://doc.ez.no/display/TMPA/5.4.2+Release+Notes),<span style="color: rgb(51,51,51);"> that has also been released recently.</span>

*Next release is planned to be released beginning of June, and will preview several additional features currently not exposed yet.*

Highlights
----------

Besides lots of smaller improvements and fixes found bellow, and mentioned above for the 5.x sub release, the main visual changes are: 

### <span style="line-height: 1.5625;">Platform UI Bundle with Universal Discovery Widget</span>

 

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left"><span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429950/31429943.png" class="confluence-embedded-image confluence-thumbnail" width="300" /></span></td>
<td align="left"><p>One important feature in eZ Publish, and also now eZ Platform, is being able to browse for content you want to select. In eZ Platform we call this Universal Discovery Widget, and in this release you can see more or less the completion of first part of this with possibility to select by browsing the tree (location structure): <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-23893?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" class="icon" />EZP-23893</a> - <span class="summary">UDW : Basic tree</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span></p>
<p>This is used for Relation, Relation List and Section assignment selection so far, and before July release we hope to complete this part with inclusion of <span class="jira-issue"> <a href="https://jira.ez.no/browse/EZP-24067?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" class="icon" />EZP-24067</a> - <span class="summary">Sub items widget</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-current jira-macro-single-issue-export-pdf">QA</span> </span></p>
<p>Future tentatively planned ways to browse for content includes:</p>
<p></p>
<div id="refresh-module-1184597724">
<p></p>
<div id="jira-issues-1184597724" style="width: 100%;  overflow: auto;">
<table>
<tbody>
<tr class="odd">
<td align="left"><span class="jim-table-header-content">Summary</span></td>
<td align="left"><span class="jim-table-header-content">Updated</span></td>
<td align="left"><span class="jim-table-header-content">P</span></td>
<td align="left"><span class="jim-table-header-content">Status</span></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-24284?src=confmacro">UDW - Search</a></td>
<td align="left">Jun 30, 2016</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/critical.png" alt="Critical" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-24285?src=confmacro">UDW - recent content</a></td>
<td align="left">Jun 30, 2016</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-24286?src=confmacro">UDW : Bookmark</a></td>
<td align="left">Jun 30, 2016</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/minor.png" alt="Medium" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-24287?src=confmacro">UDW : ID</a></td>
<td align="left">Jun 30, 2016</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/trivial.png" alt="Low" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
</tr>
</tbody>
</table>
</div>
<div class="refresh-issues-bottom">
<span id="total-issues-count-1184597724"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=key+in+%28EZP-24284%2C+EZP-24285%2C+EZP-24286%2C+EZP-24287%29++order+by+priority+&amp;src=confmacro" title="View all matching issues in JIRA.">4 issues</a> </span>
</div>
</div></td>
</tr>
</tbody>
</table>

### <span style="color: rgb(0,98,147);font-size: 16.0px;line-height: 1.5625;">Demo Bundle with privacy cookie banner</span>

|                                                                                                                                                                                                          |                                                                                                                                                                                                                                                                                                                      |
|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| <span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429950/31429944.png" class="confluence-embedded-image confluence-thumbnail" width="300" /></span> | Available in this release is a new <a href="https://github.com/ezsystems/EzSystemsPrivacyCookieBundle" class="external-link">PrivacyCookieBundle</a>, providing easy access to setup warning and remembering user input for Privacy banners needed to comply with EU directive commonly referred to as "Cookie law". |

### Other notable changes

-   <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-24015?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" class="icon" />EZP-24015</a> - <span class="summary">Improve Language Switcher flags and logic</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span>
-   <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-23730?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" class="icon" />EZP-23730</a> - <span class="summary">As an editor, I want to see the content of the media fields</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span>
-   <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-23816?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" class="icon" />EZP-23816</a> - <span class="summary">As an editor, I want to be able to fill the Relation field</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span>
-   <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-24213?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" class="icon" />EZP-24213</a> - <span class="summary">FullText stopWordThreshold should be percentage of content count</span> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span>

 

Changelog
---------

*Changes* (Stories, Improvements and bug fixes) can be found in our issue tracker: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=fixVersion%3D%222015.03%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++&amp;src=confmacro" class="issue-link">47 issues</a> </span>  *(some are still pending additional documentation changes)*

### <span style="font-size: 20.0px;font-weight: normal;line-height: 1.5;">Known issues & upcoming features</span>

-   List of issues specifically affecting this release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.03+ORDER+BY+priority+++&amp;src=confmacro" class="issue-link">19 issues</a> </span>
-   General "Known issues" in *Platform stack* compared to* Legacy*: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">8 issues</a> </span>
-   Epics tentatively\* planned for first stable release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">7 issues</a> </span>
-   Epics tentatively\* planned for first LTS release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&amp;src=confmacro" class="issue-link">0 issue</a> </span>

*<span style="color: rgb(255,255,255);">'</span>\* Some of these features will not be in the stable releases, the once we first and foremost will aim for having in the release are those mentioned on the <a href="http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform" class="external-link">Roadmap</a>.*

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 19.16.38 .png](attachments/31429950/31429943.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PrivacyCookieBundle.png](attachments/31429950/31429944.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 11.46.48 .png](attachments/31429950/31429945.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iStock\_000032478246XLarge - banner doc.jpg](attachments/31429950/31429946.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Ventoux-Square.jpg](attachments/31429950/31429947.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429950/31429948.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform screenshoot alpha1.gif](attachments/31429950/31429949.gif) (image/gif)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


