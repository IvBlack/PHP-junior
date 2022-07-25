<?php
use PHPUnit\Framework\TestCase;
use App\src\Classes\TreeBuilder;


class ParseTest extends TestCase
{

    private $treeBuilder;

    protected function setUp() : void 
    {
       //$this->treeBuilder = new \App\TreeBuilder();
    }

    protected function tearDown() : void 
    {

    }

    /*
    public function testArr()
    {
        $this->treeBuilder = new \App\src\Classes\TreeBuilder();
        $this->assertObjectHasAttribute('data_i', new TreeBuilder);
    }
    */

    public function testFailure()
    {
        $this->assertTrue(true);
    }
    
}