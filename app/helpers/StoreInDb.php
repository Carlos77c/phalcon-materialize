<?php

declare(strict_types=1);

use Phalcon\Mvc\Model;

class StoreInDb {

	public function __invoke($episodes) {

		foreach($episodes as $apiepisode){
			$episode = new Episode();
			$episode = $episode->createFromApi($apiepisode);
			$episode->save();
		}

	}

}