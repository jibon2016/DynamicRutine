@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header">
              <h3 class="h6 text-uppercase mb-0">Create Routine</h3>
            </div>
            <div class="card-body ">
              <form class="form-horizontal row ">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <label class="col-md-3 form-control-label text-uppercase">Select Department</label>
                    <div class=" select mb-3">
                      <select name="department" id="department" class="form-control" data-dependent="shift">
                        <option value="0">--- Select ---</option>
                        @foreach ($departments as $department )
                        <option value="{{ $department->id}}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                    </div>              
                </div>
                <div class="form-group col-lg-6">
                    <label class="col-md-3 form-control-label text-uppercase">Shift</label>
                    <div class=" select mb-3">
                      <select name="shift" id="shift" class="form-control" data-dependent="session">
                        <option>--- Select ---</option>
                      </select>
                    </div>              
                </div>
                <div class="form-group col-lg-6">
                    <label class="col-md-3 form-control-label text-uppercase">Session</label>
                    <div class=" select mb-3">
                      <select name="session" id="session" class="form-control" data-dependent="batch">
                        <option>--- Select ---</option>
                      </select>
                    </div>              
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-md-3 form-control-label text-uppercase">Batch</label>
                    <div class="col-md-12" id="batch">
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1"  type="checkbox" value="option1"> test
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test1
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test2
                      </label>
                    </div>              
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-md-3 form-control-label text-uppercase">Teacher</label>
                    <div class="col-md-12" id="batch">
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1"  type="checkbox" value="option1"> test
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test1
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test2
                      </label>
                    </div>               
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-md-3 form-control-label text-uppercase">Subject</label>
                    <div class="col-md-12" id="batch">
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1"  type="checkbox" value="option1"> test
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test1
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test2
                      </label>
                    </div>               
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-md-6 form-control-label text-uppercase">Class Room</label>
                    <div class="col-md-12" id="batch">
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1"  type="checkbox" value="option1"> test
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test1
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test2
                      </label>
                    </div>                
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-md-6 form-control-label text-uppercase">Lab Room</label>
                    <div class="col-md-12" id="batch">
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1"  type="checkbox" value="option1"> test
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test1
                      </label>
                      <label class="checkbox-inline mx-2">
                        <input id="inlineCheckbox1" type="checkbox" value="option1"> test2
                      </label>
                    </div>             
                </div>
                <div class="form-group col-md-12 ">
                  <div class="pl-3 ml-auto">
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