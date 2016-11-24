<?php

abstract class ActionControl {

    public function initialize($className) {
        add_action($className, [$this, 'start']);
    }

}