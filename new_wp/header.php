<!DOCTYPE html>
<head lang="ja">
  <meta charset="<?php bloginfo('charset');?>">
  <title><?
      if(is_single()){
        wp_title('|',true,'right');
      }
    ?></title>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/material.min.css">
  <script src="<?php bloginfo('template_url'); ?>/vendor/material.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <?php if ( is_single()): // 記事のみ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/highlight/styles/solarized_dark.css" media="screen" title="no title" charset="utf-8">
    <script src="<?php bloginfo('template_url'); ?>/vendor/highlight/highlight.pack.js" charset="utf-8"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="<?php bloginfo('template_url'); ?>/vendor/autosize.min.js" charset="utf-8"></script>
  <?php endif; ?>

  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"> <!-- 最後に入れる -->


  <?php
    if ( is_singular() ){ // is_single, is_page, is_attachmentのいずれかがtrue
      wp_enqueue_script( "comment-reply" );
    }
  ?>
</head>
