# ez\_field\_value

#### Description

`ez_field_value()` is a Twig helper which returns a Content item's field value in the current language.

This can be useful when you don't want to use [ez\_render\_field](#ez_field_value-ez_render_field)  and manage the rendering by yourself.

If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language using **forcedLanguage.**

#### Prototype and Arguments

`ez_field_value( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefIdentifier[, string forcedLanguage] )`

| Argument name        | Type                                               | Description                                                                                            |
|----------------------|----------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`            | `eZ\Publish\API\Repository\Values\Content\Content` | Content object the field referred to with **fieldDefIdentifier** belongs to.                           |
| `fieldDefIdentifier` | `string`                                           | Identifier of the field we want to get the value from.                                                 |
| `forcedLanguage`     | `string`                                           | Locale we want the content name translation in (e.g. "fre-FR"). Null by default (takes current locale) |

#### Usage

```
<h2>My title value: {{ ez_field_value( content, "title" ) }}</h2>
```


