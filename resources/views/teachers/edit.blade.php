@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Edit Teacher</h6>
                <a href="{{ route('teachers.index') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
              <form action="{{ route('teachers.update', $teacher->id ) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Department </label>
                  <div class="col-md-9">
                    <select name="department_id" class="form-control" >
                      <option value="0">--- Select ---</option>
                      @foreach ($departments as $department )
                      <option value="{{ $department->id}}"  {{$teacher->department_id == $department->id ? "selected": ""}}>{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Teacher Name</label>
                  <div class="col-md-9">
                    <input type="text" value=" {{ $teacher->name }} " name="name" class="form-control" placeholder="Teacher Name">
                  </div>
                </div>
                <div class="line"></div>
                
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Active Status</label>
                  <div class="col-md-9">
                    <label class="checkbox-inline">
                      <input {{$teacher->active_status == 1 ? "checked": ""}}  id="inlineCheckbox1" type="checkbox" name="active_status"> Active
                    </label>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group col-md-12 ">
                  <div class="pl-3 ml-auto">
                    <a href="{{ route('teachers.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </form>
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