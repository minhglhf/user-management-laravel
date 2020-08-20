<h1>-- USER MANAGEMENT--</h1>
<a href="{{ url('login/logout') }}"><input type="submit" name="logout" value="logout"></a>
<a href="{{ url('user/showUser') }}"><input type="submit" name="showUser" value="showUser"></a>
<a href="{{ url('user/create') }}"><input type="submit" name="create" value="create"></a>
<a href="{{ url('user/search') }}"><input type="submit" name="search" value="search"></a>
<a href="{{ url('user/infoUpdate') }}"><input type="submit" name="update" value="update"></a>
<a href="{{ url('user/restore') }}"><input type="submit" name="restore" value="restore"></a>
<br><br>

<h1>You are login as: {{ $auth_role }}</h1>

