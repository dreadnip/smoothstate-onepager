<?php snippet('header') ?>
  
  <div class="sceneElement" data-viewport="0">

    <section class="side left">
      
      <a href="<?= url() ?>/bureau" data-target="-1">Bureau</a>
      
    </section>
    <section class="center">
      <div class='align_wrapper'>
        <img src="<?= url('content/home/').$page->cover() ?>" alt="<?= $page->title()->html() ?>" />
      </div>
    </section>
    <section class="side right">
      
      <?php
      $projects = page('projecten')->children()->visible();
      ?>
      <a href="<?= $projects->first()->url() ?>" data-target="1">Projecten</a>
      
    </section>

    <footer class="footer cf" role="contentinfo">

        <p class="footer_content"><?= $page->description() ?></p>
        <p class="footer_content_m"><a href="<?= url() ?>/bureau">Contact</a></p>
    </footer>

  </div>

<?php snippet('footer') ?>