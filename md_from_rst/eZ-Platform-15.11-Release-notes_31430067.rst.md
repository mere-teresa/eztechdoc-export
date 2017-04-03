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
**Developer : eZ Platform 15.11 Release notes**

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
**Quick links**

-   [Installation
    instructions](https://github.com/ezsystems/ezplatform/tag/1.0.0-beta8/INSTALL.md)[](https://github.com/ezsystems/ezplatform/blob/v15.05/INSTALL.md)
-   [Requirements](https://doc.ez.no/display/TMPA/Requirements+5.4)
-   Download:
    See [share.ez.no/downloads](http://share.ez.no/downloads/downloads/ez-platform-15.09)

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
eZ Platform beta 8 is now available for testing. This releases focuses
on cleanup, stabilization and the online editor.

**Highlights**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Platform no longer comes with the demo**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
The `ezsystems/ezplatform` package has been completely cleaned from any
reference to the demo and DemoBundle. In addition, we have moved closer
from the symfony-standard distribution:

-   A clean AppBundle is now shipped and enabled by default. Unless you
    have a specific reason not to do so, this is where your projects
    should start from
-   The `ezpublish` folder now contains an empty
    `Resources/views` directory. This is where the templates used in the
    app should go. They can be referenced from templates or yaml files
    as `"path/to/file"`, relative to the `views` directory
-   Settings have been cleaned up: `ezpublish.yml` has been renamed to
    `ezplatform.yml`, and greatly simplified. It is now imported
    from `config.yml` instead of being force-loaded by the kernel

This change should make it much easier to get started on a project. It
also enforces a better separation, on our side, of demo related and
application related changes.

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Platform UI performances improvements**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
-   The tree now uses location search instead of content search, leading
    to fewer HTTP queries
    ([EZP-24873](https://jira.ez.no/browse/EZP-24873))
-   The breadcrumb has been changed to use the
    new `AncestorOf` criterion, and should perform much better
    ([EZP-24871](https://jira.ez.no/browse/EZP-24871))
-   A new “combine” YUI semantic setting has also been introduced. This
    prepares for the [combo loader
    feature](https://github.com/ezsystems/PlatformUIBundle/pull/427) that
    is being worked on. Once approved this should significantly shorten
    the loading time of the backoffice.

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Online editor embeds**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
Embed elements can now be added to RichText fields. The editor will be
shown the Universal Discovery Widget to browse for the embedded content
([EZP-24894](https://jira.ez.no/browse/EZP-24894)).

Images handing is [under active
development,](https://github.com/ezsystems/PlatformUIBundle/pull/436) and
will be part of the next release.

In addition, bugs were fixed on the Online Editor:

-   HTML entities in rich text editor were fixed
    ([EZP-24732](https://jira.ez.no/browse/EZP-24732))
-   Backspace in the richtext editor won’t make the state inconsistent
    anymore ([EZP-25031](https://jira.ez.no/browse/EZP-25031))
-   Heading 1 is now fully visible when editing
    ([EZP-24970](https://jira.ez.no/browse/EZP-24970))
-   Saved RichText content is now free from unwanted markup and tags
    ([EZP-24967](https://jira.ez.no/browse/EZP-24967), [EZP-24971](https://jira.ez.no/browse/EZP-24971))

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Role, policies and languages management**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
Policies ([EZP-24713](https://jira.ez.no/browse/EZP-24713)), roles
([EZP-24700](https://jira.ez.no/browse/EZP-24700)) and languages
([EZP-22658](https://jira.ez.no/browse/EZP-22658)) management have been
implemented. Role assignment with limitations is being finished, and
should be part of the next release.

In addition, the following improvements have been made

-   Items can be excluded from selection in the universal discovery
    widget ([EZP-24989](https://jira.ez.no/browse/EZP-24989)) This
    mechanism is based on callbacks, and can be re-used in
    PlatformUI extensions. 
-   The “save” button will be hidden when editing users
    ([EZP-25016](https://jira.ez.no/browse/EZP-25016))
-   Field definitions position is now calculated automatically
    ([EZP-24569](https://jira.ez.no/browse/EZP-24569))
-   The preview will now use the previewed content’s title
    ([EZP-24927](https://jira.ez.no/browse/EZP-24927))

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Bug fixes**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
-   The main location of content can be changed
    ([EZP-24901](https://jira.ez.no/browse/EZP-24901))
-   Proper feedback will be given when an uploaded file exceeds the
    maximal size ([EZP-25037](https://jira.ez.no/browse/EZP-25037))
-   The language will be properly set when creating a new content as a
    child of freshly created one
    ([EZP-25048](https://jira.ez.no/browse/EZP-25048))
-   Uploading a different file type won’t break the file’s type anymore
    ([EZP-25039](https://jira.ez.no/browse/EZP-25039))
-   Selection fields are now validated properly
    ([EZP-24716](https://jira.ez.no/browse/EZP-24716))
-   Options can be added to a selection field definition
    ([EZP-25002](https://jira.ez.no/browse/EZP-25002))
-   Visibility is now properly updated in the content details tab
    ([EZP-24945](https://jira.ez.no/browse/EZP-24945))
-   eng-GB is no longer hardcoded in preview
    ([EZP-24929](https://jira.ez.no/browse/EZP-24929))
-   Subitems visibility will be updated when changing a location’s
    visibility ([EZP-24964](https://jira.ez.no/browse/EZP-24964))
-   Fixed browser specific issues in Internet Explorer
    ([EZP-24055](https://jira.ez.no/browse/EZP-24055)), Firefox
    ([EZP-24907](https://jira.ez.no/browse/EZP-24907)) and Safari
    ([EZP-24986](https://jira.ez.no/browse/EZP-24986))
-   The first author field will now be automatically filled
    ([EZP-24050](https://jira.ez.no/browse/EZP-24050))
-   The always available flag is correctly set on created content
    ([EZP-24766](https://jira.ez.no/browse/EZP-24766), [EZP-25091](https://jira.ez.no/browse/EZP-25091))
-   Field edit display will no longer break when zooming
    ([EZP-25018](https://jira.ez.no/browse/EZP-25018))
-   Email validation has been improved
    ([EZP-24962](https://jira.ez.no/browse/EZP-24962), [EZP-25051](https://jira.ez.no/browse/EZP-25051))
-   Non-containers can no longer be used as targets for moving or
    copying content ([EZP-24973](https://jira.ez.no/browse/EZP-24973))
-   Image, media and binary field values can now be emptied and changed
    ([EZP-24959](https://jira.ez.no/browse/EZP-24959), [EZP-24922](https://jira.ez.no/browse/EZP-24922))
-   Alternative languages of content with untranslatable fields can now
    be saved ([EZP-24625](https://jira.ez.no/browse/EZP-24625))
-   Role editing will not report an error anymore when editing a role
    without changing its name
    ([EZP-24939](https://jira.ez.no/browse/EZP-24939))
-   Hitting enter in a repository form doesn’t report an error anymore
    ([EZP-24942](https://jira.ez.no/browse/EZP-24942))
-   Notifications will be correct after publishing content
    ([EZP-25035](https://jira.ez.no/browse/EZP-25035))

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Platform**

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**XmlText moved to its own package**

The XmlText FieldType has been moved to its own package
([EZP-24925](https://jira.ez.no/browse/EZP-24925)). It can be
installed by requiring `ezsystems/ezplatform-xmltext-fieldtype`.

**Default view templates**

Default templates were added for most views
([EZP-25121](https://jira.ez.no/browse/EZP-25121)). This means that any
content will be shown on the site, even if no custom view rule was
created for it yet. It will work for content view, with
the `full`, `line` and `embed` view types. The default templates can be
overridden using container parameters, and customized per siteaccess by
means of siteaccess aware settings.

 

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Changelog**

*Changes* (Stories, Improvements and bug fixes) can be found in our
issue tracker:  [72
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=fixVersion%3D%222015.11%22+AND+project+%3D+EZP+AND+issuetype+in+%28Story%2C+Improvement%2C+Bug%29+order+by+issuetype+++&src=confmacro)
 \*(some are still pending additional documentation changes)\*

**Known issues & upcoming features**

List of issues specifically affecting this release:  [18
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project+%3D+EZP+AND+issuetype+in+%28bug%29+AND+affectedVersion+%3D+2015.11+ORDER+BY+priority+++++++&src=confmacro)

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
![image0](images/icons/bullet_blue.gif){width="8px" height="8px"}
[platform-custom-policies.png](attachments/31430067/31430043.png)
(image/png) ![image1](images/icons/bullet_blue.gif){width="8px"
height="8px"} [locations\_tab.png](attachments/31430067/31430044.png)
(image/png) ![image2](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[PlatformUI-navigation-bar.png](attachments/31430067/31430045.png)
(image/png) ![image3](images/icons/bullet_blue.gif){width="8px"
height="8px"} [Please Help.jpg](attachments/31430067/31430046.jpg)
(image/jpeg) ![image4](images/icons/bullet_blue.gif){width="8px"
height="8px"} [privacy cookie.PNG](attachments/31430067/31430047.png)
(image/png) ![image5](images/icons/bullet_blue.gif){width="8px"
height="8px"} [move-copy-send to
trash.PNG](attachments/31430067/31430048.png) (image/png)
![image6](images/icons/bullet_blue.gif){width="8px" height="8px"}
[content\_download.PNG](attachments/31430067/31430049.png) (image/png)
![image7](images/icons/bullet_blue.gif){width="8px" height="8px"}
[variations purging.PNG](attachments/31430067/31430050.png) (image/png)
![image8](images/icons/bullet_blue.gif){width="8px" height="8px"}
[content type edition.PNG](attachments/31430067/31430051.png)
(image/png) ![image9](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[symfony\_black\_02.png](attachments/31430067/31430052.png) (image/png)
![image10](images/icons/bullet_blue.gif){width="8px" height="8px"}
[symfony\_black\_03.png](attachments/31430067/31430053.png) (image/png)
![image11](images/icons/bullet_blue.gif){width="8px" height="8px"}
[RichText editor.png](attachments/31430067/31430054.png) (image/png)
![image12](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Ventoux-Square.jpg](attachments/31430067/31430055.jpg) (image/jpeg)
![image13](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Getting-Started-with-eZ-Publish-Platform.jpg](attachments/31430067/31430056.jpg)
(image/jpeg) ![image14](images/icons/bullet_blue.gif){width="8px"
height="8px"} [Platform screenshoot
alpha1.gif](attachments/31430067/31430057.gif) (image/gif)
![image15](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Screen Shot 2015-05-12 at 19.16.38
.png](attachments/31430067/31430058.png) (image/png)
![image16](images/icons/bullet_blue.gif){width="8px" height="8px"}
[PrivacyCookieBundle.png](attachments/31430067/31430059.png) (image/png)
![image17](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Screen Shot 2015-05-12 at 11.46.48
.png](attachments/31430067/31430060.png) (image/png)
![image18](images/icons/bullet_blue.gif){width="8px" height="8px"}
[iStock\_000032478246XLarge - banner
doc.jpg](attachments/31430067/31430061.jpg) (image/jpeg)
![image19](images/icons/bullet_blue.gif){width="8px" height="8px"}
[notifications.gif](attachments/31430067/31430062.gif) (image/gif)
![image20](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Solr\_Logo\_on\_white.png](attachments/31430067/31430063.png)
(image/png) ![image21](images/icons/bullet_blue.gif){width="8px"
height="8px"} [Platform 2015.07 - roles
UI.PNG](attachments/31430067/31430064.png) (image/png)
![image22](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Platform 2015.07 - choose
translation.PNG](attachments/31430067/31430065.png) (image/png)
![image23](images/icons/bullet_blue.gif){width="8px" height="8px"} [eZ
Platform 2015.07 - add
translation.gif](attachments/31430067/31430066.gif) (image/gif)

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

