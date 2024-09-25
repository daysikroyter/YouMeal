<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    $burgers = Product::where('category_id', 1)->get();
    $snacks = Product::where('category_id', 2)->get();
    $hotdogs = Product::where('category_id', 3)->get();
    $combos = Product::where('category_id', 4)->get();
    $shawarmas = Product::where('category_id', 5)->get();
    $pizzas = Product::where('category_id', 6)->get();
    $woks = Product::where('category_id', 8)->get();
    $desserts = Product::where('category_id', 9)->get();
    $sauces = Product::where('category_id', 10)->get();

    return view('home', compact('categories', 'burgers', 'snacks', 'hotdogs', 'combos', 'shawarmas', 'pizzas', 'woks', 'desserts', 'sauces'));
  }
}
