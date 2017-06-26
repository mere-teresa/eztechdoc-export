1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Content Rendering </span> {#title-heading .pagetitle}
============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Feb 23, 2017

Introduction {#ContentRendering-Introduction}
============

The ViewController {#ContentRendering-TheViewController}
------------------

eZ Platform comes with a native controller to display your content,
known as the **`ViewController`** . It is called each time you try to
reach a Content item from its **Url Alias** (human
readable, translatable URI generated for any content based on URL
patterns defined per Content Type). It is able to render any content
created in the admin interface or via the [Public API
Guide](Public-API-Guide_31430303.html).

It can also be called straight by its direct URI: 

`/view/content/<contentId>/full/true/<locationId>`

` /view/content/<contentId>`

A Content item can also have different **view types** (full page,
abstract in a list, block in a landing page, etc.). By default the view
type is **full** (for full page), but it can be anything (*line*,
*block, etc*.).

Configuration {#ContentRendering-Configuration}
=============

View provider configuration {#ContentRendering-Viewproviderconfiguration}
---------------------------

The **configured ViewProvider** allows you to configure template
selection when using the `ViewController`, either directly from a URL or
via a sub-request.

eZ Publish 4.x terminology

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
In eZ Publish 4.x, it was known as **template override system *by
configuration*** (`override.ini`).  
However this only reflects old overrides for `node/view/*.tpl` and
`content/view/*.tpl`.

### Principle {#ContentRendering-Principle}

The **configured ViewProvider** takes its configuration from your
siteaccess in the `           content_view         ` <span>
section</span>. This configuration is a hash built in the following way:

**app/config/ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        # Can be a valid siteaccess, siteaccess group or even "global"
        front_siteaccess:
            # Configuring the ViewProvider
            content_view:
                # The view type (full/line are standard, but you can use custom ones)
                full:
                    # A simple unique key for your matching ruleset
                    folderRuleset:
                        # The template identifier to load, following the Symfony bundle notation for templates
                        # See http://symfony.com/doc/current/book/controller.html#rendering-templates
                        template: eZDemoBundle:full:small_folder.html.twig
                        # Hash of matchers to use, with their corresponding values to match against
                        match:
                            # Key is the matcher "identifier" (class name or service identifier)
                            # Value will be passed to the matcher's setMatchingConfig() method.
                            Identifier\ContentType: [small_folder, folder]
~~~~

Important note about template matching

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
**Template matching will NOT work if your content contains a Field Type
that is not supported by the repository**. It can be the case when you
are in the process of migrating from eZ Publish 4.x, where custom
datatypes have been developed.

In this case the repository will throw an exception, which is caught in
the `ViewController`, <span>and *if* you are using LegacyBridge it will
end up doing a </span> [**<span class="confluence-link">fallback to
legacy
kernel</span>**](https://doc.ez.no/display/EZP/Legacy+template+fallback).

The list of Field Types supported out of the box [is available
here](Field-Types-reference_31430495.html).

Tip

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You can define your template selection rules in a different
configuration file. <span class="confluence-link"> [Read the cookbook
recipe to learn more about
it](Importing-settings-from-a-bundle_31429803.html) </span>.

<span>You can also </span> <span class="confluence-link"> <span> <span
class="confluence-link"> [use your own custom controller to render a
content/location](#ContentRendering-Customcontrollers) </span> </span>
</span> <span>.</span>

#### Deprecated `location_view         ` {#ContentRendering-Deprecatedlocation_view}

Until eZ Publish Platform 5.4, the main view action was `location_view`.
This is deprecated since eZ Platform 15.12 (1.0). Only `content_view`
should be used to view content, with a location as an option.

Existing `location_view` rules will be, *when possible*, converted
transparently to `content_view`, with a deprecation notice. However, it
is not possible to do so when the rule uses a custom controller.  
In any case, `location_view` rules should be converted to `content_view`
ones, as `location_view` will be removed in the next kernel major
version.

View Matchers {#ContentRendering-ViewMatchers}
-------------

To be able to select the right templates for the right conditions, the
view provider uses matcher objects which implement the
`eZ\Publish\Core\MVC\Symfony\View\ContentViewProvider\Configured\Matcher`
interface.

#### Matcher identifier {#ContentRendering-Matcheridentifier}

The matcher identifier can comply to 3 different formats:

1.  **Relative qualified class name** (e.g. `Identifier\ContentType`).
    This is the most common case and used for native matchers. It will
    then be relative
    to `eZ\Publish\Core\MVC\Symfony\Matcher\ContentBased`.
2.  **Full qualified class name** (e.g. `\Foo\Bar\MyMatcher`). This is a
    way to specify a **custom matcher** that doesn’t need specific
    dependency injection. Please note that it **must** start with a `\`.
3.  **Service identifier**, as defined in Symfony service container.
    This is the way to specify a more **complex custom matcher** that
    has dependencies.

Injecting the Repository

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If your matcher needs the repository, simply make it implement
`eZ\Publish\Core\MVC\RepositoryAwareInterface` or extend the
`eZ\Publish\Core\MVC\RepositoryAware` abstract class. The repository
will then be correctly injected before matching.

#### Matcher value {#ContentRendering-Matchervalue}

The value associated with the matcher is being passed to
its `setMatchingConfig()` method. It can be anything that is supported
by the matcher.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Native matchers support both **scalar values** or **arrays of scalar
values**. Passing an array amounts to applying a logical OR.

#### Combining matchers {#ContentRendering-Combiningmatchers}

It is possible to combine multiple matchers:

~~~~ brush:
# ...
match:
    Identifier\ContentType: [small_folder, folder]
    Identifier\ParentContentType: frontpage
~~~~

The example above can be translated as "Match any content whose
**ContentType** identifier is ***small\_folder* OR *folder*** , **AND**
having *frontpage* as **ParentContentType** identifier".

### <span id="ContentRendering-Available_matchers" class="confluence-anchor-link"></span>Available matchers {#ContentRendering-Available_matchersAvailablematchers}

The following table presents all native matchers.

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Identifier</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>Id\Content</code></td>
<td align="left">Matches the ID number of the Content item.</td>
</tr>
<tr class="even">
<td align="left"><code>Id\ContentType</code></td>
<td align="left">Matches the ID number of the Content Type that the Content item is an instance of.</td>
</tr>
<tr class="odd">
<td align="left"><code>Id\ContentTypeGroup</code></td>
<td align="left"><span>Matches the ID number of the group containing the Content Type that the Content item is an instance of.<br />
</span></td>
</tr>
<tr class="even">
<td align="left"><code>Id\Location</code></td>
<td align="left">Matches the ID number of a Location.<br />
<em>In the case of a Content item, matched against the main location.</em></td>
</tr>
<tr class="odd">
<td align="left"><code>Id\ParentContentType</code></td>
<td align="left">Matches the ID number of the parent Content Type.<br />
<em>In the case of a Content item, matched against the main location.</em></td>
</tr>
<tr class="even">
<td align="left"><code>Id\ParentLocation</code></td>
<td align="left"><p>Matches the ID number of the parent Location.<br />
<em>In the case of a Content item, matched against the main location.</em></p></td>
</tr>
<tr class="odd">
<td align="left"><code>Id\Remote</code></td>
<td align="left">Matches the remoteId of either content or Location, depending on the object matched.</td>
</tr>
<tr class="even">
<td align="left"><code>Id\Section</code></td>
<td align="left">Matches the ID number of the Section that the Content item belongs to.</td>
</tr>
<tr class="odd">
<td align="left"><code>Id\State</code></td>
<td align="left"><em>Not supported yet.</em></td>
</tr>
<tr class="even">
<td align="left"><code>Identifier\ContentType</code></td>
<td align="left"><span>Matches the identifier of the Content Type that the Content item is an instance of.</span></td>
</tr>
<tr class="odd">
<td align="left"><code>Identifier\ParentContentType</code></td>
<td align="left"><p><span>Matches the identifier of the parent Content Type.<br />
<em>In the case of a Content item, matched against the main Location.</em> </span></p></td>
</tr>
<tr class="even">
<td align="left"><code>Identifier\Section</code></td>
<td align="left">Matches the identifier of the Section that the Content item belongs to.</td>
</tr>
<tr class="odd">
<td align="left"><code>Identifier\State</code></td>
<td align="left"><em>Not supported yet.</em></td>
</tr>
<tr class="even">
<td align="left"><code>Depth</code></td>
<td align="left"><span>Matches the depth of the Location. The depth of a top level Location is 1.</span></td>
</tr>
<tr class="odd">
<td align="left"><code>UrlAlias</code></td>
<td align="left"><p><span>Matches the virtual URL of the Location (i.e. <code>/My/Content-Uri</code>).</span></p>
<p><span> <strong>Important: Matches when the UrlAlias of the location starts with the value passed.</strong><br />
<em>Not supported for Content (aka content_view).</em> </span></p></td>
</tr>
</tbody>
</table>

<span class="confluence-link">Default view templates</span> {#ContentRendering-Defaultviewtemplates}
-----------------------------------------------------------

<span class="confluence-link">Content view</span> uses default templates
to render content unless custom view rules are used.

Those templates can be customized by means of container- and
siteaccess-aware parameters.

### Overriding the default template for common view types {#ContentRendering-Overridingthedefaulttemplateforcommonviewtypes}

Templates for the most common view types (content/full, line, embed, or
block) can be customized by setting one
the `ezplatform.default.content_view_templates` variables:

| Controller                                              | ViewType | Parameter                                         | Default value                                           |
|---------------------------------------------------------|----------|---------------------------------------------------|---------------------------------------------------------|
| `ez_content:viewAction`                                 | `full`   | `ezplatform.default_view_templates.content.full`  | `"EzPublishCoreBundle:default:content/full.html.twig"`  |
| `                 ez_content:viewAction               ` | `line`   | `ezplatform.default_view_templates.content.line`  | `"EzPublishCoreBundle:default:content/line.html.twig"`  |
| `                 ez_content:viewAction               ` | `embed`  | `ezplatform.default_view_templates.content.embed` | `"EzPublishCoreBundle:default:content/embed.html.twig"` |
| `ez_page:viewAction`                                    | `n/a`    | `ezplatform.default_view_templates.block`         | `"EzPublishCoreBundle:default:block/block.html.twig"`   |

#### Example {#ContentRendering-Example}

Add this configuration to `app/config/config.yml` to use
`app/Resources/content/view/full.html.twig` as the default template when
viewing Content with the `full` view type:

~~~~ brush:
parameters:
    ezplatform.default_view_templates.content.full: "content/view/full.html.twig"
~~~~

### Customizing the default controller {#ContentRendering-Customizingthedefaultcontroller}

The controller used to render content by default can also be changed.
The `ezsettings.default.content_view_defaults` container parameter
contains a hash that defines how content is rendered by default. It
contains a set of classic [content view rules for the common view
types](https://github.com/ezsystems/ezpublish-kernel/blob/v6.0.0/eZ/Bundle/EzPublishCoreBundle/Resources/config/default_settings.yml#L21-L33){.external-link}.
This hash can be redefined to whatever suits your requirements,
including custom controllers, or even matchers.

Usage {#ContentRendering-Usage}
=====

Content view templates {#ContentRendering-Contentviewtemplates}
----------------------

A content view template is like any other template, with several
specific aspects.

### <span id="ContentRendering-Availablevariables" class="confluence-anchor-link"></span>Available variables {#ContentRendering-AvailablevariablesAvailablevariables}

| Variable name                                    | Type                                                                                                                                                                                 | Description                                                                                                                                                                                                  |
|--------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **`location`**                                   | [eZ\\Publish\\Core\\Repository\\Values\\Content\\Location](https://github.com/ezsystems/ezp-next/blob/master/eZ/Publish/Core/Repository/Values/Content/Location.php){.external-link} | The Location object. Contains meta information on the content ([ContentInfo](https://github.com/ezsystems/ezp-next/blob/master/eZ/Publish/Core/Repository/Values/Content/ContentInfo.php){.external-link})   
                                                                                                                                                                                                                                           (only when accessing a Location)                                                                                                                                                                              |
| `                 content               `        | [eZ\\Publish\\Core\\Repository\\Values\\Content\\Content](https://github.com/ezsystems/ezp-next/blob/master/eZ/Publish/Core/Repository/Values/Content/Content.php){.external-link}   | The Content item, containing all Fields and version information ([VersionInfo](https://github.com/ezsystems/ezp-next/blob/master/eZ/Publish/Core/Repository/Values/Content/VersionInfo.php){.external-link}) |
| `                 noLayout               `       | Boolean                                                                                                                                                                              | If true, indicates if the Content item/Location is to be displayed without any pagelayout (i.e. AJAX, sub-requests, etc.).                                                                                   
                                                                                                                                                                                                                                           It’s generally `false` when displaying a Content item in view type **full**.                                                                                                                                  |
| `                 viewBaseLayout               ` | String                                                                                                                                                                               | The base layout template to use when the view is requested to be generated outside of the pagelayout (when `noLayout` is true).                                                                              |

### Template inheritance and sub-requests {#ContentRendering-Templateinheritanceandsub-requests}

Like any template, a content view template can use [template
inheritance](http://symfony.com/doc/current/book/templating.html#template-inheritance-and-layouts){.external-link}. However
keep in mind that your content may be also requested via
[sub-requests](http://symfony.com/doc/current/book/templating.html#embedding-controllers){.external-link}
(see below how to render [embedded content
items](#ContentRendering-EmbeddingContentitems)), in which case you
probably don’t want the global layout to be used.

If you use different templates for embedded content views, this should
not be a problem. If you’d rather use the same template, you can use an
extra `noLayout` view parameter for the sub-request, and conditionally
extend an empty pagelayout:

~~~~ brush:
{% extends noLayout ? viewbaseLayout : "AcmeDemoBundle::pagelayout.html.twig" %}

{% block content %}
...
{% endblock %}
~~~~

Content and Location view providers {#ContentRendering-ContentandLocationviewproviders}
-----------------------------------

### View\\Manager & View\\Provider {#ContentRendering-View\Manager&View\Provider}

The role of the
`           (eZ\Publish\Core\MVC\Symfony\)View\Manager         ` is to
select the right template for displaying a given Content item or
Location. It aggregates objects called *Content and Location view
providers* which respectively implement the
`eZ\Publish\Core\MVC\Symfony\View\Provider\Content` and
`eZ\Publish\Core\MVC\Symfony\View\Provider\Location` interfaces.

Each time a content item is to be displayed through the
`Content\ViewController`, the `View\Manager` iterates over the
registered Content or Location `View\Provider` objects and calls
`getView` `()`.

#### Provided View\\Provider implementations {#ContentRendering-ProvidedView\Providerimplementations}

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Usage</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>                  View provider configuration                </code></td>
<td align="left"><p>Based on application configuration.<br />
Formerly known as <em>Template override system</em>.</p></td>
</tr>
<tr class="even">
<td align="left"><p><code>eZ\Publish\Core\MVC\Legacy\View\Provider\Content</code></p>
<p><code>eZ\Publish\Core\MVC\Legacy\View\Provider\Location</code></p></td>
<td align="left"><p>Forwards view selection to the legacy kernel by running the old content/view module.<br />
Pagelayout used is the one configured in <code>ezpublish_legacy.&lt;scope&gt;.view_default_layout</code>.<br />
For more details about the <code>&lt;scope&gt;</code> please refer to the <a href="https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Configuration">scope configuration</a> documentation.</p></td>
</tr>
</tbody>
</table>

### Custom View\\Provider {#ContentRendering-CustomView\Provider}

#### Difference between `View\Provider\Location` and `View\Provider\Content` {#ContentRendering-DifferencebetweenView\Provider\LocationandView\Provider\Content}

-   A `View\Provider\Location` only deals with `Location` objects and
    implements
    `eZ\Publish\Core\MVC\Symfony\View\Provider\Location` interface.
-   A `View\Provider\Content` only deals with `ContentInfo` objects and
    implements
    `eZ\Publish\Core\MVC\Symfony\View\Provider\Content` interface.

#### When to develop a custom `View\Provider\(Location|Content)` {#ContentRendering-WhentodevelopacustomView\Provider\(Location|Content)}

-   You want a custom template selection based on a very specific state
    of your application
-   You depend on external resources for view selection
-   You want to override the default one (based on configuration) for
    some reason

`View\Provider` objects need to be properly registered in the service
container with the
`           ezpublish.location_view_provider         ` or
`           ezpublish.content_view_provider         ` service tag.

~~~~ brush:
parameters:
    acme.location_view_provider.class: Acme\DemoBundle\Content\MyLocationViewProvider

services:
    acme.location_view_provider:
        class: %ezdemo.location_view_provider.class%
        tags:
            - {name: ezpublish.location_view_provider, priority: 30}
~~~~

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Tag attribute name</th>
<th align="left">Usage</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">priority</td>
<td align="left"><p>An integer giving the priority to the <code>                   View\Provider\(Content|Location)                 </code> in the <code>View\Manager</code>.</p>
<p>The priority range is <strong>from -255 to 255</strong></p></td>
</tr>
</tbody>
</table>

#### Example {#ContentRendering-Example.1}

**Custom View\\Provider\\Location**

~~~~ brush:
<?php

namespace Acme\DemoBundle\Content;

use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use eZ\Publish\Core\MVC\Symfony\View\Provider\Location as LocationViewProvider;
use eZ\Publish\API\Repository\Values\Content\Location;

class MyLocationViewProvider implements LocationViewProvider
{
    /**
     * Returns a ContentView object corresponding to $location, or void if not applicable
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location
     * @param string $viewType
     * @return \eZ\Publish\Core\MVC\Symfony\View\ContentView|null
     */
    public function getView( Location $location, $viewType )
    {
        // Let's check location Id
        switch ( $location->id )
        {
            // Special template for home page, passing "foo" variable to the template
            case 2:
                return new ContentView( "AcmeDemoBundle:$viewType:home.html.twig", array( 'foo' => 'bar' ) );
        }
 
        // ContentType identifier (formerly "class identifier")
        switch ( $location->contentInfo->contentType->identifier )
        {
            // For view full, it will load AcmeDemoBundle:full:small_folder.html.twig
            case 'folder':
                return new ContentView( "AcmeDemoBundle:$viewType:small_folder.html.twig" );
        }
    }
}
~~~~

<span style="color: rgb(0,98,147);">Rendering Content items  
</span> {#ContentRendering-RenderingContentitems}
-------------------------------------------------------------

### <span style="color: rgb(0,98,147);">Content item Fields</span> {#ContentRendering-ContentitemFields}

As stated above, a view template receives the requested Content item,
holding all Fields.

In order to display the Fields’ value the way you want, you can either
manipulate the Field Value object itself, or use a custom template.

#### Getting raw Field value {#ContentRendering-GettingrawFieldvalue}

Having access to the Content item in the template, you can use [its
public
methods](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/Core/Repository/Values/Content/Content.php){.external-link}
to access all the information you need. You can also use
the **ez\_field\_value** helper to get the <span
class="confluence-link"> [field’s value
only](Field-Types-reference_31430495.html)</span>. It will return the
correct language if there are several, based on language priorities.

~~~~ brush:
{# With the following, myFieldValue will be in the Content item's main language, regardless of the current language #}
{% set myFieldValue = content.getFieldValue( 'some_field_identifier' ) %}
 
{# Here myTranslatedFieldValue will be in the current language if a translation is available. If not, the Content item's main language will be used #}
{% set myTranslatedFieldValue = ez_field_value( content, 'some_field_identifier' ) %}
~~~~

#### Using the Field Type’s template block {#ContentRendering-UsingtheFieldType'stemplateblock}

All built-in Field Types come with [their own Twig
template](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig){.external-link}. You
can render any Field using this default template using
the `ez_render_field()` helper.

~~~~ brush:
{{ ez_render_field( content, 'some_field_identifier' ) }}
~~~~

Refer to [<span
class="confluence-link">ez\_render\_field</span>](#ContentRendering-ez_render_field)<span
class="confluence-link"> </span> for further information.

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
As this makes use of reusable templates, **using `ez_render_field()` is
the recommended way and is to be considered the best practice**.

### Content name {#ContentRendering-Contentname}

The **name** of a Content item is its generic “title”, generated by the
repository based on the Content Type’s naming pattern. It often takes
the form of a normalized value of the first field, but might be a
concatenation of several fields. There are 2 different ways to access
this special property:

-   Through the name property of ContentInfo (not translated).
-   Through VersionInfo with the TranslationHelper (translated).

#### Translated name {#ContentRendering-Translatedname}

<span>The *translated name* is held in a `VersionInfo` object, in the
names property which consists of hash indexed by locale. You can easily
retrieve it in the right language via
the `TranslationHelper` service.</span>

~~~~ brush:
<h2>Translated content name: {{ ez_content_name( content ) }}</h2>
<h3>Also works from ContentInfo: {{ ez_content_name( content.contentInfo ) }}</h3>
~~~~

The helper will by default follow the prioritized languages order. If
there is no translation for your prioritized languages, the helper will
always return the name in the main language.

You can also **force a locale** in a second argument:

~~~~ brush:
{# Force fre-FR locale. #}
<h2>{{ ez_content_name( content, 'fre-FR' ) }}</h2>
~~~~

#### Name property in ContentInfo {#ContentRendering-NamepropertyinContentInfo}

This property is the actual content name, but **in main language only**
(so it is not translated).

~~~~ brush:
<h2>Content name: {{ content.contentInfo.name }}</h2>
~~~~

~~~~ brush:
$contentName = $content->contentInfo->name;
~~~~

#### <span>Exposing additional variables</span> {#ContentRendering-Exposingadditionalvariables}

It is possible to expose additional variables in a content view
template. See<span class="confluence-link"> [parameters injection in
content
views](Injecting-parameters-in-content-views_31430331.html)</span>.

Embedding images {#ContentRendering-Embeddingimages}
----------------

<span class="status-macro aui-lozenge aui-lozenge-current">V1.4</span>

The Rich Text Field allows you to embed other Content items within the
Field.

Content items that are identified as images will be rendered in the Rich
Text Field using a dedicated template.

You can determine which Content Types will be treated as images and
rendered using this template in the
`ezplatform.content_view.image_embed_content_types_identifiers`
parameter. By default it is set to cover the Image Content Type, but you
can add other types that you want to be treated as images, for example:

~~~~ brush:
parameters:
    ezplatform.content_view.image_embed_content_types_identifiers: ['image', 'photo', 'banner']
~~~~

The template used when rendering embedded images can be set in the
`ezplatform.default_view_templates.content.embed_image` container
parameter:

~~~~ brush:
parameters:
    ezplatform.default_view_templates.content.embed_image: 'content/view/embed/image.html.twig
~~~~

Adding Links {#ContentRendering-AddingLinks}
------------

### Links to other Locations {#ContentRendering-LinkstootherLocations}

Linking to other locations is fairly easy and is done with a
[native `path()` Twig
helper](http://symfony.com/doc/2.3/book/templating.html#linking-to-pages){.external-link}
(or `url()` if you want to generate absolute URLs). You just have to
pass it the Location object and `path()` will generate the URLAlias for
you.

~~~~ brush:
{# Assuming "location" variable is a valid eZ\Publish\API\Repository\Values\Content\Location object #}
<a href="{{ path( location ) }}">Some link to a location</a>
~~~~

If you don’t have the Location object, but only its ID, you can generate
the URLAlias the following way:

~~~~ brush:
<a href="{{ path( "ez_urlalias", {"locationId": 123} ) }}">Some link to a location, with its Id only</a>
~~~~

You can also use the Content ID. In that case the generated link will
point to the Content item’s main Location.

~~~~ brush:
<a href="{{ path( "ez_urlalias", {"contentId": 456} ) }}">Some link from a contentId</a>
~~~~

Under the hood

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
In the backend, `path()` uses the Router to generate links.

This makes it also easy to generate links from PHP, via the `router`
service.

See also: [Cross-siteaccess
links](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Cross-siteacesslinks)

Embedding Content items {#ContentRendering-EmbeddingContentitems}
-----------------------

Rendering an embedded content from a Twig template is pretty
straightforward as you just need to **do a subrequest with `ez_content`
controller**.

### Using `ez_content` controller {#ContentRendering-Usingez_contentcontroller}

This controller is exactly the same as [the ViewController presented
above](#ContentRendering-TheViewController). It has one
main `viewAction`, that renders a Content item.

You can use this controller from templates with the following syntax:

~~~~ brush:
{{ render(controller("ez_content:viewAction", {"contentId": 123, "viewType": "line"})) }}
~~~~

The example above renders the Content item whose ID is **123** with the
view type **line**.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Reference of `ez_content` controller follows the syntax of *controllers
as a service*, [as explained in Symfony
documentation](http://symfony.com/doc/current/cookbook/controller/service.html){.external-link}.

#### Available arguments {#ContentRendering-Availablearguments}

As with any controller, you can pass arguments to
`ez_content:viewLocation` or `ez_content:viewContent` to fit your needs.

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Description</th>
<th align="left">Type</th>
<th align="left">Default value</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>contentId</code></td>
<td align="left"><p>ID of the Content item you want to render.<br />
<strong>Only for <code>ez_content:viewContent</code></strong>  </p></td>
<td align="left">integer</td>
<td align="left">N/A</td>
</tr>
<tr class="even">
<td align="left"><code>locationId</code></td>
<td align="left">ID of the Location you want to render.<br />
<strong>Only for <code>ez_content:viewLocation</code></strong>  </td>
<td align="left">integer</td>
<td align="left">Content item’s main location, if defined</td>
</tr>
<tr class="odd">
<td align="left"><code>viewType</code></td>
<td align="left"><p>The view type you want to render your Content item/Location in.<br />
Will be used by the ViewManager to select a corresponding template, according to defined rules. </p>
<p>Example: full, line, my_custom_view, etc.</p></td>
<td align="left">string</td>
<td align="left">full</td>
</tr>
<tr class="even">
<td align="left"><code>layout</code></td>
<td align="left"><p>Indicates if the sub-view needs to use the main layout (see<span class="confluence-link"> </span> <a href="#ContentRendering-Availablevariables"><span class="confluence-link">available variables in a view template</span></a>)</p>
<p> </p></td>
<td align="left">boolean</td>
<td align="left">false</td>
</tr>
<tr class="odd">
<td align="left"><code>params</code></td>
<td align="left"><p>Hash of variables you want to inject to sub-template, key being the exposed variable name.</p>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
<pre class="brush: php; gutter: false; theme: Eclipse" style="font-size:12px;"><code>{{ render(
      controller( 
          &quot;ez_content:viewAction&quot;, 
          {
              &quot;contentId&quot;: 123,
              &quot;viewType&quot;: &quot;line&quot;,
              &quot;params&quot;: { &quot;some_variable&quot;: &quot;some_value&quot; }
          }
      )
) }}</code></pre>
</div>
</div></td>
<td align="left">hash</td>
<td align="left">empty hash</td>
</tr>
</tbody>
</table>

<span class="js-issue-title">Rendering blocks</span> {#ContentRendering-Renderingblocks .gh-header-title}
----------------------------------------------------

You can specify which controller will be called for a specific block
view match, much like defining custom controllers for location view or
content view match.

Also, since there are two possible actions with which one can view a
block: `ez_page:viewBlock` and `ez_page:viewBlockById`, it is possible
to specify a controller action with a signature matching either one of
the original actions.

Example of configuration in `app/config/ezplatform.yml`:

~~~~ brush:
ezpublish:
    system:
        eng_frontend_group:
            block_view:
                ContentGrid:
                    template: NetgenSiteBundle:block:content_grid.html.twig
                    controller: NetgenSiteBundle:Block:viewContentGridBlock
                    match:
                        Type: ContentGrid
~~~~

Binary and Media download {#ContentRendering-BinaryandMediadownload}
-------------------------

Unlike image files, files stored in BinaryFile or Media Fields may be
limited to certain User Roles. As such, they are not publicly
downloadable from disk, and are instead served by Symfony, using a
custom route that runs the necessary checks. This route is automatically
generated as the `url` property for those Fields values.

### The content/download route {#ContentRendering-Thecontent/downloadroute}

The route follows this
pattern: `/content/download/{contentId}/{fieldIdentifier}/{filename}`. Example: `/content/download/68/file/My-file.pdf.`

It also accepts optional query parameters:

-   `version`: <span>the version number that the file must be
    downloaded for. Requires the versionview permission. If not
    specified, the published version is used.</span>
-   `inLanguage`: <span>The language the file should be downloaded in.
    If not specified, the most prioritized language for the siteaccess
    will be used.</span>

The [<span
class="confluence-link">ez\_render\_field</span>](#ContentRendering-ez_render_field)
<span class="confluence-link"> </span>twig helper will by default
generate a working link.

#### REST API: The `uri` property contains a valid download URL {#ContentRendering-RESTAPI:TheuripropertycontainsavaliddownloadURL}

The `uri` property of Binary Fields in REST contain a valid URL, of the
same format as the Public API, prefixed with the same host as the REST
Request.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For [<span class="confluence-link">more information about REST
API</span> see the documentation](REST-API-Guide_31430286.html).

[]()Custom controllers {#ContentRendering-Customcontrollers}
----------------------

In some cases, displaying a Content item/Location via the built-in
`ViewController` is not sufficient to show everything you want. In such
cases you may want to **use your own custom controller** to display the
current Content item/Location instead.

Typical use cases include access to:

-   Settings (coming from `ConfigResolver` or `ServiceContainer`)
-   Current Content item’s `ContentType` object
-   Current Location’s parent
-   Current Location’s children count
-   Main Location and alternative Locations for the current Content item
-   etc.

There are three ways in which you can apply a custom controller:

-   Configure a custom controller alongside regular matcher rules to use
    **both** your custom controller and the
    `ViewController` (recommended).
-   **Override** the built-in `ViewController` with the custom
    controller in a specific situation.
-   **Replace** the `ViewController` with the custom controller for the
    whole bundle.

### Enriching ViewController with a custom controller {#ContentRendering-EnrichingViewControllerwithacustomcontroller}

**This is the recommended way of using a custom controller**

To use your custom controller on top of the built-in `ViewController`
you need to point to both the controller and the template in the
configuration, for example:

**ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        default:
            content_view:
                full:
                    article:
                        controller: AcmeTestBundle:Default:articleViewEnhanced
                        template: AcmeTestBundle:full:article.html.twig
                        match:
                            Identifier\ContentType: [article]
~~~~

With this configuration, the following controller will forward the
request to the built-in `ViewController` with some additional
parameters:

**Controller**

~~~~ brush:
<?php

namespace Acme\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class DefaultController extends Controller
{
    public function articleViewEnhancedAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        // Add custom parameters to existing ones.
        $params += array( 'myCustomVariable' => "Hey, I'm a custom message!" );
        // Forward the request to the original ViewController
        // And get the response. Possibly alter it (here we change the smax-age for cache).
        $response = $this->get( 'ez_content' )->viewLocation( $locationId, $viewType, $layout, $params );
        $response->setSharedMaxAge( 600 );

        return $response;
    }
}
~~~~

Always ensure that you add new parameters to existing `$params`
associative array using [**`+`** union
operator](http://php.net/manual/en/language.operators.array.php){.external-link}
or `array_merge()`. **Not doing so (e.g. only passing your custom
parameters array) can result in unexpected issues with content
preview**. Previewed content and other parameters are indeed passed in
`$params`.

These parameters can then be used in templates, for example:

**article.html.twig**

~~~~ brush:
{% extends noLayout ? viewbaseLayout : "eZDemoBundle::pagelayout.html.twig" %}

{% block content %}
    <h1>{{ ez_render_field( content, 'title' ) }}</h1>
    <h2>{{ myCustomVariable }}</h2>
    {{ ez_render_field( content, 'body' ) }}
{% endblock %}
~~~~

### Using only your custom controller {#ContentRendering-Usingonlyyourcustomcontroller}

If you want to apply only your custom controller in a given match
situation and not use the `ViewController` at all, in the configuration
you need to indicate the controller, but no template, for example:

**ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        default:
            content_view:
                full:
                    folder:
                        controller: AcmeTestBundle:Default:viewFolder
                        match:
                            Identifier\ContentType: [folder]
                            Identifier\Section: [standard]
~~~~

In this example, as the `ViewController` is not applied, the custom
controller takes care of the whole process of displaying content,
including pointing to the template to be used (in this case,
`AcmeTestBundle::custom_controller_folder.html.twig`):

**Controller**

~~~~ brush:
<?php

namespace Acme\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class DefaultController extends Controller
{
    public function viewFolderAction( $locationId, $layout = false, $params = array() )
    {
        $repository = $this->getRepository();
        $location = $repository->getLocationService()->loadLocation( $locationId );
        // Check if content is not already passed. Can be the case when using content preview.
        $content = isset( $params['content'] ) ? $params['content'] : $repository->getContentService()->loadContentByContentInfo( $location->getContentInfo() )
        $response = new Response();
        $response->headers->set( 'X-Location-Id', $locationId );
        // Caching for 1h and make the cache vary on user hash
        $response->setSharedMaxAge( 3600 );
        $response->setVary( 'X-User-Hash' );
        return $this->render(
            'AcmeTestBundle::custom_controller_folder.html.twig',
            array(
                'location' => $location,
                'content' => $content,
                'foo' => 'Hey world!!!',
                'osTypes' => array( 'osx', 'linux', 'windows' )
            ) + $params
        );
    }
}
~~~~

Here again custom parameters can be used in the template, e.g.:

**custom\_controller\_folder.html.twig**

~~~~ brush:
{% extends "eZDemoBundle::pagelayout.html.twig" %}

{% block content %}
<h1>{{ ez_render_field( content, 'title' ) }}</h1>
    <h1>{{ foo }}</h1>
    <ul>
    {% for os in osTypes %}
        <li>{{ os }}</li>
    {% endfor %}
    </ul>
{% endblock %}
~~~~

### Overriding the built-in ViewController {#ContentRendering-Overridingthebuilt-inViewController}

One other way to keep control of what is passed to the view is to use
your own controller instead of the built-in `ViewController`. As base
`ViewController` is defined as a service, with a service alias, this can
be easily achieved from your bundle’s configuration:

~~~~ brush:
parameters:
    my.custom.view_controller.class: Acme\TestBundle\MyViewController

services:
    my.custom.view_controller:
        class: %my.custom.view_controller.class%
        arguments: [@some_dependency, @other_dependency]

    # Change the alias here and make it point to your own controller
    ez_content:
        alias: my.custom.view_controller
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
Doing so will completely override the built-in `ViewController`! Use
this at your own risk!

### Custom controller structure {#ContentRendering-Customcontrollerstructure}

Your custom controller can be any kind of [controller supported by
Symfony](http://symfony.com/doc/current/book/page_creation.html#step-2-create-the-controller){.external-link}
(including [controllers as a
service](http://symfony.com/doc/current/cookbook/controller/service.html){.external-link}).

The only requirement here is that your action method must have a similar
signature to `ViewController::viewLocation()` or
`ViewController::viewContent()` (depending on what you’re matching of
course). However, note that not all arguments are mandatory, since
[Symfony is clever enough to know what to inject into your action
method](http://symfony.com/doc/current/book/routing.html#route-parameters-and-controller-arguments){.external-link}.
That is why **you aren’t forced to mimic the `ViewController`’s
signature strictly**. For example, if you omit `$layout` and `$params`
arguments, it will still be valid. Symfony will just avoid injecting
them into your action method.

#### Built-in ViewController signatures {#ContentRendering-Built-inViewControllersignatures}

**viewLocation() signature**

~~~~ brush:
/**
 * Main action for viewing content through a location in the repository.
 *
 * @param int $locationId
 * @param string $viewType
 * @param boolean $layout
 * @param array $params
 *
 * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
 * @throws \Exception
 *
 * @return \Symfony\Component\HttpFoundation\Response
 */
public function viewLocation( $locationId, $viewType, $layout = false, array $params = array() )
~~~~

**viewContent() signature**

~~~~ brush:
/**
 * Main action for viewing content.
 *
 * @param int $contentId
 * @param string $viewType
 * @param boolean $layout
 * @param array $params
 *
 * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
 * @throws \Exception
 *
 * @return \Symfony\Component\HttpFoundation\Response
 */
public function viewContent( $contentId, $viewType, $layout = false, array $params = array() )
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Controller selection doesn’t apply to `block_view` since you can already
[use your own controller to display
blocks](https://doc.ez.no/display/DEVELOPER/Content+Rendering#ContentRendering-Renderingblocks).

Caching

<span
class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
When you use your own controller, **it is your responsibility to define
cache rules**, like with every custom controller!

So don’t forget to **set cache rules** and the appropriate
**`X-Location-Id` header** in the returned `Response` object.

[See built-in
ViewController](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/Core/MVC/Symfony/Controller/Content/ViewController.php#L76){.external-link}
for more details on this.

Query controller {#ContentRendering-Querycontroller}
----------------

<span class="status-macro aui-lozenge aui-lozenge-current">V1.4</span>

The Query controller is a predefined custom content view controller that
runs a Repository Query.

It is meant to be used as a custom controller in a view configuration,
along with match rules. It can use properties of the viewed Content item
or Location as parameters to the Query. It makes it easy to retrieve
content without writing custom PHP code and display the results in a
template.

### Use-case examples {#ContentRendering-Use-caseexamples}

-   List of Blog posts in a Blog
-   List of Images in a Gallery

### Usage example {#ContentRendering-Usageexample}

We will take the blog posts use case mentioned above as an example. It
assumes a “Blog” container that contains a set of “Blog post” items. The
goal is, when viewing a Blog, to list the Blog posts it contains.

Three items are required:

-   a `LocationChildren` QueryType - It will generate a Query retrieving
    the children of a given location id
-   a View template - It will render the Blog, and list the Blog posts
    it contains
-   a `content_view` configuration - It will instruct Platform, when
    viewing a Content item of type Blog, to use the Query Controller,
    the view template, and the `LocationChildren` QueryType. It will
    also map the id of the viewed Blog to the QueryType parameters, and
    set which twig variable the results will be assigned to.

#### The LocationChildren QueryType {#ContentRendering-TheLocationChildrenQueryType}

QueryTypes are described in more detail in the [next
section](#ContentRendering-QueryTypesobjects). In short, a QueryType can
build a Query object, optionally based on a set of parameters. The
following example will build a Query that retrieves the sub-items of a
Location:

**src/AppBundle/QueryType/LocationChildrenQueryType.php**

~~~~ brush:
<?php
namespace AppBundle\QueryType;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ParentLocationId;
use eZ\Publish\Core\QueryType\QueryType;

class LocationChildrenQueryType implements QueryType
{
    public function getQuery(array $parameters = [])
    {
        return new LocationQuery([
            'filter' => new ParentLocationId($parameters['parentLocationId']),
        ]);
    }

    public function getSupportedParameters()
    {
        return ['parentLocationId'];
    }

    public static function getName()
    {
        return 'LocationChildren';
    }
}
~~~~

Any class will be registered as a QueryType when it:

-   implements the QueryType interface,
-   is located in the QueryType subfolder of a bundle, and in a file
    named “SomethingQueryType.php”

If the QueryType has dependencies, it can be manually tagged as a
service using the `ezpublish.query_type` service tag, but it is not
required in that case.

#### The content\_view configuration {#ContentRendering-Thecontent_viewconfiguration}

We now need a view configuration that matches content items of type
“Blog”, and uses the QueryController to fetch the blog posts:

**app/config/ezplatform.yml**

~~~~ brush:
ezpublish:
      system:
            site_group:
                content_view:
                    full:
                        blog:
                            controller: "ez_query:locationQueryAction"
                            template: "content/view/full/blog.html.twig"
                            match:
                                Identifier\ContentType: "blog"
                            params:
                                query:
                                    query_type: 'LocationChildren'
                                    parameters:
                                        parentLocationId: "@=location.id"
                                    assign_results_to: 'blog_posts'
~~~~

The view’s controller action is set to the QueryController’s
`locationQuery` action (`ez_query:locationQueryAction`). Other actions
are available that run a different type of search (contentInfo or
content).

The QueryController is configured in the `query` array, inside the
`params` of the content\_view block:

-   `query_type` specifies the QueryType to use, based on its name.
-   `parameters` is a hash where parameters from the QueryType are set.
    Arbitrary values can be used, as well as properties from the
    currently viewed location and content. In that case, the id of the
    currently viewed location is mapped to the QueryType’s
    `parentLocationId` parameter:
    `             parentLocationId: "@=location.id"           `
-   <span> `assign_results_to` sets which twig variable the search
    results will be assigned to.</span>

#### <span>The view template</span> {#ContentRendering-Theviewtemplate}

<span>Results from the search are assigned to the `blog_posts` variable
as a `SearchResult` object. In addition, since the usual view controller
is used, the currently viewed `location` and `content` are also
available.</span>

**app/Resources/views/content/full/blog.html.twig**

~~~~ brush:
<h1>{{ ez_content_name(content) }}</h1>
 
{% for blog_post in blog_posts.searchHits %}
  <h2>{{ ez_content_name(blog_post.valueObject.contentInfo) }}</h2>
{% endfor %} 
~~~~

### Configuration details {#ContentRendering-Configurationdetails}

#### `controller` {#ContentRendering-controller}

Three Controller Actions are available, each for a different type of
search:

-   `locationQueryAction` runs a Location Search
-   `contentQueryAction` runs a Content Search
-   `contentInfoQueryAction` runs a Content Info search

 

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
See [Search](Search_31429673.html) documentation page for more details
about different types of search

#### `params` {#ContentRendering-params}

The Query is configured in a `query` hash in `params`, you could specify
the QueryType name, additional parameters and the Twig variable that you
will assign the results to for use in the template.

-   #### `query_type` {#ContentRendering-query_type}

    -   Name of the Query Type that will be used to run the query,
        defined by the class name.

-   #### `parameters` {#ContentRendering-parameters}

    -   Query Type parameters that can be provided in two ways:

    1.  As scalar values, for example an identifier, an id, etc.
    2.  Using the Expression language. This simple script language,
        similar to Twig syntax, lets you write expressions that get
        value from the current content and/or location:

    -   -   For example, `@=location.id                   ` will be
            evaluated to the currently viewed location’s
            ID.`                     content`, `location` and `view` are
            available as variables in expressions.

-   #### `assign_results_to` {#ContentRendering-assign_results_to}

    -   This is the name of the Twig variable that will be assigned
        the results.
    -   Note that the results are the SearchResult object returned by
        the SearchService.

### <span>Query Types objects</span> {#ContentRendering-QueryTypesobjects}

QueryTypes are objects that build a Query. They are different from
[Public API
queries](https://doc.ez.no/display/DEVELOPER/Public+API+Guide).

To make a new QueryType available to the Query Controller, you need to
create a PHP class that implements the QueryType interface, then
register it as such in the Service Container.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For more information about the [Service
Container](Service-Container_31432100.html), read the page

### <span class="anchor">The QueryType interface</span> {#ContentRendering-TheQueryTypeinterface}

There you can view the PHP QueryType interface. Three methods are
described:

1.  `getQuery()`
2.  `getSupportedParameters()`
3.  `getName()`

**** <span class="collapse-source expand-control"><span
class="expand-control-icon icon"> </span><span
class="expand-control-text">Expand source</span></span>

~~~~ brush:
interface QueryType
{
 /**
 * Builds and returns the Query object
 *
 * The Query can be either a Content or a Location one.
 *
 * @param array $parameters A hash of parameters that will be used to build the Query
 * @return \eZ\Publish\API\Repository\Values\Content\Query
 */
 public function getQuery(array $parameters = []);
 
 /**
 * Returns an array listing the parameters supported by the QueryType
 * @return array
 */
 public function getSupportedParameters();
 
 /**
 * Returns the QueryType name
 * @return string
 */
 public static function getName();
}
~~~~

#### Parameters {#ContentRendering-Parameters}

A QueryType may accept parameters, including string, arrays and other
types, depending on the implementation. They can be used in any way,
such as:

-   customizing an element’s value (limit, ContentType identifier, etc)
-   conditionally adding/removing criteria from the query
-   setting the limit/offset

The implementations should use Symfony’s `OptionsResolver` for
parameters handling and resolution.

### <span class="anchor">QueryType example: latest content</span> {#ContentRendering-QueryTypeexample:latestcontent}

Let’s see an example for QueryType creation.

This QueryType returns a Query that searches for **the 10 last published
Content items, order by reverse publishing date**.  
It accepts an optional `type` parameter, that can be set to a
ContentType identifier:

 

~~~~ brush:
<?php
namespace AppBundle\QueryType;
use eZ\Publish\Core\QueryType\QueryType;
use eZ\Publish\API\Repository\Values\Content\Query;
class LatestContentQueryType implements QueryType
{
    public function getQuery(array $parameters = [])
    {
        $criteria[] = new Query\Criterion\Visibility(Query\Criterion\Visibility::VISIBLE);
        if (isset($parameters['type'])) {
            $criteria[] = new Query\Criterion\ContentTypeIdentifier($parameters['type']);
        }
        // 10 is the default limit we set, but you can have one defined in the parameters
        return new Query([
            'filter' => new Query\Criterion\LogicalAnd($criteria),
            'sortClauses' => [new Query\SortClause\DatePublished()],
            'limit' => isset($parameters['limit']) ? $parameters['limit'] : 10,
        ]);
    }
    public static function getName()
    {
        return 'AppBundle:LatestContent';
    }
    /**
     * Returns an array listing the parameters supported by the QueryType.
     * @return array
     */
    public function getSupportedParameters()
    {
        return ['type', 'limit'];
    }
}
~~~~

### <span class="anchor">Naming of QueryTypes</span> {#ContentRendering-NamingofQueryTypes}

Each QueryType is named after what is returned by `getName()`. **Names
must be unique.** A warning will be thrown during compilation if there
is a conflict, and the resulting behavior will be unpredictable.

QueryType names should use a unique namespace, in order to avoid
conflicts with other bundles. We recommend that the name is prefixed
with the bundle’s name: `AcmeBundle:LatestContent`. A vendor/company’s
name could also work for QueryTypes that are reusable throughout
projects: `Acme:LatestContent`.

### <span class="anchor">Registering the QueryType into the service container</span> {#ContentRendering-RegisteringtheQueryTypeintotheservicecontainer}

In addition to creating a class for a `QueryType`, you must also
register the QueryType with the Service Container. This can be done in
two ways: by convention, and with a service tag.

#### <span class="anchor">By convention</span> {#ContentRendering-Byconvention}

Any class named `<Bundle>\QueryType\*QueryType`, that implements the
QueryType interface, will be registered as a custom QueryType.  
Example: `AppBundle\QueryType\LatestContentQueryType`.

#### <span class="anchor">Using a service tag</span> {#ContentRendering-Usingaservicetag}

If the proposed convention doesn’t work for you, QueryTypes can be
manually tagged in the service declaration:

~~~~ brush:
acme.query.latest_content:
    class: AppBundle\Query\LatestContent
    tags:
        - {name: ezpublish.query_type}
~~~~

The effect is exactly the same as registering by convention.

More content…

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Follow the FieldType creation Tutorial and learn how to [Register the
Field Type as a
service](Register-the-Field-Type-as-a-service_31429774.html)

### <span class="anchor">The OptionsResolverBasedQueryType abstract class</span> {#ContentRendering-TheOptionsResolverBasedQueryTypeabstractclass}

An abstract class based on Symfony’s `OptionsResolver` eases
implementation of QueryTypes with parameters.

It provides final implementations of `getQuery()` and
`getDefinedParameters()`.

A `doGetQuery()` method must be implemented instead of `getQuery()`. It
is called with the parameters processed by the OptionsResolver, meaning
that the values have been validated, and default values have been set.

In addition, the `configureOptions(OptionsResolver $resolver)` method
must configure the OptionsResolver.

The LatestContentQueryType can benefit from the abstract implementation:

-   validate that `type` is a string, but make it optional
-   validate that `limit` is an int, with a default value of 10

 

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For further information see the [Symfony’s Options Resolver
documentation
page](http://symfony.com/doc/current/components/options_resolver.html){.external-link}

~~~~ brush:
<?php
namespace AppBundle\QueryType;
use eZ\Publish\API\Repository\Values\Content\Query;
use Symfony\Component\OptionsResolver\OptionsResolver;
class OptionsBasedLatestContentQueryType extends OptionsResolverBasedQueryType implements QueryType
{
    protected function doGetQuery(array $parameters)
    {
        $criteria[] = new Query\Criterion\Visibility(Query\Criterion\Visibility::VISIBLE);
        if (isset($parameters['type'])) {
            $criteria[] = new Query\Criterion\ContentTypeIdentifier($parameters['type']);
        }
        return new Query([
            'criterion' => new Query\Criterion\LogicalAnd($criteria),
            'sortClauses' => [new Query\SortClause\DatePublished()],
            'limit' => $parameters,
        ]);
    }
    public static function getName()
    {
        return 'AppBundle:LatestContent';
    }
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setAllowedTypes('type', 'string');
        $resolver->setAllowedValues('limit', 'int');
        $resolver->setDefault('limit', 10);
    }
}
~~~~

### <span class="anchor">Using QueryTypes from PHP code</span> {#ContentRendering-UsingQueryTypesfromPHPcode}

All QueryTypes are registered in a registry, the QueryType registry.

It is available from the container as `ezpublish.query_type.registry`

~~~~ brush:
<?php
class MyCommand extends ContainerAwareCommand
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $queryType     = $this->getContainer()->get('ezpublish.query_type.registry')->getQueryType('AcmeBundle:LatestContent');
        $query         = $queryType->getQuery(['type' => 'article']);
        $searchResults = $this->getContainer()->get('ezpublish.api.service.search')->findContent($query);
        foreach ($searchResults->searchHits as $searchHit) {
            $output->writeln($searchHit->valueObject->contentInfo->name);
        }
    }
}
~~~~

ESI {#ContentRendering-ESI}
---

Just like for regular Symfony controllers, you can take advantage of ESI
and use different cache levels:

**Using ESI**

~~~~ brush:
{{ render_esi(controller("ez_content:viewAction", {"contentId": 123, "viewType": "line"})) }}
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Only scalable variables can be sent via render\_esi (not object)

Asynchronous rendering {#ContentRendering-Asynchronousrendering}
----------------------

Symfony also supports asynchronous content rendering with the help
of [hinclude.js](http://mnot.github.com/hinclude/){.external-link} library.

**Asynchronous rendering**

~~~~ brush:
{{ render_hinclude(controller("ez_content:viewAction", {"contentId": 123, "viewType": "line"})) }}
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Only scalable variables can be sent via render\_hinclude (not object)

### Display a default text {#ContentRendering-Displayadefaulttext}

If you want to display a default text while a controller is loaded
asynchronously, you have to pass a second parameter to your
render\_hinclude twig function.

**Display a default text during asynchronous loading of a controller**

~~~~ brush:
{{ render_hinclude(controller('EzCorporateDesignBundle:Header:userLinks'), {'default': "<div style='color:red'>loading</div>"}) }}
~~~~

See also: [Custom controllers](#ContentRendering-Customcontrollers)

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
[hinclude.js](http://mnot.github.com/hinclude/){.external-link} needs to
be properly included in your layout to work.

Please [refer to Symfony
documentation](http://symfony.com/doc/current/book/templating.html#asynchronous-content-with-hinclude-js){.external-link}
for all available options.

Reference {#ContentRendering-Reference}
=========

Symfony & Twig template functions/filters/tags

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For template functionality provided by Symfony Framework, see [Symfony
Twig Extensions Reference
page](http://symfony.com/doc/current/reference/twig_reference.html){.external-link}.
For those provided by the underlying Twig template engine, see [Twig
Reference
page](http://twig.sensiolabs.org/documentation#reference){.external-link}

Twig functions reference {#ContentRendering-Twigfunctionsreference}
------------------------

See [Twig Functions Reference](Twig-Functions-Reference_32114025.html)
for detailed information on all available Twig functions.

Extensibility {#ContentRendering-Extensibility}
=============

Events {#ContentRendering-Events}
------

### Introduction {#ContentRendering-Introduction.1}

This section presents the events that are triggered by eZ Platform.

### eZ Publish Core {#ContentRendering-eZPublishCore}

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Event name</th>
<th align="left">Triggered when…</th>
<th align="left">Usage</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><strong><code>ezpublish.siteaccess</code></strong></td>
<td align="left">After the SiteAccess matching has occurred.</td>
<td align="left"><p>Gives further control on the matched SiteAccess.</p>
<p>The event listener method receives an <code>eZ\Publish\Core\MVC\Symfony\Event\PostSiteAccessMatchEvent</code> object.</p></td>
</tr>
<tr class="even">
<td align="left"><strong><code>ezpublish.pre_content_view</code></strong></td>
<td align="left">Right before a view is rendered for a Content item, via the content view controller.</td>
<td align="left"><p>This event is triggered by the view manager and allows you to inject additional parameters to the content view template.</p>
The event listener method receives an <code>eZ\Publish\Core\MVC\Symfony\Event\PreContentViewEvent </code>object.
<p> </p></td>
</tr>
<tr class="odd">
<td align="left"><code>                 ezpublish.api.contentException               </code></td>
<td align="left">The API throws an exception that could not be caught internally (missing field type, internal error…).</td>
<td align="left"><p>This event allows further programmatic handling (like rendering a custom view) for the exception thrown.</p>
<p>The event listener method receives an <code>eZ\Publish\Core\MVC\Symfony\Event\APIContentExceptionEvent</code> object.</p></td>
</tr>
</tbody>
</table>

#### In this topic: {#ContentRendering-Inthistopic:}

-   [Introduction](#ContentRendering-Introduction)
    -   [The ViewController](#ContentRendering-TheViewController)
-   [Configuration](#ContentRendering-Configuration)
    -   [View provider
        configuration](#ContentRendering-Viewproviderconfiguration)
    -   [View Matchers](#ContentRendering-ViewMatchers)
    -   [Default view templates](#ContentRendering-Defaultviewtemplates)
-   [Usage](#ContentRendering-Usage)
    -   [Content view templates](#ContentRendering-Contentviewtemplates)
    -   [Content and Location view
        providers](#ContentRendering-ContentandLocationviewproviders)
    -   [Rendering Content
        items](#ContentRendering-RenderingContentitems)
    -   [Embedding images](#ContentRendering-Embeddingimages)
    -   [Adding Links](#ContentRendering-AddingLinks)
    -   [Embedding Content
        items](#ContentRendering-EmbeddingContentitems)
    -   [Rendering blocks](#ContentRendering-Renderingblocks)
    -   [Binary and Media
        download](#ContentRendering-BinaryandMediadownload)
    -   [Custom controllers](#ContentRendering-Customcontrollers)
    -   [Query controller](#ContentRendering-Querycontroller)
    -   [ESI](#ContentRendering-ESI)
    -   [Asynchronous
        rendering](#ContentRendering-Asynchronousrendering)
-   [Reference](#ContentRendering-Reference)
    -   [Twig functions
        reference](#ContentRendering-Twigfunctionsreference)
-   [Extensibility](#ContentRendering-Extensibility)
    -   [Events](#ContentRendering-Events)

#### Related topics: {#ContentRendering-Relatedtopics:}

[Injecting parameters in content
views](Injecting-parameters-in-content-views_31430331.html)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


