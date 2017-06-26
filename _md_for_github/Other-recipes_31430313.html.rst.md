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
**Developer : Other recipes**

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
**Assigning Section to content**

<div
class="confluence-information-macro confluence-information-macro-information">
Full code

<div class="confluence-information-macro-body">
[<https://github.com/ezsystems/CookbookBundle/tree/master/Command/AssignContentToSectionCommand.php>](https://github.com/docb22/ez-publish-cookbook/tree/master/EzSystems/CookBookBundle/Command/AssignContentToSectionCommand.php)

</div>
</div>
The Section that a Content item belongs to can be set during creation, using the `ContentCreateStruct::$sectionId` property. However, as for many Repository objects properties, the Section can't be changed using a `ContentUpdateStruct`. The reason is still the same: changing a Content item's Section will affect the subtrees referenced by its Locations. For this reason, it is required that you use the SectionService to change the Section of a Content item.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**assign section to content**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$contentInfo = $contentService->loadContentInfo( $contentId );
$section = $sectionService->loadSection( $sectionId );
$sectionService->assignSection( $contentInfo, $section );
```

</div>
</div>
This operation involves the `SectionService`, as well as the `ContentService`.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**assign section to content**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$contentInfo = $contentService->loadContentInfo( $contentId );
```

</div>
</div>
We use `ContentService::loadContentInfo()` to get the Content we want to update the Section for.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**assign section to content**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$section = $sectionService->loadSection( $sectionId );
```

</div>
</div>
`SectionService::loadSection()` is then used to load the Section we want to assign our Content to. Note that there is no `SectionInfo` object. Sections are quite simple, and we don't need to separate their metadata from their actual data. However, `SectionCreateStruct` and `` `SectionUpdateStruct `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/Content/SectionUpdateStruct.html>&gt;\_\_
objects must still be used to create and update Sections.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeHeader panelHeader pdl"
   style="border-bottom-width: 1px;"&gt;

\*\*assign section to content\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    $sectionService-&gt;assignSection( $contentInfo, $section );

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

The actual update operation is done using
SectionService::assignSection(), with the ContentInfo\` and the Section as arguments.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
`SectionService::assignSection()` won't return the updated Content, as it has no knowledge of those objects. To get the Content with the newly assigned Location, you need to reload the `ContentInfo` using `` `ContentService::loadContentInfo() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentService.html#method_loadContentInfo>&gt;\_\_.
This is also valid for descendants of the Content item. If you have any
stored in your execution state, you need to reload them. Otherwise you
would be using outdated Content data.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Creating a Content Type
   :name: Otherrecipes-CreatingaContentType

.. raw:: html

   &lt;div
   class="confluence-information-macro confluence-information-macro-information"&gt;

Full code

.. raw:: html

   &lt;div class="confluence-information-macro-body"&gt;

https://github.com/ezsystems/CookbookBundle/blob/master/Command/CreateContentTypeCommand.php

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

Creating a ContentType\` is actually almost more complex than creating Content. It really isn't as common, and didn't "deserve" the same kind of API as Content did.

Let's split the code in three major parts.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
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

</div>
</div>
First, we need to load the `ContentTypeGroup` our `ContentType` will be created in. We do this using `` `ContentTypeService::loadContentTypeGroupByIdentifier() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentTypeService.html#method_loadContentTypeGroupByIdentifier>&gt;\_\_,
which gives us back a ContentTypeGroup\` object. As for content, we then request a `ContentTypeCreateStruct` from the `ContentTypeService`, using `ContentTypeService::newContentTypeCreateStruct()`, with the desired identifier as the argument. 

Using the create struct's properties, we can set the Type's properties:

-   the main language (`mainLanguageCode`) for the Type is set to eng-GB,
-   the content name generation pattern (`nameSchema`) is set to '&lt;title&gt;': Content items of this type will be named the same as their 'title' field.
-   the human-readable name for our Type is set using the `names` property. We give it a hash, indexed by the locale ('eng-GB') the name is set in. This locale must exist in the system.
-   the same way that we have set the `names` property, we can set human-readable descriptions, again as hashes indexed by locale code.

The next big part is to add FieldDefinition objects to our Content Type.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
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

</div>
</div>
We need to create a `FieldDefinitionCreateStruct` object for each `FieldDefinition` our `ContentType` will be made of. Those objects are obtained using `` `ContentTypeService::newFieldDefinitionCreateStruct() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/ContentTypeService.html#method_newFieldDefinitionCreateStruct>&gt;\_\_.
This method expects the FieldDefinition identifier and its type as
arguments. The identifiers match the ones from eZ Publish 4
(ezstring\` for TextLine, etc.).

Each field's properties are set using the create struct's properties:

-   `names` and `descriptions` are set using hashes indexed by the locale code, and with the name or description as an argument.
-   The `fieldGroup` is set to 'content'
-   Fields are ordered using the `position` property, ordered numerically in ascending order. We set it to an integer.
-   The translatable, required and searchable boolean flags are set using their respective property: `isTranslatable`, `isRequired` and `isSearchable`.

Once the properties for each create struct are set, the field is added to the Content Type create struct using `` `ContentTypeCreateStruct::addFieldDefinition() `` &lt;<http://apidoc.ez.no/sami/trunk/NS/html/eZ/Publish/API/Repository/Values/ContentType/ContentTypeCreateStruct.html#method_addFieldDefinition>&gt;\_\_.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    try
    {
        $contentTypeDraft = $contentTypeService-&gt;createContentType( $contentTypeCreateStruct, array( $contentTypeGroup ) );
        $contentTypeService-&gt;publishContentTypeDraft( $contentTypeDraft );
    }
    catch ( \\eZ\\Publish\\API\\Repository\\Exceptions\\UnauthorizedException $e )
    {
        $output-&gt;writeln( "&lt;error&gt;" . $e-&gt;getMessage() . "&lt;/error&gt;" );
    }
    catch ( \\eZ\\Publish\\API\\Repository\\Exceptions\\ForbiddenException $e )
    {
        $output-&gt;writeln( "&lt;error&gt;" . $e-&gt;getMessage() . "&lt;/error&gt;" );
    }

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

The last step is the same as for Content: we create a Content Type draft
using ContentTypeService::createContentType(), with the
ContentTypeCreateStruct\` and an array of `ContentTypeGroup` objects are arguments. We then publish the Content Type draft using `ContentTypeService::publishContentTypeDraft()`.

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375991108">
-   [Assigning Section to content](#Otherrecipes-AssigningSectiontocontent)
-   [Creating a Content Type](#Otherrecipes-CreatingaContentType)

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

