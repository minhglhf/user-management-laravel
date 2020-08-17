<form method="post">
    @csrf
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Selete Id:
    <input type="text" name="id" value="{{ $user_id}}" readonly>
    <br>
    <input type="submit" name="edit" value="edit" formaction="{{ url('user/edit') }}">
    <input type="submit" name="delete" value="delete" formaction="{{ url('user/delete') }}">
</form>
