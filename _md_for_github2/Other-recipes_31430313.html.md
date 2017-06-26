1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[API](API_31429524.html)</span>
4.  <span>[eZ Platform Public PHP API](eZ-Platform-Public-PHP-API_31429583.html)</span>
5.  <span>[Public API Guide](Public-API-Guide_31430303.html)</span>

<span id="title-text"> Developer : Other recipes </span>
========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Apr 22, 2016

Assigning Section to content
----------------------------

Full code

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<a href="https://github.com/docb22/ez-publish-cookbook/tree/master/EzSystems/CookBookBundle/Command/AssignContentToSectionCommand.php" class="external-link">https://github.com/ezsystems/CookbookBundle/tree/master/Command/AssignContentToSectionCommand.php</a>

The Section that a Content item belongs to can be set during creation, using the `ContentCreateStruct::$sectionId` property. However, as for many Repository objects properties, the Section can't be changed using a `ContentUpdateStruct`. The reason is still the same: changing a Content item's Section will affect the subtrees referenced by its Locations. For this reason, it is required that you use the SectionService to change the Section of a Content item.

**assign section to content**

``` brush:
$contentInfo = $contentService->loadContentInfo( $contentId );
$section = $sectionService->loadSection( $sectionId );
$sectionService->assignSection( $contentInfo, $section );
```

This operation involves the `SectionService`, as well as the `ContentService`.

**assign section to content**

``` brush:
$contentInfo = $contentService->loadContentInfo( $contentId );
```

We use `ContentService::loadContentInfo()` to get the Content we want to update the Section for.

**assign section to content**

``` brush:
$section = $sectionService->loadSection( $sectionId );
```

`SectionService::loadSection()` is then used to load the Section we want to assign our Content to. Note that there is no `SectionInfo` object. Sections are quite simple, and we don't need to separate their metadata from their actual data. However, `SectionCreateStruct` and <a href="http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/Content/SectionUpdateStruct.html" class="external-link"><code>SectionUpdateStruct</code></a> objects must still be used to create and update Sections.

**assign section to content**

``` brush:
$sectionService->assignSection( $contentInfo, $section );
```

The actual update operation is done using `SectionService::assignSection()`, with the `ContentInfo` and the Section as arguments.

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
`SectionService::assignSection()` won't return the updated Content, as it has no knowledge of those objects. To get the Content with the newly assigned Location, you need to reload the `ContentInfo` using <a href="http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentService.html#method_loadContentInfo" class="external-link"><code>ContentService::loadContentInfo()</code></a>. This is also valid for descendants of the Content item. If you have any stored in your execution state, you need to reload them. Otherwise you would be using outdated Content data.

Creating a Content Type
-----------------------

Full code

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<a href="https://github.com/ezsystems/CookbookBundle/blob/master/Command/CreateContentTypeCommand.php" class="uri" class="external-link">https://github.com/ezsystems/CookbookBundle/blob/master/Command/CreateContentTypeCommand.php</a>

Creating a `ContentType` is actually almost more complex than creating Content. It really isn't as common, and didn't "deserve" the same kind of API as Content did.

Let's split the code in three major parts.

``` brush:
try
{
    $contentTypeGroup = $contentTypeService->loadContentTypeGroupByIdentifier( 'content' );
}
catch ( \eZ\Publish\API\Repository\Exceptions\NotFoundException $e )
{
    $output->writeln( "content type group with identifier $groupIdentifier not found" );
    return;
}


$contentTypeCreateStruct = $contentTypeService->newContentTypeCreateStruct( 'mycontenttype' );
$contentTypeCreateStruct->mainLanguageCode = 'eng-GB';
$contentTypeCreateStruct->nameSchema = '<title>';
$contentTypeCreateStruct->names = array(
    'eng-GB' => 'My content type'
);
$contentTypeCreateStruct->descriptions = array(
    'eng-GB' => 'Description for my content type',
);
```

First, we need to load the `ContentTypeGroup` our `ContentType` will be created in. We do this using <a href="http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentTypeService.html#method_loadContentTypeGroupByIdentifier" class="external-link"><code>ContentTypeService::loadContentTypeGroupByIdentifier()</code></a>, which gives us back a `ContentTypeGroup` object. As for content, we then request a `ContentTypeCreateStruct` from the `ContentTypeService`, using `ContentTypeService::newContentTypeCreateStruct()`, with the desired identifier as the argument. 

Using the create struct's properties, we can set the Type's properties:

-   the main language (`mainLanguageCode`) for the Type is set to eng-GB,
-   the content name generation pattern (`nameSchema`) is set to '&lt;title&gt;': Content items of this type will be named the same as their 'title' field.
-   the human-readable name for our Type is set using the `names` property. We give it a hash, indexed by the locale ('eng-GB') the name is set in. This locale must exist in the system.
-   the same way that we have set the `names` property, we can set human-readable descriptions, again as hashes indexed by locale code.

The next big part is to add FieldDefinition objects to our Content Type.

``` brush:
// add a TextLine Field with identifier 'title'
$titleFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( 'title', 'ezstring' );
$titleFieldCreateStruct->names = array( 'eng-GB' => 'Title' );
$titleFieldCreateStruct->descriptions = array( 'eng-GB' => 'The Title' );
$titleFieldCreateStruct->fieldGroup = 'content';
$titleFieldCreateStruct->position = 10;
$titleFieldCreateStruct->isTranslatable = true;
$titleFieldCreateStruct->isRequired = true;
$titleFieldCreateStruct->isSearchable = true;
$contentTypeCreateStruct->addFieldDefinition( $titleFieldCreateStruct );


// add a TextLine Field body field
$bodyFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( 'body', 'ezstring' );
$bodyFieldCreateStruct->names = array( 'eng-GB' => 'Body' );
$bodyFieldCreateStruct->descriptions = array( 'eng-GB' => 'Description for Body' );
$bodyFieldCreateStruct->fieldGroup = 'content';
$bodyFieldCreateStruct->position = 20;
$bodyFieldCreateStruct->isTranslatable = true;
$bodyFieldCreateStruct->isRequired = true;
$bodyFieldCreateStruct->isSearchable = true;
$contentTypeCreateStruct->addFieldDefinition( $bodyFieldCreateStruct );
```

We need to create a `FieldDefinitionCreateStruct` object for each `FieldDefinition` our `ContentType` will be made of. Those objects are obtained using <a href="http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentTypeService.html#method_newFieldDefinitionCreateStruct" class="external-link"><code>ContentTypeService::newFieldDefinitionCreateStruct()</code></a>. This method expects the FieldDefinition identifier and its type as arguments. The identifiers match the ones from eZ Publish 4 (`ezstring` for TextLine, etc.).

Each field's properties are set using the create struct's properties:

-   `names` and `descriptions` are set using hashes indexed by the locale code, and with the name or description as an argument.
-   The `fieldGroup` is set to 'content'
-   Fields are ordered using the `position` property, ordered numerically in ascending order. We set it to an integer.
-   The translatable, required and searchable boolean flags are set using their respective property: `isTranslatable`, `isRequired` and `isSearchable`.

Once the properties for each create struct are set, the field is added to the Content Type create struct using <a href="http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/ContentType/ContentTypeCreateStruct.html#method_addFieldDefinition" class="external-link"><code>ContentTypeCreateStruct::addFieldDefinition()</code></a>.

``` brush:
try
{
    $contentTypeDraft = $contentTypeService->createContentType( $contentTypeCreateStruct, array( $contentTypeGroup ) );
    $contentTypeService->publishContentTypeDraft( $contentTypeDraft );
}
catch ( \eZ\Publish\API\Repository\Exceptions\UnauthorizedException $e )
{
    $output->writeln( "<error>" . $e->getMessage() . "</error>" );
}
catch ( \eZ\Publish\API\Repository\Exceptions\ForbiddenException $e )
{
    $output->writeln( "<error>" . $e->getMessage() . "</error>" );
}
```

The last step is the same as for Content: we create a Content Type draft using `ContentTypeService::createContentType()`, with the `ContentTypeCreateStruct` and an array of `ContentTypeGroup` objects are arguments. We then publish the Content Type draft using `ContentTypeService::publishContentTypeDraft()`.

 

#### In this topic:

-   [Assigning Section to content](#Otherrecipes-AssigningSectiontocontent)
-   [Creating a Content Type](#Otherrecipes-CreatingaContentType)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


