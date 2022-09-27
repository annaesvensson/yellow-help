<?php
// Help extension, https://github.com/datenstrom/yellow-extensions/tree/master/source/help

class YellowHelp {
    const VERSION = "0.8.21";
    public $yellow;         // access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
}
