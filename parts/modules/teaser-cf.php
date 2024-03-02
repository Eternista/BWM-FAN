<article class="single-teaser">
    <div class="single-teaser__image">
        <?php if ($args['page_featured_image']) { ?>
            <?php echo '<img src="' . $args['page_featured_image']['url'] . '">'; ?>
        <?php } else { ?>
            <img src="/wp-content/themes/wp-drivece/assets/images/Font.png" alt="">
        <?php } ?>
    </div>
    <div class="single-teaser__content">
        <h3>
            <?php echo $args['page_title'] ?>
        </h3>
        <p>
            <?php echo $args['page_excerpt'] ?>
        </p>
        <a target="_blank" href="<?php echo $args['page_link'] ?>" class="wds2-button wds2-button-tertiary-onlight">Read
            More</a>
    </div>
</article>