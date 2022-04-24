<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Turno;

class Turnos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $turno;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.turnos.view', [
            'turnos' => Turno::latest()
						->orWhere('turno', 'LIKE', $keyWord)
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
		$this->turno = null;
    }

    public function store()
    {
        $this->validate([
		'turno' => 'required',
        ]);

        Turno::create([ 
			'turno' => $this-> turno
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Turno Successfully created.');
    }

    public function edit($id)
    {
        $record = Turno::findOrFail($id);

        $this->selected_id = $id; 
		$this->turno = $record-> turno;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'turno' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Turno::find($this->selected_id);
            $record->update([ 
			'turno' => $this-> turno
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Turno Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Turno::where('id', $id);
            $record->delete();
        }
    }
}
