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
 * Demonstration of page/output callbacks
 * https://docs.moodle.org/dev/Callbacks#List_of_one-to-one_callbacks
 *
 * @package    local_page_callbacks
 * @copyright  2021 Marcus Green
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function local_page_callbacks_before_standard_html_head() {
    return "<meta name='foo' value='before_top_of_body_html' />\n";
}
/**
 * Allows customisation of the navigations elements that appear
 * in the top right with Boost including the user profile content.
 * Rather specialised and best illustrated with the local navbar plus plugin
 * https://moodle.org/plugins/local_navbarplus
 * @return string
 */
function local_page_callbacks_render_navbar_output() {
    // Note ethe quesiton mark and link that gets inserted next to the profile.
    return '<div class="localnavbarplus nav-link d-none d-sm-block"><a title="Nav Bar Plus" target="_blank" href="https://moodle.org/plugins/local_navbarplus"><i class="icon fa fa-question fa-fw" aria-label="Moodle"></i></a></div>';
}
/**
 * This enables a plugin to insert a chunk of html at
 * the start of the html document. Typical use cases include
 * some sort of alert notification,
 * It MUST return a string containing a well formed chunk of html, or
 * at minimum an empty string.
 *
 * It is possible to show only on certain pages by inspecting the PAGE object
 * @return string
 */
function local_page_callbacks_before_standard_top_of_body_html() {
    global $PAGE;
    if ($PAGE->pagetype == "course-management") {
        \core\notification::add('Course management page', \core\notification::WARNING);
    } else {
        \core\notification::add('Message for every other page', \core\notification::WARNING);
    }
}

function local_page_callbacks_before_footer() {
    global $PAGE;
    $PAGE->requires->js_init_code("alert('before_footer');");
}
