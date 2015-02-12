<?php echo Asset::js('plugin/isotope/isotope.pkgd.min.js'); ?>
<div class="container-fluid">
  <div class="visible-xs col-xs-12 text-center" id="filter-top">
    <ul class="nav nav-pills recruit" id='filters'>
    <li class="active"><a data-filter='*'>All</a></li>
    <?php foreach(Config::get('PROJECT.CATEGORY.NAME') as $category): ?>
      <li><a data-filter='.<?php echo $category; ?>'><?php echo $category; ?></a></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<div class="col-sm-10">
  <div class="row" id="list">
    <?php foreach ($recruits as $recruit): ?>
      <div class="col-md-4 col-sm-6 col-xs-12 item <?php echo Config::get('PROJECT.CATEGORY.NAME.'.$recruit['category']); ?>">
        <div class="small-box bg-red">
          <img src="<?php echo Config::get('UPLOAD_URL') . $recruit['thumbnail']; ?>" class="img-responsive">
          <div class="inner">
            <h4 class="text-center">
              <i class="fa fa-desktop" style="margin-right:4px;"></i><?php echo $recruit['title']; ?>
            </h4>
            <p style="min-height:100px;">
              <?php echo $recruit['outline'];?>
            </p>
          </div>
          <a href="detail?id=<?php echo $recruit['id']; ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="hidden-xs col-sm-2 text-center" id="filter-side">
  <h2 class="text-center">Filter</h2>
  <ul id="filters" class="nav nav-pills nav-stacked recruit">
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