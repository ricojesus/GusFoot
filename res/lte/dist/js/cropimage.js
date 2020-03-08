$(document).ready(function(){

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width:330,
            height:500,
            type:'square' //circle
        },
        boundary:{
            width:400,
            height:500
        }
    });

    $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $.ajax({
                url:"../controllers/pilot_controller.php",
                type: "POST",
                data:{"image": response},
                success:function(data)
                {
                    $('#uploadimageModal').modal('hide');
                    $('#txtFoto').val(response);
                    $('#uploaded_image').attr('src', response);

                }
            });
        })
    });

});