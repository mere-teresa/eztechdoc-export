1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.12 Release notes </span>
==========================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> David Christian Liedle</span> on Oct 31, 2016

#### <span style="color: rgb(0,98,147);">Quick links</span>

-   [Installation instructions](https://doc.ez.no/display/DEVELOPER/Step+1%3A+Installation)<a href="https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md" class="external-link"></a>
-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/pages/viewpage.action?pageId=31429536)</span>
-   Download: See <a href="http://share.ez.no/downloads/downloads/ez-platform-15.12" class="external-link">share.ez.no/downloads</a>

15.12 is the first stable release of eZ Platform. 

These release notes describe the first stable Fast-Track release of eZ Platform, as compared to the previous one, 15.11.

Highlights
==========

The `ezpublish` folder has been renamed to `app`
------------------------------------------------

The directory that contains the configuration, cache and kernel files had been named `ezpublish` since release 5.0. After serious consideration, it has been renamed to `app`, in order to be closer to the standard Symfony distribution.

The default installation data have been cleaned up
--------------------------------------------------

Since the removal of the demo in the 2015.11 release, a clean SQL dump is now used to install the system. This dump has been cleaned up, and should now provide you with a very clean basis to start your projects. It contains a few content types (folder, article, image, user group, user), as well as the minimal folders (Content, Media, and Users).

It will be installed when executing `php app/console ezplatform:install clean`.

Online editor improvements
--------------------------

A new feature made it into the Online Editor: image editing. While the feature is still a bit primitive, it will allow you to embed an image Content item into a richtext field (<a href="http://jira.ez.no/browse/EZP-25108" class="external-link"><span>EZP-25108</span></a><span>).</span>

In addition, several issues with the editor were fixed:

-   The "add content" toolbar will show up independently of the focus mode (<a href="https://jira.ez.no/browse/EZP-24829" class="external-link">EZP-24829</a>, <a href="https://jira.ez.no/browse/EZP-25182" class="external-link">EZP-25182</a>), will disappear when the editor loses focus (<a href="https://jira.ez.no/browse/EZP-25181" class="external-link">EZP-25181</a>), and will be rendered correctly in IE11/Edge (<a href="https://jira.ez.no/browse/EZP-25189" class="external-link">EZP-25189</a>)
-   html5edit input with HTML entities is now accepted (<a href="https://jira.ez.no/browse/EZP-24732" class="external-link">EZP-24732</a>)
-   Richtext content can now be published with Firefox (<a href="https://jira.ez.no/browse/EZP-25161" class="external-link">EZP-25161</a>)

Enhanced PlatformUI performances with the combo loader
------------------------------------------------------

The assets used by PlatformUI will now be combined into a couple large files. This drastically reduces the amount of HTTP queries required to load the UI, resulting in a much shorter loading time.

Universal discovery widget search interface
-------------------------------------------

A search form has been added to the universal discovery widget. Combined with the tree based navigation, this makes <span>locating content in the tree easier than before.</span>

REST API
--------

The REST API views will now include the total number of search hits.

Changelog<span id="eZPlatform15.12Releasenotes-changelog" class="confluence-anchor-link"></span>
================================================================================================

*Changes* (Stories, Improvements and bug fixes) can be found in our issue tracker: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=fixVersion+in+%28%222015.12%22%2C+2015.11.1%2C+2015.11.2%29+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++++&amp;src=confmacro" class="issue-link">48 issues</a> </span>  *(some are still pending additional documentation changes)*

<span>Known issues & upcoming features</span>
---------------------------------------------

List of issues specifically affecting this release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.11+ORDER+BY+priority+++++++&amp;src=confmacro" class="issue-link">18 issues</a> </span>

General "Known issues" in *Platform stack* compared to* Legacy*: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">8 issues</a> </span>

Epics tentatively\* planned for first stable release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">7 issues</a> </span>

Epics tentatively\* planned for first LTS release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&amp;src=confmacro" class="issue-link">0 issue</a> </span>

*<span style="color: rgb(255,255,255);">'</span>\* Some of these features will not be in the stable releases, the once we first and foremost will aim for having in the release are those mentioned on the <a href="http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform" class="external-link">Roadmap</a>.*

 

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [notifications.gif](attachments/31430093/31430069.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Solr\_Logo\_on\_white.png](attachments/31430093/31430070.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - roles UI.PNG](attachments/31430093/31430071.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - choose translation.PNG](attachments/31430093/31430072.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [eZ Platform 2015.07 - add translation.gif](attachments/31430093/31430073.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [platform-custom-policies.png](attachments/31430093/31430074.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [locations\_tab.png](attachments/31430093/31430075.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PlatformUI-navigation-bar.png](attachments/31430093/31430076.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Please Help.jpg](attachments/31430093/31430077.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [privacy cookie.PNG](attachments/31430093/31430078.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [move-copy-send to trash.PNG](attachments/31430093/31430079.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content\_download.PNG](attachments/31430093/31430080.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [variations purging.PNG](attachments/31430093/31430081.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content type edition.PNG](attachments/31430093/31430082.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_02.png](attachments/31430093/31430083.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_03.png](attachments/31430093/31430084.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [RichText editor.png](attachments/31430093/31430085.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Ventoux-Square.jpg](attachments/31430093/31430086.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31430093/31430087.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform screenshoot alpha1.gif](attachments/31430093/31430088.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 19.16.38 .png](attachments/31430093/31430089.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PrivacyCookieBundle.png](attachments/31430093/31430090.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 11.46.48 .png](attachments/31430093/31430091.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iStock\_000032478246XLarge - banner doc.jpg](attachments/31430093/31430092.jpg) (image/jpeg)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


