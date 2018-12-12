<?php

namespace App\Admin\Controllers;

use App\Models\Corp;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CorpsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('企业列表')
            ->body($this->grid());
    }
    

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Corp);
    
        $grid->model()->orderBy('status');

        $grid->corp_id('企业ID')->sortable();
        $grid->name('企业名');
        $grid->contact_name('联系人');
        $grid->contact_phone('联系电话');
        $grid->status('状态')->display(function ($status) {
            return $status ? "<span class='label label-danger'>无效</span>" : "<span class='label label-success'>有效</span>";
        })->sortable();
        $grid->created_at('创建时间')->sortable();
    
        // 禁用各项操作
        $grid->disableCreateButton(); // 禁用新建按钮
        $grid->actions(function ($actions) {
            $actions->disableView(); // 禁用每行的查看
            $actions->disableDelete(); // 禁用每行的删除
        });
    
        $grid->tools(function ($tools) { // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
    
        // 筛选条件
        $grid->filter(function($filter){
            $filter->disableIdFilter(); // 去掉默认的id过滤器
            $filter->like('name', '企业名'); // 添加字段过滤器
        });
        
        return $grid;
    }
    
    
    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑企业信息')
            ->body($this->form()->edit($id));
    }
    
    
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Corp);
        
        $form->text('name', '企业名称')->rules('required');
        $form->text('contact_name', '联系人')->rules('required');
        $form->text('contact_phone', '联系电话')->rules('required');
        $form->radio('status', '状态')
            ->options(['1' => '无效', '0' => '有效']);
    
        // 禁用工具按钮
        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete(); // 去掉删除按钮
            $tools->disableView(); // 去掉查看按钮
        });
    
        // 禁用form底部操作
        $form->footer(function (Form\Footer $footer) {
            $footer->disableReset(); // 去掉重置
            // $footer->disableViewCheck();  // 去掉查看
            // $footer->disableEditingCheck(); // 去掉继续编辑
        });
        
        return $form;
    }
    
}
