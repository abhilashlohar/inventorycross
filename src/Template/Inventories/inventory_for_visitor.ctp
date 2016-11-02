<div class="container1" style="padding-right: 5px;padding-left: 5px;">



  <div class="row">
   <?php foreach ($inventories as $inventory): ?>

    <div class="col-sm-4 col col-xs-6 col-lg-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><?= h($inventory->name) ?></div>
        <div class="panel-body"><?php echo $this->Html->image('/img/screw.jpg',['height'=>'200px','width'=>'100%','class'=>'img-rounded'])?></div>
        <div class="panel-footer">Details</div>
      </div>
    </div>
   <?php endforeach ?>
  </div>




      
    </div>