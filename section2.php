<?php
require_once 'vendor/autoload.php';

$path = $argv[1];

$co  = new \Jeurboy\Coordinate(0,0);
$bot = new \Jeurboy\MyBot($co);

$to  = new \Jeurboy\Tokenizer($path);

try{
	foreach($to->getToken() as $walk_path){
		$bot->walk($walk_path);
	}

	list($X, $Y) = $bot->getPosition();
	print "X: $X Y: $Y Direction: ".$bot->getDirection()."\n";
} catch(\Exception $e){
	echo $e->getMessage()."\n";
}
?>