# User Field Type

This Field Type validates and stores information about a user.

| Name   | Internal name | Expected input |
|--------|---------------|----------------|
| `User` | `ezuser`      | ignored        |

## PHP API Field Type

### Value Object

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Property</th>
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>hasStoredLogin</code></p></td>
<td align="left"><code>boolean</code></td>
<td align="left">Denotes if user has stored login.</td>
<td align="left"><code>true</code></td>
</tr>
<tr class="even">
<td align="left"><p><code>contentId</code></p></td>
<td align="left"><code>int|string</code></td>
<td align="left">Id of the Content corresponding to the user.</td>
<td align="left"><code>42</code></td>
</tr>
<tr class="odd">
<td align="left"><p><code>login</code></p></td>
<td align="left"><code>string</code></td>
<td align="left">Username.</td>
<td align="left"><code>john</code></td>
</tr>
<tr class="even">
<td align="left"><p><code>email</code></p></td>
<td align="left"><code>string</code></td>
<td align="left">Users' email address.</td>
<td align="left"><code>john@smith.com</code></td>
</tr>
<tr class="odd">
<td align="left"><p><code>passwordHash</code></p></td>
<td align="left"><code>string</code></td>
<td align="left">Hash of the user's password.</td>
<td align="left"><code>1234567890abcdef</code></td>
</tr>
<tr class="even">
<td align="left"><p><code>passwordHashType</code></p></td>
<td align="left"><code>mixed</code></td>
<td align="left">Algorithm user for generating password hash as a <code>PASSWORD_HASH_* </code>constant defined in eZ\Publish\Core\Repository\Values\User\User class.</td>
<td align="left"><pre><code>User::PASSWORD_HASH_MD5_USER</code></pre></td>
</tr>
<tr class="odd">
<td align="left"><p><code>maxLogin</code></p></td>
<td align="left"><code>int</code></td>
<td align="left">Maximal number of concurrent logins.</td>
<td align="left"><code>1000</code></td>
</tr>
</tbody>
</table>

##### Available password hash types

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Constant</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>eZ\Publish\Core\Repository\Values\User\User::PASSWORD_HASH_MD5_PASSWORD</code></p></td>
<td align="left">MD5 hash of the password, not recommended.</td>
</tr>
<tr class="even">
<td align="left"><p><code>eZ\Publish\Core\Repository\Values\User\User::PASSWORD_HASH_MD5_USER</code></p></td>
<td align="left">MD5 hash of the password and username.</td>
</tr>
<tr class="odd">
<td align="left"><p><code>eZ\Publish\Core\Repository\Values\User\User::PASSWORD_HASH_MD5_SITE</code></p></td>
<td align="left">MD5 hash of the password, username and site name.</td>
</tr>
<tr class="even">
<td align="left"><p><code>eZ\Publish\Core\Repository\Values\User\User::PASSWORD_HASH_PLAINTEXT</code></p></td>
<td align="left"><p>Passwords are stored in plaintext, should not be used for real sites.</p></td>
</tr>
</tbody>
</table>

 


