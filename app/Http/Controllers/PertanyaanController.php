<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PertanyaanController extends Controller
{

   public function index(){
         $posts = DB::table('pertanyaan')->get();
         return view('posts.index', compact('posts'));
   }

   public function create(){
   		return view('posts.create');
   }

   public function store(Request $Request){
      $Request->validate([
        "judul" => 'required|unique:pertanyaan',
        "isi" => 'required'
    ]);

   	$query = DB::table('pertanyaan')->insert([
	    "judul" => $Request["judul"],
	    "isi" => $Request["isi"]
	]);
	return redirect('/pertanyaan')->with('success', 'Data Berhasil di Simpan');
   }

  public function show($id){
      $post = DB::table('pertanyaan')->where('id', $id)->first();
      return view('posts.show', compact('post'));
   }

     public function edit($id){
      $post = DB::table('pertanyaan')->where('id', $id)->first();
      return view('posts.edit', compact('post'));
   }

    public function update($id, Request $Request){
        $Request->validate([
        "judul" => 'required|unique:pertanyaan',
        "isi" => 'required'
    ]);

      $query = DB::table('pertanyaan')
                        ->where('id',$id)
                        ->update([
                              'judul' => $Request['judul'],
                              'isi' => $Request['isi']
                        ]);

       return redirect('/pertanyaan')->with('success', 'Data berhasil di Update');

   }

    public function destroy($id){
      $query = DB::table('pertanyaan')->where('id', $id)->delete();
      return redirect('/pertanyaan')->with('success', 'Data berhasil di Delete');
   }



}
