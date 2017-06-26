1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Extending PlatformUI with new navigation](Extending-PlatformUI-with-new-navigation_31430235.html)</span>

<span id="title-text"> Developer : Conclusion </span>
=====================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on May 13, 2016

Potential improvements and bugs
-------------------------------

We now have a basic interface but it already has some bugs and it could be improved in a lots of ways. Here is a list of things that are left as exercises:

-   Improve the look and feel and output: it's partially of done in commit <a href="https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/commit/13d5a0b2f4d957425a751a2cc4cbd6566ed0b57a" class="external-link">13d5a0b2</a> but can probably improved further.
-   Reload only the table, not the full view when filtering.
-   Sorting.
-   More filters, more columns, etc.
-   The server side code deserves to be refactored.
-   Unit tests.
-   **\[bug\]** Highlight is buggy in navigation because we have several routes while the navigation item added in [Configure the navigation](Configure-the-navigation_31430245.html) only recognizes the first route we add.
-   **\[bug\]** 'eng-GB' hardcoded when getting Content Type name.

Documentation pages to go further
---------------------------------

This tutorial talks and uses a lots of concepts coming from Symfony, eZ Platform, PlatformUI itself or YUI. Here is a list of documentation pages that are worth reading to completely understand what's going on behind the scenes:

### Symfony-related documentation pages

-   From a Symfony point of view, in this tutorial we mainly wrote a controller and with the associated routing configuration, <a href="http://symfony.com/doc/current/book/controller.html" class="external-link">the Controller book page</a> is definitively the most important Symfony related page to read
-   We also defined a Controller as a service in this tutorial, this is detailed in <a href="http://symfony.com/doc/current/cookbook/controller/service.html" class="external-link">How to Define Controllers as Services</a>.
-   <a href="http://twig.sensiolabs.org/doc/templates.html" class="external-link">Twig for Template Designers</a> explains how to write Twig templates

### eZ Platform-related documentation pages

-   The Public API is described in both the <span class="confluence-link"> </span> <span class="confluence-link"> <span class="confluence-link"> [Public API basics page](Getting-started-with-the-Public-API_31430305.html) </span> </span> and in [the Public API Cookbook](Public-API-Guide_31430303.html).
-   For any usage beyond what is covered in those pages, you can refer to <a href="http://apidoc.ez.no/sami/trunk/NS/html/index.html" class="external-link">the auto-generated API doc</a>.
-   While extending PlatformUI, you'll also have to work with the [REST API which has its own section in the documentation](REST-API-Guide_31430286.html).
-   There is also <a href="http://ezsystems.github.io/javascript-rest-client/" class="external-link">an auto-generated API doc for the JavaScript REST Client</a>.

### PlatformUI-related documentation pages

-   [The PlatformUI technical introduction](https://doc.ez.no/display/DEVELOPER/Backend+interface) gives an overview of the architecture and explains some its concepts.
-   PlaformUI also has <a href="http://ezsystems.github.io/platformui-javascript-api/" class="external-link">an auto-generated API doc</a>.

### YUI-related documentation pages

The whole YUI documentation could be useful when working with PlatformUI, but amongst others things here is a list of the most important pages:

-   For the very low level foundations, the guides about <a href="http://yuilibrary.com/yui/docs/attribute/" class="external-link">Attribute</a> and <a href="http://yuilibrary.com/yui/docs/base/" class="external-link">Base</a> (almost everything in PlatformUI is YUI Base object with attributes), <a href="http://yuilibrary.com/yui/docs/event-custom/" class="external-link">EventTarget</a> (custom events) and <a href="http://yuilibrary.com/yui/docs/plugin/" class="external-link">Plugin</a> (for tweaking almost any PlatformUI components) can be very useful
-   A large part of the application is about manipulating the DOM and subscribing to DOM events, this is covered in the <a href="http://yuilibrary.com/yui/docs/node/" class="external-link">Node</a> and <a href="http://yuilibrary.com/yui/docs/event/" class="external-link">DOM Events</a> guides.
-   The PlatformUI Application is based on the YUI App Framework which itself is mainly described in <a href="http://yuilibrary.com/yui/docs/app/" class="external-link">the App Framework</a>, <a href="http://yuilibrary.com/yui/docs/router/" class="external-link">Router</a> and <a href="http://yuilibrary.com/yui/docs/view/" class="external-link">View</a> guides.

**Tutorial path**

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


