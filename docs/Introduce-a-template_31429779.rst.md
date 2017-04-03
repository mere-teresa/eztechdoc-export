<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Creating a Tweet Field
    Type](Creating-a-Tweet-Field-Type_31429766.html)

</div>
**Developer : Introduce a template**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on May 13, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
In order to display data of our Field Type from templates, we need to
create and register a template for it. You can find documentation about
[FieldType templates](Field-Type-template_31430773.html), as well as on
[importing settings from a
bundle](Importing-settings-from-a-bundle_31429803.html) .

In a couple words, such a template must:

-   extend `EzPublishCoreBundle::content_fields.html.twig`
-   define a dedicated Twig block for the type, named by convention
    `<TypeIdentifier_field>`. In our case, `eztweet_field`
-   be registered in parameters

**The template: `Resources/views/fields/eztweet.tpl`**

The first thing we will do is create the template. It will basically
define the default display of a tweet. Remember that [field type
templates can be
overridden](https://confluence.ez.no/display/DEVELOPER/ez_render_field#ez_render_field-Overrideafieldtemplateblock)
in order to tweak what is displayed and how.

Each Field Type template receives a set of variables that can be used to
achieve the desired goal. The variable we care about is `field`, an
instance of `eZ\Publish\API\Repository\Values\Content\Field`. In
addition to its own metadata (`id`, `fieldDefIdentifier`, etc.), it
exposes the Field Value (`Tweet\Value`) through the `value` property.

This would work as a primitive template:  

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% block eztweet_field %}
{% spaceless %}
    {{ field.value.contents|raw }}
{% endspaceless %}
{% endblock %}
```

</div>
</div>
`field.value.contents` is piped through the `raw` twig operator, since
the variable contains HTML code. Without it, the HTML markup would be
visible directly, since twig escapes variables by default. Notice that
we nest our code within a `spaceless` tag, so that we can format our
template in a readable manner without jeopardizing the display with
unwanted spaces.

**Using the content fields helpers**

Even though the above will work just fine, a couple of helpers will help
us get something a bit more flexible.
The [EzPublishCoreBundle::content\_fields.html.twig](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/views/content_fields.html.twig)
template, where the native Field Type templates are implemented,
provides a couple of helpers: `simple_block_field`,
`simple_inline_field` and `field_attributes`. The first two are used to
display a field either as a block or inline. `field_attributes` makes it
easier to use the attr variable that contains additional (HTML)
attributes for the field.

Let’s consider that we will display the value as a block element.

First, we need to make our template inherit from
`content_fields.html.twig`. Then, we will create a `field_value`
variable that will be used by the helper to print out the content inside
the markup. And that’s it. The helper will use `field_attributes` to add
the HTML attributes to the generated `div`.

<div>
 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% block eztweet_field %}
{% spaceless %}
    {% set field_value %}
        {{ field.value.contents|raw }}
    {% endset %}
    {{ block( 'simple_block_field' ) }}
{% endspaceless %}
{% endblock %}
```

</div>
</div>
`fieldValue` is set to the markup we had above, using a `{% set %}`
block. We then call the `block` function to process
the `simple_block_field` template block.

**Registering the template**

As explained in the [FieldType template
documentation](https://confluence.ez.no/display/DEVELOPER/Field+Type+template#FieldTypetemplate-Registeringyourtemplate),
a FieldType template needs to be registered in the eZ Publish semantic
configuration. The most basic way to do this would be to do so in
`app/config/ezplatform.yml`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/config/ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    global:
        field_templates:
            - { template: "EzSystemsTweetFieldTypeBundle:fields:eztweet.html.twig"}
```

</div>
</div>
However, this is far from ideal. We want this to be part of our bundle,
so that no manual configuration is required. For that to happen, we need
to make our bundle extend the eZ Platform semantic configuration. To do
so, we are going to make our bundle’s dependency injection extension
(`DependencyInjection/EzSystemsTweetFieldTypeExtension.php`) implement
`Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface`.
This interface will let us prepend bundle configuration:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**DependencyInjection/EzSystemsTweetFieldTypeExtension.php**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\Yaml\Yaml;

class EzSystemsTweetFieldTypeExtension extends Extension implements PrependExtensionInterface
{
    public function prepend( ContainerBuilder $container )
    {
        $config = Yaml::parse( __DIR__ . '/../Resources/config/ezpublish_field_templates.yml' );
        $container->prependExtensionConfig( 'ezpublish', $config );
    }
}
```

</div>
</div>
The last thing to do is move the template mapping from
`app/config/ezplatform.yml` to
`Resources/config/ezpublish_field_templates.yml`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
system:
    default:
        field_templates:
            - {template: "EzSystemsTweetFieldTypeBundle:fields:eztweet.html.twig"}
```

</div>
</div>
Notice that the `ezpublish` yaml block was deleted. This is because we
already import our configuration under the `ezpublish` namespace in the
prepend method.

You should now be able to display a content item with this Field Type
from the frontoffice, with a fully functional embed:

![image0](attachments/31429779/31429778.png){.confluence-embedded-image}

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="panel" style="border-width: 1px;">
<div class="panelHeader" style="border-bottom-width: 1px;">
**Tutorial path**

</div>
<div class="panelContent">
<div class="plugin_pagetree">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
![image1](images/icons/bullet_blue.gif){width="8px" height="8px"}
[fieldtype tutorial, final
result.PNG](attachments/31429779/31429778.png) (image/png)

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

