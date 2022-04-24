<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publicacione;

class Publicaciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $iduser, $titulo, $vista, $descripcion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.publicaciones.view', [
            'publicaciones' => Publicacione::latest()
						->orWhere('iduser', 'LIKE', $keyWord)
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('vista', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->iduser = null;
		$this->titulo = null;
		$this->vista = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'iduser' => 'required',
		'titulo' => 'required',
		'vista' => 'required',
		'descripcion' => 'required',
        ]);

        Publicacione::create([ 
			'iduser' => $this-> iduser,
			'titulo' => $this-> titulo,
			'vista' => $this-> vista,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Publicacione Successfully created.');
    }

    public function edit($id)
    {
        $record = Publicacione::findOrFail($id);

        $this->selected_id = $id; 
		$this->iduser = $record-> iduser;
		$this->titulo = $record-> titulo;
		$this->vista = $record-> vista;
		$this->descripcion = $record-> descripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'iduser' => 'required',
		'titulo' => 'required',
		'vista' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Publicacione::find($this->selected_id);
            $record->update([ 
			'iduser' => $this-> iduser,
			'titulo' => $this-> titulo,
			'vista' => $this-> vista,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Publicacione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Publicacione::where('id', $id);
            $record->delete();
        }
    }
}
