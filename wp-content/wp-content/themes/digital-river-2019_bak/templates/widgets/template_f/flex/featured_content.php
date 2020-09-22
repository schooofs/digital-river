<div class="widget featured_content ww_page row <?php echo ($hide_on_responsive)? 'hide_on_mobile': ''; ?>">
    <?php if ($header_text) : ?>
        <h3 class="header"><?php echo $header_text; ?></h3>
    <?php endif; ?>

    <?php if ($intro_text) : ?>
        <section class="intro"><?php echo $intro_text; ?></section>
    <?php endif; ?>

    <div class="container">
        <div class="row top">
            <div class="content span_6 hide_on_mobile"><div class="dotted_splitter"></div></div>
            <div class="content span_6 last hide_on_mobile"><div class="dotted_splitter"></div></div>
        </div>
        <div class="row">
        <?php $i = 1; foreach ($content as $row) : ?>
            <section class="content span_6 <?php echo (($i%2) === 0) ? 'last':''; ?>">
                <a class="title" href="<?php if($row['custom_url'] != ''){echo $row['custom_url']; } else {echo $row['page']; }?>"><h4><?php echo $row['page_title']; ?></h4></a>
                <article class="body"><?php echo $row['page_intro']; ?></article>
                <a class="button" href="<?php if($row['custom_url'] != ''){echo $row['custom_url']; } else {echo $row['page']; }?>">
                    <div class="butt"></div>
                    <div class="text"><?php _e('Details', 'featured-content'); ?></div>
                    <div class="arrow"></div>
                </a>
                <div class="clear"></div>
                <div class="dotted_splitter bottom"></div>
            </section>

        <?php if (($i%2) === 0) : ?>
            </div><div class="row">
        <?php endif; ?>
        <?php $i++; endforeach; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>