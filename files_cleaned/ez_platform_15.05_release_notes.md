1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release
    notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 15.05 Release notes </span> {#title-heading .pagetitle}
==========================================================================

Created by <span class="author"> Dominika Kurek</span> on Apr 18, 2016

<span style="color: rgb(0,51,102);">eZ Platform “Alpha3” available for testing</span> {#eZPlatform15.05Releasenotes-eZPlatform"Alpha3"availablefortesting}
=====================================================================================

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429960.png){.confluence-embedded-image}</span>

#### Quick links {#eZPlatform15.05Releasenotes-Quicklinks}

-   [Installation
    instructions](https://github.com/ezsystems/ezplatform/blob/v0.9.0/INSTALL.md){.external-link}[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md){.external-link}
-   <span
    style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) <span
    style="color: rgb(128,128,128);">*(currently same as eZ Publish
    Platform 5.4)*</span></span>
-   <span style="color: rgb(0,0,0);">Upgrading: <span
    style="color: rgb(128,128,128);">*As this is a alpha release, there
    is no upgrade instructions yet, this is planned
    for Beta.*</span></span>

-   Download:
    See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.05-alpha){.external-link},
    or see *Install* for how to install via composer.

*July 6th 2015*

<span>The third alpha release of eZ Platform,</span><span>15.05 builds
upon the
</span>[15.03](eZ-Platform-15.03-Release-notes_31429950.html)<span>
March release adding additional support for editing- and
browsing-capabilities. It also contains several underlying improvements
and fixes that will be part of the
</span>[5.3.6](https://doc.ez.no/display/TMPA/5.3.5+Release+Notes)<span>
and
</span>[5.4.3](https://doc.ez.no/display/TMPA/5.4.2+Release+Notes)<span>
maintenance versions that will be released soon</span><span>.</span>

Highlights {#eZPlatform15.05Releasenotes-Highlights}
==========

Besides lots of smaller improvements and fixes found bellow, and
mentioned above for the 5.x sub release, the main changes are: 

<span>  
</span>

Improved Symfony 2.7/3.0 support {#eZPlatform15.05Releasenotes-ImprovedSymfony2.7/3.0support}
--------------------------------

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429958.png){.confluence-embedded-image}</span>

<span
style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">Symfony
2.7 LTS is now fully supported, and no deprecation errors should be
thrown anymore. This should also ensure compatibility with the 2.8 and
3.0 releases planned for november this year.</span>

<span
style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">Dynamic
settings have been refactored to use the [Expression
Language](http://symfony.com/fr/doc/current/components/expression_language/index.html){.external-link} instead
of fake services.</span>

More info: [Symfony 2.7/3.0
epic](https://jira.ez.no/browse/EZP-24094){.external-link}, [Symfony 2.7
announcement blog
post](http://symfony.com/blog/symfony-2-7-0-released){.external-link}

 

Content Type administration UI {#eZPlatform15.05Releasenotes-ContentTypeadministrationUI}
------------------------------

<span style="color: rgb(51,51,51);">Content types can now be created or
edited from PlatformUI, inside the Admin panel. The feature isn’t
visually integrated yet, but already covers most FieldTypes. Progress
can be followed on the Epic above.</span>

Forms themselves use the [Symfony Forms
component](http://symfony.com/doc/current/components/form/introduction.html){.external-link}.
The implementation has been done in a distinct package, dedicated to
providing Forms for the eZ Repository domain: [Repository
Forms](https://github.com/ezsystems/repository-forms){.external-link}.

More info: [Content type management
epic](http://jira.ez.no/browse/EZP-24070){.external-link}, [repository-forms
on
Github](https://github.com/ezsystems/repository-forms){.external-link}, [repository-forms
on
Packagist](https://packagist.org/packages/ezsystems/repository-forms){.external-link}.

 

 

 

 

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429968/31429957.png?effects=border-simple,blur-border){.confluence-embedded-image
width="433" height="199"}</span>

Image variations purging {#eZPlatform15.05Releasenotes-Imagevariationspurging}
------------------------

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429956.png?effects=border-simple,blur-border){.confluence-embedded-image}</span>

<span>Image variations generated by Imagine can now be purged using the
application console. It can either clear all variations, or variations
of a particular alias:</span>

~~~~ brush:
# Clear all variations of the large and gallery aliases/filters
php ezpublish/console liip:imagine:cache:remove --filters=large --filters=gallery -v
~~~~

Note that this change comes with a modification of the variations
storage path. This change will be transparent from a user’s perspective,
but you may want to purge the existing variations. To do this, you need
to [switch to the legacy
handler](https://github.com/ezsystems/ezpublish-kernel/blob/cc3f25fa25393e404f5af2806176fa07835721ef/eZ/Bundle/EzPublishCoreBundle/Resources/config/image.yml#L200){.external-link}
by redeclaring the `ezpublish.image_alias.variation_purger` service
to `ezpublish.image_alias.variation_purger.legacy_storage_image_file`.

More info: [Technical
specifications](https://github.com/ezsystems/ezpublish-kernel/blob/v6.0.0-alpha3/doc/specifications/image/variation_purging.md){.external-link}, [Implementation
story](http://jira.ez.no/browse/EZP-23367){.external-link}.

 

content/download controller for Binary Files {#eZPlatform15.05Releasenotes-content/downloadcontrollerforBinaryFiles}
--------------------------------------------

<span style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">Downloading of binary file is now natively supported, and doesn’t require a legacy fallback anymore.</span> {#eZPlatform15.05Releasenotes-Downloadingofbinaryfileisnownativelysupported,anddoesn'trequirealegacyfallbackanymore.}
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

<span
style="color: rgb(51,51,51);font-size: 14.0px;line-height: 1.4285715;">A
new controller and route have been added, and the Image and BinaryFile
content field templates have been updated. Permissions are transparently
checked during download, and HTTP resume is supported. The [Route
Reference API](https://doc.ez.no/display/EZP/RouteReference), provides
facilities to generate the right path from templates, and a valid URI is
exposed over REST.</span>

More
info: [Documentation](/pages/createpage.action?spaceKey=DEVELOPER&title=Usage%3A+Binary+and+Media+download+todelete&linkCreation=true&fromPageId=31429968){.createlink},
[Specificaftions](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/proposed/content_download/content_download.md){.external-link}, [Implementation
story](https://jira.ez.no/browse/EZP-23550){.external-link}, [Content
view module epic](https://jira.ez.no/browse/EZP-24144){.external-link}.

 

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31429968/31429955.png?effects=border-simple,blur-border){.confluence-embedded-image
width="433" height="121"}</span>

Platform UI : move, copy and send content to trash {#eZPlatform15.05Releasenotes-PlatformUI:move,copyandsendcontenttotrash}
--------------------------------------------------

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429954.png){.confluence-embedded-image}</span>

Thanks to the addition of the Universal Discovery Widget in 2015.03,
those functions have been added to PlatformUI.

<span style="line-height: 1.4285715;">More info: </span>[Content CRUD UI
epic](https://jira.ez.no/browse/EZP-22993){.external-link}<span
style="line-height: 1.4285715;"> </span>

 

 

 

 

Platform UI notifications {#eZPlatform15.05Releasenotes-PlatformUInotifications}
-------------------------

Notifications will now be displayed upon certain events in the
backoffice.

Each notification is either an information (content was published,
location was removed…), or an error. A reusable javascript API makes it
easy to re-use the system for your own needs, if any, on PlatformUI. A
PHP API has also been added in order to send notifications from the
Symfony controllers used to implement some parts of the backoffice.

More info: [UI notifications
epic](https://jira.ez.no/browse/EZP-24340){.external-link}

 

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429952.gif){.confluence-embedded-image}</span>

Rich text editing prototype based on Alloy {#eZPlatform15.05Releasenotes-RichtexteditingprototypebasedonAlloy}
------------------------------------------

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429960.png){.confluence-embedded-image}</span>

A prototype of the WYSWIGYG editor for the RichText FieldType has been
added. It is based on Alloy Editor, itself based on CKEditor. 

To see it in action, you need to create a new Content Type with a
RichText Field. A perfect opportunity to test the Content Type admin UI.

More info: [Alloy
Editor](http://alloyeditor.com/){.external-link}, [RichText editing
epic](https://jira.ez.no/browse/EZP-22949){.external-link}, [prototype
screencast](https://www.youtube.com/watch?v=o1r44rmYsdY){.external-link}

**  
**

**  
**

Re-usable privacy cookie handling {#eZPlatform15.05Releasenotes-Re-usableprivacycookiehandling}
---------------------------------

The [ezsystems/privacy-cookie-bundle](https://packagist.org/packages/ezsystems/privacy-cookie-bundle){.external-link}
package, introduced in the 15.03 release, has been made much more
flexible. It now comes with a Factory interface and a Banner value
object, so that it is easy to pick the banner’s content in different
ways.

The built-in implementation uses a configuration file based Factory,
allowing you to configure the cookie banner using simple yaml files.

More info: [github
repository](http://github.com/ezsystems/EzSystemsPrivacyCookieBundle){.external-link} 

<span
class="confluence-embedded-file-wrapper">![](attachments/31429968/31429953.png?effects=border-simple,blur-border){.confluence-embedded-image}</span>

Other notable changes {#eZPlatform15.05Releasenotes-Othernotablechanges}
---------------------

-   Legacy storage engine performances improvements
    -   <span class="jira-issue resolved">
        [![](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-24499](https://jira.ez.no/browse/EZP-24499?src=confmacro){.jira-issue-key}
        - <span class="summary">loading Content with many languages &
        attributes & locations leads to high memory usage</span> <span
        class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span>
        </span>
    -   <span class="jira-issue resolved">
        [![](https://jira.ez.no/images/icons/issuetypes/improvement.png){.icon}EZP-24539](https://jira.ez.no/browse/EZP-24539?src=confmacro){.jira-issue-key}
        - <span class="summary">Avoid expensive sorting sql when not
        needed in Search</span> <span
        class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span>
        </span>

Changelog {#eZPlatform15.05Releasenotes-Changelog .diff-block-target .diff-block-context}
---------

*Changes* (Stories, Improvements and bug fixes) can be found in our
issue tracker: <span class="static-jira-issues_count"> [51
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.05%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++++&src=confmacro){.issue-link}
</span>  *(some are still pending additional documentation changes)*

### <span>Known issues & upcoming features</span> {#eZPlatform15.05Releasenotes-Knownissues&upcomingfeatures}

List of issues specifically affecting this release: <span
class="static-jira-issues_count"> [35
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.05+ORDER+BY+priority+++++&src=confmacro){.issue-link}
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
[notifications.gif](attachments/31429968/31429952.gif) (image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [privacy
cookie.PNG](attachments/31429968/31429953.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [move-copy-send
to trash.PNG](attachments/31429968/31429954.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[content\_download.PNG](attachments/31429968/31429955.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [variations
purging.PNG](attachments/31429968/31429956.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [content type
edition.PNG](attachments/31429968/31429957.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_02.png](attachments/31429968/31429958.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[symfony\_black\_03.png](attachments/31429968/31429959.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [RichText
editor.png](attachments/31429968/31429960.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Ventoux-Square.jpg](attachments/31429968/31429961.jpg) (image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429968/31429962.jpg)
(image/jpeg)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Platform
screenshoot alpha1.gif](attachments/31429968/31429963.gif) (image/gif)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 19.16.38 .png](attachments/31429968/31429964.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[PrivacyCookieBundle.png](attachments/31429968/31429965.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Screen Shot
2015-05-12 at 11.46.48 .png](attachments/31429968/31429966.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[iStock\_000032478246XLarge - banner
doc.jpg](attachments/31429968/31429967.jpg) (image/jpeg)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


