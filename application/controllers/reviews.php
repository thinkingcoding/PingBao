<?php

use Framework\Request;

use Framework\RequestMethods as RequestMethods;

class Reviews extends Shared\Controller
{
    /**
     * @before _secure
     */
    public function add_step1()
    {
        if (RequestMethods::get("BtnClicked"))
        {
            $view = $this->getActionView();
            $goods_name = RequestMethods::get("goods_name");
            if (empty($goods_name))
            {
                $view->set("error", "商品名称不能为空");
                return;
            }
            if (mb_strlen($goods_name, 'gbk') < 3)
            {
                $view->set("error", "商品名称不能小于3个字符");
                return;
            }
            self::redirect("/reviews/add/step2.html?goods_name=".$goods_name);
        }
    }
    
    /**
     * @before _secure
     */
    public function add_step2()
    {
        if (RequestMethods::post("BtnClicked"))
        {
            $name = RequestMethods::post("name");
            $category_id = RequestMethods::post("category_id");
            $specification = Requestmethods::post("specification");
            $new_goods = Goods::first(array("name = ?" => $name));
            if ($new_goods)
            {
                $new_goods->category_id = $category_id;
                $new_goods->specification = $specification;
            }
            else
            {
                $new_goods = new Goods(array(
                        "name" => $name,
                        "category_id" => $category_id,
                        "specification" => $specification));
            }
            if ($new_goods->validate())
            {
                $new_goods->save();
                self::redirect("/reviews/add/step3.html?goods_id=" . $new_goods->id);
            }
            else
            {
                $view = $this->getActionView();
                $view->set("error", $new_goods->getErrors());
            }
        }
        
        $goods_name = RequestMethods::get("goods_name");
        if (empty($goods_name))
        {
            self::redirect("/reviews/add/step1.html");
        }
        
        $view = $this->getActionView();
        $goods = Goods::first(array("name = ?" => $goods_name));
        if ($goods)
        {
            $view->set("goods", $goods);
        }
        else
        {
            $view->set("goods_name", $goods_name);
        }
    }
    
    /**
     * @before _secure
     */
    public function add_step3()
    {
        if (RequestMethods::post("BtnClicked"))
        {
            $goods_id = RequestMethods::get("goods_id");
            $review = new Review(array(
                "goods_id" => $goods_id,
                "pros" => RequestMethods::post("pros"),
                "cons" => RequestMethods::post("cons"),
                "summary" => RequestMethods::post("summary"),
                "rate" => RequestMethods::post("rate"),
                "uid" => $this->user->id
                ));
            if ($review->validate())
            {
                $review->save();
                self::redirect("/home/index.html");
            }
        }
    }
}