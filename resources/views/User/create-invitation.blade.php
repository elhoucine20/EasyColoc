@extends('layouts.form-card')

@section('title', 'Inviter un membre')
@section('icon', '✉️')
@section('card-title', 'Inviter un membre')
@section('subtitle', 'Envoyez une invitation par e-mail pour rejoindre votre colocation.')

@section('form')
<form class="form" action="{{ route('invitation.store') }}" method="POST">
  @csrf
  <input hidden name="colocation_id" value="{{ $idColocation }}">

  <div class="field">
    <label for="email">Email <span class="label-hint">requis</span></label>
    <input type="email" id="email" name="email" placeholder="exemple@email.com" required/>
  </div>

  <div class="btn-group">
    <a href="{{ route('colocation.show', $idColocation) }}">
      <button type="button" class="btn btn-cancel">Annuler</button>
    </a>
    <button type="submit" class="btn btn-primary">Envoyer l'invitation</button>
  </div>
</form>
@endsection