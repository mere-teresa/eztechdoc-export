<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Search](Search_31429673.html)

</div>
**Developer : Sort Clauses Reference**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Nov 17, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Sort Clauses** are the *sorting options* for Content and Location
Search in eZ Platform. For generic use of API Search see [Search
Criteria and Sort
Clauses](#SortClausesReference-SearchCriteriaandSortClauses).

A Sort Clause consists of two parts just like Criterion and
FacetBuilder:

-   The API Value: `SortClause`
-   Specific handler per search engine: `SortClausesHandler`

The `SortClause` represents the value you use in the API, while
`SortClauseHandler` deals with the business logic in the background,
translating the value to something the Search engine can understand.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Implementation and availability of a handler sometimes depends on search
engine capabilities and limitations.

</div>
</div>
**Common concepts for all Sort Clauses **

For how to use each and every Sort Clause, see list below as it depends
on the Sort Clause Value constructor, but *in general* you should be
aware of the following common concept:

-   `sortDirection`: The direction to perform the sort,
    either `Query::SORT_ASC`*(default)* or `Query::         SORT_DESC`

 

V1.6.0

You can use the method
`SearchService::getSortClauseFromLocation( Location $location )` to
return an array of Sort Clauses that you can use on
`LocationQuery->sortClauses`.

**List of Sort Clauses **

The list below reflects Sort Clauses available in the
`eZ\Publish\API\Repository\Values\Content\Query\SortClause` namespace
(it is also possible to make a custom Sort Clause):

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Arguments starting with “`?`” are optional.

</div>
</div>
**Only for LocationSearch**

<div class="table-wrap">
  Sort Clause                          Constructor arguments description
  ------------------------------------ ------------------------------------
  `Location\Depth `                    ?`sortDirection`
  `Location\Id `                       ?`sortDirection`
  `Location\IsMainLocation `           ?`sortDirection`
  `Location\Depth `                    ?`sortDirection`
  `Location\Priority `                 ?`sortDirection`
  `Location\Visibility `               ?`sortDirection`

</div>
 

**Common**

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Sort Clause                          | Constructor arguments description    |
+======================================+======================================+
| `ContentId`                          | `?sortDirection`                     |
+--------------------------------------+--------------------------------------+
| `ContentName`                        | > `?sortDirection`                   |
+--------------------------------------+--------------------------------------+
| `DateModified`                       | `?sortDirection`                     |
+--------------------------------------+--------------------------------------+
| \`           DatePublished           | `?sortDirection`                     |
| \`                                   |                                      |
+--------------------------------------+--------------------------------------+
| `Field`                              | `typeIdentifier` as                  |
|                                      | string`, fieldIdentifier` as         |
|                                      | string`, ?sortDirection, ?languag eC |
|                                      | ode`as                               |
|                                      | string                               |
+--------------------------------------+--------------------------------------+
| `MapLocationDistance `               | > `typeIdentifier` as string         |
|                                      |                                      |
|                                      | `, fieldIdentifier` as string `,`    |
|                                      | `latitude` as float `,`              |
|                                      | `longitude` as float, ?              |
|                                      | `sortDirection, ?languageCode` as    |
|                                      | string                               |
+--------------------------------------+--------------------------------------+
| `SectionIdentifier`                  |  ?`sortDirection`                    |
+--------------------------------------+--------------------------------------+
| `SectionName`                        |  ?`sortDirection`                    |
+--------------------------------------+--------------------------------------+

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376000598">
-   [Common concepts for all Sort
    Clauses ](#SortClausesReference-CommonconceptsforallSortClauses)
-   [List of Sort Clauses ](#SortClausesReference-ListofSortClauses)

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

