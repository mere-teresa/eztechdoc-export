1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Search](Search_31429673.html)</span>

<span id="title-text"> Developer : Sort Clauses Reference </span> {#title-heading .pagetitle}
=================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Nov 17, 2016

**Sort Clauses** are the *sorting options* for Content and Location
Search in eZ Platform. For generic use of API Search see <span
class="confluence-link">[Search Criteria and Sort
Clauses](#SortClausesReference-SearchCriteriaandSortClauses)</span>.

A Sort Clause consists of two parts just like <span
class="confluence-link"><span class="confluence-link">Criterion</span>
</span>and FacetBuilder:

-   The API Value: `SortClause`
-   Specific handler per search engine: `SortClausesHandler`

The `SortClause` represents the value you use in the API, while
`SortClauseHandler` deals with the business logic in the background,
translating the value to something the Search engine can understand.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Implementation and availability of a handler sometimes depends on search
engine capabilities and limitations.

### Common concepts for all <span>Sort Clauses </span> {#SortClausesReference-CommonconceptsforallSortClauses}

For how to use each and every <span>Sort Clause,</span> see list below
as it depends on the <span>Sort Clause</span> Value constructor, but *in
general* you should be aware of the following common concept:

-   `sortDirection`: The direction to perform the sort,
    either `Query::SORT_ASC`*(default)* or
    `         Query::         SORT_DESC`

<span style="color: rgb(102,14,122);">  
</span>

<span style="color: rgb(102,14,122);"> </span>

<span class="status-macro aui-lozenge aui-lozenge-current">V1.6.0</span>

You can use the method
`SearchService::getSortClauseFromLocation( Location $location )` to
return an array of Sort Clauses that you can use on
`LocationQuery->sortClauses`.

<span style="color: rgb(102,14,122);">  
</span>

### List of <span>Sort Clauses </span> {#SortClausesReference-ListofSortClauses}

The list below reflects <span>Sort Clauses</span> available in the
`eZ\Publish\API\Repository\Values\Content\Query\SortClause` namespace
(it is also possible to <span class="confluence-link">make a custom Sort
Clause</span>):

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Arguments starting with "`?`" are optional.

#### Only for LocationSearch {#SortClausesReference-OnlyforLocationSearch}

| <span>Sort Clause</span>        | Constructor arguments description |
|---------------------------------|-----------------------------------|
| `Location\Depth `               | ?`sortDirection`                  |
| `           Location\Id `       | <span>?</span>`sortDirection`     |
| `Location\IsMainLocation `      | <span>?</span>`sortDirection`     |
| `           Location\Depth `    | <span>?</span>`sortDirection`     |
| `           Location\Priority ` | <span>?</span>`sortDirection`     |
| `Location\Visibility `          | ?`sortDirection`                  |

 

#### Common {#SortClausesReference-Common}

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><span>Sort Clause</span></th>
<th align="left">Constructor arguments description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>ContentId</code></td>
<td align="left"><code>?sortDirection</code></td>
</tr>
<tr class="even">
<td align="left"><code>ContentName</code></td>
<td align="left"><span> <code>?sortDirection</code> </span></td>
</tr>
<tr class="odd">
<td align="left"><code>DateModified</code></td>
<td align="left"><code>?sortDirection</code></td>
</tr>
<tr class="even">
<td align="left"><code>           DatePublished         </code></td>
<td align="left"><code>?sortDirection</code></td>
</tr>
<tr class="odd">
<td align="left"><code>Field</code></td>
<td align="left"><p><code>typeIdentifier</code> as string<code>, fieldIdentifier</code> as string<code>, ?sortDirection, ?languageCode </code>as string</p></td>
</tr>
<tr class="even">
<td align="left"><code>MapLocationDistance </code></td>
<td align="left"><span> <code>typeIdentifier</code> <span> as string</span> <code>, fieldIdentifier</code> <span> as string</span> <code>, </code> <code>             latitude</code> <span> as</span> <span> float</span> <code>,</code> <span> </span> <code>             longitude</code> <span> as</span> <span> float, ?</span> </span> <code>sortDirection, ?languageCode</code> <span> as string</span></td>
</tr>
<tr class="odd">
<td align="left"><code>SectionIdentifier</code></td>
<td align="left"><span> ?<code>sortDirection</code> </span></td>
</tr>
<tr class="even">
<td align="left"><code>SectionName</code></td>
<td align="left"><span> ?<code>sortDirection</code> </span></td>
</tr>
</tbody>
</table>

#### In this topic: {#SortClausesReference-Inthistopic:}

-   [Common concepts for all Sort
    Clauses ](#SortClausesReference-CommonconceptsforallSortClauses)
-   [List of Sort Clauses ](#SortClausesReference-ListofSortClauses)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


