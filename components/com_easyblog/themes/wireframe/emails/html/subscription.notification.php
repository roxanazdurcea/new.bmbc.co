<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<tr>
    <td style="background: #55585d; color: #fff; line-height: 1; font-size: 18px; font-weight: bold; text-align: center; padding: 30px;">
        <?php echo JText::_('COM_EASYBLOG_NOTIFICATION_NEW_SUBSCRIPTION'); ?>
    </td>
</tr>

<tr>
    <td style="background: #fff; padding: 40px 100px; text-align: center">
    	<?php echo JText::sprintf('COM_EASYBLOG_NOTIFICATION_NEW_SUBSCRIPTIONS_' . strtoupper($type)); ?>
    </td>
</tr>

<tr>
    <td style="background: #fff; padding: 0 40px 40px; text-align: center">
        <div style="padding: 50px; background: #fafafa;">
            <div style="padding-top: 20px 0 40px;">
                <span style="text-decoration: none; font-weight: bold; color: #247acf;"><?php echo $subscriber;?></span>
                <div style="font-size: 14px; font-weight: bold; color: #888; letter-spacing: -.5px;">
                    <?php echo JText::_('COM_EASYBLOG_EMAIL_SUBSCRIBED_ON');?> <?php echo $subscriberDate;?>
                </div>
            </div>
        </div>
    </td>
</tr>