<?php
namespace Jeurboy\Exception;

class PathException extends \Exception {
	public function __construct($message){
		parent::__construct(get_class($this)." : ".$message);
	}
}
?>