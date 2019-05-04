@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Pilih Kamar
    <small>List Kamar</small>
  </h1> 
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
      <div class="row">
     @foreach($data as $room)
        <div class="col-sm-3">
          @if ($room->typekamar->nama === 'Standart')
          <div class="small-box bg-green">
            @elseif ($room->typekamar->nama === 'Deluxe')
            <div class="small-box bg-aqua">
              @elseif ($room->typekamar->nama === 'Superior')
              <div class="small-box bg-blue">
                @elseif ($room->typekamar->nama === 'Junior Suite')
                <div class="small-box bg-orange">
                  @elseif ($room->typekamar->nama === 'Suite Room')
                  <div class="small-box bg-maroon">
                    @elseif ($room->typekamar->nama === 'Presidential')
                    <div class="small-box bg-red">
                      @endif
                      <div class="inner">
                        <h3>{{$room->nomor_kamar}}</h3>
                        <p>{{$room->typekamar->nama}}</p>
                        <p>{{$room->lantais->nama}}</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-bed"></i>
                      </div>
                      <a href="{{ url('admin/'.$title.'/create/'.$room->id) }}" class="small-box-footer">
                        Pilih Kamar <i class="fa fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  @endforeach
                </div> 
              </div>
            </div>
          </section>
          @endsection