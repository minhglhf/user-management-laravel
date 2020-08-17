<div style="border: solid 2px green">
        @if (empty($users))
        <h1> No Results Found!!!</h1>
        @endif
        @if (!empty($users))
        <table style="width:100%">
            <tr>
                <th style="text-align: left">Id</th>
                <th style="text-align: left">Name</th>
                <th style="text-align: left">Email</th>
                <th style="text-align: left">Password</th>
                <th style="text-align: left">Role</th>
                <th style="text-align: left">address</th>
                <th style="text-align: left">sex</th>
                <th style="text-align: left">birth</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->birth }}</td>
            </tr>
            @endforeach
        </table>
{{--                {{ $users->links() }}--}}
        @endif
</div>
<a href=" ../user/index"><input type="submit" name="backToHomePage" value="back to home pager"></a>
