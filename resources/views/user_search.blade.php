<form method="post" action="{{ route('user.find') }}">
    @csrf
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <input type="text" placeholder="role" name="role">
    <br>
    <input type="text" placeholder="email" name="email">
    <br>
    <input type="text" placeholder="password" name="password">
    <br>
    <input type="text" placeholder="address" name="address">
    <br>
    <input type="text" placeholder="sex" name="sex">
    <br>
    <input type="text" placeholder="name" name="name">
    <br>
    <input type="text" placeholder="birth" name="birth">
    <br>
    <input type="submit" name='submit' value='search'>
</form>
