@extends('Admin.layouts.app')
@section('content')
<section class="content">
	<div class="box" id="checkin">
		<div class="box-header">
			<h3 class="box-title">KAMAR NOMOR : <b>{{$kamar->nomor_kamar}}</b></h3>
		</div>
		<form method="POST" enctype="multipart/form-data" action="{{url('admin/checkin/store')}}">
			{{ csrf_field() }} 
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="invoice_id" value="{{$no_invoice}}" readonly>
						</div>
						<div class="alert alert-info">
							<h4>STANDART</h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>{{$kamar->typekamar->harga_malam_format}}</b></li>
								<li>Maximal Orang Dewasa : <b>{{$kamar->max_dewasa}} Orang</b></li>
								<li>Maximal Anak-anak : <b>{{$kamar->max_anak}} Orang</b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu</label>
							<select class="form-control nama_tamu" name="tamu_id" v-model="dataInput.tamu_id">
								<option selected="selected" value="0">--Pilih--</option>
								@foreach($tamu as $dt)
								<option value="{{$dt->id}}">{{$dt->nama}}</option>
								@endforeach
							</select>
							
						</div>
						<div class="well">
							<a href="{{url('admin/tamu')}}"><b>Klik disini</b></a> jika nama tamu yang dimaksud tidak ditemukan untuk ditambah pada daftar buku tamu.
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Jumlah Tamu</label>
							<div class="row">
								<div class="col-sm-6">
									<select class="form-control" name="jumlah_dewasa" v-model="dataInput.jumlah_dewasa">
										<option value="0">- Dewasa -</option>
										@for($i= 1;$i <= $kamar->max_dewasa;$i++)
										<option value="{{$i}}">{{$i}} Orang</option>
										@endfor
									</select>
									
								</div>
								<div class="col-sm-6">
									<select class="form-control" name="jumlah_anak" v-model="dataInput.jumlah_anak">
										<option value="0">- Anak-anak -</option>
										@for($i= 1;$i <= $kamar->max_anak;$i++)
										<option value="{{$i}}">{{$i}} Orang</option>
										@endfor
									</select>
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-In</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="tgl_checkin" value="{{date('Y-m-d')}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkin" value="{{date('h:i')}}" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-Out</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="datepicker" class="form-control" name="tgl_checkout" data-date-format="yyyy-mm-dd" readonly>
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="12:00" readonly >
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Jumlah Deposit (Rp)</label>
							<input type="number" class="form-control" name="deposit">
							
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="kamar_id" value="{{$kamar->id}}">
				<button class="btn btn-success" type="submit">Check In</button>
				<a class="btn btn-warning" href="">Batal</a>
			</div>
		</form>
	</div>



</section>
@endsection