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
**Developer : eZ Platform 15.03 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek on Apr 18, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:70%;min-width:70%;max-width:70%;">
**eZ Platform "Alpha2" available for testing**

</div>
<div class="columnMacro"
style="width:30%;min-width:30%;max-width:30%;">
**13th May 2015**

</div>
</div>
</div>
</div>
<div class="table-wrap">
<img src="attachments/31429950/31429945.png" alt="Preview of Platform UI Alpha2 during editing an image" class="confluence-embedded-image" width="300" height="128" />

**Quick links**

-   [Install](https://github.com/ezsystems/ezplatform/blob/master/INSTALL.md)
-   [Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) *(currently same as eZ Publish Platform 5.4)*
-   Upgrading: *As this is a alpha release, there is no upgrade instructions yet, this is planned for Beta during the Summer.*
-   Download: See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.03-alpha), or see *Install* for how to install via composer.

The second alpha release of eZ Platform,15.03, builds upon the [15.01](eZ-Platform-15.01-Release-notes_31429941.html) March release adding additional support for editing- and browsing-capabilities. It also contains several underlying improvements and fixes developed for [5.3.5](https://doc.ez.no/display/TMPA/5.3.5+Release+Notes) and [5.4.2](https://doc.ez.no/display/TMPA/5.4.2+Release+Notes), that has also been released recently.

*Next release is planned to be released beginning of June, and will preview several additional features currently not exposed yet.*

</div>
**Highlights**

Besides lots of smaller improvements and fixes found bellow, and mentioned above for the 5.x sub release, the main visual changes are: 

**Platform UI Bundle with Universal Discovery Widget**

 

<div class="table-wrap">
<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left"><img src="attachments/31429950/31429943.png" alt="image1" class="confluence-embedded-image confluence-thumbnail" width="300" /></td>
<td align="left"><p>One important feature in eZ Publish, and also now eZ Platform, is being able to browse for content you want to select. In eZ Platform we call this Universal Discovery Widget, and in this release you can see more or less the completion of first part of this with possibility to select by browsing the tree (location structure): |image2|\ EZP-23893 &lt;https://jira.e
z.no/browse/EZP-23893?src=confmacro&gt;
__ - UDW : Basic tree Closed</p>
<p>This is used for Relation, Relation List and Section assignment selection so far, and before July release we hope to complete this part with inclusion of |image3|\ EZP-24067 &lt;https://jira.e
z.no/browse/EZP-24067?src=confmacro&gt;
__ - Sub items widget QA</p>
<p>Future tentatively planned ways to browse for content includes:</p>
<div
id="refresh-module-1184597724">
<div id="jira-issues-1184597724"
style="width: 100%;  overflow: au
<p>to;&quot;&gt;</p>
<p>+--------------------------------------------------------------------------------+----------------+--------------+----------+ | Summary</p>
<blockquote>
<p>Updated | P</p>
</blockquote>
<blockquote>
<p>Status |</p>
</blockquote>
<p>+--------------------------------------------------------------------------------+----------------+--------------+----------+ | UDW - Search &lt;https://jira.ez.no/
browse/EZP-24284?src=confmacro&gt;__ | Jun 30, 2016 | |Critica l| | Open | +--------------------------------------------------------------------------------+----------------+--------------+----------+ | UDW - recent content &lt;https://jir
a.ez.no/browse/EZP-24285?src=confmac
ro&gt;__ | Jun 30, 2016 | <img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /> | Open | +--------------------------------------------------------------------------------+----------------+--------------+----------+ | UDW : Bookmark &lt;https://jira.ez.n
o/browse/EZP-24286?src=confmacro&gt;__ | Jun 30, 2016 | <img src="https://jira.ez.no/images/icons/priorities/minor.png" alt="Medium" class="icon" /> | Open | +--------------------------------------------------------------------------------+----------------+--------------+----------+ | UDW : ID &lt;https://jira.ez.no/brow
se/EZP-24287?src=confmacro&gt;__ | Jun 30, 2016 | <img src="https://jira.ez.no/images/icons/priorities/trivial.png" alt="Low" class="icon" /> | Open | +--------------------------------------------------------------------------------+----------------+--------------+----------+</p>
</div>
<div
class="refresh-issues-bottom">
<blockquote>
<p>`4</p>
</blockquote>
<p>issues &lt;<a href="https://jira.ez.no/secure/Is" class="uri">https://jira.ez.no/secure/Is</a> sueNavigator.jspa?reset=true&amp;jqlQuer y=key+in+%28EZP-24284%2C+EZP-24285%2 C+EZP-24286%2C+EZP-24287%29++order+b y+priority+&amp;src=confmacro&gt;`__</p>
</div>
</div></td>
</tr>
</tbody>
</table>

</div>
**Demo Bundle with privacy cookie banner**

<div class="table-wrap">
<table>
<colgroup>
<col width="4%" />
<col width="95%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left"><img src="attachments/31429950/31429944.png" alt="image8" class="confluence-embedded-image confluence-thumbnail" width="300" /></td>
<td align="left">Available in this release is a new <a href="https://github.com/ezsystems/EzSystemsPrivacyCookieBundle">PrivacyCookieBundle</a>, providing easy access to setup warning and remembering user input for Privacy banners needed to comply with EU directive commonly referred to as &quot;Cookie law&quot;.</td>
</tr>
</tbody>
</table>

</div>
**Other notable changes**

-   [<img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="image9" class="icon" />EZP-24015](https://jira.ez.no/browse/EZP-24015?src=confmacro)
    - Improve Language Switcher flags and logic Closed
-   [<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image10" class="icon" />EZP-23730](https://jira.ez.no/browse/EZP-23730?src=confmacro)
    - As an editor, I want to see the content of the media fields Closed
-   [<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image11" class="icon" />EZP-23816](https://jira.ez.no/browse/EZP-23816?src=confmacro)
    - As an editor, I want to be able to fill the Relation field Closed
-   [<img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="image12" class="icon" />EZP-24213](https://jira.ez.no/browse/EZP-24213?src=confmacro)
    - FullText stopWordThreshold should be percentage of content count Closed

 

**Changelog**

*Changes* (Stories, Improvements and bug fixes) can be found in our issue tracker:  [47 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.03%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++&src=confmacro)  \*(some are still pending additional documentation changes)\*

**Known issues & upcoming features**

-   List of issues specifically affecting this release:  [19 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.03+ORDER+BY+priority+++&src=confmacro)
-   General "Known issues" in *Platform stack* compared to\* Legacy\*:  [8 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro)
-   Epics tentatively\* planned for first stable release:  [7 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro)
-   Epics tentatively\* planned for first LTS release:  [0 issue](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&src=confmacro)

*'\* Some of these features will not be in the stable releases, the once we first and foremost will aim for having in the release are those mentioned on the [Roadmap](http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform).*

</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
<img src="images/icons/bullet_blue.gif" alt="image13" width="8" height="8" /> [Screen Shot 2015-05-12 at 19.16.38 .png](attachments/31429950/31429943.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image14" width="8" height="8" /> [PrivacyCookieBundle.png](attachments/31429950/31429944.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image15" width="8" height="8" /> [Screen Shot 2015-05-12 at 11.46.48 .png](attachments/31429950/31429945.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image16" width="8" height="8" /> [iStock\_000032478246XLarge - banner doc.jpg](attachments/31429950/31429946.jpg) (image/jpeg) <img src="images/icons/bullet_blue.gif" alt="image17" width="8" height="8" /> [Ventoux-Square.jpg](attachments/31429950/31429947.jpg) (image/jpeg) <img src="images/icons/bullet_blue.gif" alt="image18" width="8" height="8" /> [Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429950/31429948.jpg) (image/jpeg) <img src="images/icons/bullet_blue.gif" alt="image19" width="8" height="8" /> [Platform screenshoot alpha1.gif](attachments/31429950/31429949.gif) (image/gif)

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

