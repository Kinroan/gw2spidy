<?php

namespace GW2Spidy\NewQueue;

use GW2Spidy\Util\RedisSlots\RedisSlotManager;

class RequestSlotManager extends RedisSlotManager {
    protected function getSlotsQueueName() {
        return 'request.slots';
    }
    /**
     *  gives us 100 x (60 / (10 / 60)) = 36000 requests / hr = 10 requests / sec
     * this is excluding the time it takes to handle the slots
     *
     */
    protected function getSlots() {
        return getAppConfig("gw2spidy.request-slots.count");
    }

    protected function getTimeout() {
        return getAppConfig("gw2spidy.request-slots.cooldown");
    }

    /**
     * @return RequestSlotManager
     */
    public static function getInstance() {
        return parent::getInstance();
    }
}

?>