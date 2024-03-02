<div class="separator separator--short"></div>
<p class="wds2-type-display-s">
    <?php echo $args['quote'] ?>
</p>
<div class="pers">
    <figure class="pers__image">
        <?php echo '<img src="' . $args['image']['url'] . '">'; ?>
    </figure>
    <div class="pers__content">
        <p class="info"><strong class="name">
                <?php echo $args['name'] ?>
            </strong><small class="role">
                <?php echo $args['role'] ?>
            </small></p>
    </div>
</div>