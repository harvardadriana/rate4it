@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/create.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='container'>

        <div class='row justify-content-center'>

            <div class='col-md-11 col-lg-9 col-xl-8'>

                <h1>Rating: {{ $course->title }}</h1>

                <form method='POST' action='/reviews'>
                    @csrf

                    <h2>A1. Overall Rating: what do you think about the overall conclusion of the course?</h2>
                    @include('includes.error', ['errorField' => 'overall_rating'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='overall_rating_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='overall_rating'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='overall_rating_{{ $i }}' class='form-check-label'>
                                    <span id='a-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A2. Would you take this course again?</h2>
                    @include('includes.error', ['errorField' => 'take_course_again'])

                    <div class='invalid-feedback'>
                        Please choose one option
                    </div>
                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='take_course_again'
                                   id='take_course_again_yes'
                                   value='yes'
                                   autocomplete='off'>Yes
                        </label>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='take_course_again'
                                   id='take_course_again_no'
                                   value='no'
                                   autocomplete='off'>No
                        </label>
                    </div>

                    <h2>A3. Was attendance mandatory?</h2>
                    @include('includes.error', ['errorField' => 'attendance_mandatory'])

                    <div class='invalid-feedback'>
                        Please choose one option
                    </div>
                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='attendance_mandatory'
                                   id='attendance_mandatory_yes'
                                   value='yes'
                                   autocomplete='off'>Yes
                        </label>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='attendance_mandatory'
                                   id='attendance_mandatory_no'
                                   value='no'
                                   autocomplete='off'>No
                        </label>
                    </div>

                    <h2>A4. Was the class taken for credit?</h2>
                    @include('includes.error', ['errorField' => 'class_taken_for_credit'])

                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='class_taken_for_credit'
                                   id='class_taken_for_credit_yes'
                                   value='yes'
                                   autocomplete='off'>Yes
                        </label>
                        <label class='btn btn-warning'>
                            <input type='radio'
                                   name='class_taken_for_credit'
                                   id='class_taken_for_credit_no'
                                   value='no'
                                   autocomplete='off'>No
                        </label>
                    </div>

                    <h2>A5. Level of difficulty of the course?</h2>
                    @include('includes.error', ['errorField' => 'difficulty'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='difficulty_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='difficulty'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='difficulty_{{ $i }}' class='form-check-label'>
                                    <span id='b-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A6. The course objectives were clear?</h2>
                    @include('includes.error', ['errorField' => 'clear_objectives'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='clear_objectives_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='clear_objectives'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='clear_objectives_{{ $i }}' class='form-check-label'>
                                    <span id='c-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A7. The course was organized and arranged in a logical way?</h2>
                    @include('includes.error', ['errorField' => 'organized'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='organized_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='organized'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='organized_{{ $i }}' class='form-check-label'>
                                    <span id='d-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A8. The course helped you gain deeper insight into the topic?
                        (How confident are you about the subject after taking this course?)</h2>
                    @include('includes.error', ['errorField' => 'gain_deeper_insight'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='gain_deeper_insight_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='gain_deeper_insight'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='gain_deeper_insight_{{ $i }}' class='form-check-label'>
                                    <span id='e-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A9. How was the workload of the course?</h2>
                    @include('includes.error', ['errorField' => 'workload'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='workload_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='workload'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='workload_{{ $i }}' class='form-check-label'>
                                    <span id='f-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A10. How helpful were the homework assignments to your understanding of the material?</h2>
                    @include('includes.error', ['errorField' => 'helpful_assignments'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='helpful_assignments_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='helpful_assignments'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='helpful_assignments_{{ $i }}' class='form-check-label'>
                                    <span id='g-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A11. The course contained clear stated instructions that clarified how assignments were to be completed?</h2>
                    @include('includes.error', ['errorField' => 'clear_assignment_instructions'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='clear_assignment_instructions_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='clear_assignment_instructions'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='clear_assignment_instructions_{{ $i }}' class='form-check-label'>
                                    <span id='h-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A12. The grading criteria was well defined?</h2>
                    @include('includes.error', ['errorField' => 'grading'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='grading_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='grading'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='grading_{{ $i }}' class='form-check-label'>
                                    <span id='i-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A13. The quality of the material provided, readings or reference were valuable or useful?</h2>
                    @include('includes.error', ['errorField' => 'material'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='material_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='material'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='material_{{ $i }}' class='form-check-label'>
                                    <span id='j-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A14. The professor presented the course material in a clear manner that facilitated understanding?
                        (Effective professors can explain complex ideas in simple ways)</h2>
                    @include('includes.error', ['errorField' => 'clarity'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='clarity_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='clarity'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='clarity_{{ $i }}' class='form-check-label'>
                                    <span id='k-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A15. The professor demonstrated in-depth knowledge of the subject?</h2>
                    @include('includes.error', ['errorField' => 'knowledge'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='knowledge_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='knowledge'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='knowledge_{{ $i }}' class='form-check-label'>
                                    <span id='l-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A16. The professor provided helpful support or feedback?</h2>
                    @include('includes.error', ['errorField' => 'feedback'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='feedback_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='feedback'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='feedback_{{ $i }}' class='form-check-label'>
                                    <span id='m-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A17. The TA (Teaching Assistant) provided helpful support or feedback?</h2>
                    @include('includes.error', ['errorField' => 'helpfulness_TA'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='helpfulness_TA_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='helpfulness_TA'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='helpfulness_TA_{{ $i }}' class='form-check-label'>
                                    <span id='n-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A18. How satisfied were you with your effort in this course?</h2>
                    @include('includes.error', ['errorField' => 'performance'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='performance_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='performance'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='performance_{{ $i }}' class='form-check-label'>
                                    <span id='o-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <h2>A19. How many class (or section) sessions did you attend?</h2>
                    @include('includes.error', ['errorField' => 'attendance'])

                    <div class='form-group'>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline stars'>
                                <input id='attendance_{{ $i }}'
                                       class='form-check-input form-control radio-item'
                                       type='radio'
                                       name='attendance'
                                       aria-labelledby='rating-input-label'
                                       aria-describedby='rating-input-description'
                                       value='{{ $i }}'>
                                <label for='attendance_{{ $i }}' class='form-check-label'>
                                    <span id='p-{{ $i }}' class='star'>★</span>
                                </label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group self-assessment'>
                        <label for='hours_studying'>A20. On average, how many hours per week have you spent on this course,
                                                        including attending classes, doing readings, reviewing notes,
                                                        assignments?</label>
                        @include('includes.error', ['errorField' => 'hours_studying'])

                        <input id='hours_studying'
                               class='form-control'
                               type='number'
                               name='hours_studying'
                               aria-labelledby='rating-input-label'
                               aria-describedby='rating-input-description'
                               min='0'
                               value='{{ old('hours_studying') }}'>
                    </div>

                    <div class='form-group self-assessment'>
                        <label for='grade'>A21. Your grade?</label>
                        @include('includes.error', ['errorField' => 'grade'])

                        <input id='grade'
                               class='form-control'
                               type='text'
                               name='grade'
                               maxlength='3'
                               value='{{ old('grade') }}'>
                    </div>

                    <div class='form-group self-assessment'>
                        <label for='survival_tips'>A22. Any survival tips?</label>
                        @include('includes.error', ['errorField' => 'survival_tips'])

                        <textarea id='survival_tips'
                                  class='form-control'
                                  name='survival_tips'
                                  maxlength='150'
                                  rows='3'
                                  placeholder='{{ old('survival_tips') }}'></textarea>
                    </div>

                    <div class='form-group self-assessment'>
                        <label for='comments'>A23. Write your review: (i.e: pros and cons; what could be improved;
                                              what are the strengths of the course; what have you liked (and disliked) about the
                                              course; did the course achieve its aims and objectives of the program,...)</label>
                        @include('includes.error', ['errorField' => 'comments'])

                        <textarea id='comments'
                                  class='form-control'
                                  name='comments'
                                  maxlength='300'
                                  rows='5'
                                  placeholder='{{ old('comments') }}'></textarea>
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

            </div> {{-- end col --}}

        </div> {{-- end row --}}

    </div> {{-- end container --}}

@endsection