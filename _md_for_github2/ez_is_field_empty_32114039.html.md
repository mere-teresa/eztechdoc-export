1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Content Rendering](Content-Rendering_31429679.html)</span>
5.  <span>[Twig Functions Reference](Twig-Functions-Reference_32114025.html)</span>

<span id="title-text"> Developer : ez\_is\_field\_empty </span>
===============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Dec 31, 2016

#### Description

`ez_is_field_empty()` is a Twig helper which checks if a Content item's field value is considered empty in the current language.

It returns a boolean value (`true` or `false`).

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language.

#### Prototype and Arguments

`ez_is_field_empty( eZ\Publish\API\Repository\Values\Content\Content content, eZ\Publish\API\Repository\Values\Content\Field`|string **fieldDefIdentifier**\[, string **forcedLanguage**\] **)**

| Argument name        | Type                                                       | Description                                                                                            |
|----------------------|------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`            | `eZ\Publish\API\Repository\Values\Content\Content`         | Content object the displayable field belongs to.                                                       |
| `fieldDefIdentifier` | `eZ\Publish\API\Repository\Values\Content\Field or string` | The field we want to check or its identifier.                                                          |
| `forcedLanguage`     | `string`                                                   | Locale we want the content name translation in (e.g. "fre-FR"). Null by default (takes current locale) |

#### Usage

##### Using the Field identifier as parameter

``` brush:
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
```

##### Using the Field as parameter

``` brush:
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, field ) %}
    <div class="description">
        {{ ez_render_field( content, field.fieldDefIdentifier ) }}
    </div>
{% endif %}
```

##### Checking if field exists before use

``` brush:
{# Display "description" field if it exists and is not empty #}
{% if content.fields.description is defined and not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
```

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


