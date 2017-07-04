1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Extending PlatformUI with new
    navigation](Extending-PlatformUI-with-new-navigation_31430235.html)</span>

<span id="title-text"> Developer : Conclusion </span> {#title-heading .pagetitle}
=====================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
May 13, 2016

Potential improvements and bugs {#Conclusion-Potentialimprovementsandbugs}
-------------------------------

We now have a basic interface but it already has some bugs and it could
be improved in a lots of ways. Here is a list of things that are left as
exercises:

-   Improve the look and feel and output: it’s partially of done in
    commit
    [13d5a0b2](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/commit/13d5a0b2f4d957425a751a2cc4cbd6566ed0b57a){.external-link}
    but can probably improved further.
-   Reload only the table, not the full view when filtering.
-   Sorting.
-   More filters, more columns, etc.
-   The server side code deserves to be refactored.
-   Unit tests.
-   **\[bug\]** Highlight is buggy in navigation because we have several
    routes while the navigation item added in [Configure the
    navigation](Configure-the-navigation_31430245.html) only recognizes
    the first route we add.
-   **\[bug\]** ‘eng-GB’ hardcoded when getting Content Type name.

Documentation pages to go further {#Conclusion-Documentationpagestogofurther}
---------------------------------

This tutorial talks and uses a lots of concepts coming from Symfony, eZ
Platform, PlatformUI itself or YUI. Here is a list of documentation
pages that are worth reading to completely understand what’s going on
behind the scenes:

### Symfony-related documentation pages {#Conclusion-Symfony-relateddocumentationpages}

-   From a Symfony point of view, in this tutorial we mainly wrote a
    controller and with the associated routing configuration, [the
    Controller book
    page](http://symfony.com/doc/current/book/controller.html){.external-link}
    is definitively the most important Symfony related page to read
-   We also defined a Controller as a service in this tutorial, this is
    detailed in [How to Define Controllers as
    Services](http://symfony.com/doc/current/cookbook/controller/service.html){.external-link}.
-   [Twig for Template
    Designers](http://twig.sensiolabs.org/doc/templates.html){.external-link}
    explains how to write Twig templates

### eZ Platform-related documentation pages {#Conclusion-eZPlatform-relateddocumentationpages}

-   The Public API is described in both the <span
    class="confluence-link"> </span> <span class="confluence-link">
    <span class="confluence-link"> [Public API basics
    page](Getting-started-with-the-Public-API_31430305.html) </span>
    </span> and in [the Public API
    Cookbook](Public-API-Guide_31430303.html).
-   For any usage beyond what is covered in those pages, you can refer
    to [the auto-generated API
    doc](http://apidoc.ez.no/sami/trunk/NS/html/index.html){.external-link}.
-   While extending PlatformUI, you’ll also have to work with the [REST
    API which has its own section in the
    documentation](REST-API-Guide_31430286.html).
-   There is also [an auto-generated API doc for the JavaScript REST
    Client](http://ezsystems.github.io/javascript-rest-client/){.external-link}.

### PlatformUI-related documentation pages {#Conclusion-PlatformUI-relateddocumentationpages}

-   [The PlatformUI technical
    introduction](https://doc.ez.no/display/DEVELOPER/Backend+interface)
    gives an overview of the architecture and explains some
    its concepts.
-   PlaformUI also has [an auto-generated API
    doc](http://ezsystems.github.io/platformui-javascript-api/){.external-link}.

### YUI-related documentation pages {#Conclusion-YUI-relateddocumentationpages}

The whole YUI documentation could be useful when working with
PlatformUI, but amongst others things here is a list of the most
important pages:

-   For the very low level foundations, the guides about
    [Attribute](http://yuilibrary.com/yui/docs/attribute/){.external-link}
    and [Base](http://yuilibrary.com/yui/docs/base/){.external-link}
    (almost everything in PlatformUI is YUI Base object with
    attributes),
    [EventTarget](http://yuilibrary.com/yui/docs/event-custom/){.external-link}
    (custom events) and
    [Plugin](http://yuilibrary.com/yui/docs/plugin/){.external-link}
    (for tweaking almost any PlatformUI components) can be very useful
-   A large part of the application is about manipulating the DOM and
    subscribing to DOM events, this is covered in the
    [Node](http://yuilibrary.com/yui/docs/node/){.external-link} and
    [DOM
    Events](http://yuilibrary.com/yui/docs/event/){.external-link} guides.
-   The PlatformUI Application is based on the YUI App Framework which
    itself is mainly described in [the App
    Framework](http://yuilibrary.com/yui/docs/app/){.external-link},
    [Router](http://yuilibrary.com/yui/docs/router/){.external-link} and
    [View](http://yuilibrary.com/yui/docs/view/){.external-link} guides.

**Tutorial path**

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


