<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','Shop\MainController@index')->name('shop_home');

Route::get('/recommandation/{id}','Shop\MainController@recommande')->name('artiste_recommande');

Route::get('/voir/artiste','Shop\MainController@artiste')->name('voir_artiste');

Route::get('/voir/cat/{id}','Shop\MainController@artiste')->name('voir_cat');

        //Affichage du Tag
Route::get('/tag/{id}','Shop\MainController@tag')->name('voir_tag');

                   // Voir titre de l'artiste
Route::get('/titre{id}','Shop\MainController@titre')->name('voir_titre');
            // Voir pays des musiques
Route::get('/voir/pays/{id}','Shop\MainController@nation')->name('voirPays');

         // voir categorie liée aux vidéo(mouves)
Route::get('/voir/categorie/{id}','Shop\MainController@voirCategorie')->name('voir_categorie');

                //Enregistrement des commentaires
Route::post('/shop/store{id}','Shop\MainController@store')->name('comment_store');

Route::get('/affiche/comment','Shop\MainController@store')->name('comment_Video');

Route::get('/actualite','Backend\ArtisteController@actu')->name('afficheActu');

Route::get('/voir/actualite/{id}','Backend\ArtisteController@videoActu')->name('voirActu');

Route::post('/comments/{id}','Shop\ProcessController@store');


Route::get('/search','Shop\MainController@recherche')->name('musicRecherche');

Auth::routes(['verify' => true]);
               //S'identifier
Route::get('/back', 'HomeController@index')->name('home');


           // Affichage de la page creer un compte
Route::get('/regi', 'Shop\ProcessController@enregistrer')->name('enregistrer_user');

              //Affichage de la page index.blade
Route::get('/music/', 'Backend\ArtisteController@index')->name('ajoutMusic');

           // Insertion de musique dans la base de données
Route::post('/back/store','Backend\ArtisteController@store')->name('backend_artiste_store');

            // Pour afficher la page d'aide a l'utilisation
Route::get('/music/aide', 'Backend\ArtisteController@aide')->name('aide_utiliser');

           // Editer musique
Route::get('/back/edit/{id}','Backend\ArtisteController@edit')->name('backend_edit');

               // Valider la modification artiste
Route::post('/back/update/{id}','Backend\ArtisteController@update')->name('backend_update');

              // Supprimer artiste
Route::get('/back/delete/{id}','Backend\ArtisteController@delete')->name('backend_delete');


 Route::middleware('auth.admin')->group(function () {
              // Affichage de l'espace administrateur
     Route::get('/shop/admin','Shop\ProcessController@admin')->name('shop_admin');

               // Affichage de la liste des users dans l'espace administrateur
     Route::get('/shop/liste','Shop\MainController@liste')->name('user_liste');

           // Modération de commentaires
     Route::get('/liste/comment','Shop\ProcessController@listeComment')->name('listeAfficheComment');

                 //  Suppression de commentaire
     Route::get('/delete/comment/{id}','Shop\ProcessController@deleted')->name('deleteComment');

              // Modifier user
     Route::get('/back/liste/edit/{id}','Shop\MainController@editListe')->name('backend_liste_edit');

              // Valider la modification de user
     Route::post('/back/liste/update/{id}','Shop\MainController@update')->name('backend_liste_update');

              // Supprimer user
     Route::get('/back/banir/{id}','Shop\MainController@bannir')->name('backend_bannir_user');

             // Editer musique par l'administrateur
     Route::get('/back/admin/edit/{id}','Shop\ProcessController@edit')->name('backend_admin_edit');

                       // Valider la modification
     Route::post('/back/admin/update/{id}','Shop\ProcessController@update')->name('admin_update');

                                   // Supprimer artiste
     Route::get('/back/admin/delete/{id}','Shop\ProcessController@delete')->name('backend_admin_delete');

});




