<?php

namespace App\Http\Controllers;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Config;
use App\Models\UserType;
use EloquentBuilder;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = User::with('usertypesusers')->with('departmentsusers')->get();
        return view('users.index', compact('users'));
    }
    

    public function users_admin()
    {
        $departments_id= Auth::guard('web')->user()->departments_id;
        $users = User::where('departments_id',$departments_id)->with('departmentsusers')->get();
        return view('vuexy.users.index', compact('users'));
    }

    
    public function user_type_names()
    {
        {
            $class_names = UserType::all();
            return $class_names;
        }
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();       
        $imagelink='';
        if($request->file('file'))
        {
           $files = $request->file('file');
            $destinationPath = 'users_files/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $imagelink =  $destinationPath.$profileImage;
        }
        
           $user->user_types_id = $request->user_types_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perspnal_file_no = $request->perspnal_file_no;
        $user->section = $request->section;  
        $user->phone = $request->phone;
        $user->departments_id = $request->departments_id;
         $user->file = $imagelink;
        $user->save();
        return back()->with('success','Added succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
 
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->perspnal_file_no = $request->perspnal_file_no;
        $user->section = $request->section;
        $user->phone = $request->phone;
        $user->departments_id = $request->departments_id['departments_id'];
        $user->user_types_id = $request->user_types_id['user_types_id'];
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'  
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Updated succesfully');
    }


    
    public function updaterole(Request $request)
    {
    
        $user = User::findOrFail($request->id);
        $user->editstatus = $request->editstatus;
        $user->deletestatus = $request->deletestatus;
        $user->bookmarkersstatus = $request->bookmarkersstatus;
        $user->publiclotterystatus = $request->publiclotterystatus;
        $user->publicgamingstatus = $request->publicgamingstatus;
        $user->sendsms_status = $request->sendsms_status;
        $user->bookmarkersshop_status = $request->bookmarkersshop_status;
        $user->companies_status = $request->companies_status;        
       
        $user->bookmarkers_companies_status = $request->bookmarkers_companies_status; 
        $user->public_lottery_companies_status = $request->public_lottery_companies_status; 
        $user->public_gaming_companies_status = $request->public_gaming_companies_status; 
       
       
        $user->user_accounts_status = $request->user_accounts_status;
        $user->records_bookmarkers_r = $request->records_bookmarkers_r;

        $user->records_public_lotery = $request->records_public_lotery;

        $user->records_public_gaming = $request->records_public_gaming;
        $user->lottery_name = $request->lottery_name;
        $user->records_accounts = $request->records_accounts;
        $user->records_company = $request->records_company;
        $user->search = $request->search;

        $user->admin_assign_companies = $request->admin_assign_companies;
        $user->admin_assign_record_entry = $request->admin_assign_record_entry;
        $user->admin_assign_accounts = $request->admin_assign_accounts;
        $user->admin_assign_registry = $request->admin_assign_registry;
        $user->bookmarkers_group = $request->bookmarkers_group;
        $user->public_lottery_group = $request->public_lottery_group;
        $user->public_gaming_group = $request->public_gaming_group;
        $user->actions_group = $request->actions_group;

        $user->access_registry = $request->access_registry;
        $user->access_file_registry = $request->access_file_registry;
        $user->assign_file_registry = $request->assign_file_registry;
        $user->assign_task = $request->assign_task;
        $user->bookmarkers_view_shop_status = $request->bookmarkers_view_shop_status;
        $user->lottery_name_view = $request->lottery_name_view;

        
        $user->save();
        return back()->with('success','Role Updated succesfully');
    }


    
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id['id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }

    public function death(Request $request, $id )
    {

        
       // return $request->id['shop_id'];
       // return $request;     return Favourite::find($id)->delete();
        $id;  $user = User::findOrFail( $id );
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }
    public function profile()
    {
        $auth=Auth::guard('web')->user()->id; 
        $users = User::where('id',$auth)->get();
        return view('profile.index', compact('users'));
    }


    public function assignroleuser($id)
    {
        $auditLogs = EloquentBuilder::to(AuditLog::where('id',$id)->with('userlogs'),request()->all())->get();

         $users = User::where('id',$id)->get();
        return view('vuexy.user.user_edit', compact('users','auditLogs'));
    }

    
    public function admins_user($id)
    {
        $auditLogs = EloquentBuilder::to(AuditLog::where('id',$id)->with('userlogs'),request()->all())->get();
     
         $users = User::where('id',$id)->get();
        return view('vuexy.user.admins_user_edit', compact('users','auditLogs'));
    }
    
    public function viewassignedusersroles()
    {
        $id='2';
        $Allowedaccess='Allowed';
        $NotAllowedaccess='NotAllowed';
        $auditLogs = EloquentBuilder::to(AuditLog::where('id',$id)->with('userlogs'),request()->all())->get();
        
        $Bookmarkers= User::where('records_bookmarkers_r','Allowed')->count();
         $bookmarker_not_allowed =User::where('records_bookmarkers_r','NotAllowed')->count();
       
         $bookmarkersstatus= User::where('bookmarkersstatus','Allowed')->count();
         $bookmarkersstatus_not_allowed= User::where('bookmarkersstatus','NotAllowed')->count();
     
         $bookmarkersshop_status= User::where('bookmarkersshop_status','Allowed')->count();
         $bookmarkersshop_status_not_allowed= User::where('bookmarkersshop_status','NotAllowed')->count();
     
         $lottery_name= User::where('lottery_name','Allowed')->count();
         $lottery_name_not_allowed= User::where('lottery_name','NotAllowed')->count();
  
         $records_public_lotery= User::where('records_public_lotery','Allowed')->count();
         $records_public_lotery_not_allowed= User::where('records_public_lotery','NotAllowed')->count();

         $publiclotterystatus= User::where('publiclotterystatus','Allowed')->count();
         $publiclotterystatus_not_allowed= User::where('publiclotterystatus','NotAllowed')->count();

         $publicgamingstatus= User::where('publicgamingstatus','Allowed')->count();
         $publicgamingstatus_not_allowed= User::where('publicgamingstatus','NotAllowed')->count();

         $records_public_gaming= User::where('records_public_gaming','Allowed')->count();
         $records_public_gaming_not_allowed= User::where('records_public_gaming','NotAllowed')->count();

         $editstatus= User::where('editstatus','Allowed')->count();
         $editstatus_not_allowed= User::where('editstatus','NotAllowed')->count();

         $deletestatus= User::where('deletestatus','Allowed')->count();
         $deletestatus_not_allowed= User::where('deletestatus','NotAllowed')->count();

         $sendsms_status= User::where('sendsms_status','Allowed')->count();
         $sendsms_status_not_allowed= User::where('sendsms_status','NotAllowed')->count();

         $companies_status= User::where('companies_status','Allowed')->count();
         $companies_status_not_allowed= User::where('companies_status','NotAllowed')->count();

         $records_company= User::where('records_company','Allowed')->count();
         $records_company_not_allowed= User::where('records_company','NotAllowed')->count();

         $user_accounts_status= User::where('user_accounts_status','Allowed')->count();
         $user_accounts_status_not_allowed= User::where('user_accounts_status','NotAllowed')->count();

         $records_accounts= User::where('records_accounts','Allowed')->count();
         $records_accounts_not_allowed= User::where('records_accounts','NotAllowed')->count();

         $access_registry= User::where('access_registry','Allowed')->count();
         $access_registry_not_allowed= User::where('access_registry','NotAllowed')->count();

         $access_file_registry= User::where('access_file_registry','Allowed')->count();
         $access_file_registry_not_allowed= User::where('access_file_registry','NotAllowed')->count();

         $assign_file_registry= User::where('assign_file_registry','Allowed')->count();
         $assign_file_registry_not_allowed= User::where('assign_file_registry','NotAllowed')->count();

         $assign_task= User::where('assign_task','Allowed')->count();
         $assign_task_not_allowed= User::where('assign_task','NotAllowed')->count();

         $admin_assign_companies= User::where('admin_assign_companies','Allowed')->count();
         $admin_assign_companies_not_allowed= User::where('admin_assign_companies','NotAllowed')->count();

         $admin_assign_record_entry= User::where('admin_assign_record_entry','Allowed')->count();
         $admin_assign_record_entry_not_allowed= User::where('admin_assign_record_entry','NotAllowed')->count();

         $admin_assign_accounts= User::where('admin_assign_accounts','Allowed')->count();
         $admin_assign_accounts_not_allowed= User::where('admin_assign_accounts','NotAllowed')->count();

         $admin_assign_registry= User::where('admin_assign_registry','Allowed')->count();
         $admin_assign_registry_not_allowed= User::where('admin_assign_registry','NotAllowed')->count();

         $bookmarkers_group= User::where('bookmarkers_group','Allowed')->count();
         $bookmarkers_group_not_allowed= User::where('bookmarkers_group','NotAllowed')->count();

         $public_lottery_group= User::where('public_lottery_group','Allowed')->count();
         $public_lottery_group_not_allowed= User::where('public_lottery_group','NotAllowed')->count();

         $public_gaming_group= User::where('public_gaming_group','Allowed')->count();
         $public_gaming_group_not_allowed= User::where('public_gaming_group','NotAllowed')->count();

         $actions_group= User::where('actions_group','Allowed')->count();
         $actions_group_not_allowed= User::where('actions_group','NotAllowed')->count();

         $search= User::where('search','Allowed')->count();
         $search_not_allowed= User::where('search','NotAllowed')->count();

           
         
         $users = User::All();
  return view('vuexy.user.user_allocation_count', compact('search','search_not_allowed','actions_group','actions_group_not_allowed','public_gaming_group','public_gaming_group_not_allowed','public_lottery_group','public_lottery_group_not_allowed','bookmarkers_group','bookmarkers_group_not_allowed','admin_assign_registry','admin_assign_registry_not_allowed','admin_assign_accounts','admin_assign_accounts_not_allowed','admin_assign_record_entry','admin_assign_record_entry_not_allowed','admin_assign_companies','admin_assign_companies_not_allowed','assign_task','assign_task_not_allowed','assign_file_registry','assign_file_registry_not_allowed','access_file_registry','access_file_registry_not_allowed','access_registry','access_registry_not_allowed','records_accounts','records_accounts_not_allowed','user_accounts_status','user_accounts_status_not_allowed','records_company','records_company_not_allowed','companies_status','companies_status_not_allowed','sendsms_status','sendsms_status_not_allowed','deletestatus','deletestatus_not_allowed','editstatus','editstatus_not_allowed','records_public_gaming','records_public_gaming_not_allowed','publicgamingstatus','publicgamingstatus_not_allowed','publiclotterystatus','publiclotterystatus_not_allowed','records_public_lotery','records_public_lotery_not_allowed','lottery_name_not_allowed','lottery_name','bookmarkersshop_status','bookmarkersshop_status_not_allowed','bookmarkersstatus_not_allowed','bookmarkersstatus','NotAllowedaccess','Allowedaccess','bookmarker_not_allowed','Bookmarkers','auditLogs','users'));
    }
    public function accessuserswithright($Allowedaccess)
    {
        $users = User::where('records_bookmarkers_r',$Allowedaccess)->get();
        return view('vuexy.user.accessallowed', compact('users'));
    }

    public function denyaccessuserswithright($NotAllowedaccess)
    {
        $users = User::where('records_bookmarkers_r',$NotAllowedaccess)->get();
        return view('vuexy.user.accessdenied', compact('users'));
    }

/////////////////////bookmarkersstatus//////////////////////////
    public function access_bookmarkersstatus($Allowedaccess)
    {
        $users = User::where('bookmarkersstatus',$Allowedaccess)->get();
        return view('vuexy.user.accessallowed', compact('users'));
    }
    public function deny_bookmarkersstatus($NotAllowedaccess)
    {
        $users = User::where('bookmarkersstatus',$NotAllowedaccess)->get();
        return view('vuexy.user.accessdenied', compact('users'));
    }
    /////////////////////////////////////////////////


/////////////////////Bookmarkers Shop//////////////////////////
public function access_bookmarkersshop_status($Allowedaccess)
{
    $users = User::where('bookmarkersshop_status',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_bookmarkersshop_status($NotAllowedaccess)
{
    $users = User::where('bookmarkersshop_status',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


/////////////////////Lottery Game//////////////////////////
public function access_lottery_name($Allowedaccess)
{
    $users = User::where('lottery_name',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_lottery_name($NotAllowedaccess)
{
    $users = User::where('lottery_name',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Records Public Lottery//////////////////////////
public function access_records_public_lotery($Allowedaccess)
{
    $users = User::where('records_public_lotery',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_records_public_lotery($NotAllowedaccess)
{
    $users = User::where('records_public_lotery',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Public Lottery Status//////////////////////////
public function access_publiclotterystatus($Allowedaccess)
{
    $users = User::where('publiclotterystatus',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_publiclotterystatus($NotAllowedaccess)
{
    $users = User::where('publiclotterystatus',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Public Gaming//////////////////////////
public function access_publicgamingstatus($Allowedaccess)
{
    $users = User::where('publicgamingstatus',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_publicgamingstatus($NotAllowedaccess)
{
    $users = User::where('publicgamingstatus',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Records Public Gaming//////////////////////////
public function access_records_public_gaming($Allowedaccess)
{
    $users = User::where('records_public_gaming',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_records_public_gaming($NotAllowedaccess)
{
    $users = User::where('records_public_gaming',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Edit//////////////////////////
public function access_editstatus($Allowedaccess)
{
    $users = User::where('editstatus',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_editstatus($NotAllowedaccess)
{
    $users = User::where('editstatus',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Delete//////////////////////////
public function access_deletestatus($Allowedaccess)
{
    $users = User::where('deletestatus',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_deletestatus($NotAllowedaccess)
{
    $users = User::where('deletestatus',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Send SMS//////////////////////////
public function access_sendsms_status($Allowedaccess)
{
    $users = User::where('sendsms_status',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_sendsms_status($NotAllowedaccess)
{
    $users = User::where('sendsms_status',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


/////////////////////Companies//////////////////////////
public function access_companies_status($Allowedaccess)
{
    $users = User::where('companies_status',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_companies_status($NotAllowedaccess)
{
    $users = User::where('companies_status',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Records Company//////////////////////////
public function access_records_company($Allowedaccess)
{
    $users = User::where('records_company',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_records_company($NotAllowedaccess)
{
    $users = User::where('records_company',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////User Accounts//////////////////////////
public function access_user_accounts_status($Allowedaccess)
{
    $users = User::where('user_accounts_status',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_user_accounts_status($NotAllowedaccess)
{
    $users = User::where('user_accounts_status',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Records Accounts//////////////////////////
public function access_records_accounts($Allowedaccess)
{
    $users = User::where('records_accounts',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_records_accounts($NotAllowedaccess)
{
    $users = User::where('records_accounts',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Registry//////////////////////////
public function access_access_registry($Allowedaccess)
{
    $users = User::where('access_registry',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_access_registry($NotAllowedaccess)
{
    $users = User::where('access_registry',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


/////////////////////File Registry//////////////////////////
public function access_access_file_registry($Allowedaccess)
{
    $users = User::where('access_file_registry',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_access_file_registry($NotAllowedaccess)
{
    $users = User::where('access_file_registry',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


/////////////////////Assign Registry//////////////////////////
public function access_assign_file_registry($Allowedaccess)
{
    $users = User::where('assign_file_registry',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_assign_file_registry($NotAllowedaccess)
{
    $users = User::where('assign_file_registry',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Asign Task//////////////////////////
public function access_assign_task($Allowedaccess)
{
    $users = User::where('assign_task',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_assign_task($NotAllowedaccess)
{
    $users = User::where('assign_task',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


///////////////////// Assign Companies//////////////////////////
public function access_admin_assign_companies($Allowedaccess)
{
    $users = User::where('admin_assign_companies',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_admin_assign_companies($NotAllowedaccess)
{
    $users = User::where('admin_assign_companies',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Assign Record Entry//////////////////////////
public function access_admin_assign_record_entry($Allowedaccess)
{
    $users = User::where('admin_assign_record_entry',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_admin_assign_record_entry($NotAllowedaccess)
{
    $users = User::where('admin_assign_record_entry',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Assign Accounts//////////////////////////
public function access_admin_assign_accounts($Allowedaccess)
{
    $users = User::where('admin_assign_accounts',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_admin_assign_accounts($NotAllowedaccess)
{
    $users = User::where('admin_assign_accounts',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Assign Registry//////////////////////////
public function access_admin_assign_registry($Allowedaccess)
{
    $users = User::where('admin_assign_registry',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_admin_assign_registry($NotAllowedaccess)
{
    $users = User::where('admin_assign_registry',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Bookmarkers Group//////////////////////////
public function access_bookmarkers_group($Allowedaccess)
{
    $users = User::where('bookmarkers_group',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_bookmarkers_group($NotAllowedaccess)
{
    $users = User::where('bookmarkers_group',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Public Lottery Group//////////////////////////
public function access_public_lottery_group($Allowedaccess)
{
    $users = User::where('public_lottery_group',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_public_lottery_group($NotAllowedaccess)
{
    $users = User::where('public_lottery_group',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////


/////////////////////Public Gaming Group//////////////////////////
public function access_public_gaming_group($Allowedaccess)
{
    $users = User::where('public_gaming_group',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_public_gaming_group($NotAllowedaccess)
{
    $users = User::where('public_gaming_group',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Actions Group//////////////////////////
public function access_actions_group($Allowedaccess)
{
    $users = User::where('actions_group',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_actions_group($NotAllowedaccess)
{
    $users = User::where('actions_group',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

/////////////////////Search//////////////////////////
public function access_search($Allowedaccess)
{
    $users = User::where('search',$Allowedaccess)->get();
    return view('vuexy.user.accessallowed', compact('users'));
}
public function deny_search($NotAllowedaccess)
{
    $users = User::where('search',$NotAllowedaccess)->get();
    return view('vuexy.user.accessdenied', compact('users'));
}
/////////////////////////////////////////////////

}
