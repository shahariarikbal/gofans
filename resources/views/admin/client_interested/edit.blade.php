<!-- Modal -->
<div class="modal fade" id="editClientInterestedModal" tabindex="-1" role="dialog" aria-labelledby="editClientInterestedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientInterestedModalLabel">Update Client Interested</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" id="clientInterestedId" name="id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control" placeholder="Title">
                        <small class="help-block error text-danger" id="edit_title_error"></small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="editDescription" rows="3" placeholder="Short description..."></textarea>
                        <small class="help-block error text-danger" id="edit_description_error"></small>
                    </div>
                    <div class="form-group">
                        <h5>Status<span class="text-danger">*</span></h5>
                        <select class="form-control" name="status" id="editStatus">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="editClientInterested">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    /*Edit client interested*/
    let edit_error = 0;

    function edit_validate() {
        if (document.getElementById('editTitle').value == "") {
            document.getElementById("edit_title_error").innerHTML = "Title field is required";
            edit_error++
        }
        if (document.getElementById('editDescription').value == "") {
            document.getElementById("edit_description_error").innerHTML = "Description field is required";
            edit_error++
        }
    }
    function edit_reset_error() {
        error = 0
        document.getElementById("edit_title_error").innerHTML = "";
        document.getElementById("edit_description_error").innerHTML = "";
    }
    function clientInterestedEdit(el) {
        axios.get('interested/'+el.getAttribute('data-id') +'/edit')
            .then(response => {
                console.log(response);
                document.getElementById('clientInterestedId').value = el.getAttribute('data-id');
                document.getElementById('editTitle').value = response.data.title;
                document.getElementById('editDescription').value = response.data.description;
                document.getElementById('editStatus').value = response.data.status;
            })
            .catch(error => {
                console.log(error)
            })
    }

    /*Update client interested*/
    document.getElementById('editClientInterested').addEventListener('click', function (e) {
        edit_reset_error()
        edit_validate()

        let data = {
            title : document.getElementById('editTitle').value,
            description : document.getElementById('editDescription').value,
            status : document.getElementById('editStatus').value,
        }

        axios.put('/client/interested/'+document.getElementById('clientInterestedId').value, data)

            .then(function (response) {
                console.log(response)
                if(response.status === 200) {
                    $('#editClientInterestedModal').modal('hide')
                    window.location.reload()
                    toastr.success('Client Interested update Successful.. !!', {
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
                        document.getElementById("edit_title_error").innerHTML = error.response.data.title[0]
                    }
                    if(error.response.data.description && error.response.data.description.length > 0){
                        document.getElementById("edit_description_error").innerHTML = error.response.data.description[0]
                    }
                }
            })
    })
</script>
