@extends('layouts.app')

@section('content')
  <h1>MasyaAllah</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  Lets play a game!<br>
  <a class="btn btn-primary" href="/game/snake">Snake</a>
@endsection

@section('sidebar')
  <p>New side bar show</p>
  @parent
@endsection
