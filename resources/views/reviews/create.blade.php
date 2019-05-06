@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-white.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/create.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='row course-title-banner'>

            {{-- LEFT COL --}}
            <div class='col-2 rating-col'>
                <h1>Rating </h1>
            </div>

            {{-- COURSE TITLE COL --}}
            <div class='col-9 course'>
                <div class='title'>
                    <p class='subject-course-code'>{{ $course->subject_and_course_code }}</p>
                    <h1>{{ $course->title }}</h1>
                </div>
                <div class=' d-flex d-inline'>
                    <img class='professor-icon' src='/svg/review/professor-white.svg' alt='Person reading a book'>
                    <p class='professor'>Professor(s): </p>
                    <div class='instructor'>
                        {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                        @foreach($course->instructors as $instructor)
                            <p>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div class='blue-wrapper'>

            <div class='content-wrapper'>

                <form method='POST' action='/reviews'>
                    @csrf

                    <div class='accordion' id='accordionExample'>

                        {{-- QUESTION ONE --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingOne'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseOne'
                                                aria-expanded='false'
                                                aria-controls='collapseOne'>
                                            Question 1. Overall Rating
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'overall_rating'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='overall_rating_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='overall_rating'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('overall_rating') == $i ? 'checked' : '' }}>
                                            <label for='overall_rating_{{ $i }}' class='form-check-label'>
                                                <span id='a-{{ $i }}'
                                                      class='star {{ old('overall_rating') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseOne'
                                 class='collapse'
                                 aria-labelledby='headingOne'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>What do you think about the overall conclusion of the course?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION TWO --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingTwo'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseTwo'
                                                aria-expanded='false'
                                                aria-controls='collapseTwo'>
                                            Question 2. Difficulty
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'difficulty'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='difficulty_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='difficulty'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('difficulty') == $i ? 'checked' : '' }}>

                                            <label for='difficulty_{{ $i }}' class='form-check-label'>
                                                <span id='b-{{ $i }}'
                                                      class='star {{ old('difficulty') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseTwo'
                                 class='collapse'
                                 aria-labelledby='headingTwo'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>What was the level of difficulty of the course?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION THREE --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingThree'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseThree'
                                                aria-expanded='false'
                                                aria-controls='collapseThree'>
                                            Question 3. Clear Objectives
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'clear_objectives'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='clear_objectives_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='clear_objectives'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('clear_objectives') == $i ? 'checked' : '' }}>

                                            <label for='clear_objectives_{{ $i }}' class='form-check-label'>
                                                <span id='c-{{ $i }}'
                                                      class='star {{ old('clear_objectives') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseThree'
                                 class='collapse'
                                 aria-labelledby='headingThree'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Were the course objectives clear?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION FOUR --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingFour'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseFour'
                                                aria-expanded='false'
                                                aria-controls='collapseFour'>
                                            Question 4. Organized
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'organized'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='organized_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='organized'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('organized') == $i ? 'checked' : '' }}>

                                            <label for='organized_{{ $i }}' class='form-check-label'>
                                                <span id='d-{{ $i }}'
                                                      class='star {{ old('organized') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseFour'
                                 class='collapse'
                                 aria-labelledby='headingFour'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Was the course organized and arranged in a logical way?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION FIVE --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingFive'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseFive'
                                                aria-expanded='false'
                                                aria-controls='collapseFive'>
                                            Question 5. Deeper insight
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'gain_deeper_insight'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='gain_deeper_insight_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='gain_deeper_insight'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('gain_deeper_insight') == $i ? 'checked' : '' }}>

                                            <label for='gain_deeper_insight_{{ $i }}' class='form-check-label'>
                                                <span id='e-{{ $i }}'
                                                      class='star {{ old('gain_deeper_insight') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseFive'
                                 class='collapse'
                                 aria-labelledby='headingFive'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>The course helped you gain deeper insight into the topic?
                                       (How confident are you about the subject after taking this course?)</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION SIX --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingSix'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseSix'
                                                aria-expanded='false'
                                                aria-controls='collapseSix'>
                                            Question 6. Workload
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'workload'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='workload_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='workload'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('workload') == $i ? 'checked' : '' }}>

                                            <label for='workload_{{ $i }}' class='form-check-label'>
                                                <span id='f-{{ $i }}'
                                                      class='star {{ old('workload') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseSix'
                                 class='collapse'
                                 aria-labelledby='headingSix'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>How was the workload of the course?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION SEVEN --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingSeven'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseSeven'
                                                aria-expanded='false'
                                                aria-controls='collapseSeven'>
                                            Question 7. Clear assignment instructions
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'clear_assignment_instructions'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='clear_assignment_instructions_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='clear_assignment_instructions'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('clear_assignment_instructions') == $i ? 'checked' : '' }}>

                                            <label for='clear_assignment_instructions_{{ $i }}'
                                                   class='form-check-label'>
                                                <span id='h-{{ $i }}'
                                                      class='star {{ old('clear_assignment_instructions') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseSeven'
                                 class='collapse'
                                 aria-labelledby='headingSeven'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Did the course contained clear stated instructions that clarified how assignments were to be completed?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION EIGHT --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingEight'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseEight'
                                                aria-expanded='false'
                                                aria-controls='collapseEight'>
                                            Question 8. Grading
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'grading'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='grading_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='grading'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('grading') == $i ? 'checked' : '' }}>

                                            <label for='grading_{{ $i }}' class='form-check-label'>
                                                <span id='i-{{ $i }}'
                                                      class='star {{ old('grading') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseEight'
                                 class='collapse'
                                 aria-labelledby='headingEight'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Was the grading criteria well defined?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION NINE --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingNine'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseNine'
                                                aria-expanded='false'
                                                aria-controls='collapseNine'>
                                            Question 9. Material
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'material'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='material_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='material'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('material') == $i ? 'checked' : '' }}>

                                            <label for='material_{{ $i }}' class='form-check-label'>
                                                <span id='j-{{ $i }}'
                                                      class='star {{ old('material') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseNine'
                                 class='collapse'
                                 aria-labelledby='headingNine'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Were the quality of the material provided, readings or reference valuable or useful?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION TEN --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingTen'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseTen'
                                                aria-expanded='false'
                                                aria-controls='collapseTen'>
                                            Question 10. Clarity
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'clarity'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='clarity_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='clarity'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('clarity') == $i ? 'checked' : '' }}>

                                            <label for='clarity_{{ $i }}' class='form-check-label'>
                                                <span id='k-{{ $i }}'
                                                      class='star {{ old('clarity') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseTen'
                                 class='collapse'
                                 aria-labelledby='headingTen'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Did the professor presented the course material in a clear manner that facilitated understanding?
                                       (Effective professors can explain complex ideas in simple ways)</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION ELEVEN --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingEleven'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseEleven'
                                                aria-expanded='false'
                                                aria-controls='collapseEleven'>
                                            Question 11. Knowledge
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'knowledge'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='knowledge_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='knowledge'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('knowledge') == $i ? 'checked' : '' }}>

                                            <label for='knowledge_{{ $i }}' class='form-check-label'>
                                                <span id='l-{{ $i }}'
                                                      class='star {{ old('knowledge') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseEleven'
                                 class='collapse'
                                 aria-labelledby='headingEleven'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Did the professor demonstrated in-depth knowledge of the subject?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION TWELVE --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingTwelve'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseTwelve'
                                                aria-expanded='false'
                                                aria-controls='collapseTwelve'>
                                            Question 12. Feedback
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'feedback'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='feedback_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='feedback'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('feedback') == $i ? 'checked' : '' }}>

                                            <label for='feedback_{{ $i }}' class='form-check-label'>
                                                <span id='m-{{ $i }}'
                                                      class='star {{ old('feedback') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseTwelve'
                                 class='collapse'
                                 aria-labelledby='headingTwelve'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Did the professor provided helpful support or feedback?</p>
                                </div>
                            </div>
                        </div>


                        {{-- QUESTION THIRTEEN --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingThirteen'>
                                <div class='col-8 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseThirteen'
                                                aria-expanded='false'
                                                aria-controls='collapseThirteen'>
                                            Question 13. Performance
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'performance'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-4 form-group box2'>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class='form-check form-check-inline stars'>
                                            <input id='performance_{{ $i }}'
                                                   class='form-check-input form-control radio-item'
                                                   type='radio'
                                                   name='performance'
                                                   aria-labelledby='rating-input-label'
                                                   aria-describedby='rating-input-description'
                                                   value='{{ $i }}'
                                                    {{ old('performance') == $i ? 'checked' : '' }}>

                                            <label for='performance_{{ $i }}' class='form-check-label'>
                                                <span id='o-{{ $i }}'
                                                      class='star {{ old('performance') == $i ? 'selected' : '' }}'>★</span>
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseThirteen'
                                 class='collapse'
                                 aria-labelledby='headingThirteen'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>How satisfied were you with your effort in this course?</p>
                                </div>
                            </div>
                        </div>


                        {{-- FOURTEEN QUESTION --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingFourteen'>
                                <div class='col-6 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseFourteen'
                                                aria-expanded='false'
                                                aria-controls='collapseFourteen'>
                                            Question 14. Take course again
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'take_course_again'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-6 form-group box2 text-box'>
                                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                                        <label class='btn btn-warning'>
                                            <input type='radio'
                                                   name='take_course_again'
                                                   id='take_course_again_yes'
                                                   value='1'
                                                   autocomplete='off'>Yes
                                        </label>
                                        <label class='btn btn-warning'>
                                            <input type='radio'
                                                   name='take_course_again'
                                                   id='take_course_again_no'
                                                   value='0'
                                                   autocomplete='off'>No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseFourteen'
                                 class='collapse'
                                 aria-labelledby='headingFourteen'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Would you take this course again?</p>
                                </div>
                            </div>
                        </div>


                        {{-- FIFTEENTH QUESTION --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingFifteenth'>
                                <div class='col-6 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseFifteenth'
                                                aria-expanded='false'
                                                aria-controls='collapseFifteenth'>
                                            Question 15. Grade
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'grade'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-6 form-group box2 text-box'>
                                    <input id='grade'
                                           class='form-control'
                                           type='text'
                                           name='grade'
                                           maxlength='3'
                                           value='{{ old('grade') }}'
                                           placeholder='A, B+, B, ... or n/a'>
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseFifteenth'
                                 class='collapse'
                                 aria-labelledby='headingFifteenth'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>What was your grade for this course?</p>
                                </div>
                            </div>
                        </div>


                        {{-- SIXTEENTH QUESTION --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingSixteenth'>
                                <div class='col-6 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseSixteenth'
                                                aria-expanded='false'
                                                aria-controls='collapseSixteenth'>
                                            Question 16. Tips
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'survival_tips'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-6 form-group box2 text-box'>
                                    <textarea id='survival_tips'
                                              class='form-control'
                                              name='survival_tips'
                                              maxlength='150'
                                              rows='3'
                                              placeholder='Leave your tips here...'>{{ old('survival_tips') }}</textarea>
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseSixteenth'
                                 class='collapse'
                                 aria-labelledby='headingSixteenth'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Any survival tips you would like to share?</p>
                                </div>
                            </div>
                        </div>


                        {{-- SEVENTEENTH QUESTION --}}
                        <div class='card'>
                            {{-- CARD-HEADER --}}
                            <div class='row card-header' id='headingSeventeenth'>
                                <div class='col-6 box1'>
                                    <h2>
                                        <button class='btn btn-link collapsed'
                                                type='button'
                                                data-toggle='collapse'
                                                data-target='#collapseSeventeenth'
                                                aria-expanded='false'
                                                aria-controls='collapseSeventeenth'>
                                            Question 17. Comments
                                        </button>
                                    </h2>
                                    {{-- ALERT MESSAGE --}}
                                    @include('includes.error', ['errorField' => 'comments'])
                                </div>
                                {{-- FORM --}}
                                <div class='col-6 form-group box2 text-box'>
                                <textarea id='comments'
                                          class='form-control'
                                          name='comments'
                                          maxlength='300'
                                          rows='5'
                                          placeholder='Leave your comments here...'>{{ old('comments') }}</textarea>
                                </div>
                            </div>
                            {{-- CARD-BODY --}}
                            <div id='collapseSeventeenth'
                                 class='collapse'
                                 aria-labelledby='headingSeventeenth'
                                 data-parent='#accordionExample'>
                                <div class='card-body'>
                                    <p>Write your review: (i.e: pros and cons; what could be improved;
                                       what are the strengths of the course; what have you liked (and disliked) about the
                                       course; did the course achieve its aims and objectives of the program,...)</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <input type='hidden' name='course_id' value='{{ $course->id }}'>
                    <input class='btn btn-primary submit-review' type='submit' value='Submit review'>

                </form>

            </div> {{-- end content-wrapper --}}

        </div> {{-- end blue-wrapper --}}

    </div>  {{-- end content --}}

@endsection