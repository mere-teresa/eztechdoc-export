1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Content Rendering](Content-Rendering_31429679.html)</span>
5.  <span>[Twig Functions
    Reference](Twig-Functions-Reference_32114025.html)</span>

<span id="title-text"> Developer : ez\_content\_name </span> {#title-heading .pagetitle}
============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Dec 31, 2016

#### Description {#ez_content_name-Description}

`ez_content_name()` is a Twig helper which allows displaying a Content
item’s name in the current language.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If the current language cannot be found as a translation for content,
the name in the main language is always returned. This behavior is
identical when forcing a language.

#### Prototype and Arguments {#ez_content_name-PrototypeandArguments}

`ez_content_name( eZ\Publish\API\Repository\Values\Content\Content content[, string forcedLanguage] )ez_content_name(contentInfo[, string forcedLanguage] ) `

| Argument name    | Type                                                                                                            | Description                                                                                            |
|------------------|-----------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`        | `eZ\Publish\API\Repository\Values\Content\Content`**or**`eZ\Publish\API\Repository\Values\Content\ContentInfo ` | Content or ContentInfo object the displayable field belongs to.                                        |
| `forcedLanguage` | `string`                                                                                                        | Locale we want the content name translation in (e.g. “fre-FR”). Null by default (takes current locale) |

#### Usage {#ez_content_name-Usage}

 

~~~~ brush:
<h2>Content name in current language: {{ ez_content_name( content ) }}</h2>
<h2>Content name in current language, from ContentInfo: {{ ez_content_name( content.contentInfo ) }}</h2>
<h2>Content name in french (forced): {{ ez_content_name( content, "fre-FR" ) }}</h2>
~~~~

#### Equivalent PHP code {#ez_content_name-EquivalentPHPcode}

##### Getting the translated name for a Content item {#ez_content_name-GettingthetranslatednameforaContentitem}

~~~~ brush:
// Assuming we're in a controller action
$translationHelper = $this->get( 'ezpublish.translation_helper' );
 
// From Content
$translatedContentName = $translationHelper->getTranslatedContentName( $content );
// From ContentInfo
$translatedContentName = $translationHelper->getTranslatedContentNameByContentInfo( $contentInfo );
~~~~

##### Forcing a specific language {#ez_content_name-Forcingaspecificlanguage}

~~~~ brush:
// Assuming we're in a controller action
$translatedContentName = $this->get( 'ezpublish.translation_helper' )->getTranslatedName( $content, 'fre-FR' );
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)

