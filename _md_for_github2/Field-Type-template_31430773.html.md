1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[API](API_31429524.html)</span>
4.  <span>[Field Type API and best practices](Field-Type-API-and-best-practices_31430767.html)</span>

<span id="title-text"> Developer : Field Type template </span>
==============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Apr 22, 2016

Defining your Field Type template
=================================

In order to be used by [`ez_render_field()` Twig helper](https://doc.ez.no/display/TECHDOC/ez_render_field), you need to define a **template containing a block** dedicated to the Field display.

This block consists on a piece of template receiving specific variables you can use to make the display vary.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
You will find examples with built-in Field Types in <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig" class="external-link">EzPublishCoreBundle/Resources/views/content_fields.html.twig</a>

**Template for a FieldType with "myfieldtype" identifier**

``` brush:
{% block myfieldtype_field %}
{# Your code here #}
{% endblock %}
```

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
By convention, your block **must** be named `<fieldTypeIdentifier>_field`.

Exposed variables
-----------------

| Name            | Type                                                   | Description                                                                     |
|-----------------|--------------------------------------------------------|---------------------------------------------------------------------------------|
| `field`         | `eZ\Publish\API\Repository\Values\Content\Field`       | The field to display                                                            |
| `contentInfo`   | `eZ\Publish\API\Repository\Values\Content\ContentInfo` | The ContentInfo to which the field belongs to                                   |
| `versionInfo`   | `eZ\Publish\API\Repository\Values\Content\VersionInfo` | The VersionInfo to which the field belongs to                                   |
| `fieldSettings` | `mixed`                                                | Settings of the field (depends on the FieldType)                                |
| `parameters`    | `hash`                                                 | Options passed to `ez_render_field()` under the `parameters` key                |
| `attr`          | `hash`                                                 | The attributes to add the generate the HTML markup.                             
                                                                            Contains at least a **`class`** entry, containing `<fieldtypeidentifier>-field`  |

Reusing blocks
--------------

To ease Field Type template development, you can take advantage of all defined blocks by using the <a href="http://twig.sensiolabs.org/doc/functions/block.html" class="external-link">block() function</a>.

You can for example take advantage of `simple_block_field`, `simple_inline_field` or `field_attributes` blocks provided in <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig#L413" class="external-link">content_fields.html.twig</a>.

Warning

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
To be able to reuse built-in blocks, **your template must inherit from `EzPublishCoreBundle::content_fields.html.twig`**.

Registering your template
-------------------------

 

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
You can define these rules in a dedicated file instead of `app/config/ezplatform.yml`.<span style="color: rgb(51,51,51);"> </span>Read the [cookbook recipe to learn more about it](Importing-settings-from-a-bundle_31429803.html)<span style="color: rgb(51,51,51);">.</span>

#### In this topic:

-   [Defining your Field Type template](#FieldTypetemplate-DefiningyourFieldTypetemplate)
    -   [Exposed variables](#FieldTypetemplate-Exposedvariables)
    -   [Reusing blocks](#FieldTypetemplate-Reusingblocks)
    -   [Registering your template](#FieldTypetemplate-Registeringyourtemplate)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


