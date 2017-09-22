<?php
require_once 'vendor/autoload.php';

$path = array(
	'W5RW5RW2RW1R',
	'RRW11RLLW19RRW12LW1',
	'LLW100W50RW200W10',
	'LLLLLW99RRRRRW88LLLRL',
	'W55555RW555555W444444W1',
);

foreach($path as $p) {
	print "\nStart testing on path : ".$p."\n";
    $co  = new \Jeurboy\Coordinate(0,0);
    $to  = new \Jeurboy\Tokenizer($p);
	$bot = new \Jeurboy\MyBot($co);

    foreach($to->getToken() as $walk_path){
		print "We are at ";
		print_r($bot->getPosition());
		print "Head up to : ".$bot->getDirection()."\n";

		$bot->walk($walk_path);

		print "Then We walk to ".$walk_path."\n";
		print_r($bot->getPosition());
		print "Head up to : ".$bot->getDirection()."\n";
    }


	print_r($bot->getDirection());
}
?>