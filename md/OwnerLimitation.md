# OwnerLimitation

A Limitation to specify that only the owner of the Content item gets a certain access right.

|                 |                                                                                                |
|-----------------|------------------------------------------------------------------------------------------------|
| Identifier      | `Owner`                                                                                        |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\OwnerLimitation`                             |
| Type Class      | `eZ\Publish\Core\Limitation\OwnerLimitationType`                                               |
| Criterion used  | `eZ\Publish\API\Repository\Values\Content\Query\Criterion\UserMetadata( UserMetadata::OWNER )` |
| Role Limitation | no                                                                                             |

###### Possible values

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left">Value</td>
<td align="left">UI value</td>
<td align="left">Description</td>
</tr>
<tr class="even">
<td align="left">1</td>
<td align="left">&quot;self&quot;</td>
<td align="left"><p>Only the User who is the owner gets access</p></td>
</tr>
<tr class="odd">
<td align="left">2</td>
<td align="left">&quot;session&quot;</td>
<td align="left"><p>Same as &quot;self&quot;</p></td>
</tr>
</tbody>
</table>

###### Legacy compatibility notes:

1.  "session" is deprecated and works exactly like "self" in Public API since it has no knowledge of user Sessions
2.  A User is no longer automatically assumed to be the owner of themselves and gets access to edit themselves when the Owner limitation is used in Public API

Workaround for the OwnerLimitation on Users

To make sure the User gets access to themselves when using OwnerLimitation across 4.x and 5.x, the solution is to change the User to be the owner of their own Content item.

This is accomplished using a privileged user to do the following API calls:

```
$user = $userService->loadUser( $userId );
$contentMetadataUpdateStruct = $contentService->newContentMetadataUpdateStruct();
$contentMetadataUpdateStruct->ownerId = $user->id;
$contentService->updateContentMetadata( $user->getVersionInfo()->getContentInfo(), $contentMetadataUpdateStruct );
```

 


