1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>
5.  <span>[eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)</span>

<span id="title-text"> Developer : eZ Platform v1.4.0 Release notes </span>
===========================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Jul 05, 2016

The v1.4.0 release of eZ Platform is available as of 30 June 2016.

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
For the release notes of the corresponding eZ Studio release, see [eZ Enterprise v1.4 Release notes](eZ-Enterprise-v1.4-Release-notes_32113415.html).

Quick links
-----------

-   [Installation instructions](31429538.html)
-   <span style="color: rgb(0,51,102);">[Requirements](31429536.html)</span>
-   <span style="color: rgb(0,51,102);"><a href="http://share.ez.no/latest" class="external-link">Download</a></span>

Changes since v1.3
------------------

<span class="confluence-link">For list of issues fixed in v1.4.0 see <a href="https://jira.ez.no/issues/?filter=-1&amp;jql=project%20%3D%20EZP%20AND%20resolution%20!%3D%20Unresolved%20AND%20fixVersion%20in%20(1.4.0-beta1%2C%201.4.0-rc1)%20ORDER%20BY%20updatedDate%20ASC" class="external-link">our issue tracker</a>, below is a list of notable bugs/features/enhancements done in the release.</span>

### Content on the fly

It is now possible to create content on the fly, during the editing process. You no longer need to be in the View mode to create a new Content item. Instead you can do it from the Universal Discovery Widget, for example when embedding content in the Online Editor, or when choosing an image linked to a different Content item.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="https://cloud.githubusercontent.com/assets/12594013/16034938/b0f616a0-3214-11e6-8b9e-a824c1b2d1ca.gif" class="confluence-embedded-image confluence-external-resource" height="400" /></span>

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<span>This feature is provided as a preview</span><span> in this release</span>, available from a separate bundle: `EzContentOnTheFlyBundle`

### Dashboard

When logging in to the app you are now greeted with a Dashboard which you can use to quickly view and start editing the most important content. Content in the Dashboard is presented in three blocks:

-   **All Content:** Last Content items that have been modified.
-   **My Drafts:** All your current Content item drafts.
-   **My Content:** All Content items that you have modified.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113446.png" alt="Dashboard" class="confluence-embedded-image" width="650" /></span>

### Managing Content item versions

In the View mode you now have a new tab: **Versions**. It lists all versions of the current Content item, including archived and published versions, as well as drafts. You can view any version, edit an existing draft, delete versions or create a new draft from an existing version.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113448.png" alt="Versions of a Content item in Versions tab" class="confluence-embedded-image" width="650" /></span>

### Full text search

Full text search is now available, accessible in the Universal Discovery Widget (in the **Search** tab), and in the discovery bar (on the left on the screen).

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113513.png" class="confluence-embedded-image" height="400" /></span>

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
This feature is provided as a preview<span> in this release</span>, available from a separate bundle: `PlatformUISearchPrototypeBundle`

Needs Solr for now

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Full text indexing is currently only working with Solr search engine. To follow status for LegacySearchEngine (SQL) see <span class="jira-issue resolved"> <a href="https://jira.ez.no/browse/EZP-25088?src=confmacro" class="jira-issue-key"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" class="icon" />EZP-25088</a> <span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span> </span>

### Location swap

It is now possible to swap two Content items in their Locations. You can do it in the **Location** tab of any Content item.

Thanks go to <a href="https://doc.ez.no/display/~desorden" class="confluence-userlink user-mention">Carlos Revillo</a> for the contribution.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113420.png" alt="Location swap " class="confluence-embedded-image" width="400" /></span>

### User registration

Registering new users is now available through a `/register` route.

<span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113419.png" alt="User registration form" class="confluence-embedded-image" width="300" /></span>

### User-Generated Content improved

User-generated content, accessible through the ` content/create/nodraft` route, now covers more Field Types, including Selection and Checkbox, as needed by User Registration.

See [User Generated Content](User-Generated-Content_31432025.html) for more information.

### Query Controller

Added a Query controller which makes it easier to run a repository query and display the results in a template, with built-in "children" query controller you will no longer need to create own controllers whenever you need to simply list up children of a location.

See the<span class="confluence-link"> </span>[<span class="confluence-link">Query controller page</span>](Content-Rendering_31429679.html#ContentRendering-Querycontroller) for more information.

<span class="confluence-embedded-file-wrapper image-right-wrapper confluence-embedded-manual-size"><img src="attachments/32113421/32113469.png" class="confluence-embedded-image confluence-thumbnail image-right" height="150" /></span>

### Docker Tools Beta

In this release we are starting to share tools to help you use Docker with eZ Platform. What we share today has gone through several iterations to try to become as simple as possible. It uses plain Docker and Docker Compose to avoid having to learn anything specific with these tools, and it uses official docker images to take advantage of continued innovation by Docker Inc. and the ecosystem.

Further reading: [Docker Tools](Docker-Tools_31429544.html)

Updating
--------

To update to this version, follow the [Updating eZ Platform](Updating-eZ-Platform_31431770.html) guide and use v1.4.0 as `<version>`.

 

Packages versions in this release
---------------------------------

| Package Name                        | 1.4.0 version |
|-------------------------------------|---------------|
| behatbundle                         | 6.3.0         |
| ez-support-tools                    | 0.1.0.1       |
| ezplatform-solr-search-engine       | 1.0.3         |
| ezpublish-kernel                    | 6.4.0         |
| platform-ui-assets-bundle           | 2.1.0         |
| repository-forms                    | 1.3.0         |
| ezplatform-xmltext-fieldtype        | 1.1.2         |
| platform-ui-bundle                  | 1.4.0         |
| comments-bundle                     | 6.0.0         |
| content-on-the-fly-prototype-bundle | 0.1.1         |
| platform-ui-search-prototype-bundle | 0.1.3         |

#### In this topic:

-   [Quick links](#eZPlatformv1.4.0Releasenotes-Quicklinks)
-   [Changes since v1.3](#eZPlatformv1.4.0Releasenotes-Changessincev1.3)
    -   [Content on the fly](#eZPlatformv1.4.0Releasenotes-Contentonthefly)
    -   [Dashboard](#eZPlatformv1.4.0Releasenotes-Dashboard)
    -   [Managing Content item versions](#eZPlatformv1.4.0Releasenotes-ManagingContentitemversions)
    -   [Full text search](#eZPlatformv1.4.0Releasenotes-Fulltextsearch)
    -   [Location swap](#eZPlatformv1.4.0Releasenotes-Locationswap)
    -   [User registration](#eZPlatformv1.4.0Releasenotes-Userregistration)
    -   [User-Generated Content improved](#eZPlatformv1.4.0Releasenotes-User-GeneratedContentimproved)
    -   [Query Controller](#eZPlatformv1.4.0Releasenotes-QueryController)
    -   [Docker Tools Beta](#eZPlatformv1.4.0Releasenotes-DockerToolsBeta)
-   [Updating](#eZPlatformv1.4.0Releasenotes-Updating)
-   [Packages versions in this release](#eZPlatformv1.4.0Releasenotes-Packagesversionsinthisrelease)

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [user\_registration\_form.png](attachments/32113421/32113422.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [location\_swap.png](attachments/32113421/32113420.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [user\_registration\_form.png](attachments/32113421/32113419.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [dashboard.png](attachments/32113421/32113446.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [versions\_tab.png](attachments/32113421/32113448.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [docker-logo.png](attachments/32113421/32113469.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [UI Simple Fulltext Search.png](attachments/32113421/32113513.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


