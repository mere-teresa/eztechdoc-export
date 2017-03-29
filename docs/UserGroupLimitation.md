# UserGroupLimitation

A Limitation to specify that only Users with at least one common *direct* User group with the owner of content get a certain access right.

|                 |                                                                                                |
|-----------------|------------------------------------------------------------------------------------------------|
| Identifier      | `Group`                                                                                        |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\UserGroupLimitation`                         |
| Type Class      | `eZ\Publish\Core\Limitation\UserGroupLimitationType`                                           |
| Criterion used  | `eZ\Publish\API\Repository\Values\Content\Query\Criterion\UserMetadata( UserMetadata::GROUP )` |
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
<td align="left"><p>Only a User who has at least one common <em>direct</em> User group with the owner gets access</p></td>
</tr>
</tbody>
</table>

 

 

 


