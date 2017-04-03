<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Content Rendering](Content-Rendering_31429679.html)
5.  [Twig Functions Reference](Twig-Functions-Reference_32114025.html)

</div>
**Developer : ez\_trans\_prop**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Dec 31, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

`ez_trans_prop()` is a generic, low level Twig helper which gets the
translated value of a multi valued(translations) property.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If the current language cannot be found as a translation for content,
the main language (see [further down for
details](#ez_trans_prop-ez_trans_prop-Mainlanguageuse)) will be used if
this is supported by the provided **object**. This behavior is identical
when forcing a language using **forcedLanguage.**

</div>
</div>
**Prototype and Arguments**

`ez_trans_prop( ValueObject object, string property[, string forcedLanguage] )`

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Argument name            | Type                     | Description              |
+==========================+==========================+==========================+
| `object`                 | `eZ\Publish\API\Reposit  | ValueObject              |
|                          | ory\Values\ValueObject`  | object **property** be   |
|                          |                          | longs to.                |
+--------------------------+--------------------------+--------------------------+
| property                 | `string`                 | Property to get          |
|                          |                          | translated value from,   |
|                          |                          | logic is using one of    |
|                          |                          | the following *(in this  |
|                          |                          | order)*:                 |
|                          |                          |                          |
|                          |                          | - *object method*        |
|                          |                          | :   “get{**property**}”  |
|                          |                          |                          |
|                          |                          | \*                       |
|                          |                          |                          |
|                          |                          | :   \*                   |
|                          |                          |                          |
|                          |                          | - *object property*      |
|                          |                          |                          |
|                          |                          | :    “{**property**}s”   |
+--------------------------+--------------------------+--------------------------+
| `forcedLanguage`         | `string`                 | Optional language we     |
|                          |                          | want to force *(e.g.     |
|                          |                          | “`eng-US`”)*, otherwise  |
|                          |                          | takes prioritized        |
|                          |                          | languages from           |
|                          |                          | SiteAccess settings.     |
+--------------------------+--------------------------+--------------------------+

</div>
**Main language use**

Main language is attempted to be applied in the following way for Value
objects that support this:

-   *When attribute is retrieved via object property*: Use
    **mainLanguageCode** property if it exists as fallback language, but
    only if either **alwaysAvailable** property does not exists or
    is true.
-   **When attribute is*retrieved* via object \*method\*: Provide
    `$language = null` as the only argument to the method, depends on
    logic of ValueObject if this gives a fallback value or not

**Usage of ez\_trans\_prop**

Example below shows how this function can be used to get the Content
name with exact same result as using `ez_content_name(content)`

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_trans_prop( versionInfo, "name" ) }}
```

</div>
</div>
Example for `ContentType->names`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_trans_prop( contentType, "name" ) }}
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
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

