<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function _empty() {
        $this->index();
    }

    public function index() {
        $menu_array = $this->get_menu_array();
        $article_array_one = $this->get_article_list(1, 1);
        $article_array_two = $this->get_article_list(1, 2);
        $article_array_three = $this->get_article_list(1, 3);

        // 传给View层渲染
        $this->assign('menu', $menu_array);
        $this->assign('article_list_one', $article_array_one);
        $this->assign('article_list_two', $article_array_two);
        $this->assign('article_list_three', $article_array_three);

        $this->display();
    }

    /*
     * 功能：查询菜单信息
     * 输入：无
     * 输出：特定结构的菜单信息数组
     */
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

    /*
     * 功能：查询特定板块-栏目的文章信息列表
     * 输入：$article_plate_id（板块id），$article_column_id（栏目id），$limit（返回的文章数）
     * 输出：文章信息数组（最多$limit个元素）
     */
    protected  function get_article_list($article_plate_id = 1, $article_column_id = 1, $limit = 8) {
        $Article = M('Article');
        $map = array();
        $map['article_plate_id'] = $article_plate_id;
        $map['article_column_id'] = $article_column_id;
        $article_array = $Article->where($map)->limit($limit)->select();

        if( count($article_array) ) {
            // 转换特定格式
            $article_array_result = array();
            foreach ($article_array as $each_article) {
                // 截取时间格式为“Y-m-d”
                $each_article['article_postdate'] = date('Y-m-d', strtotime($each_article['article_postdate']));
                $article_array_result[] = $each_article;
            }
            //dump($article_array_result);
            return $article_array_result;
        } else {
            // 查询失败
            return null;
        }
    }
}