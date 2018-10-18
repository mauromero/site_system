<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CustomerController extends Controller
{

    public function index(){
        if( auth()->user() ){
            $queries = [];
            $customers = Customer::sortable(['company' => 'asc'])->paginate(5)->appends($queries);
            return view('customers.index',compact ('customers'));
        }else{
            return redirect('/home');
        }  
    }

    public function create(){
        if( auth()->user() ){
            return view('customers.create');
        }else{
            return redirect('/home');
        }  
    }

    public function store(Request $request){
        if( auth()->user() ){

            $this->validate($request,[
                'company' => 'required|max:255|unique:customers,company',
                'name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'email|max:50'
            ]);
            
            $new_customer = Customer::create([
                'company'=> request('company'),
                'name'=> request('name'),
                'last_name'=> request('last_name'),
                'phone'=> request('phone'),
                'cellphone'=> request('cellphone'),
                'email'=> request('email'),
                'address'=> request('address'),
                'notes'=>request('notes')
            ]);
            return redirect('/customers');
        }else{
            return redirect('/home');
        }  
    }

    public function show(Customer $customer){
        return view('customers.show',compact ('customer'));
    }

    public function edit(Customer $customer){
        if( auth()->user() ){
            return view('customers.edit',compact ('customer'));
        }else{
            return redirect('/home');
        }   
    }

    public function update(Request $request, $id){

        $this->validate(request(),[
            'company' => 'required|max:255|unique:customers,company,'.$id,
            'name' => 'required|max:50',
            'last_name' => 'max:45',
            'phone' => 'max:45',
            'cellphone' => 'max:45',
            'email' => 'nullable|email|max:50',
            'address' => 'max:255',
            'notes' => 'max:1024'
        ]);
        
        if( auth()->user() ){
            $customer = Customer::find($id);
            $customer->name = request('name');
            $customer->last_name = request('last_name');
            $customer->phone = request('phone');
            $customer->cellphone = request('cellphone');
            $customer->email = request('email');
            $customer->address = request('address');
            $customer->company = request('company');
            $customer->notes = request('notes');
            $customer->updated_at = Carbon::now();
            $customer->save(); 
            return redirect('/customers/'.$id);
        }else{
            return redirect('/home');
        }      
    }

    public function delete(Customer $customer){
        if( auth()->user() ){
            return view('customers.delete',compact ('customer'));
        }else{
            return redirect('/home');
        }   
    }

    public function destroy(Customer $customer){
        if( auth()->user() ){
            $customer->delete();
            return redirect('/customers');
        }else{
            return redirect('/home');
        }   
    }

}
