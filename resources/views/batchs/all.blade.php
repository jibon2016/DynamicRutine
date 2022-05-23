@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">Batchs</h6>
                <a href="{{ route('batchs.create') }}" class="btn btn-blue text-white justify-content-end"><i class="fa-solid fa-plus"></i> Add</a>
            </div>
            <div class="card-body">
              <table class="table card-text">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Shift</th>
                    <th class="text-center" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($batchs as $batch )
                      <tr>
                        <th scope="row">{{ $sl++ }}</th>
                        <td>{{ $batch->name }}</td>
                        <td>{{ $batch->department->name }}</td>
                        <td>{{ $batch->shift_id == 1 ? '1st' : '2nd' }}</td>
                        <td><a href=" {{ route('batchs.edit', ['batch'=> $batch->id]) }} " class="btn btn-blue text-white"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                          <form method="POST" action=" {{ route('batchs.destroy', $batch->id) }} ">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white"><i class="fa-solid fa-trash-can"></i></button>
                          </form>
                        </td>
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