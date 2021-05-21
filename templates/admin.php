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
	<p>
		<label>
			<label for="discoursesso_clientsecret" width="400" align="right">Client Secret</label>
			<input type="text" name="discoursesso_clientsecret" class="discoursesso_clientsecret" placeholder="I_love_sso_a_lot" value="<?php p($_['clientsecret']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
		<label>
			<label for="discoursesso_clienturl" width="400" align="right">Discourse URL</label>
			<input type="url" name="discoursesso_clienturl" class="discoursesso_clienturl" placeholder="https://discourse.yoursite.org" value="<?php p($_['clienturl']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
		<label>
			<label for="discoursesso_replace_whitespaces" width="400" align="right">Replace Whitespaces</label>
			<input type="text" name="discoursesso_replace_whitespaces" class="discoursesso_replace_whitespaces" placeholder="for usernames, group IDs (e.g. '_')" value="<?php p($_['replace_whitespaces']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
		<label>
			<label for="discoursesso_scan_for_title" width="400" align="right">Extract title</label>
			<input type="text" name="discoursesso_scan_for_title" class="discoursesso_scan_for_title" placeholder="Extract title from display name (RegExp), e.g.: '/\(([^\)]*)\)/')" value="<?php p($_['scan_for_title']) ?>" style="width: 300px;" />
			<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
		</label>
	</p>
	<p>
    	<label>
    		<label for="discoursesso_avatar_url" width="400" align="right">Avatar URL</label>
    		<input type="text" name="discoursesso_avatar_url" class="discoursesso_avatar_url" placeholder="Avatar URL (example.com/avatar)" value="<?php p($_['avatar_url']) ?>" style="width: 300px;" />
    		<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
    	</label>
    </p>
    <p>
        <label>
        	<label for="discoursesso_avatar_token" width="400" align="right">URL Params (without ?)</label>
        	<input type="text" name="discoursesso_avatar_token" class="discoursesso_avatar_token" placeholder="URL Params (e.g. token=authtoken&v=1)" value="<?php p($_['avatar_token']) ?>" style="width: 300px;" />
        	<img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
        </label>
    </p>
    <p>
        <label>
            <input type="checkbox" id="discoursesso_force_update" name="discoursesso_force_update" class="checkbox discoursesso_force_update" <?php if ($_['force_update']) { echo "checked"; } ?> />
            <label for="discoursesso_force_update">Enable Avatar Force Update</label>
            <img class="svg action saved-info hidden" src="/core/img/actions/checkmark.svg" title="Configuration saved">
        </label>
    </p>
</div>
