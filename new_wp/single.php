<!DOCTYPE html>
<html lang="ja">
  <?php get_header(); ?>
  <body>
  <style>
  .mdl-card__body {
    padding: 20px 5%;
    font-size: 1rem;
  }

  .mdl-card.mdl-shadow--2dp.article {
      width: 100%;
      margin-top: 19px;
  }

  .article .mdl-card__body h2 {
      font-size: 2rem;
      border-bottom: 1px solid;
      line-height: 2.5rem;
      margin-bottom: 10px;
  }

  .article .mdl-card__body h3 {
      font-size: 1.5rem;
      line-height: 2.5rem;
      margin-bottom: 10px;
      font-weight: bold;
      color: rgba(130,130,130,0.7);
  }
  .article {
      padding: 24px;
  }
  </style>

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header show">
    <header class="mdl-layout__header custom">
      <!-- drawer_toggle_buttonのみ -->
    </header>
    <?php get_template_part('shared/show_drawer'); ?>

    <main class="mdl-layout__content">
      <!-- wordpressループ -->
      <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
            <!-- first view -->
            <?php
              if (has_post_thumbnail()){
                $thumbnail_id = get_post_thumbnail_id();
                $url = wp_get_attachment_image_src( $thumbnail_id, 'large' )[0];
              } else {
                $url = "https://www.getmdl.io/templates/blog/images/road.jpg"; // default
              }
            ?>
              <div class="bigbox mdl-shadow--3dp" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url('<?php echo $url; ?>') center / cover">
                <div class="bigbox-inner-upper clearfix">
                  <div class="site-logo">
                    <span class="logo"><a class="logo-inner" href="<?php echo home_url(); ?>">< Project Name/></a></span>
                  </div>
                  <div class="sns-buttons">
                    <span class="sns-button white"><i class="fa fa-facebook"></i></span>
                    <span class="sns-button white"><i class="fa fa-twitter"></i></span>
                    <span class="sns-button white hatena"></span>
                    <!-- <span class="sns-button white"><i class="fa fa-get-pocket"></i></span> -->
                  </div>
                </div>
                <div class="bigbox-inner">
                  <h1 class="title"><?php echo get_the_title(); ?></h1>
                  <ul class="tags">
                    <?php if (has_tag()): ?>
                      <?php $tags = get_the_tags();?>
                      <?php foreach($tags as $i => $t): ?>
                        <a href="#"><li href="#" class="tag tag--sm tag--transparent-white tag--no-border"><?php echo $t->name; ?></li></a>
                        <?php if ( $i != $tags->length-1 ):?>
                          <span class="splitter">/</span>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                  <span class="date"><?php echo get_the_date("Y.n.j(D)"); ?></span>
                </div>
              </div>
            <!-- first view -->

            <!-- content -->
            <div class="content-center narrow">
              <div class="article">
                <?php get_template_part('shared/article_body'); ?>
                <?php get_template_part('shared/article_footer'); ?>
              </div>
              <h2 class="related-title">前後の記事</h2>
              <div class="related mdl-grid">
                <?php if (!empty(get_previous_post())): ?>
                  <?php
                    $id = get_previous_post()->ID;
                    if (has_post_thumbnail('', $id)){
                      $thumbnail_id = get_post_thumbnail_id($id);
                      $url = wp_get_attachment_image_src( $thumbnail_id, 'large' )[0];
                    } else {
                      $url = "https://www.getmdl.io/templates/blog/images/road.jpg"; // default
                    }
                  ?>
                  <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet before">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <a href="<?php echo get_previous_post()->guid ?>">
                      <div class="card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url('<?php echo $url; ?>') center / cover">
                          <div class="mdl-card__media--inner">
                            <p class="desc date">
                            <span class="desc--inner"><?php
                              $previous_post_published_date = new DateTime(get_previous_post()->post_date);
                              echo $previous_post_published_date->format('Y.n.j(D)')
                            ?></span>
                            </p>
                            <h2 class="title"><?php echo get_previous_post()->post_title ?></h2>
                            <div class="tags">
                              <?php if (has_tag('', $id)): ?>
                                <?php $tags = get_the_tags($id);?>
                                <?php foreach($tags as $i => $t): ?>
                                  <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover"><?php echo $t->name ?></span>
                                  <?php if ( $i != $tags->length-1 ):?>
                                    <span class="splitter">/</span>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php endif; ?>
                <?php if (!empty(get_next_post())): ?>
                  <?php
                    $id = get_next_post()->ID;
                    if (has_post_thumbnail('', $id)){
                      $thumbnail_id = get_post_thumbnail_id($id);
                      $url = wp_get_attachment_image_src( $thumbnail_id, 'large' )[0];
                    } else {
                      $url = "https://www.getmdl.io/templates/blog/images/road.jpg"; // default
                    }
                  ?>
                  <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet after">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <a href="<?php echo get_next_post()->guid ?>">
                      <div class="card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__media" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url('<?php echo $url; ?>') center / cover">
                          <div class="mdl-card__media--inner">
                            <p class="desc date">
                              <span class="desc--inner"><?php
                                $next_post_published_date = new DateTime(get_next_post()->post_date);
                                echo $next_post_published_date->format('Y.n.j(D)')
                              ?></span>
                            </p>
                            <h2 class="title"><?php echo get_next_post()->post_title ?></h2>
                            <div class="tags">
                              <?php if (has_tag('', $id)): ?>
                                <?php $tags = get_the_tags($id);?>
                                <?php foreach($tags as $i => $t): ?>
                                  <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover"><?php echo $t->name ?></span>
                                  <?php if ( $i != $tags->length-1 ):?>
                                    <span class="splitter">/</span>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                <?php endif; ?>
              </div>
              <!-- <h2 class="related-title">関連記事</h2>
              <div class="related mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                  <div class="card mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media">
                      <div class="mdl-card__media--inner">
                        <p class="desc date">
                          <span class="desc--inner">2016.2.14(Fri)</span>
                        </p>
                        <h2 class="title">Railsでrelationを使いつつransackを高速に回すtipsRailsでrelationを使いつつransackを高速に回すtips</h2>
                        <div class="tags">
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                  <div class="card mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media">
                      <div class="mdl-card__media--inner">
                        <p class="desc date">
                          <span class="desc--inner">2016.2.14(Fri)</span>
                        </p>
                        <h2 class="title">Railsでrelationを使いつつransackを高速に回すtipsRailsでrelationを使いつつransackを高速に回すtips</h2>
                        <div class="tags">
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                  <div class="card mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media">
                      <div class="mdl-card__media--inner">
                        <p class="desc date">
                          <span class="desc--inner">2016.2.14(Fri)</span>
                        </p>
                        <h2 class="title">Railsでrelationを使いつつransackを高速に回すtipsRailsでrelationを使いつつransackを高速に回すtips</h2>
                        <div class="tags">
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                  <div class="card mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__media">
                      <div class="mdl-card__media--inner">
                        <p class="desc date">
                          <span class="desc--inner">2016.2.14(Fri)</span>
                        </p>
                        <h2 class="title">Railsでrelationを使いつつransackを高速に回すtips</h2>
                        <div class="tags">
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                          <span class="tag tag--sm tag--transparent-white tag--no-border tag--no-hover">Rails</span><span class="splitter">/</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- content -->
          <?php endwhile; // 繰り返し処理終了 ?>
      <?php else : // ここから記事が見つからなかった場合の処理 ?>
        <div class="post">
          <h1>記事はありません</h1>
          <p>お探しの記事は見つかりませんでした。</p>
        </div>
      <?php endif; ?>
      <!-- /wordpressループ -->

      <?php get_footer(); ?>
    </main>
  </div>
  <?php get_template_part('shared/share_scripts'); ?>
  <script src="<?php bloginfo('template_url'); ?>/vendor/jquery-2.2.0.min.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/show.js"></script>
  </body>
</html>