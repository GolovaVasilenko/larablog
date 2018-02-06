<?php


namespace App\Http\Controllers;


use App\Page;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$last_posts = DB::table('posts')->orderBy('id', 'desc')->take(5)->get();

		$page = Page::where('slug', 'home')->first();

		return view('page.index', [
			'home'  => $page,
			'posts' => $last_posts,
		]);
	}

	/**
	 * @param $name
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($name)
	{
		$page = Page::where('slug', $name)->first();

		return view('page.show', ['page' => $page]);
	}
}