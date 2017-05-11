1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.07 Release notes </span> {#title-heading .pagetitle}
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

<span style="color: rgb(0,51,102);">eZ Platform “Alpha4” available for testing</span> {#eZPlatform15.07Releasenotes-eZPlatform"Alpha4"availablefortesting}
=====================================================================================

#### <span style="color: rgb(0,98,147);">Quick links</span> {#eZPlatform15.07Releasenotes-Quicklinks}

-   [Installation
    instructions](https://github.com/ezsystems/ezplatform/blob/v0.10.0/INSTALL.md){.external-link}[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md){.external-link}
-   <span
    style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) <span
    style="color: rgb(128,128,128);">*(currently same as eZ Publish
    Platform 5.4)*</span></span>
-   <span style="color: rgb(0,0,0);">Upgrading: <span
    style="color: rgb(128,128,128);">*As this is a alpha release, there
    is no upgrade instructions yet, this is planned
    for Beta.*</span></span>

-   Download:
    See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.07){.external-link},
    or see *Install* for how to install via composer.

<span>The fourth alpha release of eZ Platform,</span><span>15.07, builds
upon the
</span>[15.05](eZ-Platform-15.05-Release-notes_31429968.html)<span> July
release.  It most noticeably adds support for Solr, as well as many UI
enhancements and additions. It also contains most improvements and fixes
that are part of the 5.4.3 and 5.4.4 [enterprise
releases](http://ez.no/Products/The-eZ-Publish-Platform){.external-link}.</span>

Highlights {#eZPlatform15.07Releasenotes-Highlights}
==========

With the many [improvements and
fixes](#eZPlatform15.07Releasenotes-changelog) listed at the bottom, the
main changes are:

<span>  
</span>

RichText editor improvements {#eZPlatform15.07Releasenotes-RichTexteditorimprovements}
----------------------------

-   The active element is now highlighted
    ([EZP-24769](https://jira.ez.no/browse/EZP-24769){.external-link})
-   The contextual toolbar now works on the following elements:
    -   Headings: change level, or remove heading
        ([EZP-24725](https://jira.ez.no/browse/EZP-24725){.external-link})
    -   Paragraphs: change alignment
-   The native Alloy Editor “append content” can be used to add a new
    heading or an embed element
    ([EZP-24768](https://jira.ez.no/browse/EZP-24768){.external-link})

 

Content language display selection {#eZPlatform15.07Releasenotes-Contentlanguagedisplayselection}
----------------------------------

On Content that has translations, a dropdown will now list the available
languages. Selecting one of them will display the Content in that
language instead. The Edit button will now use the currently active
translation.

Stories: [EZP-23765](https://jira.ez.no/browse/EZP-23765){.external-link}, [EZP-24549](https://jira.ez.no/browse/EZP-24549){.external-link}

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429990/31429972.png){.confluence-embedded-image
width="427"}</span>

Translate content {#eZPlatform15.07Releasenotes-Translatecontent}
-----------------

When there are multiple languages configured, translations can be added
and edited.

Story: [EZP-23766](https://jira.ez.no/browse/EZP-23766){.external-link}

 

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429990/31429973.gif){.confluence-embedded-image
height="250"}</span>

Roles management UI prototype {#eZPlatform15.07Releasenotes-RolesmanagementUIprototype}
-----------------------------

An UI to manage Roles and Policies has been started, and can be
previewed.

It is currently limited to listing, creating and deleting roles, without
policy management, even though policies can already be viewed.

Epic: [EZP-24071](https://jira.ez.no/browse/EZP-24071){.external-link}

As can be seen in the epic, this feature is being worked on, and will
quickly evolve over the next weeks.

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429990/31429971.png){.confluence-embedded-image
width="427"}</span>

Other UI changes {#eZPlatform15.07Releasenotes-OtherUIchanges}
----------------

-   **Details of locations** can now be viewed from the backoffice:
    content id, creator, modification date, remote id…
    ([EZP-24512](https://jira.ez.no/browse/EZP-24512){.external-link})
-   **Interactive confirmation messages** as well as **notifications**
    can now be triggered by server side admin pages
    ([EZP-24652](https://jira.ez.no/browse/EZP-24652){.external-link}, [EZP-24536](https://jira.ez.no/browse/EZP-24536){.external-link})
-   **AlloyEditor** has been updated to 0.5.x
    ([EZP-24712](https://jira.ez.no/browse/EZP-24712){.external-link})
-   **Section Management** has been reworked, and moved from
    [ezsystems/platform-ui-bundle](https://github.com/ezsystems/PlaformUIBundle){.external-link}
    to
    [ezsystems/repository-forms](https://github.com/ezsystems/repository-forms){.external-link}
    ([EZP-24380](https://jira.ez.no/browse/EZP-24380){.external-link})
-   Configuration can now be sent to the PlatformUI JS app
    ([EZP-24129](https://jira.ez.no/browse/EZP-24129){.external-link})

Native Solr support {#eZPlatform15.07Releasenotes-NativeSolrsupport}
-------------------

Until now, the `SearchService` was using the Legacy database search
implementation. It was quite limited, and performed very badly. The Solr
implementation has been worked on since last summer, and finally made it
into the product.

After [configuration and
setup](https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle#SolrSearchEngineBundle-HowtosetupSolrSearchengine),
Solr will be used by the SearchService for all of your Location, Content
and ContentInfo queries. It has very advanced multilanguage
capabilities, and will offer great performances whenever you need to
grab Content or Locations from the Repository. 

Note that as it is lifts off many limitations, this feature will also be
made available to Enterprise customers eZ Publish Platform 5.4 via a
specific update.

Documentation:
[https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle  
](https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle)<span
style="line-height: 1.42857;">Source: [ezsystems/ezplatform-solr-search-engine](https://github.com/ezsystems/ezplatform-solr-search-engine){.external-link}  
Epic: </span>[EZP-22944](https://jira.ez.no/browse/EZP-22944){.external-link}

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429990/31429970.png){.confluence-embedded-image
width="427"}</span>

Other Platform changes {#eZPlatform15.07Releasenotes-OtherPlatformchanges}
----------------------

-   Locations returned by the REST API will now **include the
    ContentInfo**[.](https://jira.ez.no/browse/EZP-24672){.external-link} This
    should avoid quite a few calls only to get the name, or basic info
    about the Location’s Content
    ([EZP-24672](https://jira.ez.no/browse/EZP-24672){.external-link})
-   The **REST API** will now let you **search for Location** in
    addition to Content. While the existing resource remains valid, note
    that `/views` should be used instead of `/content/views`
    ([EZP-24671](https://jira.ez.no/browse/EZP-24671){.external-link})

Changelog<span id="eZPlatform15.07Releasenotes-changelog" class="confluence-anchor-link"></span> {#eZPlatform15.07Releasenotes-Changelogchangelog .diff-block-target .diff-block-context}
------------------------------------------------------------------------------------------------

*Changes* (Stories, Improvements and bug fixes) can be found in our
issue tracker: <span class="static-jira-issues_count"> [67
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.07%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++++++&src=confmacro){.issue-link}
</span>  *(some are still pending additional documentation changes)*

### <span>Known issues & upcoming features</span> {#eZPlatform15.07Releasenotes-Knownissues&upcomingfeatures}

List of issues specifically affecting this release: <span
class="static-jira-issues_count"> [35
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.05+ORDER+BY+priority++++++&src=confmacro){.issue-link}
</span>

General “Known issues” in *Platform stack* compared to* Legacy*: <span
class="static-jira-issues_count"> [8
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro){.issue-link}
</span>

Epics tentatively\* planned for first stable release: <span
class="static-jira-issues_count"> [7
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro){.issue-link}
</span>

Epics tentatively\* planned for first LTS release: <span
class="static-jira-issues_count"> [0
issue](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&src=confmacro){.issue-link}
</span>

*<span style="color: rgb(255,255,255);">’</span>\* Some of these
features will not be in the stable releases, the once we first and
foremost will aim for having in the release are those mentioned on
the [Roadmap](http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform){.external-link}.*

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"}
[Solr\_Logo\_on\_white.png](attachments/31429990/31429970.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
2015.07 - roles UI.PNG](attachments/31429990/31429971.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
2015.07 - choose translation.PNG](attachments/31429990/31429972.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [eZ Platform
2015.07 - add translation.gif](attachments/31429990/31429973.gif)
(image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [privacy
cookie.PNG](attachments/31429990/31429974.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [move-copy-send
to trash.PNG](attachments/31429990/31429975.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[content\_download.PNG](attachments/31429990/31429976.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [variations
purging.PNG](attachments/31429990/31429977.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [content type
edition.PNG](attachments/31429990/31429978.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_02.png](attachments/31429990/31429979.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_03.png](attachments/31429990/31429980.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [RichText
editor.png](attachments/31429990/31429981.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Ventoux-Square.jpg](attachments/31429990/31429982.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429990/31429983.jpg)
(image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
screenshoot alpha1.gif](attachments/31429990/31429984.gif) (image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 19.16.38 .png](attachments/31429990/31429985.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[PrivacyCookieBundle.png](attachments/31429990/31429986.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 11.46.48 .png](attachments/31429990/31429987.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[iStock\_000032478246XLarge - banner
doc.jpg](attachments/31429990/31429988.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[notifications.gif](attachments/31429990/31429989.gif) (image/gif)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


