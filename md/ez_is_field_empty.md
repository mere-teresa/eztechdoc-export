# ez\_is\_field\_empty

#### Description

`ez_is_field_empty()` is a Twig helper which checks if a Content item's field value is considered empty in the current language.

It returns a boolean value (`true` or `false`).

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

```
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
```

##### Using the Field as parameter

```
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, field ) %}
    <div class="description">
        {{ ez_render_field( content, field.fieldDefIdentifier ) }}
    </div>
{% endif %}
```

##### Checking if field exists before use

```
{# Display "description" field if it exists and is not empty #}
{% if content.fields.description is defined and not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
```

 


