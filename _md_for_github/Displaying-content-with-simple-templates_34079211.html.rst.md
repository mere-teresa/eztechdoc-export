<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Displaying content with simple templates**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek on Mar 07, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This page describes basic steps needed to render content on a page.

**Rendering a full page**

By default (without any configuration), a Content item will be rendered without any template. In your config you can tell the app to render it using different templates depending on the situation. Templates are written in the Twig templating language.

Let's create a very simple template that you will use to render an article:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**article.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<div>
    {# 'ez_render_field' is one of the available Twig functions.
    It will render the 'body' Field of the current 'content' #}
    {{ ez_render_field(content, 'body') }}
</div>
```

</div>
</div>
Place this file in the `app/Resources/views` folder.

Now you need a config that will decide when this template is used.

You can place the config in the `app/config` folder in either of two places: a separate file or the preexisting `ezplatform.yml`. In this case you'll use the latter.

In `ezplatform.yml` under the `ezpublish` and `system` keys add the following config (pay attention to indentation. `default` should be indented relative to `system`):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
# 'default' is the siteaccess.
default:
    # 'content_view' indicates that we will be defining view configuration.
    content_view:
        # 'full' is the type of view to use. We'll talk about defining other view types below.
        full:
            # Here starts the entry for our view. You can give it any name you want, as long as it is unique.
            article:
                # This is the path to the template file, relative to the 'app/Resources/views' folder.
                template: full\article.html.twig
                # This identifies the situations when the template will be used.
                match:
                    # The template will be used when the Content Type of the content is 'article'.
                    Identifier\ContentType: [article]
```

</div>
</div>
In the `match` section you can use different ways to identify the situation where the template will be used, not only the Content Type, see [Matchers](Content-Rendering_31429679.html#ContentRendering-Matchers).

At this point all Articles should render using the new template. If you do not see changes, clear the cache (`php app/console cache:clear`).

**Rendering page elements**

In the example above you used the `ez_render_field` Twig function to render the 'body' Field of the content item. Of course each Content item can have multiple fields and you can render them in different ways in the template. Other Twig functions let you access other properties of your content. To see an example, let's extend the template a bit:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**article.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
{# This renders the Content name of the article #}
<h1>{{ ez_content_name(content) }}</h1>
<div>
    {# Here you add a rendering of a different Field, 'intro' #}
    <b>{{ ez_render_field(content, 'intro') }}</b>
</div>    
<div>
    {{ ez_render_field(content, 'body') }}
</div>
```

</div>
</div>
You can also make use of different other [Twig functions](Twig-Functions-Reference_32114025.html), for example [ez\_field\_value](ez_field_value_32114035.html), which renders the value of the Field without a template.

**Different views**

Besides the `full` view type you can create many other view types. They can be used for example when rendering children of a folder of when embedding one Content item in another. See [Content Rendering](Content-Rendering_31429679.html#ContentRendering-Renderembeddedcontentitems).

**Listing children**

To see how to list children of a Content item, for example all content contained in a folder, see [Displaying children of a Content item](Displaying-children-of-a-Content-item_32868706.html)

**Adding links**

To add links to your templates you use the `ez_urlalias` path. To see how it works, let's add one more line to the template:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**article.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<h1>{{ ez_content_name(content) }}</h1>
{# The link points to the content in Location ID 2, which is the Home Content item #}
<a href="{{ path('ez_urlalias', {locationId: 2}) }}">Back</a>
<div>
{# ... #}
```

</div>
</div>
Instead of pointing to a specific content by its Location ID you can of course also use here a variable, see [this example in the Demo Bundle](https://github.com/ezsystems/ezplatform-demo/blob/e15b93ade4b8c1f9084c5adac51239d239f9f7d8/app/Resources/views/full/blog.html.twig#L25).

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376003171">
-   [Rendering a full page](#Displayingcontentwithsimpletemplates-Renderingafullpage)
-   [Rendering page elements](#Displayingcontentwithsimpletemplates-Renderingpageelements)
-   [Different views](#Displayingcontentwithsimpletemplates-Differentviews)
-   [Listing children](#Displayingcontentwithsimpletemplates-Listingchildren)
-   [Adding links](#Displayingcontentwithsimpletemplates-Addinglinks)

</div>
**Related topics:**

[Content Rendering](Content-Rendering_31429679.html)

</div>
</div>
</div>
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

