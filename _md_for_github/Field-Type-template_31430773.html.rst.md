<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [API](API_31429524.html)
4.  [Field Type API and best practices](Field-Type-API-and-best-practices_31430767.html)

</div>
**Developer : Field Type template**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 22, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Defining your Field Type template**

In order to be used by `` `ez_render_field() `` Twig helper &lt;<https://doc.ez.no/display/TECHDOC/ez_render_field>&gt;\_\_, you need
to define a \*\*template containing a block\*\* dedicated to the Field
display.

This block consists on a piece of template receiving specific variables
you can use to make the display vary.

.. raw:: html

   &lt;div
   class="confluence-information-macro confluence-information-macro-information"&gt;

.. raw:: html

   &lt;div class="confluence-information-macro-body"&gt;

You will find examples with built-in Field Types in
EzPublishCoreBundle/Resources/views/content\_fields.html.twig &lt;<https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeHeader panelHeader pdl"
   style="border-bottom-width: 1px;"&gt;

\*\*Template for a FieldType with "myfieldtype" identifier\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    {% block myfieldtype\_field %}
    {\# Your code here \#}
    {% endblock %}

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div
   class="confluence-information-macro confluence-information-macro-information"&gt;

.. raw:: html

   &lt;div class="confluence-information-macro-body"&gt;

By convention, your block \*\*must\*\* be named
&lt;fieldTypeIdentifier&gt;\_field.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Exposed variables
   :name: FieldTypetemplate-Exposedvariables

.. raw:: html

   &lt;div class="table-wrap"&gt;

+---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+
| Name                | Type                                                       | Description                                                                           |
+=====================+============================================================+=======================================================================================+
| field\` | `eZ\Publish\API\Repository\Values\Content\Field` | The field to display | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+ | `contentInfo` | `eZ\Publish\API\Repository\Values\Content\ContentInfo` | The ContentInfo to which the field belongs to | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+ | `versionInfo` | `eZ\Publish\API\Repository\Values\Content\VersionInfo` | The VersionInfo to which the field belongs to | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+ | `fieldSettings` | `mixed` | Settings of the field (depends on the FieldType) | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+ | `parameters` | `hash` | Options passed to `ez_render_field()` under the `parameters` key | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+ | `attr` | `hash` | The attributes to add the generate the HTML markup. | | | | Contains at least a **`class`** entry, containing `<fieldtypeidentifier>-field` | +---------------------+------------------------------------------------------------+---------------------------------------------------------------------------------------+

</div>
**Reusing blocks**

To ease Field Type template development, you can take advantage of all defined blocks by using the [block() function](http://twig.sensiolabs.org/doc/functions/block.html).

You can for example take advantage of `simple_block_field`, `simple_inline_field` or `field_attributes` blocks provided in [content\_fields.html.twig](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig#L413).

<div
class="confluence-information-macro confluence-information-macro-note">
Warning

<div class="confluence-information-macro-body">
To be able to reuse built-in blocks, **your template must inherit from `EzPublishCoreBundle::content_fields.html.twig`**.

</div>
</div>
**Registering your template**

 

To make your template available, you must register it to the system.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/config/ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
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
You can define these rules in a dedicated file instead of `app/config/ezplatform.yml`. Read the [cookbook recipe to learn more about it](Importing-settings-from-a-bundle_31429803.html).

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375991414">
-   [Defining your Field Type template](#FieldTypetemplate-DefiningyourFieldTypetemplate)
    -   [Exposed variables](#FieldTypetemplate-Exposedvariables)
    -   [Reusing blocks](#FieldTypetemplate-Reusingblocks)
    -   [Registering your template](#FieldTypetemplate-Registeringyourtemplate)

</div>
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

