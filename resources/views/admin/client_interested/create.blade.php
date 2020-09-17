<!-- Modal -->
<div class="modal fade" id="clientInterestedModal" tabindex="-1" role="dialog" aria-labelledby="clientInterestedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientInterestedModalLabel">Create Client Interested</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                        <small class="help-block error text-danger" id="title_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Short description..."></textarea>
                        <small class="help-block error text-danger" id="description_error"></small>
                    </div>
                    <div class="form-group">
                        <h5>Status<span class="text-danger">*</span></h5>
                        <select class="form-control" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveClientInterested">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    /*Save client interested*/
    let error = 0;

    function validate() {
        if (document.getElementById('title').value == "") {
            document.getElementById("title_error").innerHTML = "Title field is required";
            error++
        }
        if (document.getElementById('description').value == "") {
            document.getElementById("description_error").innerHTML = "Description field is required";
            error++
        }
        if (document.getElementById('status').value == "") {
            document.getElementById("status_error").innerHTML = "Status field is required";
            error++
        }
    }
    function reset_error() {
        error = 0
        document.getElementById("title_error").innerHTML = "";
        document.getElementById("description_error").innerHTML = "";
        // document.getElementById("status_error").innerHTML = "";
    }

    document.getElementById('saveClientInterested').addEventListener("click", function (e) {
        reset_error()
        validate()

        let data = {
            title : document.getElementById('title').value,
            description : document.getElementById('description').value,
            status : document.getElementById('status').value,
        }

        axios.post('/client/interested', data)
            .then(function (response) {
                if(response.status === 201) {
                    $('#clientInterestedModal').modal('hide')
                    window.location.reload()
                    toastr.success('Client Interested insert Successful.. !!', {
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut",
                        "progressBar": true,
                        timeOut: 3000
                    });
                }
            })
            .catch(function (error) {
                if(error.response.status === 422) {
                    if(error.response.data.title && error.response.data.title.length > 0){
                        document.getElementById("title_error").innerHTML = error.response.data.title[0]
                    }
                    if(error.response.data.description && error.response.data.description.length > 0){
                        document.getElementById("description_error").innerHTML = error.response.data.description[0]
                    }
                }
            })
    })
</script>
