
jQuery('#post_dis4').addClass('dis_block');
  var count = jQuery(".organic-holder-outer").children().length;
  jQuery('.organic-tabs a').click(function(event){
    event.preventDefault();
    var j=0;
    var post_slc=jQuery(this).attr('id');
    var lastCharPost = post_slc.slice(4);
    jQuery('.organic-tabs a').removeClass('active-tab');	
    jQuery(this).addClass('active-tab');
    while (j < count) {
      j++;
      if(lastCharPost==j){
        jQuery('.post_inner').addClass('post_dsp');
        jQuery('.post_inner').removeClass('dis_block');
        jQuery('#post_dis'+j).addClass('dis_block');
      }
    }
  }); 
var url = window.location.href; 