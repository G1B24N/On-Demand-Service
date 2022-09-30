<div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Profile User</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="card-body">
			  <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1"></h1>
			  <form action="{{ route('editUser', ['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
  
				  {{ csrf_field() }}
				  <div class="col-md-4">
					  <label for="">Preview Foto</label>
					  <br>
					  <img src="{{ asset('uploads/profile/'.$user->image) }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px; ">
					  <div class="form-group mt-2">
						  <label for="inputFotoImage">Find Cover Image</label>
						  <input type="file" name="image" id="inputFotoImage" class="bg-success text-white" style="font-size: 1.5rem;">
					  </div>
					  
				  </div>
  
				  <div class="row">
  
					  <div class="col-md-6">
						  <div class="form-group">
							  <label for="">Name</label>
							  <input type="text" name="name" class="form-control" placeholder="" style="font-size: 1.3rem"
							  value="{{ $user->name }}"  
							  >
						  </div>
					  </div>

					  <div class="col-md-6">
						  <div class="form-group">
							  <label for="">email</label>
							  <input type="email" name="email" class="form-control" placeholder="" style="font-size: 1.3rem"
							  value="{{ $user->email }}"  
							  >
						  </div>
					  </div>

					  <div class="col-md-6">
						  <div class="form-group">
							  <label for="">password</label>
							  <input type="password" name="password" class="form-control" placeholder="" style="font-size: 1.3rem"
							  value="{{ $user->password }}"  
							  >
						  </div>
					  </div>
  
					  {{-- <div class="col-md-mt-6">
						  <div class="form-group">
							  <label for="">Role</label>
							  <input name="role" type="text" class="form-control" placeholder="" style="font-size: 1.3rem"
								  value="{{ $restorans->kota }}" 
								  >
						  </div>
					  </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">role</label>
                                <select class="form-control" name="role" id="role"  required="required">
                                    <option value="{{ $user->role}}">{{$user->role}}</option>
                                    {{-- <option value="seller">Seller</option>
                                    <option value="driver">Driver</option> --}}
                                </select>
                            </div>
                        </div>
					  <div class="row">
						  <div class="text-center">
							  <a href="/resto/index" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
							  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
						  </div>
					  </div>
				  </div>
  
				  
			  </form>
		  </div>
	  </div>
	</div>
  </div>