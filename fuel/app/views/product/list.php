<?php echo Asset::js('plugin/isotope/isotope.pkgd.min.js'); ?>
<div class="row">
  <div class="visible-xs col-xs-12 text-center" id="filter-top">
    <div class="container-fluid" style="cursor: pointer;">
      <ul class="nav nav-pills" id='filters' >
        <li class="active"><a data-filter='*'>All</a></li>
        <?php foreach(Config::get('PROJECT.CATEGORY.NAME') as $category): ?>
          <li><a data-filter='.<?php echo $category; ?>'><?php echo $category; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<div class="col-sm-10">
  <div class="row" id="list">
    <?php foreach ($products as $product): ?>
      <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('PROJECT.CATEGORY.NAME.'.$product['category']); ?>">
        <div class="small-box bg-blue">
          <img src="<?php echo Config::get('UPLOAD_URL') . $product['thumbnail']; ?>" class="img-responsive">
          <div class="inner">
            <h4 class="text-center"><i class="fa fa-desktop" style="margin-right:4px;"></i> <?php echo $product['title']; ?></h4>
            <div class="col-xs-6 text-center">
              <h4><i class="fa fa-thumbs-o-up"></i> <?php echo $product['nice']; ?></h4>
            </div>
            <div class="col-xs-6 text-center">
              <h4><i class="fa fa-eye"></i> <?php echo $product['count']; ?></h4>
            </div>
            <p style="min-height:100px;">
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
<div class="hidden-xs col-sm-2 text-center" id="filter-side">
  <h2>Filter</h2>
  <ul id="filters" class="nav nav-pills nav-stacked">
    <li class="active"><a data-filter='*'>All</a></li>
    <?php foreach(Config::get('PROJECT.CATEGORY.NAME') as $category): ?>
      <li><a data-filter='.<?php echo $category; ?>'><?php echo $category; ?></a></li>
    <?php endforeach; ?>
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
      $('#filters a').on('click', function(){
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
      $('#filters a').on("click", function (e) {
        var lis = $(e.target).closest('ul').find('li');
        for (var i=0;i<lis.length;i++) {
          $(lis[i]).removeClass('active');
        }
        $(e.target).closest("li").toggleClass("active");
      });
    });
  });
</script>