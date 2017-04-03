<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : User Generated Content**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified by Bertrand Dunogier on
Jun 28, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Introduction**

**Content Edit**

V1.2

eZ Platform comes with content edition features via the Symfony stack.
They are meant, in addition the PlatformUI’s editing capabilities, to
allow the implementation of User Generated Content from the frontend.

**Usage**

**Creating a content item without using a draft**

As of eZ Platform 1.2, a new `/content/edit/nodraft` route is available.
It will show a Content item creation form for a given Content Type:

<div class="table-wrap">
  ------------------------------------------------------------------------
  argument         type     description
  ---------------- -------- ----------------------------------------------
  `contentTypeIden `string` The identifier of the content type to create.
  tifier`                   Example: `folder`, `article`

  `languageCode`   `string` Language code the content item must be created
                            in. Example: `eng-GB`

  `parentLocationI `integer ID of the Location the content item must be
  d`               `        created in. Example: `2`
  ------------------------------------------------------------------------

</div>
For now a very limited subset of Field Types is supported. These are:

-   V1.2`TextLine` and `TextBlock`
-   V1.4 `Selection`, `Checkbox` and `User`

More will be added in the near future.

**Registering new users**

V1.4

You can allow your users to create accounts by employing the `/register`
route. This route leads to a registration form that, when filled in,
creates a new User Content item in the repository.

**User Groups**

By default, new Users generated in this way are placed in the Guest
accounts group. You can select a different default group in the
following section of configuration:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    system:
        default:
            user_registration:
                group_id: <userGroupContentId>
```

</div>
</div>
**Registration form templates**

You can use custom templates for the registration form and for the
registration confirmation page.

These templates are defined with the following configuration:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    system:
        default:
            user_registration:
                templates:
                    form: 'user/registration_form.html.twig'
                    confirmation: 'user/registration_confirmation.html.twig'
```

</div>
</div>
with the following templates in
`app/Resources/views/user/registration_form.html.twig`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% extends noLayout is defined and noLayout == true ? viewbaseLayout : pagelayout %}
{% block content %}
     {% import "EzSystemsRepositoryFormsBundle:Content:content_form.html.twig" as contentForms %}

     <section class="ez-content-edit">
         {{ contentForms.display_form(form) }}
     </section>
{% endblock %}
```

</div>
</div>
and in `app/Resources/views/user/registration_confirmation.html.twig`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% extends noLayout is defined and noLayout == true ? viewbaseLayout : pagelayout %}
{% block content %}
    <h1>Your account has been created</h1>
    <p class="user-register-confirmation-message">
        Thank you for registering an account. You can now <a href="{{ path('login') }}">login</a>.
    </p>
{% endblock %}
```

</div>
</div>
 

**Repository Forms**

-   Repository: <http://github.com/ezsystems/repository-forms>
-   Package: <http://packagist.org/packages/ezsystems/repository-forms>

This package provides form-based interaction for the Repository Value
objects.

It is currently used by:

-   `ezsystems/platform-ui-bundle` for most management interfaces:
    Sections, Content Types, Roles, Policies, etc.
-   `ezsystems/ezpublish-kernel` for user registration, and user
    generated content

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376001473">
-   [Introduction](#UserGeneratedContent-Introduction)
    -   [Content Edit](#UserGeneratedContent-ContentEdit)
-   [Usage](#UserGeneratedContent-Usage)
    -   [Creating a content item without using a
        draft](#UserGeneratedContent-Creatingacontentitemwithoutusingadraft)
    -   [Registering new
        users](#UserGeneratedContent-Registeringnewusers)
    -   [Repository Forms](#UserGeneratedContent-RepositoryForms)

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
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

