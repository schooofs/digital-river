<style>
    .tab_header{
        position: relative;
        padding: 3px;
        border: solid 1px <?= $light_gray; ?>;
    }

    .tab_header .leader-title {
        width: 100%;
        background-color: rgba(255,255,255,.85);
        transition: background-color 300ms;
        padding: 10px 15px;
        cursor: pointer;
    }

    @media(min-width: 500px) {
        .tab_header .leader-title{
            position: absolute;
                bottom: 0;
                left: 0;
        }
    }

    @media(max-width: 500px) {
        .tab_header .leader-title .text{
            font-size: 17px;
        }   
    }

    .tab_header .leader-title:hover{
        background-color: rgba(255,255,255,1);
    }

    .tab_header .leader-img{
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        transform:filter 200ms;
    }

    .tab_header:hover .leader-img{
        -webkit-filter: grayscale(0%);
        filter: grayscale(0%);
    }


    .bio-wrapper{
        position: relative;
        max-height: 0;
        transition: max-height 300ms;
        overflow: hidden;
    }

    .bio-wrapper.active{
        max-height: 1500px;
    }

    .bio-wrapper .exit{
        position: absolute;
            right: 15px;
            top: 0;
        cursor: pointer;
    }
</style>
<div class="slide option top-double">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="row">

                    <?php $bio = array(); ?>

                    <?php foreach($leaders as $key => $leader) : ?>

                        <?php $bio[] = $key; ?>

                        <div class="tab col-xss-6 col-xxs-6">
                            <div class="slide option top-zero">
                                <div class="tab_header">
                                    <img class="leader-img img-responsive" src="<?= $leader['headshot']['url']; ?>" alt="<?= $leader['headshot']['alt']; ?>">
                                    <div class="leader-title clearfix" data-bio="<?= $key ?>">
                                        <div class="text eng h3 pull-left option no-margin"><?= $leader['name']; ?></div>
                                        <i class="pull-right fa fa-2x fa-caret-down expand"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (($key % 2 === 1) || count($leaders) === ($key+1)) : ?>

                            <?php foreach ($bio as $bio_key) : ?>
                                <div class="col-md-12 bio-wrapper" data-open="false" data-key="<?= $bio_key ?>">
                                    <div class="slide option top-zero">

                                        <div class="exit h1">&times;</div>
                                        <h2 class="eng h1"><?= $leaders[$bio_key]['name']; ?></h2>
                                        <p><strong><?= $leaders[$bio_key]['title']; ?></strong></p>
                                        <?= $leaders[$bio_key]['bio']; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <?php $bio = array(); ?>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4 hidden-sm hidden-xs">
                <h3><?php _e("Executive Leadership Team", "digital-river"); ?></h3>
                <?php foreach($leaders as $leader) : ?>
                    <p><strong><?= $leader['name']; ?></strong><br>
                    <?= $leader['title']; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>

    jQuery(document).ready(function($){

        $(".leader-title").on("click", function(){

            var bio = $(this).data("bio");

            if ( ! $(".bio-wrapper[data-key='"+bio+"']").hasClass("active") ) {
                
                $(".bio-wrapper").removeClass("active");

                setTimeout(function(){
                    $(".bio-wrapper[data-key='"+bio+"']").addClass("active");
                },300);

            } else {

                $(".bio-wrapper").removeClass("active");

            }

        });


        $(".bio-wrapper .exit").on("click", function(){

            var bio = $(this).closest(".bio-wrapper").removeClass("active");

        });

    });

</script>