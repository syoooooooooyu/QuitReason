<?php

namespace apartkktrain\quitreason;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getLogger()->info("----------------------");
        $this->getLogger()->info("quitplugin構築完了 BY APARTKKTRAIN。");
        $this->getLogger()->info("----------------------");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onquit(PlayerQuitEvent $event)
    {
    	$reason = $event->getQuitReason();
    	$name = $event->getPlayer()->getName();
    	if ($reason === 'client disconnect') {
    		$event->setQuitMessage("§6[§b退室§6]§a{$name}が自らの意思で退室しました。");
    	}elseif ($reason === 'timeout') {
    		$event->setQuitMessage("§6[§b退室§6]§a {$name} がタイムアウトにより退室しました。");
    	}elseif ($reason === 'Internal server error') {
    		$event->setQuitMessage("§6[§b退室§6]§a {$name} がサーバーエラーにより退室しました。\n§4サーバー管理者又は開発者まで報告をお願いします。");	
    	}
    }
}
