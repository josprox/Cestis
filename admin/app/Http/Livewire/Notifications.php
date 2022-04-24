<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;

class Notifications extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $Contenido;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.notifications.view', [
            'notifications' => Notification::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('Contenido', 'LIKE', $keyWord)
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
		$this->Contenido = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'Contenido' => 'required',
        ]);

        Notification::create([ 
			'tipo' => $this-> tipo,
			'Contenido' => $this-> Contenido
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Notification Successfully created.');
    }

    public function edit($id)
    {
        $record = Notification::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->Contenido = $record-> Contenido;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'Contenido' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Notification::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'Contenido' => $this-> Contenido
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Notification Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Notification::where('id', $id);
            $record->delete();
        }
    }
}
