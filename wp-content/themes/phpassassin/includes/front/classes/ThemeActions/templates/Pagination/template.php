<div class="large-12 medium-12 small-12 pagination">
    <?php foreach($this->links as $link): ?>

        <a href="<?php echo $link['link']; ?>" <?php if(isset($link['class'])): ?> class="<?php echo $link['class']; ?>" <?php endif; ?>><?php echo $link['label']; ?></a>

    <?php endforeach; ?>
</div>