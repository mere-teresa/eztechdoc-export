<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
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
This page references **all available signals** that you can listen to, triggered by ("Public") Repository API in eZ Platform.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For more information, check the [SignalSlot](#SignalsReference-Signalslots)section and the [Listening to Core events](Listening-to-Core-events_31429796.html) recipe.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
All signals are relative to `eZ\Publish\Core\SignalSlot\Signal` namespace.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Transactions

<div class="confluence-information-macro-body">
Signals are sent after transactions are executed, making signals transaction safe.

</div>
</div>
 

**ContentService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>ContentService\A ddRelationSignal</code></td>
<td align="left">- <code>srcContentId` `    (source    contentId, aka    referrer) -</code>srcVersionNo` ` - `dstContentId ` (destination contentId, aka target)</td>
<td align="left"><code>ContentService:: addRelation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\A ddTranslationInfoS ignal</code></td>
<td align="left">N/A</td>
<td align="left"><code>ContentService:: addTranslationInfo ()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\C opyContentSignal</code></td>
<td align="left">- <code>srcContentId` `    (original    content ID) -</code>srcVersionNo` ` - <code>dstContentId` `    (contentId of    the copy) -</code>dstVersionNo` ` - <code>dstParentLoca tionId</code> (locationId where the content has been copied)</td>
<td align="left"><code>ContentService:: copyContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\C reateContentDraftS ignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
<li><code>userId</code> (Id of user used to create the draft, or null
<ul>
<li>current user)</li>
</ul></li>
</ul></td>
<td align="left"><code>ContentService:: createContentDraft ()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\C reateContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService:: createContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\D eleteContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
</ul></td>
<td align="left"><code>ContentService:: deleteContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\D eleteRelationSigna l</code></td>
<td align="left">- <code>srcContentId` ` -</code>srcVersionNo` ` - `dstContentId `</td>
<td align="left"><code>ContentService:: deleteRelation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\D eleteVersionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService:: deleteVersion()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\P ublishVersionSigna l</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left">`ContentService::
 publishVersion() `</td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\T ranslateVersionSig nal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>ContentService:: translationVersion ()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\U pdateContentMetada taSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
</ul></td>
<td align="left"><code>ContentService:: updateContentMetad ata()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\U pdateContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService:: updateContent()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**ContentTypeService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\AddFieldDefinit ionSignal</code></td>
<td align="left">- contentTypeDraf tId</td>
<td align="left"><code>ContentTypeServi ce::addFieldDefini tion()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\AssignContentTy peGroupSignal</code></td>
<td align="left">- <code>contentTypeId</code> - <code>contentTypeGr oupId</code></td>
<td align="left"><code>ContentTypeServi ce::assignContentT ypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\CopyContentType Signal</code></td>
<td align="left">- <code>contentTypeId</code> - <code>userId</code></td>
<td align="left"><code>ContentTypeServi ce::copyContentTyp e()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\CreateContentTy peDraftSignal</code></td>
<td align="left">- <code>contentTypeId</code></td>
<td align="left"><code>ContentTypeServi ce::createContentT ypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\CreateContentTy peGroupSignal</code></td>
<td align="left"><ul>
<li><code>groupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeServi ce::createContentT ypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\CreateContentTy peSignal</code></td>
<td align="left">- <code>contentTypeId</code></td>
<td align="left"><code>ContentTypeServi ce::createContentT ype()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\DeleteContentTy peGroupSignal</code></td>
<td align="left">- <code>contentTypeGr oupId</code></td>
<td align="left"><code>ContentTypeServi ce::deleteContentT ypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\DeleteContentTy peSignal</code></td>
<td align="left">- <code>contentTypeId</code></td>
<td align="left"><code>ContentTypeServi ce::deleteContentT ype()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\PublishContentT ypeDraftSignal</code></td>
<td align="left">- <code>contentTypeDr aftId</code></td>
<td align="left"><code>ContentTypeServi ce::publishContent TypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\RemoveFieldDefi nitionSignal</code></td>
<td align="left">- <code>contentTypeDr aftId</code> - <code>fieldDefiniti onId</code></td>
<td align="left"><code>ContentTypeServi ce::removeFieldDef inition()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\UnassignContent TypeGroupSignal</code></td>
<td align="left">- <code>contentTypeId</code> - <code>contentTypeGr oupId</code></td>
<td align="left"><code>ContentTypeServi ce::unassignConten tTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\UpdateContentTy peDraftSignal</code></td>
<td align="left">- <code>contentTypeDr aftId</code></td>
<td align="left"><code>ContentTypeServi ce::updateContentT ypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeServi ce\UpdateContentTy peGroupSignal</code></td>
<td align="left">- <code>contentTypeGr oupId</code></td>
<td align="left"><code>ContentTypeServi ce::updateContentT ypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeServi ce\UpdateFieldDefi nitionSignal</code></td>
<td align="left">- <code>contentTypeDr aftId</code> - <code>fieldDefiniti onId</code></td>
<td align="left"><code>ContentTypeServi ce::updateFieldDef inition()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**LanguageService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>LanguageService\ CreateLanguageSign al</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left">`LanguageService:
:createLanguage() `</td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LanguageService\ DeleteLanguageSign al</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left">`LanguageService:
:deleteLanguage() `</td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LanguageService\ DisableLanguageSig nal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left"><code>LanguageService: :disableLanguage()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LanguageService\ EnableLanguageSign al</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left">`LanguageService:
:enableLanguage() `</td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LanguageService\ UpdateLanguageName Signal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
<li><code>newName</code></li>
</ul></td>
<td align="left"><code>LanguageService: :updateLanguageNam e()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**LocationService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">`LocationService\
CopySubtreeSignal `</td>
<td align="left"><ul>
<li><code>subtreeId</code> (top locationId of the subtree to be copied)</li>
</ul>
- <code>targetParentL ocationId</code></td>
<td align="left"><code>LocationService: :copySubtree()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\ CreateLocationSign al</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left">`LocationService:
:createLocation() `</td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\ DeleteLocationSign al</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left">`LocationService:
:deleteLocation() `</td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\ HideLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService: :hideLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\ UnhideLocationSign al</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left">`LocationService:
:unhideLocation() `</td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left">`LocationService\
MoveSubtreeSignal `</td>
<td align="left"><ul>
<li><code>subtreeId</code></li>
</ul>
- <code>newParentLoca tionId</code></td>
<td align="left"><code>LocationService: :moveSubtree()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\ SwapLocationSignal</code></td>
<td align="left"><ul>
<li><code>content1Id</code></li>
<li><code>location1Id</code></li>
<li><code>content2Id</code></li>
</ul>
- <code>location2Id</code> <code></code></td>
<td align="left"><code>LocationService: :swapLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\ UpdateLocationSign al</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left">`LocationService:
:updateLocation() `</td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**ObjectStateService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>ObjectStateServi ce\CreateObjectSta teGroupSignal</code></td>
<td align="left">- <code>objectStateGr oupId</code></td>
<td align="left"><code>ObjectStateServi ce::createObjectSt ateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateServi ce\CreateObjectSta teSignal</code></td>
<td align="left">- <code>objectStateGr oupId</code> - <code>objectStateId</code></td>
<td align="left"><code>ObjectStateServi ce::createObjectSt ate()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateServi ce\DeleteObjectSta teGroupSignal</code></td>
<td align="left">- <code>objectStateGr oupId</code></td>
<td align="left"><code>ObjectStateServi ce::deleteObjectSt ateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateServi ce\DeleteObjectSta teSignal</code></td>
<td align="left">- <code>objectStateId</code></td>
<td align="left"><code>ObjectStateServi ce::deleteObjectSt ate()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateServi ce\SetContentState Signal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
</ul>
- <code>objectStateGr oupId</code> - <code>objectStateId</code></td>
<td align="left"><code>ObjectStateServi ce::setContentStat e()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateServi ce\SetPriorityOfOb jectStateSignal</code></td>
<td align="left">- <code>objectStateId</code> - <code>priority</code></td>
<td align="left"><code>ObjectStateServi ce::setPriorityOfO bjectState()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateServi ce\UpdateObjectSta teGroupSignal</code></td>
<td align="left">- <code>objectStateGr oupId</code></td>
<td align="left"><code>ObjectStateServi ce::updateObjectSt ateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateServi ce\UpdateObjectSta teSignal</code></td>
<td align="left">- <code>objectStateId</code></td>
<td align="left"><code>ObjectStateServi ce::updateObjectSt ate()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**RoleService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>RoleService\AddP olicySignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::add Policy()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\Assi gnRoleToUserGroupS ignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userGroupId</code></li>
</ul>
- <code>roleLimitatio n</code></td>
<td align="left"><code>RoleService::ass ignRoleToUserGroup ()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\Assi gnRoleToUserSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userId</code></li>
</ul>
- <code>roleLimitatio n</code></td>
<td align="left"><code>RoleService::ass ignRoleToUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\Crea teRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::cre ateRole()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\Dele teRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::del eteRole()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\Remo vePolicySignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::rem ovePolicy()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\Unas signRoleFromUserGr oupSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>RoleService::una ssignRoleFromUserG roup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\Unas signRoleFromUserSi gnal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>RoleService::una ssignRoleFromUser( )</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\Upda tePolicySignal</code></td>
<td align="left"><ul>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::upd atePolicy()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\Upda teRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::upd ateRole()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**SectionService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>SectionService\A ssignSectionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService:: assignSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>SectionService\C reateSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService:: createSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>SectionService\D eleteSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService:: deleteSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>SectionService\U pdateSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService:: updateSection()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**TrashService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>TrashService\Del eteTrashItemSignal</code></td>
<td align="left"><ul>
<li><code>trashItemId</code></li>
</ul></td>
<td align="left"><code>TrashService::de leteTrashItem()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>TrashService\Emp tyTrashSignal</code></td>
<td align="left">N/A</td>
<td align="left"><code>TrashService::em ptyTrash()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>TrashService\Rec overSignal</code></td>
<td align="left"><ul>
<li><code>trashItemId</code></li>
</ul>
- <code>newParentLoca tionId</code> - <code>newLocationId</code></td>
<td align="left"><code>TrashService::re cover()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>TrashService\Tra shSignal</code></td>
<td align="left"><ul>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>TrashService::tr ash()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**URLAliasService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>URLAliasService\ CreateGlobalUrlAli asSignal</code></td>
<td align="left"><ul>
<li><code>urlAliasId</code></li>
</ul></td>
<td align="left"><code>URLAliasService: :createGlobalUrlAl ias()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>URLAliasService\ CreateUrlAliasSign al</code></td>
<td align="left"><ul>
<li><code>urlAliasId</code></li>
</ul></td>
<td align="left">`URLAliasService:
:createUrlAlias() `</td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>URLAliasService\ RemoveAliasesSigna l</code></td>
<td align="left"><ul>
<li><code>aliasList</code></li>
</ul></td>
<td align="left"><code>URLAliasService: :removeAliases()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**URLWildcardService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>URLWildcardServi ce\CreateSignal</code></td>
<td align="left">- <code>urlWildcardId</code></td>
<td align="left"><code>URLWildcardServi ce::create()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>URLWildcardServi ce\RemoveSignal</code></td>
<td align="left">- <code>urlWildcardId</code></td>
<td align="left"><code>URLWildcardServi ce::remove()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>URLWildcardServi ce\TranslateSignal</code></td>
<td align="left"><ul>
<li><code>url</code></li>
</ul></td>
<td align="left"><code>URLWildcardServi ce::translate()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

</div>
**UserService**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Signal type</th>
<th align="left">Properties</th>
<th align="left">Triggered by</th>
<th align="left">When</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>UserService\Assi gnUserToUserGroupS ignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::ass ignUserToUserGroup ()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left">`UserService\Crea
teUserGroupSignal `</td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::cre ateUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\Crea teUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::cre ateUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left">`UserService\Dele
teUserGroupSignal `</td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::del eteUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\Dele teUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::del eteUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>UserService\Move UserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
<li><code>newParentId</code></li>
</ul></td>
<td align="left"><code>UserService::mov eUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\UnAs signUserFromUserGr oupSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::unA ssignUserFromUserG roup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left">`UserService\Upda
teUserGroupSignal `</td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::upd ateUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\Upda teUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::upd ateUser()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

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

