@extends('layouts.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h3 class="page-title">Form elements</h3>

            <ul class="nav nav-tabs border-2 mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        <i class="fe fe-user fe-12 mr-1"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">
                    <i class="fe fe-lock fe-12 mr-1"></i>    
                        Security
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                    
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Profile Details</strong>
                        </div>
        
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center pr-3">
                            <img src="{{ asset('tinydash')}}/assets/avatars/face-1.jpg" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
        
                            <div class="button-wrapper ml-4">
                                
                                <label for="upload" class="btn mb-2 btn-primary mr-1">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                
                                

                                <button type="button" class="btn mb-2 btn-outline-secondary ml-1">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                                </button>
                    
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
        
                            </div>
                            
                        </div>
        
                        <hr class="my-0">
        
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Text</label>
                                <input type="text" id="simpleinput" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">Email</label>
                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-password">Password</label>
                                <input type="password" id="example-password" class="form-control" value="password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-palaceholder">Placeholder</label>
                                <input type="text" id="example-palaceholder" class="form-control" placeholder="placeholder">
                            </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="example-helping">Helping text</label>
                                <input type="text" id="example-helping" class="form-control" placeholder="Input with helping text">
                                <span class="help-block"><small>A block of help text that breaks onto a new line.</small></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-readonly">Readonly</label>
                                <input type="text" id="example-readonly" class="form-control" readonly="" value="Readonly value">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-disable">Disabled</label>
                                <input type="text" class="form-control" id="example-disable" disabled="" value="Disabled value">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-static">Static control</label>
                                <input type="text" readonly="" class="form-control-plaintext" id="example-static" value="j@example.com">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> <!-- / .card -->

                </div>

                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab"> 
                    
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Securtiy </strong>
                        </div>
        
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center pr-3">
                            <img src="{{ asset('tinydash')}}/assets/avatars/face-1.jpg" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
        
                            <div class="button-wrapper ml-4">
                                
                                <label for="upload" class="btn mb-2 btn-primary mr-1">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                
                                <button type="button" class="btn mb-2 btn-outline-secondary ml-1">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                                </button>
                    
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
        
                            </div>
                        </div>
        
                        <hr class="my-0">
        
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Text</label>
                                <input type="text" id="simpleinput" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">Email</label>
                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-password">Password</label>
                                <input type="password" id="example-password" class="form-control" value="password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-palaceholder">Placeholder</label>
                                <input type="text" id="example-palaceholder" class="form-control" placeholder="placeholder">
                            </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="example-helping">Helping text</label>
                                <input type="text" id="example-helping" class="form-control" placeholder="Input with helping text">
                                <span class="help-block"><small>A block of help text that breaks onto a new line.</small></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-readonly">Readonly</label>
                                <input type="text" id="example-readonly" class="form-control" readonly="" value="Readonly value">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-disable">Disabled</label>
                                <input type="text" class="form-control" id="example-disable" disabled="" value="Disabled value">
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-static">Static control</label>
                                <input type="text" readonly="" class="form-control-plaintext" id="example-static" value="j@example.com">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> <!-- / .card -->

                </div>

            </div>

            <!----Table--->

        </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </div>
</main>

@endsection




