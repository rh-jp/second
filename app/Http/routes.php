<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Migratie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::group(['middleware' => ['web']], function () {
    /**
     * Show Domain Dashboard
     */
    Route::get('/', function () {
        return view('domains', [
            'domains' => Migratie::orderBy('domain', 'asc')->paginate(500)
        ]);
    });

    /**
     * Add New Domain
     */
    Route::post('/domain', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'date' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $domain = new Migratie;
        $domain->name = $request->name;
        $domain->note = $request->note;
        $domain->date = $request->date;
        $domain->save();

        return redirect('/');
    });


    /**
     * Delete Domain
     */
    Route::delete('/domain/{id}', function ($id) {
        Migratie::findOrFail($id)->delete();

        return redirect('/');
    });
});



Route::get ( '/domeincheck', function () {
    return view ( 'domeincheck' );
} );


Route::get ( '/', function () {
    return view ( 'domeincheck' );
} );
Route::post ( '/', function () {
    $q = Input::get ( 'q' );
    $user = Migratie::where ( 'domain',  $q  )->join('status', 'migraties.id_status', '=', 'status.id')->paginate (1)->setPath ( '' );
    if (count ( $user ) > 0)
        return view ( 'domeincheck' )->withDetails ( $user )->withQuery ( $q );
    else
        return view ( 'domeincheck' )->withMessage ( 'Geen resultaten gevonden. Probeer opnieuw te zoeken !' );
} );


// Route::post ( '/search', function () {
//     $q = Input::get ( 'q' );
//     $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
//     if (count ( $user ) > 0)
//         return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
//     else
//         return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
// } );




Route::get('/test', 'indexController@readItems');
Route::post('/addItem', 'IndexController@addItem');
Route::post ('editItem', 'IndexController@editItem');
Route::post('deleteItem', 'IndexController@deleteItem');
