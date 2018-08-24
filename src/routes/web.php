<?php


//Symfony\Component\Routing\
Route::group(['namespace'=>'Latfur\Event\Http\Controllers'],function(){
  Route::get('event','EventController@index')->name('event');  
  Route::get('event-list','EventController@event_list');  
  Route::post('event','EventController@save_event');  
  Route::get('all-event','EventController@all_event')->name('all-event');
  Route::get('single-event/{id}','EventController@single_event');
  Route::post('update-event','EventController@update_event');
  Route::delete('delete-event/{id}','EventController@delete_event');
});

