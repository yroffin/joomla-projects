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
defined('JPATH_PLATFORM') or die;

require_once(JPATH_COMPONENT . '/model/SwapDatabaseModel.php');

/**
 * Custom business model.
 *
 * @package  swap
 *
 * @since   0.1
 */
class SwapModel extends SwapDatabaseModel {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get the time.
     *
     * @return  integer
     *
     * @since   0.1
     */
    public function getTime() {
        return time();
    }

    /**
     * Method to extract the name of a discreet installation sql file from the installation manifest file.
     *
     * @param   object  $element  The XML node to process
     *
     * @return  mixed  Number of queries processed or False on error
     *
     * @since   3.1
     */
    public function setup($file, $driver, $charset) {

        $queries = array();
        $db = $this->getDb();
        $dbDriver = strtolower($db->name);

        if ($dbDriver == 'mysqli') {
            $dbDriver = 'mysql';
        }

        // Get the name of the sql file to process
        $fCharset = (strtolower($charset) == 'utf8') ? 'utf8' : '';
        $fDriver = strtolower($driver);

        if ($fDriver == 'mysqli') {
            $fDriver = 'mysql';
        }

        if ($fCharset == 'utf8' && $fDriver == $dbDriver) {
            $sqlfile = JPATH_COMPONENT_ADMINISTRATOR . "/sql/" . $file . "." . $fDriver . "." . $fCharset . ".sql";

            // Check that sql files exists before reading. Otherwise raise error for rollback
            if (!file_exists($sqlfile)) {
                JLog::add(JText::sprintf('JLIB_SWAP_ERROR_SQL_ERROR', $db->stderr(true)), JLog::WARNING, 'jerror');
                return false;
            }

            $buffer = file_get_contents($sqlfile);

            // Graceful exit and rollback if read not successful
            if ($buffer === false) {
                JLog::add(JText::_('JLIB_SWAP_ERROR_SQL_READBUFFER'), JLog::WARNING, 'jerror');

                return false;
            }

            // Create an array of queries from the sql file
            $queries = JDatabaseDriver::splitSql($buffer);

            if (count($queries) == 0) {
                // No queries to process
                return 0;
            }

            // Process each query in the $queries array (split out of sql file).
            foreach ($queries as $query) {
                $query = trim($query);

                if ($query != '' && $query{0} != '#') {
                    $db->setQuery($query);

                    if (!$db->execute()) {
                        JLog::add(JText::sprintf('JLIB_SWAP_ERROR_SQL_ERROR', $db->stderr(true)), JLog::WARNING, 'jerror');
                        return false;
                    }
                }
            }
        }

        return (int) count($queries);
    }

}
