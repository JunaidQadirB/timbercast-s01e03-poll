@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="rounded border p-5">

            <h2>Poll Question</h2>

            <p>Some Question?</p>

            <div class="mb-2">
                <button type="button" class="btn btn-sm btn-outline-primary">This is Choice One</button>
            </div>

            <div class="mb-2">
                <button type="button" class="btn btn-sm btn-outline-primary">This is Choice Two</button>
            </div>

            <div class="mb-2">
                <button type="button" class="btn btn-sm btn-outline-primary">This is Choice Three</button>
            </div>

            <p class="text-muted pt-3">Poll ends in 15 minutes</p>

        </div>

        <br/>

        <div class="rounded border p-5">

            <h2>Poll When Times Up</h2>

            <p class="pb-0 mb-0">Some Question?</p>

            <ul class="list-group border-0 bg-transparent mt-0 pt-0" style="max-width: 30rem;">
                <li class="list-group-item border-0 bg-transparent mx-0 px-0 pb-0">
                    <div class="progress" style="height: 2rem">
                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                        <span class="position-absolute mx-2 py-2">This is Choice One</span>
                    </div>
                </li>

                <li class="list-group-item border-0 bg-transparent mx-0 px-0 pb-0">
                    <div class="progress" style="height: 2rem">
                        <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35"
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                        <span class="position-absolute mx-2 py-2">This is Choice Two</span>
                    </div>
                </li>

                <li class="list-group-item border-0 bg-transparent mx-0 px-0 pb-0">
                    <div class="progress" style="height: 2rem">
                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55"
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                        <span class="position-absolute mx-2 py-2">This is Choice Three</span>
                    </div>
                </li>
            </ul>
        </div>

        <br/>

        <div class="rounded border p-5">

            <h2>Dashboard UI for creating polls</h2>

            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" name="question" id="question"
                       aria-describedby="pollQuestionHelp"
                       placeholder="Enter your question">
                <small id="pollQuestionHelp" class="form-text text-muted">Help text</small>
            </div>

            <ul class="px-0">
                <li class="form-group  list-unstyled px-0">
                    <label>Choice 1</label>
                    <div class="input-group mb-3">
                        <input value="Choice text" type="text" class="form-control"
                               placeholder="Add text" aria-label="Exter text"/>
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">
                                <span class="fa fa-minus"></span>
                            </button>
                        </div>
                    </div>
                </li>

                <li class="form-group  list-unstyled px-0">
                    <label>Choice 2</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                               placeholder="Add text" aria-label="Exter text"/>
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">
                                <span class="fa fa-minus"></span>
                            </button>
                        </div>
                    </div>
                    <small class="form-text text-danger">Choice 2 text cannot be empty</small>
                </li>
            </ul>

            <div class="form-group mt-5">
                <label for="text">Choice 3</label>
                <div class="input-group mb-3">
                    <input type="text" id="text" class="form-control" placeholder=""
                           aria-label="Example text with button addon"
                           aria-describedby="addChoice"/>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary"
                                type="button"
                                id="addChoice">
                            <span class="fa fa-plus"></span>
                        </button>
                    </div>
                </div>
                <small class="form-text text-danger">Add atleast two choices</small>
                <small class="form-text text-danger">Choice text cannot be empty</small>
            </div>

            <div class="form-group">
                <label for="pollDuration">Poll Ends</label>
                <div class="input-group mb-3">
                    <input type="date" id="pollDuration" class="form-control"
                           placeholder=""
                           aria-label="Poll Ends"
                           aria-describedby="pollDuration"/>
                    <div class="input-group-append">
                        <input value="" type="time" id="PollEndedAtTime"
                               class="form-control" placeholder=""
                               aria-label="Poll end time"
                               aria-describedby="PollEndedAtTime"/>
                    </div>
                </div>
                <small id="pollEndedAtDate" class="form-text text-danger">Poll ends date error text</small>
                <small id="pollEndedAtTime" class="form-text text-danger">Poll ends time error text</small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Save Poll</button>
            </div>

        </div>
    </div>
@endsection
