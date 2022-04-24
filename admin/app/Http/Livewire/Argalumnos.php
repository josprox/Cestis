<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Argalumno;

class Argalumnos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_gg, $id_esp, $id_alm, $id_turn, $id_sexo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.argalumnos.view', [
            'argalumnos' => Argalumno::latest()
						->orWhere('id_gg', 'LIKE', $keyWord)
						->orWhere('id_esp', 'LIKE', $keyWord)
						->orWhere('id_alm', 'LIKE', $keyWord)
						->orWhere('id_turn', 'LIKE', $keyWord)
						->orWhere('id_sexo', 'LIKE', $keyWord)
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
		$this->id_alm = null;
		$this->id_turn = null;
		$this->id_sexo = null;
    }

    public function store()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_alm' => 'required',
		'id_turn' => 'required',
		'id_sexo' => 'required',
        ]);

        Argalumno::create([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_alm' => $this-> id_alm,
			'id_turn' => $this-> id_turn,
			'id_sexo' => $this-> id_sexo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Argalumno Successfully created.');
    }

    public function edit($id)
    {
        $record = Argalumno::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_gg = $record-> id_gg;
		$this->id_esp = $record-> id_esp;
		$this->id_alm = $record-> id_alm;
		$this->id_turn = $record-> id_turn;
		$this->id_sexo = $record-> id_sexo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_alm' => 'required',
		'id_turn' => 'required',
		'id_sexo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Argalumno::find($this->selected_id);
            $record->update([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_alm' => $this-> id_alm,
			'id_turn' => $this-> id_turn,
			'id_sexo' => $this-> id_sexo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Argalumno Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Argalumno::where('id', $id);
            $record->delete();
        }
    }
}
