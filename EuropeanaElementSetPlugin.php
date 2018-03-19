<?php
/**
 * Europeana Element Set
 *
 * @copyright Copyright 2015 Daniel Berthereau
 * @license https://www.cecill.info/licences/Licence_CeCILL_V2.1-en.html
 */

/**
 * The Europeana Element Set plugin.
 *
 * @package Omeka\Plugins\EuropeanaElementSet
 */
class EuropeanaElementSetPlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array Hooks for the plugin.
     */
    protected $_hooks = array(
        'initialize',
        'install',
        'uninstall',
        'uninstall_message',
    );

    /**
     * @var array Filters for the plugin.
     */
    protected $_filters = array(
    );

    /**
     * @var array Options and their default values.
     */
    protected $_options = array(
    );

    /**
     * Initialize this plugin.
     */
    public function hookInitialize()
    {
        // Add translation.
        add_translation_source(dirname(__FILE__) . '/languages');
    }

    /**
     * Install the plugin.
     */
    public function hookInstall()
    {
        // Load elements to add.
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elements.php';

        // Checks.
        if (isset($elementSetMetadata) && !empty($elementSetMetadata)) {
            $elementSetName = $elementSetMetadata['name'];

            // Don't install if the element set already exists.
            $elementSet = get_record('ElementSet', array('name' => $elementSetName));
            if ($elementSet) {
                throw new Omeka_Plugin_Exception('An element set by the name "' . $elementSetName . '" already exists. You must delete that element set before to install this plugin.');
            }
        }

        // Process.
        if (isset($elementSetMetadata) && !empty($elementSetMetadata)) {
            foreach ($elements as &$element) {
                $element['name'] = $element['label'];
            }
            insert_element_set($elementSetMetadata, $elements);
        }

        $this->_installOptions();
    }

    /**
     * Uninstall the plugin.
     */
    public function hookUninstall()
    {
        // Load elements to remove.
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elements.php';

        if (isset($elementSetMetadata) && !empty($elementSetMetadata)) {
            $elementSetName = $elementSetMetadata['name'];
            $this->_deleteElementSet($elementSetName);
        }

        $this->_uninstallOptions();
    }

    /**
     * Appends a warning message to the uninstall confirmation page.
     */
    public function hookUninstallMessage()
    {
        echo __('%sWarning%s: This will remove all the Europeana elements added by this plugin and permanently delete all element texts entered in those fields.%s', '<p><strong>', '</strong>', '</p>');
    }

    /**
     * Helper to remove an element set by name.
     */
    private function _deleteElementSet($elementSetName)
    {
        $elementSet = get_record('ElementSet', array('name' => $elementSetName));

        if ($elementSet) {
            $elements = $elementSet->getElements();
            foreach ($elements as $element) {
                $element->delete();
            }
            $elementSet->delete();
        }
    }
}
