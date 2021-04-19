<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin version and other meta-data are defined here.
 *
 * @package     local_page_callbacks
 * @copyright   2021 Marcus Green
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
$PAGE->navbar->add(get_string('callbacks', 'local_page_callbacks'));

$PAGE->set_context(context_system::instance());
$output = $PAGE->get_renderer('admin');
$PAGE->set_url('/local/index.php');

echo $OUTPUT->header();

?>


<html>
    <head>
        <p>This plugin shows how the editing forms of activity
            modules can be modified without changing core code.
            Go to a course and start the editing form of the assignment
            module and you will see a new field (Examplefield) at the bottom.
        </p>
    </head>
</html>
<?php
echo $OUTPUT->footer();
?>