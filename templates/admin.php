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

/** @var array $_ */
/** @var \OCP\IL10N $l */
?>
<div id="discoursesso" class="section">
	<h2 class="inlineblock"><?php p($l->t('Discourse SSO')); ?></h2>
	<p class="settings-hint"><?php p($l->t('Configure SSO information for Discourse')); ?></p>

	<p>
		<label>
			<span>Client Secret</span>
			<input type="text" name="discoursesso_clientsecret" class="discoursesso_clientsecret" value="<?php p($_['discoursesso_clientsecret']) ?>" style="width: 320px;" />
		</label>
	</p>
	<p>
		<label>
			<span>Discourse URL</span>			
			<input type="url" name="discoursesso_clienturl" class="discoursesso_clienturl" value="<?php p($_['discoursesso_clienturl']) ?>" style="width: 320px;" />
		</label>
	</p>
</div>