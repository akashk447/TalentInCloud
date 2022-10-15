<!DOCTYPE html>
<html lang="en">

<head>
    <title>JD | Talent In Cloud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/snackbar.min.css') }}">
    <script src="{{ asset('assets/js/snackbar.min.js') }}"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Add JD Library</h2>
        <form action="{{ route('submit_data') }}" method="POST" id="post_form">
            <div class="row">
                <div class="col-md-5">
                    <div class="mb-3 mt-3">
                        <label for="email">Select Category:</label>
                        <select class="form-select " aria-label=".form-select-sm example" name="category_id">
                            <option disabled selected>Open this select menu</option>
                            @foreach ($get_parent_category as $category)
                                <option value="{{ $category->jd_category_id }}">{{ $category->jd_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Enter Sub Category</label>
                        <input type="text" class="form-control" id="pwd" placeholder="Enter Sub Category"
                            name="sbc_name">
                    </div>
                    <div class="mb-3">
                        <label for="pwd">Content Type</label>
                        <select class="form-select " aria-label=".form-select-sm example" name="content_type">
        
                            <option value="Job Overview">Job Overview</option>
                            <option value="Responsibilities">Responsibilities</option>
                            <option value="Requirements">Requirements</option>
        
                        </select>
                    </div>
                </div>
                <div class="col-md-7">

                    <div class="mb-3 text-end">
                        <label for="pwd">Content List</label>
                        <textarea class="form-control" rows="20" name="content_list" id="content_list"></textarea>
        
                        <button type="button" class="btn btn-primary mt-3 " id="submit_form">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#submit_form').click(function(e) {
            // e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('#post_form')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('submit_data') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == "success") {
                        $('#content_list').val("")
                        console.log(response)
                        Snackbar.show({
                            text: 'Uploaded Successfully !',
                            pos: 'bottom-center'
                        });
                    }
                }
            });

        });
    </script>
</body>

</html>
