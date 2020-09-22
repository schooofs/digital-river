<?php
class BlogLayout
{
  private $posts;
  private $feature_post;

  static $series_intro_key = "_series_key";

  public function __construct(){
      add_action( 'save_post', array(&$this,'save_series_intro'), 10, 2 );
  }

  public static function save_series_intro( $post_id, $post ) {
    if(get_post_type($post) == "post")
      update_post_meta( $post_id, self::$series_intro_key, stripslashes( $_POST['intro'] ) );
  }


  public static function blog_enqueue_scripts()
  {
    if(isset($_GET['amp']) === false){
      wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), 1, false );
      wp_enqueue_script('particleground', get_stylesheet_directory_uri().'/js/jquery.particleground.min.js', array(), 1, false);
    }
  }

  public static function blog_enqueue_styles()
  {
    if(isset($_GET['amp']) === false){
      wp_register_style('blog', get_stylesheet_directory_uri().'/inc/setup/Blog/css/blog.css', array(), '2', $media = 'all');
      wp_enqueue_style('blog');
    }
  }

  public function page_title(){
    ?>
    <section class="text-center slide">
      <div class="container">
        <div class="row">
          <h1 class="eng blog-header bg-white option xtra-margin-btm"><span class="bg-white">Digital River <span class="txt-darkGreen">Blog</span></span></h1>
        </div>
      </div>
    </section>
    <?php
  }

  public function feature_section()
  {

    $this->featurePost = BlogItem::get_featured_post();

    include "views/overview/featured.php";

  }


  public function menu()
  {

     include "views/overview/filter.php";
   
  }


  public function grid()
  {

    if (isset($_POST['cat']) && isset($_POST['cat']) != "") {
      $is_category = true; 
      $category = $_POST['cat'];
    } else {
      $category = null;
    }

    $feature_id = $this->featurePost->post_id;

    include "views/overview/grid.php";

  }

  public function load_more()
  {

    include "views/overview/load_more.php";

  }

  public function display(){
    ?>
    <div class="blog-content">
      <div id="particleground"></div>
        <div class="blog-inner-wrapper">
          <?php
            $this->feature_section();
            $this->menu();
            $this->grid();
            $this->load_more();
          ?>
      </div>
    </div>

     <style>

        .loader-wrapper{
          position: absolute;
          width: 100%;
          z-index: 2;
          top: 5%;
          left: 0;
        }

        .loader {
          margin: 60px auto;
          font-size: 10px;
          position: relative;
          text-indent: -9999em;
          border-top: 1.1em solid rgba(175,175,175, 0.2);
          border-right: 1.1em solid rgba(175,175,175, 0.2);
          border-bottom: 1.1em solid rgba(175,175,175, 0.2);
          border-left: 1.1em solid #cccccc;
          -webkit-transform: translateZ(0);
          -ms-transform: translateZ(0);
          transform: translateZ(0);
          -webkit-animation: load8 1.1s infinite linear;
          animation: load8 1.1s infinite linear;
        }
        .loader,
        .loader:after {
          border-radius: 50%;
          width: 10em;
          height: 10em;
        }
        @-webkit-keyframes load8 {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
          }
          @keyframes load8 {
          0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
          }
          100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
          }
        }
    </style>

    <script>
      jQuery(document).ready(function($){

        initSlider('.blog-slick');
        play_video();
        load_more_controller();

        $(".blog-tabs .tab").on("click", function(){
          activeTab($(this));
          $(".grid").html("");
          displayItems($(this).data("category"), change_blog_category);
        });

        $('.load_more_button').on("click", function(){
          displayItems($('.blog-tabs .tab.btn-secondary').text().toLowerCase(), function(res){
            $('.grid').append(res);
            // initSlider('.post-'+ post_num + ' .blog-slick');
            play_video();
            load_more_controller();

              $('.grid').find(".card img").load(function(){
                $(this).closest(".card").addClass("active");
              });

              $('.grid').find(".card").not(":has(img)").addClass("active");

          });
        });

        function initBlogLayout(res){
          initSlider('.blog-slick');
          play_video();
          load_more_controller();
          $('.grid').append(res);

        }

        function change_blog_category(res){
          initSlider('.blog-slick');
          play_video();
          load_more_controller();

          $('.grid').html(res);

          $('.grid').find(".card img").load(function(){
            $(this).closest(".card").addClass("active");
          });

          $('.grid').find(".card").not(":has(img)").addClass("active");
        }
       
        function load_more_controller(post_num){
          // if(post_num + 12  > $('.card').length + $('.feature-series').length){
          //   $('.load_more_button').hide();
          // }
          // else{
          //   $('.load_more_button').show();
          // }
        }

        function activeTab(selector){
          $(".blog-tabs .tab").addClass("btn-opposite");
          $(".blog-tabs .tab").removeClass("btn-secondary");
          $(selector).addClass("btn-secondary");
          $(selector).removeClass("btn-opposite");
        }

        function displayItems(cat_slug, itemCallback){

          $.ajax({
            url:"<?php echo admin_url( 'admin-ajax.php' )?>",
            type:'POST',
            data:{
              action: 'get_blog_item',
              cat_slug: cat_slug,
              offset: $('.grid').find('.card').length,
              feature_id: $(".featured-outer-wrapper").data("postid")
            },
            success: function(res){
              itemCallback(res);
            },
            error: function(res){
              console.log("Error: " + res);
            }
          });
        }

        function initSlider(selector){

          $(selector).owlCarousel({
              loop:true,
              margin:0,
              nav:false,
              items:1
          });
        
        }

        function play_video(){
          $(".background-video").each(function(){
            var vid = $(this).get(0);
            $(this).find('.blog-slick').slick('slickPause');
            vid.play();
          });
        }

      });
    </script>
    <?
  }

}
