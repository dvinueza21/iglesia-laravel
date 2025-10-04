<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Lista documentos desde storage/app/documents y
     * construye un nombre legible a partir del nombre almacenado.
     */
    public function index()
    {
        // Asegura que exista la carpeta
        if (!Storage::exists('documents')) {
            Storage::makeDirectory('documents');
        }

        $files = collect(Storage::files('documents'))
            ->filter(fn ($p) => !str_ends_with($p, '.gitignore'))
            ->map(function ($path) {
                $stored = basename($path); // p.ej. 20251001-163045__boletin-semanal.pdf

                return (object) [
                    'path'          => $path,                         // documents/...
                    'stored_name'   => $stored,                      // 20251001-163045__boletin-...
                    'pretty_name'   => $this->prettyNameFromStored($stored), // Boletin Semanal.pdf
                    'size'          => Storage::size($path),
                    'last_modified' => Storage::lastModified($path),
                ];
            });

        // Puedes reutilizar esta vista tanto para /documents como para /admin/documents
        return view('admin.documents.index', compact('files'));
    }

    /** Formulario de subida (solo admin@iglesia.com vía middleware) */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Sube el documento con nombre controlado:
     *   YYYYMMDD-HHMMSS__<slug-del-nombre-original>.<ext>
     */
    public function store(Request $request)
    {
        $request->validate([
            'document' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:10240'], // 10 MB
        ]);

        $file = $request->file('document');

        // Partes del nombre original
        $original = $file->getClientOriginalName();                  // "Boletín Semanal 11-06-23.pdf"
        $ext      = strtolower($file->getClientOriginalExtension()); // "pdf"
        $base     = pathinfo($original, PATHINFO_FILENAME);          // "Boletín Semanal 11-06-23"

        // Slug legible
        $slug   = Str::slug($base);                                  // "boletin-semanal-11-06-23"
        // Prefijo de fecha/hora para evitar colisiones
        $prefix = now()->format('Ymd-His');                          // "20251001-163045"

        // Nombre final guardado
        $storedName = "{$prefix}__{$slug}.{$ext}";                   // "20251001-163045__boletin-semanal-11-06-23.pdf"

        // Asegura que exista la carpeta
        if (!Storage::exists('documents')) {
            Storage::makeDirectory('documents');
        }

        // Guardar
        $file->storeAs('documents', $storedName);

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Documento subido correctamente.');
    }

    /** Descargar por nombre almacenado, proponiendo un nombre legible al navegador */
    public function download(string $filename)
    {
        $path = 'documents/'.$filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        // Nombre visible al descargar (reconstruido desde el almacenado)
        $downloadAs = $this->prettyNameFromStored($filename);

        return Storage::download($path, $downloadAs);
    }

    /** Eliminar documento por nombre almacenado (solo admin@iglesia.com vía middleware) */
    public function destroy(string $filename)
    {
        $path = 'documents/'.$filename;

        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Documento eliminado.');
    }

    /**
     * A partir de "20251001-163045__boletin-semanal-11-06-23.pdf"
     * devuelve "Boletin Semanal 11 06 23.pdf"
     */
    private function prettyNameFromStored(string $stored): string
    {
        $ext  = pathinfo($stored, PATHINFO_EXTENSION); // pdf
        $name = pathinfo($stored, PATHINFO_FILENAME);  // 20251001-163045__boletin-semanal-11-06-23

        // Quitar prefijo timestamp + "__"
        $parts    = explode('__', $name, 2);
        $slugPart = $parts[1] ?? $name;

        // De slug a título
        $prettyBase = Str::title(str_replace('-', ' ', $slugPart));

        return "{$prettyBase}.{$ext}";
    }
}
