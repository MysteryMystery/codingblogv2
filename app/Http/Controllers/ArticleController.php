<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use BBCode;

class ArticleController extends Controller
{
    public function create(Request $request){

    }

    public function edit(Request $request){

    }

    public function delete(Request $request){

    }

    public function search(Request $request){
        $articles = Article
            ::where("title", "LIKE", "%{$request->input('searchbar')}%")
            ->join("users", "users.id", "=", "articles.creator_id")
            ->join("frameworks", "framework.id", "=", "articles.framework_id")
            ->select("articles.id", "articles.title", "articles.url", "articles.contents", "articles.language", "framework.name AS framework_name", "users.name")
            ->paginate(10);

        return view("article.search_view");
    }

    public function prettifyContent(Request $r) {
        //echo "<script> console.log('{$r->contents}'); </script>";
        $barebonesArticle = new Article();
        $barebonesArticle->title = $r->title;
        $barebonesArticle->contents = BBCode::parse(strip_tags($r->contents, "<strong><b><i><em><mark><small><del><ins><sub><sup><h1><h2><h3><h4><p><span>"));

        $articleView = view("tutorial.article", ["article" => $barebonesArticle]);
        $renderedView = $articleView->render();

        return Response
            ::json(json_encode(array(
                "status" => "OK",
                "data" => $renderedView,
            )));
    }
}
