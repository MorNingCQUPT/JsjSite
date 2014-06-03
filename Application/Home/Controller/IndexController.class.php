<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function _empty() {
        $this->index();
    }


    /*
     * 功能：主页默认显示
     */
    public function index() {
        $menu_array = $this->get_menu_array();  // 获取头部菜单
        $summary_array_one = $this->get_summary_list(1, 1);  // 获取首页文章列表，参数为栏目索引：1-1
        $summary_array_two = $this->get_summary_list(1, 2);  // 获取首页文章列表，参数为栏目索引：1-2
        $summary_array_three = $this->get_summary_list(1, 3);  // 获取首页文章列表，参数为栏目索引：1-3

        // 传给View层渲染
        $this->assign('menu', $menu_array);
        $this->assign('summary_array_one', $summary_array_one);
        $this->assign('summary_array_two', $summary_array_two);
        $this->assign('summary_array_three', $summary_array_three);

        //$this->display();

        dump($menu_array);
        dump($summary_array_one);
        dump($summary_array_two);
        dump($summary_array_three);
    }


    /*
     * 功能：特定板块-栏目文章列表显示
     */
    public function summary($plate_id = 1, $column_id = 1) {
        $summary_list_length_max = 25;
        $menu_array = $this->get_menu_array();
        $summary_array = $this->get_summary_list($plate_id, $column_id, $summary_list_length_max);
        $sidebar = $this->get_sidebar_list($plate_id, $column_id);

        $this->assign('menu', $menu_array);
        $this->assign('summary_array', $summary_array);
        $this->assign('sidebar', $sidebar);

        //$this->display();
        dump($menu_array);
        dump($summary_array);
        dump($sidebar);
    }


    /*
     * 功能：文章显示
     */
    public function article($id) {
        if( $id == 0 ) {
            // 参数错误，返回错误页面
            echo '参数错误！！';
            return;
        }
        // SQLi Filter 处理
        $menu_array = $this->get_menu_array();  // 获取头部菜单
        $article = $this->get_article_info($id);  // 获取指定id的文章信息
        $sidebar = $this->get_sidebar_list($article['articles'][0]['article_plate_id'], $article['articles'][0]['article_column_id']);

        $this->assign('menu', $menu_array);
        $this->assign('article', $article);
        $this->assign('sidebar', $sidebar);
        // $this->display();

        dump($menu_array);
        dump($article);
        dump($sidebar);
    }


    /*
     * 功能：搜索
     */
    public function search() {

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
            $each_plate = array('plate_id' => $menu_array[0]['plate_id'], 'plate_name' => $menu_array[0]['plate_name']);
            $plate_columns = array();
            foreach ($menu_array as $menu) {
                if( $init_plate_id != $menu['plate_id'] ) {
                    $each_plate['columns'] = $plate_columns;
                    $menu_array_result[] = $each_plate;

                    $init_plate_id = $menu['plate_id'];
                    $each_plate = array('plate_id' => $menu['plate_id'],  'plate_name' => $menu['plate_name']);
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
    private  function get_summary_list($article_plate_id = 1, $article_column_id = 1, $limit = 8) {
        $Article = M('Article');
        $map = array();
        $map['article_plate_id'] = $article_plate_id;
        $map['article_column_id'] = $article_column_id;
        $article_array = $Article->where($map)->limit($limit)->select();

        $Plate = M('Plate');
        $map = array();
        $map['plate_id'] = $article_plate_id;
        $plate = $Plate->where($map)->select();

        $Column = M('Column');
        $map = array();
        $map['column_id'] = $article_column_id;
        $column = $Column->where($map)->select();

        if( count($article_array) ) {
            // 转换特定格式
            $article_array_result = array();
            $summary_list_result = array();
            foreach ($article_array as $each_article) {
                // 截取时间格式为“Y-m-d”
                $each_article['article_postdate'] = date('Y-m-d', strtotime($each_article['article_postdate']));
                $article_array_result[] = $each_article;
            }
            //dump($article_array_result);
            $summary_list_result['plate_id'] = $plate[0]['plate_id'];
            $summary_list_result['plate_name'] = $plate[0]['plate_name'];
            $summary_list_result['column_id'] = $column[0]['column_id'];
            $summary_list_result['column_name'] = $column[0]['column_name'];
            $summary_list_result['articles'] = $article_array_result;
            return $summary_list_result;
        } else {
            // 查询失败
            return null;
        }
    }


    /*
     * 功能：查询特定id号的文章信息
     * 输入：$id（文章id号）
     * 输出：文章信息
     */
    private function get_article_info($id) {
        $Article = M('Article');
        $map['article_id'] = $id;
        $article = $Article->where($map)->select();

        if( count($article) ) {
            $Plate = M('Plate');
            $map = array();
            $map['plate_id'] = $article[0]['article_plate_id'];
            $plate = $Plate->where($map)->select();

            $Column = M('Column');
            $map = array();
            $map['column_id'] = $article[0]['article_column_id'];
            $column = $Column->where($map)->select();

            $article_result = array();
            $article_result['plate_id'] = $plate[0]['plate_id'];
            $article_result['plate_name'] = $plate[0]['plate_name'];
            $article_result['column_id'] = $column[0]['column_id'];
            $article_result['column_name'] = $column[0]['column_name'];
            $article_result['articles'] = $article;

            return $article_result;
        } else {
            // 查询失败
            return null;
        }
    }


    /*
     * 功能：获取板块下的所有栏目作为侧栏
     */
    private function get_sidebar_list($plate_id, $column_id) {
        $Plate = M('Plate');
        $map = array();
        $map['plate_id'] = $plate_id;
        $plate = $Plate->where($map)->select();

        $Column = M('Column');
        $map = array();
        $map['column_of_plate_id'] = $plate_id;
        $column = $Column->where($map)->select();

        $sidebar = array();
        $sidebar['plate_id'] = $plate[0]['plate_id'];
        $sidebar['plate_name'] = $plate[0]['plate_name'];
        $sidebar['columns'] = $column;

        return $sidebar;
    }
}