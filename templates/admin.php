<?php
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
			<input type="text" name="discoursesso_replace_whitespaces" class="discoursesso_replace_whitespaces" placeholder="for usernames, group IDs (e.g. '_')" value="<?php p($_['replace_whitepsaces']) ?>" style="width: 300px;" />
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
</div>
