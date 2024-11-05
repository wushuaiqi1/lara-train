<?php

namespace App\Http\Requests;

class GetSimilarContractRequest extends CommonRequest
{

    /**
     * 自定义报错消息提示，属性转换
     * eg，接受begin_date，如果校验不通过，属性在错误消息中显示为开始时间
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'cooperation_ids' => '合作模式',
            'begin_date' => '开始时间',
            'deadline' => '结束时间',
            'school_id' => '学校ID',
            'brand_id' => '品牌ID',
            'product_range' => '产品范围',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cooperation_ids' => 'bail|required|string',
            'begin_date' => 'required|date',
            'deadline' => 'required|date',
            'school_id' => 'required|string',
            'brand_id' => 'required|string',
            'product_range' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return array_merge(parent::messages(), [
            'begin_date.required' => '合同缺少开始时间'
        ]);
    }
}
