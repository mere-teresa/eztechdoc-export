# Public API Guide

The public API will give you an easy access to the eZ Platform content repository. This repository is the core component that manages content, Locations, Sections, Content Types, Users, User groups, and Roles. It also provides a new, clear interface for plugging in custom Field Types.

 
The public API is built on top of a layered architecture, including a persistence API that abstracts storage. By using the public API, you are sure that your code will be forward compatible with future releases based on enhanced, scalable and high-performance storage engines. Applications based on the public API are also fully backwards compatible by using the included storage engine based on the current kernel and database model.

## About this Guide

The objective of this Public API Guide is to progressively lead you through useful, everyday business logic, using the API in concrete recipes: obtaining a Location from a Content item, fetching a set of Content items, creating a User, and so on.

For each recipe, newly introduced elements will be explained in detail, including the required API components (services, value objects, etc.). 

### Suggested tools

In addition to this cookbook, we strongly recommend that you use a full featured PHP IDE, such as Eclipse or PHPStorm. It will provide you information on every piece of code you use, including objects and classes documentation. We have paid very careful attention to PHPDoc throughout this API, and such a tool is a very valuable help when using this API.

On top of this, generated public API documentation can be found online, in various formats:

-   doxygen: <http://apidoc.ez.no/doxygen/trunk/NS/html/>
-   sami: <http://apidoc.ez.no/sami/trunk/NS/html/>

 

-   [Getting started with the Public API](Getting_started_with_the_Public_API)
-   [Browsing, finding, viewing](Browsing,_finding,_viewing)
-   [Managing Content](Managing_Content)
-   [Working with Locations](Working_with_Locations)
-   [Other recipes](Other_recipes)


