<div class="pad-t-xxs-4 pad-b-xxs-4 pad-t-sm-8 pad-b-sm-8">
  <div class="row">
  	<div class="col-xxs-10 col-xxs-offset-1">
    <div class="row">
      <div class="col-lg-4 col-sm-6 marg-b-xxs-4 marg-b-sm-0">
         <?php foreach($question_groups as $key => $question_group) { ?>
           <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-title">
                  <?= $question_group['heading']?>
                </div>
              </div>
              <div class="panel-body"> 
                  <ul class="list-unstyled">
                  <?php foreach($question_group['questions'] as $question_count => $question_and_answer){ ?>
                    <li><a href="#<?= $key . '_' . $question_count ?>" class="txt-black dr-question"><?= utf8_encode($question_and_answer['question'])?></a></li>
                <?php } ?> 
                  </ul>
                </div>
            </div>  
          <?php } ?>
      </div>
      <div class="col-lg-8 col-sm-6">
        <?php foreach($question_groups as $key => $question_group) { ?>
          <div class="<?= ($key === 0)? " marg-t-xxs-0 ":"marg-t-xxs-3" ?>">
            <h3><?= $question_group['heading']?></h3>
          </div>
          <?php foreach($question_group['questions'] as $question_count => $question_and_answer){ ?>
            <div class="target" id="<?= $key . '_' . $question_count?>"></div>
            <div class="marg-t-xxs-2 xtarget">
              <h5><?= $question_and_answer['question'] ?></h5>
              <?php echo $question_and_answer['answer']?>
            </div>
          <?php } ?>
        <?php } ?> 
      </div>
    </div>
  </div>
</div>
</div>