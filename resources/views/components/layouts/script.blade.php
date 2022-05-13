<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

<script>
    let loadFilePreview = function (event){
        let imageUploadPreview = document.getElementById('imageUploadPreview');
        imageUploadPreview.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
