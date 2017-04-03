<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : Docker Tools**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Jul 13, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-warning">
Beta

<div class="confluence-information-macro-body">
Instructions and Tools *(docker images, Dockerfile, .env file,
docker-compose files, scripts, etc.)* described on this page are
currently in Beta for community testing & contribution, and might change
without notice.

</div>
</div>
 

> Docker allows you to package an application with all of its
> dependencies into a standardized unit for software development. –
> Docker.com

Using Docker images, we can package up all the executables,
dependencies, and files required to run eZ Platform. We’re in the
process of preparing images for public use, and you can follow along on
related epic tracking this 
[![image0](https://jira.ez.no/images/icons/issuetypes/epic.png){.icon}EZP-25665](https://jira.ez.no/browse/EZP-25665?src=confmacro)
- Docker-Tools / deployment M1 - beta Closed

*What is described on this page has gone through several iterations to
try to become as simple as possible. It uses plain Docker and Docker
Compose to avoid having to learn anything specific with these tools, and
it uses official docker images to take advantage of continued innovation
by Docker Inc. and the ecosystem. We will expand on these tools as both
images, and Docker itself, matures. *

If you would like to join our efforts *(development, documentation,
feedback, and/or testing)*, [sign
up](http://ez-community-on-slack.herokuapp.com/) for our [Community
Slack](http://ezcommunity.slack.com) and join the conversation in the
**\#docker-tools** channel.

**Demo usage**

<div
class="confluence-information-macro confluence-information-macro-information">
Project use

<div class="confluence-information-macro-body">
For usage with your own project based on eZ Platform or eZ Enterprise
starting with v1.4.0 you’ll find documentation for project use
in `doc/docker-compose/README.md`.

</div>
</div>
What follows below is instructions for setting up a simple single-server
instance of eZ Platform demo using Docker. This is here shown on your
own machine, however using [Docker
Machine](https://docs.docker.com/machine/) you may point this to a
variety of servers and services.

Note: For running Docker in production you’ll need to handle a few more
things we are not covering here yet, some of which are:

-   Handling persistence, both database and web/var files
-   Ideally also scale out to offer redundancy, and for that use
    memcached/redis and Varnish in front
-   Handle health of containers and configure setup if something goes
    down
-   …

<div class="sectionColumnWrapper">
<div class="sectionMacroWithBorder">
INTERNAL Work in progress, need to move entrypoint so it can be loaded.

First place the two files below in a empty folder:

<div class="sectionMacroRow">
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**.env**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
SYMFONY_ENV=prod
SYMFONY_DEBUG=0
DATABASE_USER=ezp
DATABASE_PASSWORD=SetYourOwnPassword
DATABASE_NAME=ezp
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**docker-compose.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
version: '2'

services:
  app:
    image: ezsystems/ezplatform-demo:latest
    depends_on:
     - db
    environment:
     - SYMFONY_ENV
     - SYMFONY_DEBUG
     - DATABASE_USER
     - DATABASE_PASSWORD
     - DATABASE_NAME
     - DATABASE_HOST=db

  web:
    image: nginx:stable
    volumes_from:
     - app:ro
    ports:
     - "8080:80"
    environment:
     - SYMFONY_ENV
     - MAX_BODY_SIZE=20
     - FASTCGI_PASS=app:9000
     - TIMEOUT=190
     - DOCKER0NET
    command: /bin/bash -c "cd /var/www && cp -a doc/nginx/ez_params.d /etc/nginx && bin/vhost.sh --template-file=doc/nginx/vhost.template > /etc/nginx/conf.d/default.conf && nginx -g 'daemon off;'"

  db:
    image: mariadb:10.0
    #volumes:
    # - ./entrypoint/mysql:/docker-entrypoint-initdb.d/:ro
    environment:
     - MYSQL_RANDOM_ROOT_PASSWORD=1
     - MYSQL_USER=$DATABASE_USER
     - MYSQL_PASSWORD=$DATABASE_PASSWORD
     - MYSQL_DATABASE=$DATABASE_NAME
     - TERM=dumb
 
```

</div>
</div>
 

Then execute:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
# If you have used same terminal for testing docker already, then first: unset COMPOSE_FILE SYMFONY_ENV SYMFONY_DEBUG
 
docker-compose up -d --force-recreate

docker-compose exec --user www-data app /bin/sh -c "php /scripts/wait_for_db.php; php app/console ezplatform:install demo"
```

</div>
</div>
App should now be up on localhost:8080

</div>
</div>
</div>
   

**Known issues**

Incomplete list of known bugs:

<div id="refresh-module-1246250676">
<div id="jira-issues-1246250676"
style="width: 100%;  overflow: auto;">
  ------------------------ -----------------------------------------------
  Key                      Summary

  [EZP-25869](https://jira [Docker containers has extremely slow IO on
  .ez.no/browse/EZP-25869? Mac/Windows under development
  src=confmacro)           use](https://jira.ez.no/browse/EZP-25869?src=co
                           nfmacro)

  [EZP-26286](https://jira [\[Insight\] YAML files should not contain
  .ez.no/browse/EZP-26286? syntax
  src=confmacro)           error](https://jira.ez.no/browse/EZP-26286?src=
                           confmacro)
  ------------------------ -----------------------------------------------

</div>
<div class="refresh-issues-bottom">
> \`2

issues &lt;<https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=component%3D%22Deployment+%3E+Docker+Containers%22+AND+issuetype%3DBug+AND+Resolution+is+Empty+ORDER+BY+priority+++&src=confmacro>&gt;\_\_

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

 

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

.. rubric:: Related:
   :name: DockerTools-Related:

-  Documentation:

   -  \[STRIKEOUT:Installation Using

:   Docker &lt;Installation-Using-Docker\_32113397.html&gt;\`\_\_\]

-   Docker images:
    -   [ezsystems/php](https://hub.docker.com/r/ezsystems/php/)
    -   ezsystems/ezplatform-demo

 

![image1](attachments/32113421/32113469.png){.confluence-embedded-image
.confluence-thumbnail .image-center height="150px"}

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

