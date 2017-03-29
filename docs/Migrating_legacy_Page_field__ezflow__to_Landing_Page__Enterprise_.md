# Migrating legacy Page field (ezflow) to Landing Page (Enterprise)

To move your legacy Page field / eZ Flow configuration to eZ Platform Enterprise Edition you can use a script that will aid in the migration process.

The script will automatically migrate only data – to move custom views, layouts, blocks etc., you will have to provide their business logic again.

The migration script will operate on your current database.

Make sure to **back up your database** in case of an unexpected error.

 

To use the script, do the following:

Make a note of the paths to .ini files which define your legacy blocks. You will need these paths later.

**1.** Add `ezflow-migration-toolkit` to `composer.json` in your clean Platform installation.

**composer.json**

```
"ezsystems/ezflow-migration-toolkit": "^1.0.0"
```

**2.** Add `ezflow-migration-toolkit` to `AppKernel.php`.

**AppKernel.php**

```
new EzSystems\EzFlowMigrationToolkitBundle\EzSystemsEzFlowMigrationToolkitBundle()
```

**3.** Clear cache.

```
app/console cache:clear
```

**4.** Run the script with the following parameters:

-   absolute path of your legacy application
-   list of .ini files which define your legacy blocks

**Script command**

```
app/console ezflow:migrate <legacy path> —ini=<block definitions> [—ini=<another block definition> ...]
```

**Example of the migration script command**

```
app/console ezflow:migrate /var/www/legacy.application.com/ —ini=extension/myapplication/settings/block.ini.append.php
```

**5.** You will be warned about the need to create a backup of your database. **Proceed only if you are sure you have done it.**

A `MigrationBundle` will be generated in the `src/` folder.

You will see a report summarizing the results of the migration.

**6.** Add `MigrationBundle` to `AppKernel.php`.

**AppKernel.php**

```
new MigrationBundle\MigrationBundle()
```

**7.** Clear cache again.

 

At this point you can already view the initial effects of the migration, but they will still be missing some of your custom content.

The `MigrationBundle` generates placeholders for layouts in the form of frames with a data dump.

For blocks that could not be mapped to existing Landing Page blocks, it will also generate PHP file templates that you need to fill with your own business logic.

 

 


