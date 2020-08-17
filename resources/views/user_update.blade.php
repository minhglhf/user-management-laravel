@foreach($users as $user)
    <form method="post" action="{{ route('user.update') }}">
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <input type="text" name="id" value="{{ $user->id }}" readonly>
        <br>
        <input type="text" name="role" placeholder="{{ $user->role }}">
        @if($errors->has('role'))
            <p style="color: red">* {{ $errors->first('role') }}</p>
        @endif
        <br>
        <input type="text" name="email" placeholder="{{ $user->email }}">
        @if($errors->has('email'))
            <p style="color: red">* {{ $errors->first('email') }}</p>
        @endif
        <br>
        <input type="text" name="password">
        @if($errors->has('password'))
            <p style="color: red">* {{ $errors->first('password') }}</p>
        @endif
        <br>
        <input type="text" name="address" placeholder="{{ $user->address }}">
        <br>
        <input type="text" name="sex" placeholder="{{ $user->sex }}">
        @if($errors->has('sex'))
            <p style="color: red">* {{ $errors->first('sex') }}</p>
        @endif
        <br>
        <input type="text" name="name" placeholder="{{ $user->name }}">
        @if($errors->has('name'))
            <p style="color: red">* {{ $errors->first('name') }}</p>
        @endif
        <br>
        <input type="text" name="birth" placeholder="{{ $user->birth }}">
        @if($errors->has('birth'))
            <p style="color: red">* {{ $errors->first('birth') }}</p>
        @endif
        <br>
        <input type="submit" name='submit' value='update'>
    </form>
@endforeach
