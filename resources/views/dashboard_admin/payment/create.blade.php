<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Metode Pembayaran</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="card-body">
			  <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1"></h1>
			  <form action="{{ route('storePayment')}}" method="POST" enctype="multipart/form-data">
  
				  {{ csrf_field() }}
				  {{-- <div class="col-md-4">
					  <label for="">Preview Foto</label>
					  <br>
					  <img src="{{ asset('uploads/profile/') }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
					  <div class="form-group mt-2">
						  <label for="inputFotoImage">Find Cover Image</label>
						  <input type="file" name="image" id="inputFotoImage" class="bg-success text-white" style="font-size: 1.5rem;">
					  </div>
					  
				  </div> --}}
  
				  <div class="row">    
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Metode Pembayaran</label>
							<input type="text" name="metode_pembayaran" class="form-control" placeholder="" style="font-size: 1.3rem"
							>
						</div>
					</div>

					  <div class="row">
						  <div class="text-center">
							  <a href="/payment/index" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
							  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
						  </div>
					  </div>
				  </div>
  
				  
			  </form>
		  </div>
	  </div>
	</div>
  </div>