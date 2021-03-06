1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Cookbook](Cookbook_31429528.html)</span>

<span id="title-text"> Developer : Paginating API search results </span>
========================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on May 17, 2016

Description
===========

When listing content (e.g. blog posts), pagination is a very common use case and is usually painful to implement by hand.

For this purpose eZ Platform recommends the use of <a href="https://github.com/whiteoctober/Pagerfanta" class="external-link">Pagerfanta library</a> and <a href="https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/Core/Pagination/Pagerfanta" class="external-link">proposes adapters for it</a>.

Solution
========

``` brush:
<?php
namespace Acme\TestBundle\Controller;
 
use eZ\Publish\Core\Pagination\Pagerfanta\ContentSearchAdapter;
use Pagerfanta\Pagerfanta;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeIdentifier;
use eZ\Publish\API\Repository\Values\Content\Query;
 
class DefaultController extends Controller
{
    public function myContentListAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        // First build the search query.
        // Let's search for folders, sorted by publication date.
        $query = new Query();
        $query->criterion = new ContentTypeIdentifier( 'folder' );
        $query->sortClauses = array( new SortClause\DatePublished() );
 
        // Initialize the pager.
        // We pass the ContentSearchAdapter to it.
        // ContentSearchAdapter is built with your search query and the SearchService.
        $pager = new Pagerfanta( 
            new ContentSearchAdapter( $query, $this->getRepository()->getSearchService() ) 
        );
        // Let's list 2 folders per page, even if it doesn't really make sense ;-)
        $pager->setMaxPerPage( 2 );
        // Defaults to page 1 or get "page" query parameter
        $pager->setCurrentPage( $this->getRequest()->get( 'page', 1 ) );
 
        return $this->render(
            'AcmeTestBundle::my_template.html.twig',
            array(
                'totalFolderCount' => $pager->getNbResults(),
                'pagerFolder' => $pager,
                'location' => $this->getRepository()->getLocationService()->loadLocation( $locationId ),
            ) + $params
        );
    }
}
```

**my\_template.html.twig**

``` brush:
{% block content %}
    <h1>Listing folder content objects: {{ totalFolderCount }} objects found.</h1>
 
    <div>
        <ul>
        {# Loop over the page results #}
        {% for folder in pagerFolder %}
            <li>{{ ez_content_name( folder ) }}</li>
        {% endfor %}
        </ul>
    </div>
 
    {# Only display pagerfanta navigator if needed. #}
    {% if pagerFolder.haveToPaginate() %}
    <div class="pagerfanta">
        {{ pagerfanta( pagerFolder, 'twitter_bootstrap_translated', {'routeName': location} ) }}
    </div>
    {% endif %}
 
{% endblock %}
```

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
For more information and examples, have a look at <a href="https://github.com/whiteoctober/Pagerfanta/blob/master/README.md" class="external-link">PagerFanta documentation</a>.

Adapters
--------

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Adapter class name</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\Core\Pagination\Pagerfanta\ContentSearchAdapter</code></pre></td>
<td align="left">Makes the search against passed Query and returns <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/Content.php" class="external-link">Content</a> objects.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>eZ\Publish\Core\Pagination\Pagerfanta\ContentSearchHitAdapter</code></pre></td>
<td align="left">Same as ContentSearchAdapter but returns instead <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/Search/SearchHit.php" class="external-link">SearchHit</a> objects.</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\Core\Pagination\Pagerfanta\LocationSearchAdapter</code></pre></td>
<td align="left">Makes a Location search against passed Query and returns Location objects.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>eZ\Publish\Core\Pagination\Pagerfanta\LocationSearchHitAdapter</code></pre></td>
<td align="left">Same as LocationSearchAdapter but returns instead <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/Search/SearchHit.php" class="external-link">SearchHit</a> objects.</td>
</tr>
</tbody>
</table>

 

 

#### In this topic:

-   [Description](#PaginatingAPIsearchresults-Description)
-   [Solution](#PaginatingAPIsearchresults-Solution)
    -   [Adapters](#PaginatingAPIsearchresults-Adapters)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


