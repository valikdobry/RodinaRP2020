<?php
namespace app\forms; // НЕ ТРОГАТЬ


use bundle\windows\Registry; // НЕ ТРОГАТЬ
use bundle\windows\Windows; // НЕ ТРОГАТЬ
use std, gui, framework, app; // НЕ ТРОГАТЬ

class MainForm extends AbstractForm
{
    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null) // При открытии
    {
        $nick_name = Registry::of('HKEY_CURRENT_USER\Software\www.gtasrv.ru\CR-MP\GenerationC')->read('player_name')->value; // НЕ ТРОГАТЬ
        Element::setText($this->edit, $nick_name); // НЕ ТРОГАТЬ
        
        $game_path = Registry::of('HKEY_CURRENT_USER\Software\www.gtasrv.ru\CR-MP\GenerationC')->read('game_path')->value; // НЕ ТРОГАТЬ
        if($game_path) // НЕ ТРОГАТЬ
            return Element::setText($this->label3, 'Путь указан'); // НЕ ТРОГАТЬ
    }

    /**
     * @event button6.click-Left 
     */
    function doButton6ClickLeft(UXMouseEvent $e = null) // Закрыть
    {    
        app()->shutdown(); // НЕ ТРОГАТЬ
    }


    /**
     * @event buttonAlt.click-Left 
     */
    function doButtonAltClickLeft(UXMouseEvent $e = null) // Играть
    {
        $ip = '185.189.15.22'; // Ваш IP адрес
        $port = '2707'; // Порт вашего IP адреса
        
        $game_path = Registry::of('HKEY_CURRENT_USER\Software\www.gtasrv.ru\CR-MP\GenerationC')->read('game_path')->value; // НЕ ТРОГАТЬ
        $player_name = $this->edit->text; // НЕ ТРОГАТЬ
        
        Registry::of('HKEY_CURRENT_USER\Software\www.gtasrv.ru\CR-MP\GenerationC')->add('player_name', $player_name); // НЕ ТРОГАТЬ
        execute("$game_path $ip:$port", false); // НЕ ТРОГАТЬ
        app()->shutdown(); // НЕ ТРОГАТЬ
    }



    











}
