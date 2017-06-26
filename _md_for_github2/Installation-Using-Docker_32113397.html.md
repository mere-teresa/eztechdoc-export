1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Get Started with eZ Platform](Get-Started-with-eZ-Platform_31429520.html)</span>
4.  <span>[Step 1: Installation](31429538.html)</span>

<span id="title-text"> Developer : Installation Using Docker </span>
====================================================================

Created by <span class="author"> André Rømcke</span>, last modified by <span class="editor"> David Christian Liedle</span> on Nov 16, 2016

When our Docker stuff is ready, we'll have the documentation here. Meanwhile, follow along with our progress:

<table style="width:100%;">
<colgroup>
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
<col width="9%" />
</colgroup>
<tbody>
<tr class="odd">
<td align="left"><span class="jim-table-header-content">T</span></td>
<td align="left"><span class="jim-table-header-content">Key</span></td>
<td align="left"><span class="jim-table-header-content">Summary</span></td>
<td align="left"><span class="jim-table-header-content">Assignee</span></td>
<td align="left"><span class="jim-table-header-content">Reporter</span></td>
<td align="left"><span class="jim-table-header-content">P</span></td>
<td align="left"><span class="jim-table-header-content">Status</span></td>
<td align="left"><span class="jim-table-header-content">Resolution</span></td>
<td align="left"><span class="jim-table-header-content">Created</span></td>
<td align="left"><span class="jim-table-header-content">Updated</span></td>
<td align="left"><span class="jim-table-header-content">Due</span></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25871?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25871?src=confmacro">EZP-25871</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25871?src=confmacro">As a Developer I want to run my eZ Platform installation on Docker in a cluster server setup</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
<td align="left">Unresolved</td>
<td align="left">Jun 09, 2016</td>
<td align="left">Jun 09, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25870?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25870?src=confmacro">EZP-25870</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25870?src=confmacro">As a Developer I want to run pre built docker image of my eZ Platform demo installation, and run it in single server setup</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
<td align="left">Unresolved</td>
<td align="left">Jun 09, 2016</td>
<td align="left">Jun 09, 2016</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-26310?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" alt="Epic" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-26310?src=confmacro">EZP-26310</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-26310?src=confmacro">Docker-Tools / deployment M2 - Stabilizing</a></td>
<td align="left">André Rømcke</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
<td align="left">Unresolved</td>
<td align="left">Sep 14, 2016</td>
<td align="left">Feb 20, 2017</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25865?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" alt="Epic" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25865?src=confmacro">EZP-25865</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25865?src=confmacro">Testing infrastructure update (CI)</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/critical.png" alt="Critical" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
<td align="left">Unresolved</td>
<td align="left">Jun 08, 2016</td>
<td align="left">Jan 17, 2017</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-26286?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-26286?src=confmacro">EZP-26286</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-26286?src=confmacro">[Insight] YAML files should not contain syntax error</a></td>
<td align="left">Unassigned</td>
<td align="left">Sylvain Guittard</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Open </span></td>
<td align="left">Unresolved</td>
<td align="left">Sep 12, 2016</td>
<td align="left">Oct 26, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-24032?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" alt="Epic" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-24032?src=confmacro">EZP-24032</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-24032?src=confmacro">Sales Demo system</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Done</td>
<td align="left">Feb 18, 2015</td>
<td align="left">Jan 19, 2016</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-23944?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" alt="Epic" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23944?src=confmacro">EZP-23944</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23944?src=confmacro">Docker for testing needs</a></td>
<td align="left">Unassigned</td>
<td align="left">Vidar Langseid</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jan 28, 2015</td>
<td align="left">Sep 14, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-23945?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/task.png" alt="Task" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23945?src=confmacro">EZP-23945</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23945?src=confmacro">Prepare containers for new install script( replacement of kickstart.ini )</a></td>
<td align="left">Unassigned</td>
<td align="left">Vidar Langseid</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jan 28, 2015</td>
<td align="left">Feb 24, 2015</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25868?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25868?src=confmacro">EZP-25868</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25868?src=confmacro">As a Developer I want tool to build Docker image of my eZ Platform installation, and run it in single server setup</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jun 09, 2016</td>
<td align="left">Aug 24, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25876?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25876?src=confmacro">EZP-25876</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25876?src=confmacro">As Maintainer I want Behat tests running on docker containers so I can run the same setup locally</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jun 13, 2016</td>
<td align="left">Jun 15, 2016</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25383?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25383?src=confmacro">EZP-25383</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25383?src=confmacro">Change web server conf to be able to generate from bash</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jan 14, 2016</td>
<td align="left">Feb 10, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-23855?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23855?src=confmacro">EZP-23855</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23855?src=confmacro">Port ubuntu based containers to debian</a></td>
<td align="left">Unassigned</td>
<td align="left">Vidar Langseid</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jan 07, 2015</td>
<td align="left">Mar 04, 2015</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-23371?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/story.png" alt="Story" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23371?src=confmacro">EZP-23371</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23371?src=confmacro">Provision eZ Publish inside a container</a></td>
<td align="left">Unassigned</td>
<td align="left">Vidar Langseid</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Sep 24, 2014</td>
<td align="left">Mar 04, 2015</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25665?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/epic.png" alt="Epic" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25665?src=confmacro">EZP-25665</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25665?src=confmacro">Docker-Tools / deployment M1 - beta</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Obsolete</td>
<td align="left">Apr 09, 2016</td>
<td align="left">Jan 17, 2017</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25943?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/improvement.png" alt="Improvement" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25943?src=confmacro">EZP-25943</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25943?src=confmacro">Add Redis support to Docker-Tools</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-success"> Closed </span></td>
<td align="left">Fixed</td>
<td align="left">Jun 23, 2016</td>
<td align="left">Sep 11, 2016</td>
<td align="left"></td>
</tr>
<tr class="odd">
<td align="left"><a href="https://jira.ez.no/browse/EZP-23942?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/task.png" alt="Task" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23942?src=confmacro">EZP-23942</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-23942?src=confmacro">Add a solr container and configure ezp to use legacy_solr</a></td>
<td align="left">Vidar Langseid</td>
<td align="left">Vidar Langseid</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Backlog </span></td>
<td align="left">Unresolved</td>
<td align="left">Jan 28, 2015</td>
<td align="left">Jul 21, 2015</td>
<td align="left"></td>
</tr>
<tr class="even">
<td align="left"><a href="https://jira.ez.no/browse/EZP-25869?src=confmacro"><img src="https://jira.ez.no/images/icons/issuetypes/bug.png" alt="Bug" class="icon" /></a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25869?src=confmacro">EZP-25869</a></td>
<td align="left"><a href="https://jira.ez.no/browse/EZP-25869?src=confmacro">Docker containers has extremely slow IO on Mac/Windows under development use</a></td>
<td align="left">Unassigned</td>
<td align="left">André Rømcke</td>
<td align="left"><img src="https://jira.ez.no/images/icons/priorities/major.png" alt="High" class="icon" /></td>
<td align="left"><span class="aui-lozenge aui-lozenge-subtle aui-lozenge-complete"> Backlog </span></td>
<td align="left">Unresolved</td>
<td align="left">Jun 09, 2016</td>
<td align="left">Oct 24, 2016</td>
<td align="left"></td>
</tr>
</tbody>
</table>

<span id="total-issues-count-367619781"> [17 issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=component+%3D+%22Deployment+%3E+Docker+Containers%22+AND+project+%3D+EZP+ORDER+BY+status+ASC&src=confmacro "View all matching issues in JIRA.") </span>

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


