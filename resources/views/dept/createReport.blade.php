@extends("layouts.dept")

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>{{ $dept[0]->name }}</h5>
            </div>
            <div class="card-body">
                <form action="/dept/generate-report/create" method="POST">
                    @csrf
                    <input type="hidden" name="deptId" value="{{ $dept[0]->id }}" />
                    <div class="row"> 
                        <div class="col-md-2 custom-control custom-checkbox mb-2 ml-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck0" name="all" value="all">
                            <label class="custom-control-label" for="customCheck0">All</label>
                        </div> 
                        <div class="col-md-2 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="fdp_meetings" value="fdp_meetings">
                            <label class="custom-control-label" for="customCheck3">FDP Meeting</label>
                        </div> 
                        <div class="col-md-2 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="seminar_organiseds" value="seminar_organiseds">
                            <label class="custom-control-label" for="customCheck5">Seminar Organised</label>
                        </div>  
                        <div class="col-md-2 custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck8" name="major_programmes" value="major_programmes">
                            <label class="custom-control-label" for="customCheck8">Major Programme</label>
                        </div> 
                    </div>
                    <button class="btn btn-danger">Generate Report</button>
                </form>
            </div>
        </div>
    </div>
@endsection