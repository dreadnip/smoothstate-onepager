<?php snippet('header') ?>
  
  <div class="sceneElement" data-viewport="-2">

    <section class="side left">
      
    </section>
    <section class="center">
        <h1><?= $page->title()->kirbytext() ?></h1>
        <h3><?= $page->intro()->kirbytext() ?></h3>
        <p><?= $page->text()->kirbytext() ?></p>
    </section>
    <section class="side right">

      <a href="<?= url() ?>"  data-target="0">Home</a>
      
    </section>

    <footer class="footer cf" role="contentinfo">

    </footer>

  </div>

<?php snippet('footer') ?>