# BlockingLimitation

A generic Limitation type to use when no other Limitation has been implemented. Without any limitation assigned, a LimitationNotFoundException is thrown.

It is called "blocking" because it will always tell the permissions system that the User does not have access to any Policy it is assigned to, making the permissions system move on to the next Policy.

 

|                 |                                                                                       |
|-----------------|---------------------------------------------------------------------------------------|
| Identifier      | `n/a` (configured for `ezjscore` limitation `           FunctionList` out of the box) |
| Value Class     | `eZ\Publish\API\Repository\Values\User\Limitation\BlockingLimitation`                 |
| Type Class      | `eZ\Publish\Core\Limitation\BlockingLimitationType`                                   |
| Criterion used  | MatchNone                                                                             |
| Role Limitation | no                                                                                    |

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
<td align="left"><code>&lt;mixed&gt;</code></td>
<td align="left"><code>&lt;mixed&gt;</code></td>
<td align="left"><p>This is a generic Limitation which does not validate the values provided to it. Make sure to validate the values passed to this limitation in your own logic.</p></td>
</tr>
</tbody>
</table>

###### Configuration

As this is a generic Limitation, you can configure your custom Limitations to use it, out of the box FunctionList uses it in the following way:

```
    # FunctionList is a ezjscore limitations, it only applies to ezjscore policies not used by
    # API/platform stack so configuring to use "blocking" limitation to avoid LimitationNotFoundException
    ezpublish.api.role.limitation_type.function_list:
        class: %ezpublish.api.role.limitation_type.blocking.class%
        arguments: ['FunctionList']
        tags:
            - {name: ezpublish.limitationType, alias: FunctionList}
```

 


