<?php
  /* Views for search results */
  class SearchView
  {
    private static $js_result;

    /* Initialize modal to prepare for view rendering */
    public static function init(){
      self::search_enqueue_style();
      self::search_struct();
      self::search_enqueue_script();
    }

    /* Styling for search page */
    public static function search_enqueue_style(){
      ?>
      <style>

          .type a{
              font-size: 1.25em;
              padding: 2px 10px;
              font-family: "DIN Next W01 Medium",sans-serif;
              border-bottom: solid 2px #EEE;
              color:#646469;
              margin:0 10px 0 0;
          }

          .type a:hover{
              border-color:#CCC;
              color:#646469;
              text-decoration: none;
          }

          .type a.selected{
              border-color: #00A7E1;
          }

          #search{
              width: 300px;
              border: 1px solid #CCC;
              padding: 11px 10px 10px;
              display: block;
              float: left;
              font-size: 1.25em;
          }

          #search .button{
              margin: 0;
          }

          .button{
              padding: 12px 12px 7px;
              margin: 0px;
              display: inline-block;
              text-decoration: none;
              transition: all 200ms ease-out 0s;
              font-size: 1.1em;
              text-transform: uppercase;
              color: #FFF;
              background-color: #00A7E1;
              border: 2px solid #007EB5;
              line-height: 1;
              cursor: pointer;
              font-family: "DIN Next W01 Medium",sans-serif;
          }

          .type{
              margin: 25px 0px 15px;
          }

          .sidebar{
              margin: 20px 0;
          }

          .sidebar .eyebrow{
              float: left;
          }

          .solution{
              display: inline-block;
          }

          .view-all{
              display: inline-block;
              margin-top: 32px;
              float: right;
          }

          .search_form{
              margin: 20px 0px;
          }


          .customer-service{
              width:100%;
              margin: 20px 0;
              position: relative;
              padding: 10px 0px;
          }

          .customer-service .close{
              position: absolute;
              right:5px;
              top:5px;
              text-shadow: none;
              font-size:30px;
          }

          .search-result-wrapper .detailed-list-item{
              display:block;
          }

          #search_results .button-wrapper{
            text-align:center;
            margin-bottom:50px;
          }

          .detailed-list-item .tag {
              font-size: 1em;
              color: #81b315;
              margin: 0 0 3px;
              font-family: "DIN Next W01 Medium";
          }

          .customer-service{
            padding:10px;
          }

      </style>
      <?
    }

    /* Scripts for search page */
    public static function search_enqueue_script(){
      ?>
      <script>

          jQuery(document).ready(function($){
              var result = <?php echo json_encode(self::$js_result); ?>;
              var count = 0;
              setTimeout(function(){
                  if(readCookie("customer-service") == "false"){
                      $(".customer-service").hide();
                  }else{
                      $(".customer-service .close").on("click", function(){
                          $(this).parents(".customer-service").remove();
                          createCookie("customer-service", "false", 5);
                      });
                  }
              },0);

              if(result.length < 10){
                  $('.button-wrapper').hide();
              }

              $('#loadMoreSearch').click(function(){
                for(var i=count; i<count + 10; i++){
                  $('.solution_results .search-result-wrapper').append(result[i]);
                }
                if(i >= result.length){
                  $('#loadMoreSearch').fadeOut(500);
                  $('#nav-btn-top').fadeIn(500, function(){
                    $('.button-wrapper').css("text-align", "right");
                    $(this).removeClass("hidden");
                  });
                }
                count = i;
                // console.log(count);
              });

              $('#nav-btn-top').click(function(){
                $("html, body").animate({ scrollTop: 0 }, "slow");
              });

          });

      </script>
      <?
    }

    /* Structure for search view */
    public static function search_struct(){
      ?>
      <section id="search_results">
        <div class="container">
          <section class="solution_results">
            <div class="row">
              <section class="col-md-7">
                <?
                  self::search_bar();

                  self::customer_service();
                  self::search_menu();
                  self::search_results();
                ?>
              </section>
              <section class="col-md-5 ">
                <?
                  self::search_sidebar();
                ?>
              </section>
              <div class="clear"></div>
            </div>
          </section>
          <div class="clear"></div>
        </div>
      </section>
      <?
    }
    /* Display search bar */
    public static function search_bar(){
      ?>
      <form action="<?php echo home_url( '/' ); ?>" method="get" class="search_form">
          <input class="search_box" type="text" name="s" id="search" placeholder='' value="<?php the_search_query(); ?>">
          <input type="hidden" type="text" name="lang" value="<?php echo ICL_LANGUAGE_CODE ?>" >
          <input type="submit" class="btn btn-primary btn-lg" value="<?php _e("Search","digital-river"); ?>" />
      </form>
      <?
    }

    public static function customer_service(){

      $customer_service_terms = array(
      "windows",
      "iso",
      "kaspersky",
      "vive",
      "avast",
      "microsoft",
      "home premium",
      "adobe",
      "microsoft",
      "office",
      "nuance",
      "downloads",
      "lenovo",
      "bitdefender",
      "element 5",
      "element5",
      "invoice",
      "trend micro",
      "trend",
      "vista",
      "order",
      "paypal",
      "razer",
      "win",
      "autocad",
      "creative cloud",
      "htc",
      "hup",
      "home use",
      "ireland",
      "refund",
      "swreg",
      "win7",
      "acrobat",
      "address",
      "annual report",
      "autodesk",
      "blackberry",
      "crystal reports",
      "embarcadero",
      "flir",
      "lightroom",
      "mail merge toolkit",
      "lightroom",
      "nvidia",
      "samsung",
      "support",
      "adobe connect",
      "corel",
      "customer service",
      "dri",
      "endnote",
      "lg",
      "mcafee",
      "product key",
      "pinnacle",
      "starmoney",
      "photoshop",
      "antivirus",
      "cancel",
      "find my order",
      "logitech",
      "norton"
    );

    $searchword = strtolower($_GET['s']);

    // Terms to trigger Customer service popout

    $matches = array_filter($customer_service_terms, function($term) use ($searchword) { return preg_match_all("/\b$term\b/i", $searchword, $test_array); });

    if(count($matches) > 0):
      ?>

      <div class="customer-service bg-lightGray" >
        <div class="close">&times;</div>
        <div class="eyebrow">Customer Service</div>
        <p>Inquiring about an order you placed on one of our clients' online stores? </p>
        <p><a target="_blank" href="//www.findmyorder.com/store?Action=DisplayEmailCustomerServicePage&Locale=en_US&SiteID=findmyor" class="arrow"> Visit our customer service page</a></p>
      </div>

    <?php endif;
  }

    /* Display search menu */
    public static function search_menu(){
      $type= Search::get_type();
      ?>
      <nav class="type">

          <?
            if(ICL_LANGUAGE_CODE == "en"){?>
              <a href="<?php echo get_site_url(); ?>/?s=<?php echo $_GET['s']; ?>&amp;lang=<?php echo ICL_LANGUAGE_CODE; ?>&amp;type=pages" class="<?php echo ($type == 'pages' || $type == null) ? "selected" : null; ?>">Pages</a>
              <a href="<?php echo get_site_url(); ?>/?s=<?php echo $_GET['s']; ?>&amp;lang=<?php echo ICL_LANGUAGE_CODE; ?>&amp;type=resources" class="<?php echo ($type == 'resources') ? "selected" : null; ?>">Resources</a>
              <a href="<?php echo get_site_url(); ?>/?s=<?php echo $_GET['s']; ?>&amp;lang=<?php echo ICL_LANGUAGE_CODE; ?>&amp;type=press_releases" class="<?php echo ($type == 'press_releases') ? "selected" : null; ?>">Press Releases</a>
              <a href="<?php echo get_site_url(); ?>/?s=<?php echo $_GET['s']; ?>&amp;lang=<?php echo ICL_LANGUAGE_CODE; ?>&amp;type=newsfeed" class="<?php echo ($type == 'newsfeed') ? "selected" : null; ?>">Newsfeed</a>
          <?}
          ?>
          </nav>
      <?
    }

    /* Display sidebar with blog posts */
    public static function search_sidebar(){
      if(ICL_LANGUAGE_CODE == "en"):

      ?>
      <div class="sidebar">
        <?
            $blog_cta = __("View All Blog Posts", "digital-river");
            $title = __("Recent Blog Posts", "digital-river");

            $blog_array  = Blog::get_Recent();

            $recent = true;
        // else:
        //     $Resources_Section = new ResourcesSection();
        //     $blog_results = $Resources_Section->resourcesJSON(array_column($blog_array1, "ID"));
        //     $blog_array = json_decode($blog_results);
        ?>
        <div class="eyebrow-wrapper clearfix">
          <h2 class="eyebrow"><?php echo $title; ?></h2>
          <a class="brackets view-all" href="/resources/blog"><?php echo $blog_cta; ?></a>
        </div>
        <?php
        foreach ($blog_array as $result):
            $Detailed_List_Item = new DetailedListItem($result->post_title, $result->post_excerpt, $result->guid);
            $Detailed_List_Item->display();
        endforeach;
        ?>
      </div>
      <?
    endif;

    }

    /* Display results from search query */
    public static function search_results(){

      $posts_array = Search::format_results();



      // // Did you mean...?
      // if (function_exists('relevanssi_didyoumean')) {
      //   relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "</p>", 5);
      // }

      ?>


      <?php
      $type=Search::get_type();

      if (isset($posts_array) && count($posts_array) > 0) : ?>
        <h1 class="h3">
          <?php
          if($type == 'newsfeed'):
            $searchResultCount = count($posts_array).__(" Newsfeed ", "digital-river").__(" results", "digital-river").__(" for the search, ", 'digital-river')."&#8220;".$_GET['s']."&#8221;";
          elseif($type == 'press_releases'):
            $searchResultCount = count($posts_array).__(" Press Releases ", "digital-river").__("found for the search, ", 'digital-river')."&#8220;".$_GET['s']."&#8221;";
          elseif($type == 'resources'):
            $searchResultCount = count($posts_array).__(" Resources ", "digital-river").__("found for the search, ", 'digital-river')."&#8220;".$_GET['s']."&#8221;";
          else:
            $searchResultCount = count($posts_array).__(" Pages ", "digital-river").__("found for the search, ", 'digital-river')."&#8220;".$_GET['s']."&#8221;";
          endif;
            echo $searchResultCount;
          ?>
        </h1>


          <?

          echo '<div class="search-result-wrapper">';
          $js_result = array();
          foreach($posts_array as $key => $post):
            $ex_link = false;
            $fields = get_fields($post->ID);

            if($fields['article_url']){
              $link = $fields['article_url'];
              $ex_link = true;
            }
            else {
              $link = get_permalink($post->ID);
            }

            $optional = array(
                "link_label" =>"</strong>".__('Read More', 'digital-river'),
                "external_link" => $ex_link
            );

            if($type == "newsfeed"){
              $optional['author'] = $fields['name_of_publication'];
              $optional['date'] = $fields['article_date'];
            }

            if($type == 'resources'){
              $Detailed_List_Item = new DetailedListResource(new TmpResource($post));
            }else{
              $Detailed_List_Item = new DetailedListItem(
                $post->post_title,
                $post->content,
                $link,
                $optional
              );
              // print_r($optional);
            }


            if($key < 10){
              $Detailed_List_Item->display();
            }else{
              ob_start();
              $Detailed_List_Item->display();
              array_push($js_result, ob_get_contents());
              ob_end_clean();
            }
            // endif;
            $count++;
          endforeach;

          self::$js_result = $js_result;
          echo '</div>';
          ?>
          <div class="button-wrapper">
           <button class="btn btn-primary" id="loadMoreSearch">Load More...</button>
           <button class="btn btn-primary hidden" id="nav-btn-top">Back to Top</button>
         </div>
            <?php else : ?>
                   <section class="no_results">
                       <p class="text">Sorry, we can't seem to find what you're looking for. Please modify your search and try again.</p>
                   </section>
           <?php endif; ?>
     <?
    }
}