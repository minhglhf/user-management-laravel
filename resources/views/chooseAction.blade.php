<form method="post">
    @csrf
    {{ method_field('DELETE') }}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    Selected Id:
    <input type="text" name="id" value="{{ $user_id}}">
    <br>
    <input type="submit" name="delete" value="delete"  formaction="{{ url('user/delete/' .$user_id) }}">
</form>
<form method="post">
    @csrf
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <br>
    <input type="submit" name="edit" value="edit"  formaction="{{ url('user/edit/' .$user_id) }}">
</form>

