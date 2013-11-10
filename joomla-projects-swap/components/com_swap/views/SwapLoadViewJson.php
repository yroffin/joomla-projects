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

/**
 * Description of view
 *
 * @author yannick
 */
class SwapLoadViewJson extends JViewBase {

    /**
     * Render some data
     *
     * @return  string  The rendered view.
     *
     * @since   12.1
     * @throws  RuntimeException on database error.
     */
    public function render() {
        // Convert the data to JSON format.
        return json_encode($this->model->getSwap());
    }

}
