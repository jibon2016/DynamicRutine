@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header">
              <h3 class="h6 text-uppercase mb-0">Routines</h3>
            </div>
            <div class="card-body ">
              @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
              @endif
              @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

                @php
                    $sl = 1;
                @endphp
              
              @foreach ($routines->groupBy('batch') as $batch)
                  {{$batch->first()->batch}}
                <table border="1" class="mb-5" style="width: 100%;">
                  <thead class="text-center">
                    @if ($batch->unique('shift')->first()->shift == '1')
                      <tr>
                        <td>Time & Day</td>
                        <td>09:00-10:20</td>
                        <td>10:30-11:50</td>
                        <td>11:50-12:00</td>
                        <td>12:00-01:20</td>
                      </tr>
                    @else
                      <tr>
                        <td>Time & Day</td>
                        <td>06:00-06:50</td>
                        <td>06:50-07:40</td>
                        <td>07:40-08:30</td>
                        <td>08:30-09:20</td>
                      </tr>
                    @endif
                      <tr>
                        <td></td>
                        <td>1<sup>st</sup></td>
                        <td>2<sup>nd</sup></td>
                        <td>3<sup>rd</sup></td>
                        <td>4<sup>th</sup></td>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  @foreach ($batch->where('batch',$batch->first()->batch) as $routine )
                  <tr>
                      <td> {{ $routine->day }} </td>
                      @if ($routine->priod == '1st')
                        <td>{{ $routine->subject }}<br> {{ $routine->theory_or_lab == 'lab' ? 'Lab-'. $routine->lab_no : '' }} </td>

                      @else
                        <td></td>
                      @endif
                      @if($routine->priod == '2nd')
                          <td>{{ $routine->subject }}<br> {{ $routine->theory_or_lab == 'lab' ? 'Lab-'. $routine->lab_no : '' }} </td>
                      @else
                      <td></td>
                      @endif
                      @if($routine->priod == '3rd')
                        <td>Break</td>
                      @else
                        <td></td>
                        @endif
                      @if($routine->priod == '4th')
                        <td>{{ $routine->subject }}<br> {{ $routine->theory_or_lab == 'lab' ? 'Lab-'. $routine->lab_no : '' }} </td>
                      @else
                        <td></td>
                      @endif
                      </tr>
                  @endforeach   

                  </tbody>
                  {{ "Cradit: " . $batch->count('cradit') }}
                </table>
                @endforeach
                {{ "Total-Cradit:". $routines->count('cradit') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection

@section('js')
<script src=" {{ asset('asset') }}/js/dropdown.js"></script>
@endsection