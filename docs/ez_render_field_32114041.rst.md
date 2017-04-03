<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Content Rendering](Content-Rendering_31429679.html)
5.  [Twig Functions Reference](Twig-Functions-Reference_32114025.html)

</div>
**Developer : ez\_render\_field**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Dec 31, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

`ez_render_field()` is a Twig helper allowing you to display a Content
item’s Field value, taking advantage of the template block exposed by
the Field Type used.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Template blocks for built-in Field Types [reside in
EzPublishCoreBundle](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig).

</div>
</div>
**Prototype and Arguments**

`ez_render_field( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefinitionIdentifier[, hash params] )`

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Argument name            | Type                     | Description              |
+==========================+==========================+==========================+
| `content`                | `eZ\Publish\API\Reposit  | Content object the       |
|                          | ory\Values\Content\Conte | displayable field        |
|                          |  nt`                     | belongs to.              |
+--------------------------+--------------------------+--------------------------+
| `fieldDefinitionIdentif  | `string`                 | The identifier the Field |
| ier`                     |                          | is referenced by.        |
+--------------------------+--------------------------+--------------------------+
| `params`                 | `hash`                   | Hash of parameters that  |
|                          |                          | will be passed to the    |
|                          |                          | template block.          |
|                          |                          |                          |
|                          |                          | By default you can pass  |
|                          |                          | 2 entries:               |
|                          |                          |                          |
|                          |                          | -   **`lang`** (to       |
|                          |                          |     override the current |
|                          |                          |     language, must be a  |
|                          |                          |     valid locale with    |
|                          |                          |     xxx-YY format)       |
|                          |                          | -   **`template`** (to   |
|                          |                          |     override the         |
|                          |                          |     template to use,     |
|                          |                          |     see below)           |
|                          |                          | -   `attr` (hash of HTML |
|                          |                          |     attributes you want  |
|                          |                          |     to add to the        |
|                          |                          |     inner markup)        |
|                          |                          | -   `parameters`         |
|                          |                          |     (arbitrary           |
|                          |                          |     parameters to pass   |
|                          |                          |     to the               |
|                          |                          |     template block)      |
|                          |                          |                          |
|                          |                          | <div                     |
|                          |                          | class="confluence-inf    |
|                          |                          | ormation-macro confluenc |
|                          |                          | e-information-macro-info |
|                          |                          | rmation"&gt;             |
|                          |                          |                          |
|                          |                          | <div                     |
|                          |                          | class="confluence-inf    |
|                          |                          | ormation-macro-body"&gt; |
|                          |                          |                          |
|                          |                          | Some Field Types might   |
|                          |                          | expect specific entries  |
|                          |                          | under the `parameters`   |
|                          |                          | key, like the            |
|                          |                          | MapLocation Field        |
|                          |                          | Type &lt;MapLocation-Fie |
|                          |                          | ld-                      |
|                          |                          | Type\_31430523.html&gt;\ |
|                          |                          | _\_.                     |
|                          |                          |                          |
|                          |                          | </div>                   |
|                          |                          | </div>                   |
+--------------------------+--------------------------+--------------------------+

</div>
**Override a field template block**

In some cases, you may not want to use the built-in field template block
as it might not fit your markup needs. In this case, you can choose to
override the template block to use by specifying your own template. You
can do this inline when calling `ez_render_field()`, or globally by
prepending a field template to use by the helper.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Your template block must comply to a regular Field Type template block,
[as explained in the Field Type
documentation](Field-Type-template_31430773.html).

</div>
</div>
**Inline override**

You can easily use the template you need by filling the `template` entry
in the `params` argument.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_render_field( 
       content, 
       'my_field_identifier',
       { 'template': 'AcmeTestBundle:fields:my_field_template.html.twig' }
   ) }}
```

</div>
</div>
The code above will load `my_field_template.html.twig` located in
`AcmeTestBundle/Resources/views/fields/`.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{# AcmeTestBundle/Resources/views/fields/my_field_template.html.twig #}
{# Assuming "my_field_identifier" from above template example is an ezkeyword field. #}
{% block ezkeyword_field %}
    {% spaceless %}
        {% if field.value.values|length() > 0 %}
        <ul>
            {% for keyword in field.value.values %}
            <li>{{ keyword }}</li>
            {% endfor %}
        </ul>
        {% endif %}
    {% endspaceless %}
{% endblock %}
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
Overriding a block and calling the parent

<div class="confluence-information-macro-body">
When overriding a field template block, it is possible to call the
“parent.” For this, you need to import original template horizontally,
using [**`use`** Twig
tag](http://twig.sensiolabs.org/doc/tags/use.html).

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{# AcmeTestBundle/Resources/views/fields/my_field_template.html.twig #}
{# Assuming "my_field_identifier" from above template example is an ezkeyword field. #}
 
{% use "EzPublishCoreBundle::content_fields.html.twig" with ezkeyword_field as base_ezkeyword_field %}
 
{# Surround base block with a simple div #}
{% block ezkeyword_field %}
    <div class="ezkeyword">
        {{ block("base_ezkeyword_field") }}
    </div>
{% endblock %}
```

</div>
</div>
</div>
</div>
 

**Inline override using current template**

If you want to override a specific field template only once (i.e.
because your override would be only valid in your current template), you
can specify the current template to be the source of the field block.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Inline override using current template**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% extends "MyBundle::pagelayout.html.twig" %}

{% block content %}
    {# Note that "tags" is a field using ezkeyword fieldType #}
    <div class="tags">{{ ez_render_field( content, "tags" , { "template": _self } ) }}</div>
{% endblock %}

{# Here begins the inline block for my ezkeyword field #}
{% block ezkeyword_field %}
    {% spaceless %}
        {% if field.value.values|length() > 0 %}
        <ul>
            {% for keyword in field.value.values %}
            <li>{{ keyword }}</li>
            {% endfor %}
        </ul>
        {% endif %}
    {% endspaceless %}
{% endblock %}
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-warning">
Limitation

<div class="confluence-information-macro-body">
**Using `_self` will only work if your current template is extending
another one.**

This is basically the same limitation as for [Symfony form
themes](http://symfony.com/doc/current/book/forms.html#global-form-theming).

</div>
</div>
**Global override**

In the case where you want to systematically reuse a field template
instead of the default one, you can append it to the field templates
list to use by `ez_render_field()`.

To make your template available, you must register it to the system.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/config/ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    system:
        my_siteaccess:
            field_templates:
                - 
                    template: "AcmeTestBundle:fields:my_field_template.html.twig"
                    # Priority is optional (default is 0). The higher it is, the higher your template gets in the list.
                    priority: 10
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
You can define these rules in a dedicated file instead of
`app/config/ezplatform.yml`. Read the [cookbook recipe to learn more
about
it](https://doc.ez.no/display/DEVELOPER/Importing+settings+from+a+bundle).

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

