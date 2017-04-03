<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Under the Hood: How eZ Platform Works](31429659.html)
5.  [Content Model: Content is King!](31429709.html)
6.  [Content items, Content Types and Fields](31430275.html)
7.  [Field Types reference](Field-Types-reference_31430495.html)

</div>
**Developer : Date Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Feb 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents a date without time information.

<div class="table-wrap">
  Name          Internal name      Expected input type
  ------------- ------------------ ------------------------
  `Date`        `ezdate`           `mixed`

</div>
**Description**

This Field Type makes it possible to store and retrieve date
information.

**PHP API Field Type **

**Input expectations**

If input value is of type **`string`** or **`integer`**, it will be
passed directly to the [PHP’s built-in **`\DateTime`** class
constructor](http://www.php.net/manual/en/datetime.construct.php),
therefore the same input format expectations apply.

It is also possible to directly pass an instance of **`\DateTime`**.

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Type                                 | Example                              |
+======================================+======================================+
| `string`                             | `"2012-08-28 12:20 Europe/Berlin"`   |
+--------------------------------------+--------------------------------------+
|     integer                          |     1346149200                       |
+--------------------------------------+--------------------------------------+
|     \DateTime                        |     new \DateTime()                  |
+--------------------------------------+--------------------------------------+

</div>
<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Time information is **not stored**.

Before storing, the provided input value will be set to the the
beginning of the day in the given or the environment timezone.

</div>
</div>
**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
  ------------------------------------------------------------------------
  Property    Type            Description
  ----------- --------------- --------------------------------------------
  `$date`     `\DateTime`     This property will be used for the text
                              content.
  ------------------------------------------------------------------------

</div>
**String representation**

String representation of the date value will generate the date string in
the format “l d F Y” as accepted by [PHP’s
built-in **`date()`** function](http://www.php.net/manual/en/function.date.php).

Example:

> `Wednesday 22 May 2013`

**Constructor**

The constructor for this value object will initialize a new Value object
with the value provided. It accepts an instance of [PHP’s
built-in **`\DateTime`** class](http://www.php.net/manual/en/datetime.construct.php).

**Hash format**

Hash value of this Field Type is an array with two keys:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| .. raw:: html      | .. raw:: html      | .. raw:: html      | .. raw:: html      |
| &lt;div            | &lt;div            | &lt;div            | &lt;div            |
| class=“tablesor    | class=“tablesor    | class=“tablesor    | class=“tablesor    |
| ter-header-inner”& | ter-header-inner”& | ter-header-inner”& | ter-header-inner”& |
| gt;                | gt;                | gt;                | gt;                |
| Key .. raw:: html  | Type .. raw:: html | Description ..     | Example .. raw::   |
| &lt;/div&gt;       | &lt;/div&gt;       | raw:: html         | html &lt;/div&gt;  |
|                    |                    | &lt;/div&gt;       |                    |
+====================+====================+====================+====================+
| `timestamp`        | `integer`          | Time information   | `1400856992`       |
|                    |                    | as                 |                    |
|                    |                    | a timestamp &lt;ht |                    |
|                    |                    | tp://en.wikipedia. |                    |
|                    |                    | org/wiki/Unix\_tim |                    |
|                    |                    | e                  |                    |
|                    |                    | &gt;\_\_.          |                    |
+--------------------+--------------------+--------------------+--------------------+
| `rfc850`           | `string`           | Time information   | `"Friday, 23-May-  |
|                    |                    | as a string        | 14 14:56:14 GMT+00 |
|                    |                    | in RFC 850 date    |  00"`              |
|                    |                    | format &lt;http:// |                    |
|                    |                    | too                |                    |
|                    |                    | ls.ietf.org/html/r |                    |
|                    |                    | fc850&gt;\_\_.     |                    |
|                    |                    |                    |                    |
|                    |                    | As input, this     |                    |
|                    |                    | will have higher   |                    |
|                    |                    | precedence over    |                    |
|                    |                    | the **`timestam p` |                    |
|                    |                    | ** value.          |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of the hash value in PHP**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$hash = array(
    "timestamp" => 1400856992,
    "rfc850" => "Friday, 23-May-14 14:56:14 GMT+0000"
);
```

</div>
</div>
**Validation**

This Field Type does not perform any special validation of the input
value.

**Settings**

The field definition of this Field Type can be configured with one
option:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Name               | Type               | Default value      | Description        |
+====================+====================+====================+====================+
|     defaultType    |     mixed          |     Type::DEFAULT_ | One of             |
|                    |                    |                    | the **`DEFAULT_ *` |
|                    |                    | EMPTY              | ** constants,      |
|                    |                    |                    | used by the        |
|                    |                    |                    | administration     |
|                    |                    |                    | interface for      |
|                    |                    |                    | setting the        |
|                    |                    |                    | default field      |
|                    |                    |                    | value.             |
|                    |                    |                    |                    |
|                    |                    |                    | See below for more |
|                    |                    |                    | details.           |
+--------------------+--------------------+--------------------+--------------------+

</div>
Following **`defaultType`** default value options are available as
constants in the **`eZ\Publish\Core\FieldType\Date\Type`***\* *\*class:

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Constant                             | Description                          |
+======================================+======================================+
|     DEFAULT_EMPTY                    | Default value will be empty.         |
+--------------------------------------+--------------------------------------+
|     DEFAULT_CURRENT_DATE             | Default value will use current date. |
+--------------------------------------+--------------------------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Date FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use eZ\Publish\Core\FieldType\Date\Type;

$settings = array(
    "defaultType" => Type::DEFAULT_EMPTY
);
```

</div>
</div>
**Template rendering**

The template called by [the **ez\_render\_field()** Twig
function](ez_render_field_32114041.html) while rendering a Date field
has access to the following parameters:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Parame Type   Defa Description
  ter           ult  
  ------ ------ ---- ------------------------------------------------------
  `local `strin      Internal parameter set by the system based on current
  e`     g`          request locale or if not set calculated based on the
                     language of the field.
  -------------------------------------------------------------------------

</div>
Example:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_render_field(content, 'date') }}
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

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

