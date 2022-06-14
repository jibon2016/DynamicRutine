@extends('layouts.app')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-3">
      <div class="row">
        <div class="col-lg-12 mb-5">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-uppercase mb-0">{{ $teacher->name }}</h6>
                <p id="dept" hidden>{{ $teacher->department_id }}</p>
              </div>
            <div class="card-body">
              <form action="/addTeacherSub" method="POST">
                @csrf
                <div class="row d-flex align-items-start" id="myTab">
                  <div class="col-md-3 nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-1st-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1st" href="#v-pills-1st" role="tab" aria-controls="v-pills-1st" aria-selected="true">1st Semister</a>
                    <a class="nav-link" id="v-pills-2nd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2nd" href="#v-pills-2nd" role="tab" aria-controls="v-pills-2nd" aria-selected="false">2nd Semister</a>
                    <a class="nav-link" id="v-pills-3rd-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3rd" href="#v-pills-3rd" role="tab" aria-controls="v-pills-3rd" aria-selected="false">3rd Semister</a>
                    <a class="nav-link" id="v-pills-4th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4th" href="#v-pills-4th" role="tab" aria-controls="v-pills-4th" aria-selected="false">4th  Semister</a>
                    <a class="nav-link" id="v-pills-5th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5th" href="#v-pills-5th" role="tab" aria-controls="v-pills-5th" aria-selected="false">5th  Semister</a>
                    <a class="nav-link" id="v-pills-6th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6th" href="#v-pills-6th" role="tab" aria-controls="v-pills-6th" aria-selected="false">6th  Semister</a>
                    <a class="nav-link" id="v-pills-7th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-7th" href="#v-pills-7th" role="tab" aria-controls="v-pills-7th" aria-selected="false">7th  Semister</a>
                    <a class="nav-link" id="v-pills-8th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-8th" href="#v-pills-8th" role="tab" aria-controls="v-pills-8th" aria-selected="false">8th  Semister</a>
                    <a class="nav-link" id="v-pills-9th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-9th" href="#v-pills-9th" role="tab" aria-controls="v-pills-9th" aria-selected="false">9th  Semister</a>
                    <a class="nav-link" id="v-pills-10th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-10th" href="#v-pills-10th" role="tab" aria-controls="v-pills-10th" aria-selected="false">10th  Semister</a>
                    <a class="nav-link" id="v-pills-11th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-11th" href="#v-pills-11th" role="tab" aria-controls="v-pills-11th" aria-selected="false">11th  Semister</a>
                    <a class="nav-link" id="v-pills-12th-tab" data-bs-toggle="pill" data-bs-target="#v-pills-12th" href="#v-pills-12th" role="tab" aria-controls="v-pills-12th" aria-selected="false">12th  Semister</a>
                  </div>
                  <div class="col-md-9 tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1st" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '1st')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-2nd" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '2nd')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-3rd" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '3rd')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-4th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '4th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-5th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '5th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-6th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '6th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-7th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '7th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-8th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '8th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-9th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '9th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-10th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '10th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-11th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '11th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    <div class="tab-pane" id="v-pills-12th" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      @foreach ($subjects as $subject )
                        @if ($subject->semister == '12th')
                          <label> <input type="checkbox" {{ $subject->teacher->where('id', $teacher->id)->count() == 1 ? 'checked': '' }}  name="subject[]" value=" {{ $subject->id }} "> {{ $subject->course_name }} </label><br>
                        @endif
                      @endforeach
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer  d-flex justify-content-end">
                  <input type="hidden" name="teacher" value=" {{ $teacher->id }} ">
                  <input type="submit" value="Add Subject" class="btn btn-success">
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
<script>
  var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
  triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
      event.preventDefault()
      tabTrigger.show()
    })
    // triggerEl.addEventListener('change', function (event) {
    //   let count = 1;
    //   count ++;
    //   console.log(count);
    // }

  })
</script>

<script src=" {{ asset('asset') }}/js/dropdown.js"></script>
@endsection