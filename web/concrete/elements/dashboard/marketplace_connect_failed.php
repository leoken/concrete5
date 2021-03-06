<?
defined('C5_EXECUTE') or die("Access Denied.");
$mi = Marketplace::getInstance();
if ($mi->hasConnectionError() && $mi->getConnectionError() == Marketplace::E_MARKETPLACE_SUPPORT_MANUALLY_DISABLED) { ?>
	<p><?=t('Marketplace integration disabled in configuration file.')?></p>

<? } else {

	$h = Loader::helper('concrete/interface');
	?>
	
	<?=t('Your site is <strong>not</strong> connected to the concrete5 community.')?>
	<?
	if ($mi->hasConnectionError()) { ?>
		<div class="ccm-error"><br/>
		<?
		switch($mi->getConnectionError()) {
			case Marketplace::E_INVALID_BASE_URL:
				print t('The base URL of your site does not match a registered instance of the site. Please click below to authenticate your site again.');
				break;
			case Marketplace::E_GENERAL_CONNECTION_ERROR:
				print t('Error establishing connection to the concrete5 community. Please check that curl and other required libraries are enabled.');
				break;

	}
		?>
		</div>
		<?
	} else { ?>
		
		<?=t('Setting up a project page for your site on concrete5.org is safe and private, and gives you lots of benefits including:')?><br/>
		
		<ul>
			<li><?=t('Automatically install add-ons and themes with a mouse click.')?></li>
			<li><?=t('Ensure your software is up to date and stable.')?></li>
			<li><?=t('Get support from developers.')?></li>
			<li><?=t('And much more!')?></li>
		</ul>
		
		<?=t('It only takes a moment and you don\'t even have to leave your site.')?>
	
	<? } ?>
	
	<br/><br/>
	
	<? print $h->button(t('Connect to Community'), $this->url('/dashboard/settings/marketplace'))?>
<? } ?>