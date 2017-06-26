1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Security </span> {#title-heading .pagetitle}
===================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> Sarah Haïm-Lubczanski</span> on May 24, 2016

Introduction {#Security-Introduction}
============

eZ Platform offers security and access control for your website using a
complex permission system which allows you to define very fine-grained
rights for all your users.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
See
[Permissions](https://doc.ez.no/display/DEVELOPER/Repository#Repository-Permissions)
for more information.

Configuration {#Security-Configuration}
=============

<span>To use Symfony authentication with eZ Platform, the configuration
goes as follows:</span>

**app/config/security.yml**

~~~~ brush:
security:
    firewalls:
        ezpublish_front:
            pattern: ^/
            anonymous: ~
            form_login:
                require_previous_session: false
            logout: ~
~~~~

**app/config/routing.yml**

~~~~ brush:
login:
    path:   /login
    defaults:  { _controller: ezpublish.security.controller:loginAction }
login_check:
    path:   /login_check
logout:
    path:   /logout
~~~~

Note

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
You can fully customize the routes and/or the controller used for login.
However, remember to match `login_path`, `check_path` and `logout.path`
from `security.yml`.

See [security configuration
reference](http://symfony.com/doc/2.3/reference/configuration/security.html){.external-link}
and [standard login form
documentation](http://symfony.com/doc/2.3/book/security.html#using-a-traditional-login-form){.external-link}.

 

Usage {#Security-Usage}
=====

Authentication is provided using the Symfony Security component.

Authentication using Symfony Security component {#Security-AuthenticationusingSymfonySecuritycomponent}
-----------------------------------------------

[<span>Native and universal </span>
`form_login`](http://symfony.com/doc/2.3/book/security.html#using-a-traditional-login-form){.external-link}
<span> is used, in conjunction with an extended </span>
`DaoAuthenticationProvider` <span> (DAO stands for </span> *Data Access
Object* <span>), the </span> `RepositoryAuthenticationProvider` <span>.
Native behavior of </span> `DaoAuthenticationProvider` <span> has been
preserved, making it possible to still use it for pure Symfony
applications.</span>

### <span>Security controller</span> {#Security-Securitycontroller}

A `SecurityController` is used to manage all security-related actions
and is thus used to display login form. It is pretty straightforward and
follows all standards explained in [Symfony security
documentation](http://symfony.com/doc/2.3/book/security.html#using-a-traditional-login-form){.external-link}.

Base template used is `EzPublishCoreBundle:Security:login.html.twig` and
stands as follows:

~~~~ brush:
{% extends layout %}

{% block content %}
    {% block login_content %}
        {% if error %}
            <div>{{ error.message|trans }}</div>
        {% endif %}

        <form action="{{ path( 'login_check' ) }}" method="post">
        {% block login_fields %}
            <label for="username">{{ 'Username:'|trans }}</label>
            <input type="text" id="username" name="_username" value="{{ last_username }}" />

            <label for="password">{{ 'Password:'|trans }}</label>
            <input type="password" id="password" name="_password" />

            <input type="hidden" name="_csrf_token" value="{{ csrf_token("authenticate") }}" />

            {#
                If you want to control the URL the user
                is redirected to on success (more details below)
                <input type="hidden" name="_target_path" value="/account" />
            #}

            <button type="submit">{{ 'Login'|trans }}</button>
        {% endblock %}
        </form>
    {% endblock %}
{% endblock %}
~~~~

<span> <span>The layout used by default is </span>
`%ezpublish.content_view.viewbase_layout%` <span> (empty layout) but can
be configured easily together with the login template:</span> </span>

**ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        my_siteaccess:
            user:
                layout: "AcmeTestBundle::layout.html.twig"
                login_template: "AcmeTestBundle:User:login.html.twig"
~~~~

#### Redirection after login {#Security-Redirectionafterlogin}

By default, Symfony redirects to the [URI configured
in `security.yml` as `default_target_path`](http://symfony.com/doc/2.3/reference/configuration/security.html){.external-link}.
If not set, it will default to `/`.

This setting can be set by siteaccess, via <span
class="confluence-link"> </span>[<span
class="confluence-link">`default_page` setting</span>](Bundles_31430133.html#Bundles-Defaultpage).

 

### Access control {#Security-Accesscontrol}

See the [documentation on access
control](https://doc.ez.no/display/DEVELOPER/Repository#Repository-Permissions).

### Remember me {#Security-Rememberme}

It is possible to use the `remember_me` functionality. For this you can
refer to the [Symfony cookbook on this
topic](http://symfony.com/doc/2.3/cookbook/security/remember_me.html){.external-link}.

If you want to use this feature, you must at least extend the login
template in order to add the required checkbox:

~~~~ brush:
{# your_login_template.html.twig #}
{% extends "EzPublishCoreBundle:Security:login.html.twig" %}

{% block login_fields %}
    {{ parent() }}
    <input type="checkbox" id="remember_me" name="_remember_me" checked />
    <label for="remember_me">Keep me logged in</label>
{% endblock %}
~~~~

### Login handlers / SSO {#Security-Loginhandlers/SSO}

Symfony provides native support for [multiple user
providers](http://symfony.com/doc/2.3/book/security.html#using-multiple-user-providers){.external-link}.
This makes it easy to integrate any kind of login handlers, including
SSO and existing third-party bundles
(e.g. [FR3DLdapBundle](https://github.com/Maks3w/FR3DLdapBundle){.external-link}, [HWIOauthBundle](https://github.com/hwi/HWIOAuthBundle){.external-link}, [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle){.external-link}, [BeSimpleSsoAuthBundle](http://github.com/BeSimple/BeSimpleSsoAuthBundle){.external-link},
etc.).

Further explanation can be found in the <span
class="confluence-link">[multiple user providers
recipe](Authenticating-a-user-with-multiple-user-providers_31429790.html)</span>.

### Integration with Legacy {#Security-IntegrationwithLegacy}

-   When **not** in legacy mode,
    legacy `user/login` and `user/logout` views are deactivated.
-   Authenticated user is injected in legacy kernel.

Authentication with Legacy SSO Handlers {#Security-AuthenticationwithLegacySSOHandlers}
---------------------------------------

To be able to use your legacy SSO (Single Sign-on) handlers, use the
following config in your `ezpublish/config/security.yml`:

**Use your legacy SSO handlers**

~~~~ brush:
security:
    firewalls:
        ezpublish_front:
            pattern: ^/
            anonymous: ~
            # Adding the following entry will activate the use of old SSO handlers.
            ezpublish_legacy_sso: ~ 
~~~~

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
If you need to[create your legacy SSO Handler, please read this
entry](http://share.ez.no/learn/ez-publish/using-a-sso-in-ez-publish){.external-link}

#### In this topic: {#Security-Inthistopic:}

-   [Introduction](#Security-Introduction)
-   [Configuration](#Security-Configuration)
-   [Usage](#Security-Usage)
    -   [Authentication using Symfony Security
        component](#Security-AuthenticationusingSymfonySecuritycomponent)
        -   [Security controller](#Security-Securitycontroller)
        -   [Access control](#Security-Accesscontrol)
        -   [Remember me](#Security-Rememberme)
        -   [Login handlers / SSO](#Security-Loginhandlers/SSO)
        -   [Integration with Legacy](#Security-IntegrationwithLegacy)
    -   [Authentication with Legacy SSO
        Handlers](#Security-AuthenticationwithLegacySSOHandlers)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


