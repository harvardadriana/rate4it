@extends('layouts.master')

@section('content')

    <div class='content'>
        <div class='outer-search'>

            {{-- SEARCH BOX --}}
            <div class='search left'>
                <h1>Welcome to {{ config('app.name') }}</h1>
                <div class='form_container'>

                    <form class='form-group'
                          role='search'
                          aria-label='Search for a course'
                          action='/search-process'
                          method='GET'>

                        <div class='form-group'>
                            <label for='searchTerm'>Search for course:</label>
                            <input list='courses'
                                   class='form-control'
                                   type='text'
                                   name='searchTerm'
                                   size='60'
                                   value='{{ $searchTerm }}'>
                            <datalist id='courses'>
                                @foreach($coursesArray as $course)
                                    <option value='{{$course}}'></option>
                                @endforeach
                            </datalist>
                        </div>
                        <button type="submit" class="btn btn-default" value='Search'>Search</button>
                    </form>
                </div>
            </div>

            {{-- ILLUSTRATION --}}
            <img class='illustration left' src='/images/3.png' alt='Man seating in the computer rating courses'>
        </div>
    </div>

@endsection