<div class="col-lg-7 col-12">
    <blockquote class="sec--text-image__content">
        <div class="separator separator--short"></div>
        <h2 class="wds2-type-display-l">
            <?php echo $args['title'] ?>
        </h2>
        <?php echo $args['description'] ?>
        <a href="<?php echo $args['button_url'] ?>" class="wds2-button wds2-button-tertiary-onlight"><?php echo $args['button_text'] ?></a>
    </blockquote>
</div>
<div class="col-lg-5 col-12 sec--text-image__image">
    <?php if ($args['image']) { ?>
        <?php echo '<img src="' . $args['image']['url'] . '">'; ?>
    <?php } else { ?>
        <img src="/wp-content/themes/wp-drivece/assets/images/Font.png" alt="">
    <?php } ?>
</div>