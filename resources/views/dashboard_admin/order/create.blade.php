<div class="modal fade" id="addOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Order</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="card-body">
			  <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1"></h1>
			  <form action="{{ route('storeOrder')}}" method="POST" enctype="multipart/form-data">
  
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
							<label for="">Pembeli</label>
							<input type="text" name="pesanan_id" class="form-control" placeholder="" style="font-size: 1.3rem"
							
							>
						</div>
				  </div>

				  <div class="col-md-6">
						<div class="form-group">
							<label for="">Nama Barang</label>
							<input type="text" name="barang_id" class="form-control" placeholder="" style="font-size: 1.3rem"
							
							>
						</div>
				  </div>

				  <div class="col-md-6">
						<div class="form-group">
							<label for="">Jumlah</label>
							<input type="text" name="jumlah" class="form-control" placeholder="" style="font-size: 1.3rem"
						  
							>
						</div>
				  </div>

				  <div class="col-md-6">
					  <div class="form-group">
						  <label for="">Jumlah Harga</label>
						  <input type="text" name="jumlah_harga" class="form-control" placeholder="" style="font-size: 1.3rem"
						
						  >
					  </div>
				  </div>

				  <div class="col-md-6">
					  <div class="form-group">
						  <label for="">Restaurant</label>
						  <input type="text" name="id_restoran" class="form-control" placeholder="" style="font-size: 1.3rem"
						
						  >
					  </div>
				  </div>

				  <div class="col-md-6">
					  <div class="form-group">
						  <label for="">Metode Pembayaran</label>
						  <input type="text" name="metode_pembayaran" class="form-control" placeholder="" style="font-size: 1.3rem"
						
						  >
					  </div>
				  </div>
					  <div class="row">
						  <div class="text-center">
							  <a href="/order/index" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
							  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
						  </div>
					  </div>
				  </div>
  
				  
			  </form>
		  </div>
	  </div>
	</div>
  </div>