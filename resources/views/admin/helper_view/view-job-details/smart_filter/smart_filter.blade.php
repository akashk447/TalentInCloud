<form action="{{route('candidate_smart_filteration')}}" method="post">
    @csrf
    <input type="hidden" name="filter_job_id" value="{{$job_details->job_id}}">
    <div class="d-flex align-items-center mb-3">
        <div class="flex-grow-1">
            <div class="">
                <h5 class="fs-16 mb-1 text-muted"> <span class="me-2"><i
                            class="ri-filter-2-line fs-25 text-muted align-middle"></i></span>Smart Filter </h5>
            </div>
        </div>
        <div class="flex-shrink-0 ms-2">
            <div class="form-check form-switch form-switch-right form-switch-md">
                <label for="form-grid-showcode" class="form-label text-muted font-11"></label>
                <input class="form-check-input code-switcher" name="smart_filter_type" type="checkbox" checked id="form-grid-showcode">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-1">
            <div class="input-group mt-3">
                <input type="text" class="form-control" name="smart_filter_name" id="smart_filter_name" value="{{isset($filter)?$filter:""}}">
                <button type="button" id="filter" class="input-group-text"><i class="ri-search-line fs-15"></i></button>
            </div>
        </div>
    </div>
</form>
