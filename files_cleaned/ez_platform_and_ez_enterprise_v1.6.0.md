1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Releases](Releases_31429534.html)</span>
4.  <span>[Release Notes](Release-Notes_32867905.html)</span>

<span id="title-text"> Developer : eZ Platform and eZ Enterprise v1.6.0 </span> {#title-heading .pagetitle}
===============================================================================

Created by <span class="author"> Roland Benedetti</span>, last modified
by <span class="editor"> Dominika Kurek</span> on Jan 30, 2017

**The 1.6.0 release of eZ Platform and Enterprise is available as of
October 27th 2016.**

-   [Notable changes
    since v1.5.0](#eZPlatformandeZEnterprisev1.6.0-Notablechangessincev1.5.0)
    -   [eZ Platform](#eZPlatformandeZEnterprisev1.6.0-eZPlatform)
    -   [eZ Enterprise](#eZPlatformandeZEnterprisev1.6.0-eZEnterprise)
-   [Full list of new features, improvements and bug fixes since
    v1.5.0](#eZPlatformandeZEnterprisev1.6.0-Fulllistofnewfeatures,improvementsandbugfixessincev1.5.0)

Notable changes since v1.5.0 {#eZPlatformandeZEnterprisev1.6.0-Notablechangessincev1.5.0}
============================

eZ Platform {#eZPlatformandeZEnterprisev1.6.0-eZPlatform}
-----------

The eZ Platform User Interface has been improved in many ways during
this release, some visible and some more under the hood.

-   Visual preview of the selected item in the UDW, as a first step in
    the revamp of the UDW finder. See
    [EZP-25793](https://jira.ez.no/browse/EZP-25793){.external-link} to
    see what is planned for the feature further along the line.

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Content
preview in
UDW](attachments/32867909/32868022.png){.confluence-embedded-image
width="500"}</span>

-   [EZP-26240](https://jira.ez.no/browse/EZP-26240){.external-link}:
    Server side content validation errors will now be reflected in the
    UI if the app validation is removed, providing more details.
-   [EZP-26191](https://jira.ez.no/browse/EZP-26191){.external-link}:
    Draft conflict screen on dashboard:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Draft
conflict
screen](attachments/32867909/32868024.png){.confluence-embedded-image
width="500"}</span>

-   [EZP-26004](https://jira.ez.no/browse/EZP-26004){.external-link} &
    [EZP-26003](https://jira.ez.no/browse/EZP-26003){.external-link}:
    Search in PlatformUI:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Search
in Platform
UI](attachments/32867909/32868025.png){.confluence-embedded-image
width="400"}</span>

Minor styling on different parts, stability on session and error
management making the user interface feel more stable.

For developers there were also one such styling change, eZ logo now
better matches the Symfony 2.8 web debug toolbar:

<span
class="confluence-embedded-file-wrapper">![](attachments/32867909/32868320.png){.confluence-embedded-image}</span>

 

Under the hood, quite a bit of work happened at the kernel level:

-   [EZP-26057](https://jira.ez.no/browse/EZP-26057){.external-link}:
    Permissions improvement API
    ([\#1720](https://github.com/ezsystems/ezpublish-kernel/pull/1720 "EZP-26057: Permissions API"){.external-link}) Implements
    a service and moves the API for permissions from the repository to
    that service
-   [EZP-26381](https://jira.ez.no/browse/EZP-26381){.external-link}:
    ContentViewBuilder will load the main location if none was asked
-   REST:
    -   [EZP-26179](https://jira.ez.no/browse/EZP-26179){.external-link}:
        Refactored session REST actions to resolve UI stability issue
        due to session loss
    -   Exposed “score” and “index” in REST SearchHits, e.g. &lt;<span
        class="pl-ent" style="color: rgb(99,163,92);">searchHit</span>
        <span class="pl-e"
        style="color: rgb(121,93,163);">score</span>=<span class="pl-s"
        style="color: rgb(24,54,145);"><span
        class="pl-pds">"</span>1.0<span class="pl-pds">"</span></span>
        <span class="pl-e"
        style="color: rgb(121,93,163);">index</span>=<span class="pl-s"
        style="color: rgb(24,54,145);"><span
        class="pl-pds">"</span>installid1234567890<span
        class="pl-pds">"</span></span>&gt;

    <!-- -->

    -   [EZP-26472](https://jira.ez.no/browse/EZP-26472){.external-link}:
        Added previous exception to the REST exception output
    -   [EZP-26326](https://jira.ez.no/browse/EZP-26326){.external-link}:
        Implemented “Filter” and “Query” REST Query parameters to be in
        sync with the PHP API
    -   Low-hanging-fruit: Made behat REST HTTP client use [standard
        HTTP
        verbs](http://restful-api-design.readthedocs.io/en/latest/methods.html){.external-link}
        for improved standards compliance

eZ Enterprise {#eZPlatformandeZEnterprisev1.6.0-eZEnterprise}
-------------

In eZ Enterprise, most of the new eZ Studio feature development is being
worked on in a branch for the next December release, with the **Form
Builder** as well as **Date-based Publishing** being the major features.
As a result, this release is mostly focused on consolidation and
stabilization of eZ Studio with a lot of bug fixes and enhancement
brought to the product.

<span style="color: rgb(0,98,147);font-size: 20.0px;">Demo Sites</span>

Beyond eZ Platform and eZ Studio, each release is built and shipped
together with our demo sites for both eZ Platform and eZ Studio. They
offer ways to test and see best practices on how to use the platform.
This time, since v1.5.1, we have a few noticeable improvement to the
demo site:

-   Selective rendering of “premium” content for registered end
    users only. Content is either rendered in full when the end user
    belongs to the “Members” group, or only as a teaser with a Register
    button:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Premium
content](attachments/32867909/32868026.png){.confluence-embedded-image
width="500"}</span>

-   Registering new users based on the new UGC framework introduced
    in v1.5.0. It is accessible through the `/register` route:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Registration
form](attachments/32867909/32868027.png){.confluence-embedded-image
width="400"}</span>

-   Authentication
-   Revamp and improvement of the integration of the Recommendation
    bundle:

<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![Recommended
articles in Studio
Demo](attachments/32867909/32868028.png){.confluence-embedded-image
width="700"}</span>

Other bugs have been fixed in the demo bundle data.

Full list of new features, improvements and bug fixes since v1.5.0 {#eZPlatformandeZEnterprisev1.6.0-Fulllistofnewfeatures,improvementsandbugfixessincev1.5.0}
==================================================================

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><h3 id="eZPlatformandeZEnterprisev1.6.0-eZPlatform.1">eZ Platform</h3></th>
<th align="left"><h3 id="eZPlatformandeZEnterprisev1.6.0-eZStudio">eZ Studio</h3></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><a href="https://github.com/ezsystems/ezplatform/releases/tag/v1.6.0" class="external-link">List of changes for final of eZ Platform v1.6.0 on Github</a></td>
<td align="left"><a href="https://github.com/ezsystems/ezstudio/releases/tag/v1.6.0" class="external-link">List of changes for final of eZ Studio v1.6.0 on Github</a></td>
</tr>
<tr class="even">
<td align="left"><a href="https://github.com/ezsystems/ezplatform/releases/tag/v1.6.0-rc1" class="external-link">List of changes for rc1 of eZ Platform v1.6.0 on Github</a></td>
<td align="left"><a href="https://github.com/ezsystems/ezstudio/releases/tag/v1.6.0-rc1" class="external-link">List of changes for rc1 for eZ Studio v1.6.0 on Github</a></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://github.com/ezsystems/ezplatform/releases/tag/v1.6.0-beta1" class="external-link">List of changes for beta1 of eZ Platform v1.6.0 on Github</a></td>
<td align="left"><a href="https://github.com/ezsystems/ezstudio/releases/tag/v1.6.0-beta1" class="external-link">List of changes for beta1 of eZ Studio v1.6.0 on Github</a></td>
</tr>
</tbody>
</table>

### Installation {#eZPlatformandeZEnterprisev1.6.0-Installation}

[Installation
Guide](https://doc.ez.no/display/DEVELOPER/Step+1%3A+Installation)

<span style="color: rgb(0,51,102);">[Technical
Requirements](31429536.html)</span>

### Download {#eZPlatformandeZEnterprisev1.6.0-Download}

#### eZ Platform {#eZPlatformandeZEnterprisev1.6.0-eZPlatform.2}

-   <span style="color: rgb(0,51,102);">Download at
    [eZPlatform.com](http://ezplatform.com/#download){.external-link}</span>

 

 

#### eZ Enterprise {#eZPlatformandeZEnterprisev1.6.0-eZEnterprise.1}

-   [Customers: eZ Enterprise subscription
    (BUL License)](https://support.ez.no/Downloads){.external-link}*<span>  
    </span>*
-   [Partners: Test & Trial software access
    (TTL License)](https://support.ez.no/Downloads){.external-link}

If you would like to request an eZ Enterprise Demo instance:
<http://ez.no/Forms/Discover-eZ-Studio>

 

### Updating {#eZPlatformandeZEnterprisev1.6.0-Updating}

**eZ Platform**: To update to this version, follow the [Updating eZ
Platform](https://doc.ez.no/display/DEVELOPER/Updating+eZ+Platform) guide
and use v1.6.0 as `<version>`.

 

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"}
[better\_udw.png](attachments/32867909/32868022.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[draft\_conflict\_screen.png](attachments/32867909/32868024.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[search.png](attachments/32867909/32868025.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[premium\_content.png](attachments/32867909/32868026.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[register.png](attachments/32867909/32868027.png) (image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[recommended\_articles.png](attachments/32867909/32868028.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [eZ Platform
1.6.0 in dev mode.png](attachments/32867909/32868320.png) (image/png)  

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


