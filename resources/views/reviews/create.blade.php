@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/rate.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-11 col-lg-9 col-xl-8' id='r'>

                <h1>Rate a course</h1>

                <form method='POST' action='/rate/display'>
                    {{ csrf_field() }}

                    <div class='form-group'>
                        <h2>* Overall Rating: what do you think about the overall conclusion of the course?</h2>

                            <div class='form-check form-check-inline'>
                                <input class='form-check-input form-control' id='overall_rating_1' type='radio' name='overall_rating'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='1'>
                                <label class='form-check-label' for='overall_rating_1'>1</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input form-control' id='overall_rating_2' type='radio' name='overall_rating'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='2'>
                                <label class='form-check-label' for='overall_rating_2'>2</label>
                            </div>
                    </div>

                    <div class='form-group'>

                        <h2> Test </h2>
                        <div class='form-check form-check-inline'>
                            <div class='stars'>
                                <input class='radio-item' id='1' type='radio' name='overall' value='1'>
                                <label class='form-check-label' for='1'>
                                    <img class='starz' src='/images/star-on.png' alt='Rating star'>
                                </label>
                            </div>
                        </div>

                        <div class='form-check form-check-inline'>
                            <div class='stars'>
                                <input class='radio-item' id='2' type='radio' name='overall' value='2'>
                                <label class='form-check-label' for='2'>
                                    <span class='starz  back' >★</span>
                                </label>
                            </div>
                        </div>

                    </div>

                    <div>
                        <img id='s-1' class='star' src='/images/star-on.png' alt='Rating star'>
                        <img id='s-2' class='star' src='/images/star-on.png' alt='Rating star'>
                        <img id='s-3' class='star' src='/images/star-on.png' alt='Rating star'>
                        <img id='s-4' class='star' src='/images/star-on.png' alt='Rating star'>
                    </div>
                    <br>



                    <div class='form-group'>
                        <h2>* Would you take this course again?</h2>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='take_course_again_yes' type='radio' name='take_course_again'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='yes'>
                            <label class='form-check-label' for='take_course_again_yes'>Yes</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='take_course_again_no' type='radio' name='take_course_again'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='no'>
                            <label class='form-check-label' for='take_course_again_no'>No</label>
                        </div>
                    </div>

                    <div class='form-group'>
                        <h2>Attendance mandatory?</h2>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='attendance_mandatory_yes' type='radio' name='attendance_mandatory'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='yes'>
                            <label class='form-check-label' for='attendance_mandatory_yes'>Yes</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='attendance_mandatory_no' type='radio' name='attendance_mandatory'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='no'>
                            <label class='form-check-label' for='attendance_mandatory_no'>No</label>
                        </div>
                    </div>

                    <div class='form-group'>
                        <h2>Was the class taken for credit?</h2>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='class_taken_for_credit_yes' type='radio' name='class_taken_for_credit'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='yes'>
                            <label class='form-check-label' for='class_taken_for_credit_yes'>Yes</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input' id='class_taken_for_credit_no' type='radio' name='class_taken_for_credit'
                                   aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='no'>
                            <label class='form-check-label' for='class_taken_for_credit_no'>No</label>
                        </div>
                    </div>

                    <div class='form-group'>
                        <h2>* Level of difficulty of the course?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='difficulty_{{ $i }}' type='radio' name='difficulty'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='difficulty_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The course objectives were clear?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='clear_objectives_{{ $i }}' type='radio' name='clear_objectives'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='clear_objectives_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The course was organized and arranged in a logical way?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='organized_{{ $i }}' type='radio' name='organized'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='organized_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The course helped you gain deeper insight into the topic?
                        (How confident are you about the subject after taking this course?)</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='gain_deeper_insight_{{ $i }}' type='radio' name='gain_deeper_insight'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='gain_deeper_insight_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>How was the workload of the course?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='workload_{{ $i }}' type='radio' name='workload'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='workload_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>How helpful were the homework assignments to your understanding of the material?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='helpful_assignments_{{ $i }}' type='radio' name='helpful_assignments'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='helpful_assignments_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The course contained clear stated instructions that clarified how assignments were to be completed?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='clear_assignments_instructions_{{ $i }}' type='radio' name='clear_assignments_instructions'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='clear_assignments_instructions_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The grading criteria was well defined?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='grading_{{ $i }}' type='radio' name='grading'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='grading_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The quality of the material provided, readings or reference were valuable or useful?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='material_{{ $i }}' type='radio' name='material'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='material_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The professor presented the course material in a clear manner that facilitated understanding?
                        (Effective professors can explain complex ideas in simple ways)</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='clarity_{{ $i }}' type='radio' name='clarity'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='clarity_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The professor demonstrated in-depth knowledge of the subject?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='knowledge_{{ $i }}' type='radio' name='knowledge'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='knowledge_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The professor provided helpful support or feedback?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='feedback_{{ $i }}' type='radio' name='feedback'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='feedback_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>The TA (Teaching Assistant) provided helpful support or feedback?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='helpfulness_TA_{{ $i }}' type='radio' name='helpfulness_TA'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='helpfulness_TA_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>How satisfied were you with your effort in this course?</h2>
                        @for ($i = 0; $i < 5; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='performance_{{ $i }}' type='radio' name='performance'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='performance_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>

                    <div class='form-group'>
                        <h2>How many class (or section) sessions did you attend?</h2>
                        @for ($i = 1; $i < 6; $i++)
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' id='attendance_{{ $i }}' type='radio' name='attendance'
                                       aria-labelledby='rating-input-label' aria-describedby='rating-input-description' value='{{ $i }}'>
                                <label class='form-check-label' for='attendance_{{ $i }}'>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>




                    <div class='form-group'>
                        <label for='hours_studying'>On average, how many hours per week have you spent on this course, including attending classes,
                                                    doing readings, reviewing notes, assignments?</label>
                        <input class='form-control' id='hours_studying' type='number' name='hours_studying'
                               aria-labelledby='rating-input-label' aria-describedby='rating-input-description' min='0' value='{{ old('hours_studying') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='grade'>Your grade?</label>
                        <input class='form-control' id='grade' type='text' name='grade' aria-labelledby='rating-input-label' aria-describedby='rating-input-description' maxlength='3' value='{{ old('grade') }}'>
                    </div>

                    <div class='form-group'>
                        <label class='form-check-label' for='survival_tips'>Any survival tips?</label>
                        <textarea class='form-control' id='survival_tips' type='text'
                               aria-labelledby='rating-input-label' aria-describedby='rating-input-description' maxlength='150' rows='3' value='{{ old('survival_tips') }}'></textarea>
                    </div>

                    <div class='form-group'>
                        <label class='form-check-label' for='comments'>Write your review: (i.e: pros and cons; what could be improved;
                                                what are the strengths of the course; what have you liked (and disliked)
                                                about the course; did the course achieve its aims and objectives of the program,...)</label>
                        <textarea id='comments' class='form-control'
                                  aria-labelledby='rating-input-label' aria-describedby='rating-input-description' maxlength='300' rows='5' value='{{ old('comments') }}'></textarea>
                    </div>

                    <input class='btn btn-primary' type='submit' value='Submit review'>

                </form>


            </div> {{-- end col --}}
        </div> {{-- end row --}}
    </div> {{-- end container --}}


@endsection