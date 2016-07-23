(function($) {
    "use strict";

    var FileUpload = function(element, options) {
        var self = this;

        this.settings = $.extend({
            uploadUrl: '/site/upload'
        }, options);

        this.$container = element;
        this.$previews = element.find('.previews');

        this.$container.on('change', 'input[type="file"]', function() {
            var files = this.files;

            for (var i = 0; i < files.length; i++) {
                var data = new FormData();

                data.append('file', files[i]);

                $.ajax({
                    url: self.settings.uploadUrl,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var preview = self.createPreview(response.preview, response.filename);

                        if (!self.settings.multiple) {
                            self.$previews.html('');
                        }

                        self.$previews.append(preview);
                    }
                });
            }
        });

        this.$container.on('click', '.remove-btn', function() {
            $(this).closest('.preview').remove();
        });
    };

    FileUpload.prototype = {
        createPreview: function(src, filename) {
            var preview = $('<div/>').addClass('preview'),
                removeBtn = $('<i class="fa fa-remove fa-lg remove-btn"></i>'),
                img = $('<img/>').attr('src', src),
                input = $('<input/>').attr({type: 'hidden', name: this.settings.inputName, value: filename});

            preview
                .append(img)
                .append(input)
                .append(removeBtn);

            return preview;
        }
    };

    $.fn.fileUpload = function(options) {
        var defaultSettings = {
            inputName: 'file[]'
        };

        var plugin = new FileUpload(this, $.extend(defaultSettings, options));
    };

})(jQuery);