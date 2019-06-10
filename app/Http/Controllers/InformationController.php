<?php
	
	namespace App\Http\Controllers;
	
	use App\Informations;
	use Illuminate\Http\Request;
	
	class InformationController extends Controller
	{
		
		public function index()
		{
			$infors = Informations::all();
			$total = Informations::all()->count('id');
			return view('information.index', ['infors' => $infors, 'total' => $total]);
		}
		
		
		public function create()
		{
			return view('information.create');
		}
		
		
		public function store(Request $request)
		{
			$this->validate($request, [
				'fb_id' => 'required'
			],
				['fb_id.required' => 'Tối thiểu cần Face ID']);
			
			Informations::create($request->all());
			return redirect()->route('informations.index')->with('message', 'Success !!!');
		}
		
		
		public function show($id)
		{
			//
		}
		
		
		public function edit($id)
		{
			$infor = Informations::findOrFail($id);
			return view('information.edit',['infor' => $infor]);
		}
		
		
		public function update(Request $request, $id)
		{
			$infor = Informations::findOrFail($id);
			$infor->update($request->all());
			return redirect()->route('informations.index')->with('message', 'Edit Success !!!');
		}
		
		
		public function destroy($id)
		{
			$infor = Informations::findOrFail($id);
			$infor->delete();
			return redirect()->route('informations.index')->with('message', 'Delete Success !!!');
		}
	}
