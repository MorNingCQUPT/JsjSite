<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class ArticleController extends Controller {
    public function index($id = 0) {
        if( $id == 0 ) {
            // 参数错误，返回错误页面
            echo '参数错误！！';
            return;
        }

        // SQLi Filter 处理
        $article = $this->get_article_info($id);
        if( count($article) ) {
            // 查询正常，将相关字段传给View层进行渲染
            dump($article);
        } else {
            // 查询失败，返回错误页面
            echo '文章不存在！！';
            return;
        }

    }

    private function get_article_info($id) {
        $Article = M('Article');
        $map['article_id'] = $id;
        $article = $Article->where($map)->select();

        return $article;
    }
}