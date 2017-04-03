<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Repository](Repository_31432023.html)

</div>
**Developer : Signals Reference**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Jul 07, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This page references **all available signals** that you can listen to,
triggered by (“Public”) Repository API in eZ Platform.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For more information, check the
[SignalSlot](#SignalsReference-Signalslots)section and the [Listening to
Core events](Listening-to-Core-events_31429796.html) recipe.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
All signals are relative to `eZ\Publish\Core\SignalSlot\Signal`
namespace.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Transactions

<div class="confluence-information-macro-body">
Signals are sent after transactions are executed, making signals
transaction safe.

</div>
</div>
 

**ContentService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `ContentService\A  | -                  | `ContentService::  | After              |
| ddRelationSignal`  | `` srcContentId` ` | addRelation()`     |                    |
|                    |     (source    con |                    |                    |
|                    | tentId, aka    ref |                    |                    |
|                    | errer) - ``srcVers |                    |                    |
|                    | ionNo\`            |                    |                    |
|                    | \` -               |                    |                    |
|                    | \`dstContentId \`  |                    |                    |
|                    | (destination       |                    |                    |
|                    | contentId, aka     |                    |                    |
|                    | target)            |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\A  | N/A                | `ContentService::  | After              |
| ddTranslationInfoS |                    | addTranslationInfo |                    |
|  ignal`            |                    |  ()`               |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\C  | -                  | `ContentService::  | After              |
| opyContentSignal`  | `` srcContentId` ` | copyContent()`     |                    |
|                    |     (original    c |                    |                    |
|                    | ontent ID) - ``src |                    |                    |
|                    | VersionNo\`        |                    |                    |
|                    | \` -               |                    |                    |
|                    | `` dstContentId` ` |                    |                    |
|                    |     (contentId of  |                    |                    |
|                    |    the copy) - ``d |                    |                    |
|                    | stVersionNo\`      |                    |                    |
|                    | \` -               |                    |                    |
|                    | `dstParentLoca tio |                    |                    |
|                    | nId`               |                    |                    |
|                    | (locationId where  |                    |                    |
|                    | the content has    |                    |                    |
|                    | been copied)       |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\C  | -   `contentId`    | `ContentService::  | After              |
| reateContentDraftS | -   `versionNo`    | createContentDraft |                    |
|  ignal`            | -   `userId` (Id   |  ()`               |                    |
|                    |     of user used   |                    |                    |
|                    |     to create the  |                    |                    |
|                    |     draft, or null |                    |                    |
|                    |     -   current us |                    |                    |
|                    | er)                |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\C  | -   `contentId`    | `ContentService::  | After              |
| reateContentSignal | -   `versionNo`    | createContent()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\D  | -   `contentId`    | `ContentService::  | After              |
| eleteContentSignal |                    | deleteContent()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\D  | -                  | `ContentService::  | After              |
| eleteRelationSigna | `` srcContentId` ` | deleteRelation()`  |                    |
|  l`                |  - ``srcVersionNo\ |                    |                    |
|                    | `                  |                    |                    |
|                    | \` -               |                    |                    |
|                    | \`dstContentId \`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\D  | -   `contentId`    | `ContentService::  | After              |
| eleteVersionSignal | -   `versionNo`    | deleteVersion()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\P  | -   `contentId`    | \`ContentService:: | After              |
| ublishVersionSigna | -   `versionNo`    |  publishVersion()  |                    |
|  l`                |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\T  | -   `contentId`    | `ContentService::  | After              |
| ranslateVersionSig | -   `versionNo`    | translationVersion |                    |
|  nal`              | -   `userId`       |  ()`               |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\U  | -   `contentId`    | `ContentService::  | After              |
| pdateContentMetada |                    | updateContentMetad |                    |
|  taSignal`         |                    |  ata()`            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentService\U  | -   `contentId`    | `ContentService::  | After              |
| pdateContentSignal | -   `versionNo`    | updateContent()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**ContentTypeService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `ContentTypeServi  | - contentTypeDraf  | `ContentTypeServi  | After              |
| ce\AddFieldDefinit | tId                | ce::addFieldDefini |                    |
|  ionSignal`        |                    |  tion()`           |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\AssignContentTy | -                  | ce::assignContentT |                    |
|  peGroupSignal`    | `contentTypeGr oup |  ypeGroup()`       |                    |
|                    | Id`                |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\CopyContentType | - `userId`         | ce::copyContentTyp |                    |
|  Signal`           |                    |  e()`              |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\CreateContentTy |                    | ce::createContentT |                    |
|  peDraftSignal`    |                    |  ypeDraft()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -   `groupId`      | `ContentTypeServi  | After              |
| ce\CreateContentTy |                    | ce::createContentT |                    |
|  peGroupSignal`    |                    |  ypeGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\CreateContentTy |                    | ce::createContentT |                    |
|  peSignal`         |                    |  ype()`            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\DeleteContentTy | `contentTypeGr oup | ce::deleteContentT |                    |
|  peGroupSignal`    | Id`                |  ypeGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\DeleteContentTy |                    | ce::deleteContentT |                    |
|  peSignal`         |                    |  ype()`            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\PublishContentT | `contentTypeDr aft | ce::publishContent |                    |
|  ypeDraftSignal`   | Id`                |  TypeDraft()`      |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\RemoveFieldDefi | `contentTypeDr aft | ce::removeFieldDef |                    |
|  nitionSignal`     | Id`                |  inition()`        |                    |
|                    | -                  |                    |                    |
|                    | `fieldDefiniti onI |                    |                    |
|                    | d`                 |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | - `contentTypeId`  | `ContentTypeServi  | After              |
| ce\UnassignContent | -                  | ce::unassignConten |                    |
|  TypeGroupSignal`  | `contentTypeGr oup |  tTypeGroup()`     |                    |
|                    | Id`                |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\UpdateContentTy | `contentTypeDr aft | ce::updateContentT |                    |
|  peDraftSignal`    | Id`                |  ypeDraft()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\UpdateContentTy | `contentTypeGr oup | ce::updateContentT |                    |
|  peGroupSignal`    | Id`                |  ypeGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ContentTypeServi  | -                  | `ContentTypeServi  | After              |
| ce\UpdateFieldDefi | `contentTypeDr aft | ce::updateFieldDef |                    |
|  nitionSignal`     | Id`                |  inition()`        |                    |
|                    | -                  |                    |                    |
|                    | `fieldDefiniti onI |                    |                    |
|                    | d`                 |                    |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**LanguageService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `LanguageService\  | -   `languageId`   | \`LanguageService: | After              |
| CreateLanguageSign |                    | :createLanguage()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LanguageService\  | -   `languageId`   | \`LanguageService: | After              |
| DeleteLanguageSign |                    | :deleteLanguage()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LanguageService\  | -   `languageId`   | `LanguageService:  | After              |
| DisableLanguageSig |                    | :disableLanguage() |                    |
|  nal`              |                    | `                  |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LanguageService\  | -   `languageId`   | \`LanguageService: | After              |
| EnableLanguageSign |                    | :enableLanguage()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LanguageService\  | -   `languageId`   | `LanguageService:  | After              |
| UpdateLanguageName | -   `newName`      | :updateLanguageNam |                    |
|  Signal`           |                    |  e()`              |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**LocationService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| \`LocationService\ | -   `subtreeId`    | `LocationService:  | After              |
| \                  |     (top           | :copySubtree()`    |                    |
| CopySubtreeSignal  |     locationId of  |                    |                    |
| \`                 |     the subtree to |                    |                    |
|                    |     be copied)     |                    |                    |
|                    |                    |                    |                    |
|                    | -                  |                    |                    |
|                    | `targetParentL oca |                    |                    |
|                    | tionId`            |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `contentId`    | \`LocationService: | After              |
| CreateLocationSign | -   `locationId`   | :createLocation()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `contentId`    | \`LocationService: | After              |
| DeleteLocationSign | -   `locationId`   | :deleteLocation()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `contentId`    | `LocationService:  | After              |
| HideLocationSignal | -   `locationId`   | :hideLocation()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `contentId`    | \`LocationService: | After              |
| UnhideLocationSign | -   `locationId`   | :unhideLocation()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| \`LocationService\ | -   `subtreeId`    | `LocationService:  | After              |
| \                  |                    | :moveSubtree()`    |                    |
| MoveSubtreeSignal  | -                  |                    |                    |
| \`                 | `newParentLoca tio |                    |                    |
|                    | nId`               |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `content1Id`   | `LocationService:  | After              |
| SwapLocationSignal | -   `location1Id`  | :swapLocation()`   |                    |
| `                  | -   `content2Id`   |                    |                    |
|                    |                    |                    |                    |
|                    | - `location2Id` `` |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `LocationService\  | -   `contentId`    | \`LocationService: | After              |
| UpdateLocationSign | -   `locationId`   | :updateLocation()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**ObjectStateService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `ObjectStateServi  | -                  | `ObjectStateServi  | After              |
| ce\CreateObjectSta | `objectStateGr oup | ce::createObjectSt |                    |
|  teGroupSignal`    | Id`                |  ateGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | -                  | `ObjectStateServi  | After              |
| ce\CreateObjectSta | `objectStateGr oup | ce::createObjectSt |                    |
|  teSignal`         | Id`                |  ate()`            |                    |
|                    | - `objectStateId`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | -                  | `ObjectStateServi  | After              |
| ce\DeleteObjectSta | `objectStateGr oup | ce::deleteObjectSt |                    |
|  teGroupSignal`    | Id`                |  ateGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | - `objectStateId`  | `ObjectStateServi  | After              |
| ce\DeleteObjectSta |                    | ce::deleteObjectSt |                    |
|  teSignal`         |                    |  ate()`            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | -   `contentId`    | `ObjectStateServi  | After              |
| ce\SetContentState |                    | ce::setContentStat |                    |
|  Signal`           | -                  |  e()`              |                    |
|                    | `objectStateGr oup |                    |                    |
|                    | Id`                |                    |                    |
|                    | - `objectStateId`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | - `objectStateId`  | `ObjectStateServi  | After              |
| ce\SetPriorityOfOb | - `priority`       | ce::setPriorityOfO |                    |
|  jectStateSignal`  |                    |  bjectState()`     |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | -                  | `ObjectStateServi  | After              |
| ce\UpdateObjectSta | `objectStateGr oup | ce::updateObjectSt |                    |
|  teGroupSignal`    | Id`                |  ateGroup()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `ObjectStateServi  | - `objectStateId`  | `ObjectStateServi  | After              |
| ce\UpdateObjectSta |                    | ce::updateObjectSt |                    |
|  teSignal`         |                    |  ate()`            |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**RoleService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `RoleService\AddP  | -   `roleId`       | `RoleService::add  | After              |
| olicySignal`       | -   `policyId`     | Policy()`          |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Assi  | -   `roleId`       | `RoleService::ass  | After              |
| gnRoleToUserGroupS | -   `userGroupId`  | ignRoleToUserGroup |                    |
|  ignal`            |                    |  ()`               |                    |
|                    | -                  |                    |                    |
|                    | `roleLimitatio n`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Assi  | -   `roleId`       | `RoleService::ass  | After              |
| gnRoleToUserSignal | -   `userId`       | ignRoleToUser()`   |                    |
| `                  |                    |                    |                    |
|                    | -                  |                    |                    |
|                    | `roleLimitatio n`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Crea  | -   `roleId`       | `RoleService::cre  | After              |
| teRoleSignal`      |                    | ateRole()`         |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Dele  | -   `roleId`       | `RoleService::del  | After              |
| teRoleSignal`      |                    | eteRole()`         |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Remo  | -   `roleId`       | `RoleService::rem  | After              |
| vePolicySignal`    | -   `policyId`     | ovePolicy()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Unas  | -   `roleId`       | `RoleService::una  | After              |
| signRoleFromUserGr | -   `userGroupId`  | ssignRoleFromUserG |                    |
|  oupSignal`        |                    |  roup()`           |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Unas  | -   `roleId`       | `RoleService::una  | After              |
| signRoleFromUserSi | -   `userId`       | ssignRoleFromUser( |                    |
|  gnal`             |                    |  )`                |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Upda  | -   `policyId`     | `RoleService::upd  | After              |
| tePolicySignal`    |                    | atePolicy()`       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `RoleService\Upda  | -   `roleId`       | `RoleService::upd  | After              |
| teRoleSignal`      |                    | ateRole()`         |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**SectionService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `SectionService\A  | -   `contentId`    | `SectionService::  | After              |
| ssignSectionSignal | -   `sectionId`    | assignSection()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `SectionService\C  | -   `sectionId`    | `SectionService::  | After              |
| reateSectionSignal |                    | createSection()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `SectionService\D  | -   `sectionId`    | `SectionService::  | After              |
| eleteSectionSignal |                    | deleteSection()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `SectionService\U  | -   `sectionId`    | `SectionService::  | After              |
| pdateSectionSignal |                    | updateSection()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**TrashService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `TrashService\Del  | -   `trashItemId`  | `TrashService::de  | After              |
| eteTrashItemSignal |                    | leteTrashItem()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `TrashService\Emp  | N/A                | `TrashService::em  | After              |
| tyTrashSignal`     |                    | ptyTrash()`        |                    |
+--------------------+--------------------+--------------------+--------------------+
| `TrashService\Rec  | -   `trashItemId`  | `TrashService::re  | After              |
| overSignal`        |                    | cover()`           |                    |
|                    | -                  |                    |                    |
|                    | `newParentLoca tio |                    |                    |
|                    | nId`               |                    |                    |
|                    | - `newLocationId`  |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `TrashService\Tra  | -   `locationId`   | `TrashService::tr  | After              |
| shSignal`          |                    | ash()`             |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**URLAliasService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `URLAliasService\  | -   `urlAliasId`   | `URLAliasService:  | After              |
| CreateGlobalUrlAli |                    | :createGlobalUrlAl |                    |
|  asSignal`         |                    |  ias()`            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `URLAliasService\  | -   `urlAliasId`   | \`URLAliasService: | After              |
| CreateUrlAliasSign |                    | :createUrlAlias()  |                    |
|  al`               |                    | \`                 |                    |
+--------------------+--------------------+--------------------+--------------------+
| `URLAliasService\  | -   `aliasList`    | `URLAliasService:  | After              |
| RemoveAliasesSigna |                    | :removeAliases()`  |                    |
|  l`                |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**URLWildcardService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `URLWildcardServi  | - `urlWildcardId`  | `URLWildcardServi  | After              |
| ce\CreateSignal`   |                    | ce::create()`      |                    |
+--------------------+--------------------+--------------------+--------------------+
| `URLWildcardServi  | - `urlWildcardId`  | `URLWildcardServi  | After              |
| ce\RemoveSignal`   |                    | ce::remove()`      |                    |
+--------------------+--------------------+--------------------+--------------------+
| `URLWildcardServi  | -   `url`          | `URLWildcardServi  | After              |
| ce\TranslateSignal |                    | ce::translate()`   |                    |
| `                  |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**UserService**

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Signal type        | Properties         | Triggered by       | When               |
+====================+====================+====================+====================+
| `UserService\Assi  | -   `userId`       | `UserService::ass  | After              |
| gnUserToUserGroupS | -   `userGroupId`  | ignUserToUserGroup |                    |
|  ignal`            |                    |  ()`               |                    |
+--------------------+--------------------+--------------------+--------------------+
| \`UserService\\Cre | -   `userGroupId`  | `UserService::cre  | After              |
| a                  |                    | ateUserGroup()`    |                    |
| teUserGroupSignal  |                    |                    |                    |
| \`                 |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `UserService\Crea  | -   `userId`       | `UserService::cre  | After              |
| teUserSignal`      |                    | ateUser()`         |                    |
+--------------------+--------------------+--------------------+--------------------+
| \`UserService\\Del | -   `userGroupId`  | `UserService::del  | After              |
| e                  |                    | eteUserGroup()`    |                    |
| teUserGroupSignal  |                    |                    |                    |
| \`                 |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `UserService\Dele  | -   `userId`       | `UserService::del  | After              |
| teUserSignal`      |                    | eteUser()`         |                    |
+--------------------+--------------------+--------------------+--------------------+
| `UserService\Move  | -   `userGroupId`  | `UserService::mov  | After              |
| UserGroupSignal`   | -   `newParentId`  | eUserGroup()`      |                    |
+--------------------+--------------------+--------------------+--------------------+
| `UserService\UnAs  | -   `userId`       | `UserService::unA  | After              |
| signUserFromUserGr | -   `userGroupId`  | ssignUserFromUserG |                    |
|  oupSignal`        |                    |  roup()`           |                    |
+--------------------+--------------------+--------------------+--------------------+
| \`UserService\\Upd | -   `userGroupId`  | `UserService::upd  | After              |
| a                  |                    | ateUserGroup()`    |                    |
| teUserGroupSignal  |                    |                    |                    |
| \`                 |                    |                    |                    |
+--------------------+--------------------+--------------------+--------------------+
| `UserService\Upda  | -   `userId`       | `UserService::upd  | After              |
| teUserSignal`      |                    | ateUser()`         |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375999571">
-   [ContentService](#SignalsReference-ContentService)
-   [ContentTypeService](#SignalsReference-ContentTypeService)
-   [LanguageService](#SignalsReference-LanguageService)
-   [LocationService](#SignalsReference-LocationService)
-   [ObjectStateService](#SignalsReference-ObjectStateService)
-   [RoleService](#SignalsReference-RoleService)
-   [SectionService](#SignalsReference-SectionService)
-   [TrashService](#SignalsReference-TrashService)
-   [URLAliasService](#SignalsReference-URLAliasService)
-   [URLWildcardService](#SignalsReference-URLWildcardService)
-   [UserService](#SignalsReference-UserService)

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
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

