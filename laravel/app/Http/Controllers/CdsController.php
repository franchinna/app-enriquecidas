<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Cart;
use App\Models\Cd;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\isEmpty;

class CdsController extends Controller
{
    public function index(Request $request)
    {
        $formParams = [];

        $cdsQuery = Cd::with('artist', 'genres')->where('available', 'Y')->orderBy('updated_at', 'DESC');

        if ($request->query('cdtitle')) {
            $cdsQuery->where('title', 'like', '%' . $request->query('cdtitle') . '%');
            $formParams['cdtitle'] = $request->query('cdtitle');
        }

        $cds = $cdsQuery->paginate(3)->withQueryString();

        if ($cds->isEmpty()) {
            return redirect()
                ->route('cds.index')
                ->with([
                    'message' => "There are no CD's with that name",
                    'message-type' => 'warning',
                ]);
        }

        return view('cds.index', compact('cds', 'formParams'));
    }

    public function view(Cd $cd)
    {
        return view('cds.view', compact('cd'));
    }

    public function newForm()
    {

        $artists = Artist::all();
        $genres = Genre::all();

        return view('cds.new', compact('artists', 'genres'));
    }

    public function create(Request $request)
    {

        $request->validate(Cd::$rules);
        $request->merge(['available' => 'Y']);

        $data = $request->only(['title', 'description', 'duration', 'cost', 'release_date', 'artist_id', 'genre_id', 'available']);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $nombreImagen = time() . '.' . $request->imagen->clientExtension();

            Image::make($imagen)->resize(800, 800, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save(storage_path('app/public/imgs/' . $nombreImagen));

            $data['imagen'] = 'imgs/' . $nombreImagen;
        }

        $cd = Cd::create($data);

        //$cd->genres()->attach($request->input('artist_id'));
        $cd->genres()->sync($request->input('genre_id'));

        return redirect()
            ->route('cds.index')
            ->with('message', 'CD created successful')
            ->with('message-type', 'success');
    }

    public function editForm(Cd $cd)
    {
        $artists = Artist::all();
        $genres = Genre::all();

        // Busca si ya hay un elemento de Cd en el carrito
        $cdArtist = Artist::where('artist_id', $cd->artist_id)
            ->first();

        return view('cds.edit', compact('cd','cdArtist', 'artists', 'genres'));
    }

    public function edit(Request $request, Cd $cd)
    {

        $request->validate(Cd::$rules);

        $cd->update($request->only(['title', 'description', 'duration', 'cost', 'release_date', 'artist_id']));
        $cd->genres()->sync($request->input('genre_id'));

        return redirect()
            ->route('cds.index')
            ->with([
                'message' => "CD '{$cd->title}' updated successfully.",
                'message-type' => 'success',
            ]);
    }

    public function delete(Cd $cd)
    {

        // $cd->genres()->detach();
        // $cd->delete();

        $cd->update(['available' => 'N']);

        return redirect()
            ->route('cds.index')
            ->with([
                'message' => "CD '{$cd->title}' deleted successfully.",
                'message-type' => 'success',
            ]);
    }
}
