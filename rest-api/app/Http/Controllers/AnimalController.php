<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals =["Kuda", "Itik", "Kucing"];
        public function index() 
        {
            echo "Menampilkan data animals =";
            foreach ($this->animals as $hewan) {
                echo "," . $hewan;

            }
        }
        public function store(Request $request)
        {
            echo "Menambahkan binatang baru" . ",";
            $data = $request->only('hewan');
            array_push($this->animals, $data["hewan"]);
            $this->index();
        }
        public function update(Request $request, $id)
        {
            echo "Mengupdate data hewan index ke " . $id . ",";
            $data = $request->only('hewan');
            $this->animals[$id] = $data["hewan"];
            $this->index();
        }
        public function destroy($id) {
            echo "Menghapus data hewan index ke " . $id .",";
            unset($this->animals[$id]);
            $this->index();
        }
}