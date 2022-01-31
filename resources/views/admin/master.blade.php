<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    {{-- for the dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
       <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
       
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:../../partials/_sidebar.html -->
      @include('admin.partials.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        @include('admin.partials.navbar') 
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
            @yield('main')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          @include('admin.partials.footer') 
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
    <script src="{{asset('assets/js/typeahead.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!-- End custom js for this page -->
    {{-- for the edit --}}
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    
   <script type="text/javascript">
   CKEDITOR.replace('description');

    Dropzone.options.dropzoneForm = {
     maxFiles: 1,
      autoProcessQueue : false,
      acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
      
  
      init:function(){
        var submitButton = document.querySelector("#submit-all");
        myDropzone = this;
  
        submitButton.addEventListener('click', function(){
          myDropzone.processQueue();
        });
        
        this.on("complete", function(){
          if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
          {
            var _this = this;
            _this.removeAllFiles();
          }
          load_images();
        });
  
      }
  
    };
    load_images();
  
    function load_images()
    {
      $.ajax({
        url:"{{ url('admin/product/fetchImages')}}",
        success:function(data)
        {
          $('#uploaded_image').html(data);
        }
      })
    }
  
    $(document).on('click', '.remove_image', function(){
      var img_id = $(this).attr('id');
      $('#loading').show();
     //  alert(img_id);
      $.ajax({
       type:'post',
        url: "{{ url('admin/product/images/delete') }}",
        data:{id : img_id,"_token": "{{ csrf_token() }}"},
        success:function(data){
         $('#loading').hide();
         //  alert(data);
          load_images();
        }
      })
    });
    
  
  </script>
  </body>
</html>