# ez\_image\_alias

#### Description

`ez_image_alias()` is a Twig helper that lets you display a selected variant (alias) of an image.

#### Prototype and Arguments

`ez_image_alias( eZ\Publish\API\Repository\Values\Content\Field field, eZ\Publish\API\Repository\Values\Content\VersionInfo versionInfo, string variantName )`

| Argument name | Type                                                   | Description                               |
|---------------|--------------------------------------------------------|-------------------------------------------|
| `field`       | `eZ\Publish\API\Repository\Values\Content\Field`       | The image Field                           |
| `versionInfo` | `eZ\Publish\API\Repository\Values\Content\VersionInfo` | The VersionInfo that the field belongs to |
| `variantName` | `string`                                               | Name of the image alias to be used        |


