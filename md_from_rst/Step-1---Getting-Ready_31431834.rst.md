<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Building a Bicycle Route Tracker in eZ
    Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)
5.  [Part 1: Setting up eZ Platform](31431610.html)

</div>
**Developer : Step 1 - Getting Ready**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified on Jan 09, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:70%;min-width:70%;max-width:70%;">
eZ Platform is a new CMS written in PHP5 using Symfony2 Full Stack.

| | You will need a web server, a relational database and PHP5.x+ in
order to follow this tutorial. An \*AMP web server is sufficient. You
can use a local server on your own computer.

Once you have [installed eZ Platform](https://doc.ez.no/x/opPfAQ),
[configured your
server](https://doc.ez.no/pages/viewpage.action?pageId=31429536), and
created your database (see aside) [started your web
server](https://doc.ez.no/display/DEVELOPER/Web+Server), you need to
create a database for this tutorial.

 

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
Tip: you can use [the local PHP built-in web server]() for this Tutorial
!

</div>
</div>
</div>
<div class="columnMacro"
style="width:30%;min-width:30%;max-width:30%;">
<div class="panel"
style="border-bottom: 1px solid white;border-width: 0px;">
<div class="panelHeader" style="border-bottom-width: 0px;">
**Database Creation**

</div>
<div class="panelContent">
 In this tutorial, we’ll use the database name “`ezplatformtutorial`”.

You can create this using a GUI tool, or on the command line. For MySQL
you can use this query:
`` `CREATE DATABASE ezplatformtutorial CHARACTER SET UTF8 ``. You can
perform the equivalent action on the database of your choice. We’ve seen
good results with MariaDB, PostgreSQL, and others.

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

.. rubric:: \*\*Now you are ready to begin the Tutorial!\*\*
   :name: Step1-GettingReady-NowyouarereadytobegintheTutorial!

As we did a clean install, the root content will be displayed using the
default content view template.

 

|image0|

\*Our website is quite raw for the moment.\*

| 
| We will customize this default content view template in the next
  steps. After that, we’ll create your Content Model and populate your
  content tree.

 

.. raw:: html

   &lt;div class="sectionColumnWrapper"&gt;

.. raw:: html

   &lt;div class="sectionMacro"&gt;

.. raw:: html

   &lt;div class="sectionMacroRow"&gt;

.. raw:: html

   &lt;div class="columnMacro"
   style="width:50%;min-width:50%;max-width:50%;"&gt;

 ⬅ Previous: Introduction of the Tutorial
&lt;Building-a-Bicycle-Route-Tracker-in-eZ-Platform\_31431606.html&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="columnMacro"&gt;

Next: Step 2 - Create your content model
&lt;Step-2—Create-your-content-model\_31431844.html&gt;\_\_ ➡

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

| 
|  
&lt;Building-a-Bicycle-Route-Tracker-in-eZ-Platform\_31431606.html&gt;\_\_\\ 

 

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

.. raw:: html

   &lt;div class="panel" style="border-color: \#f58220;border-width: 2px;"&gt;

.. raw:: html

   &lt;div class="panelHeader"
   style="border-bottom-width: 2px;border-bottom-color: \#f58220;"&gt;

\*\*Tutorial path\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="panelContent"&gt;

.. raw:: html

   &lt;div class="plugin\_pagetree"&gt;

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

|image1|
eZ\_Platform\_homepage\_install\_clean\_1\_7.png
&lt;attachments/31431834/32869383.png&gt;\_\_
(image/png)

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

Document generated by Confluence on Mar 24, 2017 17:19

.. raw:: html

   &lt;div id="footer-logo"&gt;

Atlassian &lt;<http://www.atlassian.com/>&gt;\`\_\_

</div>
</div>
</div>
</div>

