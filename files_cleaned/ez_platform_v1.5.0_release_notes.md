1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform v1.5.0 Release notes </span> {#title-heading .pagetitle}
===========================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified on Sep 05, 2016

The 1.5.0 release of eZ Platform is available as of September 1st 2016.

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
For the release notes of the corresponding eZ Studio release, see [eZ
Enterprise v1.5.0 Release
notes](eZ-Enterprise-v1.5.0-Release-notes_32114946.html)

<span style="color: rgb(0,98,147);">Quick links</span> {#eZPlatformv1.5.0Releasenotes-Quicklinks}
------------------------------------------------------

-   [Installation
    instructions](https://doc.ez.no/display/DEVELOPER/Step+1%3A+Installation)

-   <span
    style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)</span>

-   [Download](http://share.ez.no/latest){.external-link}

Changes since 1.4.0 {#eZPlatformv1.5.0Releasenotes-Changessince1.4.0}
-------------------

<span class="confluence-link">For list of issues fixed in 1.5.0 see [our
issue
tracker](https://jira.ez.no/issues/?filter=-1&jql=project%20%3D%20EZP%20AND%20resolution%20!%3D%20Unresolved%20AND%20fixVersion%20in%20(1.5.0)%20ORDER%20BY%20updatedDate%20ASC){.external-link},
below is a list of notable bugs/features/enhancements done in this
release.</span>

 

Backwards Compatibility Warning

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
<span class="confluence-link">We upgraded the versions for Flysystem and
Stash. See below for more details.  
</span>

<span class="confluence-link">  
</span>

 

#### In this topic: {#eZPlatformv1.5.0Releasenotes-Inthistopic:}

-   [Quick links](#eZPlatformv1.5.0Releasenotes-Quicklinks)
-   [Changes since
    1.4.0](#eZPlatformv1.5.0Releasenotes-Changessince1.4.0)
    -   [In this topic:](#eZPlatformv1.5.0Releasenotes-Inthistopic:)
-   [Version
    Management](#eZPlatformv1.5.0Releasenotes-VersionManagement)
-   [FullText search with Legacy (SQL)
    Engine](#eZPlatformv1.5.0Releasenotes-FullTextsearchwithLegacy(SQL)Engine)
-   [Preparations for Symfony 3
    support](#eZPlatformv1.5.0Releasenotes-PreparationsforSymfony3support)
-   [Other notable
    improvements](#eZPlatformv1.5.0Releasenotes-Othernotableimprovements)
-   [Full list of
    changes](#eZPlatformv1.5.0Releasenotes-Fulllistofchanges)

[Updating](#eZPlatformv1.5.0Releasenotes-Updating)
-   [New eZ packages in this
    release](#eZPlatformv1.5.0Releasenotes-NeweZpackagesinthisrelease)

### Version Management {#eZPlatformv1.5.0Releasenotes-VersionManagement}

In this version, you have a new tab “Versions” under which you will be
able to manage Versions and Drafts.

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/32114891/32115355.png){.confluence-embedded-image
height="150"}</span>

See the video screencast <span class="inline-comment-marker"
data-ref="f0fb94eb-1bce-4cbb-b116-4d4929a5f925">for a</span>
demonstration of <span class="inline-comment-marker"
data-ref="a0f12539-06d0-458f-a2c5-d8f01922820d">this feature</span>.

-   <span
    class="s2">[EZP-25463](https://jira.ez.no/browse/EZP-25463){.external-link}:
    Ability to remove drafts</span>
-   <span
    class="s2">[EZP-25462](https://jira.ez.no/browse/EZP-25462){.external-link}:
    Ability to remove archived versions</span>
-   [EZP-26089](https://jira.ez.no/browse/EZP-26089){.external-link}:
    Ability to edit a draft
-   [EZP-25465](https://jira.ez.no/browse/EZP-25465){.external-link}:
    Implement a Draft conflict screen  
      

 

### FullText search with Legacy (SQL) Engine {#eZPlatformv1.5.0Releasenotes-FullTextsearchwithLegacy(SQL)Engine}

As part
of [EZP-25088](https://jira.ez.no/browse/EZP-25088){.external-link} FullText
indexing is now also working when not using Solr. This will never be as
advanced as with Solr, but it provides basic search without setting up
Solr.

### <span>Preparations for Symfony 3 support</span> {#eZPlatformv1.5.0Releasenotes-PreparationsforSymfony3support}

This release has received lots of fixes to remove deprecation warnings
when running on Symfony 2.8 to the point where we now have automated
testing using Symfony 3.x. These changes will simplify the move to
Symfony 3.x later, also for your own custom code as you can now enable
full error reporting.

### Other notable improvements {#eZPlatformv1.5.0Releasenotes-Othernotableimprovements}

-   ##### <span class="s1">Languages:</span> {#eZPlatformv1.5.0Releasenotes-Languages: .p1}

    -   <span
        class="s1">[EZP-25323](https://jira.ez.no/browse/EZP-25323){.external-link}:
        Display Content Type name and Field definition name in the best
        language according to editor’s browser setting.</span>

-   ##### REST: {#eZPlatformv1.5.0Releasenotes-REST:}

    -   [EZP-24853](https://jira.ez.no/browse/EZP-24853){.external-link}:
        REST output when failing to save/create a draft has
        been improved.
    -   [EZP-26110](https://jira.ez.no/browse/EZP-26110){.external-link}:
        Added priority support to OutputVisitor, so that custom ones can
        be given a higher priority.
    -   [EZP-26080](https://jira.ez.no/browse/EZP-26080){.external-link}:
        REST routes can be registered with a prefix other than “ezp”.
-   ##### Browser support: {#eZPlatformv1.5.0Releasenotes-Browsersupport:}

    -   [EZP-25725](https://jira.ez.no/browse/EZP-25725){.external-link}:
        Upgraded AlloyEditor to v1.2.3 and CK Editor to v4.5.9
-   ##### Platform support: {#eZPlatformv1.5.0Releasenotes-Platformsupport:}

    -   <span
        class="s1">[EZP-25676](https://jira.ez.no/browse/EZP-25676){.external-link}:
        Upgraded Flysystem to v1.x</span>

        -   <span class="s1">*And took advantage of that to
            implement* [EZP-25965](https://jira.ez.no/browse/EZP-25965){.external-link}: Configurable
            IO filesystem permissions.  
            </span>

    -   <span
        class="s1">[EZP-26161](https://jira.ez.no/browse/EZP-26161){.external-link}:
        Upgraded Stash Bundle to v0.6 with better Redis
        support *(cluster setup with PHP7)*</span>

    -   [EZP-25942](https://jira.ez.no/browse/EZP-25942){.external-link}:
        Improved Windows support with continuous testing on
        Windows *(using <span>AppVeyor)</span>*

-   ##### <span>Solr:</span> {#eZPlatformv1.5.0Releasenotes-Solr:}

    -   <span>[EZP-26123](https://jira.ez.no/browse/EZP-26123){.external-link}:
        Extract facets of all Types  
        </span>
-   ##### <span>Performance:</span> {#eZPlatformv1.5.0Releasenotes-Performance:}

    -   <span>[EZP-26071](https://jira.ez.no/browse/EZP-26071){.external-link}:
        Download asset binary only if we need to create a
        variation</span>*<span>  
        </span>*
        -   *Contribution by Inviqa to improve performance when running
            eZ Platform on S3*
-   ##### <span>Developer Experience:</span> {#eZPlatformv1.5.0Releasenotes-DeveloperExperience:}

    -   Docker: Added Redis support and some more inline documentation
        ([see `doc/` folder](https://github.com/ezsystems/ezplatform/blob/ff191377fc68c53478c68da892f9eb79dce6347e/doc/docker-compose/redis.yml){.external-link})

### Full list of changes {#eZPlatformv1.5.0Releasenotes-Fulllistofchanges}

For full list of changes see issue list in JIRA: <span
class="static-jira-issues_count"> [44
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project%3DEZP+and+fixVersion%3D1.5.0+&src=confmacro){.issue-link}
</span>

Updating {#eZPlatformv1.5.0Releasenotes-Updating}
--------

To update to this version, follow the [Updating eZ
Platform](Updating-eZ-Platform_31431770.html) guide and use `v1.5.0`
as `<version>`.

### New eZ packages in this release {#eZPlatformv1.5.0Releasenotes-NeweZpackagesinthisrelease}

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

 

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"} [Draft
demo.webm](attachments/32114891/32115229.webm) (video/webm)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[featuring-articles\_eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-08-31\_17.44.15.png](attachments/32114891/32115355.png)
(image/png)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


