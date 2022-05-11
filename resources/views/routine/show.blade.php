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
              
              <table class="table card-text">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($routines->unique('batch_no') as $routine )
                      <tr>
                        <th scope="row">{{ $sl++ }}</th>
                        <td>{{ $routine->department->name }}</td>
                        <td> @foreach ($routines->where('batch_no', $routine->batch_no)->unique('batch')  as $batch)
                            {{ $batch->batch. "," }}
                        @endforeach </td>
                        <td><a href=" {{ route('routineApprove', ['batch_no'=> $routine->batch_no ]) }} " class="btn btn-success {{ $routine->admin_aprove == 1 ? 'disabled' : '' }} text-white">Appprove</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
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