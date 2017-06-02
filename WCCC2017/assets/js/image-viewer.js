'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ImageViewer = function () {
    function ImageViewer($element) {
        _classCallCheck(this, ImageViewer);

        this.element = $($element);
        this.indexContainer = $(this.element).find('.image-viewer-indexes')[0];
        this.imageContainer = $(this.element).find('.image-viewer-images')[0];
        this.closeButton = $(this.element).find('.image-viewer-close')[0];
        this.images = null;
        this.indices = null;
        this.currentIndex = 0;
        this.setupListeners();
    }

    _createClass(ImageViewer, [{
        key: 'setupListeners',
        value: function setupListeners() {
            var _this = this;

            //Side buttons
            $(this.element).find('.image-viewer-button-right').click(function (event) {
                event.preventDefault();
                _this.handleRightButton();
            });
            $(this.element).find('.image-viewer-button-left').click(function (event) {
                event.preventDefault();
                _this.handleLeftButton();
            });

            //Indices
            $(this.indices).click(function (event) {
                event.preventDefault();
                _this.handleIndexClicked(event);
            });

            $(this.closeButton).click(function (event) {
                event.preventDefault();
                _this.close();
            });

            $(this.element).find('.image-viewer-content').click(function (event) {
                if ($(event.target).hasClass('image-viewer-content')) {
                    _this.close();
                }
            });
        }
    }, {
        key: 'close',
        value: function close() {
            this.removeAllImages();
            this.updateImages();
            this.currentIndex = 0;
            $(this.element).removeClass('image-viewer-open');
        }
    }, {
        key: 'open',
        value: function open() {
            this.updateImages();
            $(this.images[0]).addClass('image-active');
            this.currentIndex = 0;
            $(this.element).addClass('image-viewer-open');
        }
    }, {
        key: 'addImage',
        value: function addImage(imageURL) {
            var image = '<a class="image-viewer-image" style="background-image: url(' + imageURL + ')"></a>';
            $(this.imageContainer).append(image);
        }
    }, {
        key: 'addImages',
        value: function addImages(imageURLs) {
            for (var i = 0; i < imageURLs.length; i++) {
                this.addImage(imageURLs[i]);
            }
        }
    }, {
        key: 'removeAllImages',
        value: function removeAllImages() {
            $(this.indexContainer).html('');
            $(this.imageContainer).html('');
            this.images = [];
            this.indices = [];
        }

        //Change the image to the index specified

    }, {
        key: 'changeImageToIndex',
        value: function changeImageToIndex(index) {
            if (typeof index != 'undefined' && index >= 0) {
                if (index < this.images.length) {
                    $(this.images).removeClass('image-active');
                    $(this.images[index]).addClass('image-active');
                }
                if (index < this.indices.length) {
                    $(this.indices).removeClass('image-viewer-index-active');
                    $(this.indices[index]).addClass('image-viewer-index-active');
                }
                this.currentIndex = index;
            }
        }

        //Go to the next image

    }, {
        key: 'nextImage',
        value: function nextImage() {
            if (typeof this.currentIndex === 'undefined') {
                return;
            }

            var nextIndex = parseInt(this.currentIndex) + 1;
            if (nextIndex >= this.images.length) {
                this.currentIndex = 0;
            } else {
                this.currentIndex = nextIndex;
            }
            this.changeImageToIndex(this.currentIndex);
        }

        //Go to the previous image

    }, {
        key: 'prevImage',
        value: function prevImage() {
            if (typeof this.currentIndex === 'undefined') {
                return;
            }
            var prevIndex = parseInt(this.currentIndex) - 1;
            if (prevIndex < 0) {
                this.currentIndex = this.images.length - 1;
            } else {
                this.currentIndex = prevIndex;
            }
            this.changeImageToIndex(this.currentIndex);
        }
    }, {
        key: 'handleIndexClicked',
        value: function handleIndexClicked(event) {
            var index = $(event.target).attr('image-index');
            this.changeImageToIndex(index);
        }
    }, {
        key: 'handleRightButton',
        value: function handleRightButton() {
            this.nextImage();
        }
    }, {
        key: 'handleLeftButton',
        value: function handleLeftButton() {
            this.prevImage();
        }
    }, {
        key: 'updateImages',
        value: function updateImages() {
            this.images = $(this.imageContainer).find('.image-viewer-image');
            //remove all the indexes that are currently in the index container
            for (var i = 0; i < this.images.length; i++) {
                var index = '<a class="image-viewer-index" href="#" image-index="' + i + '"></a>';
                $(this.indexContainer).append(index);
            }
            this.indices = $(this.indexContainer).find('.image-viewer-index');
        }
    }]);

    return ImageViewer;
}();

if (!window.imageViewersCreated) {
    window.imageViewers = [];
    $(document).ready(function () {
        var imageViewers = $('.image-viewer');
        for (var i = 0; i < imageViewers.length; i++) {
            var imageViewer = new ImageViewer(imageViewers[i]);
            window.imageViewers.push(imageViewer);
        }
    });
    window.imageViewersCreated = true;
}