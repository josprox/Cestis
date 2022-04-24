<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Descarga;

class Descargas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_gg, $id_esp, $id_turn, $descripcion, $ruta;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.descargas.view', [
            'descargas' => Descarga::latest()
						->orWhere('id_gg', 'LIKE', $keyWord)
						->orWhere('id_esp', 'LIKE', $keyWord)
						->orWhere('id_turn', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('ruta', 'LIKE', $keyWord)
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
		$this->id_gg = null;
		$this->id_esp = null;
		$this->id_turn = null;
		$this->descripcion = null;
		$this->ruta = null;
    }

    public function store()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_turn' => 'required',
		'descripcion' => 'required',
		'ruta' => 'required',
        ]);

        Descarga::create([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_turn' => $this-> id_turn,
			'descripcion' => $this-> descripcion,
			'ruta' => $this-> ruta
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Descarga Successfully created.');
    }

    public function edit($id)
    {
        $record = Descarga::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_gg = $record-> id_gg;
		$this->id_esp = $record-> id_esp;
		$this->id_turn = $record-> id_turn;
		$this->descripcion = $record-> descripcion;
		$this->ruta = $record-> ruta;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_turn' => 'required',
		'descripcion' => 'required',
		'ruta' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Descarga::find($this->selected_id);
            $record->update([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_turn' => $this-> id_turn,
			'descripcion' => $this-> descripcion,
			'ruta' => $this-> ruta
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Descarga Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Descarga::where('id', $id);
            $record->delete();
        }
    }
}
