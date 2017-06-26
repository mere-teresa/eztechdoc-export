1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Cookbook](Cookbook_31429528.html)</span>

<span id="title-text"> Developer : Displaying children of a Content item </span>
================================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Nov 28, 2016

Description
===========

One of the basic design tasks you may need to complete when creating your website is configuring one page to display all of its children. Examples are having a blog display blog posts, of a folder that shows <span class="inline-comment-marker" data-ref="77916aad-aa82-477b-b486-5ee37dce91c4">all articles it contains</span>.

Solution
========

There are two ways to make a Content item display it<span class="inline-comment-marker" data-ref="fdef209c-770f-4509-8e54-32c81610e3c0">s childre</span>n:

1.  [Using a Custom Controller](#DisplayingchildrenofaContentitem-UsingaCustomController)
2.  [Using the Query Controller](#DisplayingchildrenofaContentitem-UsingtheQueryController)

This recipe will show how to use both those methods to display all children of a Content item with the Content Type Folder.

Using a Custom Controller
-------------------------

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
There are three different ways of using a Custom Controller that you can learn about in the [Custom Controller page](https://doc.ez.no/display/DEVELOPER/Content+Rendering#ContentRendering-Customcontrollers). In this case we will be applying the first of these, that is using the Custom Controller alongside the built-in ViewController.

Configuring for the use of a C<span class="inline-comment-marker" data-ref="ea02127a-ca1a-499b-9218-ffff81810087">ustom Controller starts w</span>ith pointing to it in your standard view <span class="inline-comment-marker" data-ref="38edeeb0-0932-49ef-99b3-a33f0f662169">configuration</span> (which you can keep in `ezplatform.yml` or a separate file, for example `views.yml`):

``` brush:
folder:
    controller: app.controller.folder:showAction
    template: "full/folder.html.twig"
    match:
        Identifier\ContentType: "folder"
```

Besides the standard view config, under the `controller` key you need to provide here the path to the Controller and the action. They are defined in the following file:

**AppBundle/Controller/FolderController.php**

``` brush:
<?php

namespace AppBundle\Controller;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\Core\MVC\ConfigResolverInterface;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use AppBundle\Criteria\Children;

class FolderController {

    /** @var \eZ\Publish\API\Repository\SearchService */
    protected $searchService;

    /** @var \eZ\Publish\Core\MVC\ConfigResolverInterface */
    protected $configResolver;

    /** @var \AppBundle\Criteria\Children */
    protected $childrenCriteria;

    /**
     * @param \eZ\Publish\API\Repository\SearchService $searchService
     * @param \eZ\Publish\Core\MVC\ConfigResolverInterface $configResolver
     * @param \AppBundle\Criteria\Children $childrenCriteria
     */
    public function __construct(
        SearchService $searchService,
        ConfigResolverInterface $configResolver,
        Children $childrenCriteria
    ) {
        $this->searchService = $searchService;
        $this->configResolver = $configResolver;
        $this->childrenCriteria = $childrenCriteria;
    }

    /**
     * Displays blog posts and gallery images on home page.
     *
     * @param \eZ\Publish\Core\MVC\Symfony\View\ContentView $view
     *
     * @return \eZ\Publish\Core\MVC\Symfony\View\ContentView
     */
    public function showAction(ContentView $view)
    {
        $view->addParameters([
            //'content' => $this->contentService->loadContentByContentInfo($view->getLocation()->getContentInfo()),
            'items' => $this->fetchItems($view->getLocation(), 25),
        ]);
        return $view;
    }

    private function fetchItems($location, $limit)
    {
        $languages = $this->configResolver->getParameter('languages');
        $query = new Query();
        //$location = $this->locationService->loadLocation($locationId);

    $query->query = $this->childrenCriteria->generateChildCriterion($location, $languages);
        $query->performCount = false;
        $query->limit = $limit;
        $query->sortClauses = [
            new SortClause\DatePublished(Query::SORT_DESC),
        ];
        $results = $this->searchService->findContent($query);
        $items = [];
        foreach ($results->searchHits as $item) {
            $items[] = $item->valueObject;
        }
        return $items;
    }

}
```

As you can see, this Controller makes use of the `generateChildCriterion`, which means you need to provide a file containing this function:

**AppBundle/Criteria/Children.php**

``` brush:
<?php

namespace AppBundle\Criteria;

use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class Children
{
    /**
     * Generate criterion list to be used to fetch sub-items.
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location location of the root
     * @param string[] $languages array of languages
     *
     * @return \eZ\Publish\API\Repository\Values\Content\Query\Criterion
     */
    public function generateChildCriterion(Location $location, array $languages = [])
    {
        return new Criterion\LogicalAnd([
            new Criterion\Visibility(Criterion\Visibility::VISIBLE),
            new Criterion\ParentLocationId($location->id),
            new Criterion\Subtree($location->pathString),
            new Criterion\LanguageCode($languages),
        ]);
    }
}
```

Next, you must register these two services:

**AppBundle/Resources/config/services.yml**

``` brush:
services:

    app.criteria.children:
        class: AppBundle\Criteria\Children

    app.controller.folder:
        class: AppBundle\Controller\FolderController
        arguments:
            - '@ezpublish.api.service.search'
            - '@ezpublish.config.resolver'
            - '@app.criteria.children'
```

Finally, let's use the Controller in a template:

**app/Resources/views/full/folder.html.twig**

``` brush:
<h1>{{ ez_content_name(content) }}</h1>

{% for item in items %}
  <h2>{{ ez_content_name(item) }}</h2>
{% endfor %}
```

This template makes use of the `items` specified in the Controller file to list every child of the folder.

Using the Query Controller
--------------------------

The Query Controller is a predefined custom content view Controller that runs a Repository Query.

If you need to create a simple query it's easier to use the Query Controller than to build a completely custom one, as you will not have to write custom PHP code. Like with a Custom Controller, however, you will be able to use properties of the viewed Content or Location as parameters.

The main file in this case is a `LocationChildrenQueryType.php` file which generates a Query that retrieves the children of the current Location.

**AppBundle/QueryType/LocationChildrenQueryType.php**

``` brush:
<?php
namespace AppBundle\QueryType;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ParentLocationId;
use eZ\Publish\Core\QueryType\QueryType;

class LocationChildrenQueryType implements QueryType
{
    public function getQuery(array $parameters = [])
    {
        return new LocationQuery([
            'filter' => new ParentLocationId($parameters['parentLocationId']),
        ]);
    }

    public function getSupportedParameters()
    {
        return ['parentLocationId'];
    }
//
    public static function getName()
    //
        return 'LocationChildren';
    }
}
```

Next, in your standard view configuration file include a block that indicates when this Controller will be used. It is similar to regular view config, but contains additional information:

``` brush:
folder:
    controller: "ez_query:locationQueryAction"
    template: "full/folder.html.twig"
    match:
        Identifier\ContentType: "folder"
    params:
        query:
            query_type: 'LocationChildren'
            parameters:
                parentLocationId: "@=location.id"
            assign_results_to: 'items'
```

In this case the `controller` key points to the Query Controller's `locationQuery` action. `assign_results_to` identifies the parameter containing all the retrieved children that will later be used in the templates:

**app/Resources/views/full/folder.html.twig**

``` brush:
<h1>{{ ez_content_name(content) }}</h1>

{% for item in items.searchHits %}
  <h2>{{ ez_content_name(item.valueObject.contentInfo) }}</h2>
{% endfor %}
```

This template makes use of the `items` specified in `assign_results_to` to list every child of the folder.

#### In this topic:

-   [Description](#DisplayingchildrenofaContentitem-Description)
-   [Solution](#DisplayingchildrenofaContentitem-Solution)
    -   [Using a Custom Controller](#DisplayingchildrenofaContentitem-UsingaCustomController)
    -   [Using the Query Controller](#DisplayingchildrenofaContentitem-UsingtheQueryController)

#### Related topics:

[Custom Controller](https://doc.ez.no/display/DEVELOPER/Content+Rendering#ContentRendering-Customcontrollers)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


