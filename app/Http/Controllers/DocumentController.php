<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
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
    // dd(Auth::user()->id);
    $docs = Document::where('user_id', Auth::user()->id)->paginate(10);
    return view('documents.index', compact('docs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $document = new Document();
    $tags = json_decode($document->tags);
    $countries = Document::getCountries();
    $customs = Document::getCustoms();
    $auto_type = Document::auto_type;
    return view('documents.create', compact('document', 'countries', 'customs', 'auto_type', 'tags'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $user_id = Auth::user()->id;

    $myStr = json_encode($request->tags, JSON_UNESCAPED_UNICODE);

    $data = array(
        'user_id' => $user_id,
        'title' => '#' . rand(1000, 9999),
        'tags' => trim($myStr, '{}'),
    );

    $document = Document::create($data);


    $countries = Document::getCountries();
    $customs = Document::getCustoms();
    $auto_type = Document::auto_type;
    $tags = json_decode('{' . $document->tags . '}', true);

    return view('documents.edit', compact('document', 'countries', 'customs', 'auto_type', 'tags'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Document  $document
   * @return \Illuminate\Http\Response
   */
  public function show(Document $document)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Document  $document
   * @return \Illuminate\Http\Response
   */
  public function edit(Document $document)
  {
    $countries = Document::getCountries();
    $customs = Document::getCustoms();
    $auto_type = Document::auto_type;
    $tags = json_decode('{' . $document->tags . '}', true);

    return view('documents.edit', compact('document', 'countries', 'customs', 'auto_type', 'tags'))
      ->with('success', 'Документ успешно создано!');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Document  $document
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Document $document)
  {

    $myStr = json_encode($request->tags, JSON_UNESCAPED_UNICODE);

    $data = array(
        'tags' => trim($myStr, '{}'),
    );

    $document->update($data);

    return redirect('documents')->with('success', 'Документ успешно обновлен!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Document  $document
   * @return \Illuminate\Http\Response
   */
  public function destroy(Document $document)
  {
    $document->delete();

    return redirect('documents')->with('success', 'Документ успешно удален!');

  }

  public function arr_to_xml(Request $request, $document)
  {
    $arr = json_decode(Document::whereId($document)->with(['consignments.goods', 'consignments.reference_documents'])->first());
    dd($arr);

  }
}
