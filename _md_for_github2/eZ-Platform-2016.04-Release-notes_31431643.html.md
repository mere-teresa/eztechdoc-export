1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform 2016.04 Release notes </span>
============================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Jun 19, 2016

-   [Quick links](#eZPlatform2016.04Releasenotes-Quicklinks)
-   [Changes since 16.02](#eZPlatform2016.04Releasenotes-Changessince16.02)
    -   [Managing sub-items](#eZPlatform2016.04Releasenotes-Managingsub-items)
    -   [Field category support](#eZPlatform2016.04Releasenotes-Fieldcategorysupport)
    -   [Name pattern support for Relation, Relation List and Selection Field Types](#eZPlatform2016.04Releasenotes-NamepatternsupportforRelation,RelationListandSelectionFieldTypes)
    -   [Improved system information admin panel](#eZPlatform2016.04Releasenotes-Improvedsysteminformationadminpanel)
    -   [Improved trash management](#eZPlatform2016.04Releasenotes-Improvedtrashmanagement)
    -   [Pagelayout setting](#eZPlatform2016.04Releasenotes-Pagelayoutsetting)
    -   [Grid sub-items view](#eZPlatform2016.04Releasenotes-Gridsub-itemsview)
-   [Documentation and developer ressources](#eZPlatform2016.04Releasenotes-Documentationanddeveloperressources)
-   [Updating](#eZPlatform2016.04Releasenotes-Updating)

The 16.04 release of eZ Platform is available as of April 28th, 2016.
The semantic version of this release is v1.3.0.

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
For the release notes of the corresponding eZ Studio release, see [eZ Studio 2016.04 Release notes](eZ-Studio-2016.04-Release-notes_31431648.html)

<span style="color: rgb(0,98,147);">Quick links</span>
------------------------------------------------------

-   [Installation instructions](https://doc.ez.no/display/TECHDOC/Installation)
-   <span style="color: rgb(0,51,102);">[Requirements](https://doc.ez.no/display/TECHDOC/Requirements)</span>
-   Download: See <a href="http://share.ez.no/downloads/downloads/ez-platform-1.3.0" class="uri" class="external-link">http://share.ez.no/downloads/downloads/ez-platform-1.3.0</a>

Changes since 16.02
-------------------

<span class="confluence-link"><span>See </span><a href="https://jira.ez.no/issues/?jql=project%20%3D%20EZP%20and%20fixVersion%20%3D%20%221.3.0%22%20and%20resolution%20!%3D%20%22unresolved%22%20order%20by%20type%20ASC%2C%20priority%20DESC" class="external-link">our issue tracker</a><span> </span>for the list of issues fixed in v1.3.0 *(16.04)*. Below is a list of notable bugs/features/enhancements done in the release. </span>

### Managing sub-items

It's now possible to define ordering criterias for sub-items. It's also possible to set priorities for sub-items. This feature was started with 16.02 but was not fully completed and finally landed in 16.04. Doing this, we also simplified the set of criterias available to the editor.

 

| <span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31431643/31431642.png" class="confluence-embedded-image confluence-content-image-border" width="277" height="250" /></span> | <span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31431643/31431641.png" class="confluence-embedded-image confluence-content-image-border" height="150" /></span> |
|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

<a href="https://jira.ez.no/browse/EZP-25351" class="external-link">More about the ordering of sub-items</a>

### Field category support

Fields can now be assigned to a category from the Content Type management UI, again making it possible to organize fields for editors in relevant categories.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31431643/31431640.png" class="confluence-embedded-image confluence-content-image-border" width="313" height="250" /></span>

### Name pattern support for Relation, Relation List and Selection Field Types

The Relation and Selection Field Types can now be used to generate content names and URL aliases. This improvement comes with improvements to the API and SPI layer, making it easier to use complex field data to generate a title or url slug.

<a href="http://jira.ez.no/browse/EZP-25303" class="external-link">More about improved getName() support</a>, and for techncial details, for now have a look at <a href="https://github.com/ezsystems/ezpublish-kernel/pull/1605" class="external-link">the pull request</a>.

### <span style="line-height: 1.5;">Improved system information admin panel</span>

The system information panel in Platform UI has been improved, and reimplemented in a new package, <a href="http://github.com/ezsystems/ez-support-tools" class="external-link">ezsystems/ez-support-tools</a>. This change will make it easier to add custom panels to the UI, or customize existing ones.

<a href="https://jira.ez.no/browse/EZP-25514" class="external-link">More about improved system information</a>

### Improved trash management

Items that were trashed can now be restored. Trash can be empty, permanently deleting items in the trash.

The user interface introduced a more contextual right action bar for that purpose.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31431643/31431639.png" class="confluence-embedded-image confluence-content-image-border" height="250" /></span>

<a href="https://jira.ez.no/browse/EZP-25305" class="external-link">More about trash management</a>

### Pagelayout setting

A global pagelayout template can now be defined using siteaccess aware settings:

``` brush:
ezpublish:
  system:
    default:
      pagelayout: "pagelayout.html.twig" # app/Resources/views/pagelayout.html.twig
```

This setting will be used by the default content view templates. It is recommended that you also use it in your own templates, so that the site's layout management is centralized. Examples can be found in the <a href="https://github.com/ezsystems/ezplatform-demo/blob/master/app/Resources/views/full/blog.html.twig#L1" class="external-link">eZ Platform demo templates</a>.

Thanks go to <a href="https://doc.ez.no/display/~desorden" class="confluence-userlink user-mention">Carlos Revillo</a> for the contribution.

### Grid sub-items view

A grid sub-items view has been introduced in PlatformUI. It displays items as blocks, with a large icon, and can be toggled from buttons on the top left corner of the sub-items view.

As of the 16.04 release, the feature is only being introduced, and the icon is identical for all elements. This will change in the future, as can be seen in the <a href="https://jira.ez.no/browse/EZP-25350" class="external-link">JIRA sub-items epic</a>.

More importantly, this has been done to make it possible to developers to extend the user interface in this way. By default, eZ Platform will provide a list view and a grid view but developer will then be able to add their own views for specific context, content type or sections that might have specific business logic.

Documentation and developer ressources
--------------------------------------

During the 2016.04 release, we put work into also improving developer resources. <a href="http://doc.ez.no" class="external-link">Doc.ez.no</a> has been improved continuously throughout the release, and our [beginner tutorial](https://doc.ez.no/display/TECHDOC/Beginner+Tutorial) for developer as well. We will keep working on those ressources during further releases. Please don't hesitate to send feedback.

Updating
--------

To update to this version, follow the [Updating eZ Platform](Updating-eZ-Platform_31431770.html) guide and use **v1.3.0** as version.

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Trash Management.png](attachments/31431643/31431639.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [field categories.png](attachments/31431643/31431640.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [setting priorities.png](attachments/31431643/31431641.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [sub-items ordering.png](attachments/31431643/31431642.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


