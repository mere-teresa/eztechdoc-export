# Sort Clauses Reference

**Sort Clauses** are the *sorting options* for Content and Location Search in eZ Platform. For generic use of API Search see Search Criteria and Sort Clauses.

A Sort Clause consists of two parts just like Criterion and FacetBuilder:

-   The API Value: `SortClause`
-   Specific handler per search engine: `SortClausesHandler`

The `SortClause` represents the value you use in the API, while `SortClauseHandler` deals with the business logic in the background, translating the value to something the Search engine can understand.

Implementation and availability of a handler sometimes depends on search engine capabilities and limitations.

### Common concepts for all Sort Clauses 

For how to use each and every Sort Clause, see list below as it depends on the Sort Clause Value constructor, but *in general* you should be aware of the following common concept:

-   `sortDirection`: The direction to perform the sort, either `Query::SORT_ASC`*(default)* or `         Query::         SORT_DESC`

 

V1.6.0

You can use the method `SearchService::getSortClauseFromLocation( Location $location )` to return an array of Sort Clauses that you can use on `LocationQuery->sortClauses`.

### List of Sort Clauses 

The list below reflects Sort Clauses available in the `eZ\Publish\API\Repository\Values\Content\Query\SortClause` namespace (it is also possible to make a custom Sort Clause):

Arguments starting with "`?`" are optional.

#### Only for LocationSearch

| Sort Clause                     | Constructor arguments description |
|---------------------------------|-----------------------------------|
| `Location\Depth `               | ?`sortDirection`                  |
| `           Location\Id `       | ?`sortDirection`                  |
| `Location\IsMainLocation `      | ?`sortDirection`                  |
| `           Location\Depth `    | ?`sortDirection`                  |
| `           Location\Priority ` | ?`sortDirection`                  |
| `Location\Visibility `          | ?`sortDirection`                  |

 

#### Common

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Sort Clause</th>
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
<td align="left">?sortDirection</td>
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
<td align="left">typeIdentifier as string , fieldIdentifier as string , latitude as float ,   longitude as float, ? <code>sortDirection, ?languageCode</code> as string</td>
</tr>
<tr class="odd">
<td align="left"><code>SectionIdentifier</code></td>
<td align="left"> ?sortDirection</td>
</tr>
<tr class="even">
<td align="left"><code>SectionName</code></td>
<td align="left"> ?sortDirection</td>
</tr>
</tbody>
</table>

#### In this topic:

-   [Common concepts for all Sort Clauses ](#SortClausesReference-CommonconceptsforallSortClauses)
-   [List of Sort Clauses ](#SortClausesReference-ListofSortClauses)


