# Creating a Tweet Field Type

## About this tutorial

 

This tutorial aims at covering the creation and development of a custom eZ Platform [Field Type](https://doc.ez.no/display/DEVELOPER/Field+Types+reference).
We will do this by implementing a *Tweet* Field Type. It will:

-   Accept as input the URL of a tweet (https://twitter.com/&lt;username&gt;/status/&lt;id&gt;)

-   Fetch the tweet using the Twitter oEmbed API (<https://dev.twitter.com/docs/embedded-tweets>)

-   Store the tweet’s embed contents and URL

-   Display the tweet's embedded version when displaying the field from a template

 

![](attachments/31429766/31429765.png)

### About Field Types

Field Types are the most granular building blocks for content managed by eZ Platform. The system comes with about [30 native types](Field_Types_reference) that cover most common needs (Text line, Rich text, Email, Author list, Content relation, Map location, Float, etc.)

Field Types are responsible for:

-   Storing data, either using the native storage engine mechanisms, or specific means

-   Validating input data

-   Making the data searchable (if applicable)

-   Displaying an instance of the type

Custom Field Types are a very powerful type of extension, since they allow you to hook deep into the content model.

You can find the in-depth [documentation about Field Types and their best practices here](Field_Type_API_and_best_practices). It describes how each component of a Field Type interacts with the various layers of the system, and how to implement those.

 

## Getting the code

The code created throughout this tutorial is available on GitHub: <https://github.com/ezsystems/TweetFieldTypeBundle>.

 

## Steps

### The bundle

Field Types, like any other eZ Platform plugin, must be provided as Symfony2 bundles. This chapter covers the creation and organization of this bundle.

Read more about [creating](Create_the_bundle) and [structuring the bundle](Structure_the_bundle).

### API

This part covers the implementation of the eZ Platform API elements required to implement a custom Field Type.

Read more about [implementing the Tweet\\Value class](Implement_the_Tweet_Value_class) and [the Tweet\\Type class](Implement_the_Tweet_Type_class).

### Converter

Storing data from any Field Type into the Legacy Storage Engine requires that your custom data is mapped to the data model.

Read more about [implementing the Legacy Storage Engine Converter](Implement_the_Legacy_Storage_Engine_Converter).

### Templating

Displaying a Field Type's data is done through a [Twig template](http://twig.sensiolabs.org/doc/intro.html).

Read more about [implementing the Field Type template](Introduce_a_template).

### PlatformUI integration

Viewing and editing values of the Field Type in PlatformUI requires that you extend PlatformUI, using mostly Javascript.

You should ideally read the general [extensibility documentation for PlatformUI](https://github.com/ezsystems/PlatformUIBundle/blob/master/docs/extensibility.md). The part about [templating](https://github.com/ezsystems/PlatformUIBundle/blob/master/docs/extensibility.md#templates-1) covers view templates. Edit templates are not documented at the time of writing, but [Netgen](http://www.netgenlabs.com/) has published a tutorial that covers the topic: <http://www.netgenlabs.com/Blog/Adding-support-for-a-new-field-type-to-eZ-Publish-Platform-UI>.

**Tutorial Path**

## Attachments:

![](images/icons/bullet_blue.gif){width="8" height="8"} [fieldtype tutorial, final result.PNG](attachments/31429766/31429765.png) (image/png)

