# Legacy Search Engine Bundle

**Legacy Search Engine** is the default search engine, it is SQL based and uses Doctrine's database connection. So its connections are, and should be, defined in the same way as for storage engine, and no further specific configuration is needed.

Its features and performance are limited, and if you have specific search or performance needs you should rather look towards using [Solr](Solr_Bundle).

## Configuring repository with the legacy search engine

Search can be configured independently from storage, and the following configuration example shows both the default values, and how you configure legacy as the search engine:

**ezpublish.yml**

```
ezpublish:
    repositories:
        main:
            storage:
                engine: legacy
                connection: default
            search:
                engine: legacy
                connection: default
```

 


