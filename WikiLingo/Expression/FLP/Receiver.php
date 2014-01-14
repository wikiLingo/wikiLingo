<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/11/14
 * Time: 10:27 PM
 */

namespace WikiLingo\Expression\FLP;

use FLP as FutureLinkProtocol;

class Receiver
{
	public static $debug;

	public static function Receive()
	{
		ob_start();

		if (isset($_POST['protocol']) && $_POST['protocol'] == 'futurelink' && isset($_POST['metadata'])) {

			//here we do the confirmation that another wiki is trying to talk with this one
			$metadata = json_decode($_POST['metadata']);

			foreach($metadata->feed->items as $item) {
				$pair = new FutureLinkProtocol\Pair($item->past, $item->future);

				$pair->origin = (isset($_POST['REMOTE_ADDR']) ? $_POST['REMOTE_ADDR'] : '');
				$response = new FutureLinkProtocol\Response();
				$pairReceived = new FutureLinkProtocol\PairReceived();

				if ($pairReceived->addItem($pair) == true) {
					if ($foundPair = R::findOne('pair',' title = ? ', array($pairReceived->revision->name))) {
						$response->response = 'exists';
					} else {
						try {
							$articlePair = R::dispense('pair');
						} catch (Exception $e) {
							echo $e;
						}
						$articlePair->title = $pairReceived->revision->name;
						$pairAsJson = json_encode($pair);
						$articlePair->pair = $pairAsJson;
						R::store($articlePair);
						$response->response = 'success';
					}
				} else {
					$response->response = 'failure';
				}

				$feed = $response->feed($_SERVER['REQUEST_URI']);

				if (
					$response->response == 'failure'
				) {
					$feed->reason = $pairReceived->security->verifications;
				}

				if (self::$debug) {
					$feed->debug = ob_get_clean();
				}
				echo json_encode($feed);
			}

			if (!isset($_POST['continue'])) {
				exit();
			}
		}
	}
} 