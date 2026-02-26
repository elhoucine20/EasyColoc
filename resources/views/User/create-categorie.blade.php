@extends('layouts.form-card')

@section('title', 'Créer une catégorie')
@section('icon', '🗂️')
@section('card-title', 'Créer une catégorie')
@section('subtitle', 'Organisez vos dépenses en créant des catégories personnalisées.')

@section('form')
<form class="form" action="{{ route('categorie.store') }}" method="POST">
  @csrf
  <input hidden name="colocation_id" value="{{ $idColocation }}">

  <div class="field">
    <label for="name">Nom <span class="label-hint">requis</span></label>
    <input type="text" id="name" name="name" placeholder="Ex: Courses, Loyer…" required/>
  </div>

  <div class="btn-group">
    <a href="{{ route('colocation.index') }}">
      <button type="button" class="btn btn-cancel">Annuler</button>
    </a>
    <button type="submit" class="btn btn-primary">Créer la catégorie</button>
  </div>
</form>
@endsection