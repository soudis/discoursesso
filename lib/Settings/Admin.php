<?php
/**
 * @copyright Copyright (c) 2016, Joas Schilling <coding@schilljs.com>
 *
 * @author Joas Schilling <coding@schilljs.com>
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
namespace OCA\DiscourseSSO\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\Settings\ISettings;

class Admin implements ISettings {
	/** @var string */
	protected $appName;
	/** @var IConfig */
	protected $config;
	/**
	 * @param string $appName
	 * @param IConfig $config
	 */
	public function __construct($appName, IConfig $config) {
		$this->appName = $appName;
		$this->config = $config;
	}
	/**
	 * @return TemplateResponse
	 */
	public function getForm() {
		$clientsecret = $this->config->getAppValue($this->appName, 'clientsecret', '');
		$clienturl = $this->config->getAppValue($this->appName, 'clienturl', '');
		$replace_whitespaces = $this->config->getAppValue($this->appName, 'replace_whitespaces', '');
		$scan_for_title = $this->config->getAppValue($this->appName, 'scan_for_title', '');
		$avatar_url = $this->config->getAppValue($this->appName, 'avatar_url', '');
		$avatar_token = $this->config->getAppValue($this->appName, 'avatar_token', '');
		$force_update = $this->config->getAppValue($this->appName, 'force_update', '');
		$exclude_groups = $this->config->getAppValue($this->appName, 'exclude_groups', '');

		return new TemplateResponse($this->appName, 'admin', [
			'clientsecret' => $clientsecret,
			'clienturl' => $clienturl,
			'replace_whitespaces' => $replace_whitespaces,
			'scan_for_title' => $scan_for_title,
			'avatar_url' => $avatar_url,
			'avatar_token' => $avatar_token,
			'force_update' => $force_update,
			'exclude_groups' => $exclude_groups,
		], 'blank');
	}
	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection() {
		return 'security';
	}
	/**
	 * @return int whether the form should be rather on the top or bottom of
	 * the admin section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 *
	 * E.g.: 70
	 */
	public function getPriority() {
		return 20;
	}
}
