@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Edit Batch</h6>
                <a href="{{ route('batchs.index') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
              <form action="{{ route('batchs.update', ['batch'=> $batch->id]) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Department </label>
                  <div class="col-md-9">
                    <select name="department_id" class="form-control" >
                      <option value="0">--- Select ---</option>
                      @foreach ($departments as $department )
                      <option value="{{ $department->id}}"  {{$batch->department_id == $department->id ? "selected": ""}}>{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="line"></div>

                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Batch Name</label>
                  <div class="col-md-9">
                    <input type="text" value=" {{ $batch->name}} " name="name" class="form-control">
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Semister</label>
                  <div class="col-md-9">
                    <select name="running_semister" class="form-control" >
                      <option value="">--- Select ---</option>
                      <option value="1st" {{$batch->running_semister == "1st" ? "selected": ""}}>1<sup>st</sup></option>
                      <option value="2nd" {{$batch->running_semister == "2nd" ? "selected": ""}}>2<sup>nd</sup></option>
                      <option value="3rd" {{$batch->running_semister == "3rd" ? "selected": ""}}>3<sup>rd</sup></option>
                      <option value="4th" {{$batch->running_semister == "4th" ? "selected": ""}}>4<sup>th</sup></option>
                      <option value="5th" {{$batch->running_semister == "5th" ? "selected": ""}}>5<sup>th</sup></option>
                      <option value="6th" {{$batch->running_semister == "6th" ? "selected": ""}}>6<sup>th</sup></option>
                      <option value="7th" {{$batch->running_semister == "7th" ? "selected": ""}}>7<sup>th</sup></option>
                      <option value="8th" {{$batch->running_semister == "8th" ? "selected": ""}}>8<sup>th</sup></option>
                      <option value="9th" {{$batch->running_semister == "9th" ? "selected": ""}}>9<sup>th</sup></option>
                      <option value="10th" {{$batch->running_semister == "10th" ? "selected": ""}}>10<sup>th</sup></option>
                      <option value="11th" {{$batch->running_semister == "11th" ? "selected": ""}}>11<sup>th</sup></option>
                      <option value="12th" {{$batch->running_semister == "12th" ? "selected": ""}}>12<sup>th</sup></option>
                    </select>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Shift</label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="customRadioInline1" {{$batch->shift_id == '1' ? "checked": ""}} value="1" type="radio" name="shift_id" class="custom-control-input">
                      <label for="customRadioInline1" class="custom-control-label">1<sup>st</sup></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="customRadioInline2" value="2" {{$batch->shift_id == '2' ? "checked": ""}} type="radio" name="shift_id" class="custom-control-input">
                      <label for="customRadioInline2" class="custom-control-label">2<sup>nd</sup></label>
                    </div>
                  </div>
                </div>

                <div class="line"></div>
                <div class="form-group row">
                  <label class="col-md-3 form-control-label">Active Status</label>
                  <div class="col-md-9">
                    <label class="checkbox-inline">
                      <input {{$batch->active_status == 1 ? "checked": ""}}  id="inlineCheckbox1" type="checkbox" name="active_status"> Active
                    </label>
                  </div>
                </div>
                <div class="line"></div>
                <div class="form-group col-md-12 ">
                  <div class="pl-3 ml-auto">
                    <a href="{{ route('subjects.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
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