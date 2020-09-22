<?php
/**
 * Template Name: Commerce Connect
*/

  get_header();

  do_action("bricks");

  $speakers = get_field('speakers');
  $agenda = get_field('agenda');
  $sponsors = get_field('sponsors');
  $speaker_sponsors = get_field('speaker_sponsors');
  $registration_form = get_field('registration_form');
  $registration_confirmation = get_field('registration_confirmation');
  $contact_email = get_field('contact_email');
  $location = get_field('location');
  $google_map = get_field('google_map');
  $hideClassString = '';
  $hideClassString .= $speakers ? '' : '.ccSpeakers, ';
  $hideClassString .= $agenda ? '' : '.ccAgenda, ';
  $hideClassString .= ($sponsors && $speaker_sponsors) ? '' : '.ccSponsors, ';
  $hideClassString .= $location ? '' : '.ccLocation, ';
  $hideClassString .= $registration_form ? '' : '[data-target="#ccRegister"], ';
  if (strlen($hideClassString) > 0) echo '<style>' . preg_replace('/, $/', ' {display:none !important}', $hideClassString) . '</style>';  
?>

<div id="reasons" class="bg-lightGray text-center pad-t-xxs-4 pad-b-xxs-5">
  <h3 class="marg-b-xxs-4">REASONS TO ATTEND</h3>
  <div class="row">
    <div class="col-xxs-12 col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-xxs-12 col-md-4 marg-b-xxs-5 marg-b-md-0">
          <div class="reason pad-l-xxs-2 pad-r-xxs-2 pad-l-md-0 pad-r-md-0">
            <div class="reasonSVG">
              <img class="img-fluid center-block" src="//drh.img.digitalriver.com/DRHM/Storefront/Site/rivep023/pb/multimedia/2019/online-shop.svg" alt="Online Shopping">
            </div>
            <h5 class="reasonTitle">Explore the latest ecommerce&nbsp;trends</h5>
            <p class="reasonCopy">Hear about the latest industry trends and best practices from leading industry influencers and analysts and gain useful insights into navigating global growth&nbsp;opportunities.</p>
          </div>
        </div>
        <div class="col-xxs-12 col-md-4 marg-b-xxs-5 marg-b-md-0">
          <div class="reason pad-l-xxs-2 pad-r-xxs-2 pad-l-md-0 pad-r-md-0">
            <div class="reasonSVG">
              <img class="img-fluid center-block" src="//drh.img.digitalriver.com/DRHM/Storefront/Site/rivep023/pb/multimedia/2019/lightbulb.svg" alt="Online Shopping">
            </div>
            <h5 class="reasonTitle">Gain practical insights and&nbsp;tips</h5>
            <p class="reasonCopy">Learn from the experiences of global brands and get actionable advice on effective strategies to optimize&nbsp;profitability.</p>
          </div>
        </div>
        <div class="col-xxs-12 col-md-4">
          <div class="reason pad-l-xxs-2 pad-r-xxs-2 pad-l-md-0 pad-r-md-0">
            <div class="reasonSVG">
              <img class="img-fluid center-block" src="//drh.img.digitalriver.com/DRHM/Storefront/Site/rivep023/pb/multimedia/2019/networking.svg" alt="Online Shopping">
            </div>
            <h5 class="reasonTitle">Benefit from a commerce&nbsp;community</h5>
            <p class="reasonCopy">Take advantage of plenty of opportunities to engage with your fellow ecommerce professionals during the day and join all our guests at the evening networking reception featuring drinks, hors d'oeuvres and live&nbsp;music.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="about" class="ccAbout bg-white">
  <div class="row">
    <div class="col-sm-5 col-lg-6 blankBG"></div>
    <div class="col-sm-7 col-lg-6">
      <h3 class="text-uppercase">ABOUT Digital River's Commerce Connect</h3>
      <p>Are you looking for actionable insight on how to transform your business online and improve customer experience? Join Digital River’s Commerce Connect event, a day of ecommerce discovery designed to help you navigate the complexities of selling online. This complimentary invite-only conference is packed with thought-provoking keynotes from world-class brands, global partners and industry experts. Join us to hear more about how to build seamless shopper experiences tailored to accelerate global expansion and drive&nbsp;sales.</p>
    </div>
  </div>
</div>

<div id="sponsors" class="ccSponsors bg-white pad-t-xxs-5 pad-b-xxs-4 pad-l-xxs-4 pad-r-xxs-4 pad-l-md-0 pad-r-md-0">
  <div class="row">
    <div class="col-xxs-12 col-md-10 col-md-offset-1">
      <div class="row">
        <div class="col-xxs-12 col-md-6">
          <h3 class="marg-b-xxs-4">SPONSORED BY</h3>
          <div class="sponsors">
            <?php foreach($sponsors as $key => $sponsor): ?>
            <div class="sponsor">
              <a<?= $sponsor['sponsor_website'] ? ' href="' . $sponsor['sponsor_website'] . '"' : ''; ?> target="_blank" rel="noopener noreferrer">
                <img src="<?= $sponsor['sponsor_logo'] ?>" alt="<?= $sponsor['sponsor_name'] ?>" title="<?= $sponsor['sponsor_name'] ?>">
              </a>
              <?php if($sponsor['sponsor_about']): ?>
              <p><?= $sponsor['sponsor_about']; ?></p>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-xxs-12 col-md-6">
          <h3 class="marg-b-xxs-4">FEATURED SPEAKERS INCLUDE</h3>
          <div class="speaker_sponsors">
            <?php foreach($speaker_sponsors as $key => $sponsor): ?>
            <div class="speaker_sponsor">
              <a<?= $sponsor['sponsor_website'] ? ' href="' . $sponsor['sponsor_website'] . '"' : ''; ?> target="_blank" rel="noopener noreferrer">
                <img src="<?= $sponsor['sponsor_logo'] ?>" alt="<?= $sponsor['sponsor_name'] ?>" title="<?= $sponsor['sponsor_name'] ?>">
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="agenda" class="ccAgenda bg-blue pad-t-xxs-5 pad-b-xxs-4">
  <h3 class="marg-b-xxs-4 text-center">AGENDA</h3>
  <div class="row">
    <div class="col-xxs-12 col-md-10 col-md-offset-1">
      <?php foreach($agenda as $key => $agenda_item): ?>
      <div class="row session-content">
        <?php if ($agenda_item['topic_info']): ?>
          <div class="agenda-item collapsed" data-toggle="collapse" data-target="#session_<?=$key;?>" aria-expanded="false">
            <div class="col-xs-12 col-sm-3">
              <h4 class="date_time mktoText" id="AgendaItem<?=$key?>Time"><?=$agenda_item['time'];?></h4>
            </div>
            <div class="col-xs-12 col-sm-9">
              <div class="toggle-container row">
                <div class="col-xs-12">
                  <h4 class="headline mktoText" id="AgendaItem<?=$key?>Title"><?=$agenda_item['topic'];?></h4>
                </div>
              </div>
            </div>
          </div>
          <div id="session_<?=$key;?>" class="col-xs-12 collapse" aria-expanded="false">
            <div class="description mktoText" id="AgendaItem<?=$key?>Description">
              <p>
                <strong class="speaker-info">
                  <?= $agenda_item['speaker'] ? '<span>' . $agenda_item['speaker'] . '</span>' : ''; ?>
                  <?= $agenda_item['speaker_title'] ? '<span>' . $agenda_item['speaker_title'] . '</span>' : ''; ?>
                  <?= $agenda_item['speaker_company'] ? '<span>' . $agenda_item['speaker_company'] . '</span>' : ''; ?>
                </strong>
                <?=$agenda_item['topic_info'];?>
              </p>
            </div>
          </div>
        <?php else: ?>
          <div class="agenda-item">
            <div class="col-xs-12 col-sm-3">
              <h4 class="date_time mktoText" id="AgendaItem<?=$key;?>Time"><?=$agenda_item['time'];?></h4>
            </div>
            <div class="col-xs-12 col-sm-9">
              <div class="toggle-container row">
                <div class="col-xs-12">
                  <h4 class="headline mktoText" id="AgendaItem<?=$key;?>Title"><?=$agenda_item['topic'];?></h4>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div id="speakers" class="ccSpeakers bg-white pad-t-xxs-5 pad-b-xxs-4">
  <h3 class="marg-b-xxs-4 text-center">COMMERCE CONNECT SPEAKERS</h3>
  <div class="row">
    <div class="col-xxs-12 col-md-10 col-md-offset-1">
      <div class="speaker-row">
        <?php foreach($speakers as $key => $speaker): ?>
        <div class="speaker">
          <div class="speaker-img" style="background-image:url('<?= $speaker['speaker_image'] ? $speaker['speaker_image'] : '/wp-content/uploads/sites/8/Generic_Person.jpg'; ?>');"></div>
          <div class="speaker-info bg-blue">
            <h4><?=$speaker['speaker_name'];?></h4>
            <p>
            <?php
              if ($speaker['speaker_title'] && $speaker['speaker_company']) {
                echo $speaker['speaker_title'] .' - '. $speaker['speaker_company'];
              } elseif ($speaker['speaker_title']) {
                echo $speaker['speaker_title'];
              } elseif ($speaker['speaker_company']) {
                echo $speaker['speaker_company'];
              }
            ?>
            </p>
            <button>+</button>
          </div>
          <div class="speaker-bio bg-blue">
            <div>
              <?=$speaker['speaker_bio'];?>
            </div>
            <button>+</button>
          </div>          
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div id="location" class="ccLocation bg-lightBlue">
  <div class="row">
    <div class="col-xxs-12 col-md-7 pad-t-xxs-5 pad-b-xxs-4 pad-l-xxs-4 pad-r-xxs-4 pad-l-md-0">
      <h3>LOCATION</h3>
      <?=$location?>
    </div>
    <div class="col-xxs-12 col-md-5">
      <iframe id="gmap_canvas" src="<?=$google_map;?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
  </div>
</div>

<div id="footer" class="bg-lightGray pad-t-xxs-2 pad-b-xxs-2">
  <div class="row">
    <div class="col-xxs-12 col-md-10 col-md-offset-1">
      <div class="row footerContent">
        <div class="col-xxs-12 col-sm-9 pad-l-xxs-4 pad-r-xxs-4 pad-l-md-0">
          <p class="copyright">&copy;<?=date("Y");?> Digital River, Inc. | Digital River<sup>&reg;</sup> is a registered trademark of Digital River, Inc.<br>
          10380 Bren Road West Minnetonka, MN 55343 | United States</p>
          <p class="copyright">Questions? Please contact <a href="mailto:<?=$contact_email;?>?Subject=Commerce%20Connect%202019"><?=$contact_email;?></a></p>
        </div>
        <div class="col-xxs-12 col-sm-3 social pad-l-xxs-4 pad-r-xxs-4 pad-r-md-0">
          <a href="https://twitter.com/DigitalRiverInc"><i class="fab fa-twitter-square"></i></a>
          <a href="https://www.linkedin.com/company/digital-river"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ccRegister" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center">Register Now</h3>
        <?= $registration_form ?>
        <style>.mktoForm .mktoButtonRow {margin-top:40px;}</style>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ccThankYou" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center marg-b-xxs-2">Thank You!</h3>
        <?= $registration_confirmation ?>
      </div>
    </div>
  </div>
</div>

<?php
  get_footer();
?>