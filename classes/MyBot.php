<?php
namespace Jeurboy;

class MyBot{
	private $coordinate;
	private $headup = 'north';
	private $map = array(
		'north' => array(
			'R' => 'east',
			'L' => 'west',
		),
		'east' => array(
			'R' => 'south',
			'L' => 'north',
		),
		'west' => array(
			'R' => 'north',
			'L' => 'south',
		),
		'south' => array(
			'R' => 'west',
			'L' => 'east',
		),
	);

	public function __construct(\Jeurboy\Coordinate $coordinate) {
		$this->coordinate = $coordinate;
	}
	public function getPosition(){
		return $this->coordinate->getCoordinate();
	} 
	public function walk($path){
		if($path == 'R' or $path == 'L') {
			// rotate
			$this->headup = $this->map[$this->headup][$path];

			return;
		}
		$distance = substr($path, 1);
		
		switch($this->headup) {
			case 'north' : $this->coordinate->goNorth($distance); break;
			case 'east'  : $this->coordinate->goEast($distance);  break;
			case 'west'  : $this->coordinate->goWest($distance);  break;
			case 'south' : $this->coordinate->goSouth($distance); break;

			default : throw new \Exception ("Incorrect head up");
		}
	}
	public function getDirection(){
		return $this->headup;
	}
}
?>