1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Community
    Resources](Community-Resources_31429530.html)</span>
4.  <span>[How to Contribute](How-to-Contribute_31429587.html)</span>

<span id="title-text"> Developer : Contributing translations </span> {#title-heading .pagetitle}
====================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Mar 21, 2017

If you’d like to see eZ Platform in your language, you can contribute to
the translations. Contributing is made easy by using Crowdin, which
allows you to translate elements of the interface in context.

How to translate the interface using Crowdin {#Contributingtranslations-HowtotranslatetheinterfaceusingCrowdin}
============================================

If you wish to contribute to an existing translation of PlatformUI or
start a new one, <span class="inline-comment-marker"
data-ref="b52fbf5d-a27a-42e7-b153-f1509bb55b71">the best way</span> is
to start with in-context translation (but you can also [translate
directly on the Crowdin
website](#Contributingtranslations-Translatingoutsidein-context)).

Preparing to use in-context {#Contributingtranslations-Preparingtousein-context}
---------------------------

To start translating, you need an option to turn in-context translation
on and off. To do this, set a browser cookie. There are several ways to
do this, but we will highlight a couple here.

### Using bookmarks {#Contributingtranslations-Usingbookmarks}

You can easily create two bookmarks to toggle in-context on/off.

Right-click your browser’s bookmark bar, and create a new bookmark, with
the following label and link:

-   Enable in-context:
    `javascript:(function() {document.cookie='ez_in_context_translation=1;path=/;'; location.reload();})()`
-   Disable in-context:
    `javascript:(function()  {document.cookie='ez_in_context_translation=;expires=Mon, 05 Jul 2000  00:00:00 GMT;path=/;'; location.reload();})()`

Then click on the bookmarks from PlatformUI to enable/disable
in-context.

### Using the debugging console {#Contributingtranslations-Usingthedebuggingconsole}

Another way is to open the development console and run these lines:

-   enable:
    `document.cookie='ez_in_context_translation=1;path=/;'; location.reload();`
-   disable:
    `document.cookie='ez_in_context_translation=;expires=Mon, 05 Jul 2000 00:00:00 GMT;path=/;'; location.reload();`

Using in-context translation {#Contributingtranslations-Usingin-contexttranslation}
----------------------------

The first time you enable in-context, if you’re not logged into Crowdin,
it will ask you to log in or register an account. Once done, it will ask
you which language you want to translate to, from the list of languages
configured in Crowdin.

Choose your language and you can start translating right away.
Strings in the interface that can be translated will be outlined in red
(untranslated), blue (translated) or green (approved). When moving over
them, an edit button will show up on the top left corner of the outline.
Click on it, and edit the string in the window that shows up.

### <span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![ In-context translation of Platform UI](attachments/31429671/33554862.png " In-context translation of Platform UI"){.confluence-embedded-image .image-center width="800" height="480"}</span> {#Contributingtranslations- .nolink}

#### Troubleshooting {#Contributingtranslations-Troubleshooting}

Make sure you clear your browser’s cache in addition to eZ Platform’s.
Some of the translation resources use aggressive HTTP cache.

Translating outside in-context {#Contributingtranslations-Translatingoutsidein-context}
------------------------------

If you prefer not to use in-context, simply visit [eZ Platform’s Crowdin
page](https://crowdin.com/project/ezplatform){.external-link}, choose a
language and you will see a list of files containing strings. Here you
can suggest your translations.

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
If the language you want to translate to is not available, you can ask
for it to be added in the [Crowdin discussion forum for eZ
Platform](https://crowdin.com/project/ezplatform/discussions){.external-link}.

Install new translation package {#Contributingtranslations-Installnewtranslationpackage}
===============================

To make use of the UI translations, you need to<span
class="inline-comment-marker"
data-ref="9504e97b-17fd-4ff0-bae5-958311e12228"> install the new
translation package in your project.</span>

Translation packages per language {#Contributingtranslations-Translationpackagesperlanguage}
---------------------------------

To allow users to install only what they need, we have split every
language into a dedicated package.

All translation packages are published on [ezplatform-i18n organisation
on github](https://github.com/ezplatform-i18n){.external-link}

Install a new language in your project {#Contributingtranslations-Installanewlanguageinyourproject}
--------------------------------------

<span class="inline-comment-marker"
data-ref="9370cf8d-c018-4086-aaa3-d6723bb71444">If you want to install a
new language in your project, you just have to install the corresponding
package.</span>

For example, if you want to translate your application into French, you
just have to run:

    composer require ezplatform-i18n/ezplatform-i18n-fr_fr

and then clear the cache.

Now you can reload your eZ Platform administration page which will be
translated in French (if your browser is configured to fr\_FR.)

Full translation workflow {#Contributingtranslations-Fulltranslationworkflow}
=========================

<span class="inline-comment-marker"
data-ref="20756fb2-d2e8-4028-812b-0513d0ba73d9">You can read a full
description of how new translations are prepared and dis</span>tributed
in [the documentation of
GitHub](https://github.com/ezsystems/ezplatform/blob/1.8/doc/i18n/translation_workflow.md){.external-link}.

#### In this topic: {#Contributingtranslations-Inthistopic:}

-   [How to translate the interface using
    Crowdin](#Contributingtranslations-HowtotranslatetheinterfaceusingCrowdin)
    -   [Preparing to use
        in-context](#Contributingtranslations-Preparingtousein-context)
        -   [Using bookmarks](#Contributingtranslations-Usingbookmarks)
        -   [Using the debugging
            console](#Contributingtranslations-Usingthedebuggingconsole)
    -   [Using in-context
        translation](#Contributingtranslations-Usingin-contexttranslation)
        -   [](#Contributingtranslations-)
    -   [Translating outside
        in-context](#Contributingtranslations-Translatingoutsidein-context)
-   [Install new translation
    package](#Contributingtranslations-Installnewtranslationpackage)
    -   [Translation packages per
        language](#Contributingtranslations-Translationpackagesperlanguage)
    -   [Install a new language in your
        project](#Contributingtranslations-Installanewlanguageinyourproject)
-   [Full translation
    workflow](#Contributingtranslations-Fulltranslationworkflow)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


