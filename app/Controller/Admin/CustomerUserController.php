<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 10:20
 **/

namespace App\Controller\Admin;

use App\Controller\ApiController;
use App\Enum\UserEnum;
use App\Middleware\Admin\AuthMiddleware;
use App\Model\Customer\CustomerUser;
use App\Request\Admin\AuthRequest;
use App\Request\Admin\CustomerUserRequest;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Utils\Collection;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Qbhy\HyperfAuth\AuthManager;
use Hyperf\HttpServer\Contract\RequestInterface;


#[Controller]
#[Middleware(AuthMiddleware::class)]
class CustomerUserController extends ApiController
{
    #[Inject]
    protected AuthManager $auth;


    #[RequestMapping(path: 'index', methods: 'get')]
    public function index(RequestInterface $request)
    {
        $page      = $request->input('page',1);
        $pageSize  = $request->input('pageSize',1);
        $params    = $request->all();

        $query = CustomerUser::where('app_id',$this->auth
            ->guard(UserEnum::ADMIN_JWT)
            ->user()->app_id
        );

        $total = $query->count();

        $list = $query->forPage($page,$pageSize)->get();

        return $this->success([
           'list' => $list,
            'mate' => [
                'total' => $total,
                'page' => $page
            ]
        ]);
    }



    #[RequestMapping(path: 'update', methods: 'put')]
    public function update()
    {
        $request = $this->container->get(CustomerUserRequest::class);
        $request->scene('update')->validated();
        $params = $request->all();


        set_params($params,'password',passwordHash(getPassword($params['password'])));

        CustomerUser::where('id',$params['id'])
            ->update(array_olay(
                $params,[
                    'name', 'avatar','email','wx','six','phone','password'
                ]
            ));

        return $this->success();
    }

    #[RequestMapping(path: 'store', methods: 'post')]
    public function store()
    {

    }
}
