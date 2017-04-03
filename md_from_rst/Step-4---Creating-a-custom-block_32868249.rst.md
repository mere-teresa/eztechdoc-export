<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [eZ Enterprise Beginner Tutorial - It’s a Dog’s
    World](32868209.html)

</div>
**Developer : Step 4 - Creating a custom block**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Sarah Haïm-Lubczanski on Jan
27, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
You can find all files used and modified in this step on
[GitHub](https://github.com/ezsystems/ezstudio-beginner-tutorial/tree/master).

</div>
</div>
We are now left with the last of the planned Landing Page elements. We
will create it by building a custom block for the Landing Page. You can
utilize the possibility of creating custom blocks in many ways, with
many complex configurations fitting your project. In this tutorial we
will show the process of creating a block on a very simple example: we
will display a randomly chosen Content item from a selected folder.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
The procedure we will go through is based on (and uses parts of) a [post
written on the eZ Community
Blog](http://share.ez.no/blogs/core-development-team/extending-ez-studio-with-new-blocks).
You can take a look there for more detailed explanation.

</div>
</div>
To create a custom block from scratch we will need four elements:

-   a block definition
-   a template for the block
-   a block extension class
-   block configuration for the services and templates config

**Block definition and template**

A block definition contains block structure and the information that is
passed from it to the template. Our definition will be contained in a
`RandomBlock.php` file located in `src/AppBundle/Block` folder.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**src/AppBundle/Block/RandomBlock.php**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?php

namespace AppBundle\Block;

use EzSystems\LandingPageFieldTypeBundle\Exception\InvalidBlockAttributeException;
use EzSystems\LandingPageFieldTypeBundle\FieldType\LandingPage\Definition\BlockDefinition;
use EzSystems\LandingPageFieldTypeBundle\FieldType\LandingPage\Definition\BlockAttributeDefinition;
use EzSystems\LandingPageFieldTypeBundle\FieldType\LandingPage\Model\AbstractBlockType;
use EzSystems\LandingPageFieldTypeBundle\FieldType\LandingPage\Model\BlockValue;
use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;

class RandomBlock extends AbstractBlockType
{
    /**
     * Content ID regular expression.
     *
     * @example 16
     *
     * @var string
     */
    const PATTERN_CONTENT_ID = '/[0-9]+/';

    /** @var \eZ\Publish\API\Repository\LocationService */
    private $locationService;

    /** @var \eZ\Publish\API\Repository\ContentService */
    private $contentService;

    /** @var \eZ\Publish\API\Repository\SearchService */
    private $searchService;

    /**
     * @param \eZ\Publish\API\Repository\LocationService $locationService
     * @param \eZ\Publish\API\Repository\ContentService $contentService
     * @param \eZ\Publish\API\Repository\SearchService $searchService
     */
    public function __construct(
        LocationService $locationService,
        ContentService $contentService,
        SearchService $searchService
    ) {
        $this->locationService = $locationService;
        $this->contentService = $contentService;
        $this->searchService = $searchService;
    }

    public function getTemplateParameters(BlockValue $blockValue)
    {
        $attributes = $blockValue->getAttributes();
        $contentInfo = $this->contentService->loadContentInfo($attributes['parentContentId']);
        $randomContent = $this->getRandomContent(
            $this->getQuery($contentInfo->mainLocationId)
        );

        return [
            'content' => $randomContent,
        ];
    }

    /**
     * Returns random picked Content.
     *
     * @param \eZ\Publish\API\Repository\Values\Content\LocationQuery $query
     *
     * @return \eZ\Publish\API\Repository\Values\Content\Content
     */
    private function getRandomContent(LocationQuery $query)
    {
        $results = $this->searchService->findLocations($query);
        $searchHits = $results->searchHits;
        if (count($searchHits) > 0) {
            shuffle($searchHits);
            return $this->contentService->loadContentByContentInfo(
                $searchHits[0]->valueObject->contentInfo
            );
        }

        return null;
    }

    /**
     * Returns LocationQuery object based on given arguments.
     *
     * @param int $parentLocationId
     *
     * @return \eZ\Publish\API\Repository\Values\Content\LocationQuery
     */
    private function getQuery($parentLocationId)
    {
        $query = new LocationQuery();
        $query->query = new Criterion\LogicalAnd([
            new Criterion\Visibility(Criterion\Visibility::VISIBLE),
            new Criterion\ParentLocationId($parentLocationId),
        ]);

        return $query;
    }

    public function createBlockDefinition()
    {
        return new BlockDefinition(
            'random',
            'Random',
            'default',
            'assets/images/blocks/random_block.svg',
            [],
            [
                new BlockAttributeDefinition(
                    'parentContentId',
                    'Parent',
                    'embed',
                    self::PATTERN_CONTENT_ID,
                    'Choose a valid ContentID',
                    true,
                    false,
                    [],
                    []
                ),
            ]
        );
    }

    public function checkAttributesStructure(array $attributes)
    {
        if (!isset($attributes['parentContentId']) || preg_match(self::PATTERN_CONTENT_ID, $attributes['parentContentId']) !== 1) {
            throw new InvalidBlockAttributeException('Parent container', 'parentContentId', 'Parent ContentID must be defined.');
        }
    }
}
```

</div>
</div>
Now we need to define the block template. It will be placed
in `src/AppBundle/Resources/views/blocks`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**src/AppBundle/Resources/views/blocks/random.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<div class="row random-block">
    <h4 class="text-right">{{ 'Tip of the Day'|trans }}</h4>
    <h5>{{ ez_content_name(content) }}</h5>
    <div class="random-block-text">
        {{ ez_render_field(content, 'body') }}
    </div>
</div>
```

</div>
</div>
**Block extension and configuration**

The next step is defining the extension that will provide block
configuration to the eZ Platform Enterprise Edition app. To do this you
need to make some additions to
`src/AppBundle/DependencyInjection/AppExtension.php`.

First, add these three lines after remaining `use` statements:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Resource\FileResource;
```

</div>
</div>
Second, append `implements PrependExtensionInterface` to the
`AppExtension extends Extension` line, so that it looks like this:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
class AppExtension extends Extension implements PrependExtensionInterface
```

</div>
</div>
Finally, add the following function at the end of the one existing
class:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in src/AppBundle/DependencyInjection/AppExtension.php**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
public function prepend(ContainerBuilder $container)
{
    $configFile = __DIR__ . '/../Resources/config/blocks.yml';
    $config = Yaml::parse(file_get_contents($configFile));
    $container->prependExtensionConfig('ez_systems_landing_page_field_type', $config);
    $container->addResource(new FileResource($configFile));
}
```

</div>
</div>
Next, you need to provide the block configuration in two files. Add this
section in the `services.yml` file in `src/AppBundle/Resources/config`
under the `services` key:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**src/AppBundle/Resources/config/services.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
app.block.random:
    class: AppBundle\Block\RandomBlock
    arguments:
        - '@ezpublish.api.service.location'
        - '@ezpublish.api.service.content'
        - '@ezpublish.api.service.search'
    tags:
        - { name: landing_page_field_type.block_type, alias: random }
```

</div>
</div>
Create a `blocks.yml` file in the same folder:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**src/AppBundle/Resources/config/blocks.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
blocks:
    random:
        views:
            random:
                template: AppBundle:blocks:random.html.twig
                name: Random Content Block View
```

</div>
</div>
At this point the new custom block is ready to be used.

Go back to editing your Front Page. You can see the new block in the
Elements menu on the right. Now drag it to the Landing Page side column.
Access the block’s settings and choose the All Tips Folder from the
menu.

We’re left with the last cosmetic changes. First, you can see that the
new Block has a broken icon in the Elements menu. This is because we
haven’t provided this icon yet. If you look back to the
`RandomBlock.php` file, you can see the icon file defined as
`random_block.svg`. Download [the provided
file](attachments/32868249/32868248.svg) and place it
in `web/assets/images/blocks`.

Finally, let’s add some styling for the new block. Add the following to
the end of the `web/assets/css/style.css` file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in web/assets/css/style.css**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
/* Random block */
.random-block {
    border: 1px solid #83705a;
    border-radius: 5px;
    padding: 0 25px 25px 25px;
    margin-top: 15px;
}

.random-block h4 {
    font-variant: small-caps;
    font-size: .8em;
}

.random-block h5 {
    font-size: 1.2em;
}

.random-block-text {
    font-size: .85em;
}
```

</div>
</div>
Now go to this new home page from the front end. You can see the Tip of
the Day block display a random Tip from the Tips folder. Try to refresh
the page a couple of times and you will see the tip change randomly.

![Random Block with a
Tip](attachments/32868249/32868247.png){.confluence-embedded-image
.confluence-thumbnail .image-center width="300px"}

 

**Congratulations!**

You have finished the tutorial and created your first customized Landing
Page.

You have learned how to:

-   Create and customize a Landing Page
-   Make use of existing blocks and adapt them to your needs
-   Plan content airtimes using Schedule Blocks
-   Create custom blocks

![Final result of the
tutorial](attachments/32868209/32868208.png){.confluence-embedded-image
.image-center width="600px"}

------------------------------------------------------------------------

 

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
 ⬅ Previous: [Step 3 - Using existing
blocks](Step-3---Using-existing-blocks_32868245.html)

</div>
<div class="columnMacro">
 

</div>
</div>
</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="panel"
style="background-color: #ffffff;border-color: #f58220;border-width: 2px;">
<div class="panelHeader"
style="border-bottom-width: 2px;border-bottom-color: #f58220;background-color: #ffffff;">
**Tutorial path**

</div>
<div class="panelContent" style="background-color: #ffffff;">
<div class="plugin_pagetree">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
![image2](images/icons/bullet_blue.gif){width="8px" height="8px"}
[iadw\_random\_block.png](attachments/32868249/32869514.png) (image/png)
![image3](images/icons/bullet_blue.gif){width="8px" height="8px"}
[random\_block.svg](attachments/32868249/32868248.svg) (image/svg+xml)
![image4](images/icons/bullet_blue.gif){width="8px" height="8px"}
[iadw\_random\_block.png](attachments/32868249/32868247.png) (image/png)

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

