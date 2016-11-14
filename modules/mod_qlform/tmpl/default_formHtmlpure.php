<?php
/**
 * @package        mod_qlform
 * @copyright    Copyright (C) 2013 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
?>
<form method="post" action="<?php echo $action; ?>" id="mod_qlform_<?php echo $module->id; ?>" class="form-validate"
      enctype="multipart/form-data">

    <div style="display:none;"><input name="JabBerwOcky" type="text" value=""></div>
    <input name="formSent" type="hidden" value="1">
    <fieldset id="fieldset1">
        <dl class="row">
            <div class="col-sm-6">
            <!--            <dt class="jform_name col-md-3">-->
            <!--                <label id="jform_name-lbl" for="jform_name" class="required">-->
            <!--                    Name<span class="star">&nbsp;*</span></label>-->
            <!--            </dt>-->
                <dd class="jform_name">
                    <input type="text" name="jform[name]" id="jform_name" value="" placeholder="Full Name"
                           class="required" size="50"
                           required="required" aria-required="true"></dd>
                <dt class="jform_email">
<!--                    <label id="jform_email-lbl" for="jform_email" class="required">-->
<!--                        Email<span class="star">&nbsp;*</span></label>-->
                </dt>
                <dd class="jform_email">
                    <input type="email" name="jform[email]" class="validate-email required" placeholder="E-mail" id="jform_email" value=""
                           size="50" required="required" aria-required="true"></dd>
                <dt class="jform_subject">
<!--                    <label id="jform_subject-lbl" for="jform_subject" class="">-->
<!--                        Subject</label>-->
                </dt>
                <dd class="jform_subject">
                    <input type="text" name="jform[subject]" id="jform_subject" value="" placeholder="Subject" size="50"></dd>

            </div>

            <div class="col-sm-6">
<!--                <dt class="jform_message">-->
<!--                    <label id="jform_message-lbl" for="jform_message" class="required invalid">-->
<!--                        Message<span class="star">&nbsp;*</span></label>-->
<!--                </dt>-->
            <dd class="jform_message">
                <textarea name="jform[message]" id="jform_message" cols="50" rows="20" placeholder="Message" class="required invalid"
                          required="required" aria-required="true" aria-invalid="true"></textarea></dd>

                <dt class="submit"></dt>
                <dd class="submit"><input style="margin-right: 0px !important;" class="submit pull-right" type="submit" value="Submit"></dd>

                </div>
        </dl>
    </fieldset>

    <fieldset id="qlformc9f0f895fb98ab9159f51fd0297e236d" class="additionalFields">
        <dl>
            <dt class="jform_sendcopy">
                <label id="jform_sendcopy-lbl" for="jform_sendcopy" class="">
                    Send copy to me</label>
            </dt>
            <dd class="jform_sendcopy">
                <input type="checkbox" name="jform[sendcopy]" id="jform_sendcopy" value="1" checked=""></dd>
        </dl>
    </fieldset>
    <dl class="col-sm-6" style="padding-left: 0px;">
        <?php if (1 == $showCaptacha) : ?>
            <div class="control-group captcha">
                <?php if ('' != $params->get('captchalabel')) : ?>
                    <label class="control-label" for="captcha"><?php echo $params->get('captchalabel'); ?></label>
                <?php endif; ?>
                <div class="controls">

                    <?php if ('' != $params->get('captchadesc')) echo '<span>' . $params->get('captchadesc') . '</span><br />'; ?>
                    <input class="form-control input-lg" type="text" name="captcha" value=""/><br/>
                    <img id="captcha" src="<?php echo $image; ?>"/>
                </div>
            </div>
        <?php endif; ?>

    </dl>
    <input type="hidden" value="97" name="moduleId">
</form>