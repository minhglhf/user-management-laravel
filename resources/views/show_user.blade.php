@csrf
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
                <th style="text-align: center">Select</th>
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
                    <td>
                        <form class="delete" method="post" action="{{ route('user.delete', ['id' => $user->id]) }}">
                            {{ method_field('DELETE') }}
                            @csrf
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <button type="submit" id="delete" name="delete_id"
                                    onclick="return confirm('Sure Want Delete?')" value="{{ $user->id }}">delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <form class="edit" method="post" action="{{ route('user.edit', ['id' => $user->id]) }}">
                            {{ method_field('POST') }}
                            @csrf
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <button type="submit" id="edit" name="edit_id" value="{{ $user->id }}">edit
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
        {{--                        {{ $users->links() }}--}}
    @endif
    @if (!empty($users))
    @endif
</div>

{{--<script>--}}
{{--    $("delete").on("submit", function(){--}}
{{--        return confirm("Are you sure?");--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    $("edit").on("submit", function(){--}}
{{--        return confirm("Are you sure?");--}}
{{--    });--}}
{{--</script>--}}

