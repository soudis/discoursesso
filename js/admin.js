/**
 * @copyright Copyright (c) 2017, florian humer <florian.humer@gmail.com>
 *
 * @author Florian Humer <florian.humer@gmail.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

$(document).ready(function() {
	var $msg = $('#discoursesso_settings_msg');
	var $secret = $('#discoursesso').find('.discoursesso_clientsecret');
	var $url = $('#discoursesso').find('.discoursesso_clienturl');
	var $replace_whitespaces = $('#discoursesso').find('.discoursesso_replace_whitespaces');
	var $scan_for_title = $('#discoursesso').find('.discoursesso_scan_for_title');
	var $avatar_url = $('#discoursesso').find('.discoursesso_avatar_url');
	var $avatar_token = $('#discoursesso').find('.discoursesso_avatar_token');
	var $force_update = $('#discoursesso').find('.discoursesso_force_update');
	var $exclude_groups = $('#discoursesso').find('.discoursesso_exclude_groups');

	$secret.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'clientsecret', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$url.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'clienturl', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$replace_whitespaces.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'replace_whitespaces', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$scan_for_title.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'scan_for_title', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$avatar_url.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'avatar_url', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$avatar_token.change(function(event) {
		var value = event.target.value;
		OC.AppConfig.setValue('discoursesso', 'avatar_token', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$force_update.change(function(event) {
		var value;
		if (event.target.checked) {
			value = "true"
		} else {
			value = "false"
		}
		OC.AppConfig.setValue('discoursesso', 'force_update', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});

	$exclude_groups.change(function(event) {
		var value;
		if (event.target.checked) {
			value = "true"
		} else {
			value = "false"
		}
		OC.AppConfig.setValue('discoursesso', 'exclude_groups', value);
		$msg.show(0).delay(500).fadeOut('slow');
	});	
});
