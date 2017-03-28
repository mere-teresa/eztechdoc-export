# Role Policies Map

## Retrieving the Role Policies

To retrieve the Roles Policies, on a working eZ Platform instance, in dev environment open the file `app/cache/dev/appDevDebugProjectContainer.xml`

If you can not find the file, please reload the homepage. The cache will be regenerated.

Then open it and look for `ezpublish.api.role.policy_map`, it will look like this:

**ezpublish.api.role.policy\_map entry in the app/cache/dev/appDevDebugProjectContainer.xml file**

```
    <parameter key="ezpublish.api.role.policy_map" type="collection">
        <parameter key="content" type="collection">           
        <parameter key="read" type="collection">
        <parameter key="Class">true</parameter>
```

-   The 1st sublevel ("content") is a module.
-   The 2nd sublevel ("read") is a function.
-   The 3rd sublevel ("Class") is a limitation.

## Module, function and limitations

Each Module contains functions, and for each function, you have limitations. The default values are shown below.

There are 4 modules:

-   content
-   section
-   state
-   user

### Content

content Module
### Functions

### Limitations

 
Class
Section
Owner
Node
Subtree
Group
Language
Other Limitations
read
true
true
true
true
true
true
-
-   State

diff
true
true
true
true
true
-
-
-
view\_embed
true
true
true
true
true
-
-
-
create
true
true
-
true
true
-
true
-   ParentOwner  
-   ParentGroup
-   ParentClass
-   ParentDepth

edit
true
true
true
true
true
true
true
-   State

V1.8

publish

true
true
true
true
true
true
true
-   State

manage\_locations
true
true
true
 
true
-
-
-
hide
true
true
true
true
true
true
true
-   State

translate
true
true
true
true
true
 
true
-
remove
true
true
true
true
true
-
-
-   State

versionread
true
true
true
true
true
-
-
-   Status

versionremove
true
true
true
treu
true
-
-
-   Status

pdf
true
true
true
true
true
-
-
-

### Section

section Module
Function
Limitations
assign
-   Class 
-   Section  
-   Owner 
-   NewSection

### State

 

state Module
 Function
Limitations
 assign
-   Class
-   Section
-   Owner
-   NewSection

### User

user Module
 Function
Limitations
 login
-   Siteaccess

#### In this topic:

-   [Retrieving the Role Policies](#RolePoliciesMap-RetrievingtheRolePolicies)
-   [Module, function and limitations](#RolePoliciesMap-Module,functionandlimitations)
    -   [Content](#RolePoliciesMap-Content)
    -   [Functions](#RolePoliciesMap-Functions)
    -   [Limitations](#RolePoliciesMap-Limitations)
    -   [Section](#RolePoliciesMap-Section)
    -   [State](#RolePoliciesMap-State)
    -   [User](#RolePoliciesMap-User)


