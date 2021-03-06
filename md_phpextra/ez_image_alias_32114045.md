1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Content Rendering](Content-Rendering_31429679.html)</span>
5.  <span>[Twig Functions
    Reference](Twig-Functions-Reference_32114025.html)</span>

<span id="title-text"> Developer : ez\_image\_alias </span> {#title-heading .pagetitle}
===========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Dec 31, 2016

#### Description {#ez_image_alias-Description}

`ez_image_alias()` is a Twig helper that lets you display a selected
variant (alias) of an image.

#### Prototype and Arguments {#ez_image_alias-PrototypeandArguments}

`ez_image_alias( eZ\Publish\API\Repository\Values\Content\Field field, eZ\Publish\API\Repository\Values\Content\VersionInfo versionInfo, string variantName )`

| Argument name | Type                                                   | Description                               |
|---------------|--------------------------------------------------------|-------------------------------------------|
| `field`       | `eZ\Publish\API\Repository\Values\Content\Field`       | The image Field                           |
| `versionInfo` | `eZ\Publish\API\Repository\Values\Content\VersionInfo` | The VersionInfo that the field belongs to |
| `variantName` | `string`                                               | Name of the image alias to be used        |

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


