<?php

namespace App\Http\Controllers;

use App\Consignment;
use App\Document;
use App\Goods;
use Illuminate\Http\Request;

class ConsignmentController extends Controller
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
    $consignments = Consignment::where('document_id', request()->document)->get();
    $document = Document::findOrFail(request()->document);
    $product = new Goods();
    return view('consignments.index', compact('consignments', 'document', 'product'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $consignment = new Consignment();
    $tags = json_decode($consignment->tags);
    $document = Document::findOrFail(request()->document);
    $countries = Document::getCountries();
    $customs = Document::getCustoms();
    $auto_type = Document::auto_type;
    $units = Document::units;
    $products = Goods::where('consignment_id', $consignment->id)->get();
    return view('consignments.create', compact('consignment', 'tags', 'document', 'countries', 'customs', 'auto_type', 'units', 'products'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $document_id = $request->document;

    $myStr = json_encode($request->tags, JSON_UNESCAPED_UNICODE);

    $data = array(
        'document_id' => $document_id,
        'title' => $request->tags['p6t2'] . ' - ' . $request->tags['p20t2'],
        'tags' => trim($myStr, '{}'),
    );

    $consignment = Consignment::create($data);
    // $consignments = Consignment::where('document_id', $document_id)->get();
    // $document = Document::findOrFail($document_id);
    // $tags = json_decode('{' . $consignment->tags . '}', true);
    
    return redirect(route('consignments.edit', [$request->document, $consignment->id]))->with('success', 'Партия успешно добавлена!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Consignment  $consignment
   * @return \Illuminate\Http\Response
   */
  public function show(Consignment $consignment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Consignment  $consignment
   * @return \Illuminate\Http\Response
   */
  public function edit(Document $document, Consignment $consignment)
  {
    $tags = json_decode('{' . $consignment->tags . '}', true);
    $countries = Document::getCountries();
    $customs = Document::getCustoms();
    return view('consignments.edit', compact('document', 'consignment', 'tags', 'countries', 'customs'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Consignment  $consignment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Document $document, Consignment $consignment)
  {
    // dd($consignment);
    // $document_id = $request->route('document');

    $myStr = json_encode($request->tags, JSON_UNESCAPED_UNICODE);

    $data = array(
        'title' => $request->tags['p6t2'] . ' - ' . $request->tags['p20t2'],
        'tags' => trim($myStr, '{}'),
    );

    // $consignment = Consignment::findOrFail($consignment_id);
    $consignment->update($data);
    // $consignments = Consignment::where('document_id', $document_id)->get();
    // $document = Document::findOrFail($document_id);
    // $tags = json_decode('{' . $consignment->tags . '}', true);
    
    return redirect(route('consignments.index', [$request->document]))->with('success', 'Партия успешно обновлена!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Consignment  $consignment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Document $document, Consignment $consignment)
  {
    // dd($consignment);
    // $data = Consignment::findOrFail($consignment);
    foreach ($consignment->goods as $key) {
      $key->delete();
    }
    $consignment->delete();

    return redirect(route('consignments.index', $document))->with('success', 'Партия успешно удалена!');
  }
}
