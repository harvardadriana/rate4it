@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/create.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='row course-title-banner'>

            {{-- LEFT COL --}}
            <div class='col-2 rating-col'>
                <h1>Rating: </h1>
            </div>

            {{-- COURSE TITLE COL --}}
            <div class='col-7 course'>
                <h1>{{ $course->title }}</h1>
                <p class='professor'>Professor(s): </p>
                {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                @foreach($course->instructors as $instructor)
                    <p class='instructor'>
                        <img class='professor-icon'
                             src='/svg/show/professor.svg'
                             alt='Person reading a book'>{{ $instructor->first_name . ' ' . $instructor->last_name }}
                    </p>
                @endforeach
            </div>

        </div>

        <div class='blue-wrapper'>

            <div class='content-wrapper'>

                {{--<div class='col-4 offset-6 heading'>--}}
                    {{--Heading--}}
                {{--</div>--}}

                <form method='POST' action='/reviews'>
                    @csrf

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A1. Overall Rating: what do you think about the overall conclusion of the course?</h2>
                            @include('includes.error', ['errorField' => 'overall_rating'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='a-{{ $i }}' class='star {{ old('overall_rating') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A2. Would you take this course again?</h2>
                            @include('includes.error', ['errorField' => 'take_course_again'])
                            <div class='invalid-feedback'>
                                Please choose one option
                            </div>
                        </div>

                        <div class='col-4'>
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

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A3. Level of difficulty of the course?</h2>
                            @include('includes.error', ['errorField' => 'difficulty'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='b-{{ $i }}' class='star {{ old('difficulty') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A4. The course objectives were clear?</h2>
                            @include('includes.error', ['errorField' => 'clear_objectives'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='c-{{ $i }}' class='star {{ old('clear_objectives') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A5. The course was organized and arranged in a logical way?</h2>
                            @include('includes.error', ['errorField' => 'organized'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='d-{{ $i }}' class='star {{ old('organized') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A6. The course helped you gain deeper insight into the topic?
                                (How confident are you about the subject after taking this course?)</h2>
                            @include('includes.error', ['errorField' => 'gain_deeper_insight'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='e-{{ $i }}' class='star {{ old('gain_deeper_insight') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A7. How was the workload of the course?</h2>
                            @include('includes.error', ['errorField' => 'workload'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='f-{{ $i }}' class='star {{ old('workload') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A8. The course contained clear stated instructions that clarified how assignments were to be completed?</h2>
                            @include('includes.error', ['errorField' => 'clear_assignment_instructions'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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

                                        <label for='clear_assignment_instructions_{{ $i }}' class='form-check-label'>
                                            <span id='h-{{ $i }}' class='star {{ old('clear_assignment_instructions') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A9. The grading criteria was well defined?</h2>
                            @include('includes.error', ['errorField' => 'grading'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='i-{{ $i }}' class='star {{ old('grading') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A10. The quality of the material provided, readings or reference were valuable or useful?</h2>
                            @include('includes.error', ['errorField' => 'material'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='j-{{ $i }}' class='star {{ old('material') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A11. The professor presented the course material in a clear manner that facilitated understanding?
                                (Effective professors can explain complex ideas in simple ways)</h2>
                            @include('includes.error', ['errorField' => 'clarity'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='k-{{ $i }}' class='star {{ old('clarity') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A12. The professor demonstrated in-depth knowledge of the subject?</h2>
                            @include('includes.error', ['errorField' => 'knowledge'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='l-{{ $i }}' class='star {{ old('knowledge') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A13. The professor provided helpful support or feedback?</h2>
                            @include('includes.error', ['errorField' => 'feedback'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='m-{{ $i }}' class='star {{ old('feedback') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row'>

                        <div class='col-6'>
                            <h2>A14. How satisfied were you with your effort in this course?</h2>
                            @include('includes.error', ['errorField' => 'performance'])
                        </div>

                        <div class='col-4'>
                            <div class='form-group'>
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
                                            <span id='o-{{ $i }}' class='star {{ old('performance') == $i ? 'selected' : '' }}'>★</span>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>

                    <div class='row form-group self-assessment'>

                        <div class='col-6'>
                            <label for='grade'>A15. Your grade?</label>
                            @include('includes.error', ['errorField' => 'grade'])
                        </div>
                        <div class='col-4'>
                            <input id='grade'
                                   class='form-control'
                                   type='text'
                                   name='grade'
                                   maxlength='3'
                                   value='{{ old('grade') }}'>
                        </div>

                    </div>

                    <div class='row form-group self-assessment'>

                        <div class='col-6'>
                            <label for='survival_tips'>A16. Any survival tips?</label>
                            @include('includes.error', ['errorField' => 'survival_tips'])
                        </div>
                        <div class='col-4'>
                            <textarea id='survival_tips'
                                      class='form-control'
                                      name='survival_tips'
                                      maxlength='150'
                                      rows='3'
                                      placeholder='Leave your tips here...'>{{ old('survival_tips') }}</textarea>
                        </div>

                    </div>

                    <div class='row form-group self-assessment'>

                        <div class='col-6'>
                            <label for='comments'>A17. Write your review: (i.e: pros and cons; what could be improved;
                                                  what are the strengths of the course; what have you liked (and disliked) about the
                                                  course; did the course achieve its aims and objectives of the program,...)</label>
                            @include('includes.error', ['errorField' => 'comments'])
                        </div>
                        <div class='col-4'>
                            <textarea id='comments'
                                      class='form-control'
                                      name='comments'
                                      maxlength='300'
                                      rows='5'
                                      placeholder='Leave your comments here...'>{{ old('comments') }}</textarea>
                        </div>
                    </div>

                    <input type='hidden' name='course_id' value='{{ $course->id }}'>
                    <input class='btn btn-primary submit-review' type='submit' value='Submit review'>

                </form>


                    {{--@if(count($errors) > 0)--}}
                    {{--<ul class='errors'>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--@endif--}}

            </div> {{-- end content-wrapper --}}

        </div>  {{-- end blue-wrapper --}}

    </div>  {{-- end content --}}

@endsection