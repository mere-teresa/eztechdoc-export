1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform v1.5.0 Release notes </span>
===========================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last modified on Sep 05, 2016

The 1.5.0 release of eZ Platform is available as of September 1st 2016.

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
For the release notes of the corresponding eZ Studio release, see [eZ Enterprise v1.5.0 Release notes](eZ-Enterprise-v1.5.0-Release-notes_32114946.html)

<span style="color: rgb(0,98,147);">Quick links</span>
------------------------------------------------------

-   [Installation instructions](https://doc.ez.no/display/DEVELOPER/Step+1%3A+Installation)

-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)</span>

-   <a href="http://share.ez.no/latest" class="external-link">Download</a>

Changes since 1.4.0
-------------------

<span class="confluence-link">For list of issues fixed in 1.5.0 see <a href="https://jira.ez.no/issues/?filter=-1&amp;jql=project%20%3D%20EZP%20AND%20resolution%20!%3D%20Unresolved%20AND%20fixVersion%20in%20(1.5.0)%20ORDER%20BY%20updatedDate%20ASC" class="external-link">our issue tracker</a>, below is a list of notable bugs/features/enhancements done in this release.</span>

 

Backwards Compatibility Warning

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
<span class="confluence-link">We upgraded the versions for Flysystem and Stash. See below for more details.
</span>

<span class="confluence-link">
</span>

 

#### In this topic:

-   [Quick links](#eZPlatformv1.5.0Releasenotes-Quicklinks)
-   [Changes since 1.4.0](#eZPlatformv1.5.0Releasenotes-Changessince1.4.0)
    -   [In this topic:](#eZPlatformv1.5.0Releasenotes-Inthistopic:)
-   [Version Management](#eZPlatformv1.5.0Releasenotes-VersionManagement)
-   [FullText search with Legacy (SQL) Engine](#eZPlatformv1.5.0Releasenotes-FullTextsearchwithLegacy(SQL)Engine)
-   [Preparations for Symfony 3 support](#eZPlatformv1.5.0Releasenotes-PreparationsforSymfony3support)
-   [Other notable improvements](#eZPlatformv1.5.0Releasenotes-Othernotableimprovements)
-   [Full list of changes](#eZPlatformv1.5.0Releasenotes-Fulllistofchanges)

[Updating](#eZPlatformv1.5.0Releasenotes-Updating)
-   [New eZ packages in this release](#eZPlatformv1.5.0Releasenotes-NeweZpackagesinthisrelease)

### Version Management

In this version, you have a new tab "Versions" under which you will be able to manage Versions and Drafts.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32114891/32115355.png" class="confluence-embedded-image" height="150" /></span>

See the video screencast <span class="inline-comment-marker" data-ref="f0fb94eb-1bce-4cbb-b116-4d4929a5f925">for a</span> demonstration of <span class="inline-comment-marker" data-ref="a0f12539-06d0-458f-a2c5-d8f01922820d">this feature</span>.

-   <span class="s2"><a href="https://jira.ez.no/browse/EZP-25463" class="external-link">EZP-25463</a>: Ability to remove drafts</span>
-   <span class="s2"><a href="https://jira.ez.no/browse/EZP-25462" class="external-link">EZP-25462</a>: Ability to remove archived versions</span>
-   <a href="https://jira.ez.no/browse/EZP-26089" class="external-link">EZP-26089</a>: Ability to edit a draft
-   <a href="https://jira.ez.no/browse/EZP-25465" class="external-link">EZP-25465</a>: Implement a Draft conflict screen

 

### FullText search with Legacy (SQL) Engine

As part of <a href="https://jira.ez.no/browse/EZP-25088" class="external-link">EZP-25088</a> FullText indexing is now also working when not using Solr. This will never be as advanced as with Solr, but it provides basic search without setting up Solr.

### <span>Preparations for Symfony 3 support</span>

This release has received lots of fixes to remove deprecation warnings when running on Symfony 2.8 to the point where we now have automated testing using Symfony 3.x. These changes will simplify the move to Symfony 3.x later, also for your own custom code as you can now enable full error reporting.

### Other notable improvements

-   ##### <span class="s1">Languages:</span>

    -   <span class="s1"><a href="https://jira.ez.no/browse/EZP-25323" class="external-link">EZP-25323</a>: Display Content Type name and Field definition name in the best language according to editor's browser setting.</span>

-   ##### REST:

    -   <a href="https://jira.ez.no/browse/EZP-24853" class="external-link">EZP-24853</a>: REST output when failing to save/create a draft has been improved.
    -   <a href="https://jira.ez.no/browse/EZP-26110" class="external-link">EZP-26110</a>: Added priority support to OutputVisitor, so that custom ones can be given a higher priority.
    -   <a href="https://jira.ez.no/browse/EZP-26080" class="external-link">EZP-26080</a>: REST routes can be registered with a prefix other than "ezp".
-   ##### Browser support:

    -   <a href="https://jira.ez.no/browse/EZP-25725" class="external-link">EZP-25725</a>: Upgraded AlloyEditor to v1.2.3 and CK Editor to v4.5.9
-   ##### Platform support:

    -   <span class="s1"><a href="https://jira.ez.no/browse/EZP-25676" class="external-link">EZP-25676</a>: Upgraded Flysystem to v1.x</span>

        -   <span class="s1">*And took advantage of that to implement* <a href="https://jira.ez.no/browse/EZP-25965" class="external-link">EZP-25965</a>: Configurable IO filesystem permissions.
            </span>

    -   <span class="s1"><a href="https://jira.ez.no/browse/EZP-26161" class="external-link">EZP-26161</a>: Upgraded Stash Bundle to v0.6 with better Redis support *(cluster setup with PHP7)*</span>

    -   <a href="https://jira.ez.no/browse/EZP-25942" class="external-link">EZP-25942</a>: Improved Windows support with continuous testing on Windows *(using <span>AppVeyor)</span>*

-   ##### <span>Solr:</span>

    -   <span><a href="https://jira.ez.no/browse/EZP-26123" class="external-link">EZP-26123</a>: Extract facets of all Types
        </span>
-   ##### <span>Performance:</span>

    -   <span><a href="https://jira.ez.no/browse/EZP-26071" class="external-link">EZP-26071</a>: Download asset binary only if we need to create a variation</span>*<span>
        </span>*
        -   *Contribution by Inviqa to improve performance when running eZ Platform on S3*
-   ##### <span>Developer Experience:</span>

    -   Docker: Added Redis support and some more inline documentation (<a href="https://github.com/ezsystems/ezplatform/blob/ff191377fc68c53478c68da892f9eb79dce6347e/doc/docker-compose/redis.yml" class="external-link">see <code>doc/</code> folder</a>)

### Full list of changes

For full list of changes see issue list in JIRA: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project%3DEZP+and+fixVersion%3D1.5.0+&amp;src=confmacro" class="issue-link">44 issues</a> </span>

Updating
--------

To update to this version, follow the [Updating eZ Platform](Updating-eZ-Platform_31431770.html) guide and use `v1.5.0` as `<version>`.

### New eZ packages in this release

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><p>Package Name</p></th>
<th align="left"><p>1.5.0 version</p></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p>ezplatform-solr-search-engine</p></td>
<td align="left"><p>1.1.0</p></td>
</tr>
<tr class="even">
<td align="left"><p>ezpublish-kernel</p></td>
<td align="left"><p>6.5.0</p></td>
</tr>
<tr class="odd">
<td align="left"><p>platform-ui-assets-bundle</p></td>
<td align="left"><p>3.0.0</p></td>
</tr>
<tr class="even">
<td align="left"><p>repository-forms</p></td>
<td align="left"><p>1.4.0</p></td>
</tr>
<tr class="odd">
<td align="left"><p>platform-ui-bundle</p></td>
<td align="left"><p>1.5.0</p></td>
</tr>
</tbody>
</table>

 

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Draft demo.webm](attachments/32114891/32115229.webm) (video/webm)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [featuring-articles\_eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-08-31\_17.44.15.png](attachments/32114891/32115355.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


