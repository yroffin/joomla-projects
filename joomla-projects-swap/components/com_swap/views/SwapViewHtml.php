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
class SwapViewHtml extends JViewHtml {

    /**
     * Redefine the model so the correct type hinting is available in the layout.
     *
     * @var     MyDatabaseModel
     * @since   12.1
     */
    protected $model;

    public function __construct(JModel $model) {
        parent::__construct($model);
        $this->paths->insert(JPATH_COMPONENT . "/views/layout", 0);
    }

}