1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Content Rendering](Content-Rendering_31429679.html)</span>
5.  <span>[Twig Functions Reference](Twig-Functions-Reference_32114025.html)</span>

<span id="title-text"> Developer : ez\_field\_value </span>
===========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Dec 31, 2016

#### Description

`ez_field_value()` is a Twig helper which returns a Content item's field value in the current language.

This can be useful when you don't want to use [<span class="confluence-link">ez\_render\_field</span>](#ez_field_value-ez_render_field)<span class="confluence-link"> </span> and manage the rendering by yourself.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when <span>forcing a language using </span>**forcedLanguage.**

#### Prototype and Arguments

`ez_field_value( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefIdentifier[, string forcedLanguage] )`

| Argument name        | Type                                               | Description                                                                                            |
|----------------------|----------------------------------------------------|--------------------------------------------------------------------------------------------------------|
| `content`            | `eZ\Publish\API\Repository\Values\Content\Content` | Content object the field referred to with **fieldDefIdentifier** belongs to.                           |
| `fieldDefIdentifier` | `string`                                           | Identifier of the field we want to get the value from.                                                 |
| `forcedLanguage`     | `string`                                           | Locale we want the content name translation in (e.g. "fre-FR"). Null by default (takes current locale) |

#### Usage

``` brush:
<h2>My title value: {{ ez_field_value( content, "title" ) }}</h2>
```

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)

