<?php

namespace App\Services\Cor;

use App\Services\Cor\Handler\MagicGoodCourseCreateHandler;
use App\Services\Cor\Handler\SuperCoursewareCreateHandler;
use Exception;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Pipeline\PipelineServiceProvider;

/**
 * @Author: 武帅祺
 * @Date: 2024/11/7
 * @Time：10:50
 * @Description：责任链，全局处理类
 */
class ChainOfResponsibilityHandler
{
    private $handleList;

    public function __construct()
    {
        $this->handleList[MagicGoodCourseCreateHandler::class] = new MagicGoodCourseCreateHandler();
        $this->handleList[SuperCoursewareCreateHandler::class] = new SuperCoursewareCreateHandler();
    }

    public function handle(string $type, $request)
    {
        foreach ($this->handleList as $class) {
            if (!$class instanceof IChainOfResponsibility) {
                echo '当前类' . $class . '未实现IChainOfResponsibility接口';
            }
            if (!$class::rule($type)) {
                continue;
            }
            $class::handle($request);
        }
    }
}
