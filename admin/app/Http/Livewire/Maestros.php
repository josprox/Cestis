<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maestro;

class Maestros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $usuario, $correo, $img, $nombre, $discapacidad;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.maestros.view', [
            'maestros' => Maestro::latest()
						->orWhere('usuario', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('img', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('discapacidad', 'LIKE', $keyWord)
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
		$this->usuario = null;
		$this->correo = null;
		$this->img = null;
		$this->nombre = null;
		$this->discapacidad = null;
    }

    public function store()
    {
        $this->validate([
		'usuario' => 'required',
		'correo' => 'required',
		'img' => 'required',
		'nombre' => 'required',
		'discapacidad' => 'required',
        ]);

        Maestro::create([ 
			'usuario' => $this-> usuario,
			'correo' => $this-> correo,
			'img' => $this-> img,
			'nombre' => $this-> nombre,
			'discapacidad' => $this-> discapacidad
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Maestro Successfully created.');
    }

    public function edit($id)
    {
        $record = Maestro::findOrFail($id);

        $this->selected_id = $id; 
		$this->usuario = $record-> usuario;
		$this->correo = $record-> correo;
		$this->img = $record-> img;
		$this->nombre = $record-> nombre;
		$this->discapacidad = $record-> discapacidad;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'usuario' => 'required',
		'correo' => 'required',
		'img' => 'required',
		'nombre' => 'required',
		'discapacidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Maestro::find($this->selected_id);
            $record->update([ 
			'usuario' => $this-> usuario,
			'correo' => $this-> correo,
			'img' => $this-> img,
			'nombre' => $this-> nombre,
			'discapacidad' => $this-> discapacidad
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Maestro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Maestro::where('id', $id);
            $record->delete();
        }
    }
}
