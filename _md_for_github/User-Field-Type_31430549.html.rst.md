<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Under the Hood: How eZ Platform Works](31429659.html)
5.  [Content Model: Content is King!](31429709.html)
6.  [Content items, Content Types and Fields](31430275.html)
7.  [Field Types reference](Field-Types-reference_31430495.html)

</div>
**Developer : User Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Jan 04, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type validates and stores information about a user.

<div class="table-wrap">
<table style="width:69%;">
<colgroup>
<col width="18%" />
<col width="25%" />
<col width="26%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Internal name</th>
<th align="left">Expected input</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>User</code></td>
<td align="left"><code>ezuser</code></td>
<td align="left">ignored</td>
</tr>
</tbody>
</table>

</div>
**PHP API Field Type**

**Value Object**

<div class="table-wrap">
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
<td align="left"><code>hasStoredLogin</code></td>
<td align="left"><code>boolean</code></td>
<td align="left">Denotes if user has stored login.</td>
<td align="left"><code>true</code></td>
</tr>
<tr class="even">
<td align="left"><code>contentId</code></td>
<td align="left"><code>int|string</code></td>
<td align="left">Id of the Content corresponding to the user.</td>
<td align="left"><code>42</code></td>
</tr>
<tr class="odd">
<td align="left"><code>login</code></td>
<td align="left"><code>string</code></td>
<td align="left">Username.</td>
<td align="left"><code>john</code></td>
</tr>
<tr class="even">
<td align="left"><code>email</code></td>
<td align="left"><code>string</code></td>
<td align="left">Users' email address.</td>
<td align="left"><code>john@smith.com</code></td>
</tr>
<tr class="odd">
<td align="left"><code>passwordHash</code></td>
<td align="left"><code>string</code></td>
<td align="left">Hash of the user's password.</td>
<td align="left"><code>1234567890abcdef</code></td>
</tr>
<tr class="even">
<td align="left"><code>passwordHashType</code></td>
<td align="left"><code>mixed</code></td>
<td align="left">Algorithm user for generating password hash as a <code>PASSWORD_HASH_*</code>constant defined in <code>eZ\Publish\Core\ Repository\Values\ User\User</code> class.</td>
<td align="left"><pre><code>User::PASSWORD</code></pre>
_HASH_MD5_USER</td>
</tr>
<tr class="odd">
<td align="left"><code>maxLogin</code></td>
<td align="left"><code>int</code></td>
<td align="left">Maximal number of concurrent logins.</td>
<td align="left"><code>1000</code></td>
</tr>
</tbody>
</table>

</div>
**Available password hash types**

<div class="table-wrap">
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
<td align="left"><code>eZ\Publish\Core\Repository\Values\ User\User::PASSWORD_HASH_MD5_PASSWOR D</code></td>
<td align="left">MD5 hash of the password, not recommended.</td>
</tr>
<tr class="even">
<td align="left"><code>eZ\Publish\Core\Repository\Values\ User\User::PASSWORD_HASH_MD5_USER</code></td>
<td align="left">MD5 hash of the password and username.</td>
</tr>
<tr class="odd">
<td align="left"><code>eZ\Publish\Core\Repository\Values\ User\User::PASSWORD_HASH_MD5_SITE</code></td>
<td align="left">MD5 hash of the password, username and site name.</td>
</tr>
<tr class="even">
<td align="left"><code>eZ\Publish\Core\Repository\Values\ User\User::PASSWORD_HASH_PLAINTEXT</code></td>
<td align="left">Passwords are stored in plaintext, should not be used for real sites.</td>
</tr>
</tbody>
</table>

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

</div>
</div>
</div>
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

