<?php
// Help extension, https://github.com/annaesvensson/yellow-help

class YellowHelp {
    const VERSION = "1.0.1";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
