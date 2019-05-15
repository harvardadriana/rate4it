<div class='col-12 col-md-6'>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='Level of difficulty of the course'>
                ?
            </button>
            <p>Difficulty</p>
        </div>
        <div class='col-4 box-border rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->difficulty])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='The course objectives were clear'>
                ?
            </button>
            <p>Clear Objectives</p>
        </div>
        <div class='col-4 box-border rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->clear_objectives])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='The course was organized and arranged in a logical way'>
                ?
            </button>
            <p>Organized</p>
        </div>
        <div class='col-4 box-border rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->organized])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='Workload of the course'>
                ?
            </button>
            <p>Workload</p>
        </div>
        <div class='col-4 box-border rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->workload])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='How clear were the instructions that clarified how assignments should be completed'>
                ?
            </button>
            <p><span class='break'>Clear assignment</span><span class='break'> instructions</span></p>
        </div>
        <div class='col-4 box-border rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->clear_assignment_instructions])
        </div>
    </div>

</div>

<div class='col-12 col-md-6'>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='How well defined was the grading criteria'>
                ?
            </button>
            <p>Grading</p>
        </div>
        <div class='col-4 rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->grading])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='How valuable or useful was the quality of the material provided, readings or reference'>
                ?
            </button>
            <p>Material</p>
        </div>
        <div class='col-4 rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->material])
        </div>

    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='Did the professor present the course material in a clear manner that facilitated understanding'>
                ?
            </button>
            <p>Clarity</p>
        </div>
        <div class='col-4 rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->clarity])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='Level of knowledge of the professor about the subject'>
                ?
            </button>
            <p>Knowledge</p>
        </div>
        <div class='col-4 rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->knowledge])
        </div>
    </div>

    <div class='row'>
        <div class='col-8 d-flex d-inline align-items-center align-self-center rating-col'>
            <button type='button'
                    class='btn btn-secondary'
                    data-toggle='tooltip'
                    data-placement='right'
                    title='How was the feedback or support provided by the professor'>
                ?
            </button>
            <p>Feedback</p>
        </div>
        <div class='col-4 rating-col'>
            @include('modules.review-stars', ['field' => $course->rate->feedback])
        </div>
    </div>

</div>