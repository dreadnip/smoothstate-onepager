<?php snippet('header') ?>
    
  <div class="sceneElement" data-viewport="-1">

    <section class="side left">
      
      
    </section>
    <section class="center">
      <div class="bureau_box">
  
        <?php foreach($page->inhoud()->yaml() as $bureau_item): ?>
            <span id="<?= strtolower($bureau_item['title']) ?>"><?= $bureau_item['title'] ?></span>
            <p><?= kirbytext($bureau_item['description']) ?></p>
        <?php endforeach; ?>

      </div>
    </section>
    <section class="side right">
      
      <a href="<?= url() ?>" data-target="0">></a>
      
    </section>

    <footer class="footer cf" role="contentinfo">

        <div class="subnav">    
          <ul>
            <?php foreach($page->inhoud()->yaml() as $bureau_item): ?>
                <li><a href="#<?= strtolower($bureau_item['title']) ?>" class="activenot"><?= strtolower($bureau_item['title']) ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      
    </footer>

  </div>

<?php snippet('footer') ?>