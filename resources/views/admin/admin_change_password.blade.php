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
              <form action=" {{ route('update.change.password') }} " method="post">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h5>Old Password<span class="text-danger">*</span>
                          </h5>
                          <div class="controls">
                            <input type="password" id="current_password" name="oldpassword" required="" class="form-control">
                          </div>
                        </div>

                        <div class="form-group">
                          <h5>New Password<span class="text-danger">*</span>
                          </h5>
                          <div class="controls">
                            <input type="password" id="password" name="password" required="" class="form-control">
                          </div>
                        </div>

                        <div class="form-group">
                          <h5>Re-Enter Password <span class="text-danger">*</span>
                          </h5>
                          <div class="controls">
                            <input type="password" id="password_confirmation" required="" name="password_confirmation" class="form-control">
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


@endsection