<?php
use yii\easyii\modules\shopcart\api\Shopcart;
use yii\easyii\modules\subscribe\api\Subscribe;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

$goodsCount = count(Shopcart::goods());
?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>

<header class="site-header"><nav class="nav-header"><div class="header-top visible-desktop">
    <div class="container clearfix ">
        <div class="row ">
            <div class="col-md-12" style="font-size: small">
                <ul class="login-details clearfix pull-right">
                    <li class="switch1"><a href="?l=id">Indonesia</a> |</li>
                    <li class="switch2"><a href="?l=en">English</a></li>
                </ul>
            </div>
        </div> 
    </div>     
</div><div class="container clearfix"><a class="site-logo" href="/?l=id"><img src="/uploads/image/image/7/thumb_site-logo.png" alt="Thumb site logo" /></a><button class="btn-header"><span class="fa-icon-bars"></span></button><ul class="list-plain clearfix main-nav"><li class="main-nav_item visible-mobile" style="padding: 30px;">

  <div class="col--s6 login-details-xs" style="text-align: right;">
    <a href="?l=id">Indonesia</a> |
  </div>

  <div class="col--s6 login-details-xs" style="margin-left:2px">
    <a href="?l=en">English</a> 
  </div>

</li><li class="main-nav__item"><a anchor="#intro" class="active" href="/?l=id">Home</a></li><li class="main-nav__item"><a href="/?l=id#about">About Us</a></li><li class="main-nav__item"><a class="" href="/laporan?l=id">Laporan Keuangan</a></li><li class="main-nav__item"><a class="" href="/artikel?l=id">Berita</a></li><li class="main-nav__item"><a href="/?l=id#gallery">Gallery</a></li><li class="main-nav__item"><a class="" href="/toko?l=id">Toko Teman Ahok</a></li><li class="main-nav__item"><a class="" href="/ktpuntukahok?l=id">Kumpulkan KTP</a></li><li class="main-nav__item dropdown"><a href="/posko">POSKO</a><ul class="dropdown-menu" style="padding-bottom:20px;"><li><a href="/posko" style="height:50px">Daftar Posko</a></li><li><a href="/bukaposko" style="height:50px">Buka Posko?              </a></li></ul></li><li class="main-nav__item dropdown"><a href="#">EVENTS</a><ul class="dropdown-menu" style="padding-bottom:20px;"><li><a href="/piknik-senja" style="height:50px">Piknik Senja</a></li><li><a href="/setahunahok" style="height:50px">Setahun Ahok</a></li><li><a href="/koran/" style="height:50px">Koran Jakarta Kini                                        </a></li><li><a href="/koran-jakarta-kini2/" style="height:50px">Koran Jakarta Kini (2)</a></li></ul></li></ul></div></nav></header>

<div id="wrapper" class="container">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Url::home() ?>">Easyii shop</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <?= Menu::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['site/index']],
                            ['label' => 'About Us', 'url' => ['site/index']],
                            ['label' => 'Laporan Keuangan', 'url' => ['site/index']],
                            ['label' => 'Berita', 'url' => ['site/index']],
                            ['label' => 'Galery', 'url' => ['site/index']],
                            ['label' => 'Toko Teman Ahok', 'url' => ['site/index']],
                            ['label' => 'Kumpulan KTP', 'url' => ['site/index']],
                            ['label' => 'Posko', 'url' => ['site/index']],
                            ['label' => 'Event', 'url' => ['site/index']],

//                            ['label' => 'Shop', 'url' => ['shop/index']],
//                            ['label' => 'News', 'url' => ['news/index']],
//                            ['label' => 'Articles', 'url' => ['articles/index']],
//                            ['label' => 'Gallery', 'url' => ['gallery/index']],
//                            ['label' => 'Guestbook', 'url' => ['guestbook/index']],
//                            ['label' => 'FAQ', 'url' => ['faq/index']],
//                            ['label' => 'Contact', 'url' => ['/contact/index']],
                        ],
                    ]); ?>
                    <a href="<?= Url::to(['/shopcart']) ?>" class="btn btn-default navbar-btn navbar-right" title="Complete order">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <?php if($goodsCount > 0) : ?>
                            <?= $goodsCount ?> <?= $goodsCount > 1 ? 'items' : 'item' ?> - <?= Shopcart::cost() ?>$
                        <?php else : ?>
                            <span class="text-muted">empty</span>
                        <?php endif; ?>
                    </a>

                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php if($this->context->id != 'site') : ?>
            <br/>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])?>
        <?php endif; ?>
        <?= $content ?>
        <div class="push"></div>
    </main>
</div>
<footer>
    <div class="container footer-content">
        <div class="row">
            <div class="col-md-2">
                Subscribe to newsletters
            </div>
            <div class="col-md-6">
                <?php if(Yii::$app->request->get(Subscribe::SENT_VAR)) : ?>
                    You have successfully subscribed
                <?php else : ?>
                    <?= Subscribe::form() ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4 text-right">
                ©2015 noumo
            </div>
        </div>
    </div>
</footer>
<?php $this->endContent(); ?>
