class ImageViewer{
    constructor($element){
        this.element = $($element);
        this.indexContainer = $(this.element).find('.image-viewer-indexes')[0];
        this.imageContainer = $(this.element).find('.image-viewer-images')[0];
        this.closeButton = $(this.element).find('.image-viewer-close')[0];
        this.images = null;
        this.indices = null;
        this.currentIndex = 0;
        this.setupListeners();
    }

    setupListeners(){
        //Side buttons
        $(this.element).find('.image-viewer-button-right').click((event)=>{
            event.preventDefault();
            this.handleRightButton();
        });
        $(this.element).find('.image-viewer-button-left').click((event)=>{
            event.preventDefault();
            this.handleLeftButton();
        });

        //Indices
        $(this.indices).click((event)=>{
            event.preventDefault();
            this.handleIndexClicked(event);
        });

        $(this.closeButton).click((event)=>{
            event.preventDefault();
            this.close();
        });

        $(this.element).find('.image-viewer-content').click((event)=>{
            if($(event.target).hasClass('image-viewer-content')){
                this.close();
            }
        });
    }

    close(){
        this.removeAllImages();
        this.updateImages();
        this.currentIndex = 0;
        $(this.element).removeClass('image-viewer-open');
    }

    open(){
        this.updateImages();
        $(this.images[0]).addClass('image-active');
        this.currentIndex = 0;
        $(this.element).addClass('image-viewer-open');
    }

    addImage(imageURL){
        let image = '<a class="image-viewer-image" style="background-image: url('+imageURL+')"></a>';
        $(this.imageContainer).append(image);
    }

    addImages(imageURLs){
        for(let i = 0; i < imageURLs.length; i++){
            this.addImage(imageURLs[i]);
        }
    }

    removeAllImages(){
        $(this.indexContainer).html('');
        $(this.imageContainer).html('');
        this.images = [];
        this.indices = [];
    }

    //Change the image to the index specified
    changeImageToIndex(index){
        if(typeof index != 'undefined' && index >= 0){
            if(index < this.images.length){
                $(this.images).removeClass('image-active');
                $(this.images[index]).addClass('image-active');
            }
            if(index < this.indices.length){
                $(this.indices).removeClass('image-viewer-index-active');
                $(this.indices[index]).addClass('image-viewer-index-active');
            }
            this.currentIndex = index;
        }
    }

    //Go to the next image
    nextImage(){
        if(typeof this.currentIndex === 'undefined') { return; }

        let nextIndex = parseInt(this.currentIndex) + 1
        if(nextIndex >= this.images.length){
            this.currentIndex = 0;
        }else{
            this.currentIndex = nextIndex;
        }
        this.changeImageToIndex(this.currentIndex);
    }

    //Go to the previous image
    prevImage(){
        if(typeof this.currentIndex === 'undefined') { return; }
        let prevIndex = parseInt(this.currentIndex) - 1;
        if(prevIndex < 0){
            this.currentIndex = this.images.length - 1;
        }else{
            this.currentIndex = prevIndex;
        }
        this.changeImageToIndex(this.currentIndex);
    }

    handleIndexClicked(event){
        let index = $(event.target).attr('image-index');
        this.changeImageToIndex(index);
    }

    handleRightButton(){
        this.nextImage();
    }

    handleLeftButton(){
        this.prevImage();
    }

    updateImages(){
        this.images = $(this.imageContainer).find('.image-viewer-image');
        //remove all the indexes that are currently in the index container
        for(let i = 0; i < this.images.length; i++){
            let index = '<a class="image-viewer-index" href="#" image-index="'+i+'"></a>';
            $(this.indexContainer).append(index);
        }
        this.indices = $(this.indexContainer).find('.image-viewer-index');
    }
}

if(!window.imageViewersCreated){
    window.imageViewers = [];
    $(document).ready(()=>{
        let imageViewers = $('.image-viewer');
        for(let i = 0; i < imageViewers.length; i++){
            let imageViewer = new ImageViewer(imageViewers[i]);
            window.imageViewers.push(imageViewer);
        }
    });
    window.imageViewersCreated = true;
}
