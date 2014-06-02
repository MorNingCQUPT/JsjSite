<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class ArticleController extends Controller {
    public function _empty() {
        // 可返回错误页面
        $this->index();
    }

    public function index($id = 0) {
        if( $id == 0 ) {
            // 参数错误，返回错误页面
            echo '参数错误！！';
            return;
        }
        // SQLi Filter 处理
        $article = $this->get_article_info($id);
        $menu_array = $this->get_menu_array();

        $this->assign('menu', $menu_array);
        $this->assign('article', $article[0]);
        $this->assign('sidebar', null);
        $this->display();

        dump($article);
    }

    protected  function get_menu_array() {
        $Model = new Model();
        $menu_array = $Model->table('jsj_plate, jsj_column')
            ->where('plate_id = column_of_plate_id')
            ->field('plate_id, plate_name, column_id, column_name')
            ->order('plate_id, column_id')
            ->select();
        if( count($menu_array) ) {
            // 转换查询结果格式
            $menu_array_result = array();
            $init_plate_id = $menu_array[0]['plate_id'];
            $each_plate = array('plate_id' => $menu_array[0]['plate_id'],
                'plate_name' => $menu_array[0]['plate_name']);
            $plate_columns = array();
            foreach ($menu_array as $menu) {
                if( $init_plate_id != $menu['plate_id'] ) {
                    $each_plate['columns'] = $plate_columns;
                    $menu_array_result[] = $each_plate;

                    $init_plate_id = $menu['plate_id'];
                    $each_plate = array('plate_id' => $menu['plate_id'],
                        'plate_name' => $menu['plate_name']);
                    $plate_columns = array();
                }
                $plate_columns[$menu['column_id']] = $menu['column_name'];
            }
            $each_plate['columns'] = $plate_columns;
            $menu_array_result[] = $each_plate;

            return $menu_array_result;
        } else {
            // 查询失败
            return null;
        }
    }

    private function get_article_info($id) {
        $Article = M('Article');
        $map['article_id'] = $id;
        $article = $Article->where($map)->select();

        if( count($article) ) {
            return $article;
        } else {
            // 查询失败
            return null;
        }
    }
}