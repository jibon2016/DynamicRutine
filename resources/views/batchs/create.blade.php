@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Create Batch</h6>
                <a href="{{ route('batchs.index') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
              <form action="{{ route('batchs.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Department </label>
                  <div class="col-md-9">
                    <select name="department_id" class="form-control" >
                      <option value="0">--- Select ---</option>
                      @foreach ($departments as $department )
                      <option value="{{ $department->id}}">{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Batch Name</label>
                  <div class="col-md-9">
                    <input type="text" name="name" class="form-control" placeholder="Batch Name">
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Running Semister</label>
                  <div class="col-md-9">
                    <select name="running_semister" class="form-control" >
                      <option value="">--- Select ---</option>
                      <option value="1st">1<sup>st</sup></option>
                      <option value="2nd">2<sup>nd</sup></option>
                      <option value="3rd">3<sup>rd</sup></option>
                      <option value="4th">4<sup>th</sup></option>
                      <option value="5th">5<sup>th</sup></option>
                      <option value="6th">6<sup>th</sup></option>
                      <option value="7th">7<sup>th</sup></option>
                      <option value="8th">8<sup>th</sup></option>
                      <option value="9th">9<sup>th</sup></option>
                      <option value="10th">10<sup>th</sup></option>
                      <option value="11th">11<sup>th</sup></option>
                      <option value="12th">12<sup>th</sup></option>
                    </select>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Shift</label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="customRadioInline1" value="1" type="radio" name="shift_id" class="custom-control-input">
                      <label for="customRadioInline1" class="custom-control-label">1<sup>st</sup></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="customRadioInline2" value="2" type="radio" name="shift_id" class="custom-control-input">
                      <label for="customRadioInline2" class="custom-control-label">2<sup>nd</sup></label>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Active Status</label>
                  <div class="col-md-9">
                    <label class="checkbox-inline">
                      <input id="inlineCheckbox1" type="checkbox" name="active_status"> Active
                    </label>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group col-md-12 ">
                  <div class="pl-3 ml-auto">
                    <a href="{{ route('batchs.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
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