<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

    <div class="form-line">

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
<?php endif; ?>

<?php if ($showField): ?>
    <?= Form::input($type, $name, $options['value'], $options['attr']) ?>


<?php endif; ?>

<?php include 'errors.php' ?>

    </div>

    <?php include 'help_block.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
    </div>
    <?php endif; ?>

    <?php if(isset($options['note'])): ?>
    <small class="field-info form-text">
        <?php echo ($options['note']);?>
    </small>
    <?php endif;?>
<?php endif; ?>
