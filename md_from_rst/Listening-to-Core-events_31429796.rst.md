<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Listening to Core events**

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
**Description**

When you interact with the Public API, and with the content Repository
in particular, **Signals** may be sent out, allowing you to react on
actions triggered by the Repository. Those signals can be received by
dedicated services called **Slots**.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
To learn more about SignalSlot in eZ Platform, please refer to the
[dedicated documentation
page](Content-Rendering_31429679.html#ContentRendering-Extensibility).

[Signals
reference](Repository_31432023.html#Repository-SignalsReference)

</div>
</div>
This recipe will describe how to register a Slot for a dedicated Signal.

**Solution**

**Registering a Slot for a given Signal**

As described in the [SignalSlot
documentation](Repository_31432023.html#Repository-SignalSlots), a Slot
is roughly like an event listener and must
extend `eZ\Publish\Core\SignalSlot\Slot`.

A typical implementation is the following:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**OnPublishSlot**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
namespace Acme\TestBundle\Slot;
 
use eZ\Publish\Core\SignalSlot\Slot as BaseSlot;
use eZ\Publish\Core\SignalSlot\Signal;
use eZ\Publish\API\Repository\ContentService;

class OnPublishSlot extends BaseSlot
{
    /**
     * @var \eZ\Publish\API\Repository\ContentService
     */
    private $contentService;

    public function __construct( ContentService $contentService )
    {
        $this->contentService = $contentService;
    }

    public function receive( Signal $signal )
    {
        if ( !$signal instanceof Signal\ContentService\PublishVersionSignal )
        {
            return;
        }

        // Load published content
        $content = $this->contentService->loadContent( $signal->contentId, null, $signal->versionNo );
        // Do stuff with it...
    }
}
```

</div>
</div>
`OnPublishSlot` now needs to be registered as a service in the
ServiceContainer and identified as a valid Slot:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**services.yml (in your bundle)**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
parameters:
    my.onpublish_slot.class: Acme\TestBundle\Slot\OnPublishSlot
 
services:
    my.onpublish_slot:
        class: %my.onpublish_slot.class%
        arguments: [@ezpublish.api.service.content]
        tags:
            - { name: ezpublish.api.slot, signal: ContentService\PublishVersionSignal }
```

</div>
</div>
Service tag **`ezpublish.api.slot`** identifies your service as a valid
Slot. The signal part (mandatory) says that this slot is listening to
**`ContentService\PublishVersionSignal`** (shortcut for
`\eZ\Publish\Core\SignalSlot\Signal\ContentService\PublishVersionSignal`).

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Internal signals emitted by Repository services are always relative to
`eZ\Publish\Core\SignalSlot\Signal` namespace.

Hence `ContentService\PublishVersionSignal` means
`eZ\Publish\Core\SignalSlot\Signal\ContentService\PublishVersionSignal`.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
Tip

<div class="confluence-information-macro-body">
You can register a slot for any kind of signal by setting `signal` to
`*` in the service tag.

</div>
</div>
**Using a basic Symfony event listener**

eZ Platform comes with a generic slot that converts signals (including
ones defined by user code) to regular event objects and exposes them via
the EventDispatcher. This makes it possible to implement a simple event
listener/subscriber if you’re more comfortable with this approach.

All you need to do is to implement an event listener or subscriber and
register it.

**Example**

This very simple example will just log the received signal.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**services.yml (in your bundle)**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
parameters:
    my.signal_listener.class: Acme\TestBundle\EventListener\SignalListener
 
services:
    my.signal_listener:
        class: %my.signal_listener.class%
        arguments: [@logger]
        tags:
            - { name: kernel.event_subscriber }
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?php
namespace Acme\TestBundle\EventListener;

use eZ\Publish\Core\MVC\Symfony\Event\SignalEvent;
use eZ\Publish\Core\MVC\Symfony\MVCEvents;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SignalListener implements EventSubscriberInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct( LoggerInterface $logger )
    {
        $this->logger = $logger;
    }

    public function onAPISignal( SignalEvent $event )
    {
        $signal = $event->getSignal();
        // You may want to check the signal type here to react accordingly
        $this->logger->debug( 'Received Signal: ' . print_r( $signal, true ) );
    }

    public static function getSubscribedEvents()
    {
        return array(
            MVCEvents::API_SIGNAL => 'onAPISignal'
        );
    }
}
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376004132">
-   [Description](#ListeningtoCoreevents-Description)
-   [Solution](#ListeningtoCoreevents-Solution)
    -   [Registering a Slot for a given
        Signal](#ListeningtoCoreevents-RegisteringaSlotforagivenSignal)
    -   [Using a basic Symfony event
        listener](#ListeningtoCoreevents-UsingabasicSymfonyeventlistener)
-   [Example](#ListeningtoCoreevents-Example)

</div>
**Related topics:**

[Events](Content-Rendering_31429679.html#ContentRendering-Extensibility)

[Signal-Slot](Repository_31432023.html#Repository-SignalSlots)

[Signals
reference](Repository_31432023.html#Repository-SignalsReference)

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

