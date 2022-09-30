<div class="modal fade" id="addResto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Profil Restaurant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card-body">
					<h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1"></h1>
					<form action="{{ route('storeRestaurant')}}" method="POST" enctype="multipart/form-data">

						{{ csrf_field() }}
						<div class="col-md-4">
							<label for="">Preview Foto</label>
							<br>
							<img src="{{ asset('uploads/resto/') }}" alt id="previewFoto"
								style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
							<div class="form-group mt-2">
								<label for="inputFotoImage">Find Cover Image</label>
								<input type="file" name="foto" id="inputFotoImage" class="bg-success text-white"
									style="font-size: 1.5rem;">
							</div>

						</div>

						<div class="col-md-4">
							<label for="">Preview Cover</label>
							<br>
							<img src="{{ asset('uploads/resto/') }}" alt id="previewCover"
								style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
							<div class="form-group mt-2">
								<label for="inputCoverImage">Find Cover Image</label>
								<input type="file" name="cover" id="inputCoverImage" class="bg-success text-white"
									style="font-size: 1.5rem;">
							</div>
						</div>

						<div class="row">

							{{-- <div class="col-md-6">
								<div class="form-group">
									<label for="">Nama Restaurant</label>
									<input type="text" name="nama_restoran" class="form-control" placeholder="ex: KFC"
										style="font-size: 1.3rem" value="{{ $resto->nama_restoran }}">
								</div>
							</div> --}}
							<div class="form-group">
								<label for="id">User</label>
								<select class="form-control" name="id_user" id="id_user" required="required">
									@foreach ($users as $u)
									@if ($u->role == 'Seller')
									<option value="{{$u->id}}">{{$u->id}}
									</option>
									@endif
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="id">Restaurant</label>
								<input type="text" name="nama_restoran" class="form-control"
								placeholder="ex: Dhoe" style="font-size: 1.3rem"
								{{-- value="{{ $resto->nama_restoran }}" --}}
								>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="">Estimasi Pemesanan</label>
									<input type="text" name="waktu_pemesanan" class="form-control"
										placeholder="ex: Dhoe" style="font-size: 1.3rem"
										{{-- value="{{ $resto->waktu_pemesanan }}" --}}
										>
								</div>
							</div>

							<div class="col-md-8">
								<div class="form-group">
									<label for="">Alamat</label>
									<input name="alamat" type="text" class="form-control" style="font-size: 1.3rem"
										{{-- value="{{ $resto->alamat }}" --}}
										>
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="">Email</label>
									<input name="email" type="text" class="form-control" style="font-size: 1.3rem"
										{{-- value="{{ $resto->alamat }}" --}}
										>
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Kategori</label>
									<select class="form-control" name="kategori" id="kategori" required="required">
										@foreach ($tbl_kategoris as $kategori)
										<option value="{{$kategori->nama_kategori}}">{{$kategori->nama_kategori}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Kota</label>
									<input name="kota" type="text" class="form-control" placeholder="ex: Jakarta"
										style="font-size: 1.3rem" 
										{{-- value="{{ $resto->kota }}" --}}
										>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">No Hp</label>
									<input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********"
										style="font-size: 1.3rem" 
										{{-- value="{{ $resto->no_hp }}" --}}
										>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Zip Code</label>
									<input name="zipcode" type="text" class="form-control"
										style="font-size: 1.3rem"
										{{-- value="{{ $resto->zipcode }}" --}}
									>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Author</label>
									<input name="author" type="text" class="form-control"
									style="font-size: 1.3rem" class="text-info"
									value="{{ Auth::user()->name }}" 
										>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Jam Buka</label>
									<input name="jam_kerja" type="text" class="form-control"
										style="font-size: 1.3rem"
									>
								</div>
							</div>
							<div class="row">
								<div class="text-right">
									<a href="/resto/index" class="btn btn-outline-success mr-2" role="button"><i
											class="fa fa-ban"></i></a>
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
								</div>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>