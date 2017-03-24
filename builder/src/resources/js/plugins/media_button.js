jQuery(function($) {
  $(document).ready(function(){
      $('#insert-my-media').click(open_media_window);
  }); 

  function open_media_window() {
    this.media_uploader = wp.media({
        frame:    "post",
        state:    "insert",
        multiple: true
    });

    this.media_uploader.on("insert", function(){

        var length = this.media_uploader.state().get("selection").length;
        var images = this.media_uploader.state().get("selection").models

        for(var iii = 0; iii < length; iii++)
        {
            var image_url = images[iii].changed.url;
            var image_caption = images[iii].changed.caption;
            var image_title = images[iii].changed.title;
            console.log(image_url);
        }
    });

    this.media_uploader.open();
}
});
