<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class NewsController extends Controller {
    public function index($plate_id, $column_id) {
        $article_array = $this->get_article_list($plate_id, $column_id);
        //dump($article_array);

        $this->assign('articles', $article_array);
        $this->display();

        $side_menu_array = $this->get_plate_columns($plate_id, $column_id);
        //dump($side_menu_array);
    }

    private function get_article_list($plate_id, $column_id, $limit = 20) {
        $Article = M('Article');

        $map = array();
        $map['article_plate_id'] = $plate_id;
        $map['article_column_id'] = $column_id;
        $article_array = $Article->where($map)->limit($limit)->select();

        return $article_array;
    }

    private function get_plate_columns($plate_id) {
        $Model = new Model();

        $map = array();
        $map['plate_id'] = $plate_id;
        $map[] = 'plate_id = column_of_plate_id';
        $menu_array = $Model->table('jsj_plate, jsj_column')
            ->where($map)
            ->field('plate_id, plate_name, column_id, column_name')
            ->order('plate_id, column_id')
            ->select();

        return $menu_array;
    }
}