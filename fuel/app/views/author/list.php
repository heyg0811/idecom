<div class="visible-sm visible-xs col-sm-12 text-center" id="filter-top">
  <div class="container-fluid">
    <ul class="list-inline">
      <li><a href="">System</a></li>
      <li><a href="">Image</a></li>
      <li><a href="">Illust</a></li>
    </ul>
  </div>
</div>
<div class="col-md-10" id="list">
  <?php foreach($user_list as $user): ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="small-box bg-green">
        <?php echo Asset::img('noimage.jpg'); ?>
        <div class="inner">
          <h4>
            <i class="fa fa-user" style="margin-right:4px;"></i><?php echo $user['nickname'];?>
          </h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus in eius blanditiis doloribus
          </p>
        </div>
        <a href="#" onClick="document.form1.id.value = '<?php echo $user['id'];?>'; document.form1.submit();" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<form name="form1" method="get" action="detail">
  <input type="hidden" name="id">
</form>
<div class="hidden-sm hidden-xs col-md-2" id="filter-side">
  <h2 class="text-center">Filter</h2>
  <ul class="list-unstyled">
    <li><a href="?Filter=System">System</a></li>
    <li><a href="?Filter=Web">Web</a></li>
    <li><a href="?Filter=Movie">Movie</a></li>
    <li><a href="?Filter=Image">Image</a></li>
    <li><a href="?Filter=Illust">Illust</a></li>
  </ul>
</div>