<form method="post" action="{{ route('user.store') }}">
    @csrf
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <input type="text" placeholder="role" name="role" value="{{ old('role') }}">
    @if($errors->has('role'))
        <p style="color: red">* {{ $errors->first('role') }}</p>
    @endif
    <br>
    <input type="text" placeholder="email" name="email" value="{{ old('email') }}">
    @if($errors->has('email'))
        <p style="color: red">* {{ $errors->first('email') }}</p>
    @endif
    <br>
    <input type="password" placeholder="password" name="password" value="{{ old('password') }}">
    @if($errors->has('password'))
        <p style="color: red">* {{ $errors->first('password') }}</p>
    @endif
    <br>
    <input type="password" placeholder="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}">
    @if($errors->has('confirmPassword'))
        <p style="color: red">* {{ $errors->first('confirmPassword') }}</p>
    @endif
    <br>
    <input type="text" placeholder="address" name="address" value="{{ old('address') }}">
    <br>
    <input type="text" placeholder="sex" name="sex" value="{{ old('sex') }}">
    @if($errors->has('sex'))
        <p style="color: red">* {{ $errors->first('sex') }}</p>
    @endif
    <br>
    <input type="text" placeholder="name" name="name" value="{{ old('name') }}">
    @if($errors->has('name'))
        <p style="color: red">* {{ $errors->first('name') }}</p>
    @endif
    <br>
    <input type="text" placeholder="birth" name="birth" value="{{ old('birth') }}">
    @if($errors->has('birth'))
        <p style="color: red">* {{ $errors->first('birth') }}</p>
    @endif
    <br>
    <input type="submit" name='submit' value='create'>
</form>


@php
    use Illuminate\Support\Facades\View;
if(View::exists('success')) echo '{{ $success }}';
@endphp

