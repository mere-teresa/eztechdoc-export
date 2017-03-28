# Settings schema and allowed validators

# Internal Field Type conventions and best practices

FieldType-&gt;$settingsSchema and FieldType-&gt;$allowedValidators are intentionally left free-form, to give broadest freedom to Field Type developers. However, for internal Field Types (aka those delivered with eZ Platform), a common standard should be established as best practice. The purpose of this page is to collect and unify this standard.

## Settings schema

The general format of the settings schema of a Field Type is a hashmap of setting names, assigned to their type and default value, e.g.:

    array(
        'myFancySetting' => array(
            'type' => 'int',
            'default' => 23,
        ),
        'myOtherFancySetting' => array(
            'type' => 'string',
            'default' => 'Sindelfingen',
        ),
    );

The type should be either a valid PHP type shortcut (TB discussed) or one of the following special types:

-   Hash (a simple hash map)
-   Choice (an enumeration)
-   &lt;&lt;&lt;YOUR TYPE HERE&gt;&gt;&gt;

 

## Validators

Validators are internally handled through a special ValidatorService … (TBD: Explain service and how it works)

The following validators are available and carry the defined settings … (TBD: Collect validators and their settings)

 


