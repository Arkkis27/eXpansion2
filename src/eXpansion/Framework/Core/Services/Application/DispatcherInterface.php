<?php


namespace eXpansion\Framework\Core\Services\Application;


interface DispatcherInterface
{
    /**
     * Initialize the dispatcher and it's dependencies.
     *
     * @return void
     */
    public function init();


    /**
     * Reset the dispatcher elements when game mode changes.
     *
     * @return void
     */
    public function reset();

    /**
     * Dispatch the event.
     *
     * @param $event
     * @param $params
     *
     * @return mixed
     */
    public function dispatch($event, $params);
}
