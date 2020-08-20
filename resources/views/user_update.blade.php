@foreach($users as $user)
    <form method="POST" action="{{ route('user.update') }}">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="text" name="id" value="{{ $user->id }}" readonly>
        <br>
        <input type="text" name="role" placeholder="{{ $user->role }}" value="{{ old('role') }}">
        @if($errors->has('role'))
            <p style="color: red">* {{ $errors->first('role') }}</p>
        @endif
        <br>
        <input type="text" name="email" placeholder="{{ $user->email }}" value="{{ old('email') }}">
        @if($errors->has('email'))
            <p style="color: red">* {{ $errors->first('email') }}</p>
        @endif
        <br>
        <input type="text" name="password" value="{{ old('password') }}">
        @if($errors->has('password'))
            <p style="color: red">* {{ $errors->first('password') }}</p>
        @endif
        <br>
        <input type="text" name="address" placeholder="{{ $user->address }}"value="{{ old('address') }}">
        <br>
        <input type="text" name="sex" placeholder="{{ $user->sex }}" value="{{ old('sex') }}">
        @if($errors->has('sex'))
            <p style="color: red">* {{ $errors->first('sex') }}</p>
        @endif
        <br>
        <input type="text" name="name" placeholder="{{ $user->name }}" value="{{ old('name') }}">
        @if($errors->has('name'))
            <p style="color: red">* {{ $errors->first('name') }}</p>
        @endif
        <br>
        <input type="text" name="birth" placeholder="{{ $user->birth }}" value="{{ old('birth') }}">
        @if($errors->has('birth'))
            <p style="color: red">* {{ $errors->first('birth') }}</p>
        @endif
        <br>
        <input type="submit" name='submit' value='update'>
    </form>
@endforeach
