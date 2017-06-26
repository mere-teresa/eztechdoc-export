1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Content Rendering](Content-Rendering_31429679.html)</span>
5.  <span>[Twig Functions Reference](Twig-Functions-Reference_32114025.html)</span>

<span id="title-text"> Developer : ez\_render\_field </span>
============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Dec 31, 2016

#### Description

`ez_render_field()` is a Twig helper allowing you to display a Content item's Field value, taking advantage of the template block exposed by the Field Type used.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Template blocks for built-in Field Types <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig" class="external-link">reside in EzPublishCoreBundle</a>.

#### Prototype and Arguments

`ez_render_field( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefinitionIdentifier[, hash params] )`

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Argument name</th>
<th align="left">Type</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>content</code></td>
<td align="left"><code>eZ\Publish\API\Repository\Values\Content\Content</code></td>
<td align="left">Content object the displayable field belongs to.</td>
</tr>
<tr class="even">
<td align="left"><code>fieldDefinitionIdentifier</code></td>
<td align="left"><code>string</code></td>
<td align="left">The identifier the Field is referenced by.</td>
</tr>
<tr class="odd">
<td align="left"><code>params</code></td>
<td align="left"><code>hash</code></td>
<td align="left"><p>Hash of parameters that will be passed to the template block.</p>
<p>By default you can pass 2 entries:</p>
<ul>
<li><strong><code>lang</code></strong> (to override the current language, must be a valid locale with xxx-YY format)</li>
<li><strong><code>template</code></strong> (to override the template to use, see below)</li>
<li><code>attr</code> (hash of HTML attributes you want to add to the inner markup)</li>
<li><code>parameters</code> (arbitrary parameters to pass to the template block)</li>
</ul>
<div class="confluence-information-macro confluence-information-macro-information">
<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<div class="confluence-information-macro-body">
Some Field Types might expect specific entries under the <code>parameters</code> key, like the <a href="MapLocation-Field-Type_31430523.html">MapLocation Field Type</a>.
</div>
</div></td>
</tr>
</tbody>
</table>

#### Override a field template block

In some cases, you may not want to use the built-in field template block as it might not fit your markup needs. In this case, you can choose to override the template block to use by specifying your own template. You can do this inline when calling `ez_render_field()`, or globally by prepending a field template to use by the helper.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Your template block must comply to a regular Field Type template block, [as explained in the Field Type documentation](Field-Type-template_31430773.html).

##### Inline override

You can easily use the template you need by filling the `template` entry in the `params` argument.

``` brush:
{{ ez_render_field( 
       content, 
       'my_field_identifier',
       { 'template': 'AcmeTestBundle:fields:my_field_template.html.twig' }
   ) }}
```

The code above will load `my_field_template.html.twig` located in `AcmeTestBundle/Resources/views/fields/`.

``` brush:
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

Overriding a block and calling the parent

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
When overriding a field template block, it is possible to call the "parent." For this, you need to import original template horizontally, using <a href="http://twig.sensiolabs.org/doc/tags/use.html" class="external-link"><strong><code>use</code></strong> Twig tag</a>.

``` brush:
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

 

##### Inline override using current template

If you want to override a specific field template only once (i.e. because your override would be only valid in your current template), you can specify the current template to be the source of the field block.

**Inline override using current template**

``` brush:
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

Limitation

<span class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
**Using `_self` will only work if your current template is extending another one.**

This is basically the same limitation as for <a href="http://symfony.com/doc/current/book/forms.html#global-form-theming" class="external-link">Symfony form themes</a>.

##### Global override

In the case where you want to systematically reuse a field template instead of the default one, you can append it to the field templates list to use by `ez_render_field()`.

To make your template available, you must register it to the system.

**app/config/ezplatform.yml**

``` brush:
ezpublish:
    system:
        my_siteaccess:
            field_templates:
                - 
                    template: "AcmeTestBundle:fields:my_field_template.html.twig"
                    # Priority is optional (default is 0). The higher it is, the higher your template gets in the list.
                    priority: 10
```

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You can define these rules in a dedicated file instead of `app/config/ezplatform.yml`.<span style="color: rgb(51,51,51);"> </span>Read the [cookbook recipe to learn more about it](https://doc.ez.no/display/DEVELOPER/Importing+settings+from+a+bundle)<span style="color: rgb(51,51,51);">.</span>

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


