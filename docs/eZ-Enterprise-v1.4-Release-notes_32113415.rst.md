<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Releases](Releases_31429534.html)
4.  [Release Notes](Release-Notes_32867905.html)
5.  [eZ Enterprise Release
    notes](eZ-Enterprise-Release-notes_31430108.html)

</div>
**Developer : eZ Enterprise v1.4 Release notes**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Jan 30, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
The v1.4.0 release of eZ Enterprise is available as of 30 June 2016.
(We’ve
[simplified](http://share.ez.no/blogs/ez/ez-systems-release-cycles-and-version-names-simplified)
version names.)

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For the release notes of the corresponding *(and included)* eZ Platform
release, see [eZ Platform v1.4.0 Release
notes](eZ-Platform-v1.4.0-Release-notes_32113421.html)

</div>
</div>
 

**Quick links**

-   [Installation instructions](31429538.html)
-   [Requirements](31429536.html)
-   Download:
    -   As Customer with eZ Enterprise
        subscription: <https://support.ez.no/Downloads> *(
        [BUL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=/About-our-Software/Licenses-and-agreements/eZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?processed=1457699707&return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1?return=%2FAbout-our-Software%2FLicenses-and-agreements%2FeZ-Business-Use-License-Agreement-eZ-BUL-Version-2.1)*
        -   License)\*
    -   As Partner with Test & Trial software
        access: <https://support.ez.no/Downloads> \*  *(
        [TTL](http://ez.no/About-our-Software/Licenses-and-agreements/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0)*
        \* License)\* \*
    -   If none of the above, request a demo instance:
        <http://ez.no/Forms/Discover-eZ-Studio>

 

**Changes since 2016.04**

**Summary of changes**

This release focused on bug fixing and optimization, and the developer
effort was concentrated on features that are included in eZ Platform.
Thus, no major Studio-specific features appear in this version.

Significant improvements include:

-   v1.0.0 of
    [RecommendationBundle](https://github.com/ezsystems/EzSystemsRecommendationBundle)released
-   Schedule Block algorithm improved
-   Landing Page-related usability fixes

 

**Full list of improvements and bugfixes**

<div id="refresh-module-1863098494">
<div id="jira-issues-1863098494"
style="width: 100%;  overflow: auto;">
  ------------------- ----------------------------------------------- -----
  Key                 Summary                                         T

  [EZEE-828](https:// [Duplicated entry in assetic configuration      [![Bu
  jira.ez.no/browse/E leads to css 404 problems on linux              g](ht
  ZEE-828?src=confmac machines](https://jira.ez.no/browse/EZEE-828?sr tps:/
  ro)                 c=confmacro)                                    /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-817](https:// [Incorrect header in block                      [![Bu
  jira.ez.no/browse/E settings](https://jira.ez.no/browse/EZEE-817?sr g](ht
  ZEE-817?src=confmac c=confmacro)                                    tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-814](https:// [UnauthorizedException indexing user content    [![Bu
  jira.ez.no/browse/E object with Recommendation                      g](ht
  ZEE-814?src=confmac Bundle](https://jira.ez.no/browse/EZEE-814?src= tps:/
  ro)                 confmacro)                                      /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-810](https:// [Not able to set the cursor in the middle of    [![Bu
  jira.ez.no/browse/E string in any input of block config             g](ht
  ZEE-810?src=confmac form](https://jira.ez.no/browse/EZEE-810?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-809](https:// [Content disappears from Schedule Block         [![Bu
  jira.ez.no/browse/E timeline when editing a published landing       g](ht
  ZEE-809?src=confmac page](https://jira.ez.no/browse/EZEE-809?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-807](https:// [Schedule Block - remove unnecessary DateTime   [![Bu
  jira.ez.no/browse/E format](https://jira.ez.no/browse/EZEE-807?src= g](ht
  ZEE-807?src=confmac confmacro)                                      tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-800](https:// [Content item preview disappears after turning  [![Bu
  jira.ez.no/browse/E overflow                                        g](ht
  ZEE-800?src=confmac on](https://jira.ez.no/browse/EZEE-800?src=conf tps:/
  ro)                 macro)                                          /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-799](https:// [Schedule Block new algorithm                   [![St
  jira.ez.no/browse/E implementation](https://jira.ez.no/browse/EZEE- ory](
  ZEE-799?src=confmac 799?src=confmacro)                              https
  ro)                                                                 ://ji
                                                                      ra.ez
                                                                      .no/i
                                                                      mages
                                                                      /icon
                                                                      s/iss
                                                                      uetyp
                                                                      es/st
                                                                      ory.p
                                                                      ng){.
                                                                      icon}
                                                                      ](htt
                                                                      ps://
                                                                      jira.
                                                                      ez.no
                                                                      /brow
                                                                      se/EZ
                                                                      EE-65
                                                                      3?src
                                                                      =conf
                                                                      macro
                                                                      )

  [EZEE-794](https:// [Notifications pop-up page number field         [![Bu
  jira.ez.no/browse/E size](https://jira.ez.no/browse/EZEE-794?src=co g](ht
  ZEE-794?src=confmac nfmacro)                                        tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-790](https:// [Use view interface in Studio Demo              [![Im
  jira.ez.no/browse/E controllers](https://jira.ez.no/browse/EZEE-790 prove
  ZEE-790?src=confmac ?src=confmacro)                                 ment]
  ro)                                                                 (http
                                                                      s://j
                                                                      ira.e
                                                                      z.no/
                                                                      image
                                                                      s/ico
                                                                      ns/is
                                                                      suety
                                                                      pes/i
                                                                      mprov
                                                                      ement
                                                                      .png)
                                                                      {.ico
                                                                      n}](h
                                                                      ttps:
                                                                      //jir
                                                                      a.ez.
                                                                      no/br
                                                                      owse/
                                                                      EZEE-
                                                                      445?s
                                                                      rc=co
                                                                      nfmac
                                                                      ro)

  [EZEE-788](https:// [Cannot log in as users other than              [![Bu
  jira.ez.no/browse/E admin](https://jira.ez.no/browse/EZEE-788?src=c g](ht
  ZEE-788?src=confmac onfmacro)                                       tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-780](https:// [The UI does not seem to handle many input      [![Bu
  jira.ez.no/browse/E fields there is no way to scroll the block      g](ht
  ZEE-780?src=confmac config                                          tps:/
  ro)                 field](https://jira.ez.no/browse/EZEE-780?src=c /jira
                      onfmacro)                                       .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-779](https:// [Schedule block problem with removing and       [![Bu
  jira.ez.no/browse/E adding once again the same                      g](ht
  ZEE-779?src=confmac Item](https://jira.ez.no/browse/EZEE-779?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-778](https:// [Schedule block issue with removing content     [![Bu
  jira.ez.no/browse/E item when some item was added                   g](ht
  ZEE-778?src=confmac again](https://jira.ez.no/browse/EZEE-778?src=c tps:/
  ro)                 onfmacro)                                       /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-776](https:// [Problem with access to setting in second and   [![Bu
  jira.ez.no/browse/E next block in one                               g](ht
  ZEE-776?src=confmac zone](https://jira.ez.no/browse/EZEE-776?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-773](https:// [Content issues with studio demo                [![Bu
  jira.ez.no/browse/E data](https://jira.ez.no/browse/EZEE-773?src=co g](ht
  ZEE-773?src=confmac nfmacro)                                        tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-772](https:// [404 response code from Flex Workflow           [![Bu
  jira.ez.no/browse/E endpoint](https://jira.ez.no/browse/EZEE-772?sr g](ht
  ZEE-772?src=confmac c=confmacro)                                    tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-770](https:// [Schedule grid doesn’t display properly in eZ   [![Bu
  jira.ez.no/browse/E Studio](https://jira.ez.no/browse/EZEE-770?src= g](ht
  ZEE-770?src=confmac confmacro)                                      tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-769](https:// [Some blocks have not existing view types in    [![Bu
  jira.ez.no/browse/E clean                                           g](ht
  ZEE-769?src=confmac studio](https://jira.ez.no/browse/EZEE-769?src= tps:/
  ro)                 confmacro)                                      /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-764](https:// [When clicking on Content Tree I cannot see     [![Bu
  jira.ez.no/browse/E it](https://jira.ez.no/browse/EZEE-764?src=conf g](ht
  ZEE-764?src=confmac macro)                                          tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-762](https:// [eZStudio 2016.04 (1.3) installation from       [![Bu
  jira.ez.no/browse/E tarball doesn’t                                 g](ht
  ZEE-762?src=confmac work](https://jira.ez.no/browse/EZEE-762?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-752](https:// [Overflow target schedule block changes are     [![Bu
  jira.ez.no/browse/E shifted by                                      g](ht
  ZEE-752?src=confmac one](https://jira.ez.no/browse/EZEE-752?src=con tps:/
  ro)                 fmacro)                                         /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-699](https:// [Not required empty block field prevents        [![Bu
  jira.ez.no/browse/E submission of configure                         g](ht
  ZEE-699?src=confmac popup](https://jira.ez.no/browse/EZEE-699?src=c tps:/
  ro)                 onfmacro)                                       /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-698](https:// [Landingpage block popup not displaying         [![Bu
  jira.ez.no/browse/E correctly](https://jira.ez.no/browse/EZEE-698?s g](ht
  ZEE-698?src=confmac rc=confmacro)                                   tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-697](https:// [Accessing other content\_types than landing    [![Bu
  jira.ez.no/browse/E pages in eZ Studio pages on a siteaccess with   g](ht
  ZEE-697?src=confmac tree\_root,                                     tps:/
  ro)                 broken](https://jira.ez.no/browse/EZEE-697?src= /jira
                      confmacro)                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-696](https:// [Siteaccess selection broken, in Page tab, with [![Bu
  jira.ez.no/browse/E custom tree\_root                               g](ht
  ZEE-696?src=confmac setting](https://jira.ez.no/browse/EZEE-696?src tps:/
  ro)                 =confmacro)                                     /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-679](https:// [Xsd Validation for XML                         [![Im
  jira.ez.no/browse/E files](https://jira.ez.no/browse/EZEE-679?src=c prove
  ZEE-679?src=confmac onfmacro)                                       ment]
  ro)                                                                 (http
                                                                      s://j
                                                                      ira.e
                                                                      z.no/
                                                                      image
                                                                      s/ico
                                                                      ns/is
                                                                      suety
                                                                      pes/i
                                                                      mprov
                                                                      ement
                                                                      .png)
                                                                      {.ico
                                                                      n}](h
                                                                      ttps:
                                                                      //jir
                                                                      a.ez.
                                                                      no/br
                                                                      owse/
                                                                      EZEE-
                                                                      445?s
                                                                      rc=co
                                                                      nfmac
                                                                      ro)

  [EZEE-670](https:// [Ends up in non-existing url after              [![Bu
  jira.ez.no/browse/E publishing](https://jira.ez.no/browse/EZEE-670? g](ht
  ZEE-670?src=confmac src=confmacro)                                  tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-653](https:// [Add a Gallery content type in the Media        [![St
  jira.ez.no/browse/E content type                                    ory](
  ZEE-653?src=confmac group](https://jira.ez.no/browse/EZEE-653?src=c https
  ro)                 onfmacro)                                       ://ji
                                                                      ra.ez
                                                                      .no/i
                                                                      mages
                                                                      /icon
                                                                      s/iss
                                                                      uetyp
                                                                      es/st
                                                                      ory.p
                                                                      ng){.
                                                                      icon}
                                                                      ](htt
                                                                      ps://
                                                                      jira.
                                                                      ez.no
                                                                      /brow
                                                                      se/EZ
                                                                      EE-65
                                                                      3?src
                                                                      =conf
                                                                      macro
                                                                      )

  [EZEE-628](https:// [Schedule always shows all blocks, including    [![Bu
  jira.ez.no/browse/E future                                          g](ht
  ZEE-628?src=confmac ones](https://jira.ez.no/browse/EZEE-628?src=co tps:/
  ro)                 nfmacro)                                        /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-569](https:// [Settings form of RSS block has got broken      [![Bu
  jira.ez.no/browse/E layout](https://jira.ez.no/browse/EZEE-569?src= g](ht
  ZEE-569?src=confmac confmacro)                                      tps:/
  ro)                                                                 /jira
                                                                      .ez.n
                                                                      o/ima
                                                                      ges/i
                                                                      cons/
                                                                      issue
                                                                      types
                                                                      /bug.
                                                                      png){
                                                                      .icon
                                                                      }](ht
                                                                      tps:/
                                                                      /jira
                                                                      .ez.n
                                                                      o/bro
                                                                      wse/E
                                                                      ZEE-5
                                                                      69?sr
                                                                      c=con
                                                                      fmacr
                                                                      o)

  [EZEE-535](https:// [Change color of slot indicator to match border [![Im
  jira.ez.no/browse/E color](https://jira.ez.no/browse/EZEE-535?src=c prove
  ZEE-535?src=confmac onfmacro)                                       ment]
  ro)                                                                 (http
                                                                      s://j
                                                                      ira.e
                                                                      z.no/
                                                                      image
                                                                      s/ico
                                                                      ns/is
                                                                      suety
                                                                      pes/i
                                                                      mprov
                                                                      ement
                                                                      .png)
                                                                      {.ico
                                                                      n}](h
                                                                      ttps:
                                                                      //jir
                                                                      a.ez.
                                                                      no/br
                                                                      owse/
                                                                      EZEE-
                                                                      445?s
                                                                      rc=co
                                                                      nfmac
                                                                      ro)

  [EZEE-445](https:// [Hide the Landing Page field type on Landing    [![Im
  jira.ez.no/browse/E Page Content in content                         prove
  ZEE-445?src=confmac view](https://jira.ez.no/browse/EZEE-445?src=co ment]
  ro)                 nfmacro)                                        (http
                                                                      s://j
                                                                      ira.e
                                                                      z.no/
                                                                      image
                                                                      s/ico
                                                                      ns/is
                                                                      suety
                                                                      pes/i
                                                                      mprov
                                                                      ement
                                                                      .png)
                                                                      {.ico
                                                                      n}](h
                                                                      ttps:
                                                                      //jir
                                                                      a.ez.
                                                                      no/br
                                                                      owse/
                                                                      EZEE-
                                                                      445?s
                                                                      rc=co
                                                                      nfmac
                                                                      ro)
  ------------------- ----------------------------------------------- -----

</div>
<div class="refresh-issues-bottom">
> \`33

issues
&lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=key+%3D+EZS-788+OR+key+%3D+EZS-773+OR+key+%3D+EZS-776+OR+key+%3D+EZS-770+OR+key+%3D+EZS-769+OR+key+%3D+EZS-764+OR+key+%3D+EZS-762+OR+key+%3D+EZS-653+OR+key+%3D+EZS-535+OR+key+%3D+EZS-445+OR+key+%3D+EZS-799+OR+key+%3D+EZS-779+OR+key+%3D+EZS-780+OR+key+%3D+EZS-698+OR+key+%3D+EZS-699+OR+key+%3D+EZS-790+OR+key+%3D+EZS-679+OR+key+%3D+EZS-752+OR+key+%3D+EZS-807+OR+key+%3D+EZS-778+OR+key+%3D+EZS-809+OR+key+%3D+EZS-800+OR+key+%3D+EZS-794+OR+key+%3D+EZS-817+OR+key+%3D+EZS-810+OR+key+%3D+EZS-670+OR+key+%3D+EZS-828+OR+key+%3D+EZS-569+OR+key+%3D+EZS-696+OR+key+%3D+EZS-697+OR+key+%3D+EZS-814+OR+key+%3D+EZS-772+OR+key+%3D+EZS-628+&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

 

.. rubric:: Updating
   :name: eZEnterprisev1.4Releasenotes-Updating

To update to this version, follow the \\ Updating eZ Platform
&lt;Updating-eZ-Platform\_31431770.html&gt;\_\_ guide and use v1.4.0 as
&lt;version&gt;.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

.. rubric:: In this topic:
   :name: eZEnterprisev1.4Releasenotes-Inthistopic:

.. raw:: html

   &lt;div class="toc-macro rbtoc1490376010810"&gt;

-  Quick links &lt;\#eZEnterprisev1.4Releasenotes-Quicklinks&gt;\_\_
-  Changes since 2016.04
&lt;\#eZEnterprisev1.4Releasenotes-Changessince2016.04&gt;\_\_

   -  Summary of changes
&lt;\#eZEnterprisev1.4Releasenotes-Summaryofchanges&gt;\_\_
   -  Full list of improvements and bugfixes
&lt;\#eZEnterprisev1.4Releasenotes-Fulllistofimprovementsandbugfixes&gt;\_\_

-  Updating &lt;\#eZEnterprisev1.4Releasenotes-Updating&gt;\_\_

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

