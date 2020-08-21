<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;
use App\Mail\TestMail;
use App\User;
use App\Scopes;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\AcceptHeader;

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
    protected $_originModel;
    protected $_model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */

    public function __construct(Model $model)
    {
        $this->_originModel = $model;
    }

    public function getModel()
    {
        return $this->_model;
    }

    public function setModel($model)
    {
        $this->_model = $model;
    }

    /**
     * @inheritdoc
     */

    public function getData($id = null)
    {
        if ($id != null) {
            return $this->getBuilder(['id' => $id])->get();
        }
        return $this->getBuilder(['delete_flag' => 0])->get();
    }

    public function getBuilder($conditions = null, $compare = '=')
    {
        $this->resetModel();
        $model = $this->getModel();

        if ($conditions != null) {
            foreach ($conditions as $field => $value) {
                $model = $model::where($field, $compare, $value);
            }
        }
        return $model;
    }

    public function resetModel()
    {
        $this->setModel($this->_originModel);
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
        $newUser = User::create($customData);
        return $this->sendMailToAdmin($newUser);
    }

    public function updateData(UpdateRequest $request)
    {
        $this->getBuilder(['id' => $request->id])
            ->edit($request);
        return $this->success();
    }

    public function findData(Request $request)
    {
        $data = $this->getBuilder(['delete_flag' => 0])
            ->search($request)
            ->get();
        return $data;
    }

    public function deleteData($id)
    {
        $this->getBuilder(['id' => $id])->update(['delete_flag' => 1]);
        return $this->success();
    }

    public function getSoftDeleteData()
    {
        return $this->getBuilder(['delete_flag' => 1])->get();
//        $data = User::withYouths($this->getBuilder(['delete_flag' => 1]))->get();
//        return $data;
    }

    public function restoreData($id)
    {
        $this->getBuilder(['id' => $id])->update(['delete_flag' => 0]);
        return $this->success();
    }

    public function sendMailToAdmin($newUser)
    {
        foreach ($this->getBuilder(['role' => 3], '<')->get() as $user) {
            \Mail::to($user->email)->send(new TestMail([
                'title' => 'Accout Created',
                'body' => 'an account email = ' . $newUser->email . ' id = ' . $newUser->id
                    . '  had been created by ' . Auth::user()->name
            ]));
        }
        return $this->success('email send');
    }

    public function success($message = null)
    {
        $result = $message . 'success';
        return view('result')->with(['result' => $result]);
    }

    public function fail($message = null)
    {
        return $message . 'fail <br>';
    }

    public function denied_permission()
    {
        $result = 'not your role';
        return view('result')->with(['result' => $result]);
    }

}
