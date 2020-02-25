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


script('discoursesso', 'admin');
style('discoursesso', 'admin');

/** @var array $_ */
/** @var \OCP\IL10N $l */
?>
<div id="discoursesso" class="section">
	<h2 class="inlineblock"><?php p($l->t('Discourse SSO')); ?></h2>
	<p class="settings-hint"><?php p($l->t('Configure SSO information for Discourse')); ?></p>
	<p>
		<label>
			<label for="discoursesso_clientsecret" width="350" align="right">Client Secret</label>
			<input type="text" name="discoursesso_clientsecret" class="discoursesso_clientsecret" placeholder="I_love_sso_a_lot" value="<?php p($_['clientsecret']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
		<label>
			<label for="discoursesso_clienturl" width="350" align="right">Discourse URL</label>
			<input type="url" name="discoursesso_clienturl" class="discoursesso_clienturl" placeholder="https://discourse.yoursite.org" value="<?php p($_['clienturl']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
		<label>
			<label for="discoursesso_replace_whitespaces" width="350" align="right">Replace Whitespaces</label>
			<input type="text" name="discoursesso_replace_whitespaces" class="discoursesso_replace_whitespaces" placeholder="for usernames, group IDs (e.g. '_')" value="<?php p($_['replace_whitepsaces']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>	
	<p>
		<label>
			<label for="discoursesso_scan_for_title" width="350" align="right">Scan for title in name (RegExp)</label>
			<input type="text" name="discoursesso_scan_for_title" class="discoursesso_scan_for_title" placeholder="e.g. text in paranthesis: '/\(([^\)]*)\)/')" value="<?php p($_['scan_for_title']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>		
</div>
