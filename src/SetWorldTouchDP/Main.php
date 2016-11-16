<?php

namespace SetWorldTouchDP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\block\Block
use pocketmine\utils\TextFormat as Color;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class TouchEvent extends PluginBase implements Listener{
  
  public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getLogger()->info(Color::GREEN."Plugin Is On");
		@mkdir($this->getDataFolder());
		$worlds = [
		
				'world' => 'world',
		
		];
		$cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML,$worlds);
		$cfg->save();
	}
  
  public function onDisable(){
		$this->getConfig()->save();
	}
  
  public function onCommand(CommandSender $sender, Command $cmd, $lable, array $args){
		switch($cmd->getName()){
			case 'setworld':
				$world = $sender->getLevel()->getName();
        
				$this->getConfig()->set("world", $world);
        
        $sender->sendMessage("World Name $world");
        break;
        }
	}
}

public function onTouch(PlayerInteractEvent $event){
	  $player = $event->getPlayer();
	  $block = $event->getBlock()->getId();
	  $name = $player->getName();
    $world = $this->getConfig()->get("world");
    $all = $this->getServer()->getLevelByName("$world")->getPlayers();
  
    foreach($all as $p){
      if($block == id){
        $p->sendMessage("You Touch Block");
      }
    }
	  }
	}
}
