<?php

namespace App\Http\Controllers;

use App\ReferenceDocument;
use App\Document;
use App\Consignment;
use Illuminate\Http\Request;

class ReferenceDocumentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ref_docs = ReferenceDocument::where('consignment_id', request()->consignment)->get();
        $ref_doc = new ReferenceDocument();
        $reference_docs_type = Document::reference_docs_type;

        return view('reference_docs.create', compact('ref_docs', 'ref_doc', 'reference_docs_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'p5t4' => 'required|image|max:2048',
        ]);

        // $image = $request->file('p5t4');
        // $new_image_name = $image->getClientOriginalName();
        // $image->move(public_path('images'), $new_image_name);

        $img = file_get_contents($request->file('p5t4'));
        $img_name = $request->file('p5t4')->getClientOriginalName();
        $base64 = base64_encode($img);

        $data = array(
            'consignment_id' => $request->route('consignment'),
            'p1t4' => $request->p1t4,
            'p2t4' => $request->p2t4,
            'p3t4' => $request->p3t4,
            'p4t4' => $img_name,
            'p5t4' => $base64,
        );

        ReferenceDocument::create($data);

        return redirect(route('reference_docs.create', [request('document'), request('consignment')]))->with('success', 'Файл успешно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReferenceDocument  $referenceDocument
     * @return \Illuminate\Http\Response
     */
    public function show(ReferenceDocument $referenceDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReferenceDocument  $referenceDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document, Consignment $consignment, ReferenceDocument $referenceDocument)
    {
        $ref_docs = ReferenceDocument::where('consignment_id', $consignment->id)->get();
        $ref_doc = $referenceDocument;
        $reference_docs_type = Document::reference_docs_type;

        return view('reference_docs.create', compact('ref_docs', 'ref_doc', 'reference_docs_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReferenceDocument  $referenceDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReferenceDocument $referenceDocument)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReferenceDocument  $referenceDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document, Consignment $consignment, ReferenceDocument $referenceDocument)
    {
        $referenceDocument->delete();

        return redirect(route('reference_docs.create', [request('document'), request('consignment')]))->with('success', 'Файл успешно удалено!');
    }
}
