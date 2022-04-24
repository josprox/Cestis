<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Numcontrol;

class Numcontrols extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $num, $curp;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.numcontrols.view', [
            'numcontrols' => Numcontrol::latest()
						->orWhere('num', 'LIKE', $keyWord)
						->orWhere('curp', 'LIKE', $keyWord)
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
		$this->num = null;
		$this->curp = null;
    }

    public function store()
    {
        $this->validate([
		'num' => 'required',
		'curp' => 'required',
        ]);

        Numcontrol::create([ 
			'num' => $this-> num,
			'curp' => $this-> curp
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Numcontrol Successfully created.');
    }

    public function edit($id)
    {
        $record = Numcontrol::findOrFail($id);

        $this->selected_id = $id; 
		$this->num = $record-> num;
		$this->curp = $record-> curp;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'num' => 'required',
		'curp' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Numcontrol::find($this->selected_id);
            $record->update([ 
			'num' => $this-> num,
			'curp' => $this-> curp
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Numcontrol Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Numcontrol::where('id', $id);
            $record->delete();
        }
    }
}
