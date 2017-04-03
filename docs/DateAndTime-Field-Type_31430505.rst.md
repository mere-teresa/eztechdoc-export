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
**Developer : DateAndTime Field Type**

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
This Field Type represents a full date including time information.

<div class="table-wrap">
  Name                 Internal name       Expected input type
  -------------------- ------------------- ------------------------
  `DateAndTime`        `ezdatetime`        `mixed`

</div>
**Description**

This Field Type makes possible to store and retrieve a full date
including time information.

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
**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Property    Type          Description
  ----------- ------------- -----------------------------------------------
  `$value`    `\DateTime`   The date and time value as an instance of
                            **`\DateTime`**.
  -------------------------------------------------------------------------

</div>
**Constructor**

The constructor for this value object will initialize a new Value object
with the value provided. It accepts an instance of PHP’s
built-in **`\DateTime`** class.

**String representation**

String representation of the date value will generate the date string in
the format “D Y-d-m H:i:s” as accepted by [PHP’s
built-in **`date()`** function](http://www.php.net/manual/en/function.date.php).

Example:

> `Wed 2013-22-05 12:19:18`
>
> <div>
>
> ------------------------------------------------------------------------
>
> </div>

**Hash format**

Hash value of this Field Type is an array with two keys:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Key                | Type               | Description        | Example            |
+====================+====================+====================+====================+
| `timestamp`        | `integer`          | Time information   | `1400856992`       |
|                    |                    | as a               |                    |
|                    |                    | timestamp &lt;http |                    |
|                    |                    | :/                 |                    |
|                    |                    | /en.wikipedia.org/ |                    |
|                    |                    | wiki/Unix\_time&gt |                    |
|                    |                    | ;\_\_              |                    |
|                    |                    | .                  |                    |
+--------------------+--------------------+--------------------+--------------------+
| `rfc850`           | `string`           | Time information   | `"Friday, 23-May-  |
|                    |                    | as a string in     | 14 14:56:14 GMT+00 |
|                    |                    | RFC 850 date       |  00"`              |
|                    |                    | format &lt;http:// |                    |
|                    |                    | too                |                    |
|                    |                    | ls.ietf.org/html/r |                    |
|                    |                    | fc850&gt;\_\_.     |                    |
|                    |                    |                    |                    |
|                    |                    | As input, this     |                    |
|                    |                    | will have higher   |                    |
|                    |                    | precedence over    |                    |
|                    |                    | the                |                    |
|                    |                    | **`timestamp`**    |                    |
|                    |                    | value.             |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
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

The field definition of this Field Type can be configured with several
options:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Name               | Type               | Default value      | Description        |
+====================+====================+====================+====================+
| `useSeconds`       | `boolean`          | `false`            | Used to control    |
|                    |                    |                    | displaying of      |
|                    |                    |                    | seconds in the     |
|                    |                    |                    | output.            |
+--------------------+--------------------+--------------------+--------------------+
|     defaultType    |     mixed          |     Type::DEFAULT_ | One of the         |
|                    |                    |                    | **`DEFAULT_*`**    |
|                    |                    | EMPTY              | constants, used by |
|                    |                    |                    | the administration |
|                    |                    |                    | interface for      |
|                    |                    |                    | setting the        |
|                    |                    |                    | default field      |
|                    |                    |                    | value.             |
|                    |                    |                    |                    |
|                    |                    |                    | See below for more |
|                    |                    |                    | details.           |
+--------------------+--------------------+--------------------+--------------------+
|     dateInterval   |     null|\DateInte |     null           | This setting       |
|                    |                    |                    | complements        |
|                    | rval               |                    | **`defaultType`\*  |
|                    |                    |                    | \* setting and can |
|                    |                    |                    | be used only when  |
|                    |                    |                    | latter is set      |
|                    |                    |                    | to**`Type::DEFAULT |
|                    |                    |                    | _ CURRENT_DATE_ADJ |
|                    |                    |                    | US TED`\*\*.       |
|                    |                    |                    |                    |
|                    |                    |                    | In that case the   |
|                    |                    |                    | default input      |
|                    |                    |                    | value when using   |
|                    |                    |                    | administration     |
|                    |                    |                    | interface will be  |
|                    |                    |                    | adjusted by the    |
|                    |                    |                    | given              |
|                    |                    |                    | **\`\\DateInterval |
|                    |                    |                    | \`**.              |
+--------------------+--------------------+--------------------+--------------------+

</div>
Following **`defaultType`** default value options are available as
constants in
the **`eZ\Publish\Core\FieldType\DateAndTime\Type`***\* *\*class:

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Constant                             | Description                          |
+======================================+======================================+
|     DEFAULT_EMPTY                    | Default value will be empty.         |
+--------------------------------------+--------------------------------------+
|     DEFAULT_CURRENT_DATE             | Default value will use current date. |
+--------------------------------------+--------------------------------------+
|     DEFAULT_CURRENT_DATE_ADJUSTED    | Default value will use current date, |
|                                      | adjusted by the interval defined in  |
|                                      | **`dateInterval`** setting.          |
+--------------------------------------+--------------------------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**DateAndTime FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use eZ\Publish\Core\FieldType\DateAndTime\Type;

$settings = array(
    "useSeconds" => false,
    "defaultType" => Type::DEFAULT_EMPTY,
    "dateInterval" => null
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
{{ ez_render_field(content, 'datetime') }}
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

