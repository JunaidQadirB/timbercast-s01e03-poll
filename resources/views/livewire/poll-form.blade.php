<div class="container">

    <div class="row justify-content-center ">
        <div class="col-md-4">
            <form action="" wire:submit.prevent="save">
                <h2>Create Poll</h2>

                <div class="form-group">
                    <label for="question">Question</label>
                    <input wire:model="question" type="text" class="form-control" name="question" id="question"
                           aria-describedby="pollQuestionHelp"
                           placeholder="Enter your question">
                    @error('question')<small id="pollQuestionHelp"
                                             class="form-text text-danger">{{$message}}</small>@enderror
                </div>

                <ul class="px-0">
                    @foreach($choices as $choice)
                        <li class="form-group  list-unstyled px-0">
                            <label>Choice {{$loop->index +1}}</label>
                            <div class="input-group mb-3">
                                <input wire:model="choices.{{$loop->index}}.text" value="Choice text" type="text"
                                       class="form-control"
                                       placeholder="Add text" aria-label="Exter text"/>
                                <div class="input-group-prepend">
                                    <button wire:click="removeChoice({{$loop->index}})"
                                            class="btn btn-outline-secondary" type="button">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </div>
                            </div>
                            @error('choices.'.$loop->index.'.text')<small
                                class="form-text text-danger">{{$message}}</small>@enderror
                        </li>
                    @endforeach
                </ul>
                @if(sizeof($choices) <$maxChoices)
                    <div class="form-group mt-5">
                        <label for="text">Choice {{sizeof($choices)+1}}</label>
                        <div class="input-group mb-3">
                            <input wire:model="text" type="text" id="text" class="form-control" placeholder=""
                                   aria-label="Example text with button addon"
                                   aria-describedby="addChoice"/>
                            <div class="input-group-prepend">
                                <button wire:click="addChoice" class="btn btn-outline-secondary"
                                        type="button"
                                        id="addChoice">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                        </div>
                        @error('choices')<small class="form-text text-danger">{{$message}}</small>@enderror
                        @error('text')<small class="form-text text-danger">{{$message}}</small>@enderror
                    </div>
                @endif

                <div class="form-group">
                    <label for="pollDuration">Poll Ends</label>
                    <div class="input-group mb-3">
                        <input wire:model="endedAtDate" type="date" id="pollDuration" class="form-control"
                               placeholder=""
                               aria-label="Poll Ends"
                               aria-describedby="pollDuration"/>
                        <div class="input-group-append">
                            <input wire:model="endedAtTime" value="{{$endedAtTime}}" type="time" id="PollEndedAtTime"
                                   class="form-control" placeholder=""
                                   aria-label="Poll end time"
                                   aria-describedby="PollEndedAtTime"/>
                        </div>
                    </div>
                    @error('endedAtDate')<small id="pollEndedAtDate"
                                                class="form-text text-danger">{{$message}}</small>@enderror
                    @error('endedAtTime')<small id="pollEndedAtTime"
                                                class="form-text text-danger">{{$message}}</small>@enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Save Poll</button>
                </div>
            </form>
        </div>
    </div>

</div>
