<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
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
  Name          Internal name      Expected input
  ------------- ------------------ -------------------
  `User`        `ezuser`           ignored

</div>
**PHP API Field Type**

**Value Object**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Property           | Type               | Description        | Example            |
+====================+====================+====================+====================+
| `hasStoredLogin`   | `boolean`          | Denotes if user    | `true`             |
|                    |                    | has stored login.  |                    |
+--------------------+--------------------+--------------------+--------------------+
| `contentId`        | `int|string`       | Id of the Content  | `42`               |
|                    |                    | corresponding to   |                    |
|                    |                    | the user.          |                    |
+--------------------+--------------------+--------------------+--------------------+
| `login`            | `string`           | Username.          | `john`             |
+--------------------+--------------------+--------------------+--------------------+
| `email`            | `string`           | Users’ email       | `john@smith.com`   |
|                    |                    | address.           |                    |
+--------------------+--------------------+--------------------+--------------------+
| `passwordHash`     | `string`           | Hash of the user’s | `1234567890abcdef` |
|                    |                    | password.          |                    |
+--------------------+--------------------+--------------------+--------------------+
| `passwordHashType` | `mixed`            | Algorithm user for |     User::PASSWORD |
|                    |                    | generating         |                    |
|                    |                    | password hash as a | \_HASH\_MD5\_USER  |
|                    |                    | `PASSWORD_HASH_*`c |                    |
|                    |                    | onstant            |                    |
|                    |                    | defined in         |                    |
|                    |                    | `eZ\Publish\Core\  |                    |
|                    |                    | Repository\Values\ |                    |
|                    |                    |  User\User`        |                    |
|                    |                    | class.             |                    |
+--------------------+--------------------+--------------------+--------------------+
| `maxLogin`         | `int`              | Maximal number of  | `1000`             |
|                    |                    | concurrent logins. |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**Available password hash types**

<div class="table-wrap">
  -------------------------------------------------------------------------
  Constant                             Description
  ------------------------------------ ------------------------------------
  `eZ\Publish\Core\Repository\Values\  MD5 hash of the password, not
  User\User::PASSWORD_HASH_MD5_PASSWOR recommended.
   D`                                  

  `eZ\Publish\Core\Repository\Values\  MD5 hash of the password and
  User\User::PASSWORD_HASH_MD5_USER`   username.

  `eZ\Publish\Core\Repository\Values\  MD5 hash of the password, username
  User\User::PASSWORD_HASH_MD5_SITE`   and site name.

  `eZ\Publish\Core\Repository\Values\  Passwords are stored in plaintext,
  User\User::PASSWORD_HASH_PLAINTEXT`  should not be used for real sites.
  -------------------------------------------------------------------------

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

