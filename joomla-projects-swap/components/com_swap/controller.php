<?php

/*
 *  Copyright 2012 Yannick Roffin
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *   limitations under the License.
 */
defined('JPATH_PLATFORM') or die;

jimport('joomla.application.component.controller');

require_once(JPATH_COMPONENT . '/model/SwapModel.php');

class swapController extends JControllerBase {

    /**
     * Method to execute the controller.
     *
     * @return  void
     *
     * @since   12.1
     * @throws  RuntimeException
     */
    public function execute() {
        echo ($this->factory("html")->render());
    }

    /**
     * Method to execute the controller.
     *
     * @return  void
     *
     * @since   12.1
     * @throws  RuntimeException
     */
    private function factory($format) {
        switch ($format) {
            case "html":
                require_once(JPATH_COMPONENT . '/views/SwapViewHtml.php');
                return new SwapViewHtml(new SwapModel());
            case "json":
                require_once(JPATH_COMPONENT . '/views/SwapViewJson.php');
                return new SwapViewJson(new SwapModel());
        }
    }

}
