<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Especialidade;

class Especialidades extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $especialidad;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.especialidades.view', [
            'especialidades' => Especialidade::latest()
						->orWhere('especialidad', 'LIKE', $keyWord)
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
		$this->especialidad = null;
    }

    public function store()
    {
        $this->validate([
		'especialidad' => 'required',
        ]);

        Especialidade::create([ 
			'especialidad' => $this-> especialidad
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Especialidade Successfully created.');
    }

    public function edit($id)
    {
        $record = Especialidade::findOrFail($id);

        $this->selected_id = $id; 
		$this->especialidad = $record-> especialidad;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'especialidad' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Especialidade::find($this->selected_id);
            $record->update([ 
			'especialidad' => $this-> especialidad
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Especialidade Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Especialidade::where('id', $id);
            $record->delete();
        }
    }
}
