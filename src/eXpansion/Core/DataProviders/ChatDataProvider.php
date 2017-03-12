<?php

namespace eXpansion\Core\DataProviders;

use eXpansion\Core\Storage\PlayerStorage;

/**
 * ChatDataProvider provides chat information to plugins.
 *
 * @package eXpansion\Core\DataProviders
 */
class ChatDataProvider extends AbstractDataProvider
{
    /** @var  PlayerStorage */
    protected $playerStorage;

    /**
     * ChatDataProvider constructor.
     *
     * @param PlayerStorage $playerStorage
     */
    public function __construct(PlayerStorage $playerStorage)
    {
        $this->playerStorage = $playerStorage;
    }

    /**
     * Called when a player chats on the server.
     *
     * @param int $playerUid
     * @param string $login
     * @param string $text
     * @param bool $isRegisteredCmd
     */
    public function onPlayerChat($playerUid, $login, $text, $isRegisteredCmd = false)
    {
        if (!$isRegisteredCmd) {
            $this->dispatch(__FUNCTION__, [$this->playerStorage->getPlayerInfo($login), $text]);
        }
    }
}