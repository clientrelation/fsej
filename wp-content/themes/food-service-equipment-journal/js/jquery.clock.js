(function(jQuery){
  jQuery.fn.clock = function(options)
  {
    var defaults = {
      offset: '+0',
      type: 'analog'
    };
    var _this = this;
    var opts = jQuery.extend(defaults, options);
	var angle = 0;
	var seconds = jQuery.calcTime(opts.offset).getSeconds();
	var sdegree = seconds * 6;
    angle = sdegree;
    setInterval( function() {
      if(opts.type=='analog')
      {
        jQuery(_this).find(".sec").css('-webkit-transform', 'rotate('+angle+'deg)')
								  .css('-moz-transform', 'rotate('+angle+'deg)')
								  .css('ms-transform', 'rotate('+angle+'deg)');
						//angle = angle + 1;
						angle = angle + 0.5;
      }
      else
      {
        jQuery(_this).find(".sec").html(seconds);
      }
    }, 80.5 );

    setInterval( function() {
      var hours = jQuery.calcTime(opts.offset).getHours();
      var mins = jQuery.calcTime(opts.offset).getMinutes();
      if(opts.type=='analog')
      {
        var hdegree = hours * 30 + (mins / 2);
        var hrotate = "rotate(" + hdegree + "deg)";
        jQuery(_this).find(".hour").css({"ms-transform": hrotate,"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
      }
      else
      {
        jQuery(_this).find(".hour").html(hours+':');
      }
      var meridiem = hours<12?'AM':'PM';
      jQuery(_this).find('.meridiem').html(meridiem);
    }, 1000 );

    setInterval( function() {
      var mins = jQuery.calcTime(opts.offset).getMinutes();
      if(opts.type=='analog')
      {
        var mdegree = mins * 6;
        var mrotate = "rotate(" + mdegree + "deg)";        
        jQuery(_this).find(".min").css({"ms-transform": mrotate,"-moz-transform" : mrotate, "-webkit-transform" : mrotate});                
      }
      else
      {
        jQuery(_this).find(".min").html(mins+':');
      }
    }, 1000 );
  }
})(jQuery);

(function(jQuery)
{
  jQuery.fn.clocknew = function(options)
  {
    var defaults = {
      offset: '+0',
      type: 'analog'
    };
    var _this = this;
    var opts = jQuery.extend(defaults, options);

    setInterval( function() {
      var seconds = jQuery.calcTime(opts.offset).getSeconds();
      if(opts.type=='analog')
      {
        var sdegree = seconds * 6;
        var srotate = "rotate(" + sdegree + "deg)";
        jQuery(_this).find(".sec").css({"ms-transform": srotate,"-moz-transform" : srotate, "-webkit-transform" : srotate});
		
      }
      else
      {
        jQuery(_this).find(".sec").html(seconds);
      }
    }, 1000 );

    setInterval( function() {
      var hours = jQuery.calcTime(opts.offset).getHours();
      var mins = jQuery.calcTime(opts.offset).getMinutes();
      if(opts.type=='analog')
      {
        var hdegree = hours * 30 + (mins / 2);
        var hrotate = "rotate(" + hdegree + "deg)";
        jQuery(_this).find(".hour").css({"ms-transform": hrotate,"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
      }
      else
      {
        jQuery(_this).find(".hour").html(hours+':');
      }
      var meridiem = hours<12?'AM':'PM';
      jQuery(_this).find('.meridiem').html(meridiem);
    }, 1000 );

    setInterval( function() {
      var mins = jQuery.calcTime(opts.offset).getMinutes();
      if(opts.type=='analog')
      {
        var mdegree = mins * 6;
        var mrotate = "rotate(" + mdegree + "deg)";        
        jQuery(_this).find(".min").css({"ms-transform": mrotate,"-moz-transform" : mrotate, "-webkit-transform" : mrotate});                
      }
      else
      {
        jQuery(_this).find(".min").html(mins+':');
      }
    }, 1000 );
  }
})(jQuery);

jQuery.calcTime = function(offset) {

  // create Date object for current location
  d = new Date();

  // convert to msec
  // add local time zone offset
  // get UTC time in msec
  utc = d.getTime() + (d.getTimezoneOffset() * 60000);

  // create new Date object for different city
  // using supplied offset
  nd = new Date(utc + (3600000*offset));

  // return time as a string
  return nd;
};
