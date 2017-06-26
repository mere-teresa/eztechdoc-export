<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Creating a Tweet Field Type](Creating-a-Tweet-Field-Type_31429766.html)
5.  [Build the bundle](Build-the-bundle_31429768.html)

</div>
**Developer : Create the bundle**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on May 05, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
Custom Field Types follow the Symfony 2 extension mechanism: [bundles](http://symfony.com/doc/current/cookbook/bundles/index.html). We can get started with a bundle using the built-in Symfony 2 bundle generator.

**Generating the bundle**

From the eZ Platform root, run the following:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
php app/console generate:bundle
```

</div>
</div>
First, we are asked for the namespace. As the vendor, we will use EzSystems as the root namespace. This must of course be changed to whatever identifies you as a vendor (your name, company name, etc). We then choose a preferably unique name for the Field Type itself, and make the name end with Bundle. Here we’ve chosen TweetFieldTypeBundle.

 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Bundle namespace: EzSystems/TweetFieldTypeBundle<enter>
```

</div>
</div>
We must next input the bundle’s name. Nothing exotic here: we concatenate the vendor’s namespace and the bundle’s namespace, which is the default. Just hit Enter:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Bundle name [EzSystemsTweetFieldTypeBundle]:<enter>
```

</div>
</div>
We are then asked for the target directory. We will begin within the `src` folder, but we could (and should!) version it and have it moved to `vendor` at some point. Again, this is the default, and we just hit Enter.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Target directory [/home/bertrand/www/ezpublish5/src]:<enter>
```

</div>
</div>
We must then specify which format the configuration must be generated as. We will use yml, since it is what we use in eZ Platform itself. Of course, any other format could be used.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Configuration format (yml, xml, php, or annotation): yml<enter>
```

</div>
</div>
The generator will then offer to create the whole directory structure for us. Since our bundle isn’t really a standard Symfony full stack bundle, we decline.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Do you want to generate the whole directory structure [no]? no<enter>
```

</div>
</div>
 

We then get a summary of what will be generated:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
You are going to generate a "EzSystems\TweetFieldTypeBundle\EzSystemsTweetFieldTypeBundle" bundle
in "/home/bertrand/www/ezpublish5/src/" using the "yml" format.
Do you confirm generation [yes]?<enter>
```

</div>
</div>
After generation, the wizard will offer to update the kernel with our bundle (answer "yes"), and to update the app’s routing with our bundle’s route file (answer "no").

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
Generating the bundle code: OK
Checking that the bundle is autoloaded: OK
Confirm automatic update of your Kernel [yes]? <enter>
Enabling the bundle inside the Kernel: OK
Confirm automatic update of the Routing [yes]? no <enter>
```

</div>
</div>
Our bundle should now be generated. Navigate to `src/EzSystems/EzSystemsTweetBundle` and you should see the following structure:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$ ls -l src/EzSystems/TweetFieldTypeBundle
Controller
DependencyInjection
EzSystemsTweetFieldTypeBundle.php
Resources
Tests
```

</div>
</div>
Feel free to delete the Controller folder, since we won’t use it in this tutorial. It could have been useful, had our Field Type required an interface of its own.

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="panel" style="border-width: 1px;">
<div class="panelHeader" style="border-bottom-width: 1px;">
**Tutorial path**

</div>
<div class="panelContent">
<div class="plugin_pagetree">
</div>
</div>
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

