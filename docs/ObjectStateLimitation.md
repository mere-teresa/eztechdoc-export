# ObjectStateLimitation

A Limitation to specify if the User has access to Content with a specific ObjectState.

|                 |                                                                          |
|-----------------|--------------------------------------------------------------------------|
| Identifier      | `State`                                                                  |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\ObjectStateLimitation` |
| Type Class      | `eZ\Publish\Core\Limitation\ObjectStateLimitationType`                   |
| Criterion used  | `eZ\Publish\API\Repository\Values\Content\Query\Criterion\ObjectStateId` |
| Role Limitation | no                                                                       |

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
<td align="left"><code>&lt;ObjectState_id&gt;</code></td>
<td align="left"><code>&lt;ObjectState_name&gt;</code></td>
<td align="left"><p>All valid <code>ObjectState</code> ids can be set as value(s)</p></td>
</tr>
</tbody>
</table>

 


