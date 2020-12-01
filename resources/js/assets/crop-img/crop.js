$(document).ready(function () {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').on('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
            image.src = url;
            $modal.css('opacity', '1');
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function (e) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: ratio,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').on('click', function (e) {
        e.preventDefault();
        canvas = cropper.getCroppedCanvas({
            width: 1110,
            height: 555
        });
        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $.ajax({
                    url: '/admin/imageupload',
                    method: 'POST',
                    data: {image: base64data},
                    success: function (data) {
                        console.log('data', data);
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                        let image = data.split('/');
                        image = image.pop();
                        $('#image').val(image);
                        try{
                            $('#delete-image').show();
                        } catch(e){}
                    }
                })
            }
        });
    });

    $('#delete-image').on('click', function(e){
        $('#uploaded_image').attr('src', '/assets/images/avatars/user.png');
        $('#image').val('');
        $('#delete-image').hide();
    });
});
