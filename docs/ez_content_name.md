# ez\_content\_name

#### Description

`ez_content_name()` is a Twig helper which allows displaying a Content item's name in the current language.

If the current language cannot be found as a translation for content, the name in the main language is always returned. This behavior is identical when forcing a language.

#### Prototype and Arguments

`ez_content_name( eZ\Publish\API\Repository\Values\Content\Content content[, string forcedLanguage] )ez_content_name(contentInfo[, string forcedLanguage] ) `

| Argument name    | Type                                                                                                            | Description                                                                                            |
|------------------|-----------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`        | `eZ\Publish\API\Repository\Values\Content\Content`**or**`eZ\Publish\API\Repository\Values\Content\ContentInfo ` | Content or ContentInfo object the displayable field belongs to.                                        |
| `forcedLanguage` | `string`                                                                                                        | Locale we want the content name translation in (e.g. "fre-FR"). Null by default (takes current locale) |

#### Usage

 

```
<h2>Content name in current language: {{ ez_content_name( content ) }}</h2>
<h2>Content name in current language, from ContentInfo: {{ ez_content_name( content.contentInfo ) }}</h2>
<h2>Content name in french (forced): {{ ez_content_name( content, "fre-FR" ) }}</h2>
```

#### Equivalent PHP code

##### Getting the translated name for a Content item

```
// Assuming we're in a controller action
$translationHelper = $this->get( 'ezpublish.translation_helper' );
 
// From Content
$translatedContentName = $translationHelper->getTranslatedContentName( $content );
// From ContentInfo
$translatedContentName = $translationHelper->getTranslatedContentNameByContentInfo( $contentInfo );
```

##### Forcing a specific language

```
// Assuming we're in a controller action
$translatedContentName = $this->get( 'ezpublish.translation_helper' )->getTranslatedName( $content, 'fre-FR' );
```

 


