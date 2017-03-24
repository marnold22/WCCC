jQuery(function($) {
  $(document).ready(function(){
      $('#insert-my-media').click(open_media_window);
  }); 

  function open_media_window() {
      var window = wp.media({
            title: 'Insert a media',
            library: {type: 'image'},
            multiple: false,
            button: {text: 'Insert'}
      });
      window.open();
    } 
});
