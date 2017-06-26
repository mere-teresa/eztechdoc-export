1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.11 Release notes </span>
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

#### <span style="color: rgb(0,98,147);">Quick links</span>

-   <a href="https://github.com/ezsystems/ezplatform/tag/1.0.0-beta8/INSTALL.md" class="external-link">Installation instructions</a><a href="https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md" class="external-link"></a>
-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4)</span>
-   Download: See <a href="http://share.ez.no/downloads/downloads/ez-platform-15.09" class="external-link">share.ez.no/downloads</a>

eZ Platform beta 8 is now available for testing. This releases focuses on cleanup, stabilization and the online editor.

Highlights
==========

Platform no longer comes with the demo
--------------------------------------

The `ezsystems/ezplatform` package has been completely cleaned from any reference to the demo and DemoBundle. In addition, we have moved closer from the symfony-standard distribution:

-   A clean AppBundle is now shipped and enabled by default. Unless you have a specific reason not to do so, this is where your projects should start from
-   The `ezpublish` folder now contains an empty `Resources/views` directory. This is where the templates used in the app should go. They can be referenced from templates or yaml files as `"path/to/file"`, relative to the `views` directory
-   Settings have been cleaned up: `ezpublish.yml` has been renamed to `ezplatform.yml`, and greatly simplified. It is now imported from `config.yml` instead of being force-loaded by the kernel

This change should make it much easier to get started on a project. It also enforces a better separation, on our side, of demo related and application related changes.

Platform UI performances improvements
-------------------------------------

-   The tree now uses location search instead of content search, leading to fewer HTTP queries (<a href="https://jira.ez.no/browse/EZP-24873" class="external-link">EZP-24873</a>)
-   The breadcrumb has been changed to use the new `AncestorOf` criterion, and should perform much better (<a href="https://jira.ez.no/browse/EZP-24871" class="external-link">EZP-24871</a>)
-   A new "combine" YUI semantic setting has also been introduced. This prepares for the <a href="https://github.com/ezsystems/PlatformUIBundle/pull/427" class="external-link">combo loader feature</a> that is being worked on. Once approved this should significantly shorten the loading time of the backoffice.

Online editor embeds
--------------------

Embed elements can now be added to RichText fields. The editor will be shown the Universal Discovery Widget to browse for the embedded content (<a href="https://jira.ez.no/browse/EZP-24894" class="external-link">EZP-24894</a>).

Images handing is <a href="https://github.com/ezsystems/PlatformUIBundle/pull/436" class="external-link">under active development,</a> and will be part of the next release.

In addition, bugs were fixed on the Online Editor:

-   HTML entities in rich text editor were fixed (<a href="https://jira.ez.no/browse/EZP-24732" class="external-link">EZP-24732</a>)
-   Backspace in the richtext editor won't make the state inconsistent anymore (<a href="https://jira.ez.no/browse/EZP-25031" class="external-link">EZP-25031</a>)
-   Heading 1 is now fully visible when editing (<a href="https://jira.ez.no/browse/EZP-24970" class="external-link">EZP-24970</a>)
-   Saved RichText content is now free from unwanted markup and tags (<a href="https://jira.ez.no/browse/EZP-24967" class="external-link">EZP-24967</a>, <a href="https://jira.ez.no/browse/EZP-24971" class="external-link">EZP-24971</a>)

Role, policies and languages management
---------------------------------------

Policies (<a href="https://jira.ez.no/browse/EZP-24713" class="external-link">EZP-24713</a>), roles (<a href="https://jira.ez.no/browse/EZP-24700" class="external-link">EZP-24700</a>) and languages (<a href="https://jira.ez.no/browse/EZP-22658" class="external-link">EZP-22658</a>) management have been implemented. Role assignment with limitations is being finished, and should be part of the next release.

In addition, the following improvements have been made

-   Items can be excluded from selection in the universal discovery widget (<a href="https://jira.ez.no/browse/EZP-24989" class="external-link">EZP-24989</a>)
    This mechanism is based on callbacks, and can be re-used in PlatformUI extensions. 
-   The "save" button will be hidden when editing users (<a href="https://jira.ez.no/browse/EZP-25016" class="external-link">EZP-25016</a>)
-   Field definitions position is now calculated automatically (<a href="https://jira.ez.no/browse/EZP-24569" class="external-link">EZP-24569</a>)
-   The preview will now use the previewed content's title (<a href="https://jira.ez.no/browse/EZP-24927" class="external-link">EZP-24927</a>)

Bug fixes
---------

-   The main location of content can be changed (<a href="https://jira.ez.no/browse/EZP-24901" class="external-link">EZP-24901</a>)
-   Proper feedback will be given when an uploaded file exceeds the maximal size (<a href="https://jira.ez.no/browse/EZP-25037" class="external-link">EZP-25037</a>)
-   The language will be properly set when creating a new content as a child of freshly created one (<a href="https://jira.ez.no/browse/EZP-25048" class="external-link">EZP-25048</a>)
-   Uploading a different file type won't break the file's type anymore (<a href="https://jira.ez.no/browse/EZP-25039" class="external-link">EZP-25039</a>)
-   Selection fields are now validated properly (<a href="https://jira.ez.no/browse/EZP-24716" class="external-link">EZP-24716</a>)
-   Options can be added to a selection field definition (<a href="https://jira.ez.no/browse/EZP-25002" class="external-link">EZP-25002</a>)
-   <span style="line-height: 1.42857;">Visibility is now properly updated in the content details tab (</span><a href="https://jira.ez.no/browse/EZP-24945" class="external-link">EZP-24945</a><span style="line-height: 1.42857;">)</span>
-   eng-GB is no longer hardcoded in preview (<a href="https://jira.ez.no/browse/EZP-24929" class="external-link">EZP-24929</a>)
-   Subitems visibility will be updated when changing a location's visibility (<a href="https://jira.ez.no/browse/EZP-24964" class="external-link">EZP-24964</a>)
-   Fixed browser specific issues in Internet Explorer (<a href="https://jira.ez.no/browse/EZP-24055" class="external-link">EZP-24055</a>), Firefox (<a href="https://jira.ez.no/browse/EZP-24907" class="external-link">EZP-24907</a>) and Safari (<a href="https://jira.ez.no/browse/EZP-24986" class="external-link">EZP-24986</a>)
-   The first author field will now be automatically filled (<a href="https://jira.ez.no/browse/EZP-24050" class="external-link">EZP-24050</a>)
-   The always available flag is correctly set on created content (<a href="https://jira.ez.no/browse/EZP-24766" class="external-link">EZP-24766</a>, <a href="https://jira.ez.no/browse/EZP-25091" class="external-link">EZP-25091</a>)
-   Field edit display will no longer break when zooming (<a href="https://jira.ez.no/browse/EZP-25018" class="external-link">EZP-25018</a>)
-   Email validation has been improved (<a href="https://jira.ez.no/browse/EZP-24962" class="external-link">EZP-24962</a>, <a href="https://jira.ez.no/browse/EZP-25051" class="external-link">EZP-25051</a>)
-   <span style="line-height: 1.42857;">Non-containers can no longer be used as targets for moving or copying content (</span><a href="https://jira.ez.no/browse/EZP-24973" class="external-link">EZP-24973</a><span style="line-height: 1.42857;">)</span>
-   Image, media and binary field values can now be emptied and changed (<a href="https://jira.ez.no/browse/EZP-24959" class="external-link">EZP-24959</a>, <a href="https://jira.ez.no/browse/EZP-24922" class="external-link">EZP-24922</a>)
-   Alternative languages of content with untranslatable fields can now be saved (<a href="https://jira.ez.no/browse/EZP-24625" class="external-link">EZP-24625</a>)
-   Role editing will not report an error anymore when editing a role without changing its name (<a href="https://jira.ez.no/browse/EZP-24939" class="external-link">EZP-24939</a>)
-   Hitting enter in a repository form doesn't report an error anymore (<a href="https://jira.ez.no/browse/EZP-24942" class="external-link">EZP-24942</a>)
-   <span style="line-height: 1.42857;">Notifications will be correct after publishing content (</span><a href="https://jira.ez.no/browse/EZP-25035" class="external-link">EZP-25035</a><span style="line-height: 1.42857;">)</span>

Platform
--------

### XmlText moved to its own package

The XmlText FieldType has been moved to its own package (<a href="https://jira.ez.no/browse/EZP-24925" class="external-link">EZP-24925</a>). It can be installed by requiring `ezsystems/ezplatform-xmltext-fieldtype`.

### Default view templates

Default templates were added for most views (<a href="https://jira.ez.no/browse/EZP-25121" class="external-link">EZP-25121</a>). This means that any content will be shown on the site, even if no custom view rule was created for it yet. It will work for content view, with the `full`, `line` and `embed` view types. The default templates can be overridden using container parameters, and customized per siteaccess by means of siteaccess aware settings.

 

Changelog<span id="eZPlatform15.11Releasenotes-changelog" class="confluence-anchor-link"></span>
------------------------------------------------------------------------------------------------

*Changes* (Stories, Improvements and bug fixes) can be found in our issue tracker: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=fixVersion%3D%222015.11%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++&amp;src=confmacro" class="issue-link">72 issues</a> </span>  *(some are still pending additional documentation changes)*

### <span>Known issues & upcoming features</span>

List of issues specifically affecting this release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.11+ORDER+BY+priority+++++++&amp;src=confmacro" class="issue-link">18 issues</a> </span>

General "Known issues" in *Platform stack* compared to* Legacy*: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">8 issues</a> </span>

Epics tentatively\* planned for first stable release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&amp;src=confmacro" class="issue-link">7 issues</a> </span>

Epics tentatively\* planned for first LTS release: <span class="static-jira-issues_count"> <a href="https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&amp;jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&amp;src=confmacro" class="issue-link">0 issue</a> </span>

*<span style="color: rgb(255,255,255);">'</span>\* Some of these features will not be in the stable releases, the once we first and foremost will aim for having in the release are those mentioned on the <a href="http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform" class="external-link">Roadmap</a>.*

 

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [platform-custom-policies.png](attachments/31430067/31430043.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [locations\_tab.png](attachments/31430067/31430044.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PlatformUI-navigation-bar.png](attachments/31430067/31430045.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Please Help.jpg](attachments/31430067/31430046.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [privacy cookie.PNG](attachments/31430067/31430047.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [move-copy-send to trash.PNG](attachments/31430067/31430048.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content\_download.PNG](attachments/31430067/31430049.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [variations purging.PNG](attachments/31430067/31430050.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [content type edition.PNG](attachments/31430067/31430051.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_02.png](attachments/31430067/31430052.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [symfony\_black\_03.png](attachments/31430067/31430053.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [RichText editor.png](attachments/31430067/31430054.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Ventoux-Square.jpg](attachments/31430067/31430055.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31430067/31430056.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform screenshoot alpha1.gif](attachments/31430067/31430057.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 19.16.38 .png](attachments/31430067/31430058.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [PrivacyCookieBundle.png](attachments/31430067/31430059.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Screen Shot 2015-05-12 at 11.46.48 .png](attachments/31430067/31430060.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iStock\_000032478246XLarge - banner doc.jpg](attachments/31430067/31430061.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [notifications.gif](attachments/31430067/31430062.gif) (image/gif)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Solr\_Logo\_on\_white.png](attachments/31430067/31430063.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - roles UI.PNG](attachments/31430067/31430064.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Platform 2015.07 - choose translation.PNG](attachments/31430067/31430065.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [eZ Platform 2015.07 - add translation.gif](attachments/31430067/31430066.gif) (image/gif)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


