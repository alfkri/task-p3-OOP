<?php

# membuat class Animal
class Animal
{
  # property animals

  # method constructor - mengisi data awal
  # parameter: data hewan (array)
  public function __construct($data)
  {
    $this->animals = $data;
  }

  # method index - menampilkan data animals
  public function index()
  {
    # gunakan foreach untuk menampilkan data animals (array)
    foreach ($this->animals as $animal) {
      echo "$animal <br>";
    }
    
    return $this;
  }

  # method store - menambahkan hewan baru
  # parameter: hewan baru
  public function store($data)
  {
    # gunakan method array_push untuk menambahkan data baru
    array_push($this->animals, $data);
    $this->index();

    return $this;
  }

  # method update - mengupdate hewan
  # parameter: index dan hewan baru
  public function update($animal, $data)
  {
    $ananimal = $this->find($animal);
    $this->animals[$ananimal] = $data;

    $this->index();

    return $this;
  }

  # method delete - menghapus hewan
  # parameter: index
  public function destroy($index)
  {
    # gunakan method unset atau array_splice untuk menghapus data array
    $ananimal = $this->find($index);

    array_splice($this->animals, $ananimal, 1);
    $this->index();

    return $this;
  }
  
  private function find($animal) {
    return array_search($animal, $this->animals);
  }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['katak','gajah','kelinci']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('burung');

echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update('katak', 'Kucing Anggora');

echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy('Kucing Anggora');

echo "<br>";
