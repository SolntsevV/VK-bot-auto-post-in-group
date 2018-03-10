<?php

require_once "config.php";
require_once "vk.api.php";


define('VK_TOKEN',$config['token']);
$vk = new VK(VK_TOKEN);


    // Получаем список последних 10 новостей 
    $wall = $vk->request('newsfeed.get', array(
        'count' => '10', //10
        'return_banned' => '0',
    ));
	
	
	$message = strip_tags($wall['response']['items'][0]['text']);
	
	$attachments = $wall['response']['items'][0]['attachments'];
	$attach = "";
	
	if(!empty($attachments)) {
		foreach($attachments as $item) {
			$type = $item['type'];
			if($item['type'] != "link")
				$attach .= $type.$item[$type]['owner_id']."_";
			switch($type) {
				case 'photo': $attach .= $item[$type]['pid'].","; break;
				case 'doc'  : $attach .= $item[$type]['did'].","; break;
				case 'audio': $attach .= $item[$type]['aid'].","; break;
				case 'video': $attach .= $item[$type]['vid'].","; break;
				case 'link' : $message = $item['link']['title']." ".$item['link']['description'];
							$attach .= $item['link']['url'].",";
							break;
				default: $attach = "";
			}
		}
	}
	
	//Чистая запись
		$repost = $vk->request('wall.post', array(
			'owner_id' => "-".$config['group'], 'friends_only' => '0', 'from_group' => '1', 'message' => $message, 'attachments' => $attach, 
		));