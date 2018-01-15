<?php

namespace Beeriously\Domain\Event;

use Beeriously\Application\Event\Event;
use Beeriously\Application\Event\Events;

trait EventRecorder
{
    private $events = [];

    protected function recordThat(Event $event)
    {
        $this->events[] = $event;
    }

    /**
     * @return Events|array
     */
    public function getRecordedEvents()
    {
        return new Events($this->events);
    }

    /**
     * Clears the record of new Domain Events. This doesn't clear the history of the object.
     * @return void
     */
    public function clearRecordedEvents()
    {
        $this->events = [];
    }

}
