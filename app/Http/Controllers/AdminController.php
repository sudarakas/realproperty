<?php

namespace App\Http\Controllers;

use Alert;
use App\Admin;
use App\Apartment;
use App\Article;
use App\Building;
use App\House;
use App\Land;
use App\MailNotification;
use App\Mail\ContactMail;
use App\Mail\EmailNotification;
use App\Message;
use App\Property;
use App\ReportProperty;
use App\User;
use App\UserEmail;
use App\Warehouse;
use Auth;
use function GuzzleHttp\json_encode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $properties = Property::limit(5)->orderBy('id', 'desc')->get();
        $users = User::limit(5)->orderBy('id', 'desc')->get();

        //Type Graph
        $graphData = Property::select('type', DB::raw('count(type) number'))->groupBy('type')->get();
        $array[] = ['Type', 'Number'];
        foreach ($graphData as $key => $value) {

            $array[++$key] = [$value->type, $value->number];
        }
        $data = json_encode($array);

        //User Registration
        $graphUser = User::select(DB::raw('monthname(created_at) as Month,count(date_format(created_at,"%m")) as Count'))->groupBy('Month')->get();
        $arrayUser[] = ['Month', 'Count'];
        foreach ($graphUser as $key => $value) {

            $arrayUser[++$key] = [$value->Month, $value->Count];
        }
        $graphUserData = json_encode($arrayUser);

        //Provice Chart
        $graphDataProvice = Property::select('province', DB::raw('count(province) number'))->groupBy('province')->get();
        $arrayProvice[] = ['Provice', 'Number'];
        foreach ($graphDataProvice as $key => $value) {

            $arrayProvice[++$key] = [$value->province, $value->number];
        }

        $graphUserProvince = json_encode($arrayProvice);

        //Property Reports
        $graphReport = ReportProperty::select(DB::raw('monthname(created_at) as Month,count(date_format(created_at,"%m")) as Count'))->groupBy('Month')->get();
        $arrayReport[] = ['Month', 'Count'];
        foreach ($graphReport as $key => $value) {

            $arrayReport[++$key] = [$value->Month, $value->Count];
        }
        $graphReportData = json_encode($arrayReport);

        //Type Graph
        $graphAvailability = Property::select('availability', DB::raw('count(availability) number'))->groupBy('availability')->get();
        $arrayAvailability[] = ['Availability', 'Number'];
        foreach ($graphAvailability as $key => $value) {

            $arrayAvailability[++$key] = [$value->availability, $value->number];
        }
        $graphAvailabilityData = json_encode($arrayAvailability);

        return view('admin.master', compact('properties', 'users', 'data', 'graphUserData', 'graphUserProvince', 'graphReportData', 'graphAvailabilityData'));
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(\public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }

    public function viewUser(User $user)
    {

        $id = $user->id;
        $properties = Property::where(function ($query) use ($id) {

            $query->where('user_id', '=', $id);

        })->get();

        return view('admin.master', compact('user', 'properties'));

    }

    public function showAdminEditHouse(House $house)
    {

        return view('admin.master', compact('house'));

    }

    public function showAdminEditLand(Land $land)
    {

        return view('admin.master', compact('land'));

    }

    public function showAdminEditBuilding(Building $building)
    {

        return view('admin.master', compact('building'));

    }

    public function showAdminEditApartment(Apartment $apartment)
    {

        return view('admin.master', compact('apartment'));

    }

    public function showAdminEditWarehouse(Warehouse $warehouse)
    {

        return view('admin.master', compact('warehouse'));

    }

    public function viewAllProperty()
    {

        $properties = Property::paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllHouse()
    {

        $properties = Property::where(function ($query) {

            $query->where('type', '=', 'house');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllLand()
    {

        $properties = Property::where(function ($query) {

            $query->where('type', '=', 'land');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllBuilding()
    {

        $properties = Property::where(function ($query) {

            $query->where('type', '=', 'building');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllApartment()
    {

        $properties = Property::where(function ($query) {

            $query->where('type', '=', 'apartment');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllWarehouse()
    {

        $properties = Property::where(function ($query) {

            $query->where('type', '=', 'warehouse');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllUsers()
    {

        $users = User::paginate(20);
        return view('admin.master', compact('users'));
    }

    public function adminContactUser(User $user)
    {

        return view('admin.master', compact('user'));

    }

    public function adminContactUserSend(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2500|min:10',
        ]);

        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        $message = new UserEmail;
        $message->receiver_id = request('receiverid');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = 'Administrator';
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = '/';
        $message->save();

        $request->name = 'Administrator';
        $request->email = auth()->user()->email;
        $request->pno = auth()->user()->phoneNo;
        $request->property_url = '/';

        \Mail::to(request('receiver'))->send(new ContactMail($request));

        Alert::success('Message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();
    }

    public function showAdminEditUser(User $user)
    {

        return view('admin.master', compact('user'));
    }

    public function adminEditUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'descrption' => 'required|string|max:100',
            'nic' => 'required|string|regex:/^[0-9]{9}[Vv]$/',
            'address' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required',
            'phoneno' => 'required|numeric',
        ]);

        $user = User::find(request('id'));
        if (strcmp($user->email, request('email')) != 0) {
            $user->email_verified_at = null;
        }
        $user->name = request('name');
        $user->email = request('email');
        $user->description = request('descrption');
        $user->NIC = request('nic');
        $user->address = request('address');
        $user->city = request('city');
        $user->gender = request('gender');
        $user->phoneNo = request('phoneno');
        $user->save();

        Alert::success('User has been edited successfully!', 'Saved Successfully')->autoclose(3000);
        return back()->with('message', 'User account has been successfully updated!');
    }

    public function adminDeleteUser(User $user)
    {

        //delete all properties
        $properties = $user->properties;

        foreach ($properties as $property) {

            $propertyType = checkPropertyTypeById($property->id);

            if (strcmp($propertyType, 'house')) {

                DB::table('houses')->where('property_id', '=', $property->id)->delete();

            } elseif (strcmp($propertyType, 'land')) {

                DB::table('lands')->where('property_id', '=', $property->id)->delete();

            } elseif (strcmp($propertyType, 'building')) {

                DB::table('buildings')->where('property_id', '=', $property->id)->delete();

            } elseif (strcmp($propertyType, 'apartment')) {

                DB::table('apartments')->where('property_id', '=', $property->id)->delete();

            } elseif (strcmp($propertyType, 'warehouse')) {

                DB::table('warehouses')->where('property_id', '=', $property->id)->delete();

            } else {
                Alert::error('Your request has been denied by the system', 'System Error')->autoclose(3000);
                return redirect('/profile');
            }

            //delete main property
            DB::table('properties')->where('id', '=', $property->id)->delete();
        }

        DB::table('users')->where('id', '=', $user->id)->delete();

        Alert::success('User account has been deleted successfully!', 'Successfully Deleted!')->autoclose(3000);
        return back();

    }

    public function showAdminAddUser()
    {

        return view('admin.master');
    }

    public function adminAddUser(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        Alert::success('User account has been added successfully!', 'Successfully Added!')->autoclose(3000);
        return back();
    }

    public function viewAllAdmin()
    {

        $admins = Admin::paginate(15);

        return view('admin.master', compact('admins'));
    }

    public function showAdminAddAdmin()
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper) {
            return view('admin.master');
        } else {
            Alert::warning('You do not have premission to add a new admin!', 'Access Denied!')->autoclose(3000);
            return back();
        }

    }

    public function adminAddAdmin(Request $request)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string', 'email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            
            $user = new Admin();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            if( $request->has('issuper')){
                $user->issuper = 1;
            }
            $user->save();

            Alert::success('Admin account has been added successfully!', 'Successfully Added!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('You do not have premission to add a new admin!', 'Access Denied!')->autoclose(3000);
            return back();
        }

    }

    public function showAdminEditAdmin(Admin $admin)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper || Auth::guard('admin')->user()->id == $admin->id) {
            return view('admin.master', compact('admin'));
        } else {
            Alert::warning('You do not have premission to edit admin!', 'Access Denied!')->autoclose(3000);
            return back();
        }

    }

    public function AdminEditAdmin(Request $request)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;

        if ($isSupper || Auth::guard('admin')->user()->id == request('id')) {
            if (request('password')) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string', 'email|max:255|unique:users',
                    'password' => 'string|min:8',
                ]);
            } else {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string', 'email|max:255|unique:users',
                ]);
            }

            $admin = Admin::find(request('id'));
            $admin->name = request('name');
            $admin->email = request('email');
            if (request('password')) {
                $admin->password = Hash::make(request('password'));
            } else {
                $admin->password = $admin->password;
            }
            $admin->update();

            Alert::success('Admin account has been edit successfully!', 'Successfully Saved!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('You do not have premission to edit admin!', 'Access Denied!')->autoclose(3000);
            return back();
        }

    }

    public function adminDeleterAdmin(Admin $admin)
    {

        $isSupper = Auth::guard('admin')->user()->issuper;
        if ($isSupper) {
            DB::table('admins')->where('id', '=', $admin->id)->delete();
            Alert::success('Admin account has been deleted successfully!', 'Deleted Successfully!')->autoclose(3000);
            return back();
        } else {
            Alert::warning('You do not have premission to delete admin!', 'Access Denied!')->autoclose(3000);
            return back();
        }

    }

    public function viewReports()
    {

        $reports = ReportProperty::paginate(20);

        return view('admin.master', compact('reports'));

    }

    public function lockProperty(Property $property)
    {

        $property = Property::find($property->id);
        $property->availability = 'LOCKED';
        $property->save();

        $message = new MailNotification;
        $message->receiver_email = $property->user->email;
        $message->receiver_name = $property->user->name;
        $message->property_name = $property->name;
        $message->property_location = $property->city;
        $message->property_createdOn = $property->created_at;
        $message->status = 'locked';
        $message->subject = "Your property has been locked!";

        \Mail::to($message->receiver_email)->send(new EmailNotification($message));

        Alert::success('Property has been locked!', 'LOCKED!')->autoclose(3000);
        return back();

    }

    public function unlockProperty(Property $property)
    {

        $property = Property::find($property->id);
        $property->availability = 'YES';
        $property->save();

        $message = new MailNotification;
        $message->receiver_email = $property->user->email;
        $message->receiver_name = $property->user->name;
        $message->property_name = $property->name;
        $message->property_location = $property->city;
        $message->property_createdOn = $property->created_at;
        $message->status = 'unlocked';
        $message->subject = "Your property has been unlocked!";

        \Mail::to($message->receiver_email)->send(new EmailNotification($message));

        Alert::success('Property has been unlocked!', 'UNLOCKED!')->autoclose(3000);
        return back();

    }

    public function allArticles()
    {

        $articles = Article::orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.master', compact('articles'));
    }

    public function deleteArticle(Article $article)
    {

        DB::table('articles')->where('id', '=', $article->id)->delete();
        Alert::success('Article has been deleted successfully!', 'Deleted Successfully!')->autoclose(3000);
        return back();
    }

    public function allInquery()
    {

        $inquiries = Message::latest()->paginate(20);
        return view('admin.master', compact('inquiries'));
    }

    public function viewReplyInquery(Message $message)
    {

        return view('admin.master', compact('message'));
    }

    public function replyInquery(Request $request)
    {

        $request->validate([
            'message' => 'required|string|max:2500|min:10',
        ]);

        $message = new UserEmail;
        $message->receiver_id = request('receiverid');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = 'Administrator';
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = '/';
        $message->save();

        $request->name = 'Administrator';
        $request->email = auth()->user()->email;
        $request->pno = '0112563123';
        $request->property_url = '/';

        \Mail::to(request('receiver'))->send(new ContactMail($request));

        Alert::success('Message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();
    }

    public function deleteInquey(Message $message)
    {

        DB::table('messages')->where('id', '=', $message->id)->delete();
        Alert::success('Inquery has been deleted successfully!', 'Inquery Deleted!')->autoclose(3000);
        return back();
    }

}
