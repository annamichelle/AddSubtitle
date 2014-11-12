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

		if (!get_option('field-added')) {
			echo 'Please enter a field to add';
		}
		/*elseif (get_option('field-added')) {
			# code...
		}*/
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
