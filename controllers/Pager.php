<?php

class Pager
{
	/****
	ham int findStart(int limit)
	tra ve dong bat dau cua trang dua tren trang lay dk va bien limit
	
	***/
	public function findStart($limit)
	{
	   if((!isset($_GET['page'])) || ($_GET['page'] == "1"))
		{
			$start = 0;
			$_GET['page'] = 1;
		}
		else
		{
			$start = ($_GET['page']-1) * $limit;
		}
		return $start;
	}
	/****
	* ham int findPages (int count, int limit)
	* tra ve so luong trang can thiet dua tren tong so dong co trong table va limit
	
	***/
	public function findPages($count, $limit)
	{
		$pages = (($count % $limit) == 0) ? $count/$limit:floor($count / $limit) + 1;
		return $pages;
	}
	/***
	* ham string pagesList ( int curpage, int pages)
	* Tra ve danh sach trang theo dinh dang "trang dau tien" < [cac trang] > "Trang cuoi cung"
	***/
	public function pageList($curpage, $pages)
	{
		$page_list = "";
		/* in trang dau tien va nhung link toi trang truoc neu can */
		if(($curpage != 1) && ($curpage))
		{
			$page_list.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\" title=\"Trang dau\"><<</a> ";
			
		}
		if(($curpage-1)>0)
		{
			$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\" title=\"Ve trang truoc\"><</a> ";
			
		}
		/*in ra danh sach cac trang va lam cho trang hien tai dam hon va mat link o chan */
		for ($i = 1; $i<=$pages;$i++)
		{
			if($i == $curpage)
			{
				$page_list.="<b>".$i."</b>";
				
			}
			else
			{
			$page_list .="<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\" title=\"Trang ".$i."\">".$i."</a>";
			
			}
			$page_list .=" ";
		}
		/* in link cua trang tiep theo va trang cuoi cung neu can */
		if(($curpage+1) <= $pages)
		{
			$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\" title=\"Den trang sau\">></a> ";
			
		}
		if(($curpage != $pages) && ($pages != 0))
		{
			$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."\" title=\"Trang cuoi\">>></a> ";
		}
		$page_list .="</td>\n";
	return $page_list;
	}
	/****
	ham string nextPrev (int curpage, int pages)
	return "Previous | Next" String individual pagination (it's a word!)
	***/
	public function nextPrev($curpage, $pages)
	{
		$next_prev = "";
		if(($curpage-1) <= 0)
		{
			$next_prev.= "Ve trang truoc";
		}
		else
		{
			$next_prev .="<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\" title=\"Ve trang truoc\">></a> ";
		}
		$next_prev .=" | ";
		if(($curpage+1) > $pages)
		{
			$next_prev .= "Den trang sau";
		}
		else
		{
			$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\" title=\"Den trang sau\">></a> ";
		}
		return $next_prev;
	}
}
?>