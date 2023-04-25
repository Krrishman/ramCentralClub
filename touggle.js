


function showMore(club_id) {
    var iconOption = $('#icon_option_'+club_id);
    iconOption.toggle();
    //iconOption.show()

}


$(document).on('click', function(e) {
    if (!$(e.target).closest('.icon_option').length && !$(e.target).closest('.more_icon').length) {
      $('.icon_option').hide();
    }
  });