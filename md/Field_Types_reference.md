# Field Types reference

This page contains a reference of Field Types used in eZ Platform.

For the general Field Type documentation see [Field Type API and best practices](Field_Type_API_and_best_practices).

If you are looking for the documentation on how to implement a custom Field Type, see the [Creating a Tweet Field Type](Creating_a_Tweet_Field_Type) tutorial.

A Field Type is the smallest possible entity of storage. It determines how a specific type of information should be validated, stored, retrieved, formatted and so on. eZ Platform comes with a collection of fundamental types that can be used to build powerful and complex content structures. In addition, it is possible to extend the system by creating custom Field Types for special needs. Custom Field Types have to be programmed in PHP. However, the built-in Field Types are usually sufficient enough for typical scenarios. The following table gives an overview of the supported Field Types that come with eZ Platform.

### Built in Field Types

| FieldType                                            | Description                                                                         | Searchable in Legacy Storage engine               |
|------------------------------------------------------|-------------------------------------------------------------------------------------|---------------------------------------------------|
| [Author](Author_Field_Type)                          | Stores a list of authors, each consisting of author name and author email.          | No                                                |
| [BinaryFile](BinaryField_Field_Type)                 | Stores a file.                                                                      | Yes                                               |
| [Checkbox](Checkbox_Field_Type)                      | Stores a boolean value.                                                             | Yes                                               |
| [Country](Country_Field_Type)                        | Stores country names as a string.                                                   | Yes                                               |
| DateAndTime                                          | Stores a full date including time information.                                      | Yes                                               |
| Date                                                 | Stores date information.                                                            | Yes                                               |
| EmailAddress                                         | Validates and stores an email address.                                              | Yes                                               |
| Float                                                | Validates and stores a decimal value.                                               | No                                                |
| Image                                                | Validates and stores an image.                                                      | No                                                |
| Integer                                              | Validates and stores an integer value.                                              | Yes                                               |
| ISBN                                                 | Handles International Standard Book Number (ISBN) in 10-digit or 13-digit format.   | Yes                                               |
| Keyword                                              | Stores keywords.                                                                    | No                                                |
| [Landing Page](Landing_Page_Field_Type__Enterprise_) | Stores a page with a layout consisting of multiple zones.                           | No                                                |
| MapLocation                                          | Stores map coordinates.                                                             | Yes, with MapLocationDistance criterion           |
| Media                                                | Validates and stores a media file.                                                  | No                                                |
| Null                                                 | Used as fallback for missing Field Types and for testing purposes.                  | No                                                |
| Rating                                               | Stores a rating.                                                                    | No                                                |
| Relation                                             | Validates and stores a relation to a Content item.                                  | Yes, with both Field and FieldRelation criterions |
| RelationList                                         | Validates and stores a list of relations to Content items.                          | Yes, with FieldRelation criterion                 |
| [RichText](RichText_Field_Type)                      | Validates and stores structured rich text, and exposes it in several formats.       | Yes                                               |
| Selection                                            | Validates and stores a single selection or multiple choices from a list of options. | Yes                                               |
| TextBlock                                            | Validates and stores a larger block of text.                                        | No                                                |
| TextLine                                             | Validates and stores a single line of text.                                         | Yes                                               |
| Time                                                 | Stores time information.                                                            | Yes                                               |
| Url                                                  | Stores a URL / address.                                                             | No                                                |
| User                                                 | Validates and stores information about a user.                                      | No                                                |
| XmlText                                              | Validates and stores multiple lines of formatted text.                              | Yes                                               |

### Field Types provided by Community

| FieldType                                                        | Description                                    | Searchable | Editing support in UI                                                                                                | Planned to be incl in the future |
|------------------------------------------------------------------|------------------------------------------------|------------|----------------------------------------------------------------------------------------------------------------------|----------------------------------|
| [Tags](https://github.com/netgen/TagsBundle)                     | Tags field and full fledge taxonomy management | Yes        | No *(See [crowdfunding](http://www.netgenlabs.com/Blog/Crowdfunding-Tags-Bundle-support-for-eZ-Platform-UI)* *page)* | Yes                              |
| [Price](https://github.com/ezcommunity/EzPriceBundle)            | Price field for product catalog use            | Yes        | No                                                                                                                   | Yes                              |
| [Matrix](https://github.com/ezcommunity/EzMatrixFieldTypeBundle) | Matrix field for matrix data                   | Yes        | No                                                                                                                   | Yes                              |

### Known missing Field Types

The following Field Types are configured using [Null Field Type](Null_Field_Type) to avoid exceptions if they exists in your database, but their functionality is currently not known to be implemented out of the box or by the community:

EZP-20112 - Some Shop FieldTypes are not supported by Public API Backlog

EZP-20115 - eZ Identifier FieldType not supported by Public API Backlog

EZP-20118 - eZ Password Expiry FieldType not supported by Public API Backlog

*Missing something? For field types provided by community, like for instance `ezselection2`, unless otherwise mentioned it can be considered missing for the time being. If something should be listed here, add a comment.* 

### Generate new Field Type

Besides links in the top of this topic in regards to creating own field type, from partner Smile there is now a [Field Type Generator Bundle](https://github.com/Smile-SA/EzFieldTypeGeneratorBundle) helping you get started creating skeleton for eZ Platform field type, including templates for editorial interface. 

 

#### Related topics:

-   [Content items, Content Types and Fields](Content_items,_Content_Types_and_Fields)

#### In this topic:

-   [Built in Field Types](#FieldTypesreference-BuiltinFieldTypes)
-   [Field Types provided by Community](#FieldTypesreference-FieldTypesprovidedbyCommunity)
-   [Known missing Field Types](#FieldTypesreference-KnownmissingFieldTypes)
-   [Generate new Field Type](#FieldTypesreference-GeneratenewFieldType)


