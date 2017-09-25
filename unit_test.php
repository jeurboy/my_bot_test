<?php
require_once 'vendor/autoload.php';
class BotTest extends PHPUnit_Framework_TestCase
{
    private $test_path;
    public function setUp(){
        $this->test_path = array(
            'W5RW5RW2RW1R',
            'RRW11RLLW19RRW12LW1',
            'LLW100W50RW200W10',
            'LLLLLW99RRRRRW88LLLRL',
            'W55555RW555555W444444W1',
            '',
        );
    }
    public function tearDown(){}

    public function testGetCoordinate() {
        $co = new \Jeurboy\Coordinate(10,10);
        
        $this->assertEquals(array(10, 10), $co->getCoordinate());

        $co = new \Jeurboy\Coordinate(0, 0);
        
        $this->assertNotEquals(array(10, 10), $co->getCoordinate());
    }
    public function testTokenizer() {
        $to = new \Jeurboy\Tokenizer($this->test_path[0]);
        $return = $to->getToken();

        $this->assertEquals(array(
            'W5', 'R', 'W5', 'R', 'W2', 'R' , 'W1', 'R'
        ), $return);
    }
    /**
     * @expectedException Jeurboy\Exception\PathException
     */
    public function testTokenizerException() {
        $to = new \Jeurboy\Tokenizer("RLWN");
        $to->getToken();

        $to = new \Jeurboy\Tokenizer("");
        $to->getToken();
    }
    public function testMyBot() {
        $co = new \Jeurboy\Coordinate(0,0);
        $bot = new \Jeurboy\MyBot($co);
        
        // print_r($bot->getPosition());

        $bot->walk('R');
        $this->assertEquals('east', $bot->getDirection());

        $bot->walk('R');
        $this->assertEquals('south', $bot->getDirection());

        $bot->walk('L');
        $this->assertEquals('east', $bot->getDirection());

        $bot->walk('L');
        $bot->walk('L');
        $this->assertEquals('west', $bot->getDirection());

        // print_r($bot->getPosition());
        $bot->walk('W10');
        // print_r($bot->getPosition());
        $this->assertEquals(array(-10, 0), $bot->getPosition());
    }
}

?>