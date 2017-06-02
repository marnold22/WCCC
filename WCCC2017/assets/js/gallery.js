'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Gallery = function () {
    function Gallery(element) {
        _classCallCheck(this, Gallery);

        this.element = $(element);
        this.imageDivs = $(this.element).find('.gallery-image');
        this.images = [];
        this.setupListeners();
        this.setImages();
    }

    _createClass(Gallery, [{
        key: 'setImages',
        value: function setImages() {
            for (var i = 0; i < this.imageDivs.length; i++) {
                this.images.push($(this.imageDivs[i]).attr('image-ref'));
            }
        }
    }, {
        key: 'setupListeners',
        value: function setupListeners() {
            var _this = this;

            $(this.element).click(function (event) {
                _this.addImagesToImageViewer();
            });
        }
    }, {
        key: 'addImagesToImageViewer',
        value: function addImagesToImageViewer() {
            if (window.imageViewers.length > 0) {
                var imageViewer = window.imageViewers[0];
                imageViewer.addImages(this.images);
                imageViewer.open();
            }
        }
    }]);

    return Gallery;
}();

//if we haven't made the galleries yet, don't make them again


if (!window.galleriesCreated) {
    $(document).ready(function () {
        var galleries = $('.gallery-component');
        for (var i = 0; i < galleries.length; i++) {
            new Gallery(galleries[i]);
        }
    });
    window.galleriesCreated = true;
}