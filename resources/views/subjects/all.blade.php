@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Subjects</h6>
                <a href="{{ route('subjects.create') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-plus"></i> Add</a>
            </div>
            <div class="card-body">
              <table class="table card-text">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Curse Code</th>
                    <th>Cradit</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($subjects as $subject )
                  <tr>
                      <th scope="row">{{ $sl++ }}</th>
                      <td>{{ $subject->course_name }}</td>
                      <td>{{ $subject->course_code }}</td>
                      <td>{{ $subject->course_cradit }}</td>
                      <td>{{ $subject->theory_or_lab }}</td>
                      <td><a href=" {{ route('subjects.edit', ['subject'=> $subject->id]) }} " class="btn btn-blue text-white"><i class="fa-solid fa-pen-to-square"></i></a></td>
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