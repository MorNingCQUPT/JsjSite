<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index() {
        $menu_array = $this->get_menu_array();
        $article_array = $this->get_article_list();

        // 传给View层渲染
    }

    private function get_menu_array() {
        $Model = new Model();
        $menu_array = $Model->table('jsj_plate, jsj_column')
                            ->where('plate_id = column_of_plate_id')
                            ->field('plate_id, plate_name, column_id, column_name')
                            ->order('plate_id, column_id')
                            ->select();
        if( count($menu_array) ) {
            // 转换查询结果格式
            return $menu_array;
        } else {
            // 查询失败
            return null;
        }
    }

    private function get_article_list($plate_id = 1, $column_id = 1) {
        // 查询文章列表，在主页显示
        $Article = M('Article');
        $article_arrary = $Article->select();

        if( count($article_arrary) ) {
            // 转换特定格式
            return $article_arrary;
        } else {
            // 查询失败
            return null;
        }
    }
}