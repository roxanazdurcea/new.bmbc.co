ALTER TABLE `#__easyblog_post` ADD `send_notification_emails` TINYINT( 1 ) NOT NULL DEFAULT '1';
ALTER TABLE `#__easyblog_drafts` ADD `send_notification_emails` TINYINT( 1 ) NOT NULL DEFAULT '1';