<?php

namespace Latfur\Event\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Latfur\Event\Models\Event;
use Illuminate\Support\Facades\Validator;
class EventController extends Controller
{
    public function index(){
     
        return view('event::calendar');
    }
     public function event_list(){
        return view('event::list');
    }
    
      public function save_event(Request $request)
    {

            $validator = Validator::make($request->all(),[
            'event_title' => 'required|string|max:150',
            'event_start_date' =>'required|string|max:15',
           ]);


         $feed_back=array(); 
        if ($validator->passes()){
            
             if($request['set_end_date_data']=="No"){
             $request['event_end_date']= $request['event_start_date'];
            }
             $request['event_start_date']=implode("-", array_reverse(explode("/", $request['event_start_date'])));
             $request['event_end_date']= implode("-", array_reverse(explode("/", $request['event_end_date']))); 
             Event::create($request->all());
            
         $feed_back['type']='alert-success';
         $feed_back['message']='Added new records';
         $feed_back['error']=array();    
         
        }else{
         $feed_back['type']='alert-danger';
          $feed_back['error']=  $validator->errors()->all();
          
        }

         return json_encode($feed_back);   
         

    }
    
    public function all_event(){
        $all_event = Event::all()->toArray();
        
    
        $event_data=array();
        foreach ($all_event as $key => $event_val) {	       
        $event_data[$key]['title'] =$event_val['event_title'];
	$event_data[$key]['start'] =$event_val['event_start_date'].' '.date('H:i:s', strtotime($event_val['event_start_time']));
	$event_data[$key]['end']  =$event_val['event_end_date'].' '.date('H:i:s', strtotime($event_val['event_end_time']));
	
        $event_data[$key]['start_formate'] =implode("/", array_reverse(explode("-", $event_val['event_start_date']))).' '.date('h:i:s A', strtotime($event_val['event_start_time']));
	$event_data[$key]['end_formate']  =implode("/", array_reverse(explode("-", $event_val['event_end_date']))).' '.date('h:i:s A', strtotime($event_val['event_end_time']));
	
        
        $event_data[$key]['events_id'] = $event_val['id'];
        $event_data[$key]['event_description'] =$event_val['event_description'];
        $event_data[$key]['created_at'] =date('d/m/Y', strtotime($event_val['created_at']));
		
	} 
    
        echo json_encode($event_data);
        
    }
    
      public function single_event($id)
    {
          $single_event = Event::where('id', $id)->first();
     if($single_event){
        $single_event = $single_event->toArray();
        }
           if(isset($single_event['event_start_date'])){
           $single_event['event_start_date']= implode("/", array_reverse(explode("-", $single_event['event_start_date'])));  
          
           
          }
           if(isset($single_event['event_end_date'])){
           $single_event['event_end_date']= implode("/", array_reverse(explode("-", $single_event['event_end_date'])));  
          }
         echo json_encode($single_event);
		
       
    }
    
    public function update_event(Request $request){
      
    
        if($request['id']>0){
        
        $validator = Validator::make($request->all(),[
            'event_title' => 'required|string|max:150',
            'event_start_date' =>'required|string|max:15',
           ]);


         $feed_back=array(); 
        if ($validator->passes()){
            
             if($request['set_end_date_data']=="No"){
             $request['event_end_date']= $request['event_start_date'];
            }
             $request['event_start_date']=implode("-", array_reverse(explode("/", $request['event_start_date'])));
             $request['event_end_date']= implode("-", array_reverse(explode("/", $request['event_end_date']))); 
            
            $event  = Event::findOrFail($request['id']);
            $input = $request->all();
            $event->fill($input)->save();
             
             
         $feed_back['type']='alert-success';
         $feed_back['message']='Record successfully updated';
         $feed_back['error']=array();    
         
        }else{
         $feed_back['type']='alert-danger';
          $feed_back['error']=  $validator->errors()->all();
          
        }

         return json_encode($feed_back);   
         
        
        
        
        
        
        
        
        
       
        }
        
    }
    public function delete_event($id){
         $feed_back['type']='alert-danger';
          $feed_back['message']=  'Something Wrong';
     
        $event = Event::find($id);
      if ($event != null) 
      {
      $event->delete();
    $feed_back['type']='alert-success';
         $feed_back['message']='Record successfully deleted';
     
      }else{
     $feed_back['type']='alert-danger';
        $feed_back['message']=  'Something Wrong';
       }
        
        
        
        
        echo json_encode($feed_back);
    }
}
