{{-- resources/views/admin/documents/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Subir documento')

@section('content')
<div class="container py-4" style="max-width: 700px;">

  <h1 class="h4 mb-4">⬆️ Subir nuevo documento</h1>

  {{-- Mensajes de validación --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Revisa los campos:</strong>
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @can('documents.manage')
    <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-3">
      @csrf

      <div class="mb-3">
        <label class="form-label">Archivo (PDF, DOC, DOCX) — máx. 10 MB</label>
        <input
          type="file"
          name="document"
          class="form-control @error('document') is-invalid @enderror"
          accept=".pdf,.doc,.docx"
          required>
        @error('document')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Subir</button>
        <a href="{{ route('admin.documents.index') }}" class="btn btn-secondary">Volver al listado</a>
      </div>
    </form>
  @else
    <div class="alert alert-warning">
      No tienes permisos para subir documentos.
      <a href="{{ route('documents.index') }}">Volver a documentos</a>.
    </div>
  @endcan
</div>
@endsection
