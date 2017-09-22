<?php 
namespace Jeurboy;

class Coordinate{
	public function __construct(int $x, int $y) {
		$this->co_x = $x;
		$this->co_y = $y;
	}

	public function getCoordinate() {
		return array($this->co_x , $this->co_y);
	}

	public function goNorth($distance){ $this->co_y += $distance; }
	public function goSouth($distance){ $this->co_y -= $distance; }
	public function goEast($distance) { $this->co_x += $distance; }
	public function goWest($distance) { $this->co_x -= $distance; }
}
?>