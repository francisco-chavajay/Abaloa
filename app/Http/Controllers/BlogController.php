<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    // Método para mostrar el listado de publicaciones
    public function index()
    {
        // Obtener todas las publicaciones paginadas
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);

        // Obtener todos los blogs (sin paginación) para el filtrado
        $todosLosBlogs = Blog::all();

        // Obtener todas las categorías únicas de todos los blogs
        $categoriasUnicas = $todosLosBlogs
            ->pluck('categoria') // Obtener solo la columna 'categoria'
            ->flatMap(function ($categoria) {
                // Dividir las categorías por comas y eliminar espacios en blanco
                return array_map('trim', explode(',', $categoria));
            })
            ->unique() // Eliminar duplicados
            ->values() // Reindexar el array
            ->toArray();

        // Renderizar la vista de Inertia
        return Inertia::render('Public/Blog/Index', [
            'blogs' => $blogs, // Blogs paginados
            'todosLosBlogs' => $todosLosBlogs, // Todos los blogs para el filtrado
            'categoriasUnicas' => $categoriasUnicas, // Categorías únicas
        ]);
    }

    public function indexAdm()
    {
        // Obtener todas las publicaciones
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6);

        // Renderizar la vista de Inertia
        return Inertia::render('administration/Blog/Index', [
            'blogs' => $blogs
        ]);
    }


    // BlogController.php

    public function showPublic($slug)
    {
        // Buscar el blog por el slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Obtener los tres blogs más recientes
        $blogs3ultimos = Blog::orderBy('created_at', 'desc')->take(3)->get();

        // Obtener todos los blogs (sin paginación) para el filtrado
        $todosLosBlogs = Blog::all();

        // Encontrar el índice del blog actual
        $currentIndex = $blogs3ultimos->search(function ($item) use ($blog) {
            return $item->slug === $blog->slug;
        });

        // Obtener el slug del blog anterior y siguiente
        $previousBlogSlug = $currentIndex > 0 ? $blogs3ultimos[$currentIndex - 1]->slug : null;
        $nextBlogSlug = $currentIndex < $blogs3ultimos->count() - 1 ? $blogs3ultimos[$currentIndex + 1]->slug : null;

        return Inertia::render('Public/Blog/ShowPublic', [
            'blogs' => $blog,
            'blogs3ultimos' => $blogs3ultimos, // Tres blogs más recientes
            'todosLosBlogs' => $todosLosBlogs, // Todos los blogs para el filtrado
            'previousBlogSlug' => $previousBlogSlug,
            'nextBlogSlug' => $nextBlogSlug
        ]);
    }



    // Método para mostrar una publicación específica
    public function show($slug)
    {
        // Buscar el blog por el slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return Inertia::render('administration/Blog/Show', [
            'blog' => $blog
        ]);
    }


    // Método para mostrar el formulario de creación de una nueva publicación
    public function create()
    {
        return Inertia::render('administration/Blog/Create');
    }


    public function store(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png,svg,webp|max:5120',
            'titulo' => 'required|string|max:500',
            'subtitulo' => 'required|string|max:500',
            'descripcion' => 'required|string',
            'categoria' => 'required|string|max:255',
        ]);

        // Quitar tildes y caracteres especiales antes de generar el slug
        $tituloLimpio = Str::ascii($request->titulo); // Convierte "Inmersión" -> "Inmersion"
        $tituloLimpio = str_replace([':', ';', '.', ','], '', $tituloLimpio); // Elimina ":" y otros símbolos
        $slug = Str::slug($tituloLimpio, '-');

        // Manejo de la carga de imagen
        $imagePath = $request->file('foto')->store('blog', 'public');
        $imageName = basename($imagePath);

        // Crear la publicación
        $blog = new Blog();
        $blog->foto = $imageName;
        $blog->titulo = $request->titulo;
        $blog->subtitulo = $request->subtitulo;
        $blog->descripcion = $request->descripcion;
        $blog->categoria = $request->categoria;
        $blog->slug = $slug;
        $blog->save();

        return Inertia::render('administration/Blog/Create', [
            'successMessage' => 'Publicación creada correctamente.',
        ]);
    }



    // Método para mostrar el formulario de edición de una publicación existente
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return Inertia::render('administration/Blog/Edit', [
            'blog' => $blog
        ]);
    }

    // Método para actualizar una publicación existente
    public function update(Request $request, $id)
    {
        try {
            // Validar los datos de entrada
            $request->validate([
                'foto' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:5120',
                'titulo' => 'required|string|max:500',
                'subtitulo' => 'required|string|max:500',
                'descripcion' => 'required|string',
                'categoria' => 'required|string|max:255',
            ]);

            // Encontrar la publicación
            $blog = Blog::findOrFail($id);

            // Si hay una nueva imagen, eliminar la anterior y subir la nueva
            if ($request->hasFile('foto')) {
                // Eliminar imagen anterior si existe
                if ($blog->foto) {
                    try {
                        Storage::disk('public')->delete('blog/' . $blog->foto);
                    } catch (\Exception $e) {
                        Log::error('Error al eliminar la imagen anterior: ' . $e->getMessage());
                        return redirect()->route('admin.blog.edit', $id)->withErrors('No se pudo eliminar la imagen anterior.');
                    }
                }

                // Subir nueva imagen
                try {
                    $imagePath = $request->file('foto')->store('blog', 'public');
                    $imageName = basename($imagePath); // Guardamos solo el nombre del archivo
                    $blog->foto = $imageName; // Actualizamos solo con el nombre del archivo
                } catch (\Exception $e) {
                    Log::error('Error al subir la nueva imagen: ' . $e->getMessage());
                    return redirect()->route('admin.blog.edit', $id)->withErrors('Hubo un problema al subir la imagen.');
                }
            }

            // Actualizar los datos de la publicación
            $blog->titulo = $request->titulo;
            $blog->subtitulo = $request->subtitulo;
            $blog->descripcion = $request->descripcion;
            $blog->categoria = $request->categoria;
            $blog->save();

            // Redirigir con éxito a la vista de la lista de publicaciones
            return redirect()->route('admin.blog.index')->with('success', 'Publicación actualizada correctamente.');
        } catch (\Exception $e) {
            // Si ocurre un error durante el proceso de actualización
            Log::error('Error al actualizar la publicación: ' . $e->getMessage());

            // Devolver la vista con un mensaje de error
            return Inertia::render('Admin/Blog/Edit', [
                'blog' => Blog::find($id),
                'errors' => ['general' => 'Hubo un error al intentar actualizar la publicación.']
            ]);
        }
    }


    // Método para eliminar una publicación

    public function destroy(string $id)
    {
        try {
            Log::info("Intentando eliminar el blog con ID: $id");

            // Busca la publicación por ID
            $blog = Blog::findOrFail($id);

            Log::info("Publicación encontrada: ", ['id' => $blog->id, 'foto' => $blog->foto]);

            // Si hay una imagen asociada, intenta eliminarla del almacenamiento
            if ($blog->foto) {
                $imagePath = 'blog/' . $blog->foto;  // Solo usamos el nombre del archivo

                Log::info("Ruta de la imagen a eliminar: $imagePath");

                // Verifica si el archivo existe en el almacenamiento
                if (Storage::disk('public')->exists($imagePath)) {
                    Log::info("La imagen existe, procediendo a eliminar...");
                    Storage::disk('public')->delete($imagePath);
                    Log::info("Imagen eliminada correctamente.");
                } else {
                    Log::warning("La imagen no existe en el almacenamiento: $imagePath");
                }
            } else {
                Log::warning("No se encontró imagen asociada a la publicación.");
            }

            // Elimina el registro del blog
            $blog->delete();

            Log::info("Publicación eliminada exitosamente.");

            // Usar Inertia para devolver la vista actualizada con el mensaje de éxito
            return Inertia::render('administration/Blog/Index', [
                'blogs' => Blog::all(),  // Actualizar la lista de blogs
                'success' => 'Publicación eliminada exitosamente.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar la publicación: ' . $e->getMessage(), [
                'id' => $id,
                'stack' => $e->getTraceAsString(),
            ]);

            // Usar Inertia para devolver la vista actualizada con el mensaje de error
            return Inertia::render('administration/Blog/Index', [
                'blogs' => Blog::all(),  // Actualizar la lista de blogs
                'error' => 'Error al eliminar la publicación. Intenta de nuevo más tarde.'
            ]);
        }
    }
}
