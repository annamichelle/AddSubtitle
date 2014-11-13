<?php

/**
 * Add Subtitle Plugin
 *
 * @author Anna Michelle Martinez-Montavon
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 or any later version
 */

class AddSubtitlePlugin extends Omeka_Plugin_AbstractPlugin
{
	protected $_hooks = array('config', 'config_form', 'uninstall');

	/**
	 * Set the options from the config form input.
	 */
	function hookConfig($args)
	{
		set_option('field-added', $args['post']['field-added']);

		$fieldAdded = strtolower(get_option('field-added'));
		$db = get_db();
		$exhibitTable = get_db()->getTable('Exhibit');

		if ($exhibitTable->hasColumn($fieldAdded)) {
			Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->addMessage("This field already exists! Go back to 'Configure' to add a different field.", 'error');
			delete_option('field-added');
			$fieldAdded = null;
		}

		if ($fieldAdded) {
			$sql = "ALTER TABLE `omeka_exhibits` ADD COLUMN `$fieldAdded` text collate utf8_unicode_ci default NULL AFTER `title`";
			$db->query($sql);
		}
	}

	/**
	 * Display the plugin config form
	 */
	function hookConfigForm()
	{
		require dirname(__FILE__) . '/config_form.php';
	}

	function hookUninstall()
	{
		delete_option('field-added');
	}
}

?>
