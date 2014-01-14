<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/11/14
 * Time: 10:26 PM
 */

namespace WikiLingo\Expression\PastLink;

use FLP as FutureLinkProtocol;

class Sender
{
	public static $debug = false;

	public static function Setup()
	{
		$debug = self::$debug;

		FutureLinkProtocol\Events::bind(new FutureLinkProtocol\Event\Send(function($url, $params, &$result) use ($debug) {
			if ($_POST['continue']) {
				foreach($params as $key => $param) {
					$_POST[$key] = $param;
				}

				//require_once 'receiver.php';
				$result = ob_get_clean();
				print_r($result);
			} else {
				$communicator = new FutureLinkProtocol\Communicator($url, $params);
				$result = $communicator->result;
				$json = json_decode($result);
				if ($json != null) {
					$json->info = $communicator->info;
				}

				if ($debug) {
					if ($json == null) {
						echo str_replace('\/', '/', $result);
					} else {
						echo $json->debug;
					}
				}
			}
		}));
	}
} 