1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Repository](Repository_31432023.html)</span>

<span id="title-text"> Developer : Signals Reference </span>
============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Jul 07, 2016

This page references **all available signals** that you can listen to, triggered by ("Public") Repository API in eZ Platform.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For more information, check the [<span class="confluence-link">SignalSlot </span>](#SignalsReference-Signalslots)<span class="confluence-link">section </span>and the [Listening to Core events](Listening-to-Core-events_31429796.html) recipe.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
All signals are relative to `eZ\Publish\Core\SignalSlot\Signal` namespace.

Transactions

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Signals are sent after transactions are executed, making signals transaction safe.

 

### ContentService

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
<td align="left"><code>ContentService\AddRelationSignal</code></td>
<td align="left"><ul>
<li><code>srcContentId</code> (source contentId, aka referrer)</li>
<li><code>srcVersionNo</code></li>
<li><code>dstContentId</code> (destination contentId, aka target)</li>
</ul></td>
<td align="left"><p><code>ContentService::addRelation()</code></p></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\AddTranslationInfoSignal</code></td>
<td align="left">N/A</td>
<td align="left"><code>ContentService::addTranslationInfo()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\CopyContentSignal</code></td>
<td align="left"><ul>
<li><code>srcContentId</code> (original content ID)</li>
<li><code>srcVersionNo</code></li>
<li><code>dstContentId</code> (contentId of the copy)</li>
<li><code>dstVersionNo</code></li>
<li><code>dstParentLocationId</code> (locationId where the content has been copied)</li>
</ul></td>
<td align="left"><code>ContentService::copyContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\CreateContentDraftSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
<li><code>userId</code> (Id of user used to create the draft, or null - current user)</li>
</ul></td>
<td align="left"><code>ContentService::createContentDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\CreateContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService::createContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\DeleteContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
</ul></td>
<td align="left"><code>ContentService::deleteContent()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\DeleteRelationSignal</code></td>
<td align="left"><ul>
<li><code>srcContentId</code></li>
<li><code>srcVersionNo</code></li>
<li><code>dstContentId</code></li>
</ul></td>
<td align="left"><code>ContentService::deleteRelation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\DeleteVersionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService::deleteVersion()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\PublishVersionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService:: publishVersion()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\TranslateVersionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>ContentService::translationVersion()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentService\UpdateContentMetadataSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
</ul></td>
<td align="left"><code>ContentService::updateContentMetadata()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentService\UpdateContentSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>versionNo</code></li>
</ul></td>
<td align="left"><code>ContentService::updateContent()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### ContentTypeService

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
<td align="left"><code>ContentTypeService\AddFieldDefinitionSignal</code></td>
<td align="left"><ul>
<li><span>contentTypeDraftId</span></li>
</ul></td>
<td align="left"><p><code>ContentTypeService::addFieldDefinition()</code></p></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\AssignContentTypeGroupSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
<li><code>contentTypeGroupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::assignContentTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\CopyContentTypeSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::copyContentType()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\CreateContentTypeDraftSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::createContentTypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\CreateContentTypeGroupSignal</code></td>
<td align="left"><ul>
<li><code>groupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::createContentTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\CreateContentTypeSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::createContentType()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\DeleteContentTypeGroupSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeGroupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::deleteContentTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\DeleteContentTypeSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::deleteContentType()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\PublishContentTypeDraftSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeDraftId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::publishContentTypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\RemoveFieldDefinitionSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeDraftId</code></li>
<li><code>fieldDefinitionId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::removeFieldDefinition()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\UnassignContentTypeGroupSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeId</code></li>
<li><code>contentTypeGroupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::unassignContentTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\UpdateContentTypeDraftSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeDraftId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::updateContentTypeDraft()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ContentTypeService\UpdateContentTypeGroupSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeGroupId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::updateContentTypeGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ContentTypeService\UpdateFieldDefinitionSignal</code></td>
<td align="left"><ul>
<li><code>contentTypeDraftId</code></li>
<li><code>fieldDefinitionId</code></li>
</ul></td>
<td align="left"><code>ContentTypeService::updateFieldDefinition()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### LanguageService

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
<td align="left"><code>LanguageService\CreateLanguageSignal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left"><code>LanguageService::createLanguage()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LanguageService\DeleteLanguageSignal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left"><code>LanguageService::deleteLanguage()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LanguageService\DisableLanguageSignal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left"><code>LanguageService::disableLanguage()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LanguageService\EnableLanguageSignal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
</ul></td>
<td align="left"><code>LanguageService::enableLanguage()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LanguageService\UpdateLanguageNameSignal</code></td>
<td align="left"><ul>
<li><code>languageId</code></li>
<li><code>newName</code></li>
</ul></td>
<td align="left"><code>LanguageService::updateLanguageName()</code></td>
<td align="left"><p>After</p></td>
</tr>
</tbody>
</table>

### LocationService

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
<td align="left"><code>LocationService\CopySubtreeSignal</code></td>
<td align="left"><ul>
<li><code>subtreeId</code> (top locationId of the subtree to be copied)</li>
<li><code>targetParentLocationId</code></li>
</ul></td>
<td align="left"><p><code>LocationService::copySubtree()</code></p></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\CreateLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService::createLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\DeleteLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService::deleteLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\HideLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService::hideLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\UnhideLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService::unhideLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\MoveSubtreeSignal</code></td>
<td align="left"><ul>
<li><code>subtreeId</code></li>
<li><code>newParentLocationId</code></li>
</ul></td>
<td align="left"><code>LocationService::moveSubtree()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>LocationService\SwapLocationSignal</code></td>
<td align="left"><ul>
<li><code>content1Id</code></li>
<li><code>location1Id</code></li>
<li><code>content2Id</code></li>
<li><code>location2Id</code><code></code></li>
</ul></td>
<td align="left"><code>LocationService::swapLocation()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>LocationService\UpdateLocationSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>LocationService::updateLocation()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### ObjectStateService

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
<td align="left"><code>ObjectStateService\CreateObjectStateGroupSignal</code></td>
<td align="left"><ul>
<li><code>objectStateGroupId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::createObjectStateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateService\CreateObjectStateSignal</code></td>
<td align="left"><ul>
<li><code>objectStateGroupId</code></li>
<li><code>objectStateId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::createObjectState()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateService\DeleteObjectStateGroupSignal</code></td>
<td align="left"><ul>
<li><code>objectStateGroupId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::deleteObjectStateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateService\DeleteObjectStateSignal</code></td>
<td align="left"><ul>
<li><code>objectStateId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::deleteObjectState()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateService\SetContentStateSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>objectStateGroupId</code></li>
<li><code>objectStateId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::setContentState()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateService\SetPriorityOfObjectStateSignal</code></td>
<td align="left"><ul>
<li><code>objectStateId</code></li>
<li><code>priority</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::setPriorityOfObjectState()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>ObjectStateService\UpdateObjectStateGroupSignal</code></td>
<td align="left"><ul>
<li><code>objectStateGroupId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::updateObjectStateGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>ObjectStateService\UpdateObjectStateSignal</code></td>
<td align="left"><ul>
<li><code>objectStateId</code></li>
</ul></td>
<td align="left"><code>ObjectStateService::updateObjectState()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### RoleService

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
<td align="left"><code>RoleService\AddPolicySignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::addPolicy()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\AssignRoleToUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userGroupId</code></li>
<li><code>roleLimitation</code></li>
</ul></td>
<td align="left"><code>RoleService::assignRoleToUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\AssignRoleToUserSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userId</code></li>
<li><code>roleLimitation</code></li>
</ul></td>
<td align="left"><code>RoleService::assignRoleToUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\CreateRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::createRole()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\DeleteRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::deleteRole()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\RemovePolicySignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::removePolicy()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\UnassignRoleFromUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>RoleService::unassignRoleFromUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\UnassignRoleFromUserSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>RoleService::unassignRoleFromUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>RoleService\UpdatePolicySignal</code></td>
<td align="left"><ul>
<li><code>policyId</code></li>
</ul></td>
<td align="left"><code>RoleService::updatePolicy()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>RoleService\UpdateRoleSignal</code></td>
<td align="left"><ul>
<li><code>roleId</code></li>
</ul></td>
<td align="left"><code>RoleService::updateRole()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### SectionService

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
<td align="left"><code>SectionService\AssignSectionSignal</code></td>
<td align="left"><ul>
<li><code>contentId</code></li>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService::assignSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>SectionService\CreateSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService::createSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>SectionService\DeleteSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService::deleteSection()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>SectionService\UpdateSectionSignal</code></td>
<td align="left"><ul>
<li><code>sectionId</code></li>
</ul></td>
<td align="left"><code>SectionService::updateSection()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### TrashService

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
<td align="left"><code>TrashService\DeleteTrashItemSignal</code></td>
<td align="left"><ul>
<li><code>trashItemId</code></li>
</ul></td>
<td align="left"><code>TrashService::deleteTrashItem()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>TrashService\EmptyTrashSignal</code></td>
<td align="left">N/A</td>
<td align="left"><code>TrashService::emptyTrash()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>TrashService\RecoverSignal</code></td>
<td align="left"><ul>
<li><code>trashItemId</code></li>
<li><code>newParentLocationId</code></li>
<li><code>newLocationId</code></li>
</ul></td>
<td align="left"><code>TrashService::recover()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>TrashService\TrashSignal</code></td>
<td align="left"><ul>
<li><code>locationId</code></li>
</ul></td>
<td align="left"><code>TrashService::trash()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### URLAliasService

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
<td align="left"><code>URLAliasService\CreateGlobalUrlAliasSignal</code></td>
<td align="left"><ul>
<li><code>urlAliasId</code></li>
</ul></td>
<td align="left"><code>URLAliasService::createGlobalUrlAlias()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>URLAliasService\CreateUrlAliasSignal</code></td>
<td align="left"><ul>
<li><code>urlAliasId</code></li>
</ul></td>
<td align="left"><code>URLAliasService::createUrlAlias()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>URLAliasService\RemoveAliasesSignal</code></td>
<td align="left"><ul>
<li><code>aliasList</code></li>
</ul></td>
<td align="left"><code>URLAliasService::removeAliases()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### URLWildcardService

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
<td align="left"><code>URLWildcardService\CreateSignal</code></td>
<td align="left"><ul>
<li><code>urlWildcardId</code></li>
</ul></td>
<td align="left"><code>URLWildcardService::create()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>URLWildcardService\RemoveSignal</code></td>
<td align="left"><ul>
<li><code>urlWildcardId</code></li>
</ul></td>
<td align="left"><code>URLWildcardService::remove()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>URLWildcardService\TranslateSignal</code></td>
<td align="left"><ul>
<li><code>url</code></li>
</ul></td>
<td align="left"><code>URLWildcardService::translate()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

### UserService

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
<td align="left"><code>UserService\AssignUserToUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::assignUserToUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>UserService\CreateUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::createUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\CreateUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::createUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>UserService\DeleteUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::deleteUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\DeleteUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::deleteUser()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>UserService\MoveUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
<li><code>newParentId</code></li>
</ul></td>
<td align="left"><code>UserService::moveUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\UnAssignUserFromUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::unAssignUserFromUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="even">
<td align="left"><code>UserService\UpdateUserGroupSignal</code></td>
<td align="left"><ul>
<li><code>userGroupId</code></li>
</ul></td>
<td align="left"><code>UserService::updateUserGroup()</code></td>
<td align="left">After</td>
</tr>
<tr class="odd">
<td align="left"><code>UserService\UpdateUserSignal</code></td>
<td align="left"><ul>
<li><code>userId</code></li>
</ul></td>
<td align="left"><code>UserService::updateUser()</code></td>
<td align="left">After</td>
</tr>
</tbody>
</table>

#### In this topic:

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

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


