
<?php snippet('header') ?>

  <div class="sceneElement" data-viewport="<?= $page->num() ?>">

    <section class="side left">

      <?php if($page->prev() != null): ?>
        <a href="<?= $page->prev()->url() ?>" data-target="<?= $page->num() - 1; ?>"><</a>
      <?php else: ?>
        <a href="<?= url() ?>" data-target="0"><</a>
      <?php endif; ?>

    </section>
    <section class="center">
      <div class='align_wrapper project_wrap'>
          <img class="project_img" src="<?= $page->images()->first()->url() ?>" alt="<?= $page->title()->html() ?>" />
          <div class='project_text'>
            <p><?= $page->text()->kirbytext() ?></p>
          </div>
      </div>
      <div class="button_container">

        <a href="#" class="btn-txt">txt</a>
        <a href="#" class="btn-img">img</a>

        <span class="img_counter">1/<?= count($page->images()); ?></span>
      </div>
    </section>
    <section class="side right">

      <?php if($page->next() != null): ?>
      <a href="<?= $page->next()->url() ?>" data-target="<?= $page->num() + 1; ?>">></a>
      <?php endif; ?>
      
    </section>
  
    <footer class="footer project_footer cf" role="contentinfo">

        <p class="footer_content"><?= $page->title()->text().', '.$page->location()->text().', '.$page->year()->text() ?></p>
      
    </footer>

  </div>

<?php snippet('footer') ?>