<?php
// Help extension, https://github.com/annaesvensson/yellow-help

class YellowHelp {
    const VERSION = "0.9.5";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
