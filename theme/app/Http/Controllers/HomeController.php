<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogPostRequest;
use App\Http\Requests\clientPostRequest;
use App\Http\Requests\featurePostRequest;
use App\Http\Requests\mainPostRequest;
use App\Http\Requests\ourvaluePostRequest;
use App\Http\Requests\portfolioPostRequest;
use App\Http\Requests\pricePostRequest;
use App\Http\Requests\servicePostRequest;
use App\Http\Requests\teamPostRequest;
use App\Models\About;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Ourvalue;
use App\Models\Portfolio;
use App\Models\Price;
use App\Models\Question;
use App\Models\Service;
use App\Models\Team;
use DataTables;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  view form
    public function index()
    {
        return view('dashboard');
    }

    public function addquestion()
    {
        return view('addquestion');
    }

    public function permission(Request $request)
    {

    }

    public function admin()
    {
        return view('Admin');
    }

    public function team()
    {
        return view('team');
    }
    public function showcontact()
    {
        return view('showcontact');
    }
    public function blog()
    {
        return view('blog');
    }

    public function showserivcesection()
    {
        return view('showserivcesection');
    }

    public function show()
    {
        return view('aboutmainshow');

    }

    public function main()
    {
        return view('main');
    }
    public function xyz()
    {
        return view('xyz');
    }
    public function postxyz(Request $request)
    {
        $this->validate($request, [
            'ck.*' => ['required'],
            'option.*' => ['bail', 'required_without:checkbox.*'],
            'checkbox.*' => ['bail', 'required_without:option.*'],
            
        ]);
        foreach($request->option as $null){

        }
                if ($null == !null) {
        
                    $radio=$request->option;
                    dd($radio);

                }

                foreach($request->checkbox as $blog){
        
                }
                      
                if($blog == !null) {
                
                    $checkbox=$request->checkbox;
                    dd( $checkbox);
                    
                } 
        

       

    }

    public function valueshow()
    {
        return view('valueshow');

    }

    public function showfet()
    {
        return view('showfetures');

    }

    public function showportfolio()
    {
        return view('showportfolio');

    }

    public function portfolio()
    {
        return view('portfolio');

    }

    public function showvalues()
    {
        return view('ourvalues');
    }

    public function showprice()
    {
        return view('showprice');
    }

    public function featuresshow()
    {
        return view('features');
    }

    public function showservices()
    {
        return view('services');
    }

    public function price()
    {
        return view('price');

    }

    public function showfeatures()
    {
        return view('features');
    }

    public function showteam()
    {
        return view('showteam');
    }

    public function client()
    {
        return view('client');
    }

    public function showclient()
    {
        return view('showclient');
    }

    public function showquestion()
    {
        $data = Question::all();
        return view("showquestions", ['data' => $data]);
    }

    // Delete functionality

    public function destroy(Request $request, $id)
    { //For Deleting Users

        $data = json_encode($request->value, true);

        $options = new Question;
        $options = Question::find($id);
        $options->delete($data);
        return response()->json([
            'success' => 'Record has been deleted successfully!',
        ]);
    }

    public function quedelete($id)
    {
        Question::where('options', $id)->delete();
        $data = Question::where('id', $id)->first();

        return view('editque', ['data' => $data]);

    }
    public function deleteportfolio($id)
    {
        Portfolio::where('id', $id)->delete();
        return redirect('showportfolio')->with('success', 'One product deleted successfully');
    }

    public function deletemain($id)
    {
        About::where('id', $id)->delete();
        return redirect('show')->with('success', 'One product deleted successfully');
    }

    public function deleteourvalue($id)
    {
        Ourvalue::where('id', $id)->delete();
        return redirect('valueshow')->with('success', 'One product deleted successfully');
    }

    public function deletefeature($id)
    {
        Feature::where('id', $id)->delete();
        return redirect('showfeatures')->with('success', 'One product deleted successfully');
    }

    public function deleteservice($id)
    {
        Service::where('id', $id)->delete();
        return redirect('showserivcesection')->with('success', 'One product deleted successfully');
    }

    public function deleteprice($id)
    {
        Price::where('id', $id)->delete();
        return redirect('showprice')->with('success', 'One product deleted successfully');
    }

    public function deleteclient($id)
    {
        Client::where('id', $id)->delete();
        return redirect('showclient')->with('success', 'One product deleted successfully');
    }

    public function deleteteam($id)
    {
        Team::where('id', $id)->delete();
        return redirect('showteam')->with('success', 'One product deleted successfully');
    }

    // load ajax view data
    public function showclientajax()
    {
        return DataTables::of(Client::query())->addColumn('action', function ($id) {
            return '<a href="editclient/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteclient/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function showportfolioajax()
    {
        return DataTables::of(Portfolio::query())->addColumn('action', function ($id) {
            return '<a href="editclient/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteclient/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function showserivceajax()
    {
        return DataTables::of(Service::query())->addColumn('action', function ($id) {
            return '<a href="editservice/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteservice/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function showteamajax()
    {
        return DataTables::of(Team::query())->addColumn('action', function ($id) {
            return '<a href="editteam/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteteam/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function priceajax()
    {
        return DataTables::of(Price::query())->addColumn('action', function ($id) {
            return '<a href="editprice/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteprice/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function aboutmainshow()
    {

        return DataTables::of(About::query())->addColumn('action', function ($id) {
            return '<a href="editmain/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deletemain/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function valueshowajax()
    {

        return DataTables::of(OurValue::query())->addColumn('action', function ($id) {
            return '<a href="editourvalue/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteourvalue/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function showcontactajax()
    {

        return DataTables::of(Contact::query())->addColumn('action', function ($id) {
            return '<a href="editourvalue/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deleteourvalue/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    public function showfeaturesajax()
    {

        return DataTables::of(Feature::query())->addColumn('action', function ($id) {
            return '<a href="editfeature/' . $id->id . '" class="btn btn-primary">Edit</a>
            <a href="deletefeature/' . $id->id . '" class="btn btn-danger">Delete</a>
              ';})->make(true);
    }

    // post form functionality
    public function aboutmain(mainPostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $aboutmain = new About;
        $aboutmain->title = $request->title;
        $aboutmain->body = $request->body;
        $aboutmain->description = $request->description;
        $aboutmain->image = $imageName;
        $aboutmain->save();
        return redirect('main')->with('success', 'Data is inserted');

    }

    public function ourvalues(ourvaluePostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $ourvalue = new Ourvalue;

        $ourvalue->body = $request->body;
        $ourvalue->description = $request->description;
        $ourvalue->image = $imageName;
        $ourvalue->save();
        return redirect('ourvalues')->with('success', 'Data is inserted');

    }

    public function features(featurePostRequest $request)
    {
        $feture = Feature::all();
        if ($feture->count() < 6) {
            $feature = new Feature;
            $feature->body = $request->body;
            $feature->save();
            return redirect('features')->with('success', 'Data is inserted');
        } else {
            return redirect('features')->with('fails', 'sorry  6 data is already exist you can not be add more data !');
        }
    }

    public function services(servicePostRequest $request)
    {
        $service = Service::all();

        $service = new Service;
        $service->body = $request->body;
        $service->description = $request->description;
        $service->save();
        return redirect('showservice')->with('success', 'Data is inserted');

    }

    public function postque(blogPostRequest $request)
    {
     
     $optionradio=$request->optionradio;
     $optionradio=$request->optioncheckbox;

        $blog=[];
       
        $data[]=$request->all();
         
        foreach($data as $row){

            $blog[]=[
            'questions'=>json_encode($row['ck']),
            'options'=>$optionradio,
            'options'=>json_encode($row['option']),
            'checkbox'=>$optionradio,
            'checkbox'=>json_encode($row['checkbox']),

            ];
           dd($blog);
            DB::table('questions')->insert($blog);
            echo 'Success';

        }
         
    }
    

    public function postclient(clientPostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $client = new Client;
        $client->image = $imageName;
        $client->save();
        return redirect('client')->with('success', 'Data is inserted');

    }

    public function postportfolio(portfolioPostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $portfolio = new Portfolio;
        $portfolio->image = $imageName;
        $portfolio->save();
        return redirect('portfolio')->with('success', 'Data is inserted');
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',

            'message' => 'required',
        ]);

        $contact = new contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return response()->json(['success' => 'Record has been deleted']);
    }

    public function postblog(blogPostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $curTime = new \DateTime();
        $created_at = $curTime->format("Y-M-d ");
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->date = $created_at;
        $blog->image = $imageName;
        $blog->save();
        return redirect('blog')->with('success', 'Data is inserted');

    }

    public function postprice(pricePostRequest $request)
    {

        $file = $request->file('image');

        $image = $request->image;

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img'), $imageName);
        $price = new Price;
        $price->plan = $request->plan;
        $price->price = $request->price;
        $price->image = $imageName;
        $price->save();
        return redirect('price')->with('success', 'Data is inserted');
    }

    public function postteam(teamPostRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        }
        $team = new Team;
        $team->title = $request->title;
        $team->body = $request->body;
        $team->description = $request->description;
        $team->image = $imageName;
        $team->save();
        return redirect('team')->with('success', 'Data is inserted');
    }

    // Edit view data functionality
    public function editmain($id)
    {
        $data = About::where('id', $id)->first();

        return view('editmain', ['data' => $data]);
    }

    public function editservice($id)
    {
        $data = Service::where('id', $id)->first();

        return view('editservice', ['data' => $data]);
    }

    public function editclient($id)
    {
        $data = Client::where('id', $id)->first();

        return view('editclient', ['data' => $data]);
    }

    public function editprice($id)
    {
        $data = Price::where('id', $id)->first();

        return view('editprice', ['data' => $data]);
    }

    public function editfeature($id)
    {
        $data = Feature::where('id', $id)->first();

        return view('editfeature', ['data' => $data]);
    }

    public function editourvalue($id)
    {
        $data = Ourvalue::where('id', $id)->first();

        return view('editourvalue', ['data' => $data]);
    }

    public function editteam($id)
    {
        $data = Team::where('id', $id)->first();

        return view('editteam', ['data' => $data]);
    }

    public function editblog($id)
    {
        $data = Blog::where('id', $id)->first();

        return view('editblog', ['data' => $data]);
    }

    public function quedit($id)
    {
        $data = Question::where('id', $id)->first();

        return view('editque', ['data' => $data]);
    }

    // update view daata functionality
    public function updatemain(mainPostRequest $request)
    {
        $updatemain = About::find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $updatemain->image;
        }

        $updatemain->title = $request->title;
        $updatemain->body = $request->body;
        $updatemain->description = $request->description;
        $updatemain->image = $imageName;
        $updatemain->save();
        return redirect('main')->with('success', 'Data is updated successfully');

    }

    public function updateblog(blogPostRequest $request)
    {
        $curTime = new \DateTime();
        $created_at = $curTime->format("Y-M-d ");
        $updateblog = Blog::find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $updatemain->image;
        }

        $updatemain->title = $request->title;
        $updatemain->date = $created_at;
        $updatemain->image = $imageName;
        $updatemain->save();
        return redirect('main')->with('success', 'Data is updated successfully');

    }

    public function updateourvalues(ourvaluePostRequest $request)
    {
        $ourvalue = Ourvalue::find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $ourvalue->image;
        }
        $ourvalue->body = $request->body;
        $ourvalue->description = $request->description;
        $ourvalue->image = $imageName;
        $ourvalue->save();
        return redirect('ourvalues')->with('success', 'Data is updated successfullly');

    }

    public function updatefeatures(featurePostRequest $request)
    {
        $feature = Feature::find($request->id);

        $feature->body = $request->body;

        $feature->save();
        return redirect('showfeatures')->with('success', 'Data is Updated successfully');

    }

    public function updateservice(servicePostRequest $request)
    {
        $service = Service::find($request->id);

        $service->body = $request->body;
        $service->description = $request->description;

        $service->save();
        return redirect('showserivcesection')->with('success', 'Data is Updated successfully');

    }

    public function updateclient(clientPostRequest $request)
    {
        $service = Client::find($request->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $service->image;
        }
        $service->image = $request->image;
        $service->save();
        return redirect('showclient')->with('success', 'Data is Updated successfully');

    }

    public function updateprice(pricePostRequest $request)
    {
        $price = Price::find($request->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $price->image;
        }
        $price->plan = $request->plan;
        $price->price = $request->price;
        $price->image = $imageName;
        $price->save();
        return redirect('ourvalues')->with('success', 'Data is updated successfiully');

    }

    public function updateteam(teamPostRequest $request)
    {
        $team = Team::find($request->id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img'), $imageName);

        } else {
            $imageName = $team->image;
        }
        $team->title = $request->title;
        $team->body = $request->body;
        $team->description = $request->description;
        $team->image = $imageName;
        $team->save();
        return redirect('showteam')->with('success', 'Data is updated succesfully');

    }
    public function updateque(blogPostRequest $request)
    {

        if ($request->option) {

            $radio = $request->option;

        }
        if ($request->checkbox) {

            $checkbox = $request->checkbox;
        }

        $data[] = $request->ck;
        foreach ($data as $name) {

        }
        $objectTagProduct = Question::find($request->id);

        $objectTagProduct->questions = $name;
        if ($request->option == !null) {
            $objectTagProduct->options = json_encode($radio);
        }
        if ($request->checkbox == !null) {
            $objectTagProduct->checkbox = json_encode($checkbox);
        }

        $objectTagProduct->save();
        return redirect('showquestion')->with('success', 'Question  is updated');
    }

}
