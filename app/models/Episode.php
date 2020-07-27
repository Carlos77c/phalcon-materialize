<?php


use Phalcon\Mvc\Model;

class Episode extends Model {

	private $id;
	private $name;
	private $airdate;
	private $episode;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getAirDate() {
		if(!$this->airdate){
			return '';
		}
		$airDate = new DateTime($this->airdate);
		$airDate = $airDate->format("d/m/Y");
 		return $airDate;
	}

	/**
	 * @param mixed $airdate
	 */
	public function setAirDate($airdate): void {
		$this->airdate = $airdate;
	}

	/**
	 * @return mixed
	 */
	public function getEpisode() {
		preg_match_all('/[0-9]+/', $this->episode, $output);
		$seasson = intval($output[0][0]);
		$episode = intval($output[0][1]);
		return "Season " . $seasson . " - Episode ". $episode;
	}

	/**
	 * @param mixed $episode
	 */
	public function setEpisode($episode): void {
		$this->episode = $episode;
	}

	public function createFromApi($apiepisode) : self{
		$this->setId($apiepisode->id);
		$this->setName($apiepisode->name);
		$this->setAirDate($apiepisode->air_date);
		$this->setEpisode($apiepisode->episode);
		return $this;
	}

	public function reset() {
		// TODO: Implement reset() method.
	}

}