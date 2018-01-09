<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: zhangyajun <448901948@qq.com>
// +----------------------------------------------------------------------

namespace think\paginator\driver;

use think\Paginator;
use think\Config;
class Bootstrap extends Paginator
{
    
    /**
     * 上一页按钮
     * @param string $text
     * @return string
     */
    protected function getPreviousButton($text = "&laquo;",$style=false)
    {

        if ($this->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text,$style);
        }

        $url = $this->url(
            $this->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text,$style);
    }

    /**
     * 下一页按钮
     * @param string $text
     * @return string
     */
    protected function getNextButton($text = '&raquo;',$style=false)
    {
        if (!$this->hasMore) {
            return $this->getDisabledTextWrapper($text,$style);
        }

        $url = $this->url($this->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text,$style);
    }

    /**
     * 页码按钮
     * @return string
     */
    protected function getLinks($style=false)
    {
        if ($this->simple)
            return '';

        $block = [
            'first'  => null,
            'slider' => null,
            'last'   => null
        ];

        $side   = 3;
        $window = $side * 2;

        if ($this->lastPage < $window + 6) {
            $block['first'] = $this->getUrlRange(1, $this->lastPage);
        } elseif ($this->currentPage <= $window) {
            $block['first'] = $this->getUrlRange(1, $window + 2);
            $block['last']  = $this->getUrlRange($this->lastPage - 1, $this->lastPage);
        } elseif ($this->currentPage > ($this->lastPage - $window)) {
            $block['first'] = $this->getUrlRange(1, 2);
            $block['last']  = $this->getUrlRange($this->lastPage - ($window + 2), $this->lastPage);
        } else {
            $block['first']  = $this->getUrlRange(1, 2);
            $block['slider'] = $this->getUrlRange($this->currentPage - $side, $this->currentPage + $side);
            $block['last']   = $this->getUrlRange($this->lastPage - 1, $this->lastPage);
        }

        $html = '';

        if (is_array($block['first'])) {
            $html .= $this->getUrlLinks($block['first'],$style);
        }

        if (is_array($block['slider'])) {
            $html .= $this->getDots();
            $html .= $this->getUrlLinks($block['slider'],$style);
        }

        if (is_array($block['last'])) {
            $html .= $this->getDots();
            $html .= $this->getUrlLinks($block['last'],$style);
        }

        return $html;
    }


    /**
     * 渲染分页html
     * @return mixed
     */
    public function render()
    {
        if ($this->hasPages()) {
            if ($this->simple) {
                return sprintf(
                    '<ul class="pager">%s %s</ul>',
                    $this->getPreviousButton(),
                    $this->getNextButton()
                );
            } else {
                if(empty(Config::get('paginate.newstyle')))
                {
                    return sprintf(
                        '<ul class="pagination">%s %s %s</ul>',
                        $this->getPreviousButton(),
                        $this->getLinks(),
                        $this->getNextButton()
                     );
                }
                else
                {
                    return sprintf(
                        '%s %s %s',
                        $this->getPreviousButton("&laquo;",true),
                        $this->getLinks(true),
                        $this->getNextButton("&raquo;",true)
                    );
                }
            }
        }
    }
    //总数
    public  function totalshow()
    {   $totalhtml="$this->total";
       // $totalhtml="<li class=\"disabled\"><span>共".$this->total."条记录  ".$this->currentPage()."/".$this->lastPage()."</span></li>";
        return $totalhtml;
    }

    /**
     * 生成一个可点击的按钮
     *
     * @param  string $url
     * @param  int    $page
     * @return string
     */
    protected function getAvailablePageWrapper($url, $page,$style)
    {
        if($style)
            return '<a href="' . htmlentities($url) . '">' . $page . '</a>';
        else
            return '<li><a href="' . htmlentities($url) . '">' . $page . '</a></li>';
    }

    /**
     * 生成一个禁用的按钮
     *
     * @param  string $text
     * @return string
     */
    protected function getDisabledTextWrapper($text,$style)
    {  
       if($style)
            return '<a>' . $text . '</a>';
       else
            return '<li class="disabled"><span>' . $text . '</span></li>';
    }

    /**
     * 生成一个激活的按钮
     *
     * @param  string $text
     * @return string
     */
    protected function getActivePageWrapper($text,$style)
    {
        if($style)
            return '<span class="current">' . $text . '</span>';
        else
            return '<li class="active"><span>' . $text . '</span></li>';
    }

    /**
     * 生成省略号按钮
     *
     * @return string
     */
    protected function getDots($style=true)
    {
        return $this->getDisabledTextWrapper('...',$style);
    }

    /**
     * 批量生成页码按钮.
     *
     * @param  array $urls
     * @return string
     */
    protected function getUrlLinks(array $urls,$style)
    {
        $html = '';

        foreach ($urls as $page => $url) {
            $html .= $this->getPageLinkWrapper($url, $page,$style);
        }

        return $html;
    }

    /**
     * 生成普通页码按钮
     *
     * @param  string $url
     * @param  int    $page
     * @return string
     */
    protected function getPageLinkWrapper($url, $page,$style)
    {
        if ($page == $this->currentPage()) {
            return $this->getActivePageWrapper($page,$style);
        }

        return $this->getAvailablePageWrapper($url, $page,$style);
    }
}