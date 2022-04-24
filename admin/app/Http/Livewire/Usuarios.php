<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Usuario;

class Usuarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $usuario, $correo, $img, $num_control, $nombre, $discapacidad;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.usuarios.view', [
            'usuarios' => Usuario::latest()
						->orWhere('usuario', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('img', 'LIKE', $keyWord)
						->orWhere('num_control', 'LIKE', $keyWord)
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
		$this->num_control = null;
		$this->nombre = null;
		$this->discapacidad = null;
    }

    public function store()
    {
        $this->validate([
		'usuario' => 'required',
		'correo' => 'required',
		'img' => 'required',
		'num_control' => 'required',
		'nombre' => 'required',
		'discapacidad' => 'required',
        ]);

        Usuario::create([ 
			'usuario' => $this-> usuario,
			'correo' => $this-> correo,
			'img' => $this-> img,
			'num_control' => $this-> num_control,
			'nombre' => $this-> nombre,
			'discapacidad' => $this-> discapacidad
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Usuario Successfully created.');
    }

    public function edit($id)
    {
        $record = Usuario::findOrFail($id);

        $this->selected_id = $id; 
		$this->usuario = $record-> usuario;
		$this->correo = $record-> correo;
		$this->img = $record-> img;
		$this->num_control = $record-> num_control;
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
		'num_control' => 'required',
		'nombre' => 'required',
		'discapacidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Usuario::find($this->selected_id);
            $record->update([ 
			'usuario' => $this-> usuario,
			'correo' => $this-> correo,
			'img' => $this-> img,
			'num_control' => $this-> num_control,
			'nombre' => $this-> nombre,
			'discapacidad' => $this-> discapacidad
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Usuario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Usuario::where('id', $id);
            $record->delete();
        }
    }
}
