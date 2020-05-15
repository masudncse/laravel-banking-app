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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


Route::get('/ajax', function(){
    $name = $_GET['name'];
    return $name;
});

Route::get('/', function () {

    $transactions = App\Transaction::take(3)->orderBy('id', 'DESC')->get();
    return view('dashboard', compact('transactions'));
});


Route::get('status', function(){

    $transactions = DB::select('SELECT b.bank_name, SUM(t.deposit) AS total_deposit, SUM(t.withdraw) AS total_withdraw FROM transactions AS t INNER JOIN banks AS b ON t.bank_id=b.id GROUP BY t.bank_id');
    return view('status', compact('transactions'));
});


Route::get('/createBank', function(){
    $banks = App\Bank::take(5)->get();

    return view('bank.index')->with('banks',$banks);
});

Route::get('/viewBank', function(){
    $banks = App\Bank::paginate(2);

    return view('bank.report')->with('banks',$banks);
});

Route::post('/createBank', function(Request $request){


    $validator = Validator::make($request->all(), [
        'bank_name' => 'required|unique:banks|max:255',
    ]);


    if($validator->fails()){

        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();

    }

    $bank = new App\Bank();
    $bank->bank_name = $request->input('bank_name');
    $bank->save();

    Session::flash('flash_message', 'Data successfully saved!');

    return redirect('createBank');
});


Route::delete('/deleteBank/{id}', function($id){

    $bank = App\Bank::findOrFail($id);
    $bank->delete();

    Session::flash('delete_message', 'Data has been deleted!');
    return redirect('createBank');

});


Route::get('/editBank/{id}', function($id){
    $bank = App\Bank::findOrFail($id);
    return view('bank.edit')->with('bank', $bank);
});


Route::put('/updateBank/{id}', function(Request $request, $id){

    $validator = Validator::make($request->all(), [
        'bank_name' => 'required|max:255'
    ]);

    if($validator->fails()){
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator);
    }

    $bank = App\Bank::findOrFail($id);
    $bank->bank_name = $request->input('bank_name');
    $bank->save();

    Session::flash('update_message', "Data Updated!");

    return redirect()->back();

});


Route::resource('transactions', 'TransactionController');
