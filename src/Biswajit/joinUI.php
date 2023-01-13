<?php

namespace Biswajit;

use onebone\economyapi\Economyapi;

use jojoe77777\FormAPI\SimpleForm;

use jojoe77777\FormAPI\CustomForm;

use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;

use pocketmine\command\Command;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerjoinEvent;

use pocketmine\utils\Config;

use pocketmine\scheduler\ClosureTask;

use pocketmine\Server;

class joinUI extends PluginBase implements Listener {

  

  public function onEnable() : void {

    $this->getLogger()->info("Join Ui By Biswajit Is Enable");

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

  }

  

  public function onJoin(PlayerjoinEvent $event){

   $player = $event->getPlayer();

   $this->joinui($player);

  }

  public function joinui(Player $player){

   $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){

      

      if($data === null){

        

            return true;

          }

       switch($data){

         case 0:

         $player->sendTitle("§l§eServer Name", "§l§aWelcome To Server");

         break;

       }

     });

     $name = $player->getName();

    $form->setTitle("§l§cWELCOME TO §l§eYour Server");

    $form->setContent("§eHello, §6$name\n\n§aWelcome To Your Server\n§dThis Is Server Type Server! There You Need Grind And Become Most Powerful Person Of This Server");

    $form->addButton("§l§bPLAY\n§l§d» §r§8Tap To Play", 0, "textures/ui/realms_slot_check");

    $form->sendToPlayer($player);

    return $form;

  }

}

  

