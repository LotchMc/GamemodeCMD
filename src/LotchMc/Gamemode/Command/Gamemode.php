<?php

namespace LotchMc\Gamemode\Command;

use LotchMc\Gamemode\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class Gamemode extends Command{

    public function __construct()
    {
        parent::__construct($this->getConfig()->get("name"), $this->getConfig()->get("description"), "/" . $this->getConfig()->get("name"), [$this->getConfig()->get("alias")]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if ($sender->hasPermission($this->getConfig()->get("gamemode.perm"))){
                if (isset($args[0])){
                    if ($args[0] === "1"){
                        $sender->setGamemode(\pocketmine\player\GameMode::CREATIVE());
                        $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("creatif.message"));
                    }
                    if ($args[0] === "0"){
                        $sender->setGamemode(\pocketmine\player\GameMode::SURVIVAL());
                        $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("survie.message"));
                    }
                    if ($args[0] === "2"){
                        $sender->setGamemode(\pocketmine\player\GameMode::ADVENTURE());
                        $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("aventure.message"));
                    }
                    if ($args[0] === "3"){
                        $sender->setGamemode(\pocketmine\player\GameMode::SPECTATOR());
                        $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("spectateur.message"));
                    }
                }else{
                    $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("usage.message"));
                }
            }else{
                $sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("notperm.message"));
            }
        }
    }

    public function getConfig()
    {
        return new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);
    }
}
