# ParentContentTypeLimitation

A Limitation to specify if the User has access to Content whose parent Location contains a specific Content Type, used by `content/create`.

This limitation combined with `ContentTypeLimitation` allows you to define business rules like allowing users to create "Blog Post" within a "Blog." If you also combine it with `ParentOwnerLimitation`, you effectively limit access to create Blog Posts in the users' own Blogs.

|                 |                                                                                |
|-----------------|--------------------------------------------------------------------------------|
| Identifier      | `ParentClass`                                                                  |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\ParentContentTypeLimitation` |
| Type Class      | `eZ\Publish\Core\Limitation\ParentContentTypeLimitationType`                   |
| Criterion used  | n/a                                                                            |
| Role Limitation | no                                                                             |

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
<td align="left"><code>&lt;ContentType_id&gt;</code></td>
<td align="left"><code>&lt;ContentType_name&gt;</code></td>
<td align="left"><p>All valid Content Type ids can be set as value(s)</p></td>
</tr>
</tbody>
</table>

 


