# ez\_trans\_prop

#### Description

`ez_trans_prop()` is a generic, low level Twig helper which gets the translated value of a multi valued(translations) property.

If the current language cannot be found as a translation for content, the main language (see [further down for details](#ez_trans_prop-ez_trans_prop-Mainlanguageuse)) will be used if this is supported by the provided **object**. This behavior is identical when forcing a language using **forcedLanguage.**

#### Prototype and Arguments

`ez_trans_prop( ValueObject object, string property[, string forcedLanguage] )`

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Argument name</th>
<th align="left">Type</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>object</code></td>
<td align="left"><code>eZ\Publish\API\Repository\Values\ValueObject</code></td>
<td align="left">ValueObject object <strong>property</strong> belongs to.</td>
</tr>
<tr class="even">
<td align="left">property</td>
<td align="left"><code>string</code></td>
<td align="left">Property to get translated value from, logic is using one of the following <em>(in this order)</em>:
<ul>
<li><em>object method</em> &quot;get{<strong>property</strong>}&quot; <em><br />
</em></li>
<li><em>object property</em>  &quot;{<strong>property</strong>}s&quot;</li>
</ul></td>
</tr>
<tr class="odd">
<td align="left"><code>forcedLanguage</code></td>
<td align="left"><code>string</code></td>
<td align="left">Optional language we want to force <em>(e.g. &quot;<code>eng-US</code>&quot;)</em>, otherwise takes prioritized languages from SiteAccess settings.</td>
</tr>
</tbody>
</table>

##### Main language use

Main language is attempted to be applied in the following way for Value objects that support this:

-   When attribute is retrieved via object property: Use mainLanguageCode property if it exists as fallback language, but only if either alwaysAvailable property does not exists or is true.

<!-- -->

-   **When attribute is *retrieved* via object *method*: Provide `$language = null` as the only argument to the method, depends on logic of ValueObject if this gives a fallback value or not

#### Usage of ez\_trans\_prop

Example below shows how this function can be used to get the Content name with exact same result as using `ez_content_name(content)`

```
{{ ez_trans_prop( versionInfo, "name" ) }}
```

Example for `ContentType->names`:

```
{{ ez_trans_prop( contentType, "name" ) }}
```


