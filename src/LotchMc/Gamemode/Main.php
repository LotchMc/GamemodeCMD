<?php

namespace LotchMc\Gamemode;

use LotchMc\Gamemode\Command\Gamemode;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    public static Main $instance;

    public function onEnable(): void
    {
        self::$instance = $this;
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
        $this->getLogger()->info("§6Valdoria §f a été chargé avec succès !");

        $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("gamemode"));
        $this->getServer()->getCommandMap()->register("", new Gamemode());
    }

    public static function getInstance() : Main{
        return self::$instance;
    }
}