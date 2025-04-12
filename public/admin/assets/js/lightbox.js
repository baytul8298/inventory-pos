$(document).ready(function() {
    var lightboxModal = new bootstrap.Modal($('#lightboxModal')[0]);
  
    $("[data-lightbox]").on('click', function(event) {
      var imagespath = $(event.target);
      if (imagespath.prop("tagName") === "IMG") {
        imagespath = imagespath.parent();
      }
      var recipient = imagespath.attr('data-lightbox');
      var image = $('.modal-image');
      image.attr('src', recipient);
      lightboxModal.show();
    });
  
    function removeClassByPrefix(node, prefix) {
      $(node).removeClass(function(index, className) {
        return (className.match(new RegExp('\\b' + prefix + '\\S+', 'g')) || []).join(' ');
      });
    }
  });