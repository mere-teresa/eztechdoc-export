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

</div>
**Developer : Field Types reference**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Sarah Haïm-Lubczanski on Nov 29, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This page contains a reference of Field Types used in eZ Platform.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For the general Field Type documentation see [Field Type API and best practices](Field-Type-API-and-best-practices_31430767.html).

If you are looking for the documentation on how to implement a custom Field Type, see the [Creating a Tweet Field Type](Creating-a-Tweet-Field-Type_31429766.html) tutorial.

</div>
</div>
A Field Type is the smallest possible entity of storage. It determines how a specific type of information should be validated, stored, retrieved, formatted and so on. eZ Platform comes with a collection of fundamental types that can be used to build powerful and complex content structures. In addition, it is possible to extend the system by creating custom Field Types for special needs. Custom Field Types have to be programmed in PHP. However, the built-in Field Types are usually sufficient enough for typical scenarios. The following table gives an overview of the supported Field Types that come with eZ Platform.

**Built in Field Types**

<div class="table-wrap">
<table>
<colgroup>
<col width="30%" />
<col width="42%" />
<col width="26%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">FieldType</th>
<th align="left">Description</th>
<th align="left">Searchable in Legacy Storage engine</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><a href="Author-Field-Type_31430499.html">Author</a></td>
<td align="left">Stores a list of authors, each consisting of author name and author email.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><a href="BinaryField-Field-Type_31430501.html">BinaryFile</a></td>
<td align="left">Stores a file.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><a href="Checkbox-Field-Type_31430497.html">Checkbox</a></td>
<td align="left">Stores a boolean value.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><a href="Country-Field-Type_31430503.html">Country</a></td>
<td align="left">Stores country names as a string.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="DateAndTime-Field-Type_31430505.html">DateAndTime</a></p>
</blockquote></td>
<td align="left">Stores a full date including time information.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Date-Field-Type_31430507.html">Date</a></p>
</blockquote></td>
<td align="left">Stores date information.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="EmailAddress-Field-Type_31430509.html">EmailAddress</a></p>
</blockquote></td>
<td align="left">Validates and stores an email address.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Float-Field-Type_31430511.html">Float</a></p>
</blockquote></td>
<td align="left">Validates and stores a decimal value.</td>
<td align="left">No</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="Image-Field-Type_31430513.html">Image</a></p>
</blockquote></td>
<td align="left">Validates and stores an image.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Integer-Field-Type_31430515.html">Integer</a></p>
</blockquote></td>
<td align="left">Validates and stores an integer value.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="ISBN-Field-Type_31430517.html">ISBN</a></p>
</blockquote></td>
<td align="left">Handles International Standard Book Number (ISBN) in 10-digit or 13-digit format.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Keyword-Field-Type_31430519.html">Keyword</a></p>
</blockquote></td>
<td align="left">Stores keywords.</td>
<td align="left">No</td>
</tr>
<tr class="odd">
<td align="left"><a href="31430521.html">Landing Page</a></td>
<td align="left">Stores a page with a layout consisting of multiple zones.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="MapLocation-Field-Type_31430523.html">MapLocation</a></p>
</blockquote></td>
<td align="left">Stores map coordinates.</td>
<td align="left">Yes, with MapLocationDistance criterion</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="Media-Field-Type_31430525.html">Media</a></p>
</blockquote></td>
<td align="left">Validates and stores a media file.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Null-Field-Type_31430527.html">Null</a></p>
</blockquote></td>
<td align="left">Used as fallback for missing Field Types and for testing purposes.</td>
<td align="left">No</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="Rating-Field-Type_31430531.html">Rating</a></p>
</blockquote></td>
<td align="left">Stores a rating.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Relation-Field-Type_31430533.html">Relation</a></p>
</blockquote></td>
<td align="left">Validates and stores a relation to a Content item.</td>
<td align="left">Yes, with both Field and FieldRelation criterions</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="RelationList-Field-Type_31430535.html">RelationList</a></p>
</blockquote></td>
<td align="left">Validates and stores a list of relations to Content items.</td>
<td align="left">Yes, with FieldRelation criterion</td>
</tr>
<tr class="even">
<td align="left"><a href="RichText-Field-Type_31430537.html">RichText</a></td>
<td align="left">Validates and stores structured rich text, and exposes it in several formats.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="Selection-Field-Type_31430539.html">Selection</a></p>
</blockquote></td>
<td align="left">Validates and stores a single selection or multiple choices from a list of options.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="TextBlock-Field-Type_31430541.html">TextBlock</a></p>
</blockquote></td>
<td align="left">Validates and stores a larger block of text.</td>
<td align="left">No</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="TextLine-Field-Type_31430545.html">TextLine</a></p>
</blockquote></td>
<td align="left">Validates and stores a single line of text.</td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="Time-Field-Type_31430543.html">Time</a></p>
</blockquote></td>
<td align="left">Stores time information.</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="Url-Field-Type_31430547.html">Url</a></p>
</blockquote></td>
<td align="left">Stores a URL / address.</td>
<td align="left">No</td>
</tr>
<tr class="even">
<td align="left"><blockquote>
<p><a href="User-Field-Type_31430549.html">User</a></p>
</blockquote></td>
<td align="left">Validates and stores information about a user.</td>
<td align="left">No</td>
</tr>
<tr class="odd">
<td align="left"><blockquote>
<p><a href="XmlText-Field-Type_31430551.html">XmlText</a></p>
</blockquote></td>
<td align="left">Validates and stores multiple lines of formatted text.</td>
<td align="left">Yes</td>
</tr>
</tbody>
</table>

</div>
**Field Types provided by Community**

<div class="table-wrap">
<table>
<colgroup>
<col width="24%" />
<col width="17%" />
<col width="5%" />
<col width="41%" />
<col width="12%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">FieldType</th>
<th align="left">Description</th>
<th align="left">Searchable</th>
<th align="left">Editing support in UI</th>
<th align="left">Planned to be incl in the future</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><a href="https://github.com/netgen/TagsBundle">Tags</a></td>
<td align="left">Tags field and full fledge taxonomy management</td>
<td align="left">Yes</td>
<td align="left">No <em>(See <a href="http://www.netgenlabs.com/Blog/Crowdfunding-Tags-Bundle-support-for-eZ-Platform-UI">crowdfunding</a></em> <em>page)</em></td>
<td align="left">Yes</td>
</tr>
<tr class="even">
<td align="left"><a href="https://github.com/ezcommunity/EzPriceBundle">Price</a></td>
<td align="left">Price field for product catalog use</td>
<td align="left">Yes</td>
<td align="left">No</td>
<td align="left">Yes</td>
</tr>
<tr class="odd">
<td align="left"><a href="https://github.com/ezcommunity/EzMatrixFieldTypeBundle">Matrix</a></td>
<td align="left">Matrix field for matrix data</td>
<td align="left">Yes</td>
<td align="left">No</td>
<td align="left">Yes</td>
</tr>
</tbody>
</table>

</div>
**Known missing Field Types**

The following Field Types are configured using [Null Field Type](Null-Field-Type_31430527.html) to avoid exceptions if they exists in your database, but their functionality is currently not known to be implemented out of the box or by the community:

[<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image0" class="icon" />EZP-20112](https://jira.ez.no/browse/EZP-20112?src=confmacro) - Some Shop FieldTypes are not supported by Public API Backlog

[<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image1" class="icon" />EZP-20115](https://jira.ez.no/browse/EZP-20115?src=confmacro) - eZ Identifier FieldType not supported by Public API Backlog

[<img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="image2" class="icon" />EZP-20118](https://jira.ez.no/browse/EZP-20118?src=confmacro) - eZ Password Expiry FieldType not supported by Public API Backlog

*Missing something? For field types provided by community, like for instance `ezselection2`, unless otherwise mentioned it can be considered missing for the time being. If something should be listed here, add a comment.* 

**Generate new Field Type**

Besides links in the top of this topic in regards to creating own field type, from partner Smile there is now a [Field Type Generator Bundle](https://github.com/Smile-SA/EzFieldTypeGeneratorBundle) helping you get started creating skeleton for eZ Platform field type, including templates for editorial interface. 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**Related topics:**

-   [Content items, Content Types and Fields](31430275.html)

**In this topic:**

<div class="toc-macro rbtoc1490375993812">
-   [Built in Field Types](#FieldTypesreference-BuiltinFieldTypes)
-   [Field Types provided by Community](#FieldTypesreference-FieldTypesprovidedbyCommunity)
-   [Known missing Field Types](#FieldTypesreference-KnownmissingFieldTypes)
-   [Generate new Field Type](#FieldTypesreference-GeneratenewFieldType)

</div>
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

