<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */

    public function getData($id = null)
    {
        if ($id != null) {
            return User::where('id', $id)->get();
        }
//        if($restore != null){
  //          return User::where('delete_flag', 1)->get();
//        }
        return User::all();

    }

    public function setData(UserRequest $request)
    {
        $customData = [
            'role' => $request->role,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'address' => $request->address,
            'sex' => $request->sex,
            'name' => $request->name,
            'birth' => $request->birth,
        ];
        User::create($customData);
        return $this->success();
    }

    public function updateData(UserRequest $request)
    {
        User::where('id', '=', $request->id)
            ->edit($request);
        return $this->success();
    }

    public function findData(Request $request)
    {
        $data = User::where('delete_flag', '=', 0)
            ->search($request)
            ->get();
        return $data;
    }

    public function deleteData($id)
    {
        User::where('id', $id)->update(['delete_flag' => 1]);
        return $this->success();
    }

    public function restoreData($id)
    {
        User::where('id', $id)->update(['delete_flag' => 0]);
        return $this->success();
    }

    public function success(){
        return 'success <br> <a href=" ../user/index"><input type="submit" name="backToHomePage" value="back to home pager"></a>';
    }

    public function fail(){
        return 'fail <br> <a href=" ../user/index"><input type="submit" name="backToHomePage" value="back to home pager"></a>';
    }

    public function denied_permission(){
        return 'not your role <br> <a href=" ../user/index"><input type="submit" name="backToHomePage" value="back to home pager"></a>';
    }
}
