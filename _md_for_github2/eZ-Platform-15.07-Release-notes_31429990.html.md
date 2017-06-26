1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.07 Release notes </span>
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

<span style="color: rgb(0,51,102);">eZ Platform "Alpha4" available for testing</span>
=====================================================================================

#### <span style="color: rgb(0,98,147);">Quick links</span>

-   <a href="https://github.com/ezsystems/ezplatform/blob/v0.10.0/INSTALL.md" class="external-link">Installation instructions</a><a href="https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md" class="external-link"></a>
-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) <span style="color: rgb(128,128,128);">*(currently same as eZ Publish Platform 5.4)*</span></span>
-   <span style="color: rgb(0,0,0);">Upgrading: <span style="color: rgb(128,128,128);">*As this is a alpha release, there is no upgrade instructions yet, this is planned for Beta.*</span></span>

-   Download: See <a href="http://share.ez.no/downloads/downloads/ez-platform-15.07" class="external-link">share.ez.no/downloads</a>, or see *Install* for how to install via composer.

<span>The fourth alpha release of eZ Platform,</span><span>15.07, builds upon the </span>[15.05](eZ-Platform-15.05-Release-notes_31429968.html)<span> July release.  It most noticeably adds support for Solr, as well as many UI enhancements and additions. It also contains most improvements and fixes that are part of the 5.4.3 and 5.4.4 <a href="http://ez.no/Products/The-eZ-Publish-Platform" class="external-link">enterprise releases</a>.</span>

Highlights
==========

With the many [improvements and fixes](#eZPlatform15.07Releasenotes-changelog) listed at the bottom, the main changes are:

<span>
</span>

RichText editor improvements
----------------------------

-   The active element is now highlighted (<a href="https://jira.ez.no/browse/EZP-24769" class="external-link">EZP-24769</a>)
-   The contextual toolbar now works on the following elements:
    -   Headings: change level, or remove heading (<a href="https://jira.ez.no/browse/EZP-24725" class="external-link">EZP-24725</a>)
    -   Paragraphs: change alignment
-   The native Alloy Editor "append content" can be used to add a new heading or an embed element (<a href="https://jira.ez.no/browse/EZP-24768" class="external-link">EZP-24768</a>)

 

Content language display selection
----------------------------------

On Content that has translations, a dropdown will now list the available languages. Selecting one of them will display the Content in that language instead. The Edit button will now use the currently active translation.

Stories: <a href="https://jira.ez.no/browse/EZP-23765" class="external-link">EZP-23765</a>, <a href="https://jira.ez.no/browse/EZP-24549" class="external-link">EZP-24549</a>

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429990/31429972.png" class="confluence-embedded-image" width="427" /></span>

Translate content
-----------------

When there are multiple languages configured, translations can be added and edited.

Story: <a href="https://jira.ez.no/browse/EZP-23766" class="external-link">EZP-23766</a>

 

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429990/31429973.gif" class="confluence-embedded-image" height="250" /></span>

Roles management UI prototype
-----------------------------

An UI to manage Roles and Policies has been started, and can be previewed.

It is currently limited to listing, creating and deleting roles, without policy management, even though policies can already be viewed.

Epic: <a href="https://jira.ez.no/browse/EZP-24071" class="external-link">EZP-24071</a>

As can be seen in the epic, this feature is being worked on, and will quickly evolve over the next weeks.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429990/31429971.png" class="confluence-embedded-image" width="427" /></span>

Other UI changes
----------------

-   **Details of locations** can now be viewed from the backoffice: content id, creator, modification date, remote id... (<a href="https://jira.ez.no/browse/EZP-24512" class="external-link">EZP-24512</a>)
-   **Interactive confirmation messages** as well as **notifications** can now be triggered by server side admin pages (<a href="https://jira.ez.no/browse/EZP-24652" class="external-link">EZP-24652</a>, <a href="https://jira.ez.no/browse/EZP-24536" class="external-link">EZP-24536</a>)
-   **AlloyEditor** has been updated to 0.5.x (<a href="https://jira.ez.no/browse/EZP-24712" class="external-link">EZP-24712</a>)
-   **Section Management** has been reworked, and moved from <a href="https://github.com/ezsystems/PlaformUIBundle" class="external-link">ezsystems/platform-ui-bundle</a> to <a href="https://github.com/ezsystems/repository-forms" class="external-link">ezsystems/repository-forms</a> (<a href="https://jira.ez.no/browse/EZP-24380" class="external-link">EZP-24380</a>)
-   Configuration can now be sent to the PlatformUI JS app (<a href="https://jira.ez.no/browse/EZP-24129" class="external-link">EZP-24129</a>)

Native Solr support
-------------------

Until now, the `SearchService` was using the Legacy database search implementation. It was quite limited, and performed very badly. The Solr implementation has been worked on since last summer, and finally made it into the product.

After [configuration and setup](https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle#SolrSearchEngineBundle-HowtosetupSolrSearchengine), Solr will be used by the SearchService for all of your Location, Content and ContentInfo queries. It has very advanced multilanguage capabilities, and will offer great performances whenever you need to grab Content or Locations from the Repository. 

Note that as it is lifts off many limitations, this feature will also be made available to Enterprise customers eZ Publish Platform 5.4 via a specific update.

Documentation: [https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle
](https://doc.ez.no/display/EZP/Solr+Search+Engine+Bundle)<span style="line-height: 1.42857;">Source: <a href="https://github.com/ezsystems/ezplatform-solr-search-engine" class="external-link">ezsystems/ezplatform-solr-search-engine</a>
Epic: </span><a href="https://jira.ez.no/browse/EZP-22944" class="external-link">EZP-22944</a>

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31429990/31429970.png" class="confluence-embedded-image" width="427" /></span>

Other Platform changes
----------------------

-   Locations returned by the REST API will now **include the ContentInfo**<a href="https://jira.ez.no/browse/EZP-24672" class="external-link">.</a> This should avoid quite a few calls only to get the name, or basic info about the Location's Content (<a href="https://jira.ez.no/browse/EZP-24672" class="external-link">EZP-24672</a>)
-   The **REST API** will now let you **search for Location** in addition to Content. While the existing resource remains valid, note that `/views` should be used instead of `/content/views` (<a href="https://jira.ez.no/browse/EZP-24671" class="external-link">EZP-24671</a>)

Changelog<span id="eZPlatform15.07Releasenotes-changelog" class="confluence-anchor-link"></span>
------------------------------------------------------------------------------------------------

*Changes* (Stories, Improvements and bug fixes) can be found in our issue tracker: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=fixVersion%3D%222015.07%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++++++&amp;src=confmacro" class="issue-link">67 issues</a> </span>  *(some are still pending additional documentation changes)*

### <span>Known issues & upcoming features</span>

List of issues specifically affecting this release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.05+ORDER+BY+priority++++++&amp;src=confmacro" class="issue-link">35 issues</a> </span>

General "Known issues" in *Platform stack* compared to* Legacy*: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">8 issues</a> </span>

Epics tentatively\* planned for first stable release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">7 issues</a> </span>

Epics tentatively\* planned for first LTS release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&amp;src=confmacro" class="issue-link">0 issue</a> </span>

*<span style="color: rgb(255,255,255);">'</span>\* Some of these features will not be in the stable releases, the once we first and foremost will aim for having in the release are those mentioned on the <a href="http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform" class="external-link">Roadmap</a>.*

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Solr\_Logo\_on\_white.png](attachments/31429990/31429970.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - roles UI.PNG](attachments/31429990/31429971.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - choose translation.PNG](attachments/31429990/31429972.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [eZ Platform 2015.07 - add translation.gif](attachments/31429990/31429973.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [privacy cookie.PNG](attachments/31429990/31429974.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [move-copy-send to trash.PNG](attachments/31429990/31429975.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content\_download.PNG](attachments/31429990/31429976.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [variations purging.PNG](attachments/31429990/31429977.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content type edition.PNG](attachments/31429990/31429978.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_02.png](attachments/31429990/31429979.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_03.png](attachments/31429990/31429980.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [RichText editor.png](attachments/31429990/31429981.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Ventoux-Square.jpg](attachments/31429990/31429982.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429990/31429983.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform screenshoot alpha1.gif](attachments/31429990/31429984.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 19.16.38 .png](attachments/31429990/31429985.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PrivacyCookieBundle.png](attachments/31429990/31429986.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 11.46.48 .png](attachments/31429990/31429987.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iStock\_000032478246XLarge - banner doc.jpg](attachments/31429990/31429988.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [notifications.gif](attachments/31429990/31429989.gif) (image/gif)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


