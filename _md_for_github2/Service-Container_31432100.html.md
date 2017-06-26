1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Service Container </span>
============================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last modified by <span class="editor"> Dominika Kurek</span> on Sep 27, 2016

Definition
==========

A service container, (aka **DIC**, *Dependency Injection Container*) is a special object that greatly facilitates dependencies resolution in your application and sits on <a href="http://en.wikipedia.org/wiki/Dependency_injection" class="external-link">Dependency Injection design pattern</a>. Basically, this design pattern proposes to inject all needed objects and configuration into your business logic objects (aka **services**). It avoids the massive use of singletons, global variables or complicated factories and thus makes your code much more readable and testable. It avoids "magic."

The main issue with dependency injection is how to resolve your dependencies for your services. This is where the service container comes into play. The role of a service container is to build and maintain your services and their dependencies. Basically, each time you need a service, you may ask the service container for it, which will either build it with the configuration you provided, or give you an existing instance if it is already available.

In eZ Platform
==============

eZ Platform uses <a href="http://symfony.com/doc/master/book/service_container.html" class="external-link">Symfony service container</a>.

It is very powerful and highly configurable. We encourage you to read its dedicated documentation as it will help you understand how eZ Platform services are made:

-   <a href="http://symfony.com/doc/master/book/service_container.html" class="external-link">Introduction and basic usage</a>
-   <a href="http://symfony.com/doc/master/components/dependency_injection/index.html" class="external-link">Full documentation of the Dependency Injection Component</a>
-   <a href="http://symfony.com/doc/master/cookbook/service_container/index.html" class="external-link">Cookbook</a>
-   <a href="http://symfony.com/doc/master/reference/dic_tags.html" class="external-link">Base service tags</a>

Service tags
------------

Service tags in Symfony DIC are a useful way of dedicating services to a specific purpose. They are usually used for extension points.

For instance, if you want to register a <a href="http://twig.sensiolabs.org/doc/advanced.html#creating-extensions" class="external-link">Twig extension</a> to add custom filters, you will need to create the PHP class and declare it as a service in the DIC configuration with the *twig.extension* tag (see <a href="http://symfony.com/doc/master/cookbook/templating/twig_extension.html" class="external-link">Symfony cookbook entry</a> for a full example).

eZ Platform exposes several features this way (see the list of core service tags). This is for example the case for Field Types.

You will find all service tags exposed by Symfony in <a href="http://symfony.com/doc/master/reference/dic_tags.html" class="external-link">its reference documentation</a>.

### Core & API

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Tag name</th>
<th align="left">Usage</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>router</code></p></td>
<td align="left">Adds a specific router to the chain router</td>
</tr>
<tr class="even">
<td align="left"><p><code>twig.loader</code></p></td>
<td align="left">Registers a template loader for twig</td>
</tr>
<tr class="odd">
<td align="left"><p><code>ezpublish.content_view_provider</code></p></td>
<td align="left">Registers a ContentViewProvider for template selection depending on content/Location being viewed</td>
</tr>
<tr class="even">
<td align="left"><p><code>ezpublish.storageEngine</code></p></td>
<td align="left">Registers a storage engine in the Repository factory</td>
</tr>
<tr class="odd">
<td align="left"><p><code>ezpublish.fieldType</code></p></td>
<td align="left">Registers a Field Type</td>
</tr>
</tbody>
</table>

### Legacy

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Tag name</th>
<th align="left">Usage</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>ezpublish.storageEngine.legacy.converter</code></p></td>
<td align="left">Registers a converter for a Field Type in legacy storage engine</td>
</tr>
<tr class="even">
<td align="left"><p><code>ezpublish.fieldType.externalStorageHandler</code></p></td>
<td align="left">Registers an external storage handler for a Field Type</td>
</tr>
<tr class="odd">
<td align="left"><p><code>ezpublish.fieldType.externalStorageHandler.gateway</code></p></td>
<td align="left">Registers an external storage gateway for a Field Type in legacy storage engine</td>
</tr>
</tbody>
</table>

 

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


