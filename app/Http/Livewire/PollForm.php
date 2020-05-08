<?php

namespace App\Http\Livewire;

use App\Poll;
use Livewire\Component;

class PollForm extends Component
{
    public $poll;
    public $question;
    public $choices = [
    ];
    public $text;
    public $endedAtDate;
    public $endedAtTime;
    public $maxChoices = 5;
    public $isEditing = false;

    public function mount(Poll $poll)
    {
        if ($poll->id) {
            $this->isEditing = true;
            $this->poll = $poll;

            $this->question = $poll->question;
            $this->choices = $this->poll->choices->map(function ($choice) {
                return ['text' => $choice->text];
            })->toArray();
            $this->endedAtDate = $poll->ended_at->format('Y-m-d');
            $this->endedAtTime = $poll->ended_at->format('H:i');
        }
    }

    public function render()
    {
        return view('livewire.poll-form');
    }

    public function addChoice()
    {
        $this->validate(['text' => 'required']);

        $this->choices[] = ['text' => $this->text];

        $this->text = '';
    }

    public function removeChoice($index)
    {
        unset($this->choices[$index]);
        $this->choices = array_values($this->choices);
    }

    public function save()
    {
        $this->validate($this->getRules(), $this->getMessages());

        $poll = new Poll();

        if ($this->isEditing) {
            $poll = $this->poll;
            $poll->choices()->delete();
        }

        $poll->question = $this->question;
        $poll->ended_at = $this->endedAtDate . ' ' . $this->endedAtTime;

        $poll->save();

        $poll->choices()->createMany($this->choices);

        $this->redirect('/');

    }

    private function getRules()
    {
        return [
            'question' => ['required'],
            'endedAtDate' => ['required', 'date'],
            'endedAtTime' => ['required', /*'date', 'date_format:H:i A'*/],
            'choices' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (sizeof($value) < 2) {
                        return $fail('Add minimum two choices.');
                    }
                    if (sizeof($value) > $this->maxChoices) {
                        return $fail('Add maximum ' . $this->maxChoices . ' choices.');
                    }
                },
            ],
            'choices.*.text' => ['required',],
        ];
    }

    private function getMessages()
    {
        return [
            'choices.required' => 'At least two choices are required.',
            'choices.*.text.required' => 'Choice cannot be empty.',
            'endedAtDate.required' => 'Poll end date is required.',
            'endedAtTime.required' => 'Poll end time is required.',
        ];
    }

}
