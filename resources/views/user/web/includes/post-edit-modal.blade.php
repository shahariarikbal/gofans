<!-- Modal -->
<div class="modal fade" data-backdrop="false" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="exampleModalLabel">Update your post</h2>
            </div>
            <div class="modal-body">
                <form action="{{ url('/newsfeed-update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="newsfeedId" name="id">
                    <img id="edit_img" style="height: 50%" />
                    <div class="image-upload">
                        <input id="edit-file-input" type="file" name="image" onchange="edit_preview_img(event)" accept="image/*" />
                    </div>
                    <input type="hidden" name="status" id="status" value="0">
                    <textarea name="newsfeed_text" autofocus id="newsfeed_text" cols="100" rows="3" class="form-control" placeholder="Write what you wish"></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
