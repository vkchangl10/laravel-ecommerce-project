@extends('admin.admin_master') 
@section('admin') 

<!-- JQuery CDN Link For Show Selected File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
  <div class="container-full">
    <!-- Main content -->
    <section class="content">
      <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Form Validation</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form action=" {{ route('admin.profile.store') }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Admin Name <span class="text-danger">*</span>
                          </h5>
                          <div class="controls">
                            <input type="text" name="name" class="form-control" value="{{ $editData->name }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <h5>Admin Email <span class="text-danger">*</span>
                        </h5>
                        <div class="controls">
                          <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Profile Photo <span class="text-danger">*</span>
                          </h5>
                          <div class="controls">
                            <input type="file" id="image" name="profile_photo_path" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <img id="showImage" src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }} " name="profile_photo_path" alt="" style="width:100px; height:100px">
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="controls">
                            <input type="submit" class="btn btn-primary" value="Update">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
  </div>
  <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
</div> 

<!-- START - JS For Show Selected Image  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!-- END - JS For Show Selected Image  -->


@endsection