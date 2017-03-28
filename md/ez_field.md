# ez\_field

V1.2

#### Description

`ez_field()` is a Twig helper which returns a field value in the current language.

Note that other Twig helpers are available to display specific information of the field ; they all start with ez\_field\_.

If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language using **forcedLanguage.**

#### Prototype and Arguments

`ez_field( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefIdentifier[, string forcedLanguage] )`

| Argument name        | Type                                               | Description                                                                                            |
|----------------------|----------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`            | `eZ\Publish\API\Repository\Values\Content\Content` | Content object the field referred to with **fieldDefIdentifier** belongs to.                           |
| `fieldDefIdentifier` | `string`                                           | Identifier of the field we want to get the value from.                                                 |
| `forcedLanguage`     | `string`                                           | Locale we want the content name translation in (e.g. "fre-FR"). Null by default (takes current locale) |

#### Usage

```
<h2>My title's id: {{ ez_field( content, "title" ).id }}</h2>
```


