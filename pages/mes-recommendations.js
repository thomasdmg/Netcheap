
$(document).ready(function() {
    $(document).on('click', '.close_icon', function(e) {
      console.log('click')
      e.preventDefault();
      parent.jQuery.fancybox.close();
    });
  });