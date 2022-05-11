@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                <h6 class="mb-0">Total Subject</h6><span class="text-gray"> {{ $routine->groupBy('subject')->count() }} </span>
                </div>
            </div>
            <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-green"></div>
                <div class="text">
                <h6 class="mb-0">Total Batch</h6><span class="text-gray"> {{ $routine->groupBy('batch')->count() }} </span>
                </div>
            </div>
            <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
            <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-green"></div>
                <div class="text">
                <h6 class="mb-0">Total Cradit</h6><span class="text-gray"> {{ $routine->count('cradit') }} </span>
                </div>
            </div>
            <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
            </div>
        </div>

        </div>
    </section>
    </div>
</div>
@endsection 


