<?php echo Asset::js('plugin/isotope/isotope.pkgd.min.js'); ?>
<div class="visible-sm visible-xs col-sm-12 text-center" id="filter-top">
  <div class="container-fluid">
    <ul class="list-inline" id='filters'>
    <li><a data-filter='*'>Web</a></li>
    <li><a data-filter='.System'>Movie</a></li>
    <li><a data-filter='.Image'>Image</a></li>
    <li><a data-filter='.Illust'>Illust</a></li>
    </ul>
  </div>
</div>
<div class="col-md-10" id="list">
  <?php foreach ($products as $product): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$product['category']); ?>">
      <div class="small-box bg-blue">
        <?php echo Asset::img('noimage.jpg'); ?>
       <!-- <img src="<?php //echo Config::get('USER_IMG_URL') . $product['thumbnail']; ?>" class="img-responsive">-->
        <div class="inner">
          <h2>
            <i class="fa fa-desktop" style="margin-right:4px;"></i>
            <?php echo $product['title'];?>
          </h2>
          <hr>
          <p>
            <h3>
              <div style="margin-left : 42%;">
              <?php echo $product['nice'];?>
            </div>
            </h3>
            <br>
              <div style="margin-left : 62%">
                <button id= "nice_bt" class="btn btn-success btn-lg">
                  <i class="ion ion-thumbsup"></i>いいね!!
                </button>
              </div>
          </p>
        </div>
        <a href="detail?id=<?php echo $product['id']; ?>" class="small-box-footer">
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="hidden-sm hidden-xs col-md-2" id="filter-side">
  <h2 class="text-center">Filter</h2>
  <ul id="filters" class="list-unstyled">
    <li><a data-filter='*'>All</a></li>
    <li><a data-filter='.Web'>Web</a></li>
    <li><a data-filter='.System'>Movie</a></li>
    <li><a data-filter='.Image'>Image</a></li>
    <li><a data-filter='.Illust'>Illust</a></li>
  </ul>
</div>
<script>
  $(function(){
    $(window).load(function(){
      var $container = $('#list');
      $container.isotope({
        animationEngine : 'jquery',
        itemSelector    : '.item',
        resizable       : true,
      });
      $('#filters li a').click(function(){
        var selecter = $(this).attr('data-filter');
        $container.isotope({
          filter : selecter,
          animationOptions: {
            duration : 500,
            easing   : 'easeInOutQuad',
          },
        });
        return false;
      });
    })
  })
</script>