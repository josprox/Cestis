<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gradgrup;

class Gradgrups extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $grado, $grupo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.gradgrups.view', [
            'gradgrups' => Gradgrup::latest()
						->orWhere('grado', 'LIKE', $keyWord)
						->orWhere('grupo', 'LIKE', $keyWord)
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
		$this->grado = null;
		$this->grupo = null;
    }

    public function store()
    {
        $this->validate([
		'grado' => 'required',
		'grupo' => 'required',
        ]);

        Gradgrup::create([ 
			'grado' => $this-> grado,
			'grupo' => $this-> grupo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Gradgrup Successfully created.');
    }

    public function edit($id)
    {
        $record = Gradgrup::findOrFail($id);

        $this->selected_id = $id; 
		$this->grado = $record-> grado;
		$this->grupo = $record-> grupo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'grado' => 'required',
		'grupo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Gradgrup::find($this->selected_id);
            $record->update([ 
			'grado' => $this-> grado,
			'grupo' => $this-> grupo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Gradgrup Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Gradgrup::where('id', $id);
            $record->delete();
        }
    }
}
