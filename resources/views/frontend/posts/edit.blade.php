<form id="editForm" method="post" action="/post/update/{{ $post->id }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="editedContent">Title</label>
        <input type="text" class="form-control" name="title" id="editedContent" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="editedContent">Content</label>
        <input type="text" class="form-control" name="content" id="editedContent" value="{{ $post->content }}">
    </div>
    <div class="form-group">
        <label for="editedContent">Image</label>
        <input type="text" class="form-control" name="image" id="editedContent">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

