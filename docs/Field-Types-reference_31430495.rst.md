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

</div>
**Developer : Field Types reference**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Sarah Haïm-Lubczanski on Nov
29, 2016

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
For the general Field Type documentation see [Field Type API and best
practices](Field-Type-API-and-best-practices_31430767.html).

If you are looking for the documentation on how to implement a custom
Field Type, see the [Creating a Tweet Field
Type](Creating-a-Tweet-Field-Type_31429766.html) tutorial.

</div>
</div>
A Field Type is the smallest possible entity of storage. It determines
how a specific type of information should be validated, stored,
retrieved, formatted and so on. eZ Platform comes with a collection of
fundamental types that can be used to build powerful and complex content
structures. In addition, it is possible to extend the system by creating
custom Field Types for special needs. Custom Field Types have to be
programmed in PHP. However, the built-in Field Types are usually
sufficient enough for typical scenarios. The following table gives an
overview of the supported Field Types that come with eZ Platform.

**Built in Field Types**

<div class="table-wrap">
+------------------------+--------------------------------+--------------------+
| FieldType              | Description                    | Searchable in      |
|                        |                                | Legacy Storage     |
|                        |                                | engine             |
+========================+================================+====================+
| [Author](Author-Field- | Stores a list of authors, each | No                 |
| Type_31430499.html)    | consisting of author name and  |                    |
|                        | author email.                  |                    |
+------------------------+--------------------------------+--------------------+
| [BinaryFile](BinaryFie | Stores a file.                 | Yes                |
| ld-Field-Type_31430501 |                                |                    |
| .html)                 |                                |                    |
+------------------------+--------------------------------+--------------------+
| [Checkbox](Checkbox-Fi | Stores a boolean value.        | Yes                |
| eld-Type_31430497.html |                                |                    |
| )                      |                                |                    |
+------------------------+--------------------------------+--------------------+
| [Country](Country-Fiel | Stores country names as a      | Yes                |
| d-Type_31430503.html)  | string.                        |                    |
+------------------------+--------------------------------+--------------------+
| > [DateAndTime](DateAn | Stores a full date including   | Yes                |
| dTime-Field-Type_31430 | time information.              |                    |
| 505.html)              |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Date](Date-Field-Ty | Stores date information.       | Yes                |
| pe_31430507.html)      |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [EmailAddress](Email | Validates and stores an email  | Yes                |
| Address-Field-Type_314 | address.                       |                    |
| 30509.html)            |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Float](Float-Field- | Validates and stores a decimal | No                 |
| Type_31430511.html)    | value.                         |                    |
+------------------------+--------------------------------+--------------------+
| > [Image](Image-Field- | Validates and stores an image. | No                 |
| Type_31430513.html)    |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Integer](Integer-Fi | Validates and stores an        | Yes                |
| eld-Type_31430515.html | integer value.                 |                    |
| )                      |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [ISBN](ISBN-Field-Ty | Handles International Standard | Yes                |
| pe_31430517.html)      | Book Number (ISBN) in 10-digit |                    |
|                        | or 13-digit format.            |                    |
+------------------------+--------------------------------+--------------------+
| > [Keyword](Keyword-Fi | Stores keywords.               | No                 |
| eld-Type_31430519.html |                                |                    |
| )                      |                                |                    |
+------------------------+--------------------------------+--------------------+
| [Landing               | Stores a page with a layout    | No                 |
| Page](31430521.html)   | consisting of multiple zones.  |                    |
+------------------------+--------------------------------+--------------------+
| > [MapLocation](MapLoc | Stores map coordinates.        | Yes, with          |
| ation-Field-Type_31430 |                                | MapLocationDistanc |
| 523.html)              |                                | e                  |
|                        |                                | criterion          |
+------------------------+--------------------------------+--------------------+
| > [Media](Media-Field- | Validates and stores a media   | No                 |
| Type_31430525.html)    | file.                          |                    |
+------------------------+--------------------------------+--------------------+
| > [Null](Null-Field-Ty | Used as fallback for missing   | No                 |
| pe_31430527.html)      | Field Types and for testing    |                    |
|                        | purposes.                      |                    |
+------------------------+--------------------------------+--------------------+
| > [Rating](Rating-Fiel | Stores a rating.               | No                 |
| d-Type_31430531.html)  |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Relation](Relation- | Validates and stores a         | Yes, with both     |
| Field-Type_31430533.ht | relation to a Content item.    | Field and          |
| ml)                    |                                | FieldRelation      |
|                        |                                | criterions         |
+------------------------+--------------------------------+--------------------+
| > [RelationList](Relat | Validates and stores a list of | Yes, with          |
| ionList-Field-Type_314 | relations to Content items.    | FieldRelation      |
| 30535.html)            |                                | criterion          |
+------------------------+--------------------------------+--------------------+
| [RichText](RichText-Fi | Validates and stores           | Yes                |
| eld-Type_31430537.html | structured rich text, and      |                    |
| )                      | exposes it in several formats. |                    |
+------------------------+--------------------------------+--------------------+
| > [Selection](Selectio | Validates and stores a single  | Yes                |
| n-Field-Type_31430539. | selection or multiple choices  |                    |
| html)                  | from a list of options.        |                    |
+------------------------+--------------------------------+--------------------+
| > [TextBlock](TextBloc | Validates and stores a larger  | No                 |
| k-Field-Type_31430541. | block of text.                 |                    |
| html)                  |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [TextLine](TextLine- | Validates and stores a single  | Yes                |
| Field-Type_31430545.ht | line of text.                  |                    |
| ml)                    |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Time](Time-Field-Ty | Stores time information.       | Yes                |
| pe_31430543.html)      |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [Url](Url-Field-Type | Stores a URL / address.        | No                 |
| _31430547.html)        |                                |                    |
+------------------------+--------------------------------+--------------------+
| > [User](User-Field-Ty | Validates and stores           | No                 |
| pe_31430549.html)      | information about a user.      |                    |
+------------------------+--------------------------------+--------------------+
| > [XmlText](XmlText-Fi | Validates and stores multiple  | Yes                |
| eld-Type_31430551.html | lines of formatted text.       |                    |
| )                      |                                |                    |
+------------------------+--------------------------------+--------------------+

</div>
**Field Types provided by Community**

<div class="table-wrap">
  -------------------------------------------------------------------------
  FieldType         Description  Sea Editing support in UI         Planned
                                 rch                               to be
                                 abl                               incl in
                                 e                                 the
                                                                   future
  ----------------- ------------ --- ----------------------------- --------
  [Tags](https://gi Tags field   Yes No *(See                      Yes
  thub.com/netgen/T and full         [crowdfunding](http://www.net 
  agsBundle)        fledge           genlabs.com/Blog/Crowdfunding 
                    taxonomy         -Tags-Bundle-support-for-eZ-P 
                    management       latform-UI)*                  
                                     *page)*                       

  [Price](https://g Price field  Yes No                            Yes
  ithub.com/ezcommu for product                                    
  nity/EzPriceBundl catalog use                                    
  e)                                                               

  [Matrix](https:// Matrix field Yes No                            Yes
  github.com/ezcomm for matrix                                     
  unity/EzMatrixFie data                                           
  ldTypeBundle)                                                    
  -------------------------------------------------------------------------

</div>
**Known missing Field Types**

The following Field Types are configured using [Null Field
Type](Null-Field-Type_31430527.html) to avoid exceptions if they exists
in your database, but their functionality is currently not known to be
implemented out of the box or by the community:

[![image0](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20112](https://jira.ez.no/browse/EZP-20112?src=confmacro)
- Some Shop FieldTypes are not supported by Public API Backlog

[![image1](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20115](https://jira.ez.no/browse/EZP-20115?src=confmacro)
- eZ Identifier FieldType not supported by Public API Backlog

[![image2](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20118](https://jira.ez.no/browse/EZP-20118?src=confmacro)
- eZ Password Expiry FieldType not supported by Public API Backlog

*Missing something? For field types provided by community, like for
instance `ezselection2`, unless otherwise mentioned it can be considered
missing for the time being. If something should be listed here, add a
comment.* 

**Generate new Field Type**

Besides links in the top of this topic in regards to creating own field
type, from partner Smile there is now a [Field Type Generator
Bundle](https://github.com/Smile-SA/EzFieldTypeGeneratorBundle) helping
you get started creating skeleton for eZ Platform field type, including
templates for editorial interface. 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**Related topics:**

-   [Content items, Content Types and Fields](31430275.html)

**In this topic:**

<div class="toc-macro rbtoc1490375993812">
-   [Built in Field Types](#FieldTypesreference-BuiltinFieldTypes)
-   [Field Types provided by
    Community](#FieldTypesreference-FieldTypesprovidedbyCommunity)
-   [Known missing Field
    Types](#FieldTypesreference-KnownmissingFieldTypes)
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

