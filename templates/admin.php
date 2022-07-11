<?php
script('discoursesso', 'admin');
style('discoursesso', 'admin');

/** @var array $_ */
/** @var \OCP\IL10N $l */
?>
<div id="discoursesso" class="section">
	<h2 class="inlineblock"><?php p($l->t('Discourse SSO')); ?></h2>
	<a target="_blank" rel="noreferrer" class="icon-info" title="<?php p($l->t('Open documentation'));?>" href="https://github.com/soudis/discoursesso"></a>
	<p class="settings-hint"><?php p($l->t('Configure SSO information for Discourse')); ?></p>
	<div id="discoursesso_settings_status">
		<span id="discoursesso_settings_msg" class="msg success" style="display: none;"><?php p($l->t('Saved')); ?></span>
	</div>
	<div>
		<label>
			<span>Client Secret</span>
			<input type="text" name="discoursesso_clientsecret" class="discoursesso_clientsecret" placeholder="I_love_sso_a_lot" value="<?php p($_['clientsecret']) ?>"/>
		</label>
	</div>
	<div>
		<label>
			<span>Discourse URL</span>
			<input type="url" name="discoursesso_clienturl" class="discoursesso_clienturl" placeholder="https://discourse.yoursite.org" value="<?php p($_['clienturl']) ?>"/>
		</label>
	</div>
	<h3><?php p($l->t('Optional parameters')); ?></h3>
	<p class="settings-hint"><?php p($l->t('See documentation for further information')); ?></p>
	<div>
		<label>
			<span>Replace Whitespaces</span>
			<input type="text" name="discoursesso_replace_whitespaces" class="discoursesso_replace_whitespaces" placeholder="for usernames, group IDs (e.g. '_')" value="<?php p($_['replace_whitespaces']) ?>"/>
		</label>
	</div>
	<div>
		<label>
			<span>Extract title</span>
			<input type="text" name="discoursesso_scan_for_title" class="discoursesso_scan_for_title" placeholder="Extract title from display name (RegExp), e.g.: '/\(([^\)]*)\)/')" value="<?php p($_['scan_for_title']) ?>"/>
		</label>
	</div>
	<div>
		<label>
			<span>Avatar URL</span>
			<input type="text" name="discoursesso_avatar_url" class="discoursesso_avatar_url" placeholder="Avatar URL (example.com/avatar)" value="<?php p($_['avatar_url']) ?>"/>
		</label>
	</div>
	<div>
		<label>
			<span>Avatar URL Params</span>
			<input type="text" name="discoursesso_avatar_token" class="discoursesso_avatar_token" placeholder="URL Params (e.g. token=authtoken&v=1)" value="<?php p($_['avatar_token']) ?>" />
		</label>
	</div>
	<div>
		<label>
			<span>Avatar Force Update</span>
    		<input type="checkbox" id="discoursesso_force_update" name="discoursesso_force_update" class="checkbox discoursesso_force_update" <?php if ($_['force_update'] == "true") { echo "checked"; } ?> />
    		<label class="checkbox-label" for="discoursesso_force_update"></label>
		</label>
	</div>
	<div>
		<label>
			<span>Exclude User Groups</span>
    		<input type="checkbox" id="discoursesso_exclude_groups" name="discoursesso_exclude_groups" class="checkbox discoursesso_exclude_groups" <?php if ($_['exclude_groups'] == "true") { echo "checked"; } ?> />
			<label class="checkbox-label" for="discoursesso_exclude_groups"></label>
		</label>
	</div>
</div>
