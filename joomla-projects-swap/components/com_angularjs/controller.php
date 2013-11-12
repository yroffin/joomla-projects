<?php

/*
 * Copyright 2013 yannick.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Description of controller
 *
 * @author yannick
 */
class AngularJsController extends JControllerBase {

    protected $defaultView;

    /**
     * Method to execute the controller.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    public function execute() {
        // Setup service.
        $this->service = $this->input->getCmd("service");
        if (isset($this->service)) {
            $this->svc($this->input->getCmd("service"), $this->input->getCmd("method"));
        } else {
            // Setup view.
            $this->view = $this->input->getCmd("view");
            if (!isset($this->view)) {
                $this->view = $this->defaultView;
            }
            // Setup format.
            $this->format = $this->input->getCmd("format");
            if (!isset($this->format)) {
                $this->format = "html";
            }
            // Render view.
            echo ($this->factory($this->view . '#' . $this->format, $this->input)->render());
        }
    }

    /**
     * Method to execute the controller.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    private function svc($svc, $method) {
        ob_start();
        echo ($this->factory($svc . 'Service#json', $this->input)->$method());
        echo ob_get_clean();
    }

    /**
     * View factory.
     *
     * @return  void
     *
     * @since   0.1
     * @throws  RuntimeException
     */
    protected function factory($format, $input) {

    }

}
