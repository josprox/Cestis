<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Classmodel;

class Classmodels extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $clase;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.classmodels.view', [
            'classmodels' => Classmodel::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('clase', 'LIKE', $keyWord)
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
		$this->tipo = null;
		$this->clase = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'clase' => 'required',
        ]);

        Classmodel::create([ 
			'tipo' => $this-> tipo,
			'clase' => $this-> clase
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Classmodel Successfully created.');
    }

    public function edit($id)
    {
        $record = Classmodel::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->clase = $record-> clase;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'clase' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Classmodel::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'clase' => $this-> clase
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Classmodel Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Classmodel::where('id', $id);
            $record->delete();
        }
    }
}
