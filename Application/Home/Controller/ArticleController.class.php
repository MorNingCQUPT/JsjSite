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

        $this->assign('article', $article);
        $this->assign('sidebar', null);

        dump($article);
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