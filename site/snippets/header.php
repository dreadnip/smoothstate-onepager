<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
  <meta name="description" content="<?= $site->description()->html() ?>">

  <?= css('assets/css/index.css') ?>

</head>
<body>
  <main id="main" role="main">
  
    <header role="banner">

        <div class="header_wrap">
          <a class="site_title" href="<?= url() ?>" rel="home" data-target="0"><?= $site->title()->html() ?></a>
          <a class="site_subtitle" href="<?= url() ?>" rel="home" data-target="0"><?= $site->subtitle()->html() ?></a>
        </div>

    </header>
