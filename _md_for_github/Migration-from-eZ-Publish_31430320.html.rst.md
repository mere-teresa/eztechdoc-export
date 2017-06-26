<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Migrating to eZ Platform - Follow the Ibex!](31429532.html)

</div>
**Developer : Migration from eZ Publish**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Feb 27, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
eZ Publish was eZ Platform's predecessor, a CMS in development for five major versions and several years.

Users of eZ Publish will find eZ Platform largely similar to what they know. The improvements and enhancements did not turn the fundamental concepts underlying the system, such as the content model, upside down. However, specific features, solutions and recipes may work differently between the two versions.

The release of eZ Platform brought about an inevitable disruption in backwards compatibility with eZ Publish. This means that the process of migrating existing installations requires more effort than simply upgrading from one version to another. Here you can find details on moving existing Publish-powered websites to eZ Platform.

**Changes overview**

**Incompatibilities with legacy**

eZ Platform represents the 6th generation of eZ Publish, and while the 5th generation had\* \*a major focus on backwards code compatibility with the 3rd and 4th generations *(legacy)*, the 6th generation does not.

The 6th generation is aimed at being fully backwards compatible on the following:

-   **Content** from 4th and later 5th generation installation
-   **Code** from 5th generation system when written for *Platform (Symfony) stack*

<div
class="confluence-information-macro confluence-information-macro-information">
The specific incompatibilities

<div class="confluence-information-macro-body">
The specific changes that will be migrated and are incompatible with legacy are: 

-   XmlText fields have been replaced with a new [RichText](RichText-Field-Type_31430537.html)field
-   Page field (ezflow) has been replaced by the [LandingPage](31430521.html)field, and is now provided by our commercial product [eZ Platform Enterprise Edition](http://ezstudio.com/)
-   Incremental future improvements to the database schema to improve features and scalability of the content repository 

</div>
</div>
Together these major improvements make it practically impossible to run eZ Platform side by side with eZ Publish legacy, like it was possible in 5.x series. *For these reasons we recommend that you use eZ Publish Enterprise 5.4  ([which is supported until end of 2021](https://support.ez.no/Public/Service-Life)) if you don't have the option to remake your web application yet, or want to do it gradually.*

**Migration Path**

**From legacy (4.x or 5.x) to Platform stack (5.4/2014.11)**

If you are coming directly from legacy (4.x), you need to follow the best practice 5.x Platform migration path and do the following:

-   Rewrite custom Field Types for the new Platform stack, see [Field Type Tutorial](Creating-a-Tweet-Field-Type_31429766.html)
-   Rewrite custom web front end to use the new Platform/Symfony stack, see [Beginner Tutorial](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)
-   Rewrite custom admin modules to use the new Platform/Symfony stack
    -   And if you do this while on 5.x, you can use several of the [available legacy migration features](https://doc.ez.no/display/EZP/Legacy+code+and+features) to make the new code appear in legacy admin

See Upgrade documentation on how to perform the actual upgrade: [Upgrade (eZ Publish Platform page)](https://doc.ez.no/display/EZP/Upgrade)

**From Platform stack (5.4/2014.11) to eZ Platform**

As eZ Platform introduced completely new user interfaces with greatly improved user experience, the following custom developments needs to be made if you have customization needs:

-   Write UI code for custom Field Types for the new Javascript-based editorial interface, see  [Extending PlatformUI with new navigation](Extending-PlatformUI-with-new-navigation_31430235.html) and [Creating Landing Page blocks (Enterprise)](31430614.html)
-   Adjust custom admin modules for the new Symfony-based admin interface

For a detailed guide through these developments see [Upgrading from 5.4.x and 2014.11 to 16.xx](Upgrading-from-5.4.x-and-2014.11-to-16.xx_31430322.html) 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<img src="attachments/31430320/31431651.png" alt="image0" class="confluence-embedded-image image-right" height="250" />

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
<img src="images/icons/bullet_blue.gif" alt="image1" width="8" height="8" /> [Gondola.png](attachments/31430320/31431651.png) (image/png)

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

