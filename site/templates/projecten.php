<?php snippet('header') ?>
    
  <div class="sceneElement" data-viewport="1">

    <section class="side left">
      
      <a href="<?= url() ?>" data-target="0"><</a>
      
    </section>
    <section class="center">
      
      <img src="" alt="" />
      
    </section>
    <section class="side right">
      <?php
      $projects = page('projecten')->children()->visible();
      ?>
      <a href="<?= $projects->first()->url() ?>" data-target="2">></a>
      
    </section>
  
    <footer class="footer cf" role="contentinfo">

        <p class="footer_content">footer content</p>
      
    </footer>

  </div>

<?php snippet('footer') ?>