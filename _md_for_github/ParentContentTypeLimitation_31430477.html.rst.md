<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Repository](Repository_31432023.html)
5.  [List of Limitations](List-of-Limitations_31430459.html)

</div>
**Developer : ParentContentTypeLimitation**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 28, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
A Limitation to specify if the User has access to Content whose parent Location contains a specific Content Type, used by `content/create`.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
This limitation combined with `ContentTypeLimitation` allows you to define business rules like allowing users to create "Blog Post" within a "Blog." If you also combine it with `ParentOwnerLimitation`, you effectively limit access to create Blog Posts in the users' own Blogs.

</div>
</div>
<div class="table-wrap">
<table>
<colgroup>
<col width="19%" />
<col width="80%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left">Identifier</td>
<td align="left"><code>ParentClass</code></td>
</tr>
<tr class="even">
<td align="left">Value Class</td>
<td align="left"><code>eZ\Publish\API\Repository\Values\User\Limitation\ParentContentTypeLimitation</code></td>
</tr>
<tr class="odd">
<td align="left">Type Class</td>
<td align="left"><code>eZ\Publish\Core\Limitation\ParentContentTypeLimitationType</code></td>
</tr>
<tr class="even">
<td align="left">Criterion used</td>
<td align="left">n/a</td>
</tr>
<tr class="odd">
<td align="left">Role Limitation</td>
<td align="left">no</td>
</tr>
</tbody>
</table>

</div>
**Possible values**

<div class="table-wrap">
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
<td align="left">All valid Content Type ids can be set as value(s)</td>
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

