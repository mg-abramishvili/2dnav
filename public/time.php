<?php
$date = new DateTime;
$date->setTimezone(new DateTimeZone('Europe/Moscow'));
?>
<span>
    <strong><?php echo $date->format('H:i'); ?></strong>
    <?php echo $date->format('d.m.Y'); ?>
</span>