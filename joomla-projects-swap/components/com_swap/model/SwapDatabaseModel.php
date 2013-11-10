<?php

/**
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

/**
 * My custom database model.
 *
 * @package  Examples
 *
 * @since   12.1
 */
class SwapDatabaseModel extends JModelDatabase {

    /**
     * Get the content count.
     *
     * @return  integer
     *
     * @since   12.1
     * @throws  RuntimeException on database error.
     */
    public function getCount() {
        // Get the query builder from the internal database object.
        $q = $this->db->getQuery(true);

        // Prepare the query to count the number of content records.
        $q->select('COUNT(*)')
                ->from($q->qn('#__content'));

        $this->db->setQuery($q);

        // Execute and return the result.
        return $this->db->loadResult();
    }

}

try {
    $model = new SwapDatabaseModel;
    $count = $model->getCount();
} catch (RuntimeException $e) {
    // Handle database error.
}