<?php

namespace App\Http\Controllers;

use App\Document;
use App\Consignment;
use App\Goods;
use App\ReferenceDocument;
use Illuminate\Http\Request;
use Auth;
use SimpleXMLElement;
use ZipArchive;

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
    $all_tags = Document::where('user_id', Auth::user()->id)->pluck('tags')->all();
    $tags_arr = [];
    foreach ($all_tags as $key => $value) {
      $v = json_decode("{" . $value . "}");
      array_push($tags_arr, $v);
    }

    $tags = json_decode($document->tags);
    $countries = Document::getCountries();
    // dd(json_encode($countries));
    $customs = Document::getCustoms();
    $auto_types = Document::auto_types;
    
    return view('documents.create', compact('document', 'countries', 'customs', 'auto_types', 'tags', 'tags_arr'));
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
    $auto_types = Document::auto_types;
    $tags = json_decode('{' . $document->tags . '}', true);

    $all_tags = Document::where('user_id', Auth::user()->id)->pluck('tags')->all();
    $tags_arr = [];
    foreach ($all_tags as $key => $value) {
      $v = json_decode("{" . $value . "}");
      array_push($tags_arr, $v);
    }

    return redirect(route('documents.edit', [$document->id]))->with('success', 'Документ успешно создано!');
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
    $auto_types = Document::auto_types;
    $tags = json_decode('{' . $document->tags . '}', true);
    // dump($tags);

    $all_tags = Document::where('user_id', Auth::user()->id)->pluck('tags')->all();
    $tags_arr = [];
    foreach ($all_tags as $key => $value) {
      $v = json_decode("{" . $value . "}");
      array_push($tags_arr, $v);
    }

    // dd(json_encode($tags['p16t1']));

    return view('documents.edit', compact('document', 'countries', 'customs', 'auto_types', 'tags', 'tags_arr'));
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

    return back()->with('success', 'Документ успешно обновлен!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Document  $document
   * @return \Illuminate\Http\Response
   */
  public function destroy(Document $document)
  {
    foreach ($document->consignments as $consignment) {
      foreach ($consignment->goods as $item) {
        $item->delete();
      }
      foreach ($consignment->reference_documents as $item) {
        $item->delete();
      }
      $consignment->delete();
    }
    $document->delete();

    return redirect('documents')->with('success', 'Документ успешно удален!');

  }

  public function data_to_xml(Request $request, $document)
  {
    $data1 = Document::whereId($document)->pluck('tags')->first();
    $data1 = json_decode("{" . $data1 . "}", true);
    $data2 = [];
    $consignments = Consignment::where('document_id', $document)->with(['goods', 'reference_documents'])->get();
    $data3 = Goods::select('p1t3', 'p2t3', 'p3t3', 'p4t3', 'p5t3', 'p6t3', 'p7t3')->whereIn('consignment_id', $consignments)->get();
    $data4 = ReferenceDocument::select('p1t4', 'p2t4', 'p3t4', 'p4t4', 'p5t4')->whereIn('consignment_id', $consignments)->get();

    foreach ($consignments as $key => $value) {
      $temp_data = [];
      $temp_data += json_decode('{' . $value->tags . '}', true);
      $goods_data = json_decode($value->goods()->select('p1t3', 'p2t3', 'p3t3', 'p4t3', 'p5t3', 'p6t3', 'p7t3')->get(), true);
      $ref_data = json_decode($value->reference_documents()->select('p1t4', 'p2t4', 'p3t4', 'p4t4', 'p5t4')->get(), true);

      foreach ($goods_data as $key => $value) {
        array_push($temp_data, array('T3' => $value));
      }

      foreach ($ref_data as $key => $value) {
        array_push($temp_data, array('T4' => $value));
      }
      
      array_push($data2, array('T2' => $temp_data));
      // $data2 = array_values($data2);
    }

    $data1 += $data2;
    // dd($data1);

    function array_to_xml($array, $xml){

      foreach($array as $key => $value) {
        if(is_array($value)) {
          if(!is_numeric($key)){
            $subnode = $xml->addChild("$key");
            array_to_xml($value, $subnode);
          } else array_to_xml($value, $xml);
        } else $xml->addChild("$key",htmlspecialchars("$value"));
      }
    }

    //creating object of SimpleXMLElement
    $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><T1></T1>");

    //function call to convert array to xml
    array_to_xml($data1, $xml);

    //saving generated xml file
    $dirXML = 'uploads/';
    $fileXMLName = 'GruzXML.xml';
    $fileArchiveName = md5(time().'_'.rand(1000, 1000000).rand(1000, 1000000)).'.zip';

    $xml_file = $xml->asXML($dirXML . $fileXMLName);

    //success and error message based on xml creation
    if(!$xml_file) echo 'Ошибка при генерации XML файла!';

    if(!is_dir($dirXML.'temp')){
      mkdir($dirXML.'temp', '777');
    }

    $archive = $dirXML . 'temp/' . $fileArchiveName;
  
    $zip = new ZipArchive;
    $res = $zip->open($archive, ZipArchive::CREATE);
    if ($res === true) {
      $zip->addFile($dirXML . $fileXMLName, $fileXMLName);
      $zip->close();
      // echo "OK";
      header('Content-Type: application/zip');
      header('Content-Length: ' . filesize($archive));
      header('Content-Disposition: attachment; filename="'.$fileArchiveName.'"');
      readfile($archive);
      unlink($archive);       
      rmdir($dirXML.'temp');
    } else {
      exit('Ошибка архивирования!');
    }

  }
 
}
