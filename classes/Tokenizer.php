<?php 
namespace Jeurboy;

class Tokenizer {
	public function __construct($path){
		$this->path = $path;
	}

	public function getToken(){
		$return = array();
		$match  = false;

		preg_match_all('/(\S\d*)/', $this->path, $return);

		foreach($return[0] as $token) {
			$match = true;
			if($this->isValidPath($token) !== true) {
				throw new Exception\PathException ("Incorrect path");
			}
		}

		if(false === $match) {
			throw new Exception\PathException ("Incorrect path");
			exit;
		}

 		return $return[0];
	}

	public function isValidPath($path_token){
		if(preg_match('/^[W]{1}\d+$/', $path_token)) {
			return true;
		}
		if(preg_match('/^[RL]{1}$/', $path_token)) {
			return true;
		}
		return false;
	}
}
?>