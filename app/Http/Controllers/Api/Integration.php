<?php

namespace App\Http\Controllers\Api;

use App\Models\{Comment, Invoice, Offer, Order, Task, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class Integration extends \App\Http\Controllers\Controller
{
    public const EVENT_CREATED = 'on_after_create';
    public const EVENT_UPDATED = 'on_after_update';
    public const EVENT_DROPPED = 'on_after_drop';

    protected array $event = [
        self::EVENT_CREATED => 'create',
        self::EVENT_UPDATED => 'update',
        self::EVENT_DROPPED => 'delete'
    ];

    protected string $modelNamespace = '\\App\\Models\\';

    protected array $models = [
        Order::ORDER_TYPE => 'Order',
        Comment::COMMENT_TYPE => 'Comment',
        User::COMPANY_TYPE => 'User',
        User::CLIENT_TYPE => 'User',
        User::MANAGER_TYPE => 'User',
        Task::TASK_TYPE => 'Task',
        Invoice::INVOICE_TYPE => 'Invoice',
        Offer::OFFER_TYPE => 'Offer',
    ];

    public function store(Request $request)
    {
        $body = $request->all();

        Queue::push('hook', $body);

//        $uuid = $body['uuid'];
//        $extModel = $body['model'];
//        $event = $this->event[$body['event']];

//        if (cache()->has($uuid)) {
//            return response('duplicate');
//        }
//
//        cache()->add($uuid, $body['model'], 600);

        $success = true;

//        try {
//            $model = $this->modelNamespace . $this->models[$extModel];
//
//            $data = $model::prepareData($body['data']);
//
//            $result = match ($event) {
//                Integration::EVENT_DROPPED => $model::where('ext_id', $data['ext_id'])->delete(),
//                Integration::EVENT_UPDATED => $model::where('ext_id', $data['ext_id'])->update($data),
//                Integration::EVENT_CREATED => $model::create($data)
//            };
//
//            $success = !empty($result);
//        } catch (\Exception $e) {
//            // TODO: error log
//            cache()->delete($uuid);
//        }

        $statusCode = $success ? 200 : 422;
        return response('', $statusCode);
    }

    /**
     * @param string $model
     * @param string $event
     * @param array $data
     * @return bool
     */
    protected function processor(string $model, string $event, array $data): bool
    {
        $serviceName = $this->services[$model];

        return $this->$serviceName->processEvent($event, $data);
    }
}
