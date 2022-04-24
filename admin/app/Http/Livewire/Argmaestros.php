<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Argmaestro;

class Argmaestros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_gg, $id_esp, $id_mst, $id_turno, $id_sexo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.argmaestros.view', [
            'argmaestros' => Argmaestro::latest()
						->orWhere('id_gg', 'LIKE', $keyWord)
						->orWhere('id_esp', 'LIKE', $keyWord)
						->orWhere('id_mst', 'LIKE', $keyWord)
						->orWhere('id_turno', 'LIKE', $keyWord)
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
		$this->id_mst = null;
		$this->id_turno = null;
		$this->id_sexo = null;
    }

    public function store()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_mst' => 'required',
		'id_turno' => 'required',
		'id_sexo' => 'required',
        ]);

        Argmaestro::create([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_mst' => $this-> id_mst,
			'id_turno' => $this-> id_turno,
			'id_sexo' => $this-> id_sexo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Argmaestro Successfully created.');
    }

    public function edit($id)
    {
        $record = Argmaestro::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_gg = $record-> id_gg;
		$this->id_esp = $record-> id_esp;
		$this->id_mst = $record-> id_mst;
		$this->id_turno = $record-> id_turno;
		$this->id_sexo = $record-> id_sexo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_gg' => 'required',
		'id_esp' => 'required',
		'id_mst' => 'required',
		'id_turno' => 'required',
		'id_sexo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Argmaestro::find($this->selected_id);
            $record->update([ 
			'id_gg' => $this-> id_gg,
			'id_esp' => $this-> id_esp,
			'id_mst' => $this-> id_mst,
			'id_turno' => $this-> id_turno,
			'id_sexo' => $this-> id_sexo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Argmaestro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Argmaestro::where('id', $id);
            $record->delete();
        }
    }
}
