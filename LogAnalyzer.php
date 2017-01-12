<?php

/**
 * Class LogAnalyzer
 */
class LogAnalyzer {
    /**
     * Letter and value distribution
     * @var null
     */
    private $_letters = null;

    /**
     * Returns stats
     * @return array
     * @throws Exception
     */
    public function getStats() {
        return $this->_letters;
    }

    /**
     * Process text line
     * @param $line
     */
    public function process($line) {
        if (is_string($line) && isset($line[0]) && trim($line[0]) != null) {
            if (!isset($this->_letters[$line[0]])) {
                $this->_letters[$line[0]] = 0;
            }

            $this->_letters[$line[0]]++;
        }
    }
}
