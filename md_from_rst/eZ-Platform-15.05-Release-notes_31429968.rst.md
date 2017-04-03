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
**Developer : eZ Platform 15.05 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek on Apr 18, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**eZ Platform “Alpha3” available for testing**

</div>
</div>
</div>
<div class="columnLayout two-equal" data-layout="two-equal">
<div class="cell normal" data-type="normal">
<div class="innerCell">
![image0](attachments/31429968/31429960.png){.confluence-embedded-image}

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Quick links**

-   [Installation
    instructions](https://github.com/ezsystems/ezplatform/blob/v0.9.0/INSTALL.md)[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md)
-   [Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4) \*(currently
    same as eZ Publish Platform 5.4)\*
-   Upgrading: *As this is a alpha release, there is no upgrade
    instructions yet, this is planned for Beta.*
-   Download:
    See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.05-alpha),
    or see *Install* for how to install via composer.

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
*July 6th 2015*

The third alpha release of eZ Platform,15.05 builds upon the
[15.03](eZ-Platform-15.03-Release-notes_31429950.html) March release
adding additional support for editing- and browsing-capabilities. It
also contains several underlying improvements and fixes that will be
part of the [5.3.6](https://doc.ez.no/display/TMPA/5.3.5+Release+Notes)
and [5.4.3](https://doc.ez.no/display/TMPA/5.4.2+Release+Notes)
maintenance versions that will be released soon.

**Highlights**

Besides lots of smaller improvements and fixes found bellow, and
mentioned above for the 5.x sub release, the main changes are: 

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Improved Symfony 2.7/3.0 support**

</div>
</div>
</div>
<div class="columnLayout two-left-sidebar"
data-layout="two-left-sidebar">
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image1](attachments/31429968/31429958.png){.confluence-embedded-image}

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
Symfony 2.7 LTS is now fully supported, and no deprecation errors should
be thrown anymore. This should also ensure compatibility with the 2.8
and 3.0 releases planned for november this year.

Dynamic settings have been refactored to use the [Expression
Language](http://symfony.com/fr/doc/current/components/expression_language/index.html) instead
of fake services.

More info: [Symfony 2.7/3.0 epic](https://jira.ez.no/browse/EZP-24094),
[Symfony 2.7 announcement blog
post](http://symfony.com/blog/symfony-2-7-0-released)

 

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Content Type administration UI**

</div>
</div>
</div>
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
Content types can now be created or edited from PlatformUI, inside the
Admin panel. The feature isn’t visually integrated yet, but already
covers most FieldTypes. Progress can be followed on the Epic above.

Forms themselves use the [Symfony Forms
component](http://symfony.com/doc/current/components/form/introduction.html).
The implementation has been done in a distinct package, dedicated to
providing Forms for the eZ Repository domain: [Repository
Forms](https://github.com/ezsystems/repository-forms).

More info: [Content type management
epic](http://jira.ez.no/browse/EZP-24070), [repository-forms on
Github](https://github.com/ezsystems/repository-forms), [repository-forms
on
Packagist](https://packagist.org/packages/ezsystems/repository-forms).

 

 

 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image2](attachments/31429968/31429957.png?effects=border-simple,blur-border){.confluence-embedded-image
width="433px" height="199px"}

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Image variations purging**

</div>
</div>
</div>
<div class="columnLayout two-left-sidebar"
data-layout="two-left-sidebar">
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image3](attachments/31429968/31429956.png?effects=border-simple,blur-border){.confluence-embedded-image}

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
Image variations generated by Imagine can now be purged using the
application console. It can either clear all variations, or variations
of a particular alias:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
# Clear all variations of the large and gallery aliases/filters
php ezpublish/console liip:imagine:cache:remove --filters=large --filters=gallery -v
```

</div>
</div>
Note that this change comes with a modification of the variations
storage path. This change will be transparent from a user’s perspective,
but you may want to purge the existing variations. To do this, you need
to [switch to the legacy
handler](https://github.com/ezsystems/ezpublish-kernel/blob/cc3f25fa25393e404f5af2806176fa07835721ef/eZ/Bundle/EzPublishCoreBundle/Resources/config/image.yml#L200)
by redeclaring the `ezpublish.image_alias.variation_purger` service
to `ezpublish.image_alias.variation_purger.legacy_storage_image_file`.

More info: [Technical
specifications](https://github.com/ezsystems/ezpublish-kernel/blob/v6.0.0-alpha3/doc/specifications/image/variation_purging.md), [Implementation
story](http://jira.ez.no/browse/EZP-23367).

 

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**content/download controller for Binary Files**

</div>
</div>
</div>
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Downloading of binary file is now natively supported, and doesn’t
require a legacy fallback anymore.**

A new controller and route have been added, and the Image and BinaryFile
content field templates have been updated. Permissions are transparently
checked during download, and HTTP resume is supported. The [Route
Reference API](https://doc.ez.no/display/EZP/RouteReference), provides
facilities to generate the right path from templates, and a valid URI is
exposed over REST.

More
info: [Documentation](/pages/createpage.action?spaceKey=DEVELOPER&title=Usage%3A+Binary+and+Media+download+todelete&linkCreation=true&fromPageId=31429968),
[Specificaftions](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/proposed/content_download/content_download.md), [Implementation
story](https://jira.ez.no/browse/EZP-23550), [Content view module
epic](https://jira.ez.no/browse/EZP-24144).

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image4](attachments/31429968/31429955.png?effects=border-simple,blur-border){.confluence-embedded-image
width="433px" height="121px"}

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Platform UI : move, copy and send content to trash**

</div>
</div>
</div>
<div class="columnLayout two-left-sidebar"
data-layout="two-left-sidebar">
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image5](attachments/31429968/31429954.png){.confluence-embedded-image}

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
Thanks to the addition of the Universal Discovery Widget in 2015.03,
those functions have been added to PlatformUI.

More info: [Content CRUD UI epic](https://jira.ez.no/browse/EZP-22993) 

 

 

 

 

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Platform UI notifications**

</div>
</div>
</div>
<div class="columnLayout two-equal" data-layout="two-equal">
<div class="cell normal" data-type="normal">
<div class="innerCell">
Notifications will now be displayed upon certain events in the
backoffice.

Each notification is either an information (content was published,
location was removed…), or an error. A reusable javascript API makes it
easy to re-use the system for your own needs, if any, on PlatformUI. A
PHP API has also been added in order to send notifications from the
Symfony controllers used to implement some parts of the backoffice.

More info: [UI notifications epic](https://jira.ez.no/browse/EZP-24340)

 

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
![image6](attachments/31429968/31429952.gif){.confluence-embedded-image}

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Rich text editing prototype based on Alloy**

</div>
</div>
</div>
<div class="columnLayout two-left-sidebar"
data-layout="two-left-sidebar">
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image7](attachments/31429968/31429960.png){.confluence-embedded-image}

</div>
</div>
<div class="cell normal" data-type="normal">
<div class="innerCell">
A prototype of the WYSWIGYG editor for the RichText FieldType has been
added. It is based on Alloy Editor, itself based on CKEditor. 

To see it in action, you need to create a new Content Type with a
RichText Field. A perfect opportunity to test the Content Type admin UI.

More info: [Alloy Editor](http://alloyeditor.com/), [RichText editing
epic](https://jira.ez.no/browse/EZP-22949), [prototype
screencast](https://www.youtube.com/watch?v=o1r44rmYsdY)

*\**\*

*\**\*

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Re-usable privacy cookie handling**

</div>
</div>
</div>
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
The [ezsystems/privacy-cookie-bundle](https://packagist.org/packages/ezsystems/privacy-cookie-bundle)
package, introduced in the 15.03 release, has been made much more
flexible. It now comes with a Factory interface and a Banner value
object, so that it is easy to pick the banner’s content in different
ways.

The built-in implementation uses a configuration file based Factory,
allowing you to configure the cookie banner using simple yaml files.

More info: [github
repository](http://github.com/ezsystems/EzSystemsPrivacyCookieBundle) 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
![image8](attachments/31429968/31429953.png?effects=border-simple,blur-border){.confluence-embedded-image}

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Other notable changes**

-   Legacy storage engine performances improvements
    -   [![image9](https://jira.ez.no/images/icons/issuetypes/bug.png){.icon}EZP-24499](https://jira.ez.no/browse/EZP-24499?src=confmacro)
        - loading Content with many languages & attributes & locations
        leads to high memory usage Closed
    -   [![image10](https://jira.ez.no/images/icons/issuetypes/improvement.png){.icon}EZP-24539](https://jira.ez.no/browse/EZP-24539?src=confmacro)
        -   Avoid expensive sorting sql when not needed in Search Closed

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Changelog**

*Changes* (Stories, Improvements and bug fixes) can be found in our
issue tracker:  [51
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.05%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype++++&src=confmacro)
 \*(some are still pending additional documentation changes)\*

**Known issues & upcoming features**

List of issues specifically affecting this release:  [35
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.05+ORDER+BY+priority+++++&src=confmacro)

General “Known issues” in *Platform stack* compared to\* Legacy\*:  [8
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+affectedVersion+%3D%22Known+Issues+5.x+Stack%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro)

Epics tentatively\* planned for first stable release:  [7
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3DPollux+AND+resolution+%3D+Unresolved+ORDER+BY+priority+&src=confmacro)

Epics tentatively\* planned for first LTS release:  [0
issue](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+%3D+Epic+AND+fixVersion%3D%22Mauna+Kea%22+AND+resolution+%3D+Unresolved+ORDER+BY+priority++&src=confmacro)

*’\* Some of these features will not be in the stable releases, the once
we first and foremost will aim for having in the release are those
mentioned on
the [Roadmap](http://ez.no/Blog/What-to-Expect-from-eZ-Studio-and-eZ-Platform).*

</div>
</div>
</div>
</div>
</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
![image11](images/icons/bullet_blue.gif){width="8px" height="8px"}
[notifications.gif](attachments/31429968/31429952.gif) (image/gif)
![image12](images/icons/bullet_blue.gif){width="8px" height="8px"}
[privacy cookie.PNG](attachments/31429968/31429953.png) (image/png)
![image13](images/icons/bullet_blue.gif){width="8px" height="8px"}
[move-copy-send to trash.PNG](attachments/31429968/31429954.png)
(image/png) ![image14](images/icons/bullet_blue.gif){width="8px"
height="8px"} [content\_download.PNG](attachments/31429968/31429955.png)
(image/png) ![image15](images/icons/bullet_blue.gif){width="8px"
height="8px"} [variations
purging.PNG](attachments/31429968/31429956.png) (image/png)
![image16](images/icons/bullet_blue.gif){width="8px" height="8px"}
[content type edition.PNG](attachments/31429968/31429957.png)
(image/png) ![image17](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[symfony\_black\_02.png](attachments/31429968/31429958.png) (image/png)
![image18](images/icons/bullet_blue.gif){width="8px" height="8px"}
[symfony\_black\_03.png](attachments/31429968/31429959.png) (image/png)
![image19](images/icons/bullet_blue.gif){width="8px" height="8px"}
[RichText editor.png](attachments/31429968/31429960.png) (image/png)
![image20](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Ventoux-Square.jpg](attachments/31429968/31429961.jpg) (image/jpeg)
![image21](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31429968/31429962.jpg)
(image/jpeg) ![image22](images/icons/bullet_blue.gif){width="8px"
height="8px"} [Platform screenshoot
alpha1.gif](attachments/31429968/31429963.gif) (image/gif)
![image23](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Screen Shot 2015-05-12 at 19.16.38
.png](attachments/31429968/31429964.png) (image/png)
![image24](images/icons/bullet_blue.gif){width="8px" height="8px"}
[PrivacyCookieBundle.png](attachments/31429968/31429965.png) (image/png)
![image25](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Screen Shot 2015-05-12 at 11.46.48
.png](attachments/31429968/31429966.png) (image/png)
![image26](images/icons/bullet_blue.gif){width="8px" height="8px"}
[iStock\_000032478246XLarge - banner
doc.jpg](attachments/31429968/31429967.jpg) (image/jpeg)

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

