1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>
6.  <span>[eZ Platform v1.5.0 Release
    notes](eZ-Platform-v1.5.0-Release-notes_32114891.html)</span>

<span id="title-text"> Developer : eZ Platform 1.5.1 Release notes </span> {#title-heading .pagetitle}
==========================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified on Sep 23, 2016

###### September 20th 2016 {#eZPlatform1.5.1Releasenotes-September20th2016}

eZ announces the availability of 1.5.1, a maintenance release available
for all users of eZ Platform 1.5.0.

Follow the [eZ Platform Update
Instructions](Updating-eZ-Platform_31431770.html) to apply this update
to your platforms.

Package Details {#eZPlatform1.5.1Releasenotes-PackageDetails .wordwrap}
===============

<span id="eZPlatform1.5.1Releasenotes-packages" class="confluence-anchor-link"></span><span style="line-height: 1.5;">Package </span><span style="line-height: 1.5;">update</span><span style="line-height: 1.5;">s</span> {#eZPlatform1.5.1Releasenotes-packagesPackageupdates .wordwrap}
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

Here are the ezsystems packages that have received an update as part of
this release:

  

|  package                      | version     |
|-------------------------------|-------------|
| ezpublish-kernel              | v6.5.1-rc1  |
| platform-ui-bundle            | v1.5.1-rc1  |
| ezplatform-solr-search-engine |  v1.1.1-rc1 |
| ezplatform                    | v1.5.1-rc1  |

<span id="eZPlatform1.5.1Releasenotes-updates" class="confluence-anchor-link"></span>Updates and fixes in this release {#eZPlatform1.5.1Releasenotes-updatesUpdatesandfixesinthisrelease}
----------------------------------------------------------------------------------------------------------------------

<span class="confluence-link">Below is a list of notable
bugs/features/enhancements done in the release. </span>

-    [\[EZP-25533\]](https://jira.ez.no/browse/EZP-25533){.external-link} -
    Hardcoded anonymous\_hash in FosHttpCache mismatches what is
    generated by Platform
-    [\[EZP-25913\]](https://jira.ez.no/browse/EZP-25913){.external-link}-
    urlAliasGenerator::generate issues in console command / cli
-   [\[EZP-26042\]](https://jira.ez.no/browse/EZP-26042){.external-link} -
    Some mandatory parameters are missing (“language”) to generate a URL
    for route “\_ez\_content\_view”
-   [\[EZP-26117\]](https://jira.ez.no/browse/EZP-26117){.external-link} -
    Required richtext not validated as filled with single embed
-   [\[EZP-26125\]](https://jira.ez.no/browse/EZP-26125){.external-link} -
    Missing language parameter when generating \_ez\_content\_view 
    route
-   [\[EZP-26130\]](https://jira.ez.no/browse/EZP-26130){.external-link} -
    Search for content in many location hangs UI
-   [\[EZP-26141\]](https://jira.ez.no/browse/EZP-26141){.external-link} -
    Search API appears to conduct some form of ‘OR’ search not an ‘AND’
    search
-   [\[EZP-26145\]](https://jira.ez.no/browse/EZP-26145){.external-link} -
    Unable to undo in the RichText editor
-   [\[EZP-26149\]](https://jira.ez.no/browse/EZP-26149){.external-link} -
    Slashes in view parameters cause php notice
-   [\[EZP-26292\]](https://jira.ez.no/browse/EZP-26292){.external-link} -
    Can’t edit Landing Page after changing default layout zone Id

 

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/32866922/32866921.jpg)
(image/jpeg)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)

