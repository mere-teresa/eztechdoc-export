# ez\_field\_description

#### Description

`ez_field_description()` is a Twig helper which returns a Content item's field FieldDefinition description in the current language.

This can be useful when you don't want to use a sub-request and custom controller to be able to display this information.

If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language using **forcedLanguage.**

#### Prototype and Arguments

`ez_field_description( Content|ContentInfo content, string fieldDefIdentifier[, string forcedLanguage] )`

| Argument name        | Type                                                                                                         | Description                                                                                                |
|----------------------|--------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------|
| `content`            | `eZ\Publish\API\Repository\Values\Content\Content `or`eZ\Publish\API\Repository\Values\Content\ContentInfo ` | Content / ContentInfo object the **fieldDefIdentifier** belongs to.                                        |
| `fieldDefIdentifier` | `string`                                                                                                     | Identifier of the field we want to get the FieldDefinition description from.                               |
| `forcedLanguage`     | `string`                                                                                                     | Language we want to force (e.g. "eng-US"), otherwise takes prioritized languages from SiteAccess settings. |

#### Usage

```
<p id="ez-content-article-title-description">{{ ez_field_description( content, "title" ) }}</p>
```


