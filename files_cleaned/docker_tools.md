1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Docker Tools </span> {#title-heading .pagetitle}
=======================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Jul 13, 2016

Beta

<span
class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
Instructions and Tools *(docker images, Dockerfile, .env file,
docker-compose files, scripts, etc.)* described on this page are
currently in Beta for community testing & contribution, and might change
without notice.

 

> Docker allows you to package an application with all of its
> dependencies into a standardized unit for software development. –
> Docker.com

Using Docker images, we can package up all the executables,
dependencies, and files required to run eZ Platform. We’re in the
process of preparing images for public use, and you can follow along on
related epic tracking this  <span class="jira-issue resolved">
[![](https://jira.ez.no/images/icons/issuetypes/epic.png){.icon}EZP-25665](https://jira.ez.no/browse/EZP-25665?src=confmacro){.jira-issue-key}
- <span class="summary">Docker-Tools / deployment M1 - beta</span> <span
class="aui-lozenge aui-lozenge-subtle aui-lozenge-success jira-macro-single-issue-export-pdf">Closed</span>
</span>

*What is described on this page has gone through several iterations to
try to become as simple as possible. It uses plain Docker and Docker
Compose to avoid having to learn anything specific with these tools, and
it uses official docker images to take advantage of continued innovation
by Docker Inc. and the ecosystem. We will expand on these tools as both
images, and Docker itself, matures. *

If you would like to join our efforts *(development, documentation,
feedback, and/or testing)*, [sign
up](http://ez-community-on-slack.herokuapp.com/){.external-link} for our
[Community Slack](http://ezcommunity.slack.com){.external-link} and join
the conversation in the **\#docker-tools** channel.

### Demo usage {#DockerTools-Demousage}

Project use

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
For usage with your own project based on eZ Platform or eZ Enterprise
starting with v1.4.0 you’ll find documentation for project use
in `doc/docker-compose/README.md`.

What follows below is instructions for setting up a simple single-server
instance of eZ Platform demo using Docker. This is here shown on your
own machine, however using [Docker
Machine](https://docs.docker.com/machine/){.external-link} you may point
this to a variety of servers and services.

Note: For running Docker in production you’ll need to handle a few more
things we are not covering here yet, some of which are:

-   Handling persistence, both database and web/var files
-   Ideally also scale out to offer redundancy, and for that use
    memcached/redis and Varnish in front
-   Handle health of containers and configure setup if something goes
    down
-   …

<span><span style="color: rgb(255,0,0);">INTERNAL</span> Work in
progress, need to move entrypoint so it can be loaded.</span>

<span>  
</span>

<span>First place the two files below in a empty folder:</span>

**.env**

~~~~ brush:
SYMFONY_ENV=prod
SYMFONY_DEBUG=0
DATABASE_USER=ezp
DATABASE_PASSWORD=SetYourOwnPassword
DATABASE_NAME=ezp
~~~~

**docker-compose.yml**

~~~~ brush:
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
 
~~~~

 

Then execute:

~~~~ brush:
# If you have used same terminal for testing docker already, then first: unset COMPOSE_FILE SYMFONY_ENV SYMFONY_DEBUG
 
docker-compose up -d --force-recreate

docker-compose exec --user www-data app /bin/sh -c "php /scripts/wait_for_db.php; php app/console ezplatform:install demo"
~~~~

App should now be up on localhost:8080

 
 

### Known issues {#DockerTools-Knownissues}

Incomplete list of known bugs:

|                                                                |                                                                                                                                   |
|----------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| <span class="jim-table-header-content">Key</span>              | <span class="jim-table-header-content">Summary</span>                                                                             |
| [EZP-25869](https://jira.ez.no/browse/EZP-25869?src=confmacro) | [Docker containers has extremely slow IO on Mac/Windows under development use](https://jira.ez.no/browse/EZP-25869?src=confmacro) |
| [EZP-26286](https://jira.ez.no/browse/EZP-26286?src=confmacro) | [\[Insight\] YAML files should not contain syntax error](https://jira.ez.no/browse/EZP-26286?src=confmacro)                       |

<span id="total-issues-count-1246250676"> [2
issues](https://jira.ez.no/secure/IssueNavigator.jspa?reset=true&jqlQuery=component%3D%22Deployment+%3E+Docker+Containers%22+AND+issuetype%3DBug+AND+Resolution+is+Empty+ORDER+BY+priority+++&src=confmacro "View all matching issues in JIRA.")
</span>

 

#### Related: {#DockerTools-Related:}

-   Documentation:
    -   <s>[Installation Using
        Docker](Installation-Using-Docker_32113397.html)</s>
-   Docker images:
    -   [ezsystems/php](https://hub.docker.com/r/ezsystems/php/){.external-link}
    -   ezsystems/ezplatform-demo

 

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/32113421/32113469.png){.confluence-embedded-image
.confluence-thumbnail .image-center height="150"}</span>

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


