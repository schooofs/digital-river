(function() {
  if (/MSIE/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /Edge\/\d./i.test(navigator.userAgent)) {
    $('#offeringsSVG').addClass('go');
    return console.log('MS Browser');
  }
  var $lines = $('#lines > line');
  $lines.each(function() {
    var lineLength = dist(this.x1.baseVal.value,
                          this.x2.baseVal.value,
                          this.y1.baseVal.value,
                          this.y2.baseVal.value);
    function dist(x1, x2, y1, y2){
        return Math.sqrt( (x2-=x1)*x2 + (y2-=y1)*y2 );
    }
    console.log(lineLength);
    $(this).css({
      'stroke-dasharray':lineLength,
      'stroke-dashoffset':lineLength
      //'animation-duration':(lineLength * 2) + 'ms'
    });
  });
 
})();