<div id="job_library_modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-body login-modal p-3">
                <h5 class="text-white fs-20">Job Library</h5>
            </div>
            <div class="modal-body p-3" style="height: 600px">
                <div class="row mb-3">
                    <div class="col-md-3 ">
                        <select class="form-select" name="search" id="category_load" data-choices data-choices-search-true>
                            @foreach ($get_job_library_category as $category)
                                <option value="{{ $category->jd_category_id }}" {{$category->jd_category_name=="Accounting"?"selected":""}}>{{ $category->jd_category_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-9">
                        <h3 class="d-inline text-muted" id="title">Accounting</h3>

                        <div class="switchToggle float-end">
                            <input type="checkbox" id="switch">
                            <label for="switch">Toggle</label>
                        </div>
                        <span class="float-end pt-1">Select All&nbsp;&nbsp; </span>
                    </div>
                </div>
                <div id="ajax_container">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" id="myInput" class="form-control mb-3" placeholder="Search">
                            <div style="height: 450px;overflow:auto">
                                <ul class="list-group " id="items">
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div id="content" style="height: 500px;overflow:auto">
                                <h5 class="text-muted" style="color: #405189 !important">Job Overview</h5>
                                <hr>
                                <div id="jo">
                                </div>

                                <h5 class="text-muted mt-4" style="color: #405189 !important">Responsibilities</h5>
                                <hr>
                                <div id="resp">
                                </div>

                                <h5 class="text-muted mt-4" style="color: #405189 !important">Requirements</h5>
                                <hr>
                                <div id="req">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary " id="add_to_job_order">Add To This Job</button>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
