//----------  author  ----------
$(window).load(function () {
  author_height();
});
function author_height() {
  Height = ($('#user-box').height()/2)-61;
  $('div#timeline-box').css('height',Height+'px');
  return ;
}

//----------  timeline  scrollbar  ----------
$('#timeline-box').slimScroll({
});
//----------  timeline  scrollbar  ----------

//----------  slider  ----------
$("[data-slider]")
.each(function() {
    var input = $(this);
    $("<span>")
    .addClass("output")
    .insertAfter($(this));
})
.bind("slider:ready slider:changed", function( event, data) {
    $(this)
    .nextAll(".output:first")
    .html(data.value.toFixed(0));  // 数値表示の小数点以下数
}); 
//----------  slider  ----------
//----------  author  ----------