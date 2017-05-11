1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : User Generated Content </span> {#title-heading .pagetitle}
=================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified by <span class="editor"> Bertrand Dunogier</span> on Jun 28,
2016

Introduction {#UserGeneratedContent-Introduction}
============

Content Edit {#UserGeneratedContent-ContentEdit}
------------

<span class="status-macro aui-lozenge aui-lozenge-current">V1.2</span>

eZ Platform comes with content edition features via the Symfony stack.
They are meant, in addition the PlatformUI’s editing capabilities, to
allow the implementation of User Generated Content from the frontend.

Usage {#UserGeneratedContent-Usage}
=====

Creating a content item without using a draft {#UserGeneratedContent-Creatingacontentitemwithoutusingadraft}
---------------------------------------------

As of eZ Platform 1.2, a new `/content/edit/nodraft` route is available.
It will show a Content item creation form for a given Content Type:

| argument                | type      | description                                                                |
|-------------------------|-----------|----------------------------------------------------------------------------|
| `contentTypeIdentifier` | `string`  | The identifier of the content type to create. Example: `folder`, `article` |
| `languageCode`          | `string`  | Language code the content item must be created in. Example: `eng-GB`       |
| `parentLocationId`      | `integer` | ID of the Location the content item must be created in. Example: `2`       |

For now a very limited subset of Field Types is supported. These are:

-   <span
    class="status-macro aui-lozenge aui-lozenge-current">V1.2</span>` TextLine`
    and `TextBlock`
-   <span
    class="status-macro aui-lozenge aui-lozenge-current">V1.4</span>
    `Selection`, `Checkbox` and `User`

More will be added in the near future.

Registering new users {#UserGeneratedContent-Registeringnewusers}
---------------------

<span class="status-macro aui-lozenge aui-lozenge-current">V1.4</span>

You can allow your users to create accounts by employing the `/register`
route. This route leads to a registration form that, when filled in,
creates a new User Content item in the repository.

#### User Groups {#UserGeneratedContent-UserGroups}

By default, new Users generated in this way are placed in the Guest
accounts group. You can select a different default group in the
following section of configuration:

~~~~ brush:
ezpublish:
    system:
        default:
            user_registration:
                group_id: <userGroupContentId>
~~~~

#### Registration form templates {#UserGeneratedContent-Registrationformtemplates}

You can use custom templates for the registration form and for the
registration confirmation page.

These templates are defined with the following configuration:

~~~~ brush:
ezpublish:
    system:
        default:
            user_registration:
                templates:
                    form: 'user/registration_form.html.twig'
                    confirmation: 'user/registration_confirmation.html.twig'
~~~~

with the following templates in
`app/Resources/views/user/registration_form.html.twig`:

~~~~ brush:
{% extends noLayout is defined and noLayout == true ? viewbaseLayout : pagelayout %}
{% block content %}
     {% import "EzSystemsRepositoryFormsBundle:Content:content_form.html.twig" as contentForms %}
     
     <section class="ez-content-edit">
         {{ contentForms.display_form(form) }}
     </section>
{% endblock %}
~~~~

and in `app/Resources/views/user/registration_confirmation.html.twig`:

~~~~ brush:
{% extends noLayout is defined and noLayout == true ? viewbaseLayout : pagelayout %}
{% block content %}
    <h1>Your account has been created</h1>
    <p class="user-register-confirmation-message">
        Thank you for registering an account. You can now <a href="{{ path('login') }}">login</a>.
    </p>
{% endblock %}
~~~~

 

Repository Forms {#UserGeneratedContent-RepositoryForms}
----------------

-   Repository: <http://github.com/ezsystems/repository-forms>
-   Package: <http://packagist.org/packages/ezsystems/repository-forms>

This package provides form-based interaction for the Repository Value
objects.

It is currently used by:

-   `ezsystems/platform-ui-bundle` for most management interfaces:
    Sections, Content Types, Roles, Policies, etc.
-   `ezsystems/ezpublish-kernel` for user registration, and user
    generated content

#### In this topic: {#UserGeneratedContent-Inthistopic:}

-   [Introduction](#UserGeneratedContent-Introduction)
    -   [Content Edit](#UserGeneratedContent-ContentEdit)
-   [Usage](#UserGeneratedContent-Usage)
    -   [Creating a content item without using a
        draft](#UserGeneratedContent-Creatingacontentitemwithoutusingadraft)
    -   [Registering new
        users](#UserGeneratedContent-Registeringnewusers)
    -   [Repository Forms](#UserGeneratedContent-RepositoryForms)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


