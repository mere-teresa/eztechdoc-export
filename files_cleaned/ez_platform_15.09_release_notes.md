1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.09 Release notes </span> {#title-heading .pagetitle}
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

<span style="color: rgb(0,51,102);">eZ Platform beta now available for testing</span> {#eZPlatform15.09Releasenotes-eZPlatformbetanowavailablefortesting}
=====================================================================================

#### <span style="color: rgb(0,98,147);">Quick links</span> {#eZPlatform15.09Releasenotes-Quicklinks}

-   [Installation
    instructions](https://github.com/ezsystems/ezplatform/blob/release-2015.09.01/INSTALL.md){.external-link}[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md){.external-link}
-   <span
    style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4)</span>
-   Download:
    See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.09){.external-link},
    or see *Install* for how to install via composer.

<span>The fifth release of eZ Platform, </span><span>15.09, is the first
in “beta” stability. It builds upon the
</span>[15.07](eZ-Platform-15.07-Release-notes_31429990.html)<span>
September alpha release. It most notably provides many new UI features,
both in this download and continues to provide a few more additional UI
features during it’s beta period until end of month.</span>

Highlights {#eZPlatform15.09Releasenotes-Highlights}
==========

Along with the [improvements and
fixes](#eZPlatform15.09Releasenotes-changelog) listed at the bottom, the
most notable changes are the sub-items list in PlatformUI, location &
relation tabs, and policies support in custom bundles.

<span>  
</span>

Platform UI sub-items list {#eZPlatform15.09Releasenotes-PlatformUIsub-itemslist}
--------------------------

Sub-items will now be listed in PlatformUI. This is a minimum viable
feature. In further releases, this will be expanded to improve UX with
ability to change sub-items views and ability to easily add subitems.
For now the sub-items list view enables repository browsing via the
content view. 

Story: [EZP-24824](https://jira.ez.no/browse/EZP-24824){.external-link}

Platform UI languages improvements {#eZPlatform15.09Releasenotes-PlatformUIlanguagesimprovements}
----------------------------------

The list of content languages configured in the system is now correctly
passed on to the UI
([EZP-24865](https://jira.ez.no/browse/EZP-24865){.external-link}),
avoiding errors on language selection. 

<span style="line-height: 1.42857;">The language of the edited content
can now be selected during editing
(</span>[EZP-23768](https://jira.ez.no/browse/EZP-23768){.external-link}<span
style="line-height: 1.42857;">)</span>

New PlatformUI content tabs {#eZPlatform15.09Releasenotes-NewPlatformUIcontenttabs}
---------------------------

Dedicated tabs have been added for relations
([EZP-24509](https://jira.ez.no/browse/EZP-24509){.external-link}) and
locations <span
style="line-height: 1.42857;">(</span>[EZP-24815](https://jira.ez.no/browse/EZP-24815){.external-link}<span
style="line-height: 1.42857;">) of any Content. </span>Both will list a
content’s relations and locations.

The location tab also allows to manage (add, remove, hide/unhide)
locations, as well as select a new main location (currently not
working).

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31430041/31430018.png){.confluence-embedded-image
width="450"}</span>

Other UI improvements {#eZPlatform15.09Releasenotes-OtherUIimprovements}
---------------------

 

-   Content type groups can be managed
    ([EZP-24454](https://jira.ez.no/browse/EZP-24454){.external-link})
-   Content types can be removed
    ([EZP-24453](https://jira.ez.no/browse/EZP-24453){.external-link})
-   Users other than the admin can now login to Platform UI
    ([EZP-24753](https://jira.ez.no/browse/EZP-24753){.external-link})
-   Limited user accounts management has been implemented
-   PJAX error messages are now correctly displayed
    ([EZP-24787](https://jira.ez.no/browse/EZP-24787){.external-link})

 

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31430041/31430019.png){.confluence-embedded-image
width="450"}</span>

Custom repository policies support {#eZPlatform15.09Releasenotes-Customrepositorypoliciessupport}
----------------------------------

Bundles can now declare custom modules, policies and limitations.

Links:
[documentation](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/security/permissions/policies_extensibility.md){.external-link},
[EZP-24862](https://jira.ez.no/browse/EZP-24862){.external-link}.

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31430041/31430017.png){.confluence-embedded-image
width="450"}</span>

Repository and Platform improvements {#eZPlatform15.09Releasenotes-RepositoryandPlatformimprovements}
------------------------------------

-   Solr support for fullText location search
    ([EZP-24802](https://jira.ez.no/browse/EZP-24802){.external-link})
-   ezcontentobject\_attribute stores always available flag to all
    fields
-   Float Fields now accepts integers
    ([EZP-24038](https://jira.ez.no/browse/EZP-24038){.external-link})
-   An ancestor Search criterion has been added
    ([EZP-24804](https://jira.ez.no/browse/EZP-24804){.external-link})
-   REST: users can be filtered by email and login
    ([EZP-24820](https://jira.ez.no/browse/EZP-24820){.external-link})
-   Repository exceptions can be translated
    ([EZP-24793](https://jira.ez.no/browse/EZP-24793){.external-link})
-   Bundles can now expose custom policies that can be checked via the
    repository
    ([EZP-24862](https://jira.ez.no/browse/EZP-24862){.external-link})

 

Changelog<span id="eZPlatform15.09Releasenotes-changelog" class="confluence-anchor-link"></span> {#eZPlatform15.09Releasenotes-Changelogchangelog .diff-block-target .diff-block-context}
------------------------------------------------------------------------------------------------

*Changes* (Stories, Improvements and bug fixes) can be found in our
issue tracker: <span class="static-jira-issues_count"> [67
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.07%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++++++++&src=confmacro){.issue-link}
</span>  *(some are still pending additional documentation changes)*

### <span>Known issues & upcoming features</span> {#eZPlatform15.09Releasenotes-Knownissues&upcomingfeatures}

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
[platform-custom-policies.png](attachments/31430041/31430017.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[locations\_tab.png](attachments/31430041/31430018.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[PlatformUI-navigation-bar.png](attachments/31430041/31430019.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Please
Help.jpg](attachments/31430041/31430020.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [privacy
cookie.PNG](attachments/31430041/31430021.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [move-copy-send
to trash.PNG](attachments/31430041/31430022.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[content\_download.PNG](attachments/31430041/31430023.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [variations
purging.PNG](attachments/31430041/31430024.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [content type
edition.PNG](attachments/31430041/31430025.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_02.png](attachments/31430041/31430026.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_03.png](attachments/31430041/31430027.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [RichText
editor.png](attachments/31430041/31430028.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Ventoux-Square.jpg](attachments/31430041/31430029.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31430041/31430030.jpg)
(image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
screenshoot alpha1.gif](attachments/31430041/31430031.gif) (image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 19.16.38 .png](attachments/31430041/31430032.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[PrivacyCookieBundle.png](attachments/31430041/31430033.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 11.46.48 .png](attachments/31430041/31430034.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[iStock\_000032478246XLarge - banner
doc.jpg](attachments/31430041/31430035.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[notifications.gif](attachments/31430041/31430036.gif) (image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Solr\_Logo\_on\_white.png](attachments/31430041/31430037.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
2015.07 - roles UI.PNG](attachments/31430041/31430038.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
2015.07 - choose translation.PNG](attachments/31430041/31430039.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [eZ Platform
2015.07 - add translation.gif](attachments/31430041/31430040.gif)
(image/gif)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


