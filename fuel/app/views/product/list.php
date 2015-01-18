<?php echo Asset::js('plugin/isotope/isotope.pkgd.min.js'); ?>
<div class="row">
<div class="visible-xs col-xs-12 text-center" id="filter-top">
  
    <div class="container-fluid" style="cursor: pointer;">
      <ul class="list-inline" id='filters' >
      <li><a data-filter='*'>Web</a></li>
      <li><a data-filter='.System'>Movie</a></li>
      <li><a data-filter='.Image'>Image</a></li>
      <li><a data-filter='.Illust'>Illust</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="col-sm-10">
  <div class="row" id="list">
    <?php foreach ($products as $product): ?>
      <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('CATEGORY.'.$product['category']); ?>">
        <div class="small-box bg-blue">
          <img src="<?php echo Config::get('USER_IMG_URL') . $product['thumbnail']; ?>" class="img-responsive">
          <div class="inner">
            <h4>
              <i class="fa fa-desktop" style="margin-right:4px;"></i> さくひんたいとる
            </h4>
            <p style="height:100px;">
              <?php echo $product['outline'];?>
            </p>
          </div>
          <a href="detail?id=<?php echo $product['id']; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="hidden-xs col-sm-2" id="filter-side">
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
        resizable       : false,
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