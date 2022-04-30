@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Teachers</h6>
                <a href="{{ route('teachers.create') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-plus"></i> Add</a>
            </div>
            <div class="card-body">
              <table class="table card-text">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($teachers as $teacher )
                      <tr>
                        <th scope="row">{{ $sl++ }}</th>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->department->name }}</td>
                        <td>{{ $teacher->subject->count() }}</td>
                        <td><span class="badge text-white bg-{{ $teacher->active_status == 1 ? 'success' : 'danger' }}">{{ $teacher->active_status == 1 ? 'Active' : 'Deactive'}}</span></td>
                        <td><a href="{{ route('addTeacherSub', ['id'=>$teacher->id, 'dept'=> $teacher->department_id]) }}" class="btn btn-primary">Add Subject</a></td>
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