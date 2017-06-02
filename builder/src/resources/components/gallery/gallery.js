(function($) {

    class Gallery{
        constructor(element){
            this.element = $(element);
            this.imageDivs = $(this.element).find('.gallery-image');
            this.images = [];
            this.setupListeners();
            this.setImages();
        }

        setImages(){
            for(let i = 0; i < this.imageDivs.length; i++){
                this.images.push($(this.imageDivs[i]).attr('image-ref'));
            }
        }

        setupListeners(){
            $(this.element).click((event)=>{
                this.addImagesToImageViewer();
            });
        }

        addImagesToImageViewer(){
            if(window.imageViewers.length > 0){
                let imageViewer = window.imageViewers[0];
                imageViewer.addImages(this.images);
                imageViewer.open();
            }
        }
    }

    //if we haven't made the galleries yet, don't make them again
    if(!window.galleriesCreated){
        $(document).ready(()=>{
            let galleries = $('.gallery-component');
            for(let i = 0; i < galleries.length; i++){
                new Gallery(galleries[i]);
            }
        });
        window.galleriesCreated = true;
    }
})(jQuery);
