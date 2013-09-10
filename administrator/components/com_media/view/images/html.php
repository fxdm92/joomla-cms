<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_media
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * HTML View class for the Media component
 *
 * @package     Joomla.Administrator
 * @subpackage  com_media
 * @since       1.0
 */
class MediaViewImagesHtml extends JViewHtml
{
    public function render($tpl = null)
    {
        $config = JComponentHelper::getParams('com_media');
        $app = JFactory::getApplication();
        $lang = JFactory::getLanguage();
        $append = '';

        JHtml::_('behavior.framework', true);
        JHtml::_('script', 'media/popup-imagemanager.js', true, true);
        JHtml::_('stylesheet', 'media/popup-imagemanager.css', array(), true);

        if ($lang->isRTL()) {
            JHtml::_('stylesheet', 'media/popup-imagemanager_rtl.css', array(), true);
        }

        /*
         * Display form for FTP credentials?
         * Don't set them here, as there are other functions called before this one if there is any file write operation
         */
        $ftp = !JClientHelper::hasCredentials('ftp');

        $this->session = JFactory::getSession();
        $this->config = $config;
        $this->state = $this->model->getState();
        $this->folderList = $this->model->getFolderList();
        $this->require_ftp = $ftp;

		return parent::render();
    }
}