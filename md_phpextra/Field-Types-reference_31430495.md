1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and
    Fields](31430275.html)</span>

<span id="title-text"> Developer : Field Types reference </span> {#title-heading .pagetitle}
================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> Sarah Haïm-Lubczanski</span> on Nov 29, 2016

This page contains a reference of Field Types used in eZ Platform.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For the general Field Type documentation see [Field Type API and best
practices](Field-Type-API-and-best-practices_31430767.html).

If you are looking for the documentation on how to implement a custom
Field Type, see the [Creating a Tweet Field
Type](Creating-a-Tweet-Field-Type_31429766.html) tutorial.

<span>A Field Type is the smallest possible entity of storage. It
determines how a specific type of information should be validated,
stored, retrieved, formatted and so on. eZ Platform comes with a
collection of fundamental types that can be used to build powerful and
complex content structures. In addition, it is possible to extend the
system by creating custom Field Types for special needs. Custom Field
Types have to be programmed in PHP. However, the built-in Field
Types are usually sufficient enough for typical scenarios. The following
table gives an overview of the supported Field Types that come with eZ
Platform.</span>

### <span>Built in Field Types</span> {#FieldTypesreference-BuiltinFieldTypes}

| FieldType                                                                                                                 | Description                                                                         | Searchable in Legacy Storage engine               |
|---------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------|---------------------------------------------------|
| [Author](Author-Field-Type_31430499.html)                                                                                 | Stores a list of authors, each consisting of author name and author email.          | No                                                |
| [BinaryFile](BinaryField-Field-Type_31430501.html)                                                                        | Stores a file.                                                                      | Yes                                               |
| [Checkbox](Checkbox-Field-Type_31430497.html)                                                                             | Stores a boolean value.                                                             | Yes                                               |
| [Country](Country-Field-Type_31430503.html)                                                                               | Stores country names as a string.                                                   | Yes                                               |
| <span class="confluence-link"> [DateAndTime](DateAndTime-Field-Type_31430505.html) </span>                                | Stores a full date including time information.                                      | <span>Yes</span>                                  |
| <span class="confluence-link"> [Date](Date-Field-Type_31430507.html) </span>                                              | Stores date information.                                                            | <span>Yes</span>                                  |
| <span class="confluence-link"> [EmailAddress](EmailAddress-Field-Type_31430509.html) </span>                              | Validates and stores an email address.                                              | Yes                                               |
| <span class="confluence-link"> [Float](Float-Field-Type_31430511.html) </span>                                            | Validates and stores a decimal value.                                               | No                                                |
| <span class="confluence-link"> [Image](Image-Field-Type_31430513.html) </span>                                            | Validates and stores an image.                                                      | No                                                |
| <span class="confluence-link"> [Integer](Integer-Field-Type_31430515.html) </span>                                        | Validates and stores an integer value.                                              | Yes                                               |
| <span class="confluence-link"> [ISBN](ISBN-Field-Type_31430517.html) </span>                                              | Handles International Standard Book Number (ISBN) in 10-digit or 13-digit format.   | Yes                                               |
| <span class="confluence-link"> [Keyword](Keyword-Field-Type_31430519.html) </span>                                        | Stores keywords.                                                                    | No                                                |
| [Landing Page](31430521.html)                                                                                             | Stores a page with a layout consisting of multiple zones.                           | No                                                |
| <span class="confluence-link"> [MapLocation](MapLocation-Field-Type_31430523.html) </span>                                | Stores map coordinates.                                                             | Yes, with MapLocationDistance criterion           |
| <span class="confluence-link"> [Media](Media-Field-Type_31430525.html) </span>                                            | Validates and stores a media file.                                                  | No                                                |
| <span class="confluence-link"> [Null](Null-Field-Type_31430527.html) </span>                                              | Used as fallback for missing Field Types and for testing purposes.                  | No                                                |
| <span class="confluence-link"> [Rating](Rating-Field-Type_31430531.html) </span>                                          | Stores a rating.                                                                    | No                                                |
| <span class="confluence-link"> [Relation](Relation-Field-Type_31430533.html) </span>                                      | Validates and stores a relation to a Content item.                                  | Yes, with both Field and FieldRelation criterions |
| <span class="confluence-link"> [RelationList](RelationList-Field-Type_31430535.html) </span>                              | Validates and stores a list of relations to Content items.                          | Yes, with FieldRelation criterion                 |
| [RichText](RichText-Field-Type_31430537.html)                                                                             | Validates and stores structured rich text, and exposes it in several formats.       | Yes                                               |
| <span class="confluence-link"> [Selection](Selection-Field-Type_31430539.html) </span>                                    | Validates and stores a single selection or multiple choices from a list of options. | Yes                                               |
| <span class="confluence-link"> [TextBlock](TextBlock-Field-Type_31430541.html) </span>                                    | Validates and stores a larger block of text.                                        | No                                                |
| <span class="confluence-link"> [TextLine](TextLine-Field-Type_31430545.html) </span>                                      | Validates and stores a single line of text.                                         | Yes                                               |
| <span class="confluence-link"> [Time](Time-Field-Type_31430543.html) </span>                                              | Stores time information.                                                            | Yes                                               |
| <span class="confluence-link"> [Url](Url-Field-Type_31430547.html) </span>                                                | Stores a URL / address.                                                             | No                                                |
| <span class="confluence-link"> [User](User-Field-Type_31430549.html) </span>                                              | Validates and stores information about a user.                                      | No                                                |
| <span class="confluence-link"> <span class="confluence-link"> [XmlText](XmlText-Field-Type_31430551.html) </span> </span> | Validates and stores multiple lines of formatted text.                              | Yes                                               |

### Field Types provided by Community {#FieldTypesreference-FieldTypesprovidedbyCommunity}

| FieldType                                                                        | Description                                    | Searchable | Editing support in UI                                                                                                                                                           | Planned to be incl in the future |
|----------------------------------------------------------------------------------|------------------------------------------------|------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------|
| [Tags](https://github.com/netgen/TagsBundle){.external-link}                     | Tags field and full fledge taxonomy management | Yes        | <span style="color: rgb(153,51,0);">No</span> *(See [crowdfunding](http://www.netgenlabs.com/Blog/Crowdfunding-Tags-Bundle-support-for-eZ-Platform-UI){.external-link}* *page)* | Yes                              |
| [Price](https://github.com/ezcommunity/EzPriceBundle){.external-link}            | Price field for product catalog use            | Yes        | <span style="color: rgb(153,51,0);">No</span>                                                                                                                                   | Yes                              |
| [Matrix](https://github.com/ezcommunity/EzMatrixFieldTypeBundle){.external-link} | Matrix field for matrix data                   | Yes        | <span style="color: rgb(153,51,0);">No</span>                                                                                                                                   | Yes                              |

### Known missing Field Types {#FieldTypesreference-KnownmissingFieldTypes}

The following Field Types are configured using [Null Field
Type](Null-Field-Type_31430527.html) to avoid exceptions if they exists
in your database, but their functionality is currently not known to be
implemented out of the box or by the community:

<span class="jira-issue">
[![](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20112](https://jira.ez.no/browse/EZP-20112?src=confmacro){.jira-issue-key}
- <span class="summary">Some Shop FieldTypes are not supported by Public
API</span> <span
class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete jira-macro-single-issue-export-pdf">Backlog</span>
</span>

<span class="jira-issue">
[![](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20115](https://jira.ez.no/browse/EZP-20115?src=confmacro){.jira-issue-key}
- <span class="summary">eZ Identifier FieldType not supported by Public
API</span> <span
class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete jira-macro-single-issue-export-pdf">Backlog</span>
</span>

<span class="jira-issue">
[![](https://jira.ez.no/images/icons/issuetypes/story.png){.icon}EZP-20118](https://jira.ez.no/browse/EZP-20118?src=confmacro){.jira-issue-key}
- <span class="summary">eZ Password Expiry FieldType not supported by
Public API</span> <span
class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete jira-macro-single-issue-export-pdf">Backlog</span>
</span>

*Missing something? For field types provided by community, like for
instance `ezselection2`, unless otherwise mentioned it can be considered
missing for the time being. If something should be listed here, add a
comment.* 

### Generate new Field Type {#FieldTypesreference-GeneratenewFieldType}

Besides links in the top of this topic in regards to creating own field
type, from partner Smile there is now a [Field Type Generator
Bundle](https://github.com/Smile-SA/EzFieldTypeGeneratorBundle){.external-link}
helping you get started creating skeleton for eZ Platform field type,
including templates for editorial interface. 

 

#### Related topics: {#FieldTypesreference-Relatedtopics:}

-   [Content items, Content Types and Fields](31430275.html)

#### In this topic: {#FieldTypesreference-Inthistopic:}

-   [Built in Field Types](#FieldTypesreference-BuiltinFieldTypes)
-   [Field Types provided by
    Community](#FieldTypesreference-FieldTypesprovidedbyCommunity)
-   [Known missing Field
    Types](#FieldTypesreference-KnownmissingFieldTypes)
-   [Generate new Field Type](#FieldTypesreference-GeneratenewFieldType)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


