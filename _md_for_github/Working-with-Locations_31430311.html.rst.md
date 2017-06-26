<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [API](API_31429524.html)
4.  [eZ Platform Public PHP API](eZ-Platform-Public-PHP-API_31429583.html)
5.  [Public API Guide](Public-API-Guide_31430303.html)

</div>
**Developer : Working with Locations**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 22, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Adding a new Location to a Content item**

<div
class="confluence-information-macro confluence-information-macro-information">
Full code

<div class="confluence-information-macro-body">
<https://github.com/ezsystems/CookbookBundle/blob/master/Command/AddLocationToContentCommand.php>

</div>
</div>
We have seen earlier how you can create a Location for a newly created `Content`. It is of course also possible to add a new `` `Location `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/Content/Location.html>&gt;\_\_
to an existing Content.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    try
    {
        $locationCreateStruct = $locationService-&gt;newLocationCreateStruct( $parentLocationId );
        $contentInfo = $contentService-&gt;loadContentInfo( $contentId );
        $newLocation = $locationService-&gt;createLocation( $contentInfo, $locationCreateStruct );
        print\_r( $newLocation );
    }
    // Content or location not found
    catch ( \\eZ\\Publish\\API\\Repository\\Exceptions\\NotFoundException $e )
    {
        $output-&gt;writeln( $e-&gt;getMessage() );
    }
    // Permission denied
    catch ( \\eZ\\Publish\\API\\Repository\\Exceptions\\UnauthorizedException $e )
    {
        $output-&gt;writeln( $e-&gt;getMessage() );
    }

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

This is the required code. As you can see, both the ContentService and
the LocationService are involved. Errors are handled the usual way, by
intercepting the Exceptions the used methods may throw.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    $locationCreateStruct = $locationService-&gt;newLocationCreateStruct( $parentLocationId );

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

Like we do when creating a new Content item, we need to get a new
LocationCreateStruct. We will use it to set our new
`Location` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/Content/Location.html>&gt;\_\_'s
properties. The new Location's parent ID is provided as a parameter to
LocationService::newLocationCreateStruct.

In this example, we use the default values for the various
LocationCreateStruct\` properties. We could of course have set custom values, like setting the Location as hidden ($location-&gt;hidden = true), or changed the remoteId (`$location->remoteId = $myRemoteId`).

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$contentInfo = $contentService->loadContentInfo( $contentId );
```

</div>
</div>
To add a Location to a Content item, we need to specify the Content, using a `` `ContentInfo `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/Content/ContentInfo.html>&gt;\_\_
object. We load one using ContentService::loadContentInfo(), using
the Content ID as the argument.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    $newLocation = $locationService-&gt;createLocation( $contentInfo, $locationCreateStruct );

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

We finally use LocationService::createLocation(), providing the
ContentInfo\` obtained above, together with our `LocationCreateStruct`. The method returns the newly created Location Value Object.

**Hide/Unhide Location**

<div
class="confluence-information-macro confluence-information-macro-information">
Full code

<div class="confluence-information-macro-body">
<https://github.com/ezsystems/CookbookBundle/blob/master/Command/HideLocationCommand.php>

</div>
</div>
We mentioned earlier that a Location's visibility could be set while creating the Location, using the hidden property of the LocationCreateStruct. Changing a Location's visibility may have a large impact in the Repository: doing so will affect the Location's subtree visibility. For this reason, a `LocationUpdateStruct` doesn't let you toggle this property. You need to use the `LocationService` to do so.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$hiddenLocation = $locationService->hideLocation( $location );
$unhiddenLocation = $locationService->unhideLocation( $hiddenLocation );
```

</div>
</div>
There are two methods for this: `LocationService::hideLocation`, and `LocationService::unhideLocation()`. Both expect the `LocationInfo` as their argument, and return the modified Location Value Object.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
The explanation above is valid for most Repository objects. Modification of properties that affect other parts of the system will require that you use a custom service method.

</div>
</div>
**Deleting a Location**

Deleting Locations can be done in two ways: delete, or trash. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$locationService->deleteLocation( $locationInfo );
```

</div>
</div>
`` `LocationService::deleteLocation() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/LocationService.html#method_deleteLocation>&gt;\_\_
will permanently delete the Location, as well as all its descendants.
Content that has only one Location will be permanently deleted as well.
Those with more than one won't be, as they are still referenced by at
least one Location.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    $trashService-&gt;trash( $locationInfo );

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

TrashService::trash()\` will send the Location as well as all its descendants to the Trash, where they can be found and restored until the Trash is emptied. Content isn't affected at all, since it is still referenced by the trash items.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
The `TrashService` can be used to list, restore and delete Locations that were previously sent to Trash using `` `TrashService::trash() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/TrashService.html#method_trash>&gt;\_\_.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Setting a content item's main Location
   :name: WorkingwithLocations-Settingacontentitem'smainLocation

This is done using the ContentService, by updating the
ContentInfo\` with a `ContentUpdateStruct` that sets the new main location:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$repository = $this->getContainer()->get( 'ezpublish.api.repository' );
$contentService = $repository->getContentService();
$contentInfo = $contentService->loadContentInfo( $contentId );

$contentUpdateStruct = $contentService->newContentMetadataUpdateStruct();
$contentUpdateStruct->mainLocationId = 123;

$contentService->updateContentMetadata( $contentInfo, $contentUpdateStruct );
```

</div>
</div>
Credits to [Gareth Arnott](https://doc.ez.no/display/~arnottg) for the snippet.

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375991077">
-   [Adding a new Location to a Content item](#WorkingwithLocations-AddinganewLocationtoaContentitem)
-   [Hide/Unhide Location](#WorkingwithLocations-Hide/UnhideLocation)
-   [Deleting a Location](#WorkingwithLocations-DeletingaLocation)
-   [Setting a content item's main Location](#WorkingwithLocations-Settingacontentitem'smainLocation)

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
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

