# LocationLimitation

A Limitation to specify if the User has access to Content with a specific Location, in case of `content/create` the parent Location is evaluated.

|                 |                                                                       |
|-----------------|-----------------------------------------------------------------------|
| Identifier      | `Node`                                                                |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\LocationLimitation` |
| Type Class      | `eZ\Publish\Core\Limitation\LocationLimitationType`                   |
| Criterion used  | `eZ\Publish\API\Repository\Values\Content\Query\Criterion\LocationId` |
| Role Limitation | no                                                                    |

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
<td align="left"><code>&lt;Location_id&gt;</code></td>
<td align="left"><code>&lt;Location_name&gt;</code></td>
<td align="left"><p>All valid Location ids can be set as value(s)</p></td>
</tr>
</tbody>
</table>

 


