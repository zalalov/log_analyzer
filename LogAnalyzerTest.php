<?php

require_once "LogAnalyzer.php";

/**
 * Class LogAnalyzerTest
 */
class LogAnalyzerTest extends PHPUnit_Framework_TestCase {
    /**
     * Analyzer's stats validation
     */
    public function testStats() {
        $input = "hello world\ngood morning\nhappy new year";
        $result = [
            "h" => 2,
            "g" => 1
        ];

        $la = new LogAnalyzer();

        foreach (explode("\n", $input) as $line) {
            $la->process($line);
        }

        // Valid value
        $this->assertEquals($result, $la->getStats());

        // Empty string
        $la = new LogAnalyzer();
        $la->process("");
        $this->assertNull(null, $la->getStats());

        // Number
        $la = new LogAnalyzer();
        $la->process(1);
        $this->assertNull(null, $la->getStats());

        // Null
        $la = new LogAnalyzer();
        $la->process(null);
        $this->assertNull(null, $la->getStats());

        // Mix of valid and invalid values
        $la = new LogAnalyzer();
        $la->process(null);
        $la->process("hello");
        $this->assertEquals(["h" => 1], $la->getStats());
    }
}