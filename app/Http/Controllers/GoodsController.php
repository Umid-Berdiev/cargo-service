<?php

namespace App\Http\Controllers;

use App\Goods;
use App\Document;
use App\Consignment;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Goods::where('consignment_id', request()->consignment)->get();
        // $product = new Goods();
        // $units = Document::units;
        // $currencies = Document::currencies;

        // return view('goods.index', compact('products', 'product', 'units', 'currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Goods::where('consignment_id', request()->consignment)->get();
        $product = new Goods();
        $units = Document::units;
        $currencies = Document::currencies;

        return view('goods.create', compact('products', 'product', 'units', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'consignment_id' => $request->route('consignment'),
            'p1t3' => $request->p1t3,
            'p2t3' => $request->p2t3,
            'p3t3' => $request->p3t3,
            'p4t3' => $request->p4t3,
            'p5t3' => $request->p5t3,
            'p6t3' => $request->p6t3,
            'p7t3' => $request->p7t3,
        );

        Goods::create($data);

        return redirect(route('goods.create', [request('document'), request('consignment')]))->with('success', 'Товар успешно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $goods)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document, Consignment $consignment, Goods $goods)
    {
        $products = Goods::where('consignment_id', $consignment->id)->get();
        $product = $goods;
        $units = Document::units;
        $currencies = Document::currencies;

        return view('goods.create', compact('products', 'product', 'units', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document, Consignment $consignment, Goods $goods)
    {
        $data = array(
            'p1t3' => $request->p1t3,
            'p2t3' => $request->p2t3,
            'p3t3' => $request->p3t3,
            'p4t3' => $request->p4t3,
            'p5t3' => $request->p5t3,
            'p6t3' => $request->p6t3,
            'p7t3' => $request->p7t3,
        );

        $goods->update($data);

        return redirect(route('goods.create', [request('document'), request('consignment')]))->with('success', 'Товар успешно обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document, Consignment $consignment, Goods $goods)
    {
        $goods->delete();

        return redirect(route('goods.create', [request('document'), request('consignment')]))->with('success', 'Товар успешно удалено!');
    }
}
