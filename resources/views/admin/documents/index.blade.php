@extends('layouts.app')

@section('title', 'Gestión de Documentos')

@section('content')
<div class="container py-4" style="max-width: 900px;">
    <h1 class="mb-4">_______________________________________________________________</h1>

    {{-- Mensajes de estado --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Subir (solo quien tenga permiso de gestión) --}}
    @can('documents.manage')
        @if (Route::has('admin.documents.create'))
            <div class="mb-3">
                <a href="{{ route('admin.documents.create') }}" class="btn btn-primary">
                    ⬆️ Subir nuevo documento
                </a>
            </div>
        @endif
    @endcan

    {{-- Lista --}}
    @if ($files->isEmpty())
        <div class="alert alert-info mb-0">
            No hay documentos disponibles todavía.
        </div>
    @else
        <ul class="list-group shadow-sm">
            @foreach ($files as $f)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $f->pretty_name }}</strong>
                        <small class="text-muted d-block">
                            @php
                                $dt = \Carbon\Carbon::createFromTimestamp($f->last_modified);
                                $sizeKB = $f->size / 1024;
                                $sizeStr = $sizeKB >= 1024
                                    ? number_format($sizeKB / 1024, 2).' MB'
                                    : number_format($sizeKB, 1).' KB';
                            @endphp
                            📅 {{ $dt->format('d/m/Y H:i') }} — 📦 {{ $sizeStr }}
                        </small>
                    </div>

                    <div class="d-flex gap-2">
                        {{-- Descargar (quien tenga documents.view) --}}
                        @can('documents.view')
                            @if (Route::has('documents.download'))
                                <a href="{{ route('documents.download', $f->stored_name) }}"
                                   class="btn btn-sm btn-success">
                                    Descargar
                                </a>
                            @endif
                        @endcan

                        {{-- Eliminar (quien tenga documents.manage) --}}
                        @can('documents.manage')
                            @if (Route::has('admin.documents.destroy'))
                                <form action="{{ route('admin.documents.destroy', $f->stored_name) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este documento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                        @endcan
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
