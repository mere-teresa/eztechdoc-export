<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Platform Release notes](eZ-Platform-Release-notes_31429935.html)
6.  [eZ Platform v1.4.0 Release
    notes](eZ-Platform-v1.4.0-Release-notes_32113421.html)

</div>
**Developer : eZ Platform 1.4.2 Release Notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified on Sep 23, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**September 20th 2016**

eZ announces the availability of 1.4.2, a maintenance release available
for all users of eZ Platform 1.4.0.

Follow the [eZ Platform Update
Instructions](Updating-eZ-Platform_31431770.html) to apply this update
to your platforms.

</div>
</div>
</div>
<div class="columnLayout single" data-layout="single">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Package Details**

**Package updates**

Here are the ezsystems packages that have received an update as part of
this release:

<div class="mod-content">
<div class="field-ignore-highlight editable-field inactive"
title="Click to edit">
<div class="user-content-block">
 

<div class="table-wrap">
  package                            version
  --------------------------------- ---------------
  ezsystems/ezpublish-kernel        v6.4.1-rc1
  ezsystems/platform-ui-bundle      v1.4.1-rc1
  ezsystems/ezplatform              v1.4.1-rc1

</div>
 

</div>
</div>
</div>
**Updates and fixes in this release**

<div id="refresh-module-687335858">
<div id="jira-issues-687335858"
style="width: 100%;  overflow: auto;">
  ------------------ ------------------------------------------ -- ---- ----
  Key                Summary                                    T  Crea Upda
                                                                   ted  ted

  [EZP-25003](https: [Clear HTTP cache when trashing,           [! Oct  Aug
  //jira.ez.no/brows recovering and deleting                    [B 20,  10,
  e/EZP-25003?src=co content/locations](https://jira.ez.no/brow ug 2015 2016
  nfmacro)           se/EZP-25003?src=confmacro)                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-25533](https: [Hardcoded anonymous\_hash in FosHttpCache [! Mar  Oct
  //jira.ez.no/brows mismatches what is generated by            [B 03,  04,
  e/EZP-25533?src=co Platform](https://jira.ez.no/browse/EZP-25 ug 2016 2016
  nfmacro)           533?src=confmacro)                         ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-25913](https: [urlAliasGenerator::generate issues in     [! Jun  Sep
  //jira.ez.no/brows console command /                          [B 20,  05,
  e/EZP-25913?src=co cli](https://jira.ez.no/browse/EZP-25913?s ug 2016 2016
  nfmacro)           rc=confmacro)                              ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26042](https: [Some mandatory parameters are missing     [! Jul  Aug
  //jira.ez.no/brows (“language”) to generate a URL for route   [B 07,  25,
  e/EZP-26042?src=co “\_ez\_content\_view”](https://jira.ez.no/ ug 2016 2016
  nfmacro)           browse/EZP-26042?src=confmacro)            ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26081](https: [ae-toolbars not displayed on Microsoft    [! Jul  Aug
  //jira.ez.no/brows Edge](https://jira.ez.no/browse/EZP-26081? [B 15,  03,
  e/EZP-26081?src=co src=confmacro)                             ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26086](https: [Unable to inject additional service or    [! Jul  Jul
  //jira.ez.no/brows value into QueryType as a                  [B 18,  20,
  e/EZP-26086?src=co service](https://jira.ez.no/browse/EZP-260 ug 2016 2016
  nfmacro)           86?src=confmacro)                          ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26101](https: [Integer and Float Fields validation       [! Jul  Aug
  //jira.ez.no/brows broken in                                  [B 19,  03,
  e/EZP-26101?src=co Firefox](https://jira.ez.no/browse/EZP-261 ug 2016 2016
  nfmacro)           01?src=confmacro)                          ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26106](https: [Error when tagging a service as a         [! Jul  Jul
  //jira.ez.no/brows QueryType if the class is a                [B 19,  21,
  e/EZP-26106?src=co parameter](https://jira.ez.no/browse/EZP-2 ug 2016 2016
  nfmacro)           6106?src=confmacro)                        ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26116](https: [Error trashing an object with multiple    [! Jul  Aug
  //jira.ez.no/brows locations](https://jira.ez.no/browse/EZP-2 [B 22,  25,
  e/EZP-26116?src=co 6116?src=confmacro)                        ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26117](https: [Required richtext not validated as filled [! Jul  Sep
  //jira.ez.no/brows with single                                [B 25,  01,
  e/EZP-26117?src=co embed](https://jira.ez.no/browse/EZP-26117 ug 2016 2016
  nfmacro)           ?src=confmacro)                            ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26124](https: [Results of search in UDW                  [! Jul  Jul
  //jira.ez.no/brows overflow](https://jira.ez.no/browse/EZP-26 [B 27,  28,
  e/EZP-26124?src=co 124?src=confmacro)                         ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26125](https: [Missing language parameter when           [! Jul  Sep
  //jira.ez.no/brows generating \_ez\_content\_view             [B 27,  08,
  e/EZP-26125?src=co route](https://jira.ez.no/browse/EZP-26125 ug 2016 2016
  nfmacro)           ?src=confmacro)                            ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26127](https: [Cannot publish content via content on the [! Jul  Aug
  //jira.ez.no/brows fly after select                           [B 27,  02,
  e/EZP-26127?src=co location](https://jira.ez.no/browse/EZP-26 ug 2016 2016
  nfmacro)           127?src=confmacro)                         ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26130](https: [Search for content in many location hangs [! Jul  Sep
  //jira.ez.no/brows UI](https://jira.ez.no/browse/EZP-26130?sr [B 28,  07,
  e/EZP-26130?src=co c=confmacro)                               ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26141](https: [Search API appears to conduct some form   [! Aug  Nov
  //jira.ez.no/brows of ‘OR’ search not an ‘AND’                [B 02,  25,
  e/EZP-26141?src=co search](https://jira.ez.no/browse/EZP-2614 ug 2016 2016
  nfmacro)           1?src=confmacro)                           ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26145](https: [Unable to undo in the RichText            [! Aug  Sep
  //jira.ez.no/brows editor](https://jira.ez.no/browse/EZP-2614 [B 02,  05,
  e/EZP-26145?src=co 5?src=confmacro)                           ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26149](https: [Slashes in view parameters cause php      [! Aug  Sep
  //jira.ez.no/brows notice](https://jira.ez.no/browse/EZP-2614 [B 04,  02,
  e/EZP-26149?src=co 9?src=confmacro)                           ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26186](https: [Discarding content draft, and deleting    [! Aug  Nov
  //jira.ez.no/brows Users does not correctly update Solr       [B 22,  02,
  e/EZP-26186?src=co index](https://jira.ez.no/browse/EZP-26186 ug 2016 2016
  nfmacro)           ?src=confmacro)                            ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26188](https: [Twig globals are not available in fields  [! Aug  Aug
  //jira.ez.no/brows templates](https://jira.ez.no/browse/EZP-2 [B 22,  23,
  e/EZP-26188?src=co 6188?src=confmacro)                        ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      

  [EZP-26228](https: [Delete content breaks content             [! Aug  Sep
  //jira.ez.no/brows listing](https://jira.ez.no/browse/EZP-262 [B 31,  08,
  e/EZP-26228?src=co 28?src=confmacro)                          ug 2016 2016
  nfmacro)                                                      ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /i      
                                                                ma      
                                                                ge      
                                                                s/      
                                                                ic      
                                                                on      
                                                                s/      
                                                                is      
                                                                su      
                                                                et      
                                                                yp      
                                                                es      
                                                                /b      
                                                                ug      
                                                                .p      
                                                                ng      
                                                                ){      
                                                                .i      
                                                                co      
                                                                n}      
                                                                ](      
                                                                ht      
                                                                tp      
                                                                s:      
                                                                //      
                                                                ji      
                                                                ra      
                                                                .e      
                                                                z.      
                                                                no      
                                                                /b      
                                                                ro      
                                                                ws      
                                                                e/      
                                                                EZ      
                                                                P-      
                                                                26      
                                                                22      
                                                                8?      
                                                                sr      
                                                                c=      
                                                                co      
                                                                nf      
                                                                ma      
                                                                cr      
                                                                o)      
  ------------------ ------------------------------------------ -- ---- ----

</div>
<div class="refresh-issues-bottom">
> \`20

issues
&lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=project%3DEZP+AND+fixVersion+in+%28+%221.4.2%22+%29+ORDER+BY+issuetype+DESC%2C+key+ASC+++++++++++++&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="pageSection group"&gt;

.. raw:: html

   &lt;div class="pageSectionHeader"&gt;

.. rubric:: Attachments:
   :name: attachments
   :class: pageSectionTitle

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="greybox" align="left"&gt;

|image20|
Getting-Started-with-eZ-Publish-Platform.jpg
&lt;attachments/32866909/32866908.jpg&gt;\_\_
(image/jpeg)

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div id="footer" role="contentinfo"&gt;

.. raw:: html

   &lt;div class="section footer-body"&gt;

Document generated by Confluence on Mar 24, 2017 17:20

.. raw:: html

   &lt;div id="footer-logo"&gt;

Atlassian &lt;<http://www.atlassian.com/>&gt;\`\_\_

</div>
</div>
</div>
</div>

