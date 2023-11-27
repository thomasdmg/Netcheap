$(document).ready(function() {
  $('.serie-link').click(function(e) {
    e.preventDefault();
    var serieId = $(this).data('serie-id');

    $.ajax({
      url: '../pages/fancybox.php',
      method: 'GET',
      data: { serie_id: serieId },
      success: function(response) {
        $.fancybox.open({
          src: response,
          type: 'html',
          touch: false,
          smallBtn: true,
          padding: 0 
        });
      },
      error: function() {
        alert('Une erreur s\'est produite lors du chargement du contenu.');
      }
    });
  });
});