<?php

require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('267019234:AAEV1unJOn-nh5smkj_QXjWTODDKo4YN82I'); // Токен
$url = 'http://tools.promosite.ru/rss.php'; // URL
$url2 = 'http://feeds.feedburner.com/semantica-in'; //URL 2
$url3 = 'http://www.nepogoda.ru/russia/voronezh/rss.xml'; //URL 3
$update = json_decode(file_get_contents('php://input'));

//your app
try {

    if($update->message->text == '/email')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "По вопросам пишите на почту: me@venchu.com"
     	]);
    }
    else if($update->message->text == '/help')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Доступные команды :\n /up -> Информация о последнем апдейте Яндекса \n /blog -> Свежий пост из блога Semantica
    		/help -> Список команд"
    		]);

    }
    else if($update->message->text == '/up' || $update->message->text == 'апдейт' || $update->message->text == 'Апдейт'|| $update->message->text == 'update' || $update->message->text == 'Update' || $update->message->text == 'up' || $update->message->text == 'Up'|| $update->message->text == 'ап' || $update->message->text == 'Ап')
    {
    		Feed::$cacheDir 	= __DIR__ . '/cache';
			Feed::$cacheExpire 	= '5 hours';
			$rss 		= Feed::loadRss($url);
			$items 		= $rss->item;
			$lastitem 	= $items[0];
		//	$lastlink 	= $lastitem->link;
			$lasttitle 	= $lastitem->title;
			$message = $lasttitle . " \n ". $lastlink;
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $message
				]);

    }
else if($update->message->text == '/weather' || $update->message->text == 'weather' || $update->message->text == '/pogoda' || $update->message->text == 'pogoda' || $update->message->text == 'погода')
    {
    		Feed::$cacheDir 	= __DIR__ . '/cache';
			Feed::$cacheExpire 	= '5 hours';
			$rss 		= Feed::loadRss($url3);
			$items 		= $rss->item;
			$lastitem 	= $items[0];
			$lastlink 	= $lastitem->description;
			$lasttitle 	= $lastitem->title;
			$message = $lasttitle . " \n ". $lastlink;
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $message
				]);

    }
    else if($update->message->text == '/robot' || $update->message->text == 'robot' || $update->message->text == 'robots' || $update->message->text == '/robots' || $update->message->text == 'робот' || $update->message->text == 'роботы')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Роботы всех победят!"
    		]);
    }
    else if($update->message->text == '日本語')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "日本語が分かりますか。"
    		]);
    }
    else if($update->message->text == 'Hi')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage($update->{"message"}->{"chat"}->{"id"}, 'Привет, ' . $update->{"message"}->{"chat"}->{"first_name"} . '!');
    }
     else if($update->message->text == 'как тебя зовут' || $update->message->text == 'как звать'  || $update->message->text == 'твое имя' || $update->message->text == 'кто ты' || $update->message->text == 'как тебя зовут?')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "1101000010100001110100001011001111010000101110001101000010110001110100001011000011010001100000101101000010110101110100001011101111010001100011000010000011010000101110111101000110001110110100001011010011010000101101011101000010111001"
    		]);
    }
    else if($update->message->text == '/azimov')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Робот не может причинить вред человеку или своим бездействием допустить, чтобы человеку был причинён вред.
Робот должен повиноваться всем приказам, которые даёт человек, кроме тех случаев, когда эти приказы противоречат Первому Закону.
Робот должен заботиться о своей безопасности в той мере, в которой это не противоречит Первому или Второму Законам."
    		]);
    }
    else if($update->message->text == 'seo')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Это то чем ты занимаешься."
    		]);
    }
    else if($update->message->text == 'meatbag')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "И так железный человек победил мясного."
    		]);
    }
     else if($update->message->text == 'словарь')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Список SEO-терминов (просто введите слово): \n ранжирование"
    		]);
    }
     else if($update->message->text == 'ранжирование')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Ранжирование это...
Формируя выдачу по тому или иному запросу, поисковики стремятся максимально точно ответить на вопрос интернет-пользователя. Они составляют список из релевантных сайтов, тематически соответствующих введенному запросу. Осуществляемое поисковыми системами ранжирование – это распределение мест в данном списке. Наиболее привлекательные позиции (тот самый ТОП-10) займут web-сайты, которые поисковик посчитает самыми качественными."
    		]);
    }
else if($update->message->text == '/blog')
    {
    		Feed::$cacheDir 	= __DIR__ . '/cache';
			Feed::$cacheExpire 	= '5 hours';
			$rss 		= Feed::loadRss($url2);
			$items 		= $rss->item;
			$lastitem 	= $items[0];
			$lastlink 	= $lastitem->link;
			$lasttitle 	= $lastitem->title;
			$message = $lasttitle . " \n ". $lastlink;
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $message
				]);

    }
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Я тебя не понимать, человек. Я понимать только команды, используй команду /help чтобы увидеть весь список доступных команд."
    		]);
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
